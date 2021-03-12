require('./bootstrap');
require('alpinejs');

import Vue from 'vue'
import vueRouter from "vue-router"
import routes from './routes/index.js'
import App from './components/App.vue'
import store from './store'
import swal from 'sweetalert';

Vue.use(vueRouter)

Vue.component('posts-index', require('./components/Posts/Index.vue').default)
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
    components: { App },
    router: new vueRouter(routes),
    store,
    swal
});
