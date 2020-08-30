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
						<h2>Teachers</h2>
					</div>
					<div class="box-body">
            <input class="form-control" style="margin: 5px;" id="myInput" type="text" placeholder="Search..">
						<div class="tab myDIV">
							@if(count($users) > 0)
							@foreach($users as $tec)
							<button class="tablinks" onclick="openCity(event, '{{$tec->id}}')" id="defaultOpen">{{$tec->name}}</button>
				  		@endforeach
				  		@else
				  		<p>no teacher added.</p>
				  		@endif
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				@foreach($users as $tec)
				<div id="{{$tec->id}}" class="tabcontent">
					<div class="box">
						<div class="box-header">
							<h2>Subjects</h2>
							<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addsub{{$tec->id}}">Add subject</button>
						</div>
						<div class="box-body">
							<table id="example{{$tec->id}}" class="table table-striped table-bordered" style="width:100%">
								<thead>
							    <tr>
						        <th>Subject</th>
						        <th>Code</th>
                    <th>Sem/Year</th>
						        <th>...</th>
							    </tr>
								</thead>
								<tbody>
									@foreach($subjects->where('tec_id', $tec->id) as $sub)
							    <tr>
						        <td>{{DB::table('subjects')->where('id', $sub->sub_id)->first()->subject}}</td>
						        <td>{{DB::table('subjects')->where('id', $sub->sub_id)->first()->code}}</td>
                    <td>
                      @if ($sub->sem == '1')
                      1st
                      @elseif ($sub->sem == '2')
                      2nd
                      @elseif ($sub->sem == '3')
                      3rd
                      @endif 
                      term {{$sub->sy}}
                    </td>
						        <td>
						        	<a href="#" data-toggle="modal" data-target="#remove{{$sub->id}}">Remove</a>
						        </td>
							    </tr>
								  @endforeach
								</tbody>
								<tfoot>
							    <tr>
							      <th>Subject</th>
                    <th>Code</th>
                    <th>Sem/Year</th>
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
@foreach($users as $tec)
<div class="modal fade" id="addsub{{$tec->id}}">
  <div class="modal-dialog">
    <form method="post" action="{{action('HomeController@insertsub')}}">
      {{csrf_field()}}
      <input type="hidden" value="{{$tec->id}}" name="tec_id">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add subject to {{DB::table('users')->where('id', $tec->id)->first()->name}}</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Select subject</label>
            <select class="form-control select2" name="sub_id" style="width: 100%;">
              @foreach($sublists as $list)
              <option value="{{$list->id}}">{{$list->subject}}</option>
              @endforeach
            </select>
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
@endforeach
<!-- / -->
<!--Remove-->
@foreach($subjects as $sub)
<div class="modal fade" id="remove{{$sub->id}}">
  <div class="modal-dialog">
    <form method="post" action="{{action('HomeController@removesub', $sub->id)}}">
      {{csrf_field()}}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Remove subject</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure to remove {{DB::table('subjects')->where('id', $sub->sub_id)->first()->subject}}?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-primary">Save</button>
        </div>
      </div>  
    </form>
  </div>
</div>
@endforeach
<!---->
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
	@foreach($users as $tec)
    $('#example{{$tec->id}}').DataTable();
  @endforeach
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myDIV *").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
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