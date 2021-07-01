@extends('layouts/default')

{{-- Page title --}}
@section('title')
Employees
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
    <div class="row">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" action="" autocomplete="off">
          <div class="box box-default">
            <div class="box-header with-border">
                <h2 class="box-title"> SrsStaff</h2>
            </div>

            <div class="box-body">

                <!-- Asset name -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->name}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Address:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->address}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Phone Number:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->ph}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Date of Birth:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->dob}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->email}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Qualification:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->quali}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Company Id:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->company_id}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Location Id:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->location_id}}</p>
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
