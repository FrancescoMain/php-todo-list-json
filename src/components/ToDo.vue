<script >
import axios from 'axios';

const API_URL = "http://localhost:8000";
  
export default {
  name: 'ToDo',
  data() {
    return {
      todoList: [],

      newTodo: "",

    };
  },
  methods: {

    formSubmit(e) {

      e.preventDefault();
      
      const params = {params: {
        'text' : this.newTodo
      }};
      
      axios.get(API_URL + "/php-todolist/api-new-todo.php",params)
          .then(res=> {
            this.getAllData(),
            this.newTodo = "";

          });


    },
    done(list, index) {
      
      list.completed = list.completed? false : true;
      const params = {params: {
        "index" : index,
        "text" :list.text,
        'completed' : list.completed
      }};
      axios.get(API_URL + "/php-todolist/completed-toggle.php",params)
          .then(() => {

        });
    },
    delet(index) {
      
      const params = {params: {
        "index" : index,
      }};
      axios.get(API_URL + "/php-todolist/delet.php",params)
          .then(() => {

            this.getAllData();
        });
    },

    getAllData() {

      axios.get(API_URL + "/php-todolist/data.php")
      .then(res => {

      const data = res.data;

      this.todoList = data;
      });
    }     
  },
  mounted() {

    this.getAllData();
  }
}


</script>

<template>
 <h1>to do List</h1>
 <ul>
  <div v-for="list, index in todoList" 
    :key="index" >
    <li  
    :class="list.completed
      ? 'completed'
      : ''"
      @click="done(list, index)"
    >
    {{ list.text }}


  </li>
  <button @click="delet(index)">X</button>
  </div>
  
 </ul>

 <form @submit="formSubmit">
  <input type="text" name="newTodo" v-model="newTodo">
  <input type="submit" value="sumbit">
 </form>
</template>

<style scoped>
.completed {
  text-decoration:line-through;
}
</style>
