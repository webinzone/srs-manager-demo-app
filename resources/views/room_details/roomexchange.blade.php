
@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
    @can('create', \App\Models\RoomDetail::class)
        <a href="{{ route('room_details.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

@section('inputFields')

{{-- Page content --}}
@section('content')
<div id="webui">
  
	<div class="row">
	    <!-- col-md-8 -->
	    <div class=" col" style="padding-left: 300px;">

	      <form id="create-form" class="form-horizontal" method="get" action="{{ route('exchange') }}"  style="width: 650px; align-items: center;   background-color: #fff; " autocomplete="off" role="form" >

	        <!-- box -->
	        <div class="box box-default">
	            <!-- box-header -->
	           <!-- box-header -->
              <div class="box-header with-border text-center">
                 <h3><b>Exchange Room </b></h3>
                   
                </div><!-- /.box-header -->


	            <!-- box-body -->
	            <div class="box-body" style="padding-left: 50px;padding-right: 50px;">		                    
					<div class="form-row" >
                      <div class="col-md-4 mb-3" >
                       <label>Resident Name</label>
                        <select class="form-control" required="" id="resi_name" name="res_name" style="height: 26px;padding: 3px 10px;width: 250px;">
                        <option>--   Select Resident Name  --</option>
                          @foreach($residents as $resident)
                          <option value="{{ $resident->id }}"> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach
                        </select>                
                      </div>
                      <div class="col-md-2 mb-2" >
                        <label for="name" >Current Room</label>
                        <input type="text" name="room" id="room" placeholder="Room" class="form-control" readonly>                                        

                       </div>
                       <div class="col-md-6 mb-2" style="width:90px;" >
                        <label for="name" >Bed</label>
                        <input type="text" name="room" id="bed" placeholder="Bed" class="form-control" readonly>                                        

                       </div>
                     </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="form-row" >

                      <div class="col-md-3 mb-3">
                         <label for="name" >Room No</label>
                         <select class="form-control" required  id="room_no" name="room_no" style="height: 26px;padding: 3px 10px;">
                            <option value="">--Select Room--</option>
                          @foreach($rooms as $room)
                          <option value="{{ $room->id }}"> &nbsp;&nbsp;&nbsp;{{ $room->room_no}}&nbsp;&nbsp;&nbsp; </option>
                          @endforeach
                        </select>              
                      </div>
					  <div class="col-md-3 mb-3" >
					    <label for="name" >Bed No</label>
					    
                         <select class="form-control" required  id="bednos" name="bed" style="height: 26px;padding: 3px 10px;">
                            <option value="">--Select Bed--</option>
                            
                        </select>
					   </div>

                       &nbsp;&nbsp;
                      <br>
             
                 </div>
            </div>



				                       
				     <div class="box-footer text-right" style="padding-right:50px;">
					    <br><br><a class="btn btn-link text-left"  href="{{ route('room_details.index') }}">Cancel</a>
					    <button type="submit" class="btn btn-primary"><i class="fa fa-check icon-white" aria-hidden="true"></i> Save</button>
					</div>

				</div> <!-- ./box-body -->
						    <!-- col-md-8 -->

			    </div><!-- ./row -->
     </form>
</div>
</div>
@stop

@section('moar_scripts')
<script>
  $('#room_no').change(function(){
    var id = $(this).val();
    var url = '{{ route("getBed", ":id") }}';
    url = url.replace(':id', id);
    output = [];

    $.ajax({
        url: url,
        type: 'get',
        sync: false,
        dataType: 'json',
        success: function(response){
            if(response != null){
          
                response.beds.forEach(bed =>
                  output.push(`<option value="${bed.bed_no}" >${bed.bed_no}</option>`)
                  )
               
              $('#bednos').html(output.join(''));
            }
            else{
              alert("error");
            }
        }
    });
});
</script>
<script>
$('#resi_name').change(function(){
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
                $('#bed').val(response.bed_no);
            }
            else{
                alert("error");
            }
        }
    });
});
</script>


@include ('partials.bootstrap-table')
@stop

