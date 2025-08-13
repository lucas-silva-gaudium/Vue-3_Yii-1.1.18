import { getCurrentInstance } from 'vue';
import PrimeVue from 'primevue/config';

/**
 * Composable para garantir que a instância do PrimeVue seja
 * instalada no escopo do componente atual.
 */
export function usePrimeVue() {
  const internalApp = getCurrentInstance()?.appContext.app;

  if (internalApp) {
    internalApp.use(PrimeVue);
  }
}
