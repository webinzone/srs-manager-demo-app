@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop

@section('header_right')
    @can('create', \App\Models\Incident::class)
     <button style="border-color: #23536f;background-color: #307095;height: 35px;width: 100px; color: white;padding: 5px;font-size: 14px;" class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:white;">Incidents <span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="/reportable">Reportable</a>
                                  <li class="divider"></li>
                                <li><a href="/non_reportable">Non Reportable</a></li>
                                <li class="divider"></li>
                            
                              </ul>
                          </button>



    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <a href="{{ route('incidents.create') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Create New</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-12">

    <div class="box box-default">
         <div class="box-header with-border text-center">
                 <h3><b>Incident Records</b></h3>
                   
                </div>
      <div class="box-body">
        <div class="table-responsive">

            <table
                data-columns="{{ \App\Presenters\IncidentPresenter::dataTableLayout() }}"
                data-cookie-id-table="incidentsTable"
                data-toolbar="#toolbar"
                data-pagination="true"
                data-id-table="incidentsTable"
                data-search="true"
                data-side-pagination="server"
                data-show-columns="true"
                data-show-export="true"
                data-show-refresh="true"
                data-show-footer="true"
                data-sort-order="asc"
                id="incidentsTable"
                class="table table-striped snipe-table"
                data-url="{{ route('api.incidents.index') }}"
                data-export-options='{
                "fileName": "Incidents",
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
@include ('partials.bootstrap-table', ['search' => true, 'showFooter' => true, 'columns' => \App\Presenters\IncidentPresenter::dataTableLayout()])
@stop
