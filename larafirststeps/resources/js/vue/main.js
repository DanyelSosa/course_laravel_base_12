import { createApp } from 'vue'
import Oruga from '@oruga-ui/oruga-next'
//  import '@oruga-ui/theme-oruga/dist/theme.js'

import App from './App.vue'

createApp(App)
  .use(Oruga)
  .mount('#app')
