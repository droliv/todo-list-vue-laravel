<template>
<div>
    <button class="btn" data-toggle="modal" data-target="#exampleModal">
      <i class="material-icons" style="color:blue;font-size: 48px">
        add_circle
      </i>
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <FormTask></FormTask>
    </div>
    <div class="row">
      <TasksContainer></TasksContainer>
      <TasksContainer></TasksContainer>
      <TasksContainer></TasksContainer>
    </div>
</div>
</template>

<script>
import TasksContainer from './TasksContainer.vue';
import FormTask from './FormTask.vue';
export default {
  components: {
    TasksContainer,
    FormTask
  }
}
</script>