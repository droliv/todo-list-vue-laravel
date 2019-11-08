<template>

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nova Tarefa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
  <div class="form-group">
    <label for="inputTitle">Titulo:</label>
    <input type="text" class="form-control" id="inputTitle" placeholder="Titulo" v-model="title">
  </div>
  <div class="form-group">
    <label for="inputDescription">Descrição:</label>
    <textarea type="text" class="form-control" id="inputDescription" placeholder="Descrição" rows="3" v-model="description"></textarea>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" v-on:click="submit()">Save changes</button>
      </div>
      <div class="alert alert-success" role="alert" v-if="sucess">
        {{ sucess }}
      </div>
      <div class="alert alert-danger" role="alert" v-if="erro">
        {{ erro }}
      </div>
    </div>
  </div>

</template>
<script>
export default {
  data(){
    return{
      title:'',
      description:'',
      sucess:'',
      erro: '',
    }
  },
  methods:{
    submit(){
      const headers = {
        headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'Access-Control-Allow-Origin': '*',
        }
      }
      axios.post('http://localhost:8000/api/tasks/',{
          title: this.title,
          description: this.description
      }, headers)
      .then(response => {
        this.sucess = "Tarefa cadastrada com sucesso";
      })
      .catch(error => {
        this.erro = "Erro ao cadastrar tarefa!";
      });
    }
  }
}
</script>