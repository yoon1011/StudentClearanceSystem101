@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')

	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<h2>User Account</h2>
						<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addnew">Add new account</button>
					</div>
					<div class="box-body">
						<table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
							    <tr>
							        <th>Name</th>
							        <th>Email</th>
							        <th>Role</th>
							        <th>...</th>
							    </tr>
							</thead>
							<tbody>
								@foreach($users as $user)
							    <tr>
							        <td>{{$user->name}}</td>
							        <td>{{$user->email}}</td>
							        <td>{{$user->role}}</td>
							        <td>
							        	<a href="#" data-toggle="modal" data-target="#edit{{$user->id}}">edit</a>
							        	<a href="#" data-toggle="modal" data-target="#del{{$user->id}}">delete</a>
							        </td>
							    </tr>
							    @endforeach
							</tbody>
							<tfoot>
							    <tr>
							        <th>Name</th>
							        <th>Email</th>
							        <th>Role</th>
							        <th>...</th>
							    </tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--ADD-->
<div class="modal fade" id="addnew">
  <div class="modal-dialog">
  	<form method="post" action="{{action('UserController@store')}}">
  		{{csrf_field()}}
  		<div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Add new account</h4>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	        	<label>Name</label>
	        	<input type="text" name="name" class="form-control" placeholder="Enter name here" required>
	        </div>
	        <div class="form-group">
	        	<label>Email</label>
	        	<input type="email" name="email" class="form-control" placeholder="Enter email here" required>
	        </div>
	        <div class="form-group">
	        	<label>Password</label>
				<input type="password" name="password" class="form-control" id="passInpt" placeholder="Enter password here" required>
				<input type="checkbox" onclick="passFnctn()">Show Password
	        </div>
	        <div class="form-group">
	        	<label>Select Role: </label>
	        	<label><input type="radio" value="Admin" name="r1" class="minimal" checked> Admin</label>
	        	<label><input type="radio" value="Teacher" name="r1" class="minimal"> Teacher</label>
	        	<label><input type="radio" value="Student" name="r1" class="minimal"> Student</label>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm pull-left" data-dismiss="modal">Close</button> 
	        <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
	      </div>
	    </div>
  	</form>
    
  </div>
</div>
<!--/-->

<!--EDIT-->
@foreach($users as $user)
<div class="modal fade" id="edit{{$user->id}}">
  <div class="modal-dialog">
  	<form method="post" action="{{action('UserController@update', $user->id)}}">
  		{{csrf_field()}}
  		<input type="hidden" name="_method" value="PATCH" />
  		<div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Add new account</h4>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	        	<label>Name</label>
	        	<input type="text" value="{{$user->name}}" name="name" class="form-control" placeholder="Enter name here" required>
	        </div>
	        <div class="form-group">
	        	<label>Email</label>
	        	<input type="email" value="{{$user->email}}" name="email" class="form-control" placeholder="Enter email here" required>
	        </div>
	        <div class="form-group">
	        	<label>New Password</label>
				<input type="password" name="password" class="form-control" id="passInpt" placeholder="Enter password here">
				<input type="checkbox" onclick="passFnctn()">Show Password
	        </div>
	        <div class="form-group">
	        	<label>Select Role: </label>
	        	@if ($user->role == 'Teacher')
	        	<label><input type="radio" value="Admin" name="r1" class="minimal"> Admin</label>
	        	<label><input type="radio" value="Teacher" name="r1" class="minimal" checked> Teacher</label>
	        	<label><input type="radio" value="Student" name="r1" class="minimal"> Student</label>
	        	@elseif ($user->role == 'Student')
	        	<label><input type="radio" value="Admin" name="r1" class="minimal"> Admin</label>
	        	<label><input type="radio" value="Teacher" name="r1" class="minimal"> Teacher</label>
	        	<label><input type="radio" value="Student" name="r1" class="minimal" checked> Student</label>
	        	@else
	        	<label><input type="radio" value="Admin" name="r1" class="minimal" checked> Admin</label>
	        	<label><input type="radio" value="Teacher" name="r1" class="minimal"> Teacher</label>
	        	<label><input type="radio" value="Student" name="r1" class="minimal"> Student</label>
	        	@endif
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm pull-left" data-dismiss="modal">Close</button> 
	        <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
	      </div>
	    </div>
  	</form>
  </div>
</div>
@endforeach
<!--/-->


<!--EDIT-->
@foreach($users as $user)
<div class="modal fade" id="del{{$user->id}}">
  <div class="modal-dialog">
  	<form method="post" action="{{action('UserController@destroy', $user->id)}}">
  		{{csrf_field()}}
  		<input type="hidden" name="_method" value="DELETE" />
  		<div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Delete account</h4>
	      </div>
	      <div class="modal-body">
	        <p>Are you sure to delete {{$user->name}}?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm pull-left" data-dismiss="modal">Close</button> 
	        <button type="submit" class="btn btn-sm btn-danger">Continue</button>
	      </div>
	    </div>
  	</form>
  </div>
</div>
@endforeach
<!--/-->
@endsection

@section('all-ref')
<link rel="stylesheet" type="text/css" href="{{asset('css/jquery.dataTables.css')}}">
  
<script type="text/javascript" charset="utf8" src="{{asset('js/jquery.dataTables.js')}}"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
});
function passFnctn() {
  var x = document.getElementById("passInpt");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>	
@endsection