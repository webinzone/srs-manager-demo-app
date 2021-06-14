@extends('layouts/default')

{{-- Page title --}}
@section('title')
Add Clients
@parent
@stop

{{-- Page content --}}
@section('content')

<div id="webui">  
	<div class="row" style="padding-left: 80px;padding-right: 80px;">
	    

	    	<div id="app">
   
        
        <div class="col-md-10 offset-1">
          <form class="form-horizontal" method="POST" autocomplete="off" role="form" style="width: 1000px; align-items: center;   background-color: #fff; ">
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
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
                  </div>
                  <h4 class="mb-3"><b>Personal Information</b></h4><br>              

                  <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="fname">First name</label>
                      <input type="text" class="form-control" placeholder="First Name" id="fname" name="fname" required v-on:change="page_one.fname = $event.target.value">                
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
                    <div class="col-md-6 mb-3">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" id="address" placeholder="Address" name="address" required v-on:change="page_one.address = $event.target.value">          
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="dob">Date of birth</label>
                      <input type="date" class="form-control" id="dob" placeholder="Date of birth" name="dob" v-on:change="page_one.dob = $event.target.value">              
                    </div>  
                  </div>&nbsp;&nbsp;&nbsp;
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="cob">Country of birth</label>
                      <input type="text" class="form-control" id="cob" placeholder="Country of birth" name="cob" required v-on:change="page_one.cob = $event.target.value">          
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="age">Age</label>
                      <input type="number" class="form-control" id="age" placeholder="Date of birth" name="age" v-on:change="page_one.age = $event.target.value">              
                    </div>  
                  </div>&nbsp;&nbsp;&nbsp;
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="gender">Gender</label>&nbsp;&nbsp;&nbsp;
                      <br><input type="radio"  id="gender"  value="Female" name="gender" required v-on:change="page_one.gender = $event.target.value">&nbsp;&nbsp;&nbsp;Female&nbsp;&nbsp;&nbsp;
                      <input type="radio"  id="gender" value="Male" name="gender" required v-on:change="page_one.gender = $event.target.value">&nbsp;&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;
                      <input type="radio"  id="gender" value="Other" name="gender" required v-on:change="page_one.gender = $event.target.value">&nbsp;&nbsp;&nbsp;Other &nbsp;&nbsp;&nbsp;         
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="religion">Religion</label>
                      <input type="text" class="form-control" id="religion" placeholder="Religion" name="religion" v-on:change="page_one.religion = $event.target.value">              
                    </div>  
                  </div>&nbsp;&nbsp;&nbsp;
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="l_known">Languages Known</label>
                      <input type="text" class="form-control" id="l_known" placeholder="Languages Known" name="l_known" required v-on:change="page_one.l_known = $event.target.value">          
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="ph">Phone number</label>
                      <input type="tel" class="form-control" id="ph" placeholder="Phone number" name="ph" v-on:change="page_one.ph = $event.target.value">              
                    </div>  
                  </div>&nbsp;&nbsp;&nbsp;
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="medicard_no">Medicare card number</label>
                      <input type="text" class="form-control" id="medicard_no" placeholder="Languages Known" name="medicard_no" required v-on:change="page_one.medicard_no = $event.target.value">          
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="medicard_orderno">Medicare card order number</label>
                      <input type="text" class="form-control" id="medicard_orderno" placeholder="Medicare card order number" name="medicard_orderno" v-on:change="page_one.medicard_orderno = $event.target.value">            
                    </div>  
                  </div>&nbsp;&nbsp;&nbsp;
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="pension_no">Pension card number</label>
                      <input type="text" class="form-control" id="pension_no" placeholder="Pension card number" name="pension_no" required v-on:change="page_one.pension_no = $event.target.value">          
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="insurance_no">Insurance card number if any</label>
                      <input type="text" class="form-control" id="insurance_no" placeholder="Insurance card number if any" name="insurance_no" v-on:change="page_one.insurance_no = $event.target.value">            
                    </div>  
                  </div>&nbsp;&nbsp;&nbsp;
                   <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="insu_compny">Insurance company name</label>
                      <input type="text" class="form-control" id="insu_compny" placeholder="Insurance company name" name="insu_compny" required v-on:change="page_one.insu_compny = $event.target.value">          
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="likes">Likes</label>
                      <input type="text" class="form-control" id="likes" placeholder="Likes" name="likes" v-on:change="page_one.likes = $event.target.value">            
                    </div>  
                  </div>&nbsp;&nbsp;&nbsp;
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="dislikes">Dislikes</label>
                      <textarea class="form-control" id="dislikes" placeholder="Dislikes" name="dislikes" required v-on:change="page_one.dislikes = $event.target.value"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="hobies"> Hobbies</label>
                      <textarea class="form-control" id="hobies" placeholder=" Hobbies" name="hobies" v-on:change="page_one.hobies = $event.target.value"></textarea>
                    </div>  
                  </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                    <div class="col-md-12 mb-3">
                     &nbsp;&nbsp;&nbsp;<br><br><br><button @click.prevent="next()"  class="btn btn-primary next">Next&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                    </div>
                  </div>


                  <div class="btn_container ">
                             
                  </div>                                                   
                </div>            
                                             
                <div class="page" v-show="step === 2">              
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
                  </div>
                  <h4 class="mb-3"><b>Family details</b></h4><br>

                 <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="fname">First name</label>
                      <input type="text" class="form-control" placeholder="First Name" name="fname" required v-on:change="page_one.fname = $event.target.value">                
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="mname">Middle name</label>
                      <input type="text" class="form-control" placeholder="Middle Name" name="mname" required v-on:change="page_one.mname = $event.target.value">                
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="lname">Last name</label>
                      <input type="text" class="form-control" placeholder="Last Name" name="lname" required v-on:change="page_one.lname = $event.target.value">                
                    </div>
                  </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="relation">Relation</label>
                      <input type="text" class="form-control" id="relation" placeholder="Relation" name="relation" required v-on:change="page_one.relation = $event.target.value">      
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" id="address" placeholder="Address" name="address" v-on:change="page_one.address = $event.target.value">              
                    </div>  
                  </div>&nbsp;&nbsp;&nbsp;
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="gender">Gender</label>&nbsp;&nbsp;&nbsp;
                      <br><input type="radio"  id="gender"  value="Female" name="gender" required v-on:change="page_one.gender = $event.target.value">&nbsp;&nbsp;&nbsp;Female&nbsp;&nbsp;&nbsp;
                      <input type="radio"  id="gender" value="Male" name="gender" required v-on:change="page_one.gender = $event.target.value">&nbsp;&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;
                      <input type="radio"  id="gender" value="Other" name="gender" required v-on:change="page_one.gender = $event.target.value">&nbsp;&nbsp;&nbsp;Other &nbsp;&nbsp;&nbsp;           
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="ph">Phone number</label>
                      <input type="tel" class="form-control" id="ph" placeholder="Phone number" name="ph" v-on:change="page_one.ph = $event.target.value">              
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
                      <label for="religion">Religion</label>
                      <input type="text" class="form-control" id="religion" placeholder="Religion" name="religion" required v-on:change="page_one.religion = $event.target.value">      
                    </div>
                  </div>&nbsp;&nbsp;&nbsp;              
           
                  <div class="btn_container">
                    <button @click.prevent="prev()" class="btn btn-md text-white previous"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Previous</button>
                    <button @click.prevent="next()" style="right: 30px;" class="btn btn-primary next">Next&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                  </div>
                </div>            
            
               <div class="page" v-show="step === 3">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                  </div>
                  <h4 class="mb-3"><b>Power of attorney Details</b></h4><br>
             
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
                  </div>&nbsp;&nbsp;&nbsp;
                  <div class="btn_container">
                    <button @click.prevent="prev()" class="btn btn-md text-white previous"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Previous</button>
                    <button @click.prevent="next()" style="right: 30px;" class="btn btn-primary next">Next&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                  </div>
                </div>
                <div class="page" v-show="step === 4">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
                  </div>
                  <h4 class="mb-3"><b>Allergy Details</b></h4><br>                        
                 
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="tof_allergy">Type of alergy caused</label>
                      <input type="text" class="form-control" id="tof_allergy" placeholder="Type of alergy caused" name="tof_allergy" required v-on:change="page_one.tof_allergy = $event.target.value">          
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="hos_name">Name of the Hospital</label>
                      <input type="text" class="form-control" id="hos_name" placeholder="Name of the Hospital" name="hos_name" v-on:change="page_one.hos_name = $event.target.value">              
                    </div>  
                  </div>&nbsp;&nbsp;&nbsp;
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="duration">Duration period to visit</label>
                      <input type="text" class="form-control" id="duration" placeholder="Duration period to visit" name="duration" required v-on:change="page_one.duration = $event.target.value">          
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="madicine">Name of the Medicines</label>
                      <input type="text" class="form-control" id="madicine" placeholder="Name of the Medicines" name="madicine" v-on:change="page_one.madicine = $event.target.value">              
                    </div>  
                  </div>&nbsp;&nbsp;&nbsp;
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="tests_report">Test Reports</label>
                      <input type="file"  id="tests_report" placeholder="Choose File" name="tests_report" required v-on:change="page_one.tests_report = $event.target.value">          
                    </div>&nbsp;&nbsp;&nbsp;                        
                      
                  <div class="btn_container">
                    <button @click.prevent="prev()" class="btn btn-md text-white previous"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Previous</button>
                    <button @click.prevent="next()" style="right: 30px;" class="btn btn-primary next">Next&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                  </div> 
                </div>
   
                </div>   
                <div class="page" v-show="step === 5">
                  <div class="progress">
                     <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                  </div>
                  <h4 class="mb-3"><b>Visitors Allowed</b></h4><br>
                 
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="allowed_status">Allowed Status</label>
                      <br><input type="radio"  id="allowed_status"  value="Yes" name="allowed_status" required v-on:change="page_one.allowed_status = $event.target.value">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                      <input type="radio"  id="allowed_status" value="No" name="allowed_status" required v-on:change="page_one.allowed_status = $event.target.value">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                      
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="gender">Gender</label>
                      <br><input type="radio"  id="gender"  value="Female" name="gender" required v-on:change="page_one.gender = $event.target.value">&nbsp;&nbsp;&nbsp;Female&nbsp;&nbsp;&nbsp;
                      <input type="radio"  id="gender" value="Male" name="gender" required v-on:change="page_one.gender = $event.target.value">&nbsp;&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;
                      <input type="radio"  id="gender" value="Other" name="gender" required v-on:change="page_one.gender = $event.target.value">&nbsp;&nbsp;&nbsp;Other &nbsp;&nbsp;&nbsp;                   
                    </div>
                     
                  </div>&nbsp;&nbsp;&nbsp;
                 <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Name" name="name" v-on:change="page_one.name = $event.target.value">              
                    </div> 
                    <div class="col-md-6 mb-3">
                      <label for="relation">Relation</label>
                      <input type="text" class="form-control" id="relation" placeholder="Relation" name="relation" v-on:change="page_one.relation = $event.target.value">              
                    </div>  
                  </div>&nbsp;&nbsp;&nbsp;
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" id="address" placeholder="Address" name="address" v-on:change="page_one.address = $event.target.value">  
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="ph">Phone Number</label>
                      <input type="tel" class="form-control" id="ph" placeholder="Phone Number" name="ph" v-on:change="page_one.ph = $event.target.value">              
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
                  
                  <div class="btn_container">
                    <button @click.prevent="prev()" class="btn btn-md text-white previous"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Previous</button>
                    <button @click.prevent="next()" style="right: 30px;" class="btn btn-primary next">Next&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                  </div>  
                </div>            

           
                <div class="page" v-show="step === 6">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
                  </div>
                  <h4 class="mb-3"><b>GP Details</b></h4><br>

                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="gp_name">General practitioner Name</label>
                      <input type="text" class="form-control" id="gp_name" placeholder="General practitioner Name" name="gp_name" required v-on:change="page_one.gp_name = $event.target.value">          
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" id="address" placeholder="Address" name="address" v-on:change="page_one.address = $event.target.value">              
                    </div>  
                  </div>&nbsp;&nbsp;&nbsp;
                   <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="ph">Phone Number</label>
                      <input type="tel" class="form-control" id="ph" placeholder="Phone Number" name="ph" v-on:change="page_one.ph = $event.target.value">              
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="clinic_name">Name of the Clinic</label>
                      <input type="text" class="form-control" id="clinic_name" placeholder="Name of the Clinic" name="clinic_name" v-on:change="page_one.clinic_name = $event.target.value">              
                    </div>  
                  </div>&nbsp;&nbsp;&nbsp;
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="booking_s_time">Time which starts booking</label>
                      <input type="tel" class="form-control" id="booking_s_time" placeholder="Time which starts booking" name="booking_s_time" v-on:change="page_one.booking_s_time = $event.target.value">              
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="booking_e_time">Time which ends booking</label>
                      <input type="text" class="form-control" id="booking_e_time" placeholder="Time which ends booking" name="booking_e_time" v-on:change="page_one.booking_e_time = $event.target.value">              
                    </div>  
                  </div>&nbsp;&nbsp;&nbsp;
                      
                  <div class="btn_container">
                    <button @click.prevent="prev()" class="btn btn-md text-white previous"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Previous</button>
                    <button @click.prevent="next()" style="right: 30px;" class="btn btn-primary next">Next&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                  </div> 
                </div>

                <div class="page" v-show="step === 7">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                  </div>
                  <h4 class="mb-3"><b>Next of kin</b></h4><br>

                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="allowed_status">Allowed Status</label>
                      <br><input type="radio"  id="allowed_status"  value="Yes" name="allowed_status" required v-on:change="page_one.allowed_status = $event.target.value">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                      <input type="radio"  id="allowed_status" value="No" name="allowed_status" required v-on:change="page_one.allowed_status = $event.target.value">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                    </div>
                    <br><input type="radio"  id="gender"  value="Female" name="gender" required v-on:change="page_one.gender = $event.target.value">&nbsp;&nbsp;&nbsp;Female&nbsp;&nbsp;&nbsp;
                      <input type="radio"  id="gender" value="Male" name="gender" required v-on:change="page_one.gender = $event.target.value">&nbsp;&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;
                      <input type="radio"  id="gender" value="Other" name="gender" required v-on:change="page_one.gender = $event.target.value">&nbsp;&nbsp;&nbsp;Other &nbsp;&nbsp;&nbsp;                   
                         
                  </div>&nbsp;&nbsp;&nbsp;
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Name" name="name" v-on:change="page_one.name = $event.target.value">              
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="relation">Relation</label>
                      <input type="text" class="form-control" id="relation" placeholder="Relation" name="relation" v-on:change="page_one.relation = $event.target.value">              
                    </div>  
                  </div>&nbsp;&nbsp;&nbsp;
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="ph">Phone Number</label>
                      <input type="tel" class="form-control" id="ph" placeholder="Phone Number" name="ph" v-on:change="page_one.ph = $event.target.value">  
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="id_no">ID Number</label>
                      <input type="text" class="form-control" id="id_no" placeholder="ID Number" name="id_no" v-on:change="page_one.id_no = $event.target.value">                
                    </div>  
                  </div>&nbsp;&nbsp;&nbsp;
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="nationality">Nationality</label>
                      <input type="tel" class="form-control" id="nationality" placeholder="nationality" name="nationality" v-on:change="page_one.nationality = $event.target.value">      
                    </div>
                  </div>&nbsp;&nbsp;&nbsp;

                      
                  <div class="btn_container">
                    <button @click.prevent="prev()" class="btn btn-md text-white previous"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Previous</button>
                    <button @click.prevent="next()" style="right: 30px;" class="btn btn-primary next">Review&nbsp;&nbsp;&nbsp;<i class="fa fa-file" aria-hidden="true"></i></button>
                  </div> 
                </div>

                <div class="page review_page" v-show="step === 8">
                <center><h4 class="text-center" style="color: #980000; left: 300px;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quotation Review</b></h4></center><br>
                <div class="row">               
                  <div class="col-md-12" >                    
                    <div class="card">
                      <div class="card-header">
                        Personal Information
                      </div>
                      <div class="card-body">
                        <p class="card-text"><strong>First Name:</strong>@{{ page_one.fname }}</p>
                        <p class="card-text"><strong>Middle Name:</strong>@{{ page_one.mname }}</p>
                        <p class="card-text"><strong>Last Name:</strong>@{{ page_one.lname }}</p>
                        <p class="card-text"><strong>Address:</strong>@{{ page_one.address }}</p>
                        <p class="card-text"><strong>Date of birth:</strong>@{{ page_one.dob }}</p>
                        <p class="card-text"><strong>Country of birth:</strong>@{{ page_one.cob }}</p>
                        <p class="card-text"><strong>Age:</strong>@{{ page_one.age }}</p>
                        <p class="card-text"><strong>Female:</strong>@{{ page_one.gender }}</p>
                        <p class="card-text"><strong>Male:</strong>@{{ page_one.gender }}</p>
                        <p class="card-text"><strong>Other:</strong>@{{ page_one.gender }}</p>
                        <p class="card-text"><strong>Religion:</strong>@{{ page_one.religion }}</p>
                        <p class="card-text"><strong>Languages Known:</strong>@{{ page_one.l_known }}</p>
                        <p class="card-text"><strong>Phone number:</strong>@{{ page_one.ph }}</p>
                        <p class="card-text"><strong>Medicare card number:</strong>@{{ page_one.medicard_no }}</p>
                        <p class="card-text"><strong>Medicare card order number:</strong>@{{ page_one.medicard_orderno }}</p>
                        <p class="card-text"><strong>Pension card number:</strong>@{{ page_one.pension_no }}</p>
                        <p class="card-text"><strong>Insurance card number if any:</strong>@{{ page_one.insurance_no }}</p>
                        <p class="card-text"><strong>Insurance company name:</strong>@{{ page_one.insu_compny }}</p>
                        <p class="card-text"><strong>Likes:</strong>@{{ page_one.likes }}</p>
                        <p class="card-text"><strong>Dislikes:</strong>@{{ page_one.dislikes }}</p>
                        <p class="card-text"><strong>Hobbies:</strong>@{{ page_one.hobies }}</p>

                        <button type="button" class="btn btn-md btn-warning text-white float-right" v-on:click="direct(1)">Edit</button>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header">
                        Family details
                      </div>
                      <div class="card-body">
                        <p class="card-text"><strong>First Name:</strong>@{{ page_one.fname }}</p>
                        <p class="card-text"><strong>Middle Name:</strong>@{{ page_one.mname }}</p>
                        <p class="card-text"><strong>Last Name:</strong>@{{ page_one.lname }}</p>
                        <p class="card-text"><strong>Relation:</strong>@{{ page_one.relation }}</p>
                        <p class="card-text"><strong>Address:</strong>@{{ page_one.address }}</p>
                        <p class="card-text"><strong>Female:</strong>@{{ page_one.gender }}</p>
                        <p class="card-text"><strong>Male:</strong>@{{ page_one.gender }}</p>
                        <p class="card-text"><strong>Other:</strong>@{{ page_one.gender }}</p>
                        <p class="card-text"><strong>Phone number:</strong>@{{ page_one.ph }}</p>
                        <p class="card-text"><strong>Email:</strong>@{{ page_one.email }}</p>
                        <p class="card-text"><strong>Country:</strong>@{{ page_one.country }}</p>
                        <p class="card-text"><strong>Religion:</strong>@{{ page_one.religion }}</p>

                        <button type="button" class="btn btn-md btn-warning text-white float-right" v-on:click="direct(2)">Edit</button>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header">
                        Power of attorney Details
                      </div>
                      <div class="card-body">
                        <p class="card-text"><strong>Person who make power of attorney:</strong>@{{ page_one.po_maker }}</p>
                        <p class="card-text"><strong>Address:</strong>@{{ page_one.po_maker_address }}</p>
                        <p class="card-text"><strong>Person who the power granted:</strong>@{{ page_one.po_granter }}</p>
                        <p class="card-text"><strong>Address of the power granted person:</strong>@{{ page_one.po_granter_address }}</p>
                        <p class="card-text"><strong>Reason for granting:</strong>@{{ page_one.grant_reason }}</p>
                        <p class="card-text"><strong>Granted date:</strong>@{{ page_one.g_date }}</p>
                        <p class="card-text"><strong>Place:</strong>@{{ page_one.place }}</p>
                        <p class="card-text"><strong>Date of termination:</strong>@{{ page_one.termination_date }}</p>

                        <button type="button" class="btn btn-md btn-warning text-white float-right" v-on:click="direct(3)">Edit</button>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header">
                        Allergy Details
                      </div>
                      <div class="card-body">
                        <p class="card-text"><strong>Type of alergy caused:</strong>@{{ page_one.tof_allergy }}</p>
                        <p class="card-text"><strong>Name of the Hospital:</strong>@{{ page_one.hos_name }}</p>
                        <p class="card-text"><strong>Duration period to visit:</strong>@{{ page_one.duration }}</p>
                        <p class="card-text"><strong>Name of the Medicines:</strong>@{{ page_one.madicine }}</p>
                        <p class="card-text"><strong>Test Reports:</strong>@{{ page_one.tests_report }}</p>

                        <button type="button" class="btn btn-md btn-warning text-white float-right" v-on:click="direct(4)">Edit</button>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header">
                        Visitors Allowed
                      </div>
                      <div class="card-body">
                        <p class="card-text"><strong>Allowed Status
                        :</strong>@{{ page_one.allowed_status }}</p>
                        <p class="card-text"><strong>Name:</strong>@{{ page_one.name }}</p>
                        <p class="card-text"><strong>Female:</strong>@{{ page_one.gender }}</p>
                        <p class="card-text"><strong>Male:</strong>@{{ page_one.gender }}</p>
                        <p class="card-text"><strong>Other:</strong>@{{ page_one.gender }}</p>
                        <p class="card-text"><strong>Relation:</strong>@{{ page_one.relation }}</p>
                        <p class="card-text"><strong>Address:</strong>@{{ page_one.address }}</p>
                        <p class="card-text"><strong>Phone number:</strong>@{{ page_one.ph }}</p>
                        <p class="card-text"><strong>ID Number:</strong>@{{ page_one.id_no }}</p>
                        <p class="card-text"><strong>Nationality:</strong>@{{ page_one.nationality }}</p>

                        <button type="button" class="btn btn-md btn-warning text-white float-right" v-on:click="direct(5)">Edit</button>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header">
                        GP Details
                      </div>
                      <div class="card-body">
                        <p class="card-text"><strong>General practitioner Name:</strong>@{{ page_one.gp_name }}</p>
                        <p class="card-text"><strong>Address:</strong>@{{ page_one.address }}</p>
                        <p class="card-text"><strong>Phone Number:</strong>@{{ page_one.ph }}</p>
                        <p class="card-text"><strong>Name of the Clinic:</strong>@{{ page_one.clinic_name }}</p>
                        <p class="card-text"><strong>Time which starts booking:</strong>@{{ page_one.booking_s_time }}</p>
                        <p class="card-text"><strong>Time which ends booking:</strong>@{{ page_one.booking_e_time }}</p>

                        <button type="button" class="btn btn-md btn-warning text-white float-right" v-on:click="direct(6)">Edit</button>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header">
                        Next of kin
                      </div>
                      <div class="card-body">
                        <p class="card-text"><strong>Allowed Status:</strong>@{{ page_one.allowed_status }}</p>
                        <p class="card-text"><strong>Name:</strong>@{{ page_one.name }}</p>
                        <p class="card-text"><strong>Female:</strong>@{{ page_one.gender }}</p>
                        <p class="card-text"><strong>Male:</strong>@{{ page_one.gender }}</p>
                        <p class="card-text"><strong>Other:</strong>@{{ page_one.gender }}</p>
                        <p class="card-text"><strong>Relation:</strong>@{{ page_one.relation }}</p>
                        <p class="card-text"><strong>Phone number:</strong>@{{ page_one.ph }}</p>
                        <p class="card-text"><strong>ID Number:</strong>@{{ page_one.id_no }}</p>
                        <p class="card-text"><strong>Nationality:</strong>@{{ page_one.nationality }}</p>

                        <button type="button" class="btn btn-md btn-warning text-white float-right" v-on:click="direct(7)">Edit</button>
                      </div>
                    </div>
                  </div>
       
                  </div>
                  <div class="btn_container">
                    <button @click.prevent="prev()" class="btn btn-md text-white previous"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Previous</button>
                    <button onClick="transfer_data()" style="right: 30px;" class="btn btn-primary next">Submit&nbsp;&nbsp;&nbsp;<i class="fa fa-save" aria-hidden="true"></i></button>
                  </div> 
                </div>
   
              </div>

            
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
        medicard_orderno: null,
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
        fname: null,
        mname: null,
        lname: null,
        relation: null,
        address: null,
        gender: null,
        ph: null,
        email: null,
        country: null,
        religion: null,
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
        gender: null,
        relation: null,
        address: null,
        ph: null,
        id_no: null,
        nationality: null,
      },
      page_six: {
        gp_name: null,
        address: null,
        ph: null,
        clinic_name: null,
        booking_s_time: null,
        booking_e_time: null,
      },
      page_seven: {
        allowed_status: null,
        name: null,
        gender: null,
        relation: null,
        address: null,
        ph: null,
        id_no: null,
        nationality: null,
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
    var input = $("#likes").val();;
    var output = "b";
    let inputlanguage = "s";
    let outputlanguage = "s";
    //alert("Successfully added");

    
      $.ajax({
        url: '/formSubmit',
        method: "POST",
        datatype:"json",
        headers: {
              'X-CSRF-Token': '{{ csrf_field() }}'
            },
        data: {"input" : input, "output" : output, "inputlanguage" : inputlanguage, "outputlanguage" : outputlanguage}
      });

      
  };
</script>
@include ('partials.bootstrap-table', ['search' => true, 'showFooter' => true, 'columns' => \App\Presenters\BookingPresenter::dataTableLayout()])
@stop
