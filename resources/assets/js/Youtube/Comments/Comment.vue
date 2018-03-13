<template>
  <div class="card pb-1">
    <div class="card-body">
      <small class="text-muted">{{comment.user.name}} {{comment.created_at}}</small>
      <br>
      {{comment.body}}
    </div>
  </div>
</template>

<script>
  export default {
    props: ['comment']
  }
</script>
