@extends('layouts/default')

{{-- Page title --}}
@section('title')
Evening Shifts
@parent
@stop

@section('header_right')
    @can('create', \App\Models\Evngshift::class)
        <a href="{{ route('evngshifts.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')

  <div id="webui">
    <div class="row">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" action="" autocomplete="off">
          <div class="box box-default">
            <div class="box-header with-border">
                <h2 class="box-title"> Evening Shift</h2>
            </div>

            <div class="box-body">

                <!-- Asset name -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">Morning staff:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $evngshift->mng_staff}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Evening staff:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $evngshift->evng_staff}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Resident Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $evngshift->res_name}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Room No:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $evngshift->room}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Note:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $evngshift->notes}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Date:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $evngshift->eveng_date}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Company Id:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $evngshift->company_id}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Location Id:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $evngshift->location_id}}</p>
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
