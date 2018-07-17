<template>
  <div class="myplaylist__wrapper">
    <div class="card card-default">
      <div class="card-header">My playlists</div>
      <div class="card-body">
        <table class="table table-bordered table-hover table-stripe">
          <thead>
          <tr>
            <th>Name</th>
            <th>Number of videos</th>
            <th>Last updated</th>
            <th>Manage</th>
          </tr>
          </thead>

          <tbody>
          <tr v-for="playlist in playlists">
            <td>{{playlist.name}}</td>
            <td>{{playlist.entries.length}}</td>
            <td>{{playlist.updated_at}}</td>
            <td>Edit / Delete</td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios';
  export default {
    data () {
      return {
        playlists: []
      }
    },

    created () {
      axios.get('/api/user/playlists').then(response => {
        this.playlists = response.data;
      });
    }
  }
</script>
