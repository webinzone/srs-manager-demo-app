@extends('layouts/default')

{{-- Page title --}}
@section('title')
   
    @parent

@stop

@section('header_right')

    @can('create', \App\Models\User::class)
        @if ($snipeSettings->ldap_enabled == 1)
            <a href="{{ route('ldap/user') }}" class="btn btn-default pull-right"><span class="fa fa-sitemap"></span> LDAP Sync</a>
        @endif
        <a href="{{ route('users.create') }}" class="btn btn-primary pull-right" style="margin-right: 5px;">  {{ trans('general.create') }}</a>
    @endcan

   
    @can('view', \App\Models\User::class)
        <a class="btn btn-default pull-right" href="{{ route('users.export') }}" style="margin-right: 5px;">Export</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
        <div class="box-header with-border text-center">
                 <h3><b>
                     @if(Auth::user()->s_role == "super_admin")
                      Admin Users
                     @else
                       Users
                     @endif
                 </b></h3>
                   
                </div><!-- /.box-header -->
        <div class="box-body">
          {{ Form::open([
               'method' => 'POST',
               'route' => ['users/bulkedit'],
               'class' => 'form-inline',
                'id' => 'bulkForm']) }}

            

            <table
                    data-click-to-select="true"
                    data-columns="{{ \App\Presenters\UserPresenter::dataTableLayout() }}"
                    data-cookie-id-table="usersTable"
                    data-pagination="true"
                    data-id-table="usersTable"
                    data-search="true"
                    data-side-pagination="server"
                    data-show-columns="true"
                    data-show-export="true"
                    data-show-refresh="true"
                    data-sort-order="asc"
                    data-toolbar="#toolbar"
                    id="usersTable"
                    class="table table-striped snipe-table"
                    data-url="{{ route('api.users.index',
              array('deleted'=> (request('status')=='deleted') ? 'true' : 'false','company_id' => e(request('company_id')))) }}"
                    data-export-options='{
                "fileName": "export-users-{{ date('Y-m-d') }}",
                "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                }'>
                    </table>


                    {{ Form::close() }}
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>

@stop

@section('moar_scripts')


@include ('partials.bootstrap-table')


@stop