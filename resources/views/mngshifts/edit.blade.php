
@extends('layouts/default')

{{-- Page title --}}
@section('title')
Update Mngshifts
@parent
@stop
@section('header_right')
  <a href="{{ route('mngshifts.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
@stop

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class=" col" style="padding-left: 100px;">

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('mngshifts.store') }}"  style="width: 1050px; align-items: center;   background-color: #fff; " autocomplete="off" role="form" >
                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
               <!-- box-header -->
              <div class="box-header with-border text-center">
                 <h3><b>Morning Shift</b></h3>
                   
                </div><!-- /.box-header -->


                <!-- box-body -->
                <div class="box-body" style="padding-left: 50px;padding-right: 0px;">                           
                    <div class="form-row" style="padding-bottom:30px;">
                    <div class="col-md-6 mb-6">
                        <label for="name" >Morning staff</label>
                         <select class="form-control" style="height: 26px;padding: 3px 10px;" id="mng_staff" name="mng_staff">
                            <option>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}"> {{ $emp->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-6 mb-6" style="padding-bottom:30px;">
                       <label for="name" >Evening staff</label>
                         <select class="form-control" style="height: 26px;padding: 3px 10px;" id="evng_staff" name="evng_staff">
                            <option>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}"> {{ $emp->name }}</option>
                          @endforeach
                        </select>
                      </div>

                     </div>
                     
                     <div class="form-row" style="padding-bottom:30px;">
                      <div class="col-md-6 mb-6">
                        <label for="name" >Resident Name</label>
                        <select class="form-control" required="" id="res_name" name="res_name" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Resident Name  --</option>
                          @foreach($residents as $resident)
                          <option value="{{ $resident->fname}} {{$resident->mname}} {{$resident->lname}}"> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach
                        </select>                                   
                       </div>
                       <div class="col-md-6 mb-6">
                        <label for="name" >Room No</label>
                        <input type="number" name="room" id="room" class="form-control" value="{{ $mngshift->room}}" >
                      </div>
                    </div>
                    <div class="form-row" style="padding-bottom:30px;">
                      <div class="col-md-6 mb-6">
                        <label for="name" >Note</label>
                        <textarea name="notes" id="notes" class="form-control" >{{ $mngshift->notes}}</textarea>                                     
                       </div>
                       <div class="col-md-6 mb-6">
                        <label for="name" >Date</label>
                        <input type="date" name="mng_date" id="mng_date" class="form-control" value="{{ $mngshift->mng_date}}" >                                     
                       </div>
                    </div>
                    
                    

                                       
                     <div class="box-footer text-right" style="padding-right:80px;">
                        <br><br><a class="btn btn-link text-left" href="{{ route('condition_reports.index') }}">Cancel</a>
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

