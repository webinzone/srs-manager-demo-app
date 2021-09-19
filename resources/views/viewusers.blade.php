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
                  <h3><b>Users</b></h3>
                   
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
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Name </th>
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Username </th>
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Company Name </th>
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Company Id </th>
                               
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Location Name </th>
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Location Id </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($vwusers as $res)
                             
                              <tr>
                                <td>{{ $res->first_name }}</td>
                                <td>{{ $res->username }}</td>
                                <td>{{ $res->companyname }}</td>
                                <td>{{ $res->c_id }}</td>
                                <td>{{ $res->locationname }}</td>
                                <td>{{ $res->l_id}}</td>                             
                                                     
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




