@extends('layouts/default')

{{-- Page title --}}
@section('title')
ClientDetails
@parent
@stop

@section('header_right')
    @can('create', \App\Models\ClientDetail::class)
        <a href="{{ route('clients.create') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Create New</a>
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
                data-columns="{{ \App\Presenters\ClientDetailPresenter::dataTableLayout() }}"
                data-cookie-id-table="client_detailsTable"
                data-toolbar="#toolbar"
                data-pagination="true"
                data-id-table="client_detailsTable"
                data-search="true"
                data-side-pagination="server"
                data-show-columns="true"
                data-show-export="true"
                data-show-refresh="true"
                data-show-footer="true"
                data-sort-order="asc"
                id="client_detailsTable"
                class="table table-striped snipe-table"
                data-url="{{ route('api.client_details.index') }}"
                data-export-options='{
                "fileName": "ClientDetails",
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
@include ('partials.bootstrap-table', ['search' => true, 'showFooter' => true, 'columns' => \App\Presenters\ClientDetailPresenter::dataTableLayout()])
@stop





