// import { createApp } from 'vue'
// import { createPinia } from 'pinia'
// import { defineCustomElement } from 'vue';
// import PassageiroAdminView from './pages/passageiro/PassageiroAdminView.ce.vue';

import { registerCustomElements } from './register-web-components';

// const VPassageiroAdmin = defineCustomElement(PassageiroAdminView);
//
// customElements.define('v-passageiro-admin', VPassageiroAdmin);

// const app = createApp(App)
// app.use(createPinia())
// app.mount('#app')

registerCustomElements();
