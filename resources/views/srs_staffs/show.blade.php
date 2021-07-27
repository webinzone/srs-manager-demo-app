@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop

@section('header_right')
    @can('create', \App\Models\SrsStaff::class)
        <a href="{{ route('srs_staffs.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
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
                 <h3><b>Employee</b></h3>
                   
                </div><!-- /.box-header -->
            <div class="box-body" style="padding-left:130px;">

                <!-- Asset name -->
                <div class="form-group">
                    <label class="col-sm-6 control-label">Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->name}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-6 control-label">Address:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->address}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Phone Number:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->ph}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Date of Birth:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ date('d-m-Y', strtotime($srs_staff->dob))}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Email:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->email}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Qualification:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->quali}}</p>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-6 control-label">Position:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->posi}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Tax File Number (TFN):</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->tfn}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Australian Business Number:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->abn}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Super Company:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->s_comp}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Super number:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->s_no}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">First Aid & CPR:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->fi_date}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Super Criminal check:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->crime}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Working With Children Check:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->w_child}}</p>
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
