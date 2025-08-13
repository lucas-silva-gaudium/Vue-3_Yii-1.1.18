import { defineCustomElement, type Component } from 'vue';

const modules = import.meta.glob<{ default: Component }>('./pages/**/*.ce.vue');

console.log('Módulos encontrados pelo Vite:', modules);

export async function registerCustomElements() {
  for (const path in modules) {
    const module = await modules[path]();
    const webComponent = module.default;

    const name =
      'v-' +
      path
        .replace('./pages/', '')
        .replace(/View\.ce\.vue$/, '')
        .replace(/\//g, '-')
        .toLowerCase();

    console.log(`Registrando componente: <${name}> a partir do arquivo: ${path}`);

    if (!customElements.get(name)) {
      // eslint-disable-next-line @typescript-eslint/no-explicit-any
      customElements.define(name, defineCustomElement(webComponent as any));
    }
  }
}
