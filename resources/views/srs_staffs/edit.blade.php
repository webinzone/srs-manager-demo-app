
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

            
         <div class="box-body" style="padding-left: 40px;padding-right: 40px;">                          
                    <div class="form-group ">
                      <div class="col-md-4 mb-3">
                        <label for="fname">First name</label>
                        <input type="text" class="form-control" value="{{ $name[0]}}" id="fname" name="fname"  v-on:change="page_one.fname = $event.target.value" >                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="mname">Middle name</label>
                        <input type="text" class="form-control" value="{{ $name[1]}}"  id="mname" name="mname"  v-on:change="page_one.mname = $event.target.value">                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="lname">Last name</label>
                        <input type="text" class="form-control" value="{{ $name[2]}}" id="lname" name="lname"  v-on:change="page_one.lname = $event.target.value">                
                      </div>                        
                    </div>
                    <div class="form-group ">
                           <div class="col-md-6 mb-3 ">
                        <label for="name" >Date of Birth</label>

                 <input type="date" name="dob" class="form-control" value="{{ $srs_staff->dob}}">                                        
                        </div>
                        
                           <div class="col-md-6 mb-3 ">
                        <label for="name" >Phone Number</label>

                 <input type="text" name="ph" class="form-control" value="{{ $srs_staff->ph}}">                                       
                        </div>
                    </div>
                    <div class="form-group ">
                     
                    
                         <div class="col-md-6 mb-3 ">
                        <label for="name" >Email</label>

                 <input type="email" name="email" class="form-control" value="{{ $srs_staff->email}}">                                        
                        </div>
                        <div class="col-md-6 mb-3 ">
                        <label for="name" >Qualification</label>

                            <select name="quali" class="form-control"  style="height: 26px;padding: 3px 10px;"> 
                           
                            <option value="M-Tech" {{ $srs_staff->quali == 'M-Tech' ? 'selected' : ''  }} style="font-size: 14px;">M-Tech</option> 
                            <option value="B-Tech" {{ $srs_staff->quali == 'B-Tech' ? 'selected' : ''  }} style="font-size: 14px;">B-Tech</option> 
                            <option value="PG" {{ $srs_staff->quali == 'PG' ? 'selected' : ''  }} style="font-size: 14px;">PG</option> 
                            <option value="Master Degree" {{ $srs_staff->quali == 'Master Degree' ? 'selected' : ''  }} style="font-size: 14px;">Master Degree</option> 
                            <option value="Degree" {{ $srs_staff->quali == 'Degree' ? 'selected' : ''  }} style="font-size: 14px;">Degree</option> 

                        </select>
                        </div>
                    </div>
                    <div class="form-group ">
                         
                        <div class="col-md-6 mb-3 ">
                             <label for="name" >Address</label>
                              <textarea  name="address" class="form-control" >{{ $srs_staff->address}}</textarea>                                 
                        </div>
                    </div>

                <!-- ./box-body -->
                            <!-- col-md-8 -->

            </div>
                 
                    <div class="box-footer text-right" style="padding-right:50px;">
                        <a class="btn btn-link text-left" href="{{ route('srs_staffs.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check icon-white" aria-hidden="true"></i> Save</button>
                    </div>

                </div> 


<!-- ./row -->
        </form>
      </div>
    </div>
</div>
@stop

@section('moar_scripts')
@include ('partials.bootstrap-table')
@stop

