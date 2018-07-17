
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import VueYoutube from 'vue-youtube';
import Notifications from 'vue-notification';

import YoutubeDash from './Youtube/YoutubeDash.vue';
import VideoDetail from './Youtube/VideoDetail.vue';
import MyPlaylists from './Youtube/MyPlaylists.vue';

Vue.use(VueRouter);
Vue.use(VueYoutube);
Vue.use(Notifications);

window.eventBus = new Vue({});

const routes = [
    {path: '/', component: YoutubeDash, 'name': 'youtube-dash'},
    {path: '/video/:id', component: VideoDetail, 'name': 'youtube-video'},
    {path: '/playlists', component: MyPlaylists, 'name': 'my-playlist-page'}
];

const router = new VueRouter({
    routes
});

const app = new Vue({
    router
}).$mount('#app');
