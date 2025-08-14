<script setup lang="ts">
import { onMounted, ref } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import { usePrimeVue } from '@/composables/usePrimeVue';
import { useYiiFormSubmit } from '@/composables/useYiiFormSubmit';

usePrimeVue();

const passageiros = ref([]);
onMounted(() => {
  if (!window.PASSAGEIROS_DATA) {
    return;
  }

  passageiros.value = window.PASSAGEIROS_DATA;
});
const { submit } = useYiiFormSubmit();

const handleDelete = (id: number) => {
  if (confirm('Tem certeza que deseja deletar este passageiro?')) {
    const deleteUrl = `index.php?r=passageiro/delete&id=${id}`;
    submit(deleteUrl, {}, 'Passageiro');
  }
};
</script>

<template>
  <div class="passageiro-view__header">
    <Button class="passageiro-view__button--blue" label="Pesquisa avançada" />
    <a href="index.php?r=passageiro/createvue">
      <Button label="+" />
    </a>
  </div>

  <div class="primevue-component-wrapper">
    <h2 class="mb-3">Tabela de Passageiros com PrimeVue</h2>

    <DataTable :value="passageiros" tableStyle="min-width: 50rem">
      <Column field="id" header="ID"></Column>
      <Column field="nome" header="Nome"></Column>
      <Column field="nascimento" header="Nascimento"></Column>
      <Column field="email" header="Email"></Column>
      <Column field="telefone" header="Telefone"></Column>
      <Column field="data_hora_status" header="Data e Hora do Status"></Column>
      <Column field="status" header="Status"></Column>
      <Column header="Ações">
        <template #body="slotProps">
          <div class="d-flex justify-content-center gap-2">
            <a :href="`index.php?r=passageiro/view&id=${slotProps.data.id}`">
              <Button icon="pi pi-eye" severity="info" rounded />
            </a>

            <a :href="`index.php?r=passageiro/updateVue&id=${slotProps.data.id}`">
              <Button icon="pi pi-pencil" severity="success" rounded />
            </a>

            <Button icon="pi pi-trash" severity="danger" rounded @click="handleDelete(slotProps.data.id)" />
          </div>
        </template>
        </Column>
    </DataTable>
  </div>
</template>

<style lang="scss">
@use "../../styles/main.scss" as *;

.passageiro-view {
  &__header {
    align-items: center;
    display: flex;
    gap: 8px;
    justify-content: end;
    margin-bottom: 1rem;
  }

  &__actions {
    align-items: center;
    display: flex;
    gap: 4px;
  }

  &__button {

    &--blue.p-button {
      background-color: #0d6efd;
      border-color: #0d6efd;

      &:hover {
        background-color: #0b5ed7;
        border-color: #0a58ca;
      }
    }

    &--small.p-button {
      height: fit-content;
      padding: 4px 8px;
      width: fit-content;
    }
  }
}
</style>
