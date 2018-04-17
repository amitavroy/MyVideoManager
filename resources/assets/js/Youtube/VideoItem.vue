<template>
  <div class="VideoItem__wrapper clearfix">
    <div class="card" style="width: 15rem;">
      <router-link :to="{name: 'youtube-video', params: {id: video.id.videoId} }">
        <img class="card-img-top" v-bind:src="videoImage" v-bind:alt="videoTitle">
      </router-link>
      <div class="card-body">
        <h5 class="card-title">
          <router-link :to="{name: 'youtube-video', params: {id: video.id.videoId} }">
            {{videoTitle}}
          </router-link>
        </h5>
        <p class="card-text">{{videoDescription}}</p>
        <router-link :to="{name: 'youtube-video', params: {id: video.id.videoId} }" class="btn btn-primary">
          Show video
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["video"],

  computed: {
    videoTitle() {
      if (this.video.snippet.title) {
        let length = 50;
        let string = this.video.snippet.title.substring(0, 50);
        if (this.video.snippet.title.length > length) {
          string = string + "...";
        }
        return string;
      } else {
        return "No title for this video.";
      }
    },
    videoDescription() {
      if (this.video.snippet.description) {
        let length = 100;
        let string = this.video.snippet.description.substring(0, 50);
        if (this.video.snippet.description.length > length) {
          string = string + "...";
        }
        return string;
      } else {
        return "No description for this video.";
      }
    },
    videoImage() {
      return this.video.snippet.thumbnails.high.url;
    }
  }
};
</script>

<style lang="scss">
.card {
  .card-title a {
    color: #212529;
    &:hover {
      text-decoration: none;
      border-bottom: 2px solid #212529;
    }
  }
  margin: 0px 5px 5px 0px;
  .card-img-top {
    max-height: 210px;
  }
}
</style>
