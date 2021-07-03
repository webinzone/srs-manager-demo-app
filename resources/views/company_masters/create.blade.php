
@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop
@section('header_right')
    @can('create', \App\Models\CompanyMaster::class)
        <a href="{{ route('company_masters.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

@section('inputFields')

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('company_masters.store') }}" autocomplete="off" role="form" >
                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
        
             <div class="box-header with-border text-center">
                 <h3><b>Company Master</b></h3>
                   
                </div><!-- /.box-header -->


                <!-- box-body -->
                <div class="box-body" style="padding-left:90px;">    
                    <div class="form-group ">
                            <label for="name" class="col-md-3 control-label">Company ID</label>
                            <div class="col-md-7 col-sm-12 ">
                     <input type="text" name="company_id" class="form-control" required="" value="{{$company_id}}" readonly="">
            
                            </div>
                        </div>                      
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Name</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="company_name" class="form-control" required="" placeholder="Company Name">
        
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Address</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="address" class="form-control" required="" placeholder="Address">                                      
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Suburb</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="suburb" class="form-control" required="" placeholder="Location Id">                                        
                        </div>
                    </div>
                      <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">State</label>
                        <div class="col-md-7 col-sm-12 ">
                            <select name="state"  class="form-control" > 
                            <option value="" style="font-size: 14px;">---Select State--</option> 
                            <option value="Victoria" style="font-size: 14px;">Victoria</option> 
                            <option value="New South Wales" style="font-size: 14px;">New South Wales</option> 
                            <option value="Queensland" style="font-size: 14px;">Queensland</option>
                            <option value="Tasmania" style="font-size: 14px;">Tasmania</option>
                            <option value="South Australia" style="font-size: 14px;">South Australia</option>
                             <option value="Western Australia" style="font-size: 14px;">Western Australia</option>
                            <option value="Northern Territory" style="font-size: 14px;">Northern Territory</option>                                               
                            <option value="Australian Capital Territory" style="font-size: 14px;">Australian Capital Territory</option>
                        </select> 
                                     
                        </div>
                    </div>
                    
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Post Code</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="post_code" class="form-control"  placeholder="Post Code">                                        
                        </div>
                    </div>
                  
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Phone Number</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="ph" class="form-control"  placeholder="Phone Number">                                       
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Email</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="email" class="form-control"  placeholder="Email">                                        
                        </div>
                    </div>
                    
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Fax</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="fax" class="form-control" placeholder="Fax">                                     
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Web</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="web" class="form-control"  placeholder="Web ID">                                       
                        </div>
                    </div>
                    <div class="box-footer text-right" style="padding-right:110px;">
                        <a class="btn btn-link text-left" href="{{ route('company_masters.index') }}">Cancel</a>
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

