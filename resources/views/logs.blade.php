@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop

@section('header_right')
   
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-12">

    <div class="box box-default">
              <div class="box-header with-border text-center">
                  <h3><b>Activity Log</b></h3>
                   
                </div><!-- /.box-header -->

      <div class="box-body">
        <div class="table-responsive">

            <table
                    data-columns="{{ \App\Presenters\ActivityLogPresenter::dataTableLayout() }}"
                    data-cookie-id-table="activity_logsTable"
                    data-height="400"
                    data-pagination="false"
                    data-id-table="activity_logsTable"
                    data-side-pagination="server"
                    data-sort-order="desc"
                    data-sort-name="created_at"
                    id="dashActivityReport"
                    class="table table-striped snipe-table"
                    data-url="{{ route('api.activity_logs.index', ['limit' => 25]) }}">
                    
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




