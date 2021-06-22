@extends('layouts/default')

{{-- Page title --}}
@section('title')
ClientUsers
@parent
@stop

@section('header_right')
    @can('create', \App\Models\ClientUser::class)
        <a href="{{ route('client_users.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')

  <div id="webui">
    <div class="row">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" action="" autocomplete="off">
          <div class="box box-default">
            <div class="box-header with-border">
                <h2 class="box-title"> ClientUser</h2>
            </div>

            <div class="box-body">

                <!-- Asset name -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">First Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_user->fname}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Middle Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_user->mname}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Last Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_user->cname}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_user->email}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Date of Birth:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_user->dob}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Phone Number:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_user->ph}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Role:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_user->role}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Username:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_user->username}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Password:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_user->password}}</p>
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
