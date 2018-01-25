<template>
	<div class="col-md-offset-2 col-md-8">
		<div class="panel panel-default">
		  <div class="panel-heading">
		  	User Details 
		  	<button v-if="loading" class="btn btn-primary btn-sm pull-right"> <i class="glyphicon glyphicon-refresh"></i></button> &nbsp;
		  	<button class="btn btn-success btn-sm pull-right" @click="openAdd">Add New </button>
		  </div>
		  <div class="panel-body">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Sl NO</th>
						<th>Name</th>
						<th>Email</th>
						<th width="25%">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="user,key in users">
						<td>{{key+1}}</td>
						<td>{{user.name}}</td>
						<td>{{user.email}}</td>
						<td>
							<button class="btn btn-sm btn-info" @click="openShow(key)">Show</button>
							<button class="btn btn-sm btn-primary" @click="editShow(key)">Edit</button>
							<button class="btn btn-sm btn-danger" @click="deleteUser(user.id,key)">Delete</button>
						</td>
					</tr>	
				</tbody>
			</table>
		  </div>
		</div>
		<Add :openmodal="addActive" @closeRequest="close"></Add>
		<Show :openmodal="showActive" @closeRequest="close"></Show>
		<Edit :openmodal="editActive" @closeRequest="close"></Edit>
	</div>
</template>
<script>
let Add = require('./Add.vue');
let Show = require('./Show.vue');
let Edit = require('./Edit.vue');
export default{
	components: {Add,Show,Edit},
	data(){
		return {
			users: {},
			errors: {},
			loading: false,
			addActive: '',
			showActive: '',
			editActive: ''
		}
	},
	mounted: function(){
		this.loading = !this.loading; 
		axios.get('/user/getUsers')
			.then((res)=> {
				this.loading = !this.loading;
				this.users = res.data;
			})
			.catch((error)=> {
				this.loading = !this.loading;
				this.error = error.response.data.errors;
			});
	},
	methods: {
		openAdd(){
			this.addActive = 'show';
		},		
		openShow(key){
			this.$children[1].user = this.users[key];
			this.showActive = 'show';
		},
		editShow(key){
			this.$children[2].user = this.users[key];
			this.editActive = 'show';
		},
		close(){
			this.addActive = this.showActive = this.editActive = '';	
		},
		deleteUser(id,key){
			this.loading = !this.loading;
			if (confirm('Are you sure?')) {
				axios.delete(`/user/${id}`)
					.then((res)=>{
						this.users.splice(key,1);
						this.loading = !this.loading;
					})
					.catch((error)=>{
						this.loading = !this.loading;
						this.error = error.response.data.errors;
					});
			}
		}
	}
}
</script>