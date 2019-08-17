<template>
	<div>
		<button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">{{ mainStatus }}</button>
		<div class="dropdown-menu">
			<a v-if="typeof status === 'object'" v-for="status in otherStatus" @click="addStatus(status.status)" class="dropdown-item">{{ status.trad }}</a>
		</div>
	</div>
</template>

<script>
    export default {
		props: [
			'initial_anime' , 'initial_custom'
		],
		data: function(){
			return {
				mainStatus: this.initial_custom.status,
				otherStatus: this.initial_custom,
				anime: this.initial_anime
			}
		},
		methods: {
			addStatus: function(status){
				var data = {
					state: status,
					anime: this.anime,
					_token: $('meta[name=csrf-token]').attr('content')
				}
				axios.post('/newStatusAnime', data).then(
					response => (this.mainStatus = response.data.status, this.otherStatus = response.data)
				)
			}
		}
    }
</script>

