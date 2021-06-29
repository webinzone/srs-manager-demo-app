@extends('layouts/default')

{{-- Page title --}}
@section('title')
Condition Report
@parent
@stop

@section('header_right')
    @can('create', \App\Models\ConditionReport::class)
        <a href="{{ route('condition_reports.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
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
                <h2 class="box-title"> ConditionReport</h2>
            </div>

            <div class="box-body">

                <!-- Asset name -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">Room:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $condition_report->room}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Items:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $condition_report->items}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Resident Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $condition_report->res_name}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Staff Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $condition_report->stf_name}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Date:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $condition_report->res_date}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Item No:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $condition_report->item_no}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Resident Comments:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $condition_report->res_comments}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Owned By:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $condition_report->owned_by}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Condition:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $condition_report->res_cond}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Resident Sign:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $condition_report->res_sign}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Staff Sign:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $condition_report->st_sign}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Company Id:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $condition_report->company_id}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Location Id:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $condition_report->location_id}}</p>
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