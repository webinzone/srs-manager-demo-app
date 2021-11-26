@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop

@section('header_right')
    @can('create', \App\Models\Roster::class)
        <a href="{{ route('rosters.create') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Create New</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-12">

    <div class="box box-default" >
           <div class="box-header with-border text-center">
                 <h3><b>Roster</b></h3>
                   
                </div><!-- /.box-header -->

      <div class="box-body" >
        <div class="table-responsive">

            <table
                data-columns="{{ \App\Presenters\RosterPresenter::dataTableLayout() }}"
                data-cookie-id-table="rostersTable"
                data-toolbar="#toolbar"
                data-pagination="true"
                data-id-table="rostersTable"
                data-search="true"
                data-side-pagination="server"
                data-show-columns="true"
                data-show-export="true"
                data-show-refresh="true"
                data-show-footer="true"
                data-sort-order="asc"
                id="rostersTable"
                class="table table-striped snipe-table"
                data-url="{{ route('api.rosters.index') }}"
                data-export-options='{
                "fileName": "Rosters",
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
@include ('partials.bootstrap-table', ['search' => true, 'showFooter' => true, 'columns' => \App\Presenters\RosterPresenter::dataTableLayout()])
@stop
