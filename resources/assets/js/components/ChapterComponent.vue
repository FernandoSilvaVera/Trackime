<template>
		<div class="col-12" style="overflow:auto;height:300px">
			<table class="table table-hover" >
				<tbody>
					<tr v-for="video in chapters" @click="watchAnime(video.anime, video.chapter)">
						<td>  {{video.anime}}  </td>
						<td>  {{video.chapter}}  </td>
					</tr>
				</tbody>
			</table>
		</div>
</template>

<script>
    export default {
		props: [
			'videos'
		],
		data: function(){
			return {
				chapters: JSON.parse(this.videos)
			}
		},
		methods: {
			watchAnime: function(anime, chapter){
				window.location = "/watch?anime=" + anime + "&capitulo=" + chapter
			}
		}
    }
</script>
