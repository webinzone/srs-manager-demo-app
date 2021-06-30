@extends('layouts/default')

{{-- Page title --}}
@section('title')
Condition Report
@parent
@stop

@section('header_right')
    @can('create', \App\Models\Client::class)
        <a href="{{ route('condition_reports.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')

 <div id="webui">
    <div class="row">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" action="" autocomplete="off">
           <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
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
                                data-url="" style="background-color: white;">

                          <thead>
                            <tr>
                                <th class="col-sm-3" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Resident Name </th>
                                <th class="col-sm-3" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Room </th>
                                <th class="col-sm-3" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Items</th>
                                <th class="col-sm-3" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Created Date </th>
                                <th class="col-sm-3" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Action </th>
                            </tr>
                          
                          </thead>
                          <tbody>
                            @foreach ($condition_reports as $condition_report)
                              <tr>
                                <td>{{ $condition_report->res_name}}</td>
                                <td>{{ $condition_report->room}}</td>
                                <td>{{ $condition_report->items}}</td>
                                <td>{{ $condition_report->created_at}}</td>  
                                <td><a class="btn btn-info" href="{{action('ConditionReportsController@viewreport', $condition_report->id)}}" target="_blank">Report Generate</a></td>                         
                                
                              </tr>
                            @endforeach
                          </tbody>
                          
                                                      
                            </table>
                        </div>
                    </div>
                </div>
             </div>
           </form>
         </div>
       </div>
  </div>

@stop

@section('moar_scripts')
@include ('partials.bootstrap-table')
@stop