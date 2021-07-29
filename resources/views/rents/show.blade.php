@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop

@section('header_right')
    @can('create', \App\Models\Rent::class)
        <a href="{{ route('rents.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
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
                 <h3><b>Rent Details</b></h3>
                   
                </div><!-- /.box-header -->
            <div class="box-body" style="padding-left:130px;">

                <!-- Asset name -->
                <div class="form-group">
                    <label class="col-sm-6 control-label">Resident Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $rent->res_name}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-6 control-label">Room No:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $rent->roomno}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Room Type:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $rent->room_type}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Admission Date:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ date('d-m-Y', strtotime($rent->adm_date))}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Type of Income:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $rent->tof}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Rent Payment:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $rent->rent_pay}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Advance Payment?:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $rent->adv_pay}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Payment Date:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ date('d-m-Y', strtotime($rent->pay_date))}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Next Date for Payment:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ date('d-m-Y', strtotime($rent->nextpay_date))}}</p>
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
