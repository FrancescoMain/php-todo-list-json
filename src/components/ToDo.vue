<script >
import axios from 'axios';

const API_URL = "http://localhost:8000/";
  
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
      const params = { params: { 
        'newTodo': this.newTodo
      }}; 

      axios.get(API_URL + "php-todolist/data.php", params)
           .then(() => {

             this.getAllData();
             console.log(this.newTodo);
           });
    },
    getAllData() {

      axios.get(API_URL + "php-todolist/data.php")
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
  <li v-for="list, index in todoList" :key="index">{{ list.text }}</li>

 </ul>

 <form @submit="formSubmit">
  <input type="text" v-model="newTodo">
  <input type="submit" value="sumbit">
 </form>
</template>

<style scoped>

</style>
