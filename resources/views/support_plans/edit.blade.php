@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
    @can('create', \App\Models\SupportPlan::class)
        <a href="{{ route('support_plans.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

@section('inputFields')

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">

          <form id="create-form" class="form-horizontal" method="post" action="{{ route ('support_plans.update', $support_plan->id) }}" autocomplete="off" role="form" style="width: 800px;">
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
                        <a class="btn btn-link text-left" href="{{ route('support_plans.index') }}">Cancel</a>
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