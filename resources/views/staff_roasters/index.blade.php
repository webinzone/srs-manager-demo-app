@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop

@section('header_right')
    @can('create', \App\Models\StaffRoaster::class)
        <a href="{{ route('staff_roasters.create') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Create New</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-12">

    <div class="box box-default">
         <div class="box-header with-border text-center">
                 <h3><b>Staff Roaster</b></h3>
                   
                </div><!-- /.box-header -->

      <div class="box-body">
        <div class="table-responsive">

            <table
                data-columns="{{ \App\Presenters\StaffRoasterPresenter::dataTableLayout() }}"
                data-cookie-id-table="staff_roastersTable"
                data-toolbar="#toolbar"
                data-pagination="true"
                data-id-table="staff_roastersTable"
                data-search="true"
                data-side-pagination="server"
                data-show-columns="true"
                data-show-export="true"
                data-show-refresh="true"
                data-show-footer="true"
                data-sort-order="asc"
                id="staff_roastersTable"
                class="table table-striped snipe-table"
                data-url="{{ route('api.staff_roasters.index') }}"
                data-export-options='{
                "fileName": "StaffRoasters",
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
var seen = {};
$('table tr').each(function() {
  var txt = $(this).find("td:not(:first)").text();
  
  if (seen[txt])
    $(this).remove();
  else
    seen[txt] = true;
});
</script>
@include ('partials.bootstrap-table', ['search' => true, 'showFooter' => true, 'columns' => \App\Presenters\StaffRoasterPresenter::dataTableLayout()])
@stop
