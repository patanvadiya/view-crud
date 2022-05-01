

require('./bootstrap');
import Vue from 'vue';
window.Vue = require('vue');
  
import App from './components/App.vue';
//import trys from './components/admin/try.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';
  
  
  
  
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
  
const router = new VueRouter({
    mode: 'history',
    routes: routes
});
  
const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
    //render: h => h(trys),
});