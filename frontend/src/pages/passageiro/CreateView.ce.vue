<script setup lang="ts">
// import { ref, getCurrentInstance } from 'vue';
// import PrimeVue, { usePrimeVue } from 'primevue/config';
import { ref } from 'vue';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import { usePrimeVue } from '@/composables/usePrimeVue';

usePrimeVue();

// const internalApp = getCurrentInstance()?.appContext.app;
// internalApp?.use(PrimeVue);

const value = ref('teste');
</script>

<template>
  <p>Página Create</p>
  <Button>teste</Button>

  <div class="card flex justify-content-center">
    <InputText type="text" v-model="value" placeholder="Digite seu nome" />
    <p>teste: {{ value }}</p>
  </div>
</template>

<style scoped lang="scss">
@use "../../styles/main.scss" as *;
</style>
