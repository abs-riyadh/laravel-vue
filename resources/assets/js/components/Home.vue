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
							<button class="btn btn-sm btn-info" @click="showUser(user.id,key)">Show</button>
							<button class="btn btn-sm btn-primary" @click="editUser(user.id,key)">Edit</button>
							<button class="btn btn-sm btn-danger" @click="deleteUser(user.id,key)">Delete</button>
						</td>
					</tr>	
				</tbody>
			</table>
		  </div>
		</div>
		<Add :openmodal="addActive" @closeRequest="close"></Add>
	</div>
</template>
<script>
let Add = require('./Add.vue');
export default{
	components: {Add},
	data(){
		return {
			users: {},
			errors: {},
			loading: false,
			addActive: ''
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
		close(){
			this.addActive = '';	
		},
		showAddModal(){

		},
		showUser(id,key){

		},
		editUser(id,key){

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