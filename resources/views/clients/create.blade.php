@extends('layouts/default')

{{-- Page title --}}
@section('title')
Add Clients
@parent
@stop
@section('header_right')
    @can('create', \App\Models\Client::class)
        <a href="{{ route('clients.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop
{{-- Page content --}}
@section('content')

<div id="webui">  
  <div class="row" style="padding-left: 80px;padding-right: 80px;">
      

        <div id="app">
   
        
        <div class="col-md-10 offset-1">
          <form class="form-horizontal" method="POST" action="{{ route('clients.store') }}" autocomplete="off" role="form" style="width: 1000px; align-items: center;   background-color: #fff; " enctype="multipart/form-data" >
              {{ csrf_field() }}
              <div class="box box-default">
              <!-- box-header -->
                <div class="box-header with-border text-right">

                    <div class="col-md-12 box-title text-right" style="padding: 0px; margin: 0px;">

                        <div class="col-md-12" style="padding: 0px; margin: 0px;">
                            <div class="col-md-9 text-left">
                                                        </div>
                            <div class="col-md-3 text-right" style="padding-right: 10px;">
                                <a class="btn btn-link text-left" href="{{ route('clients.index') }}">
                                    Cancel
                                </a>
                               
                            </div>
                        </div>
                    </div>

                </div><!-- /.box-header -->

                <!-- box-body -->
                <div class="box-body" style="padding-left: 50px;">    
                  <div class="page" v-show="step === 1">
                    
                    <h4 class="mb-3"><b>Personal Information</b></h4><br>              

                    <div class="form-row">
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
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Address" name="address" required v-on:change="page_one.address = $event.target.value">          
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="dob">Date of birth</label>
                        <input type="date" class="form-control" id="dob" placeholder="Date of birth" name="dob" v-on:change="page_one.dob = $event.target.value">              
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="cob">Country of birth</label>
                        <input type="text" class="form-control" id="cob" placeholder="Country of birth" name="cob" required v-on:change="page_one.cob = $event.target.value">          
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-2 mb-3">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" placeholder="age" name="age" required v-on:change="page_one.age = $event.target.value">              
                      </div>  
                      <div class="col-md-2 mb-3">
                        <label for="gender">Gender</label>&nbsp;&nbsp;&nbsp;
                        <select name="gender" required="" class="form-control" style="height: 26px;padding: 3px 10px;"> 
                            <option value="" style="font-size: 14px;">---Select--</option> 
                            <option value="Male" style="font-size: 14px;">Male</option> 
                            <option value="Female" style="font-size: 14px;">Female</option> 
                            <option value="Other" style="font-size: 14px;">Other</option>
                        </select> 

                        <!--<br><input type="radio"  id="gender"  value="Female" name="gender" required v-on:change="page_one.gender = $event.target.value">&nbsp;Female&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="gender" value="Male" name="gender" required v-on:change="page_one.gender = $event.target.value">&nbsp;Male&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="gender" value="Other" name="gender" required v-on:change="page_one.gender = $event.target.value">&nbsp;Other &nbsp;&nbsp;&nbsp;-->         
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="religion">Religion</label>
                        <input type="text" class="form-control" id="religion" placeholder="Religion" required name="religion" v-on:change="page_one.religion = $event.target.value">              
                      </div>  

                      <div class="col-md-4 mb-3">
                        <label for="l_known">Languages Known</label>
                        <input type="text" class="form-control" id="l_known" placeholder="Languages Known" required name="l_known" required v-on:change="page_one.l_known = $event.target.value">          
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="ph">Phone number</label>
                        <input type="tel" class="form-control" id="ph" placeholder="000-000-0000" name="ph" v-on:change="page_one.ph = $event.target.value">              
                      </div> 
                      <div class="col-md-4 mb-3">
                        <label for="medicard_no">Medicare card number</label>
                        <input type="text" class="form-control" id="medicard_no" placeholder="Languages Known" name="medicard_no" required v-on:change="page_one.medicard_no = $event.target.value">          
                      </div> 
                      <div class="col-md-4 mb-3">
                        <label for="expiry_date">Expiry date</label>
                        <input type="date" class="form-control" id="expiry_date" placeholder="Expiry date" required name="exp_date" onChange="compareDate();" v-on:change="page_one.expiry_date = $event.target.value">            
                      </div> 
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                       
                      <div class="col-md-4 mb-3">
                        <label for="pension_no">Pension card number</label>
                        <input type="text" class="form-control" id="pension_no" placeholder="Pension card number" name="pension_no" required v-on:change="page_one.pension_no = $event.target.value">          
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="insurance_no">Insurance card number if any</label>
                        <input type="text" class="form-control" id="insurance_no" placeholder="Insurance card number if any" name="insurance_no" required v-on:change="page_one.insurance_no = $event.target.value">            
                      </div>  
                       <div class="col-md-4 mb-3">
                        <label for="insu_compny">Insurance company name</label>
                        <input type="text" class="form-control" id="insu_compny" placeholder="Insurance company name" name="insu_compny" required v-on:change="page_one.insu_compny = $event.target.value">          
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                     
                      <!--<div class="col-md-4 mb-3">
                        <label for="likes">Likes</label>                        
                        <textarea class="form-control" id="likes" placeholder="likes" name="likes" required v-on:change="page_one.likes = $event.target.value"></textarea>            
                      </div> 
                       <div class="col-md-4 mb-3">
                        <label for="dislikes">Dislikes</label>
                        <textarea class="form-control" id="dislikes" placeholder="Dislikes" name="dislikes" required v-on:change="page_one.dislikes = $event.target.value"></textarea>
                      </div> -->
                      <div class="col-md-4 mb-3">
                        <label for="reference_source">Reference Source</label>
                        <input type="text" class="form-control" id="Reference Source" placeholder="reference_source" name="reference_source" v-on:change="page_one.reference_source = $event.target.value">            
                      </div> 
                      <div class="col-md-4 mb-3">
                        <label for="funding_source">Funding source</label>
                        <input type="text" class="form-control" id="funding_source" placeholder="Funding source"  name="funding_source" required v-on:change="page_one.funding_source = $event.target.value">                
                      </div>
                      
                      <div class="col-md-4 mb-3">
                        <label for="allowed_status">Visitors Allowed ?</label>
                        <br><input type="radio"  id="allowed_status"  value="Yes" name="allowed_status" required v-on:change="page_one.allowed_status = $event.target.value">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="allowed_status" value="No" name="allowed_status" required v-on:change="page_one.allowed_status = $event.target.value">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                        
                      </div>&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="allergy_status">Do you have any Allergey ?</label>
                        <br><input type="radio"  id="Allergey"  value="Yes" name="allergy_status" required v-on:change="page_one.allergy_status = $event.target.value">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="allergy_status" value="No" name="allergy_status" required v-on:change="page_one.allergy_status = $event.target.value">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="tof_allergy">Allergey Details</label>
                        <textarea class="form-control" id="tof_allergy" placeholder=" Hobbies" name="tof_allergy" v-on:change="page_one.tof_allergy = $event.target.value"></textarea>     
                      </div> 
                      <div class="col-md-4 mb-3">
                        <label for="hobies"> Hobbies</label>
                        <textarea class="form-control" id="hobies" placeholder=" Hobbies" name="hobies" required v-on:change="page_one.hobies = $event.target.value"></textarea>
                      </div>
                    </div>
                    
                    <h4 class="mb-3"><b>Next of kin</b></h4><br>
               
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="nok_name">Name</label>
                        <input type="text" class="form-control" id="nok_name" placeholder="Name" name="nok_name" v-on:change="page_one.nok_name = $event.target.value">              
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="nok_address">Address</label>
                        <input type="text" class="form-control" id="nok_address" placeholder="Address" name="nok_address" v-on:change="page_one.nok_address = $event.target.value">              
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="nok_ph">Phone Number</label>
                        <input type="tel" class="form-control" id="nok_ph" placeholder="Phone Number" name="nok_ph" v-on:change="page_one.nok_ph = $event.target.value">  
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="nok_nok">Email</label>
                        <input type="email" class="form-control" id="nok_email" placeholder="Email" name="nok_email" v-on:change="page_one.nok_email = $event.target.value">  
                      </div>
                      <div class="col-md-4 mb-3">
                        <label type="hidden" for="nok_nok"></label>
                        <input type="hidden" class="form-control" id="nok" placeholder="Email" name="nok" v-on:change="page_one.nok = $event.target.value">  
                      </div>
                      <div class="col-md-4 mb-3">
                        <label type="hidden" for="nok_nok"></label>
                        <input type="hidden" class="form-control" id="nok2" placeholder="Email" name="nok2" v-on:change="page_one.nok2 = $event.target.value">  
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;                   

                    
                    <br>&nbsp;&nbsp;&nbsp;    <h4 class="mb-3"><b>GP Details</b></h4><br>

                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="gp_name">General practitioner Name</label>
                        <input type="text" class="form-control" id="gp_name" placeholder="General practitioner Name" name="gp_name" required v-on:change="page_one.gp_name = $event.target.value">          
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="gp_address">Address</label>
                        <input type="text" class="form-control" id="gp_address" placeholder="Address" name="gp_address" v-on:change="page_one.gp_address = $event.target.value">              
                      </div>
                      <div class="col-md-4 mb-3">
                          <label for="ph3">Phone Number</label>
                          <input type="tel" class="form-control" id="ph3" placeholder="000-000-0000" name="ph3" v-on:change="page_one.ph3 = $event.target.value">              
                        </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="gp_email">Email</label>
                          <input type="email" class="form-control" id="gp_email" placeholder="Email" name="gp_email" v-on:change="page_one.gp_email = $event.target.value">              
                        </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                                                                        
                  </div>  
                                               
                  <!--<div class="page" v-show="step === 2">              
                    
                   <h4 class="mb-3"><b> <br>Family details</b></h4><br>

                   <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="f1name">First name</label>
                        <input type="text" class="form-control" id="f1name" placeholder="First Name"  name="f1name" required v-on:change="page_one.f1name = $event.target.value">                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="m1name">Middle name</label>
                        <input type="text" class="form-control" id="m1name" placeholder="Middle Name" name="m1name" required v-on:change="page_one.m1name = $event.target.value">                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="l1name">Last name</label>
                        <input type="text" class="form-control" id="l1name" placeholder="Last Name" name="l1name" required v-on:change="page_one.l1name = $event.target.value">                
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;
                      <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="relation">Relation</label>
                        <input type="text" class="form-control" id="relation" placeholder="Relation" name="relation" required v-on:change="page_one.relation = $event.target.value">      
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="address1">Address</label>
                        <input type="text" class="form-control" id="address1" placeholder="Address" name="address1" v-on:change="page_one.address1 = $event.target.value">              
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="gender1">Gender</label>&nbsp;&nbsp;&nbsp;
                        <br><input type="radio"  id="gender1"  value="Female" name="gender1" required v-on:change="page_one.gender1 = $event.target.value">&nbsp;&nbsp;&nbsp;Female&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="gender1" value="Male" name="gender1" required v-on:change="page_one.gender1 = $event.target.value">&nbsp;&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="gender1" value="Other" name="gender1" required v-on:change="page_one.gender1 = $event.target.value">&nbsp;&nbsp;&nbsp;Other &nbsp;&nbsp;&nbsp;           
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="ph1">Phone number</label>
                        <input type="tel" class="form-control" id="ph1" placeholder="Phone number" name="ph1" v-on:change="page_one.ph1 = $event.target.value">              
                      </div>    
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required v-on:change="page_one.email = $event.target.value">      
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" placeholder="Country" name="country" v-on:change="page_one.country = $event.target.value">              
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="religion1">Religion</label>
                        <input type="text" class="form-control" id="religion1" placeholder="Religion" name="religion1" required v-on:change="page_one.religion1 = $event.target.value">      
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;              
             
                    
                  </div> -->           
              
                  <!--<br><br><div class="page" v-show="step === 3">
                    
                    <br><h4 class="mb-3"><b>Power of attorney Details</b></h4><br>
               
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="po_maker">Person who make power of attorney</label>
                        <input type="text" class="form-control" id="po_maker" placeholder="Person who make power of attorney" name="po_maker" required v-on:change="page_one.po_maker = $event.target.value">          
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="po_maker_address">Address</label>
                        <input type="text" class="form-control" id="po_maker_address" placeholder="Address" name="po_maker_address" v-on:change="page_one.po_maker_address = $event.target.value">              
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="po_granter">Person who the power granted</label>
                        <input type="text" class="form-control" id="po_granter" placeholder="Person who make power of attorney" name="po_granter" required v-on:change="page_one.po_granter = $event.target.value">      
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="po_granter_address">Address of the power granted person</label>
                        <input type="text" class="form-control" id="po_granter_address" placeholder="Address of the power granted person" name="po_granter_address" v-on:change="page_one.po_granter_address = $event.target.value">              
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="grant_reason">Reason for granting</label>
                        <input type="text" class="form-control" id="grant_reason" placeholder="Reason for granting" name="grant_reason" required v-on:change="page_one.grant_reason = $event.target.value">      
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="g_date">Granted date</label>
                        <input type="date" class="form-control" id="g_date" placeholder="Granted date" name="g_date" v-on:change="page_one.g_date = $event.target.value">              
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="place">Place</label>
                        <input type="text" class="form-control" id="place" placeholder="Place" name="place" required v-on:change="page_one.place = $event.target.value">      
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="termination_date">Date of termination</label>
                        <input type="date" class="form-control" id="termination_date" placeholder="Date of termination" name="termination_date" v-on:change="page_one.termination_date = $event.target.value">              
                      </div>  
                    </div>
                   
                  </div>-->
                 <!-- <div class="page" v-show="step === 4">
                    
                    <h4 class="mb-3"><b>Allergy Details</b></h4><br>                        
                    
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="allergey">Allergey</label>
                        <br><input type="radio"  id="Allergey"  value="Yes" name="allergey" required v-on:change="page_one.allergey = $event.target.value">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="allergey" value="No" name="allergey" required v-on:change="page_one.allergey = $event.target.value">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="allergey_details">Allergey Details</label>
                        <input type="text" class="form-control" id="allergey_details" placeholder="Allergey Details" name="allergey_details" v-on:change="page_one.allergey_details = $event.target.value">              
                      </div> 
                    </div>
                     <!--<div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="tof_allergy">Type of alergy caused</label>
                        <input type="text" class="form-control" id="tof_allergy" placeholder="Type of alergy caused" name="tof_allergy" required v-on:change="page_one.tof_allergy = $event.target.value">          
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="hos_name">Name of the Doctor</label>
                        <input type="text" class="form-control" id="doc_name" placeholder="Name of the Hospital" name="doc_name" v-on:change="page_one.doc_name = $event.target.value">              
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">

                      <div class="col-md-6 mb-3">
                        <label for="hos_name">Name of the Hospital</label>
                        <input type="text" class="form-control" id="hos_name" placeholder="Name of the Hospital" name="hos_name" v-on:change="page_one.hos_name = $event.target.value">              
                      </div> 
                      <div class="col-md-6 mb-3">
                        <label for="duration">Duration period to visit</label>
                        <input type="text" class="form-control" id="duration" placeholder="Duration period to visit" name="duration" required v-on:change="page_one.duration = $event.target.value">          
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">

                      <div class="col-md-6 mb-3">
                        <label for="madicine">Name of the Medicines</label>
                        <input type="text" class="form-control" id="madicine" placeholder="Name of the Medicines" name="madicine" v-on:change="page_one.madicine = $event.target.value">              
                      </div>  
                      <div class="col-md-6 mb-3">
                        <label for="tests_report">Test Reports</label>
                        <input type="file"  id="tests_report" placeholder="Choose File" name="tests_report" required v-on:change="page_one.tests_report = $event.target.value">          
                      </div>&nbsp;&nbsp;&nbsp;                      
                        
                    
                    
                  </div>-->
     
                 <!-- <div class="page" v-show="step === 5">
                   
                    <h4 class="mb-3"><b>Visitors Allowed</b></h4><br>
                   
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="allowed_status">Allowed Status</label>
                        <br><input type="radio"  id="allowed_status"  value="Yes" name="allowed_status" required v-on:change="page_one.allowed_status = $event.target.value">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="allowed_status" value="No" name="allowed_status" required v-on:change="page_one.allowed_status = $event.target.value">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="gender2">Gender</label>
                        <br><input type="radio"  id="gender2"  value="Female" name="gender2" required v-on:change="page_one.gender2 = $event.target.value">&nbsp;&nbsp;&nbsp;Female&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="gender2" value="Male" name="gender2" required v-on:change="page_one.gender2 = $event.target.value">&nbsp;&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="gender2" value="Other" name="gender2" required v-on:change="page_one.gender2 = $event.target.value">&nbsp;&nbsp;&nbsp;Other &nbsp;&nbsp;&nbsp;                   
                      </div>
                       
                    </div>&nbsp;&nbsp;&nbsp;
                   <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" v-on:change="page_one.name = $event.target.value">              
                      </div> 
                      <div class="col-md-6 mb-3">
                        <label for="relation1">Relation</label>
                        <input type="text" class="form-control" id="relation1" placeholder="Relation" name="relation1" v-on:change="page_one.relation1 = $event.target.value">              
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="address2">Address</label>
                        <input type="text" class="form-control" id="address2" placeholder="Address" name="address2" v-on:change="page_one.address2 = $event.target.value">  
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="ph2">Phone Number</label>
                        <input type="tel" class="form-control" id="ph2" placeholder="Phone Number" name="ph2" v-on:change="page_one.ph2 = $event.target.value">              
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                     <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="id_no">ID Number</label>
                        <input type="text" class="form-control" id="id_no" placeholder="ID Number" name="id_no" v-on:change="page_one.id_no = $event.target.value">  
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="nationality">Nationality</label>
                        <input type="tel" class="form-control" id="nationality" placeholder="nationality" name="nationality" v-on:change="page_one.nationality = $event.target.value">              
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;      
                    
                  
                  </div>-->

             
                  <!--<div class="page" v-show="step === 6">
                    
                    <h4 class="mb-3"><b>GP Details</b></h4><br>

                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="gp_name">General practitioner Name</label>
                        <input type="text" class="form-control" id="gp_name" placeholder="General practitioner Name" name="gp_name" required v-on:change="page_one.gp_name = $event.target.value">          
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="gp_address">Address</label>
                        <input type="text" class="form-control" id="gp_address" placeholder="Address" name="gp_address" v-on:change="page_one.gp_address = $event.target.value">              
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                     <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="ph3">Phone Number</label>
                        <input type="tel" class="form-control" id="ph3" placeholder="Phone Number" name="ph3" v-on:change="page_one.ph3 = $event.target.value">              
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="gp_email">Email</label>
                        <input type="email" class="form-control" id="gp_email" placeholder="Email" name="gp_email" v-on:change="page_one.gp_email = $event.target.value">              
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <!--<div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="booking_s_time">Time which starts booking</label>
                        <input type="tel" class="form-control" id="booking_s_time" placeholder="Time which starts booking" name="booking_s_time" v-on:change="page_one.booking_s_time = $event.target.value">              
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="booking_e_time">Time which ends booking</label>
                        <input type="text" class="form-control" id="booking_e_time" placeholder="Time which ends booking" name="booking_e_time" v-on:change="page_one.booking_e_time = $event.target.value">              
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                        
                   
                  </div>

                  <!--<div class="page" v-show="step === 7">
                    
                    <h4 class="mb-3"><b>Next of kin</b></h4><br>

                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="allowed_status_nok">Allowed Status</label>
                        <br><input type="radio"  id="allowed_status_nok"  value="Yes" name="allowed_status_nok" required v-on:change="page_one.allowed_status_nok = $event.target.value">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="allowed_status_nok" value="No" name="allowed_status_nok" required v-on:change="page_one.allowed_status_nok = $event.target.value">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="gender3">Gender</label>
                      <br><input type="radio"  id="gender3"  value="Female" name="gender3" required v-on:change="page_one.gender3 = $event.target.value">&nbsp;&nbsp;&nbsp;Female&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="gender3" value="Male" name="gender3" required v-on:change="page_one.gender3 = $event.target.value">&nbsp;&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="gender3" value="Other" name="gender3" required v-on:change="page_one.gender3 = $event.target.value">&nbsp;&nbsp;&nbsp;Other &nbsp;&nbsp;&nbsp; 
                      </div>                
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="nok_name">Name</label>
                        <input type="text" class="form-control" id="nok_name" placeholder="Name" name="nok_name" v-on:change="page_one.nok_name = $event.target.value">              
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="nok_address">Address</label>
                        <input type="text" class="form-control" id="nok_address" placeholder="Address" name="nok_address3" v-on:change="page_one.nok_address = $event.target.value">              
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="relation2">Relation</label>
                        <input type="text" class="form-control" id="relation2" placeholder="Relation" name="relation2" v-on:change="page_one.relation2 = $event.target.value">              
                      </div> 
                      <div class="col-md-6 mb-3">
                        <label for="nok_ph">Phone Number</label>
                        <input type="tel" class="form-control" id="nok_ph" placeholder="Phone Number" name="nok_ph" v-on:change="page_one.nok_ph = $event.target.value">  
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="id_no1">ID Number</label>
                        <input type="text" class="form-control" id="id_no1" placeholder="ID Number" name="id_no1" v-on:change="page_one.id_no1 = $event.target.value">                
                      </div> 
                      <div class="col-md-6 mb-3">
                        <label for="nok_nationality">Nationality</label>
                        <input type="tel" class="form-control" id="nok_nationality" placeholder="Nationality" name="nok_nationality" v-on:change="page_one.nok_nationality = $event.target.value">      
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;

                    
                  </div>-->

                  <!--<div class="page review_page" v-show="step === 8">
                  <center><h4 class="text-center" style="color: #980000; left: 300px;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quotation Review</b></h4></center><br>
                  <div class="row">               
                    <div class="col-md-12" >                    
                      <div class="card">
                        <div class="card-header">
                          Personal Information
                        </div>
                        <div class="card-body">
                          <p class="card-text"><strong>First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.fname }}</p>
                          <p class="card-text"><strong>Middle Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.mname }}</p>
                          <p class="card-text"><strong>Last Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.lname }}</p>
                          <p class="card-text"><strong>Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.address }}</p>
                          <p class="card-text"><strong>Date of birth&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.dob }}</p>
                          <p class="card-text"><strong>Country of birth&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.cob }}</p>
                          <p class="card-text"><strong>Age&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.age }}</p>
                          <p class="card-text"><strong>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.gender }}</p>
                          
                          <p class="card-text"><strong>Religion&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.religion }}</p>
                          <p class="card-text"><strong>Languages Known&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.l_known }}</p>
                          <p class="card-text"><strong>Phone number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.ph }}</p>
                          <p class="card-text"><strong>Medicare card number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.medicard_no }}</p>
                          <p class="card-text"><strong>Medicare card order number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.medicard_orderno }}</p>
                          <p class="card-text"><strong>Pension card number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.pension_no }}</p>
                          <p class="card-text"><strong>Insurance card number if any&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.insurance_no }}</p>
                          <p class="card-text"><strong>Insurance company name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.insu_compny }}</p>
                          <p class="card-text"><strong>Likes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.likes }}</p>
                          <p class="card-text"><strong>Dislikes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.dislikes }}</p>
                          <p class="card-text"><strong>Hobbies&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.hobies }}</p>

                          <button type="button" class="btn btn-md btn-warning text-white float-right" v-on:click="direct(1)">Edit</button>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                          Family details
                        </div>
                        <div class="card-body">
                          <p class="card-text"><strong>First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.f1name }}</p>
                          <p class="card-text"><strong>Middle Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.m1name }}</p>
                          <p class="card-text"><strong>Last Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.l1name }}</p>
                          <p class="card-text"><strong>Relation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.relation }}</p>
                          <p class="card-text"><strong>Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.address1 }}</p>
                          <p class="card-text"><strong>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.gender1 }}</p>
                          
                          <p class="card-text"><strong>Phone number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.ph1 }}</p>
                          <p class="card-text"><strong>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.email }}</p>
                          <p class="card-text"><strong>Country&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.country }}</p>
                          <p class="card-text"><strong>Religion&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.religion1 }}</p>

                          <button type="button" class="btn btn-md btn-warning text-white float-right" v-on:click="direct(2)">Edit</button>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                          Power of attorney Details
                        </div>
                        <div class="card-body">
                          <p class="card-text"><strong>Person who make power of attorney&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.po_maker }}</p>
                          <p class="card-text"><strong>Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.po_maker_address }}</p>
                          <p class="card-text"><strong>Person who the power granted&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.po_granter }}</p>
                          <p class="card-text"><strong>Address of the power granted person&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.po_granter_address }}</p>
                          <p class="card-text"><strong>Reason for granting&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.grant_reason }}</p>
                          <p class="card-text"><strong>Granted date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.g_date }}</p>
                          <p class="card-text"><strong>Place&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.place }}</p>
                          <p class="card-text"><strong>Date of termination&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.termination_date }}</p>

                          <button type="button" class="btn btn-md btn-warning text-white float-right" v-on:click="direct(3)">Edit</button>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                          Allergy Details
                        </div>
                        <div class="card-body">
                          <p class="card-text"><strong>Type of alergy caused&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.tof_allergy }}</p>
                          <p class="card-text"><strong>Name of the Doctor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.doc_name }}</p>

                          <p class="card-text"><strong>Name of the Hospital&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.hos_name }}</p>
                          <p class="card-text"><strong>Duration period to visit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.duration }}</p>
                          <p class="card-text"><strong>Name of the Medicines&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.madicine }}</p>
                          <p class="card-text"><strong>Test Reports&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.tests_report }}</p>

                          <button type="button" class="btn btn-md btn-warning text-white float-right" v-on:click="direct(4)">Edit</button>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                          Visitors Allowed
                        </div>
                        <div class="card-body">
                          <p class="card-text"><strong>Allowed Status
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.allowed_status }}</p>
                          <p class="card-text"><strong>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.name }}</p>
                          <p class="card-text"><strong>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.gender2 }}</p>
                          
                          <p class="card-text"><strong>Relation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.relation1 }}</p>
                          <p class="card-text"><strong>Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.address2 }}</p>
                          <p class="card-text"><strong>Phone number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.ph2 }}</p>
                          <p class="card-text"><strong>ID Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.id_no }}</p>
                          <p class="card-text"><strong>Nationality&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.nationality }}</p>

                          <button type="button" class="btn btn-md btn-warning text-white float-right" v-on:click="direct(5)">Edit</button>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                          GP Details
                        </div>
                        <div class="card-body">
                          <p class="card-text"><strong>General practitioner Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.gp_name }}</p>
                          <p class="card-text"><strong>Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.gp_address }}</p>
                          <p class="card-text"><strong>Phone Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.ph3 }}</p>
                          <p class="card-text"><strong>Name of the Clinic&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.clinic_name }}</p>
                          <p class="card-text"><strong>Time which starts booking&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.booking_s_time }}</p>
                          <p class="card-text"><strong>Time which ends booking&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.booking_e_time }}</p>

                          <button type="button" class="btn btn-md btn-warning text-white float-right" v-on:click="direct(6)">Edit</button>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                          Next of kin
                        </div>
                        <div class="card-body">
                          <p class="card-text"><strong>Allowed Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.allowed_status_nok }}</p>
                          <p class="card-text"><strong>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.nok_name }}</p>
                          <p class="card-text"><strong>Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.nok_address }}</p>
                          <p class="card-text"><strong>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.gender3 }}</p>
                          
                          <p class="card-text"><strong>Relation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.relation2 }}</p>
                          <p class="card-text"><strong>Phone number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.nok_ph }}</p>
                          <p class="card-text"><strong>ID Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.id_no1 }}</p>
                          <p class="card-text"><strong>Nationality&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.nok_nationality }}</p>

                          <button type="button" class="btn btn-md btn-warning text-white float-right" v-on:click="direct(7)">Edit</button>
                        </div>
                      </div>
                    </div>
         
                    </div>
                    <div class="btn_container">
                      <button @click.prevent="prev()" class="btn btn-md text-white previous"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Previous</button>
                     <button type="submit"  style="right: 30px;" class="btn btn-primary next">Submit&nbsp;&nbsp;&nbsp;<i class="fa fa-save" aria-hidden="true"></i></button>
                      
                    </div> 
                  </div>-->
     
                </div>
             
                <div class="box-footer text-right">
                  <a class="btn btn-link text-left" href="{{ route('clients.index') }}">Cancel</a>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-check icon-white" aria-hidden="true"></i> Save</button>
                </div>

              </div>

          </form>
            </div>
        </div>
      
