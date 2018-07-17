<template>
  <li class="list-group-item cursor" @click="saveVideoToPlaylist">{{item.name}}</li>
</template>

<script>
  export default {
    props: ['item'],
    methods: {
      saveVideoToPlaylist () {
        let postData = {
          videoId: this.$route.params.id,
          playlistId: this.item.id
        }
        axios.post('/api/playlist-entry', postData)
          .then(response => {
            console.log(response);
            window.eventBus.$emit('successPlaylistItemAdded', 'The video is added.')
          })
          .catch(error => {
            console.error(error.response);
            window.eventBus.$emit('errorPlaylistItemNotAdded', error.response.data.message);
          })
      }
    }
  }
</script>
