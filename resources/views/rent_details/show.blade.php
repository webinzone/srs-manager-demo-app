@extends('layouts/default')

{{-- Page title --}}
@section('title')
Rent Details
@parent
@stop

@section('header_right')
    @can('create', \App\Models\RentDetail::class)
        <a href="{{ route('rent_details.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
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
                <h2 class="box-title"> Rent Detail</h2>
            </div>

            <div class="box-body">

                <!-- Asset name -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">SRS Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $rent_detail->srs_name}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Rent Payment:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $rent_detail->rent_payment}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Resident Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $rent_detail->res_name}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Resident Sign:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $rent_detail->res_sign}}</p>
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
