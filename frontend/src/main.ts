// import { createApp } from 'vue'
// import { createPinia } from 'pinia'
import { defineCustomElement } from 'vue';
import App from './App.vue';

const VTable = defineCustomElement(App);

customElements.define('v-table', VTable);

// const app = createApp(App)
// app.use(createPinia())
// app.mount('#app')
