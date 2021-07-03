@extends('layouts/default')

{{-- Page title --}}
@section('title')
Room Assets
@parent
@stop
@section('header_right')
  <a href="{{ route('condition_reports.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
@stop

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class=" col" style="padding-left: 100px;">


          
         <form id="create-form" class="form-horizontal" method="post" action = "{{ route ('condition_reports.update', $condition_report->id) }}" style="width: 1050px; align-items: center;   background-color: #fff; " autocomplete="off" role="form" >
            @method('PATCH') 

                 {{ csrf_field() }}
            <!-- box -->
             <div class="box box-default">
                <!-- box-header -->
               <!-- box-header -->
              <div class="box-header with-border text-center">
                 <h3><b>Room Assets</b></h3>
                   
                </div><!-- /.box-header -->

                </div><!-- /.box-header -->


                <!-- box-body -->
             <div class="box-body" style="padding-left: 50px;">                         
                    <div class="form-row" style="padding-bottom:10px;">
                    <div class="col-md-4 mb-3">
                        <label for="name" >Resident Name</label>
                        <select class="form-control" required="" id="res_name" name="res_name" style="height: 26px;padding: 3px 10px;">
                          @foreach($residents as $resident)
                          <option value="{{ $resident->id }}" {{ $condition_report->res_name == $resident->fname. $resident->mname. $resident->lname ? 'selected' : ''  }}> {{ $resident->fname}}. {{$resident->mname}}. {{$resident->lname  }}</option>
                          @endforeach
                        </select>
                       </div>
                      <div class="col-md-2 mb-2" style="width: 90px;">
                        <label for="name" >Room</label>
                        <input type="number" name="room" id="room" value="{{ $condition_report->room}}" class="form-control" readonly>                                      

                       </div>
                     
                      <div class="col-md-3 mb-3">
                        <label for="name" >Date</label>
                        <input type="date" name="res_date" value="{{ $condition_report->res_date}}" id="res_date" class="form-control" >                                     
                       </div>
                           <div class="col-md-3 mb-3">
                        <label for="name" >Staff Name</label>
                         <select class="form-control" style="height: 26px;padding: 3px 10px;" id="res_name" name="stf_name">
                            <option>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}" {{ $condition_report->stf_name == $emp->name ? 'selected' : ''  }}> {{ $emp->name }}</option>
                          @endforeach
                        </select>
                      </div><br>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                   @for ($i=0; $i < $num; $i++)
                    <div  class="form-row" style="padding-bottom:30px;">
                        <div class="col-md-2 mb-3" style="width: 90px;">
                        <label for="name"  >Item No</label>
                        <input type="text" name="item_no[]" id="item_no"  class="form-control" value="{{ $item_no[$i] }}" >                                      
                       </div>
                        <div class="col-md-3 mb-3">
                        <label for="name" >Item / Furniture</label>
                        <input type="text" name="items[]" class="form-control" value="{{  $items[$i] }}">                                     
                       </div>
                       <div class="col-md-2 mb-3">
                        <label for="name" >Owned By</label>
                         <select name="owned_by[]" class="form-control" style="height: 26px;padding: 3px 10px;"> 
                            <option value="O" style="font-size: 14px;" {{ $owned_by[$i] == 'O' ? 'selected' : ''  }}>Resident</option> 
                            <option value="F" style="font-size: 14px;" {{ $owned_by[$i] == 'F' ? 'selected' : ''  }}>Facility</option> 
                        </select>
                       </div>
                    
                      <div class="col-md-2 mb-3">
                        <label for="name" >Condition</label>
                            
                         <select name="res_cond[]"  class="form-control" style="height: 26px;padding: 3px 10px;"> 
                            <option value="P" style="font-size: 14px;" {{ $res_cond[$i] == 'P' ? 'selected' : ''  }}>Poor</option> 
                            <option value="G" style="font-size: 14px;" {{ $res_cond[$i] == 'G' ? 'selected' : ''  }}>Good</option> 
                            <option value="R" style="font-size: 14px;" {{ $res_cond[$i] == 'R' ? 'selected' : ''  }}>In need of repair</option> 

                        </select>
                       </div>
                      
                        <div class="col-md-3 mb-3">
                        <label for="name" >Comments/Description</label>
                        <input type="text" name="res_comments[]"  class="form-control" value="{{ $res_comments[$i] }}">                                      
                      </div>
                   
                    </div>             
                  <br><br>
                @endfor
                <br><br>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <!--  <div class="col-md-4 mb-3">
                    <div class="form-row">
                                  
                      
                      <div class="col-md-4 mb-3">
                        <label for="name" >Resident Sign</label>
                        <input type="text" name="res_sign" class="form-control" placeholder="Resident Sign">                                        
                       </div>
                    </div>--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>-->
                    <!--<div class="form-row">
                       
                    <div class="col-md-4 mb-3">
                        <label for="name" >Staff Sign</label>
                        <input type="text" name="st_sign" class="form-control" placeholder="Staff Sign">                                        
                       </div>-->
                     
                    <!-- <div class="col-md-4 mb-3">
                        <label for="name" >Company Id</label>
                    
                         <select class="form-control" style="height: 26px;padding: 3px 10px;" required="" name="company_id" id="company_id">
                            <option>--Select Company ID --</option>
                          @foreach($companies as $company)
                          <option value="{{ $company->company_id }}" >{{ $company->company_id }}</option>
                          @endforeach
                        </select>                                   
                      </div>-
                    
                    </div>-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
                    
                      <!--<div class="col-md-4 mb-3">
                        <label for="name" >Location Id</label>
                        <select class="form-control" style="height: 26px;padding: 3px 10px;" required="" name="location_id" id="location_id">
                            <option>--Select Location Id --</option>
                        </select>
                      </div>-->


                       <br><br>
                </div> <!-- ./box-body -->

                     <div class="box-footer text-right" style="padding-right:150px;">
                        <a class="btn btn-link text-left" href="{{ route('condition_reports.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check icon-white" aria-hidden="true"></i> Save</button>
                    </div>

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
