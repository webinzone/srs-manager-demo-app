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
                  data-columns=""
                      data-cookie-id-table="dashCategorySummary"
                      data-height="400"
                      data-pagination="true"
                      data-side-pagination="server"
                      data-sort-order="desc"
                      data-sort-field="assets_count"
                      id="dashCategorySummary"
                      class="table table-striped snipe-table"
                      data-url=""
                 >

                    <thead >
                            <tr style="padding: 5px;">
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Created Date </th>
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">User Name </th>
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Action </th>
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Item</th>
                               
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Resident </th>                              
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($activity_logs as $log)
                             
                              <tr>
                              
                                <td>{{ date('j F Y h:i A', strtotime($log->created_at)) }}</td>
                                <td>{{  $log->user }}</td>


                                <td>{{ $log->action}}</td>
                              @if ($log->action == "Deleted") 
                                    <td style="color: red;">{{ $log->item }}</td>
                              @elseif ($log->action == "Created") 
                                    <td style="color: green;">{{ $log->item }}</td>
                              @else
                                    <td style="color: blueviolet;">{{ $log->item }} </td>
                              @endif
                              
                              @if ($log->action == "Deleted")
                                <td>{{ $log->res_name}}</td>
                              @elseif ($log->item_id == 0)
                                <td>{{ $log->res_name}} <p style="color:red">* This record has beendeleted.</p></td>
                              @else
                                <td><a href="{{  URL('/'.$log->item_route.'/'.$log->item_id ) }}">{{ $log->res_name}}</a></td>
                              @endif
                                                     
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




