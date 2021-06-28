@extends('layouts/default')

{{-- Page title --}}
@section('title')
Location Masters
@parent
@stop

@section('header_right')
    @can('create', \App\Models\LocationMaster::class)
        <a href="{{ route('location_masters.create') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Create New</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-12">

    <div class="box box-default">
      <div class="box-body">
        <div class="table-responsive">

            <table
                data-columns="{{ \App\Presenters\LocationMasterPresenter::dataTableLayout() }}"
                data-cookie-id-table="location_mastersTable"
                data-toolbar="#toolbar"
                data-pagination="true"
                data-id-table="location_mastersTable"
                data-search="true"
                data-side-pagination="server"
                data-show-columns="true"
                data-show-export="true"
                data-show-refresh="true"
                data-show-footer="true"
                data-sort-order="asc"
                id="location_mastersTable"
                class="table table-striped snipe-table"
                data-url="{{ route('api.location_masters.index') }}"
                data-export-options='{
                "fileName": "LocationMasters",
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
@include ('partials.bootstrap-table', ['search' => true, 'showFooter' => true, 'columns' => \App\Presenters\LocationMasterPresenter::dataTableLayout()])
@stop
