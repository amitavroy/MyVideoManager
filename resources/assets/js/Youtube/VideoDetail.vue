<template>
  <div class="VideoDetails__wrapper">
    <!--Main wrapper-->
    <div class="row" v-if="video">
      <div class="col-sm-8">
        <h2>{{video.snippet.title}}</h2>
        <br>
        <small>Channel: {{video.snippet.channelTitle}}</small>

        <p>{{video.snippet.description}}</p>
        <div class="embed-responsive embed-responsive-16by9">
          <!-- <iframe v-bind:src="url" class="embed-responsive-item"></iframe> -->
          <youtube :video-id="videoId" ref="youtube" @ended="videoEnded"></youtube>
          <button @click="playVideo">play</button>
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

  export default {
    components: {
      CommentWrapper
    },

    created() {
      this.videoId = this.$route.params.id;
      this.url = `https://www.youtube.com/embed/${this.videoId}`;
      GetVideo({
        apiKey: 'AIzaSyBYihdwrKA2wwLzOdhR6madQt1vFeToP7k',
        videoId: this.videoId
      }, response => {
        this.video = response[0];
      })
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

