<script setup lang="ts">
import { onMounted, ref } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import { usePrimeVue } from '@/composables/usePrimeVue';

usePrimeVue();

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
        <template #body>
          <div class="passageiro-view__actions">
            <Button icon="pi pi-pencil"
              class="passageiro-view__button passageiro-view__button--small p-button-success p-mr-2" />
            <Button icon="pi pi-pencil"
              class="passageiro-view__button passageiro-view__button--small p-button-info p-mr-2" />
            <Button icon="pi pi-trash" class="passageiro-view__button passageiro-view__button--small p-button-danger" />
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
