<template>
  <div class="card pb-1">
    <div class="card-body">
      {{comment.body}}
      <br>
      <small class="text-muted">{{comment.created_at}}</small>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['comment']
  }
</script>
