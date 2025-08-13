<script setup lang="ts">
import { reactive } from 'vue';
import { usePrimeVue } from '@/composables/usePrimeVue';

import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import Calendar from 'primevue/calendar';
import Dropdown from 'primevue/dropdown';
import Textarea from 'primevue/textarea';
import InputMask from 'primevue/inputmask';

usePrimeVue();

const formState = reactive({
  nome: '',
  email: '',
  nascimento: '',
  telefone: '',
  status: null,
  obs: ''
});

const statusOptions = [
  { label: 'Ativo', value: 'A' },
  { label: 'Inativo', value: 'I' }
];

const handleSubmit = () => {
  console.log('Dados do formulário a serem enviados:', formState);
  alert('Formulário enviado! Verifique o console do navegador para ver os dados.');
};
</script>

<template>
  <div class="passageiro-create">
    <form @submit.prevent="handleSubmit">
      <fieldset class="passageiro-create__row passageiro-create__row--2-cols">
        <div class="passageiro-create__col">
          <label for="nome" class="passageiro-create__label">Nome Completo</label>
          <InputText id="nome" class="passageiro-create__data" v-model="formState.nome"
            placeholder="Digite o nome completo" />
        </div>

        <div class="passageiro-create__col">
          <label for="email" class="passageiro-create__label">Email</label>
          <InputText id="email" class="passageiro-create__data" v-model="formState.email" type="email"
            placeholder="email@exemplo.com.br" />
        </div>
      </fieldset>

      <fieldset class="passageiro-create__row passageiro-create__row--3-cols">
        <div class="passageiro-create__col">
          <label for="nascimento" class="passageiro-create__label">Data de Nascimento</label>
          <Calendar id="nascimento" class="passageiro-create__data" v-model="formState.nascimento" dateFormat="yy-mm-dd"
            placeholder="AAAA-MM-DD" />
        </div>
        <div class="passageiro-create__col">
          <label for="telefone" class="passageiro-create__label">Telefone</label>
          <InputMask id="telefone" class="passageiro-create__data" v-model="formState.telefone" mask="+99-99-999999999"
            placeholder="+55-11-999999999" />
        </div>
        <div class="passageiro-create__col">
          <label for="status" class="passageiro-create__label">Status</label>
          <Dropdown id="status" class="passageiro-create__data" v-model="formState.status" :options="statusOptions"
            optionLabel="label" optionValue="value" placeholder="Selecione um status" />
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
