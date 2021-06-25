
@extends('layouts/default')

{{-- Page title --}}
@section('title')
Create LocationMaster
@parent
@stop
@section('header_right')
    @can('create', \App\Models\LocationMaster::class)
        <a href="{{ route('location_masters.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

@section('inputFields')

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('location_masters.store') }}" autocomplete="off" role="form" >
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
                                <a class="btn btn-link text-left" href="{{ route('location_masters.index') }}">
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
                        <label for="name" class="col-md-3 control-label">Company Id</label>
                        <div class="col-md-4 col-sm-12 required">
                         <select class="form-control" name="company_id">
                            <option>--Select Company ID --</option>
                          @foreach($companies as $company)
                          <option value="{{ $company->company_id }}">{{ $company->company_id }}</option>
                          @endforeach
                        </select>
        
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Master Name</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="master_name" class="form-control" placeholder="Master Name">                                      
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Address</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="address" class="form-control" placeholder="Address">                                        
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Suburb</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="suburb" class="form-control" placeholder="Location Id">                                        
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Post Code</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="post_code" class="form-control" placeholder="Post Code">                                        
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">State</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="state" class="form-control" placeholder="State">                                        
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Phone Number</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="ph" class="form-control" placeholder="Phone Number">                                       
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Email</label>
                        <div class="col-md-7 col-sm-12 required">
                         <input type="text" name="email" class="form-control" placeholder="Email">                                        
                        </div>
                    </div>
                    
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Fax</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="fax" class="form-control" placeholder="Fax">                                     
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Web Id</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="web_id" class="form-control" placeholder="Web Id">                                      
                        </div>
                    </div>
                    <div class="box-footer text-right">
                        <a class="btn btn-link text-left" href="{{ route('location_masters.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check icon-white" aria-hidden="true"></i> Save</button>
                    </div>

                </div> <!-- ./box-body -->
                            <!-- col-md-8 -->

                </div><!-- ./row -->
     </form>
</div>
@stop

@section('moar_scripts')
@include ('partials.bootstrap-table')
@stop

