
@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
    @can('create', \App\Models\SrsStaff::class)
        <a href="{{ route('srs_staffs.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

@section('inputFields')

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('srs_staffs.store') }}" autocomplete="off" role="form" style="width: 800px;">
                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
                <div class="box-header with-border text-center">
                   <h3><b>Employees</b></h3>
                   
                </div><!-- /.box-header -->

                <!-- box-body -->
                <div class="box-body" style="padding-left: 40px;padding-right: 40px;">                          
                    <div class="form-group ">
                      <div class="col-md-4 mb-3">
                        <label for="fname">First name</label>
                        <input type="text" class="form-control" placeholder="First Name" id="fname" name="fname" required v-on:change="page_one.fname = $event.target.value" required="">                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="mname">Middle name</label>
                        <input type="text" class="form-control" placeholder="Middle Name" id="mname" name="mname" required v-on:change="page_one.mname = $event.target.value">                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="lname">Last name</label>
                        <input type="text" class="form-control" placeholder="Last Name" id="lname" name="lname" required v-on:change="page_one.lname = $event.target.value">                
                      </div>                        
                    </div>
                    <div class="form-group ">
                           <div class="col-md-6 mb-3 ">
                        <label for="name" >Date of Birth</label>

                 <input type="date" name="dob" class="form-control" placeholder="Date of Birth">                                        
                        </div>
                        
                           <div class="col-md-6 mb-3 ">
                        <label for="name" >Phone Number</label>

                 <input type="text" name="ph" class="form-control" placeholder="Phone Number">                                       
                        </div>
                    </div>
                    <div class="form-group ">
                     
                    
                         <div class="col-md-6 mb-3 ">
                        <label for="name" >Email</label>

                 <input type="email" name="email" class="form-control" placeholder="Email">                                        
                        </div>
                        <div class="col-md-6 mb-3 ">
                        <label for="name" >Qualification</label>

                            <select name="quali" class="form-control" style="height: 26px;padding: 3px 10px;"> 
                            <option value="" style="font-size: 14px;">------------  Select Qualification       ------------</option> 
                            <option value="M-Tech" style="font-size: 14px;">M-Tech</option> 
                            <option value="B-Tech" style="font-size: 14px;">B-Tech</option> 
                            <option value="PG" style="font-size: 14px;">PG</option> 
                            <option value="Master Degree" style="font-size: 14px;">Master Degree</option> 
                            <option value="Degree" style="font-size: 14px;">Degree</option> 

                        </select>
                        </div>
                    </div>
                    <div class="form-group ">
                         
                        <div class="col-md-6 mb-3 ">
                             <label for="name" >Address</label>
                              <textarea  name="address" class="form-control" placeholder="Address"></textarea>                                 
                        </div>
                    </div>
                  <!--  <div class="form-group ">
                        <label for="name" >Company Id</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="company_id" class="form-control" placeholder="Company Id">                                     
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" >Location Id</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="location_id" class="form-control" placeholder="Location Id">                                     
                        </div>
                    </div>-->
                    <div class="box-footer text-right">
                        <a class="btn btn-link text-left" href="{{ route('srs_staffs.index') }}">Cancel</a>
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

