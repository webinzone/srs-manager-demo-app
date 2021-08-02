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
        <a href="{{ route('clients.create') }}" class="btn btn-primary " style="border-color: #23536f;background-color: #307095;"> Create New</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <a href="{{ route('clients.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>


    
    @endcan
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-12">

    <div class="box box-default">
              <div class="box-header with-border text-center">
                  <h3><b>Transfer Residents</b></h3>
                   
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
                                <td><a href="{{ route("residentDetails", $res->id) }}"><b>{{ $res->fname}} {{ $res->mname}} {{ $res->lname}}</b></a></td>
                                <td>{{ date('d-m-Y', strtotime($res->dob))}}</td>
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
      </div>
    </div>
  </div>
</div>

@stop

@section('moar_scripts')
@include ('partials.bootstrap-table', ['search' => true, 'showFooter' => true, 'columns' => \App\Presenters\ClientDetailPresenter::dataTableLayout()])
@stop




