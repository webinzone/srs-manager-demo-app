@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop

@section('header_right')
    @can('create', \App\Models\Incident::class)
     <button style="border-color: #23536f;background-color: #307095;height: 35px;width: 100px; color: white;padding: 5px;font-size: 14px;" class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:white;">Incidents <span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="/reportable">Reportable</a>
                                  <li class="divider"></li>
                                <li><a href="/non_reportable">Non Reportable</a></li>
                                <li class="divider"></li>
                            
                              </ul>
                          </button>



    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <a href="/non_reportable_create" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Create New</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-12">

    <div class="box box-default">
              <div class="box-header with-border text-center">
                  <h3><b>Non-Reportable Incidents</b></h3>
                   
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
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">No </th>
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Category </th>
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Incident Date & Time</th>
                               
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Person effected in incident </th>
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Created At</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($incidents as $incident)
                             
                              <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $incident->category }}</td>
                                <td>{{ date('d-m-Y', strtotime($incident->i_date))}} - {{$incident->i_time}}</td>

                                <td>{{ $incident->p_name }}</td>
                                <td>{{ date('d-m-Y', strtotime($incident->created_at))}}</td>                             
                                <td>
                                  @if(Auth::user()->s_role == "c_admin")
                                    <a class="btn btn-info" href="{{ route('incidents.show',$incident->id) }}"><i class="fa fa-file icon-white" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-primary" href="{{ route('incidents.edit',$incident->id) }}"><i class="fa fa-edit icon-white" aria-hidden="true"></i></a>

                                    {!! Form::open(['method' => 'DELETE','route' => ['incidents.destroy', $incident->id],'style'=>'display:inline']) !!}
                                    {!! Form::button('<i class="fa fa-trash icon-white"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  !!}
                                    {!! Form::close() !!}
                                  @else
                                    <p>No Permissions</p>
                                  @endif
                                </td>

                                                     
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




