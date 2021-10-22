@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
    @can('create', \App\Models\Complaint::class)
        <a href="{{ route('complaints.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

@section('inputFields')

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">

          <form id="create-form" class="form-horizontal" method="post" action="{{ route ('complaints.update', $complaint->id) }}" autocomplete="off" role="form" style="width: 800px;">
            @method('PATCH') 

                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
                <div class="box-header with-border text-center">
                   <h3><b>Complaints</b></h3>
                   
                </div><!-- /.box-header -->

                <!-- box-body -->
                <div class="box-body" style="padding-left: 40px;padding-right: 40px;">                          
                    <div class="form-group ">
                      <div class="col-md-4 mb-3">
                        <label for="name" >Staff Name</label>
                         <select class="form-control" style="height: 26px;padding: 3px 10px;" id="res_name" name="stf_name">
                            <option>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}" {{ $complaint->f_name == $emp->name ? 'selected' : '' }}>{{ $emp->name }}</option>
                          @endforeach
                        </select>                
                      </div>
                      <div class="col-md-4 mb-3 ">
                        <label for="name" >Date</label>

                 <input type="date" name="c_date" class="form-control" value="{{ $complaint->c_date}}" placeholder="Date">                                        
                        </div>
                      <div class="col-md-4 mb-3">
                        <label for="name">Name of Person Commenting</label>
                        <input type="text" name="user_name" class="form-control" value="{{ $complaint->user_name}}" placeholder="Name of Person Commenting">               
                      </div>
                    </div>
                     
                    <div class="form-group ">
                           <div class="col-md-4 mb-3 ">
                        <label for="name" >Nature of Complaint</label>

                 <input type="text" name="com_nature" class="form-control" value="{{ $complaint->com_nature}}" placeholder="Nature of Complaint">                                        
                        </div>
                         <div class="col-md-4 mb-3 ">
                        <label for="name" >Person completing form</label>

                 <input type="text" name="p_comp" class="form-control" value="{{ $complaint->p_comp}}" placeholder="Person completing form">                                       
                        </div>
                         <div class="col-md-4 mb-3 ">
                        <label for="name" >Contact Number</label>

                 <input type="text" name="phone" class="form-control" value="{{ $complaint->phone}}" placeholder="Contact Number">                                       
                        </div>
                        
                       
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <div class="form-group ">
                           <div class="col-md-4 mb-3 ">
                        <label for="name" >Person Nominated</label>

                 <input type="text" name="p_nomini" class="form-control" value="{{ $complaint->p_nomini}}" placeholder="Person Nominated">                                        
                        </div>
                         <div class="col-md-4 mb-3 ">
                        <label for="name" >Date & Time Notified</label>

                 <input type="date" name="noti_date" class="form-control" value="{{ $complaint->noti_date}}" placeholder="Date & Time Notified">&nbsp;&nbsp;&nbsp;
             </div>
             <div class="col-md-4 mb-3 ">
                <label>&nbsp;&nbsp;&nbsp;</label>
                 <input type="time" name="noti_time" class="form-control" value="{{ $complaint->noti_time}}" placeholder="Date & Time Notified">                                       
                        </div>
                    </div>
                    <div class="form-group "> 

                     <div class="col-md-3 mb-3 ">
                        <label for="name" >Action Date</label>

                 <input type="date" name="action_date" class="form-control" value="{{ $complaint->action_date}}" placeholder="Action Date">                                        
                        </div>
                         <div class="col-md-4 mb-3 ">
                        <label for="name">Complaint Details</label>
                        <textarea name="com_details" class="form-control"  placeholder="Complaint Details">{{ $complaint->com_details}}</textarea>                                       
                        </div>
                        
                       

                    
                      <div class="col-md-5 mb-3 ">
                        <label for="name" >Suggestions for improvement</label>

                 <textarea name="suggestions" class="form-control" placeholder="Suggestions for improvement">{{ $complaint->suggestions}}</textarea>                                        
                        </div>
                      
                    </div>
                    <div class="form-group ">
                        <div class="col-md-6 mb-3 ">
                        <label for="name" >Action Taken</label>

                 <textarea name="action_taken" class="form-control"  placeholder="Action Taken">{{ $complaint->action_taken}}</textarea>
                        </div>
                        <div class="col-md-6 mb-3 ">
                        <label for="name" >Outcome/Method of Communication</label>

                 <textarea name="outcome" class="form-control"  placeholder="Outcome/Method of Communication">{{ $complaint->outcome}}</textarea>
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
                        <a class="btn btn-link text-left" href="{{ route('complaints.index') }}">Cancel</a>
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