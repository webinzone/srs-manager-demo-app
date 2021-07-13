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
    <div class="row">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" action="" autocomplete="off">
          <div class="box box-default">
            <div class="box-header with-border text-center">
                <h2 class="box-title"> Room Detail</h2>
            </div>

            <div class="box-body" style="padding-left:170px;">

                <!-- Asset name -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">Room No:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $room_detail->room_no}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Room Type:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $room_detail->type}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Room Rent / Week:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $room_detail->room_rent}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Client Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $room_detail->client_id}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Status:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $room_detail->status}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Bed No:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $room_detail->beds_no}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Company Id:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $room_detail->company_id}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Location Id:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $room_detail->location_id}}</p>
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
