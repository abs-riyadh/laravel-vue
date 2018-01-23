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
					<tr>
						<td>Sl NO</td>
						<td>Name</td>
						<td>Email</td>
						<td>
							<button class="btn btn-sm btn-info">Show</button>
							<button class="btn btn-sm btn-primary">Edit</button>
							<button class="btn btn-sm btn-danger">Delete</button>
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
				users
			}
		}
	}
</script>