<script setup lang="ts">
import PassageiroForm from '@/components/PassageiroForm.ce.vue';
import { usePrimeVue } from '@/composables/usePrimeVue';
usePrimeVue();
</script>

<template>
  <PassageiroForm />
</template>
<style lang="scss">
@use "@/styles/main.scss" as *;
</style>
