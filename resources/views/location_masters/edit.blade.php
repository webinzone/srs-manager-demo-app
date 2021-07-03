
@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop
@section('header_right')
  <a href="{{ route('location_masters.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
@stop

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">

          
         <form id="create-form" class="form-horizontal" method="post" action = "{{ route ('location_masters.update', $location_master->id) }}" autocomplete="off" role="form" >
            @method('PATCH') 

                 {{ csrf_field() }}
            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
               <div class="box-header with-border text-center">
                 <h3><b>Location Master</b></h3>
                   
                </div>
                <!-- box-body -->
               <div class="box-body" style="padding-left:90px;">                           
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Location Id</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="location_id" class="form-control" value="{{ $location_master->location_id}}" readonly>
        
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Company Id</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="company_id" class="form-control" value="{{ $location_master->company_id}}" readonly>
        
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Master Name</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="master_name" class="form-control" value="{{ $location_master->master_name}}">                                        
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Address</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="address" class="form-control" value="{{ $location_master->address}}">                                       
                        </div>
                    </div>
                     <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Suburb</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="suburb" class="form-control" value="{{ $location_master->suburb}}">                                        
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Post Code</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="post_code" class="form-control" value="{{ $location_master->post_code}}">                                        
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">State</label>
                        <div class="col-md-7 col-sm-12 ">
                   <select name="state"  class="form-control" > 
                            <option value="Victoria" {{ $location_master->state == 'Victoria' ? 'selected' : ''  }} style="font-size: 14px;">Victoria</option> 
                            <option value="New South Wales" {{ $location_master->state == 'New South Wales' ? 'selected' : ''  }} style="font-size: 14px;">New South Wales</option> 
                            <option value="Queensland" {{ $location_master->state == 'Queensland' ? 'selected' : ''  }}  style="font-size: 14px;">Queensland</option>
                            <option value="Tasmania" {{ $location_master->state == 'Tasmania' ? 'selected' : ''  }}  style="font-size: 14px;">Tasmania</option>
                            <option value="South Australia" {{ $location_master->state == 'South Australia' ? 'selected' : ''  }}  style="font-size: 14px;">South Australia</option>
                             <option value="Western Australia" {{ $location_master->state == 'Western Australia' ? 'selected' : ''  }}  style="font-size: 14px;">Western Australia</option>
                            <option value="Northern Territory" {{ $location_master->state == 'Northern Territory' ? 'selected' : ''  }}  style="font-size: 14px;">Northern Territory</option>                                               
                            <option value="Australian Capital Territory" {{ $location_master->state == 'Australian Capital Territory' ? 'selected' : ''  }}  style="font-size: 14px;">Australian Capital Territory</option>
                        </select>                                     
                        </div>
                    </div>
                      <div class="form-group ">
                     <label for="name" class="col-md-3 control-label">Phone Number</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="ph" class="form-control" value="{{ $location_master->ph}}">                                       
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Email</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="email" class="form-control" value="{{ $location_master->email}}">                                       
                        </div>
                  </div>
                   <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Fax</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="fax" class="form-control" value="{{ $location_master->fax}}">                                       
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Web Id</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="web_id" class="form-control" value="{{ $location_master->web_id}}">                                       
                        </div>
                    </div>
                    <div class="box-footer text-right"  style="padding-right:110px;">
                        <a class="btn btn-link text-left" href="{{ route('location_masters.index') }}">Cancel</a>
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

