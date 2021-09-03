@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop

@section('header_right')
    @can('create', \App\Models\ClientDetail::class)

     
        <a href="/" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>


    
    @endcan
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-12">

    <div class="box box-default">
              <div class="box-header with-border text-center">
                  <h3><b>Staffs Expired Certificates</b></h3>
                   
                </div><!-- /.box-header -->

      <div class="box-body">
        <div class="table-responsive">

            
                        <table
                                data-columns=""
                                data-cookie-id-table="dashCategorySummary"
                                data-height="400"
                                data-pagination="true"
                                data-side-pagination="server"
                                data-sort-order="desc"
                                data-sort-field="assets_count"
                                id="dashCategorySummary"
                                class="table table-striped snipe-table"
                                data-url="">


                          <thead >
                            <tr style="padding: 5px;">
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Staff Name </th>
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Certificate Name </th>
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Expired date </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($certis as $certi)
                              <tr>
                                <td>{{ $certi->res_name}}</td>
                                <td>{{ $certi->certi_name}}</td>
                                <td>{{ date('d-m-Y', strtotime($certi->certi_exp))}}</td>
                              </tr>
                            @endforeach
                          </tbody>
                         


                           
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




