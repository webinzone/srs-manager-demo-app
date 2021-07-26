
@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
    @can('create', \App\Models\Vaccate::class)
        <a href="{{ route('vaccates.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

@section('inputFields')

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('vaccates.store') }}" autocomplete="off" role="form" style="width: 800px;">
                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
                <div class="box-header with-border text-center">
                   <h3><b>Vaccate Form</b></h3>
                   
                </div><!-- /.box-header -->

                <!-- box-body -->
                <div class="box-body" style="padding-left: 40px;padding-right: 40px;">                          
                    <div class="form-group ">
                      <div class="col-md-3 mb-3">
                        <label>Resident Name</label>
                        <select class="form-control" required="" id="res_name" name="res_name" style="height: 26px;padding: 3px 10px;">
                            @foreach($residents as $resident)
                            <option value="{{ $resident->id }}" {{ $vaccate->r_name == $resident->fname." ".$resident->mname." ".$resident->lname ? 'selected' : ''  }}> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach
                        </select>                
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Room No</label>
                        <input type="text" name="roomno" id="roomno" class="form-control" value="{{ $vaccate->roomno}}" placeholder="Room No">                
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="name">Date</label>
                        <input type="date" name="v_date" id="v_date" class="form-control" value="{{ $vaccate->v_date}}" placeholder="Date">               
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="gender">Gender</label>&nbsp;&nbsp;&nbsp;
                        <select name="gender"  class="form-control" style="height: 26px;padding: 3px 10px;"> 
                            <option value="" style="font-size: 14px;">---Select--</option> 
                            <option value="Male" {{ $vaccate->gender == 'Male' ? 'selected' : ''  }} style="font-size: 14px;">Male</option> 
                            <option value="Female" {{ $vaccate->gender == 'Female' ? 'selected' : ''  }} style="font-size: 14px;">Female</option> 
                            <option value="Other" {{ $vaccate->gender == 'Other' ? 'selected' : ''  }} style="font-size: 14px;">Other</option>
                        </select>               
                        </div>                        
                    </div>
                    <div class="form-group ">
                        <div class="col-md-4 mb-3">
                        <label>Address</label>
                        <textarea  name="address" class="form-control"  placeholder="Address">{{ $vaccate->address}}</textarea>                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Phone Number</label>
                        <input type="tel" name="ph" id="ph" class="form-control" value="{{ $vaccate->ph}}" placeholder="Phone Number">                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $vaccate->email}}" placeholder="Room No">                
                      </div>
                    </div>
                    <div class="form-group ">
                     <div class="col-md-4 mb-3">
                        <label>Reason for moving</label>
                        <textarea  name="reason" class="form-control" placeholder="Reason for moving">{{ $vaccate->reason}}</textarea>                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Expected move-out Date</label>
                        <input type="date" name="ex_date" id="ex_date" class="form-control" value="{{ $vaccate->ex_date}}" placeholder="Expected move-out Date">                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Has all resident moving?</label>
                        <br><input type="radio" onchange="findselected2();" {{ $vaccate->al_res == 'Yes' ? 'checked' : ''  }} id="al_res"  value="Yes" name="al_res">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" onchange="findselected2();" {{ $vaccate->al_res == 'No' ? 'checked' : ''  }}  id="al_res" value="No" name="al_res">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;               
                      </div>
                    </div>
                    <div class="form-group ">
                     <div class="col-md-4 mb-3">
                        <label>Forwarding Address</label>
                        <textarea  name="f_addr" class="form-control" value="{{ $vaccate->f_addr}}"placeholder="Forwarding Address"></textarea>                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Has all amount paid?</label>
                        <br><input type="radio" onchange="findselected2();" {{ $vaccate->pay_status == 'Yes' ? 'checked' : ''  }} id="pay_status"  value="Yes" name="pay_status">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" onchange="findselected2();" {{ $vaccate->pay_status == 'No' ? 'checked' : ''  }}  id="pay_status" value="No" name="pay_status">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                 
                      </div>
                      <div class="form-group ">
                     <div class="col-md-4 mb-3">
                        <label>Paid Amount</label>
                        <input type="text" name="pay_amt" id="pay_amt" class="form-control" value="{{ $vaccate->pay_amt}}" placeholder="Paid Amount">                
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
                        <a class="btn btn-link text-left" href="{{ route('vaccates.index') }}">Cancel</a>
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

