@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop

@section('header_right')
    @can('create', \App\Models\RoomItem::class)
        <a href="{{ route('room_items.create') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Create New</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-12">

    <div class="box box-default" >
           <div class="box-header with-border text-center">
                 <h3><b>Room Item</b></h3>
                   
                </div><!-- /.box-header -->

      <div class="box-body" >
        <div class="table-responsive">

           <!-- <table
                data-columns="{{ \App\Presenters\RoomItemPresenter::dataTableLayout() }}"
                data-cookie-id-table="room_itemsTable"
                data-toolbar="#toolbar"
                data-pagination="true"
                data-id-table="room_itemsTable"
                data-search="true"
                data-side-pagination="server"
                data-show-columns="true"
                data-show-export="true"
                data-show-refresh="true"
                data-show-footer="true"
                data-sort-order="asc"
                id="room_itemsTable"
                class="table table-striped snipe-table"
                data-url="{{ route('api.room_items.index') }}"
                data-export-options='{
                "fileName": "RoomItems",
                "ignoreColumn": ["actions"]
                }'                
               >-->

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
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Item Code </th>
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Item Name </th>                          
                               
                                <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Created date </th>
                                 <th style="padding: 10px;" class="col-sm-2" data-visible="true" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true">Actions </th>
                               
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($room_items as $res)
                             
                              <tr>
                                <td>{{ $res->icode}} </td>
                                <td>{{ $res->iname}} </td>

                                
                                <td>{{ date('d-m-Y', strtotime($res->created_at))}}</td>
                           
                                <td>@if(Auth::user()->s_role == "c_admin")
                                    <a class="btn btn-info" href="{{ route('room_items.show',$res->id) }}"><i class="fa fa-file icon-white" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-primary" href="{{ route('room_items.edit',$res->id) }}"><i class="fa fa-edit icon-white" aria-hidden="true"></i></a>

                                    {!! Form::open(['method' => 'DELETE','route' => ['room_items.destroy', $res->id],'style'=>'display:inline']) !!}
                                    {!! Form::button('<i class="fa fa-trash icon-white"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  !!}
                                    {!! Form::close() !!}
                                    @else
                                    <p>No Permissions</p>
                                    @endif</td>

                                                     
                              </tr>
                            @endforeach
                          </tbody>
            
          </table>

            
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@stop

@section('moar_scripts')
@include ('partials.bootstrap-table', ['search' => true, 'showFooter' => true, 'columns' => \App\Presenters\RoomItemPresenter::dataTableLayout()])
@stop
