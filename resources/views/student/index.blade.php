<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	

	<div class="wrap-table shadow">
		<div class="card">
			<a  id="add_student" class="btn btn-primary" href="#">Add New</a>
			<div class="card-body">
				<h2>All Data</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="student_data">
				
					</tbody>
				</table>
			</div>
		</div>
	</div>


	<div id="student_modal" class="modal fade">
		<div class="modal-dialog modal-dialog-centered">
			
			<div class="modal-content">
				<div class="modal-header">
					<h2>Add New Student</h2>
					<button class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="msg">
					</div>
					<form id="student_form" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Name</label>
							<input name="name" type="text" class="form-control">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input name="email" type="email" class="form-control">
						</div>
						<div class="form-group">
							<label>Cell</label>
							<input name="cell" type="text" class="form-control">
						</div>
						<div class="form-group">
							<input name="photo" type="file">
						</div>
						<div class="text-left">
							<input type="submit" class="btn btn-primary" value="Add">
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>

	<div id="student_edit_modal" class="modal fade">
		<div class="modal-dialog modal-dialog-centered">
			
			<div class="modal-content">
				<div class="modal-header">
					<h2>Edit Student Data</h2>
					<button class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="msg">
					</div>
					<form id="student_form" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Name</label>
							<input name="name" type="text" class="form-control">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input name="email" type="email" class="form-control">
						</div>
						<div class="form-group">
							<label>Cell</label>
							<input name="cell" type="text" class="form-control">
						</div>
						<div class="form-group">
							<input name="photo" type="file">
						</div>
						<div class="text-left">
							<input type="submit" class="btn btn-primary" value="Add">
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>





	<div id="student_show_modal" class="modal fade">
		<div class="modal-dialog modal-dialog-centered">
			
			<div class="modal-content">
				<div class="modal-header">
					<h2>Student Profile</h2>
					<button class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
				<img src="{{URL::to('media/img/photo-1470129360498-ab39dc4e05d6.webp')}}" alt="">
				<table>
					<tr>
						<td>Name</td>
						<td>Name</td>
					</tr>
				</table>

			
			

				</div>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->

	<script src="{{url('assets')}}/js/jquery-3.4.1.min.js"></script>
	<script src="{{url('assets')}}/js/popper.min.js"></script>
	<script src="{{url('assets')}}/js/bootstrap.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="{{url('assets')}}/js/custom.js"></script>
</body>
</html>