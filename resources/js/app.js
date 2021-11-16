// add vue
require('./bootstrap');
window.Vue = require('vue').default;

// support vuex
import Vuex from 'vuex';
window.Vue.use(Vuex);

// Vue store
import VueStore from './store/index';
const store = new Vuex.Store(VueStore)

// Vue router
import VueRouter from 'vue-router';
window.Vue.use(VueRouter);

require('./router/index');
const router = new VueRouter({
    routes: routes,
    mode: 'history'
})

Vue.component('home-component', require('./components/HomeComponent.vue').default);
Vue.component('menu-component', require('./components/MenuComponent.vue').default);

const app = new Vue({
    el: '#app',
    store,
    router,
});
