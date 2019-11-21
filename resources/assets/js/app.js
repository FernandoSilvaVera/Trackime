require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('anime-component', require('./components/AnimeComponent.vue'));
Vue.component('add-anime-component', require('./components/AddAnimeComponent.vue'));
Vue.component('anime-chapter-list', require('./components/ChapterComponent.vue'));

const app = new Vue({
    el: '#animes'
});
