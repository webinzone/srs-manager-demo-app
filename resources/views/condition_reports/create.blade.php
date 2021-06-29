
@extends('layouts/default')

{{-- Page title --}}
@section('title')
Condition Report
@parent
@stop
@section('header_right')
    @can('create', \App\Models\ConditionReport::class)
        <a href="{{ route('condition_reports.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

@section('inputFields')

{{-- Page content --}}
@section('content')
<div id="webui">
  
	<div class="row">
	    <!-- col-md-8 -->
	    <div class=" col" style="padding-left: 100px;">

	      <form id="create-form" class="form-horizontal" method="post" action="{{ route('condition_reports.store') }}"  style="width: 1000px; align-items: center;   background-color: #fff; " autocomplete="off" role="form" >
                 {{ csrf_field() }}

	        <!-- box -->
	        <div class="box box-default">
	            <!-- box-header -->
	           
	            <!-- box-body -->
	            <div class="box-body">		                    
					<div class="form-row">
                      <div class="col-md-4 mb-3">
					    <label for="name" >Room</label>
  	                    <input type="text" name="room" class="form-control" placeholder="Room">
        
					   </div>
                      <div class="col-md-4 mb-3">
					    <label for="name" >Items</label>
  	                    <input type="text" name="items" class="form-control" placeholder="Items">					        	        
					   </div>
                      <div class="col-md-4 mb-3">
					    <label for="name" >Resident Name</label>
  	                    <input type="text" name="res_name" class="form-control" placeholder="Resident Name">					        	        
					   </div>
				    </div>&nbsp;&nbsp;&nbsp;
				    <div class="form-row">
                      <div class="col-md-4 mb-3">
					    <label for="name" >Staff Name</label>
  	                    <input type="text" name="stf_name" class="form-control" placeholder="Staff Name">					        	        
					  </div>
                      <div class="col-md-4 mb-3">
					    <label for="name" >Date</label>
  	                    <input type="date" name="res_date" class="form-control" placeholder="Date">					        	        
					   </div>
                      <div class="col-md-4 mb-3">
					    <label for="name" >Item No</label>
  	                    <input type="text" name="item_no" class="form-control" placeholder="Item No">					        	        
					   </div>
				    </div>&nbsp;&nbsp;&nbsp;
				    <div class="form-row">
                      <div class="col-md-4 mb-3">
					    <label for="name" >Resident Comments</label>
  	                    <input type="text" name="res_comments" class="form-control" placeholder="Resident Comments">					        	        
					  </div>
					  <div class="col-md-4 mb-3">
					    <label for="name" >Owned By</label>
  	                    <input type="text" name="owned_by" class="form-control" placeholder="Owned By">					        	        
					   </div>
					  <div class="col-md-4 mb-3">
					    <label for="name" >Condition</label>
  	                    <input type="text" name="res_cond" class="form-control" placeholder="Condition">					        	        
					   </div>
				    </div>&nbsp;&nbsp;&nbsp;
				    <div class="form-row">
                       <div class="col-md-4 mb-3">
					    <label for="name" >Resident Sign</label>
  	                    <input type="text" name="res_sign" class="form-control" placeholder="Resident Sign">					        	        
					   </div>
					<div class="col-md-4 mb-3">
					    <label for="name" >Staff Sign</label>
  	                    <input type="text" name="st_sign" class="form-control" placeholder="Staff Sign">					        	        
					   </div>
					 <div class="col-md-4 mb-3">
					    <label for="name" >Company Id</label>
  	                    <input type="text" name="company_id" class="form-control" placeholder="Company Id">					        	        
					  </div>
				    </div>&nbsp;&nbsp;&nbsp;
				    <div class="form-row">
                      <div class="col-md-4 mb-3">
					    <label for="name" >Location Id</label>
  	                    <input type="text" name="location_id" class="form-control" placeholder="Location Id">					        	        
					  </div>
				    </div>
                   </div>
				     <div class="box-footer text-right">
					    <a class="btn btn-link text-left" href="{{ route('condition_reports.index') }}">Cancel</a>
					    <button type="submit" class="btn btn-primary"><i class="fa fa-check icon-white" aria-hidden="true"></i> Save</button>
					</div>

				</div> <!-- ./box-body -->
						    <!-- col-md-8 -->

			    </div><!-- ./row -->
     </form>
</div>
@stop

@section('moar_scripts')
@include ('partials.bootstrap-table')
@stop

