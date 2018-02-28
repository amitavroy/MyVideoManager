<template>
  <div class="VideoDetails__wrapper row" v-if="video">
      <div class="col-sm-8 col-sm-push-2">
          <h2>{{video.snippet.title}}</h2>
          <br>
          <small>Channel: {{video.snippet.channelTitle}}</small>

          <p>{{video.snippet.description}}</p>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe v-bind:src="url" class="embed-responsive-item"></iframe>
            </div>
      </div>
  </div>
</template>

<script>
export default {
    created() {
        if (this.$route.params.video === undefined) {
            this.$router.push({name: 'youtube-dash'});
        }

        this.videoId = this.$route.params.id;
        this.url = `https://www.youtube.com/embed/${this.videoId}`;
        this.video = this.$route.params.video;
    },

    data() {
        return {
            videoId: null,
            video: null,
            url: null
        }
    }
}
</script>

