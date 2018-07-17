<template>
  <div class="playlist-wrapper">
    <notifications group="foo" :classes="notificationClasses" />
    <button class="btn btn-sm btn-primary"
            @click="playlistOpen">+ Add</button>

    <div class="list-wrapper" v-if="showPlaylist">
      <div v-if="!loadingData">
        <div class="list">
          <div class="clearfix mb-2">
            <div class="float-left">My playlists</div>
            <div class="float-right cursor" @click="playlistOpen">Close</div>
          </div>
          <div class="clearfix mb-2">
            <ul class="list-group">
              <playlist-item :item="item" v-for="item in playlist" v-bind:key="item.id"></playlist-item>
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

      <div v-if="loadingData"><i class="fas fa-circle-notch fa-spin"></i></div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios';
  import PlaylistItem from './PlaylistItem';

  export default {
    components: {
      PlaylistItem
    },
    created () {
      window.eventBus.$on('successPlaylistItemAdded', data => {
        this.notificationClasses = 'vue-notification success'
        this.$notify({
          group: 'foo',
          title: 'Success!',
          text: data
        });
      });
      window.eventBus.$on('errorPlaylistItemNotAdded', data => {
        this.notificationClasses = 'vue-notification error'
        this.$notify({
          group: 'foo',
          title: 'Error!',
          text: data
        });
      });
    },
    data () {
      return {
        notificationClasses: null,
        showPlaylist: false,
        loadingData: false,
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
        this.loadingData = true;
        axios.get('api/user/playlists').then(response => {
          this.showPlaylist = !this.showPlaylist;
          setTimeout(() => {
            this.loadingData = false;
            this.playlist = response.data;
          }, 1000)
        })
      },
      handleSavePlaylist () {
        axios.post('api/playlist', {name: this.playlistName, isPrivate: this.isPrivate})
          .then(response => {
            console.log('response', response);
            this.playlistName = '';
            this.playlist.unshift(response.data);
          })
          .catch(error => {
            if (error.response.status == 403) {
              alert(error.response.data.message);
            }
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
