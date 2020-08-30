@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('level-link')
<section class="content-header">
    <h1>
        Section
        <small>Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('subject_')}}"> Subject</a></li>
        <li class="active">Section</li>
    </ol>
</section>
@endsection
@section('main-content')

	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-4">
				<div class="box">
					<div class="box-header">
						<h2>Subject: {{$subject->subject}}</h2>
						<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add section</button>
					</div>
					<div class="box-body">
						<h4>Sections</h4>
						<div class="tab">
							@if(count($sections) > 0)
							@foreach($sections as $sec)
							<button class="tablinks" onclick="openCity(event, '{{$sec->id}}')" id="defaultOpen">{{$sec->section}}</button>
					  		@endforeach
					  		@else
					  		<p>no section added.</p>
					  		@endif
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				@foreach($sections as $sec)
				<div id="{{$sec->id}}" class="tabcontent">
					<div class="box">
						<div class="box-header">
							<h2>Section {{$sec->section}}</h2>
							<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addclearance{{$sec->id}}">Add student</button>
						</div>
						<div class="box-body">
							<table id="example{{$sec->id}}" class="table table-striped table-bordered" style="width:100%">
								<thead>
								    <tr>
								        <th>Name</th>
								        <th>Status</th>
								        <th>Remark</th>
								        <th>...</th>
								    </tr>
								</thead>
								<tbody>
									@foreach($students->where('sec_id', $sec->id) as $stud)
								    <tr>
								        <td>{{DB::table('users')->where('id', $stud->stud_id)->first()->name}}</td>
								        <td>{{$stud->stat}}</td>
								        <td>{{$stud->remark}}</td>
								        <td>
								        	<a href="#" data-toggle="modal" data-target="#remove{{$stud->id}}">Remove</a>
								        	<a href="#" data-toggle="modal" data-target="#clearance{{$stud->id}}">Clearance</a>
								        </td>
								    </tr>
								    @endforeach
								</tbody>
								<tfoot>
								    <tr>
								        <th>Name</th>
								        <th>Status</th>
								        <th>Remark</th>
								        <th>...</th>
								    </tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
				@endforeach
				
			</div>
		</div>
	</div>
<!--ADD-->
<div class="modal fade" id="add">
  <div class="modal-dialog">
  	<form method="post" action="{{action('HomeController@addsection')}}">
  		{{csrf_field()}}
  		<input type="text" name="sub_id" value="{{$subject->id}}" hidden>
  	<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add new section</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
        	<label>Section</label>
        	<input type="text" name="section" class="form-control" placeholder="Enter section" required>
        </div>
        <div class="form-group">
        	<div class="row">
        		<div class="col-md-6">
	        		<label>Semester</label>
	        		<select class="form-control" name="sem">
	        			<option value="1">First</option>
	        			<option value="2">Second</option>
	        			<option value="3">Third</option>
	        		</select>
	        	</div>
	        	<div class="col-md-6">
	        		<label>Year</label>
	        		<input type="text" name="sy" class="form-control" placeholder="Enter year" required>
	        	</div>
        	</div>
        	
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
<!-- /-->
<!--Clearance-->
@foreach($sections as $sec)
<div class="modal fade" id="addclearance{{$sec->id}}">
  <div class="modal-dialog">
  	<form method="post" action="{{action('HomeController@addclearance')}}">
  		{{csrf_field()}}
  	<input type="text" name="sec_id" value="{{$sec->id}}" hidden>
  	<input type="text" name="sub_id" value="{{$subject->id}}" hidden>
  	<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add new student to {{$sec->section}}</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
        	<label>Select student</label>
        	<select class="form-control select2" name="stud_id" style="width: 100%;" required>
        		@foreach($users as $stud)
                <option value="{{$stud->id}}">{{$stud->name}}</option>
                @endforeach
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-sm btn-primary">Add</button>
      </div>
    </div>	
  	</form>
  </div>
</div>
@endforeach
<!-- /-->
<!--REMOVE-->
@foreach($students as $stud)
<div class="modal fade" id="remove{{$stud->id}}">
  <div class="modal-dialog modal-sm">
  	<form method="post" action="{{action('HomeController@remclearance', $stud->id)}}">
  		{{csrf_field()}}
  	<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove student</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure to remove {{DB::table('users')->where('id',$stud->stud_id)->first()->name}}?</p>
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
<!--/-->
<!--Clearance-->
@foreach($students as $stud)
<div class="modal fade" id="clearance{{$stud->id}}">
  <div class="modal-dialog">
  	<form method="post" action="{{action('HomeController@updataremak', $stud->id)}}">
  		{{csrf_field()}}
  	<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Student clearance</h4>
      </div>
      <div class="modal-body">
      	<div class="form-group">
      		<h4>Section: {{DB::table('sections')->where('id', $stud->sec_id)->first()->section}}</h4>
        	<h4>Name: {{DB::table('users')->where('id',$stud->stud_id)->first()->name}}</h4>
      	</div>
      	<div class="form-group">
      		<label>Status: </label>
      		@if ($stud->stat == 'ok')
		  	<label style="font-size: 26px;padding: 15px;"><input type="radio" id="f1" name="stat" value="ok" checked> Ok</label>
		  	<label style="font-size: 26px;padding: 15px;"><input type="radio" id="f1" name="stat" value="not ok"> not Ok</label>
		  	<label style="font-size: 26px;padding: 15px;"><input type="radio" id="f1" name="stat" value="drop"> Drop</label>
		  	@elseif ($stud->stat == 'not ok')
		  	<label style="font-size: 26px;padding: 15px;"><input type="radio" id="f1" name="stat" value="ok"> Ok</label>
		  	<label style="font-size: 26px;padding: 15px;"><input type="radio" id="f1" name="stat" value="not ok" checked> not Ok</label>
		  	<label style="font-size: 26px;padding: 15px;"><input type="radio" id="f1" name="stat" value="drop"> Drop</label>
		  	@elseif ($stud->stat == 'drop')
		  	<label style="font-size: 26px;padding: 15px;"><input type="radio" id="f1" name="stat" value="ok"> Ok</label>
		  	<label style="font-size: 26px;padding: 15px;"><input type="radio" id="f1" name="stat" value="not ok"> not Ok</label>
		  	<label style="font-size: 26px;padding: 15px;"><input type="radio" id="f1" name="stat" value="drop" checked> Drop</label>
		  	@endif
      	</div>
      	<div class="form-group">
      		<label>Remark:</label>
      		<textarea rows="3" name="remark" class="form-control" placeholder="Enter remark">{{$stud->remark}}</textarea>
      	</div>
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
<!--/-->
@endsection

@section('all-ref')

<style type="text/css">
	.tab button {
		display: block;
		  background-color: inherit;
		  color: black;
		  padding: 2px 8px;
		  width: 100%;
		  border: none;
		  outline: none;
		  text-align: left;
		  cursor: pointer;
		  transition: 0.3s;
		  font-size: 17px;
	}
	.tab button.active {
	  background-color: #ccc;
	}
</style>
<link rel="stylesheet" type="text/css" href="{{asset('css/jquery.dataTables.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('/css/select2.min.css')}}">  
<script type="text/javascript" charset="utf8" src="{{asset('js/jquery.dataTables.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('/js/select2.full.min.js')}}"></script>
<script>
$(document).ready(function() {
	@foreach($sections as $sec)
    $('#example{{$sec->id}}').DataTable();
    @endforeach
});
function openCity(evt, tabid) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabid).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
$(function () {
	$('.select2').select2()
})
</script>	
@endsection