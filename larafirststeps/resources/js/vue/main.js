import { createApp } from 'vue'
import Oruga from '@oruga-ui/oruga-next'
import App from './App.vue'
import axios from 'axios'
import '../../css/vue.css'  // Tu CSS con Tailwind
import router from './router'

// Crear la app primero
const app = createApp(App)

// Luego usar plugins
app.use(Oruga)
app.use(router)

// Configuración global
app.config.globalProperties.$axios = axios
window.axios = axios

// Montar Vue
app.mount('#app')
