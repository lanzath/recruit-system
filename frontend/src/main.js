import Vue from 'vue'
import App from './App.vue'
import router from '@/router'
import Axios from 'axios'
import { BootstrapVue } from 'bootstrap-vue'

import './styles/global.css'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.config.productionTip = false
Vue.prototype.$http = Axios

Vue.use(BootstrapVue)

const token = localStorage.getItem('token')
if (token) {
  Vue.prototype.$http.defaults.headers.common['Authorization'] = token
}

new Vue({
  render: h => h(App),
  router,
}).$mount('#app')
