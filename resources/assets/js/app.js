require('./bootstrap')

window.Vue = require('vue')

import anime from './components/AnimeComponent.vue'
import addAnime from './components/AddAnimeComponent.vue'
import animeChapterList from './components/ChapterComponent.vue'

new Vue({

	el: "#animes",
	components: {
		'anime-component': anime,
		'add-anime-component': addAnime,
		'anime-chapter-list': animeChapterList
	}


})
