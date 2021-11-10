@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop

@section('header_right')

     
    @can('create', \App\Models\RoomDetail::class)


    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <a href="{{ route('room_details.create') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Create New</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-12">

    <div class="box box-default">
        <div class="box-header with-border text-center">
                 <h3><b>Room Details</b></h3>
                   <a href="/roomexchange" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;height: 35px;width: 140px; color: white;padding: 5px;font-size: 14px;"> Exchange Room</a>
                </div><!-- /.box-header -->

      <div class="box-body">
        <div class="table-responsive">

            <table
                data-columns="{{ \App\Presenters\RoomDetailPresenter::dataTableLayout() }}"
                data-cookie-id-table="room_detailsTable"
                data-toolbar="#toolbar"
                data-pagination="true"
                data-id-table="room_detailsTable"
                data-search="true"
                data-side-pagination="server"
                data-show-columns="true"
                data-show-export="true"
                data-show-refresh="true"
                data-show-footer="true"
                data-sort-order="asc"
                id="room_detailsTable"
                class="table table-striped snipe-table"
                data-url="{{ route('api.room_details.index') }}"
                data-export-options='{
                "fileName": "RoomDetails",
                "ignoreColumn": ["actions"]
                }'                
               >
            
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@stop

@section('moar_scripts')
@include ('partials.bootstrap-table', ['search' => true, 'showFooter' => true, 'columns' => \App\Presenters\RoomDetailPresenter::dataTableLayout()])
@stop
