
@extends('layouts/default')

{{-- Page title --}}
@section('title')
Update CompanyMasters
@parent
@stop
@section('header_right')
  <a href="{{ route('company_masters.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
@stop

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">

          
         <form id="create-form" class="form-horizontal" method="post" action = "{{ route ('company_masters.update', $company_master->id) }}" autocomplete="off" role="form" >
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
                                <a class="btn btn-link text-left" href="{{ route('company_masters.index') }}">
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
                        <label for="name" class="col-md-3 control-label">Company ID</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="company_id" class="form-control" value="{{ $company_master->company_id}}" readonly>
        
                        </div>
                    </div>                          
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Company Name</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="company_name" class="form-control" value="{{ $company_master->company_name}}">
        
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Address</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="address" class="form-control" value="{{ $company_master->address}}">                                        
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Suburb</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="suburb" class="form-control" value="{{ $company_master->suburb}}">                                       
                        </div>
                    </div>
                     <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Post Code</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="post_code" class="form-control" value="{{ $company_master->post_code}}">                                        
                        </div>
                    </div>
                    <div class="form-group ">
                     <label for="name" class="col-md-3 control-label">Phone Number</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="ph" class="form-control" value="{{ $company_master->ph}}">                                       
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Email</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="email" class="form-control" value="{{ $company_master->email}}">                                       
                        </div>
                    </div>
                    
                   <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Fax</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="fax" class="form-control" value="{{ $company_master->fax}}">                                       
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Web ID</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="web" class="form-control" value="{{ $company_master->web}}">                                       
                        </div>
                    </div>
                    <div class="box-footer text-right">
                        <a class="btn btn-link text-left" href="{{ route('company_masters.index') }}">Cancel</a>
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

