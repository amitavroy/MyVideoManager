<template>
  <div class="YoutubeDash__wrapper">
    <video-group :videos="videos"></video-group>
  </div>
</template>

<script>
  import VideoGroup from './VideoGroup.vue';
  import Search from './Search';

  export default {
    components: {
      VideoGroup
    },

    created() {
      Search({
        apiKey: 'AIzaSyBYihdwrKA2wwLzOdhR6madQt1vFeToP7k',
        term: 'x men',
        items: 10
      }, response => this.videos = response);
    },

    data() {
      return {
        videos: null
      }
    }
  }
</script>