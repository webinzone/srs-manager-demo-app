@extends('layouts/default')

{{-- Page title --}}
@section('title')
CompanyMasters
@parent
@stop

@section('header_right')
    @can('create', \App\Models\CompanyMaster::class)
        <a href="{{ route('company_masters.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
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
                <h2 class="box-title"> CompanyMaster -<b> {{ $company_master->company_id}} </b></h2>
            </div>

            <div class="box-body">

                <!-- Asset name -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">Company Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $company_master->company_name}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Address:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $company_master->address}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Suburb</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $company_master->suburb}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Post Code</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $company_master->post_code}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Phone Number:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $company_master->ph}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $company_master->email}}</p>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label">Fax:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $company_master->fax}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Web Id:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $company_master->web}}</p>
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
