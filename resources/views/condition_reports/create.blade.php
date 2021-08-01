
@extends('layouts/default')

{{-- Page title --}}
@section('title')
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

	      <form id="create-form" class="form-horizontal" method="post" action="{{ route('condition_reports.store') }}"  style="width: 1100px; align-items: center;   background-color: #fff; " autocomplete="off" role="form" >
                 {{ csrf_field() }}

	        <!-- box -->
	        <div class="box box-default">
	            <!-- box-header -->
	           <!-- box-header -->
              <div class="box-header with-border text-center">
                 <h3><b>Room Assets</b></h3>
                   
                </div><!-- /.box-header -->


	            <!-- box-body -->
	            <div class="box-body" style="padding-left: 50px;padding-right: 0px;">		                    
					<div class="form-row" style="padding-bottom:30px;">
					<div class="col-md-4 mb-3">
					    <label for="name" >Resident Name</label>
					    <select class="form-control" required="" id="resname" name="res_name" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Resident Name  --</option>
                          @foreach($residents as $resident)
                          <option value="{{ $resident->id }}"> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach
                        </select>
					   </div>
                      <div class="col-md-2 mb-2" style="width: 90px;">
					    <label for="name" >Room</label>
  	                    <input type="text" name="room" id="room" placeholder="No" class="form-control" readonly>					        	        

					   </div>
                     
                      <div class="col-md-3 mb-3">
					    <label for="name" >Date</label>
  	                    <input type="date" name="res_date" id="res_date" class="form-control" >					        	        
					   </div>
					       <div class="col-md-3 mb-3">
					    <label for="name" >Staff Name</label>
  	                     <select class="form-control" style="height: 26px;padding: 3px 10px;" id="res_name" name="stf_name">
                            <option>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}"> {{ $emp->name }}</option>
                          @endforeach
                        </select>
					  </div>
				    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				    
				    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				    
				    <div  class="form-row" style="padding-bottom:10px;">
				    	<div class="table-responsive">
				    		<button style="float: right;bottom: 50px; " class="btn  btn-primary text-right" 
						      id="addBtn" type="button">
						        <i class="fa fa-plus" aria-hidden="true"></i>
						    </button><br>
						      <table class="table table-bordered">
						        <thead>
						          <tr>
						            <th width="65px;" class="text-center">No</th>
						            <th width="150px;" class="text-center">Item / Furniture</th>
						            <th class="text-center">Owned By</th>
						            <th class="text-center">Condition</th>
						            <th class="text-center">Comments/Description</th>
						            <th class="text-center">Action</th>                                   
						          </tr>
						        </thead>
						        <tbody id="tbody">
						  
						        </tbody>
						      </table>
						    </div>
						    
						  </div>
                      <!--	<div class="col-md-2 mb-3" style="width: 90px;">
					    <label for="name"  >Item No</label>
  	                    <input type="text" name="item_no[]" id="item_no" value="1" class="form-control" placeholder="No" readonly>					        	        
					   </div>
					    <div class="col-md-2 mb-3 " style="width: 150px;">
					    <label for="name" >Item / Furniture</label>
  	                    <input type="text"  name="items[]" class="form-control" placeholder="Items">					        	        
					   </div>
					   <div class="col-md-2 mb-3">
					    <label for="name" >Owned By</label>
					     <select name="owned_by[]" class="form-control" style="height: 26px;padding: 3px 10px;"> 
                            <option value="" style="font-size: 14px;">---Select--</option> 
                            <option value="O" style="font-size: 14px;">Resident</option> 
                            <option value="F" style="font-size: 14px;">Facility</option> 
                        </select>
					   </div>
                    
                      <div class="col-md-2 mb-3">
					    <label for="name" >Condition</label>
  	                   		
  	                     <select name="res_cond[]"  class="form-control" style="height: 26px;padding: 3px 10px;"> 
                            <option value="" style="font-size: 14px;">---Select--</option> 
                            <option value="P" style="font-size: 14px;">Poor</option> 
                            <option value="G" style="font-size: 14px;">Good</option> 
                            <option value="R" style="font-size: 14px;">In need of repair</option> 

                        </select>
					   </div>
                      
					    <div class="col-md-4 mb-3" style="width: 200px;">
					    <label for="name" >Comments/Description</label>
  	                    <input type="text" name="res_comments[]" class="form-control" placeholder="Resident Comments">					        	       
					  </div>&nbsp;&nbsp;
					    <div class="col-md-4 mb-3" style="width: 50px;padding-top: 6px;left: 24px;">
                      <br>
				      <button style="color:white; background-color:#23536f; top: 5px;" id="addMore">+</button> 
				  </div>
				    </div>-->

					<!--  <div class="col-md-4 mb-3">
				    <div class="form-row">
                     			  
					  
					  <div class="col-md-4 mb-3">
					    <label for="name" >Resident Sign</label>
  	                    <input type="text" name="res_sign" class="form-control" placeholder="Resident Sign">					        	        
					   </div>
				    </div>--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				    </div>-->
				    <!--a<div class="form-row">
                       
					<div class="col-md-4 mb-3">
					    <label for="name" >Staff Sign</label>
  	                    <input type="text" name="st_sign" class="form-control" placeholder="Staff Sign">					        	        
					   </div>-->
					 
					<!-- <div class="col-md-4 mb-3">
					    <label for="name" >Company Id</label>
  	                
  	                     <select class="form-control" style="height: 26px;padding: 3px 10px;" required="" name="company_id" id="company_id">
                            <option>--Select Company ID --</option>
                          @foreach($companies as $company)
                          <option value="{{ $company->company_id }}" >{{ $company->company_id }}</option>
                          @endforeach
                        </select>				        	        
					  </div>-
				    
				    </div>-->
				    <div id="fieldList" style="padding-bottom: 20px;padding-top: 20px;">
				    </div>
				 
				
                      <!--<div class="col-md-4 mb-3">
					    <label for="name" >Location Id</label>
					    <select class="form-control" style="height: 26px;padding: 3px 10px;" required="" name="location_id" id="location_id">
					    	<option>--Select Location Id --</option>
					    </select>
					  </div>-->
				    
                    

				                       
				     <div class="box-footer text-right" style="padding-right:80px;">
					    <br><br><a class="btn btn-link text-left" href="{{ route('condition_reports.index') }}">Cancel</a>
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
$('#resname').change(function(){
    var id = $(this).val();
    var url = '{{ route("getDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#room').val(response.room_no);
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
<script type="text/javascript">
	$('#company_id').change(function(){
    var id = $(this).val();
    var url = '{{ route("getLocation", ":id") }}';
    url = url.replace(':id', id);
    output = [];

    $.ajax({
        url: url,
        type: 'get',
        sync: false,
        dataType: 'json',
        success: function(response){
            if(response != null){
              // $('#location_id').val(response.location_id);
                 //response.location_id.forEach(location =>
                    //$('#location_id').append(`<option value="${location.location_id}">${location.//location_id}</option>`)
                //)
                 //alert("success");
                response.locations.forEach(location =>
                	output.push(`<option lue="${location.location_id}">${location.location_id}</option>`)
                	)
//$('#location_id').append(`<option lue="${location.location_id}">${location.location_id}</option>`)
//                
              $('#location_id').html(output.join(''));
            }
            else{
            	alert("error");
            }
        }
    });
});
</script>
<script type="text/javascript">
	$(function() {
    output = [];
  $("#addMore").click(function(e) {
   // e.preventDefault();
   output.push(` &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="form-row"> <div class="col-md-2 mb-3" style="width: 90px;">  <input type="text" name="item_no[]" class="form-control" id="item_no" ></div>&nbsp;&nbsp;&nbsp;  <div class="col-md-3 mb-3" style="width: 150px;">  <input type="text" name="items[]" class="form-control" placeholder="Items"></div> &nbsp;&nbsp;&nbsp; <div class="col-md-2 mb-3"> <select name="owned_by[]" required class="form-control" style="height: 26px;padding: 3px 10px;">                             <option value="" style="font-size: 14px;">---Select--</option>                             <option value="O" style="font-size: 14px;">Resident</option>                            <option value="F" style="font-size: 14px;">Facility</option>                        </select>   </div>&nbsp;&nbsp;&nbsp;    <div class="col-md-2 mb-3">   <select name="res_cond[]" required class="form-control" style="height: 26px;padding: 3px 10px;">                             <option value="" style="font-size: 14px;">---Select--</option>                             <option value="P" style="font-size: 14px;">Poor</option>                             <option value="G" style="font-size: 14px;">Good</option>                             <option value="R" style="font-size: 14px;">In need of repair</option>          </select> 					   </div>  <div class="col-md-2 mb-3" style="width: 200px;">    <input type="text" name="res_comments[]" class="form-control" placeholder="Resident Comments">  </div> <button style="height:20px;background-color:white;color:red;"  class="delete btn "><i class="fa fa-trash icon-white"></i></button></div>  `);
    $("#fieldList").html(output.join(''));
  });

  $("body").on("click", ".delete", function (e) {
   $(this).parent("div").remove();


});

});

</script>
  <script>
    $(document).ready(function () {
  
      // Denotes total number of rows
      var rowIdx = 0;
  
      // jQuery button click event to add a row
      $('#addBtn').on('click', function () {
  
        // Adding a row inside the tbody.
        $('#tbody').append(`<tr id="R${++rowIdx}">
             <td class="row-index text-center">
             <input type="text" name="item_no[]" value="${rowIdx}" readonly>
             </td>
             <td class="row-index text-center">
             <input name="items[]" type="text" >
             </td>
             <td class="row-index text-center">
             <select name="owned_by[]" class="form-control" style="height: 26px;padding: 3px 10px;"> 
                <option value="" style="font-size: 14px;">---Select--</option> 
                <option value="O" style="font-size: 14px;">Resident</option> 
                <option value="F" style="font-size: 14px;">Facility</option> 
            </select>
             </td>
             <td class="row-index text-center">
             <select name="res_cond[]"  class="form-control" style="height: 26px;padding: 3px 10px;"> 
                            <option value="" style="font-size: 14px;">---Select--</option> 
                            <option value="P" style="font-size: 14px;">Poor</option> 
                            <option value="G" style="font-size: 14px;">Good</option> 
                            <option value="R" style="font-size: 14px;">In need of repair</option> 

                        </select>
             </td>
             <td class="row-index text-center">
             <input type="text" name="res_comments[]"  >
             </td>
             
              <td class="text-center">
                
                  <button style="height:20px;background-color:white;color:red;"  class="remove btn "><i class="fa fa-trash icon-white"></i></button>
                </td>
              </tr>`);
      });
  
      // jQuery button click event to remove a row.
      $('#tbody').on('click', '.remove', function () {
  
        // Getting all the rows next to the row
        // containing the clicked button
        var child = $(this).closest('tr').nextAll();
  
        // Iterating across all the rows 
        // obtained to change the index
        child.each(function () {
  
          // Getting <tr> id.
          var id = $(this).attr('id');
  
          // Getting the <p> inside the .row-index class.
          var idx = $(this).children('.row-index').children('p');
  
          // Gets the row number from <tr> id.
          var dig = parseInt(id.substring(1));
  
          // Modifying row index.
          idx.html(`Row ${dig - 1}`);
  
          // Modifying row id.
          $(this).attr('id', `R${dig - 1}`);
        });
  
        // Removing the current row.
        $(this).closest('tr').remove();
  
        // Decreasing total number of rows by 1.
        rowIdx--;
      });
    });
  </script>

@include ('partials.bootstrap-table')
@stop

