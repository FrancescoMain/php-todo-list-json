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
          .then(res => {
            console.log(res.data);
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
  <li v-for="list, index in todoList" :key="index" :class="list.completed? 'completed': ''">{{ list.text }}</li>

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
