<template>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-header">{{status}}</div>

      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <div v-for="task of tasks">
        <p class="card-text">{{ task.description }}</p>
        </div>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ['status', 'tasks'],
  methods: {}
};
</script>
<style scoped>
.card-header {
  text-transform: capitalize;
}
</style>