</div>


  </div>
</div>

@stop

@section('moar_scripts')

<script type="text/javascript">
  const app = new Vue({
  el:'#app',
  data() {
    return {
      token: '{{ csrf_token() }}',
      step:1,
      page_one: {
        fname: null,
        mname: null,
        lname: null,
        address: null,
        dob: null,
        cob: null,
        age: null,
        gender: null,
        religion: null,
        l_known: null,
        ph: null,
        medicard_no: null,
        expiry_date: null,
        pension_no: null,
        insurance_no: null,
        insu_compny: null,
        likes: null,
        dislikes: null,
        hobies: null,
       },
      page_two: {
        po_maker: null,
        po_maker_address: null,
        po_granter: null,
        po_granter_address: null,
        grant_reason: null,
        g_date: null,
        place: null,
        termination_date: null,
      },
      page_three: {
        f1name: null,
        m1name: null,
        l1name: null,
        relation: null,
        address1: null,
        gender1: null,
        ph1: null,
        email: null,
        country: null,
        religion1: null,
      },
      page_four: {
        tof_allergy: null,
        hos_name: null,
        doc_name: null,
        duration: null,
        madicine: null,
        tests_report: null,
      },
      page_five: {
        allowed_status: null,
        name: null,
        gender2: null,
        relation1: null,
        address2: null,
        ph2: null,
        id_no: null,
        nationality: null,
      },
      page_six: {
        gp_name: null,
        gp_address: null,
        ph3: null,
        clinic_name: null,
        booking_s_time: null,
        booking_e_time: null,
      },
      page_seven: {
        allowed_status_nok: null,
        nok_name: null,
        nok_address: null,
        gender3: null,
        relation2: null,
        nok_ph: null,
        id_no1: null,
        nok_nationality: null,
      }
      }
    },
  methods:{
    prev() {
      this.step--;
    },
    next() {
      this.step++;
    },
    direct(s) {
      this.step = s;
    },
    submit() {
              
                let currentObj = this;
                axios.post('/formSubmit', {
                    name: this.page_one.fname,
                    description: this.page_one.lname
                })
                .then(function (response) {
                    currentObj.output = response.data;
                })
                .catch(function (error) {
                    currentObj.output = error;
                });
                    
    }
  }
});
</script>

