<template>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-header bg-primary">{{status}}</div>

      <div class="card-body bg-tasks">
        <div v-for="task of tasks" :key="task.id">
          <div class="card-body bg-white task">
            <input title="Clique para editar" class="title" type="text" v-model="task.title" v-on:change="edita(task)" />
            <input title="Clique para editar" type="text" v-model="task.description" v-on:change="edita(task)" />
            <div class="row">
              <div class="col-sm-8">
                <a class="text-secondary" title="Mudar para A fazer" v-if="task.status != 'todo'" v-on:click="updateStatus('todo', task)">
                  <i class="material-icons">history</i>
                </a>
                <a class="text-success" title="Mudar para Fazendo" v-if="task.status != 'doing'" v-on:click="updateStatus('doing', task)">
                  <i class="material-icons">check_circle_outline</i>
                </a>
                <a class="text-success" title="Mudar para Feito" v-if="task.status != 'done'" v-on:click="updateStatus('done', task)">
                  <i class="material-icons">check_circle</i>
                </a>
              </div>
              <div class="col-sm-4">
                <a class="text-danger" title="Deletar Tarefa" v-on:click="deleta(task)">
                  <i class="material-icons">delete</i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import FormTask from "./FormTask.vue";
export default {
  props: ["status", "tasks"],
  data() {
    return {
      title: "",
      description: "",
      newStatus : ""
    };
  },
  components: {
    FormTask
  },
  methods: {
    updateStatus(status, task){
        task.status = status;
        this.edita(task);
    },
    edita(task) {
      this.title = task.title;
      this.description = task.description;
      this.newStatus = task.status;
      //this.title = task.title;
      axios
        .put("http://localhost:8000/api/tasks/" + task.id, {
          title: this.title,
          description: this.description,
          status: this.newStatus
        })
        .then(response => {
            window.location.href = "/";
        })
        .catch(error => {
        });
    },
    confirm() {
      let resposta = confirm("Deseja remover esse registro?");

      return resposta;
    },
    deleta(id) {
      let confirm = this.confirm();
      if (confirm == true) {
        axios
          .delete("http://localhost:8000/api/tasks/" + id)
          .then(data => {
            console.log("success");
          })
          .catch(error => {
            console.log("error");
          });
        window.location.href = "/";
      }
    }
  }
};
</script>
<style scoped>
.card-header {
  text-transform: capitalize;
  color: aliceblue;
}
.bg-tasks{
    background-color: darkgray;
}
.task {
  margin: 20px 10px;
  -webkit-box-shadow: 1px 2px 2px grey;
  -moz-box-shadow: 1px 2px 2px grey;
  box-shadow: 1px 2px 2px grey;
}
input,
textarea,
select {
  box-shadow: 0 0 0 0;
  border: 0 none;
  outline: 0;
}
a:hover {
  cursor: pointer;
}
.title {
  font-size: 30px;
  max-width: 100%;
}
</style>
