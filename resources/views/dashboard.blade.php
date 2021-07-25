@extends('layouts/default')

{{-- Page title --}}
@section('title')
{{ trans('general.dashboard') }}
@parent
@stop
@section('header_right')
  
      <a href="/generateAccountReport" style="background-color:#486467; right: 30px;" class="btn btn-primary pull-right"  target="_blank"> Accounts Report</a>
@stop

{{-- Page content --}}
@section('content')

@if ($snipeSettings->dashboard_message!='')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="row">
  <!-- panel -->
  <div class="col-lg-3 col-xs-3" style="width:246px;">
      <a href="{{ route('clients.index') }}">
    <!-- small box -->
    <div class="small-box bg-teal">
      <div class="inner">
        <h3>{{ number_format($counts['resident']) }}</h3>
        <p>Residents</p>
      </div>
      <div class="icon" aria-hidden="true">
        <i class="fa fa-user" aria-hidden="true"></i>
      </div>
     
        <a href="{{ route('clients.index') }}" class="small-box-footer">{{ trans('general.moreinfo') }} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
    </div>
      </a>
  </div><!-- ./col -->

  <div class="col-lg-3 col-xs-6" style="width:246px;">
     <a href="{{ route('appointments.index') }}">
    <!-- small box -->
    <div class="small-box bg-maroon">
      <div class="inner">
        <h3>{{ number_format($counts['appointments']) }}</h3>
        <p>Appointments</p>
      </div>
      <div class="icon" aria-hidden="true">
        <i class="fa fa-calendar" aria-hidden="true"></i>
      </div>
       <a href="{{ route('appointments.index') }}" class="small-box-footer">{{ trans('general.moreinfo') }} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
    </div>
     </a>
  </div><!-- ./col -->



  <div class="col-lg-3 col-xs-6" style="width:246px;">
    <!-- small box -->

      <a href="{{ route('staff_roasters.index') }}" style="width:246px;">
    <div class="small-box bg-purple">
      <div class="inner">
        <h3> {{ number_format($counts['staff_roaster']) }}</h3>
          <p>Staff Roaster</p>
      </div>
      <div class="icon" aria-hidden="true">
        <i class="fa fa-users"></i>
      </div>
      <a href="{{ route('staff_roasters.index') }}" class="small-box-footer">{{ trans('general.moreinfo') }} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
    </div>
  </div><!-- ./col -->


  <div class="col-lg-3 col-xs-6" style="width:246px;">
    <!-- small box -->
      <a href="{{ route('bookings.index') }}">
    <div class="small-box bg-orange">
      <div class="inner">
        <h3> {{ number_format($counts['bookings']) }}</h3>
          <p>Infection Control</p>
      </div>
      <div class="icon" aria-hidden="true">
        <i class="fa fa-list-alt" ></i>
      </div>
      <a href="{{ route('bookings.index') }}" class="small-box-footer">{{ trans('general.moreinfo') }} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
    </div>
      </a>
  </div><!-- ./col -->


  <div class="col-lg-3 col-xs-6" style="width:246px;">
    <!-- small box -->
      <a href="{{ route('bookings.index') }}">
    <div class="small-box bg-red">
      <div class="inner">
        <h3 >&nbsp;&nbsp;</h3>
          <p>Act/Regulations</p>
      </div>
      <div class="icon" style="height: 20px;" aria-hidden="true">
        <i class="fa fa-gavel" aria-hidden="true"></i>
     
      </div>
      <a href="{{ route('bookings.index') }}" class="small-box-footer">{{ trans('general.moreinfo') }} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
    </div>
      </a>
  </div><!-- ./col -->
 


</div>

        


