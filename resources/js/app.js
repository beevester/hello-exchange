import ComboBox from "./components/ComboBox";

require('./bootstrap');

import { createApp } from 'vue'
import MainPage from "./components/MainPage.vue";
import store from "./store/store";
import ExchangeTable from "./components/ExchangeTable.vue";

createApp({})
    .component('main-page',MainPage)
    .component('select-box', ComboBox)
    .component('exchange-table', ExchangeTable)
    .use(store)
    .mount('#app')
