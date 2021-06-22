
@extends('layouts/default')

{{-- Page title --}}
@section('title')
Update ClientUsers
@parent
@stop
@section('header_right')
  <a href="{{ route('client_users.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
@stop

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">

          
         <form id="create-form" class="form-horizontal" method="post" action = "{{ route ('client_users.update', $client_user->id) }}" autocomplete="off" role="form" >
            @method('PATCH') 

                 {{ csrf_field() }}
            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
                <div class="box-header with-border text-right">

                    <div class="col-md-12 box-title text-right" style="padding: 0px; margin: 0px;">

                        <div class="col-md-12" style="padding: 0px; margin: 0px;">
                            <div class="col-md-9 text-left">
                                                        </div>
                            <div class="col-md-3 text-right" style="padding-right: 10px;">
                                <a class="btn btn-link text-left" href="{{ route('client_users.index') }}">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check icon-white" aria-hidden="true"></i>
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>

                </div><!-- /.box-header -->

                <!-- box-body -->
               <div class="box-body">                           
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">First Name</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="fname" class="form-control" value="{{ $client_user->fname}}">
        
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Middle Name</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="mname" class="form-control" value="{{ $client_user->mname}}">                                        
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Last Name</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="cname" class="form-control" value="{{ $client_user->cname}}">                                       
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Email</label>
                        <div class="col-md-7 col-sm-12 required">
                          <input type="text" name="email" class="form-control" value="{{ $client_user->email}}">                                       
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Date of Birth</label>
                        <div class="col-md-7 col-sm-12 required">
                          <input type="text" name="dob" class="form-control" value="{{ $client_user->dob}}">                                       
                        </div>
                    </div>
                    <div class="form-group ">
                     <label for="name" class="col-md-3 control-label">Phone Number</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="ph" class="form-control" value="{{ $client_user->ph}}">                                       
                        </div>
                    </div>
                   <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Role</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="role" class="form-control" value="{{ $client_user->role}}">                                       
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Username</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="username" class="form-control" value="{{ $client_user->username}}">                                       
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Password</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="password" class="form-control" value="{{ $client_user->password}}">                                       
                        </div>
                    </div>
                    <div class="box-footer text-right">
                        <a class="btn btn-link text-left" href="{{ route('client_users.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check icon-white" aria-hidden="true"></i> Save</button>
                    </div>

                </div> <!-- ./box-body -->
                            <!-- col-md-8 -->

            </div><!-- ./row -->
        </form>
      </div>
    </div>
</div>
@stop

@section('moar_scripts')
@include ('partials.bootstrap-table')
@stop

