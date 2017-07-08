<template>
  <div id="app">
    <createTodo v-on:create-todo="addTodo"></createTodo>
    <TodoList v-bind:todos="todos"></TodoList>
  </div>
</template>

<script>
import Hello from './components/Hello'
import createTodo from './components/createTodo'
import TodoList from './components/TodoList'
import Axios from 'axios'



export default {
  name: 'app',
  components: {
    createTodo,
    TodoList
  },


  data:function()
  {
    return {todos:[]}
  },
  mounted: function()
  {
    var _self=this;

    Axios.get('http://localhost:8000/api/todos').then (function(response){
      _self.todos=response.data;

    })
  },

  methods:
  {
    addTodo: function(todo)
    {
      console.log(todo)
      this.todos.push(todo);
      Axios.post('http://localhost:8000/api/add-todo',todo).then(function(response)
      {
        console.log(response);
      }).catch(function(error)
      {
        console.log(error);
      })
    }
  }



}
</script>

<style>

</style>
