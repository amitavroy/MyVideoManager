<template>
  <div class="playlist-wrapper">
    <button class="btn btn-sm btn-primary"
            @click="playlistOpen">+ Add</button>

    <div class="list-wrapper" v-if="showPlaylist">
      <div class="list">
        <div class="clearfix mb-2">
          <div class="float-left">My playlists</div>
          <div class="float-right cursor" @click="playlistOpen">Close</div>
        </div>
        <div class="clearfix mb-2">
          <ul class="list-group">
            <li class="list-group-item" v-for="item in playlist" v-bind:key="item.id">{{item.name}}</li>
          </ul>
        </div>
      </div>
      <form v-on:submit.prevent="handleSavePlaylist">
        <div class="form-group row">
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Create new playlist" v-model="playlistName">
          </div>
          <div class="col-sm-4">
            <input type="checkbox" id="private" name="private" v-model="isPrivate"> Private
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
  import axios from 'axios';

  export default {
    data () {
      return {
        showPlaylist: false,
        playlistName: '',
        isPrivate: false,
        playlist: null
      }
    },
    methods: {
      playlistOpen () {
        this.loadUserPlaylist();
      },
      loadUserPlaylist () {
        axios.get('api/user/playlists').then(response => {
          setTimeout(() => {
            this.showPlaylist = !this.showPlaylist;
            this.playlist = response.data;
          }, 300)
        })
      },
      handleSavePlaylist () {
        axios.post('api/playlist', {name: this.playlistName, isPrivate: this.isPrivate}).then(response => {
          console.log('response', response);
          this.playlistName = '';
        });
      }
    }
  }
</script>

<style lang="scss" scoped>
  .playlist-wrapper {
    position: relative;
    .list-wrapper {
      position: absolute;
      top: -135px;
      z-index: 999;
      background-color: white;
      padding: 1rem;
      border: 1px solid #efefef;
      min-width: 29rem;
      .list {
        .list-group-item {
          padding: 0.45rem 1.25rem;
        }
      }
    }
  }
</style>
