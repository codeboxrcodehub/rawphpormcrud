import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import VueAxios from 'vue-axios'
import axios from 'axios'

const apps = createApp(App)
apps.use(store)
apps.use(router)
apps.use(VueAxios, axios)
apps.mount('#app')
