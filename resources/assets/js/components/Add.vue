<template>
	<!-- Modal -->
	<div class="modal fade in" :class="openmodal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">User Registration</h4>
	      </div>
	      <div class="modal-body">
	        	<form class="form form-horizontal">
	        		<div class="form-group">
	        			<label class="col-md-3">Name</label>
	        			<div class="col-md-6">
	        				<input type="text" name="name" class="form-control" v-model="user.name">
	        				<span v-if="errors.name" class="text text-danger">{{errors.name[0]}}</span>
	        			</div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3">Email</label>
	        			<div class="col-md-6">
	        				<input type="text" name="email" class="form-control" v-model="user.email">
	        				<span v-if="errors.name" class="text text-danger">{{errors.name[0]}}</span>
	        			</div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3">Password</label>
	        			<div class="col-md-6">
	        				<input type="text" name="password" class="form-control" v-model="user.password">
	        				<span v-if="errors.password" class="text text-danger">{{errors.password[0]}}</span>
	        			</div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3"></label>
	        			<div class="col-md-6">
	        				<button class="btn btn-sm btn-primary"  @click.prevent="save">Save</button>
	        			</div>
	        		</div>
	        	</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal" @click="close">Close</button>
		      </div>
	    </div>
	  </div>
	</div>
</template>
<script>
export default {
	props: ['openmodal'],
	data(){
		return {
			user: {
				name: '',
				email: '',
				password: '',
			},
			errors:{}
		}
	},
	methods: {
		close(){
			this.$emit('closeRequest');
		},
		save(){
			axios.post('/user',this.$data.user)
			.then((res)=> {
				this.close();
				this.$parent.users.push(this.$data.user);
			})
			.catch((error)=> {
				this.errors = error.response.data.errors;
			});
		}
	}
}
</script>