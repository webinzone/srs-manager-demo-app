@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop

@section('header_right')
    @can('create', \App\Models\Handover::class)
        <a href="{{ route('handovers.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
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
                 <h3><b>Shift Handover</b></h3>
                   
                </div><!-- /.box-header -->

            <div class="box-body" style="padding-left:130px;">
      
                <!-- Asset name -->
                
               <div class="form-group">
                    <label class="col-sm-5 control-label">Resident Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $handover->res_name}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Room:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $handover->room}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Morning Staff-Evening Staff:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $handover->me_staffs}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Evening Staff-Morning Staff:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $handover->em_staffs}}</p>
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
