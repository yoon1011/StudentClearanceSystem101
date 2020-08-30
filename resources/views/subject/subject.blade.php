@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('level-link')
<section class="content-header">
    <h1>
        Subject
        <small>Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Subject></li>
    </ol>
</section>
@endsection
@section('main-content')

	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<h2>Subjects</h2>
						<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addsubject">Add new subject</button>
					</div>
					<div class="box-body">
						<table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
							    <tr>
							        <th>Subject</th>
							        <th>Code</th>
							        <th>...</th>
							    </tr>
							</thead>
							<tbody>
								@foreach($subjects as $sub)
							    <tr>
							        <td>{{$sub->subject}}</td>
							        <td>{{$sub->code}}</td>
							        <td>
							        	<a href="#" data-toggle="modal" data-target="#editsubject{{$sub->id}}">Edit</a>
							        	<a href="#" data-toggle="modal" data-target="#delsubject{{$sub->id}}">Delete</a>
							        	<a href="{{action('HomeController@section', $sub->id)}}">Manage</a>
							        </td>
							    </tr>
							    @endforeach
							<tfoot>
							    <tr>
							        <th>Subject</th>
							        <th>Code</th>
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
<div class="modal fade" id="addsubject">
  <div class="modal-dialog">
  	<form method="post" action="{{action('SubjectController@store')}}">
  		{{csrf_field()}}
	  	<div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Add new subject</h4>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	        	<label>Subject</label>
	        	<input type="text" name="subject" class="form-control" placeholder="Enter subject" required>
	        </div>
	        <div class="form-group">
	        	<label>Code</label>
	        	<input type="text" name="code" class="form-control" placeholder="Enter code" required>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-default pull-left" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-sm btn-primary">Save</button>
	      </div>
	    </div>	
  	</form>
  </div>
</div>
<!-- / -->
<!--Edit-->
@foreach($subjects as $sub)
<div class="modal fade" id="editsubject{{$sub->id}}">
  <div class="modal-dialog">
  	<form method="post" action="{{action('SubjectController@update', $sub->id)}}">
  		{{csrf_field()}}
  		<input type="hidden" name="_method" value="PATCH" />
	  	<div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Edit subject</h4>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	        	<label>Subject</label>
	        	<input type="text" value="{{$sub->subject}}" name="subject" class="form-control" placeholder="Enter subject" required>
	        </div>
	        <div class="form-group">
	        	<label>Code</label>
	        	<input type="text" value="{{$sub->code}}" name="code" class="form-control" placeholder="Enter code" required>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-default pull-left" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
	      </div>
	    </div>	
  	</form>
  </div>
</div>
@endforeach
<!-- / -->
<!--Edit-->
@foreach($subjects as $sub)
<div class="modal fade" id="delsubject{{$sub->id}}">
  <div class="modal-dialog">
  	<form method="post" action="{{action('SubjectController@update', $sub->id)}}">
  		{{csrf_field()}}
  		<input type="hidden" name="_method" value="DELETE" />
	  	<div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Delete subject</h4>
	      </div>
	      <div class="modal-body">
	        <p>Are you sure to delete {{$sub->subject}}</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-default pull-left" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-sm btn-danger">Continue</button>
	      </div>
	    </div>	
  	</form>
  </div>
</div>
@endforeach
<!-- / -->
@endsection

@section('all-ref')
<link rel="stylesheet" type="text/css" href="{{asset('css/jquery.dataTables.css')}}">
  
<script type="text/javascript" charset="utf8" src="{{asset('js/jquery.dataTables.js')}}"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>	
@endsection