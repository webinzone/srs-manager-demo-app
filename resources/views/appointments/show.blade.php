@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop

@section('header_right')
    @can('create', \App\Models\Appointment::class)
        <a href="{{ route('appointments.index') }}" class="btn btn-primary pull-right" style="border-color: #26536f;background-color: #307095;"> Back</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')

  <div id="webui">
    <div class="row" style="padding-left: 300px;">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" style="width:600px;" action="" autocomplete="off">
          <div class="box box-default">
             <div class="box-header with-border text-center">
                 <h3><b>Appointments</b></h3>
                   
                </div><!-- /.box-header -->
            <div class="box-body" style="padding-left:100px;">

                <!-- Asset name -->
                <div class="form-group">
                    <label class="col-sm-6 control-label">Name of the resident:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $appointment->res_name}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-6 control-label">Date:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $appointment->app_date}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Time:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $appointment->app_time}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Address:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $appointment->app_address}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Appointment with:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $appointment->app_with}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Reason:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $appointment->app_reason}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Booked by:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $appointment->app_bookby}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Note:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $appointment->app_note}}</p>
                    </div>
                </div>
               <!-- <div class="form-group">
                    <label class="col-sm-6 control-label">Company Id:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $appointment->company_id}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Location Id:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $appointment->location_id}}</p>
                    </div>
                </div>-->
          
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@stop

@section('moar_scripts')
@include ('partials.bootstrap-table')
@stop
