require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

let Myheader = require('./components/Header.vue');
let Myfooter = require('./components/Footer.vue');

let Home = require('./components/Home.vue');
let About = require('./components/About.vue');

const routes = [
  { path: '/user/', component: Home },
  { path: '/user/about', component: About }
]
const router = new VueRouter({
	mode:'history',
  	routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router,
    components: {Myheader,Myfooter}
});
