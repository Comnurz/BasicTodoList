<template>
	<div class="todo">
		<div class="row">
			
			<div class="columns large-1">
				<button class="todo-complete-icon" :class="{completed: todo.status==1}" @click="toggleTodo(todo)"></button>
			</div>

			<div class="columns large-11" v-show="!editing">
				<h3>{{todo.title}}</h3>
				<small>{{todo.description}}</small>

				<br/><button class="button alert" v-on:click="deleteTodo(todo)">
					Delete
				</button>
				<button class="button primary" v-on:click="showForm">update</button>
			</div>

			<div class="columns large-11" v-show="editing">
							
				<input type="text" placeholder="Enter title" v-model="todo.title" ref="title">
				<textarea type="" placeholder="Enter description" v-model="todo.description" ref="project"></textarea>

				<button class="button success" v-on:click="updateTodo(todo.id,todo.title,todo.description,todo.status)">Update</button>
				<button class="button alert" v-on:click="closeForm">Cancel</button>		
			</div>
			
		</div>
	</div>
</template>


<script type="text/javascript">
	import Axios from 'axios'

	export default
	{
		name: 'todo',
		props: ['todo'],

		data: function()
		{
			return{editing: false}
		},

		methods:
		{
			deleteTodo: function(todo)
			{
				this.$emit('delete-todo',todo)
			},

			toggleTodo: function(todo)
			{
				this.$emit('toggle-todo',todo)
			},

			updateTodo: function(id,title,description,status)
			{
				var data={
					id: id,
					title: title,
					description: description,
					status: status
				}

				Axios.post('http://localhost:8000/api/update-todo',data)

				this.editing=false
			},

			closeForm: function()
			{
				this.editing=false
			},

			showForm: function()
			{
				this.editing=true
			},
		},
	}
</script>


<style>
	.todo
	{
        padding: 20px;
        border: 1px solid #ccc;
        margin-bottom: 20px;
    }
    .todo-complete-icon
    {
        width: 30px;
        height: 30px;
        border: 2px solid #ccc;
        border-radius: 50%;
        margin-right: 40px;
        margin-top: 10px;
        position: relative;
        cursor: pointer;
    }
    .todo-complete-icon.completed
    {
        border-color: #00c996;
    }
    .todo-complete-icon.completed:before
    {
        content: "\2714";
        font-size: 36px;
        position: absolute;
        top:-10px;
        left:4px;
        color: #00c996;
    }
	
</style>