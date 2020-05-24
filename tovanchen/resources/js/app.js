
require('./bootstrap');
import VueRouter from 'vue-router';
import store from './store'
import axios from 'axios'
window.Vue = require('vue');
window.Vue.use(VueRouter);
import {routes} from './router';

const router = new VueRouter({ 
    mode: 'history',
    routes: routes
 })

const app = new Vue({ router, store, axios }).$mount('#app')