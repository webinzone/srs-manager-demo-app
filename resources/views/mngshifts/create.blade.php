
@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
    @can('create', \App\Models\Mngshift::class)
        <a href="{{ route('mngshifts.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

@section('inputFields')

{{-- Page content --}}
@section('content')
<div id="webui">
  
	<div class="row">
	    <!-- col-md-8 -->
	    <div class=" col" style="padding-left: 100px;">

	      <form id="create-form" class="form-horizontal" method="post" action="{{ route('mngshifts.store') }}"  style="width: 1050px; align-items: center;   background-color: #fff; " autocomplete="off" role="form" >
                 {{ csrf_field() }}

	        <!-- box -->
	        <div class="box box-default">
	            <!-- box-header -->
	           <!-- box-header -->
              <div class="box-header with-border text-center">
                 <h3><b>Morning Shift - Evening Shift</b></h3>
                   
                </div><!-- /.box-header -->


	            <!-- box-body -->
	            <div class="box-body" style="padding-left: 60px;padding-right: 0px;">		                    
					<div class="form-row" style="padding-bottom:30px;">
					<div class="col-md-6 mb-3">
					    <label for="name" >Morning staff</label>
  	                     <select class="form-control" style="height: 26px;padding: 3px 10px;" id="mng_staff" name="mng_staff">
                            <option>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}"> {{ $emp->name }}</option>
                          @endforeach
                        </select>
					  </div>
                      <div class="col-md-6 mb-3" >
					   <label for="name" >Evening staff</label>
  	                     <select class="form-control" style="height: 26px;padding: 3px 10px;" id="evng_staff" name="evng_staff">
                            <option>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}"> {{ $emp->name }}</option>
                          @endforeach
                        </select>
					  </div>

					 </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     
                     <div class="form-row">
					  <div class="col-md-6 mb-6">
					    <label for="name" >Resident Name</label>
					    <select class="form-control" required="" id="resi_name" name="res_name" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Resident Name  --</option>
                          @foreach($residents as $resident)
                          <option value="{{ $resident->id }}"> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach
                        </select>				        	        
					   </div>
					   <div class="col-md-6 mb-6">
                        <label for="name" >Room No</label>
                        <input type="text" name="room" id="rooms" class="form-control" readonly>
                      </div>
				    </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				    <div class="form-row" >
					  <div class="col-md-6 mb-6">
					  	<label for="name" >Note</label>
  	                    <textarea name="notes" id="notes" class="form-control" ></textarea>					        	        
					   </div>
					   <div class="col-md-6 mb-6">
					  	<label for="name" >Date</label>
  	                    <input type="date" name="mng_date" id="res_date" class="form-control" >					        	        
					   </div>
					</div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				    
                    

				                       
				     <div class="box-footer text-right" style="padding-right:80px;">
					    <br><br><a class="btn btn-link text-left" href="{{ route('mngshifts.index') }}">Cancel</a>
					    <button type="submit" class="btn btn-primary"><i class="fa fa-check icon-white" aria-hidden="true"></i> Save</button>
					</div>

				</div> <!-- ./box-body -->
						    <!-- col-md-8 -->

			    </div><!-- ./row -->
     </form>
</div>
@stop

@section('moar_scripts')
<script>
$('#resi_name').change(function(){
    var id = $(this).val();
    var url = '{{ route("getRSAclientDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#rooms').val(response.room_no);                    
                   

            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script type="text/javascript">
	Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
})
	$(document).ready( function() {
    $('#res_date').val(new Date().toDateInputValue());
});
</script>
@include ('partials.bootstrap-table')
@stop
