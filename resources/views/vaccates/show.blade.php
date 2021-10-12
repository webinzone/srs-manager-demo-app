@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop

@section('header_right')
    @can('create', \App\Models\Vaccate::class)
        <a href="{{ route('vaccates.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
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
                 <h3><b>Notice to Vacate </b></h3>
                   
                </div><!-- /.box-header -->
            <div class="box-body" style="padding-left:130px;">

                <!-- Asset name -->
                <div class="form-group">
                    <label class="col-sm-6 control-label">Resident Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $vaccate->res_name}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-6 control-label">Room No:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $vaccate->roomno}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Date:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ date('d-m-Y', strtotime($vaccate->v_date))}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Gender:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $vaccate->gender}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Address:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $vaccate->address}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Phone Number:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $vaccate->ph}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Email:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $vaccate->email}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Reason for moving:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $vaccate->reason}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Expected move-out Date:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ date('d-m-Y', strtotime($vaccate->ex_date))}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Has all resident moving?:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $vaccate->al_res}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Forwarding Address:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $vaccate->f_addr}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Has all amount paid?:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $vaccate->pay_status}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Paid Amount:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $vaccate->pay_amt}}</p>
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
