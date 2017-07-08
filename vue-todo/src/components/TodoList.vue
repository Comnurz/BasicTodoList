<template>
	<div>
		<div class="row">
			<div class="columns large-6">
				<h1 style="color:blue" align="center">UnCompleted Todos( {{uncompletedTodos.length}} )</h1>
				<todo v-for="todo in uncompletedTodos" v-bind:todo="todo" v-bind:key="todo.id" @delete-todo="deleteTodo(todo)" @toggle-todo="toggleTodo(todo)"></todo>
			</div>


			<div class="columns large-6">
				<h1 style="color:blue" align="center">Created Todo( {{completedTodos.length}} )</h1>
				<todo v-for="todo in completedTodos" v-bind:todo="todo" v-bind:key="todo.id" @delete-todo="deleteTodo(todo)" @toggle-todo="toggleTodo(todo)"></todo>
			</div>
		</div>
	</div>
</template>


<script type="text/javascript">
	import Axios from 'axios';
	import todo from './todo';

	export default 
	{
		name: 'TodoList',
		props: ['todos'],

		components:
		{
			todo
		},

		computed:
		{
			completedTodos: function()
			{
				return this.todos.filter(function(todo){
					return todo.status==1
				})
			},

			uncompletedTodos: function()
			{
				return this.todos.filter(function(todo){
					return todo.status==0
				})
			}
		},

		methods:
		{
			deleteTodo: function(todo)
			{
				var todoIndex = this.todos.indexOf(todo);

				console.log(todo.id, todoIndex)

				this.todos.splice(todoIndex,1);

				Axios.post('http://localhost:8000/api/delete-todo',todo);

			},

			toggleTodo: function(todo)
			{
				if(todo.status==1)
					todo.status=0;
				else
					todo.status=1;

				Axios.post('http://localhost:8000/api/toggle-todo',todo)
			}
		}
	}
</script>


<style type="text/css">
	
</style>