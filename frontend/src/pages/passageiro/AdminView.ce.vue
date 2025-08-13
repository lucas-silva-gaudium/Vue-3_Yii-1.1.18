<script setup lang="ts">
import { onMounted, ref } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';

// const passageiros = ref([
//   { id: 1, nome: 'Fulano da Silva', email: 'fulano@teste.com', status: 'A' },
//   { id: 2, nome: 'Ciclana de Souza', email: 'ciclana@teste.com', status: 'I' },
//   { id: 3, nome: 'Beltrano Oliveira', email: 'beltrano@teste.com', status: 'A' },
// ]);

const passageiros = ref([]);
onMounted(() => {
  if (!window.PASSAGEIROS_DATA) {
    return;
  }

  passageiros.value = window.PASSAGEIROS_DATA;
});
</script>

<template>
  <div class="passageiro-view__header">
    <Button class="passageiro-view__button--blue" label="Pesquisa avançada" />
    <Button label="+" href="ndex.php?r=passageiro/createvue" />
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
        <template #body>
          <Button icon="pi pi-pencil" class="p-button-rounded p-button-success p-mr-2" />
          <Button icon="pi pi-trash" class="p-button-rounded p-button-danger" />
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

  .p-button {
    display: none;
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
  }
}
</style>
