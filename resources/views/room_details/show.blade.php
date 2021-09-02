@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop

@section('header_right')
    @can('create', \App\Models\RoomDetail::class)
        <a href="{{ route('room_details.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
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
            <div class="box-header with-border text-center">
                <h2 class="box-title"><b> Room Detail</b></h2>
            </div>

            <div class="box-body" style="padding-left:170px;">

                <!-- Asset name -->
                <div class="form-group">
                    <label class="col-sm-5 control-label">Room No:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $room_detail->room_no}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-5 control-label">Room Type:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $room_detail->type}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Room Rent / Week:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $room_detail->room_rent}}</p>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-5 control-label">Status:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $room_detail->status}}</p>
                    </div>
                </div>
                <h4>Bed Details</h4>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Bed Nos:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $room_detail->beds_no}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Bed Name & status:</label>
                    <div class="col-md-6">
                        @foreach ($bed_details as $bed)
                        <p class="form-control-static">{{ $bed->bed_no }} - {{ $bed->status}} - {{ $bed->res_name}}</p>
                        @endforeach
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
