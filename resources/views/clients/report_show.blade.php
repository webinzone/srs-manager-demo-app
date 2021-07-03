@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop


{{-- Page content --}}
@section('content')

 <div id="webui">
    <div class="row">
        <!-- left column -->
      <div class="col-md-7">
       <!-- <form class="form-horizontal" method="" action="" autocomplete="off">
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
                                <th class="col-sm-3" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Gender </th>
                                <th class="col-sm-3" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Phone</th>
                                <th class="col-sm-3" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Created Date </th>
                                <th class="col-sm-3" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Action </th>
                            </tr>
                            </thead>
                          <tbody>
                            @foreach ($client_details as $client_detail)
                              <tr>
                                <td>{{ $client_detail->fname}} . {{ $client_detail->mname}}. {{ $client_detail->lname}}</td>
                                <td>{{ $client_detail->gender}}</td>
                                <td>{{ $client_detail->ph}}</td>
                                <td>{{ $client_detail->created_at}}</td>  
                                <td><a class="btn btn-info" href="{{action('ClientsController@viewPDF', $client_detail->id)}}" target="_blank">Report Generate</a></td>                         
                              </tr>
                            @endforeach
                          </tbody>
                                                      
                            </table>
                        </div>
                    </div>
                </div>
             </div>
           </form>-->

           <div class="box box-default" style="left: 100px;padding-bottom: 50px;">
              <!-- box-header -->
                  <div class="box-header with-border text-center">
                 <h3><b>Generate Resident Report</b></h3>
                   
                </div><!-- /.box-header -->

                <!-- box-body -->
                <div class="box-body" style="padding-left: 50px;">    
              

           <form class="form-horizontal" target="_blank"  action="{{ route('generateResReport') }}" method="get" >

                     <div class="form-row">
                      <div class="col-md-5 mb-3">
                        <label for="fname">Select Resident Name</label>
                         <select class="form-control" required="" id="res_name" name="res" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Resident Name  --</option>
                          @foreach($client_details as $resident)
                          <option value="{{ $resident->id }}"> {{ $resident->fname}}. {{$resident->mname}}. {{$resident->lname  }}</option>
                          @endforeach
                        </select>
                       
                      </div>
                      <div class="col-md-3 mb-3">
                          <br><button type="submit" target="_blank" id="button" class="btn btn-primary pull-right" >
                                   Generate Report
                          </button>
                      </div>
                      </div>

                  </form>
              </div>
              <div class="box-footer text-right">

                    </div>

          </div>
                  
         
         </div>
       </div>
  </div>

@stop

@section('moar_scripts')
@include ('partials.bootstrap-table')
@stop