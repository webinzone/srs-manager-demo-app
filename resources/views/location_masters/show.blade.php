@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop

@section('header_right')
    @can('create', \App\Models\LocationMaster::class)
        <a href="{{ route('location_masters.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
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
                 <h3><b>Location Master</b></h3>
                   
                </div><!-- /.box-header -->

            <div class="box-body" style="padding-left:80px;">

                <!-- Asset name -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">Location Id:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $location_master->location_id}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Company Id:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $location_master->company_id}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Master Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $location_master->master_name}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Address:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $location_master->address}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Suburb</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $location_master->suburb}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Post Code</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $location_master->post_code}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">State</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $location_master->state}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $location_master->email}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Phone Number:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $location_master->ph}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Fax:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $location_master->fax}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Web Id:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $location_master->web_id}}</p>
                    </div>
                </div>
          
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
