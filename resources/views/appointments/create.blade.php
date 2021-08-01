
@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
    @can('create', \App\Models\Appointment::class)
        <a href="{{ route('appointments.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

@section('inputFields')

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('appointments.store') }}" autocomplete="off" role="form" style="width: 800px;">
                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
                <div class="box-header with-border text-center">
                   <h3><b>Appointment</b></h3>
                   
                </div><!-- /.box-header -->

                <!-- box-body -->
                <div class="box-body" style="padding-left: 40px;padding-right: 40px;">                          
                    <div class="form-group ">
                      <div class="col-md-4 mb-3">
                        <label>Name of the resident</label>
                        <select class="form-control" required="" id="res_name" name="res_name" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Resident Name  --</option>
                          @foreach($residents as $resident)
                          <option value="{{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}"> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach
                        </select>                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="app_date">Date</label>
                        <input type="date" class="form-control" placeholder="Date" id="res_date" name="app_date"  v-on:change="page_one.app_date = $event.target.value">                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="app_time">Time</label>
                        <input type="time" class="form-control" placeholder="Time" id="app_time" name="app_time" style="height:25px;" v-on:change="page_one.app_time = $event.target.value">                
                      </div>                        
                    </div>
                    <div class="form-group ">
                        <div class="col-md-4 mb-3">
                        <label for="app_address">Address</label>
                        <input type="text" class="form-control" placeholder="Address" id="app_address" name="app_address"  v-on:change="page_one.app_address = $event.target.value">          
                        </div>

                        <div class="col-md-4 mb-3">
                        <label for="app_with">Appointment with</label>
                        <input type="text" class="form-control" placeholder="Appointment with" id="app_with" name="app_with"  v-on:change="page_one.app_with = $event.target.value">                
                      </div>                        

                    <div class="col-md-4 mb-3">
                        <label for="app_reason">Reason </label>
                        <input type="text" class="form-control" placeholder="Reason of the booked appointment" id="app_reason" name="app_reason"  v-on:change="page_one.app_reason = $event.target.value">                
                      </div>                        
                    </div>
                    <div class="form-group ">
                        <div class="col-md-3 mb-3">
                        <label for="ent_no">Status</label>
                          <select name="status" id="status" class="form-control" style="height: 26px;padding: 3px 10px;"> 
                            <option value="Pending" style="font-size: 14px;">Pending</option> 
                            <option value="Closed" style="font-size: 14px;">Closed</option> 
                           
                        </select>          
                      </div> 
                        
                       
                        <div class="col-md-3 mb-3">
                        <label for="app_note">Booked by</label>   
                        <select class="form-control" style="height: 26px;padding: 3px 10px;" id="mng_staff" name="app_bookby">
                            <option>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}" > {{ $emp->name }}</option>
                          @endforeach
                        </select>            
                      </div>  
                      <div class="col-md-3 mb-3">
                        <label for="app_reason">Email</label>
                        <input type="email" class="form-control"  placeholder="Email ID" id="a_email" name="a_email"  v-on:change="page_one.a_email = $event.target.value">                
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="app_reason">Phone</label>
                        <input type="text" class="form-control"  placeholder="Phone" id="a_ph" name="a_ph"  v-on:change="page_one.a_ph = $event.target.value">                
                      </div>   
                      
                    </div>
                        
                    <div class="form-group">
                         <div class="col-md-6 mb-3">
                        <label for="app_note">Note</label>
                        <textarea class="form-control"placeholder="Note" id="app_note" name="app_note"  v-on:change="page_one.app_note = $event.target.value"></textarea>
                      </div>       
                    </div>  
                          
                    <div class="box-footer text-right">
                        <a class="btn btn-link text-left" href="{{ route('appointments.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check icon-white" aria-hidden="true"></i> Save</button>
                    </div>

                </div> <!-- ./box-body -->
                            <!-- col-md-8 -->

                </div><!-- ./row -->
     </form>
</div>
@stop

@section('moar_scripts')
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

