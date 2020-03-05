/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from './views/Home'
import NewOrderDelivery from './views/NewOrderDelivery'

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('restaurant-item', require('./components/RestaurantItem.vue').default);
Vue.component('basket-total', require('./components/BasketTotal.vue').default);
Vue.component('home', require('./views/Home.vue').default);
Vue.component('NewOrderDelivery', require('./views/NewOrderDelivery.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/delivery',
            name: 'delivery',
            component: NewOrderDelivery
        },
        // {
        //     path: '/review',
        //     name: 'review',
        //     component: NewOrderReview,
        // },
        // {
        //     path: '/complete',
        //     name: 'complete',
        //     component: NewOrderComplete,
        // },
    ]
});

const app = new Vue({
    el: '#app',
    component: { Home },
    router
});
