<template>
	<div class="col-lg-4 col-md-6 col-xs-12  mb-5">
		<div class="card mb-1">
			<a :href="url()">
				<img class="card-img-top" :src="image_src()">
			</a>
		</div>
		<span><b>{{anime.anime}}</b></span>
		<span v-if="needChapter()"><b>capitulo {{anime.chapter}}</b></span>
		<div class="text-center">
			<span class="badge badge-dark m-1" v-for="genre of genres">{{ genre.genre }}</span>
		</div>
	</div>
</template>

<script>
    export default {
		props: [
			'anime', 'image', 'genres'
		],
        mounted() {
            console.log('Component mounted.')
			console.log(this.anime)
			console.log(this.genres)
        },
		methods:{
			image_src(){
				return "/images/" + this.image + '.jpg'
			},
			url(){
				if(this.anime.chapter){
					return "/ver?anime=" + this.anime.anime + "&capitulo=" + this.anime.chapter
				}else{
					return "/animes/" + this.anime.anime
				}
			},
			needChapter(){
				return !!this.anime.chapter
			}
		}
    }
</script>

