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

{{-- Page content --}}
@section('content')

  <div id="webui">
    <div class="row" style="padding-left: 300px;">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" style="width:600px;" action="" autocomplete="off">
          <div class="box box-default">
            <div class="box-header with-border text-center">
                 <h3><b> Morning Shift - Evening Shift</b></h3>
            </div>

            <div class="box-body"  style="padding-left:130px;">

                <!-- Asset name -->
                <div class="form-group">
                    <label class="col-sm-6 control-label">Morning staff:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $mngshift->mng_staff}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-6 control-label">Evening staff:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $mngshift->evng_staff}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Resident Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $mngshift->res_name}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Room No:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $mngshift->room}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Note:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $mngshift->notes}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Date:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ date('d-m-Y', strtotime($mngshift->mng_date))}}</p>
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