<!-- Recent Activity -->
<div class="row">
  <div class="col-md-12">
    <div class="box" style="background-color: #BDF5BD;">
      <div class="box-header with-border">
        <h2 class="box-title"><b>Resident Details</b></h2>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" aria-hidden="true">
                <i class="fa fa-minus" aria-hidden="true"></i>
                <span class="sr-only">Collapse</span>
            </button>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">

                <!--<table
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
                    
                </table>-->
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
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Resident Name </th>
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Dob </th>
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Phone No. </th>
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Respite/Permanent </th>
                                
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Duration </th>
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Room No </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($residents as $res)
                              
                              <tr>
                                <td><a href="{{ route("residentDetails", $res->id) }}">{{ $res->fname}} {{ $res->mname}} {{ $res->lname}}</a></td>
                                <td>{{ $res->dob}}</td>
                                <td>{{ $res->ph}}</td>


                                <td>{{ $res->respite}}</td>

                              <td> 
                             @if ($res->respite == "Respite")
                                From :{{date('d-m-Y', strtotime($res->start_period))}}, To :{{date('d-m-Y', strtotime($res->end_period))}}
                                
                             
                             @else
                             
                              Admisiion Date : {{ date('d-m-Y', strtotime($res->adm_date))}}
                                
                               
                               @endif
                             </td>
                                
                                <td>{{ $res->room_no}}</td>


                                                     
                              </tr>
                            @endforeach
                          </tbody>
                          


                            
                        </table>
                        </div>
                    </div> <!-- /.col -->
                    <div class="col-md-12 text-center" style="padding-top: 10px;">
                        <a href="{{ route('clients.index') }}" class="btn btn-primary btn-sm" style="width: 100%">view all</a>
                    </div>
                </div> <!-- /.row -->



         <!-- <div class="col-md-12 text-center" style="padding-top: 10px;">
            <a href="" class="btn btn-primary btn-sm" style="width: 100%"></a>
          </div>
        </div>--><!-- /.row -->
      </div><!-- ./box-body -->
    </div><!-- /.box -->
  </div>

</div>

<div class="row">
    <div class="col-md-6">
        <div class="box box-default" style="background-color: #BDF5BD;">
            <div class="box-header with-border">
                <h2 class="box-title">Reports by Status</h2>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" aria-hidden="true">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                        <span class="sr-only">Collapse</span>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="chart-responsive">
                            <canvas id="statusPieChart" height="216"></canvas>
                        </div> <!-- ./chart-responsive -->
                    </div> <!-- /.col -->
                </div> <!-- /.row -->
            </div><!-- /.box-body -->
        </div> <!-- /.box -->
    </div>
    <div class="col-md-6">

        <!-- Categories -->
        <div class="box box-default" style="background-color: #BDF5BD;">
            <div class="box-header with-border">
                <h2 class="box-title">Bookings Report </h2>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                        <span class="sr-only">Collapse</span>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
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
                                data-url="">

                          <thead>
                            <tr>
                                <th class="col-sm-3" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Resident Name </th>
                                <th class="col-sm-3" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Date & Time </th>
                                <th class="col-sm-3" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Appointment With </th>
                                <th class="col-sm-3" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Status </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($apps as $app)
                              <tr>
                                <td>{{ $app->res_name}}</td>
                                <td>{{ $app->app_date}} - {{ $app->app_time}}</td>
                                <td>{{ $app->app_with}}</td>
                                <td>{{ $app->status}}</td>                           
                              </tr>
                            @endforeach
                          </tbody>
                          


                            
                        </table>
                        </div>
                    </div> <!-- /.col -->
                    <div class="col-md-12 text-center" style="padding-top: 10px;">
                        <a href="{{ route('appointments.index') }}" class="btn btn-primary btn-sm" style="width: 100%">view all</a>
                    </div>
                </div> <!-- /.row -->

            </div><!-- /.box-body -->
        </div> <!-- /.box -->
    </div>
</div>
 <!--/row-->



@stop

@section('moar_scripts')
@include ('partials.bootstrap-table', ['simple_view' => true, 'nopages' => true])
@stop

@push('js')



<script nonce="{{ csrf_token() }}">
     var pieChartCanvas = $("#statusPieChart").get(0).getContext("2d");
      var pieChart = new Chart(pieChartCanvas);
      var ctx = document.getElementById("statusPieChart");
      var pieOptions = {
              legend: {
                  position: 'top',
                  responsive: true, 
                  maintainAspectRatio: true,
              }
          };

      $.ajax({
          type: 'GET',
          url: '{{  route('api.echart.index') }}',
          headers: {
              "X-Requested-With": 'XMLHttpRequest',
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
          },
          dataType: 'json',
          success: function (data) {
              var myPieChart = new Chart(ctx,{
                  type   : 'doughnut',
                  data   : data,
                  options: pieOptions
              });
          },
          error: function (data) {
             // window.location.reload(true);
          }
      });
   
</script>
@endpush
