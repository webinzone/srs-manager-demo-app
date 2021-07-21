@extends('layouts/default')

{{-- Page title --}}
@section('title')
Morning Shifts
@parent
@stop

@section('header_right')
    @can('create', \App\Models\Mngshift::class)
        <a href="{{ route('mngshifts.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
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
                <h2 class="box-title"> Morning Shift</h2>
            </div>

            <div class="box-body">

                <!-- Asset name -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">Morning staff:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $mngshift->mng_staff}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Evening staff:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $mngshift->evng_staff}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Resident Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $mngshift->res_name}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Room No:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $mngshift->room}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Note:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $mngshift->notes}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Date:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $mngshift->mng_date}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Company Id:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $mngshift->company_id}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Location Id:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $mngshift->location_id}}</p>
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
