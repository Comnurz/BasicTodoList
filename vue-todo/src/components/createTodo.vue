<template>
	<div>

		<button class="button success" v-on:click="openForm" v-show="!isCreating">Create ToDo</button>

		<div class="createtodo" v-show="isCreating">
			
			<input type="text" placeholder="Enter title" v-model="titleText" ref="title">
			<textarea type="" placeholder="Enter description" v-model="descriptionText" ref="project"></textarea>

			<button class="button success" v-on:click="sendForm">Create</button>
			<button class="button alert" v-on:click="closeForm">Cancel</button>

		</div>


	</div>
</template>


<script>
	export default
	{
		name: 'createTodo',

		data: function()
		{
			return{
				isCreating:false,
				titleText:'',
				descriptionText:''
			}
		},

		methods:
		{
			button: function()
			{
				if  (this.isCreating==true)
					this.isCreating=false
				else
					this.isCreating=true

				this.titleText="";
				this.descriptionText="";
			},

			openForm: function()
			{
				this.button();
			},

			closeForm: function()
			{
				this.button();
			},

			sendForm: function()
			{
				var title= this.titleText;
				var description=this.descriptionText;
				this.$emit('create-todo',{
					title,description,status: 0
				});
				this.button();		
			}
		}
	}
	
</script>


<style>
	
</style>