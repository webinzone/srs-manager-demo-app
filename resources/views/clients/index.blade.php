@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop

@section('header_right')
    @can('create', \App\Models\ClientDetail::class)

        <button style="border-color: #23536f;background-color: #307095;height: 35px;width: 100px; color: white;padding: 5px;font-size: 14px;" class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:white;">Residents <span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="/active">Active</a>
                                  <li class="divider"></li>
                                <li><a href="/transfer">Transfered</a></li>
                                <li class="divider"></li>
                                <li><a href="/vaccate">Vaccated</a> </li>
                                
                              </ul>
                          </button>



    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <a href="{{ route('clients.create') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Create New</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-12">

    <div class="box box-default">
              <div class="box-header with-border text-center">
                  <h3><b>Residents</b></h3>
                   
                </div><!-- /.box-header -->

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
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

@include ('partials.bootstrap-table', ['search' => true, 'showFooter' => true, 'columns' => \App\Presenters\ClientDetailPresenter::dataTableLayout()])
@stop





