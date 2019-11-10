<template>
  <div>
    <button title="Criar nova tarefa" class="btn btn-primary circle" data-toggle="modal" data-target="#exampleModal">
      <i class="material-icons">add</i>
    </button>

    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <FormTask></FormTask>
    </div>

    <div class="row">
      <TasksContainer status="todo" :tasks="tasksTodo"></TasksContainer>

      <TasksContainer status="doing" :tasks="tasksDoing"></TasksContainer>

      <TasksContainer status="done" :tasks="tasksDone"></TasksContainer>
    </div>
  </div>
</template>

<script>
import TasksContainer from "./TasksContainer.vue";
import FormTask from "./FormTask.vue";
export default {
  data() {
    return {
      tasks: [],
      tasksTodo: [],
      tasksDoing: [],
      tasksDone: []
    };
  },
  components: {
    TasksContainer,
    FormTask
  },
  mounted() {
    axios
      .get("http://localhost:8000/api/tasks")
      .then(response => {
        this.tasks = response.data;
        this.listarTasks();
      })
      .catch(error => {
        console.log(error);
      });
  },
  methods: {
    listarTasks() {
      for (let i = 0; i < this.tasks.length; i++) {
        if (this.tasks[i].status == "todo") {
          this.tasksTodo.push(this.tasks[i]);
        } else if (this.tasks[i].status == "doing") {
          this.tasksDoing.push(this.tasks[i]);
        } else if (this.tasks[i].status == "done") {
          this.tasksDone.push(this.tasks[i]);
        }
      }
    }
  }
};
</script>
<style scoped>
.circle {
  border-radius: 50%;
  font-size: 38px;
  height: 50px;
  width: 50px;
  margin: 20px;
}
.circle i {
  display: block;
}
</style>
