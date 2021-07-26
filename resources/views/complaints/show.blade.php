@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop

@section('header_right')
    @can('create', \App\Models\Complaint::class)
        <a href="{{ route('complaints.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')

  <div id="webui">
   <div class="row" style="padding-left: 300px;">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" style="width:700px;" action="" autocomplete="off">
          <div class="box box-default">
            <div class="box-header with-border">
                <h2 class="box-title centre" style="padding-left: 300px;"> <b> Complaints </b></h2><br>
            </div><br>

            <div class="box-body" style="padding-left:100px;">


                <!-- Asset name -->
                <div class="form-group">
                    <label class="col-sm-6 control-label">Staff Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $complaint->f_name}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-6 control-label">Name of Person Commenting:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $complaint->user_name}}</p>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-6 control-label">Complaint Details:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $complaint->com_details}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Nature of Complaint:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $complaint->com_nature}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Contact Number:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $complaint->phone}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Suggestions for improvement:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $complaint->suggestions}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Action Date:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ date('d-m-Y', strtotime($complaint->action_date))}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Action Taken:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $complaint->action_taken}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Outcome or Methode of Communication:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $complaint->outcome}}</p>
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
