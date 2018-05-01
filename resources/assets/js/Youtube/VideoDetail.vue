<template>
  <div class="VideoDetails__wrapper">
    <!--Main wrapper-->
    <div class="row" v-if="video">
      <div class="col-sm-8">
        <h2>{{video.snippet.title}}</h2>
        <small>Channel: {{video.snippet.channelTitle}}</small>

        <div class="embed-responsive embed-responsive-16by9 mb-3">
          <youtube :video-id="videoId" ref="youtube" @ended="videoEnded"></youtube>
          <button @click="playVideo">play</button>
        </div>

        <p>{{video.snippet.description}}</p>

        <div class="action-buttons mt-2">
          <playlist-wrapper></playlist-wrapper>
        </div>
      </div>

      <div class="col-sm-2">
        List of other videos
      </div>
    </div>

    <!--Comment wrapper-->
    <div class="row">
      <div class="col-sm-8 pt-4">
        <comment-wrapper></comment-wrapper>
      </div>
    </div>
  </div>
</template>

<script>
  import GetVideo from './GetVideo';
  import CommentWrapper from './Comments/CommentWrapper.vue';
  import PlaylistWrapper from './Playlist/PlaylistWrapper.vue';

  export default {
    components: {
      CommentWrapper,
      PlaylistWrapper
    },

    created() {
      this.videoId = this.$route.params.id;
      this.url = `https://www.youtube.com/embed/${this.videoId}`;
      GetVideo({
        apiKey: 'AIzaSyBYihdwrKA2wwLzOdhR6madQt1vFeToP7k',
        videoId: this.videoId
      }, response => {
        this.video = response[0];
      });
    },

    data() {
      return {
        videoId: null,
        video: null,
        url: null
      }
    },

    methods: {
      playVideo () {
        this.player.playVideo()
      },
      videoEnded () {
        console.log('logging')
      }
    }
  }
</script>

