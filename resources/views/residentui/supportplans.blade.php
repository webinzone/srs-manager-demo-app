@extends('layouts/resident')


@section('content')

<div class="panel with-nav-tabs panel-default" style="padding-left:28px;padding-right: 32px;background-color: #BDF5BD;border-color: #BDF5BD;">
                       <div class="panel-heading single-project-nav">
                          <ul class="nav nav-tabs"> 
                           <li >
                              <a href="{{ route("residentDetails", $r_id) }}" ><i class="fa fa-user" aria-hidden="true" style="font-size: 20px;"></i></a>
                           </li>
                           <li >
                              <a href="{{ route("rsaDetails", $r_id) }}" >Resident Agreement</a>
                           </li>
                           <li >
                              <a href="{{ route("roomDetails", $r_id) }}" >Conditions</a>
                           </li>
                           
                           <li >
                               <a href="{{ route("referralDetails", $r_id) }}" >Referal</a>
                           </li>
                          
                           <li class="active">
                               <a href="{{ route("plansDetails", $r_id) }}" >Support Plan</a>
                           </li>
                           <li >
                               <a href="{{ route("incidentDetails", $r_id) }}" >Incident</a>
                           </li>
                           <li>
                               <a href="{{ route("transferDetails", $r_id) }}" >Transfer</a>
                           </li>
                           <li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reports <span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu">
                                 <li><a href="{{ route('generateResReport', ['res' => $r_id]) }}" target="_blank">Resident</a></li>
                                 <li class="divider"></li>                                 
                                 <li><a href="{{ route('generateReport', ['res_name' => $r_id]) }}" target="_blank">Condition Report</a></li>
                                 <li class="divider"></li>
                                 <li><a href="{{ route('generateRSAReport', ['res_name' => $r_id]) }}" target="_blank">RSA</a></li>
                                 <li class="divider"></li>
                                 <li><a href="{{ route('generateReferralReport', ['res_name' => $r_id]) }}" target="_blank">Referral</a></li>
                                 <li class="divider"></li>
                                 <li><a href="{{ route('generateRentReport', ['res_name' => $r_id]) }}"  target="_blank">Rent Details</a></li>
                                  <li class="divider"></li>
                                 <li><a href="{{ route('generateProgressReport', ['res_name' => $r_id]) }}"  target="_blank">Progress Report</a></li>
                                 <li class="divider"></li>
                                 <li><a href="{{ route('generateTransferReport', ['res_name' => $r_id]) }}" target="_blank">Transfer</a></li>
                                 
                                
                              </ul>
                          </li>
                       </ul>
                    </div>
                    
                 </div>


<div id="webui">  
  <div class="row" style="padding-left: 30px;padding-right: 80px;">
      
    
        <!-- col-md-8 -->
        <div class="col-md-10 offset-1">

       
          <form id="create-form" class="form-horizontal" method="post" action="{{ route ('support_plans.update', [$support_plan->id, 'val' => 'res']) }}" autocomplete="off" role="form" style="width: 1000px;">
             @method('PATCH')
                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
                <div class="box-header with-border text-center">
                   <h3><b>Support Plans</b></h3>
                   
                </div><!-- /.box-header -->

                <!-- box-body -->
                <div class="box-body" style="padding-left: 40px;padding-right: 40px;">                          
                    <div class="form-group ">
                      <div class="col-md-6 mb-3">
                        <label for="name" >Resident Name</label>
                        <select class="form-control" required="" id="user_name" name="user_name" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Resident Name  --</option>
                          @foreach($residents as $resident)
                            <option value="{{ $resident->id }}" {{ $support_plan->user_name == $resident->fname." ".$resident->mname." ".$resident->lname ? 'selected' : ''  }}> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach
                        </select>                
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="name">Personal Hygiene</label>
                        <textarea  name="hygiene" class="form-control" placeholder="Personal Hygiene">{{ $support_plan->hygiene}}</textarea>                
                      </div>
                  </div>
                  <div class="form-group ">
                      <div class="col-md-6 mb-3">
                        <label for="name">Nutrition</label>
                        <textarea  name="nutrition" class="form-control" placeholder="Eating ana Nutrition">{{ $support_plan->nutrition}}</textarea>                
                      </div>
                         <div class="col-md-6 mb-3">
                        <label for="name">Health Care</label>
                        <textarea  name="health_care" class="form-control" placeholder="Health Care">{{ $support_plan->health_care}}</textarea>                
                      </div>                       
                    </div>
                    <div class="form-group ">
                        <div class="col-md-6 mb-3">
                        <label for="name">Medication details</label>
                        <textarea  name="medication" class="form-control" placeholder="Medication Details">{{ $support_plan->medication}}</textarea>                
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="name">Social Contact and Emotional Wellbeing</label>
                        <textarea  name="social_contact" class="form-control" placeholder="Social Contact and Emotional Wellbeing">{{ $support_plan->social_contact}}</textarea>                
                      </div> 
                    </div>
                    <div class="form-group ">
                        <div class="col-md-6 mb-3">
                        <label for="name">Behaviour</label>
                        <textarea  name="behaviour" class="form-control" placeholder="Behaviour">{{ $support_plan->behaviour}}</textarea>                
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="name">Goals/Finances/Other</label>
                        <textarea  name="goals" class="form-control" placeholder="Goals/Finances/Other">{{ $support_plan->goals}}</textarea>                
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
                      
                        <button style="width: 100px;" type="submit" class="btn btn-primary"><i class="fa fa-check icon-white" aria-hidden="true"></i> Save</button>
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