<script type="text/javascript">

  function transfer_data(){
    var fname = $("#fname").val();

      $.ajax({
        url: '/formSubmit',
        method: "POST",
        datatype:"json",
        headers: {
              'X-CSRF-Token': '{{ csrf_field() }}'
            },
        data: { "fname": fname,
                "mname": mname,
                "lname": lname,
                "address": address,
                "dob": dob,
                "cob": cob,
                "age": age,
                "gender": gender,
                "religion": religion,
                "l_known": l_known,
                "ph": ph,
                "medicard_no": medicard_no,
                "expiry_date": expiry_date,
                "pension_no": pension_no,
                "insurance_no": insurance_no,
                "insu_compny": insu_compny,
                "likes": likes,
                "dislikes": dislikes,
                "hobies": hobies,
                "po_maker": po_maker,
                "po_maker_address": po_maker_address,
                "po_granter": po_granter,
                "po_granter_address": po_granter_address,
                "grant_reason": grant_reason,
                "g_date": g_date,
                "place": place,
                "termination_date": termination_date,
                "f1name": f1name,
                "m1name": m1name,
                "l1name": l1name,
                "relation": relation,
                "address1": address1,
                "gender1": gender1,
                "ph1": ph1,
                "email": email,
                "country": country,
                "religion1": religion1,
                "tof_allergy": tof_allergy,
                "hos_name": hos_name,
                "doc_name": doc_name,
                "duration": duration,
                "madicine": madicine,
                "tests_report": tests_report,
                "allowed_status": allowed_status,
                "name": name,
                "gender2": gender2,
                "relation1": relation1,
                "address2": address2,
                "ph2": ph2,
                "id_no": id_no,
                "nationality": nationality,
                "gp_name": gp_name,
                "gp_address": gp_address,
                "ph3": ph3,
                "clinic_name": clinic_name,
                "booking_s_time": booking_s_time,
                "booking_e_time": booking_e_time,
                "allowed_status_nok": allowed_status_nok,
                "nok_name": nok_name,
                "nok_address": nok_address,
                "gender3": gender3,
                "relation2": relation2,
                "nok_ph": nok_ph,
                "id_no1": id_no1,
                "nok_nationality": nok_nationality,
              }
      });

      
  };
</script>
<script type="text/javascript">
  function compareDate() {  
    var dateEntered = new Date(document.getElementById('expiry_date').value);    
    var currentDate = new Date();

    if (dateEntered > currentDate) {
    }
    else {
        alert("Date Entered is greater than Current Date, Please Enter a Correct date !");
        document.getElementById('expiry_date').value = "";
    }
  }
</script>
@include ('partials.bootstrap-table', ['search' => true, 'showFooter' => true, 'columns' => \App\Presenters\BookingPresenter::dataTableLayout()])
@stop