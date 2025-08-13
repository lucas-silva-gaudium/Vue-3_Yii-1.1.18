import { defineCustomElement, createApp } from 'vue';
import PrimeVue from 'primevue/config';
import type { Component } from 'vue';

const modules = import.meta.glob<{ default: Component }>('./pages/**/*.ce.vue');

export async function registerCustomElements() {
  for (const path in modules) {
    const module = await modules[path]();
    const component = module.default;

    // Criar app temporário e aplicar PrimeVue
    const app = createApp(component);
    app.use(PrimeVue);

    const customElement = defineCustomElement(component);

    const name =
      'v-' +
      path
        .replace('./pages/', '')
        .replace(/View\.ce\.vue$/, '')
        .replace(/\//g, '-')
        .toLowerCase();

    if (!customElements.get(name)) {
      customElements.define(name, customElement);
    }
  }
}
