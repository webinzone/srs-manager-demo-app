
@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop
@section('header_right')
  <a href="{{ route('srs_staffs.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
@stop

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">

          
         <form id="create-form" class="form-horizontal" method="post" action = "{{ route ('srs_staffs.update', $srs_staff->id) }}" autocomplete="off" role="form" >
            @method('PATCH') 

                 {{ csrf_field() }}
            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
                <!-- box-header -->

                          <div class="box-header with-border text-center">
                 <h3><b>Employee</b></h3>
                   
                </div><!-- /.box-header -->

                <!-- box-body -->
               <div class="box-body" style="padding-left: 40px;padding-right: 40px;">                           
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Name</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="name" class="form-control" value="{{ $srs_staff->name}}">
        
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Address</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="address" class="form-control" value="{{ $srs_staff->address}}">                                        
                        </div>
                    </div>
                    <div class="form-group ">
                     <label for="name" class="col-md-3 control-label">Phone Number</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="ph" class="form-control" value="{{ $srs_staff->ph}}">                                       
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Date of Birth</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="dob" class="form-control" value="{{ $srs_staff->dob}}">                                       
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Email</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="email" class="form-control" value="{{ $srs_staff->email}}">                                       
                        </div>
                    </div>
                    <div class="form-group ">
                     <label for="name" class="col-md-3 control-label">Qualification</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="quali" class="form-control" value="{{ $srs_staff->quali}}">                                       
                        </div>
                    </div>
                 
                    <div class="box-footer text-right">
                        <a class="btn btn-link text-left" href="{{ route('srs_staffs.index') }}">Cancel</a>
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

