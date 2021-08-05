@extends('layouts/default')

{{-- Page title --}}


@section('header_right')

        <a href="{{ route('mngshifts.create') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Create New</a>
   
@stop
@section('content')


<div class="row">
  <div class="col-md-12">

    <div class="box box-default">
       <div class="box-header with-border text-center">
                 <h3><b>Morning Shift - Evening Shift</b></h3>
                   
                </div><!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">

            <table
                data-columns="{{ \App\Presenters\MngshiftPresenter::dataTableLayout() }}"
                data-cookie-id-table="mngshiftsTable"
                data-toolbar="#toolbar"
                data-pagination="true"
                data-id-table="mngshiftsTable"
                data-search="true"
                data-side-pagination="server"
                data-show-columns="true"
                data-show-export="true"
                data-show-refresh="true"
                data-show-footer="true"
                data-sort-order="asc"
                id="mngshiftsTable"
                class="table table-striped snipe-table"
                data-url="{{ route('api.mngshifts.index') }}"
                data-export-options='{
                "fileName": "Mngshifts",
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
<script type="text/javascript">
$('table').find('tr').each(function(){
  const $row = $(this);
  $row.nextAll('tr').each(function(){
    const $next = $(this);
    if($row.find('td:first').text() == $next.find('td:first').text()) {
      $next.remove();
    }
  })
});
</script>
@include ('partials.bootstrap-table', ['search' => true, 'showFooter' => true, 'columns' => \App\Presenters\MngshiftPresenter::dataTableLayout()])
@stop
