
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import YoutubeDash from './Youtube/YoutubeDash.vue';
import VideoDetail from './Youtube/VideoDetail.vue';

Vue.use(VueRouter);

window.eventBus = new Vue({});

const routes = [
    {path: '/', component: YoutubeDash, 'name': 'youtube-dash'},
    {path: '/video/:id', component: VideoDetail, 'name': 'youtube-video'}
];

const router = new VueRouter({
    routes
});

const app = new Vue({
    router
}).$mount('#app');
