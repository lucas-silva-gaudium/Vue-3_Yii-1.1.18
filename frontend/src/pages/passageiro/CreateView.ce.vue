<script setup lang="ts">
import { computed, reactive } from 'vue';
import { usePrimeVue } from '@/composables/usePrimeVue';
import { useYiiFormSubmit } from '@/composables/useYiiFormSubmit';
import { useVuelidate } from '@vuelidate/core';
import { required, email, helpers } from '@vuelidate/validators';
import type { PassageiroForm } from '../types/passageiro.types';

import Button from 'primevue/button';
import Calendar from 'primevue/calendar';
import Dropdown from 'primevue/dropdown';
import InputText from 'primevue/inputtext';
import Textarea from 'primevue/textarea';



usePrimeVue();

const props = defineProps({
  submitUrl: {
    type: String,
    required: true,
  },
});

const { submit } = useYiiFormSubmit();

const formState: PassageiroForm = reactive({
  nome: '',
  email: '',
  nascimento: null,
  telefone: '',
  status: null,
  obs: ''
});

const statusOptions = [
  { label: 'Ativo', value: 'A' },
  { label: 'Inativo', value: 'I' }
];

const formatarData = (date: Date | null): string | null => {
  if (!date) return null;
  const pad = (num: number) => num.toString().padStart(2, '0');
  return `${date.getFullYear()}-${pad(date.getMonth() + 1)}-${pad(date.getDate())}`;
};

const nomeCompleto = (value: string) => {
  if (value.trim().length < 1) return true;
  const nomes = value.trim().split(/\s+/);
  return nomes.length >= 2 && nomes.every(p => p.length >= 3);
};

const rules = computed(() => ({
  nome: {
    required: helpers.withMessage('O nome é obrigatório.', required),
    nomeCompleto: helpers.withMessage('O nome deve ter pelo menos duas palavras com 3+ caracteres cada.', nomeCompleto)
  },
  email: {
    required: helpers.withMessage('O email é obrigatório.', required),
    email: helpers.withMessage('O formato do email é inválido.', email)
  },
  nascimento: { required: helpers.withMessage('A data de nascimento é obrigatória.', required) },
  telefone: { required: helpers.withMessage('O telefone é obrigatório.', required) },
  status: { required: helpers.withMessage('O status é obrigatório.', required) },
}));

const v$ = useVuelidate(rules, formState);


const handleSubmit = async () => {
  const isFormCorrect = await v$.value.$validate();
  if (!isFormCorrect) return;

  const dadosParaEnvio = {
    ...formState,
    nascimento: formatarData(formState.nascimento),
  };

  submit(props.submitUrl, dadosParaEnvio, 'Passageiro');
};
</script>

<template>
  <div class="passageiro-create">
    <form @submit.prevent="handleSubmit">
      <fieldset class="passageiro-create__row passageiro-create__row--2-cols">

        <div class="passageiro-create__col">
          <label for="nome" class="passageiro-create__label">Nome Completo</label>
          <InputText id="nome" class="passageiro-create__data" v-model="formState.nome"
            placeholder="Digite o nome completo" :invalid="v$.nome.$error" @blur="v$.nome.$touch" />
          <small v-for="error in v$.nome.$errors" :key="error.$uid" class="p-error">{{ error.$message }}</small>
        </div>

        <div class="passageiro-create__col">
          <label for="email" class="passageiro-create__label">Email</label>
          <InputText id="email" class="passageiro-create__data" v-model="formState.email" type="email"
            placeholder="email@exemplo.com.br" :invalid="v$.email.$error" @blur="v$.email.$touch" />
          <small v-for="error in v$.email.$errors" :key="error.$uid" class="p-error">{{ error.$message }}</small>
        </div>
      </fieldset>

      <fieldset class="passageiro-create__row passageiro-create__row--3-cols">
        <div class="passageiro-create__col">
          <label for="nascimento" class="passageiro-create__label">Data de Nascimento</label>
          <Calendar id="nascimento" class="passageiro-create__data" v-model="formState.nascimento" dateFormat="yy-mm-dd"
            placeholder="AAAA-MM-DD" :invalid="v$.nascimento.$error" @blur="v$.nascimento.$touch" />
          <small v-for="error in v$.nascimento.$errors" :key="error.$uid" class="p-error">{{ error.$message }}</small>
        </div>
        <div class="passageiro-create__col">
          <label for="telefone" class="passageiro-create__label">Telefone</label>
          <InputText id="telefone" class="passageiro-create__data" v-model="formState.telefone" type="tel"
            placeholder="+55-11-999999999" :invalid="v$.telefone.$error" @blur="v$.telefone.$touch" />
          <small v-for="error in v$.telefone.$errors" :key="error.$uid" class="p-error">{{ error.$message }}</small>
        </div>
        <div class="passageiro-create__col">
          <label for="status" class="passageiro-create__label">Status</label>
          <Dropdown id="status" class="passageiro-create__data" v-model="formState.status" :options="statusOptions"
            optionLabel="label" optionValue="value" placeholder="Selecione um status" :invalid="v$.status.$error"
            @blur="v$.status.$touch" />
          <small v-for="error in v$.status.$errors" :key="error.$uid" class="p-error">{{ error.$message }}</small>
        </div>
      </fieldset>

      <fieldset class="passageiro-create__row">
        <div class="passageiro-create__col">
          <label for="obs" class="passageiro-create__label">Observações</label>
          <Textarea id="obs" class="passageiro-create__data" v-model="formState.obs" rows="3"
            placeholder="Observações (opcional)" />
        </div>
      </fieldset>

      <div class="mt-4">
        <Button label="Criar Passageiro" class="passageiro-create__data" icon="pi pi-plus" type="submit" />
      </div>
    </form>
  </div>
</template>

<style lang="scss">
@use "@/styles/main.scss" as *;

.passageiro-create {
  &__row {
    display: grid;
    gap: 24px;
    padding: 0;
    border: none;
    margin-bottom: 24px;

    &--2-cols {
      grid-template-columns: repeat(2, 1fr);
    }

    &--3-cols {
      grid-template-columns: repeat(3, 1fr);
    }
  }

  &__label {
    display: block;
    margin-bottom: 0.5rem;
  }

  &__data {
    width: 100%;
  }
}
</style>
