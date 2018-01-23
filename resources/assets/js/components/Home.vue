<template>
	<div class="col-md-offset-2 col-md-8">
		<div class="panel panel-default">
		  <div class="panel-heading">
		  	User Details 
		  	<button class="btn btn-success btn-sm pull-right">Add New</button>
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
	</div>
</template>

<script>
	export default{
		data(){
			return {
				users: {},
				errors: {}
			}
		},
		created(){
			axios.get('/user/getUsers')
				.then((res)=>$this.users = res.data)
				.catch((error)=>this.error = error);
		},
		methods: {
			showUser(id,key){

			},
			editUser(id,key){

			},
			deleteUser(id,key){
				if (confirm('Are you sure?')) {
					axios.delete(`/user/${id}`)
						.then((res)=>$this.users = res.data)
						.catch((error)=>this.error = error.response.data.errors);
				}
			}
		}
	}
</script>