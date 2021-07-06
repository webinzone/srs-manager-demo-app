
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

         <form id="create-form" class="form-horizontal" method="post" action = "{{ route ('room_details.update', $room_detail->id) }}" style="width: 650px; align-items: center;   background-color: #fff; " autocomplete="off" role="form" >
            @method('PATCH') 

                 {{ csrf_field() }}
            <!-- box -->
      
            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
               <!-- box-header -->
              <div class="box-header with-border text-center">
                 <h3><b>Room Details</b></h3>
                   
                </div><!-- /.box-header -->


                <!-- box-body -->
                <div class="box-body" style="padding-left: 50px;padding-right: 50px;">                          
                    <div class="form-row" >
                        <div class="col-md-2 mb-3" style="width: 90px;height: 30px;" >
                           <label for="name" >Room No</label>
                           <input type="text" value="{{ $room_detail->room_no}}"  name="room_no" id="room_no" class="form-control" placeholder="Room No" readonly value="">                           
                         </div>

                      <div class="col-md-3 mb-3" >
                        <label for="name" >Room Type</label>
                        <select class="form-control" style="width: 200px;"  id="type" name="type" style="height: 20px;padding: 3px 10px;">
                            <option>--   Select Room Type  --</option>
                         
                          <option {{ $room_detail->type == "A/C" ? 'selected' : ''  }} value="A/C"> A/C</option>
                          <option {{ $room_detail->type == "Non A/C" ? 'selected' : ''  }} value="Non A/C">Non A/C</option>
                        </select>
                       </div>

                         <div class="col-md-7 mb-3" >
                          <label for="name" >Client Type</label>
                          <select class="form-control" style="width: 200px;"  name="client_type" >
                                        <option>--   Select Client Type  --</option>
                                     
                                      <option {{ $room_detail->client_type == "Guest" ? 'selected' : ''  }}  value="Guest">Guest</option>
                                      <option {{ $room_detail->client_type == "Resident" ? 'selected' : ''  }}  value="Resident">Resident</option>
                                      <option {{ $room_detail->client_type == "Employee" ? 'selected' : ''  }}  value="Employee">Employee</option>
                                    </select>
                         </div>
                                 
                    
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <div  class="form-row" >
                       
                        <div class="col-md-3 mb-3 " >
                          <label for="name"  >Room Status</label>
                        <select name="status" class="form-control" style="height: 26px;padding: 3px 10px;"> 
                            <option value="" style="font-size: 14px;">---  Select Status  ---</option> 
                            <option value="Booked" {{ $room_detail->status == "Booked" ? 'selected' : ''  }} style="font-size: 14px;">Booked</option> 
                            <option value="Free" {{ $room_detail->status == "Free" ? 'selected' : ''  }} style="font-size: 14px;">Free</option> 
                        </select>                           
                          </div>
                      <div class="col-md-2 mb-3" style="width: 100px;">
                        <label for="name" >Beds No</label>
                        <input type="text" value="{{ $room_detail->beds_no}}" name="beds_no" class="form-control" placeholder="No">                                       
                     </div>&nbsp;&nbsp;
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
@include ('partials.bootstrap-table')
@stop

