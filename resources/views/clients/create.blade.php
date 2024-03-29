@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
    @can('create', \App\Models\Client::class)
        <a href="{{ route('clients.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>

    @endcan
@stop
{{-- Page content --}}
<style type="text/css">
 
.custom-file-upload {
   
    display: flex;
    padding: 6px 12px;
    cursor: pointer;
}


.outer {
  width: 100% !important;
  height: 100% !important;
  max-width: 150px !important; /* any size */
  max-height: 150px !important; /* any size */
  margin: auto;
  background-color: #6eafd4;
  border-radius: 100%;
  position: relative;
  }
  
.inner {
  background-color: #ff1414;
  width: 50px;
  height: 50px;
  border-radius: 100%;
  position: absolute;
  bottom: 0;
  right: 0;
}

.inner:hover {
  background-color: #5555ff;
}
.inputfile {
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: 1;
    width: 50px;
    height: 50px;
}
.inputfile + label {
    font-size: 1.25rem;
    text-overflow: ellipsis;
    white-space: nowrap;
    display: inline-block;
    overflow: hidden;
    width: 50px;
    height: 50px;
    pointer-events: none;
    cursor: pointer;
    line-height: 50px;
    text-align: center;
}
.inputfile + label svg {
    fill: #fff;
}
</style>
@section('content')

<div id="webui">  
  <div class="row" style="padding-left: 80px;padding-right: 80px;">
      <!--<a href="http://127.0.0.1:8000/generate-pdf" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Download</a>-->

        <div id="app">
   
        
        <div class="col-md-10 offset-1">
          <form class="form-horizontal" method="POST" action="{{ route('clients.store') }}" autocomplete="off" role="form" style="width: 1000px; align-items: center;   background-color: #fff; " enctype="multipart/form-data" >
              {{ csrf_field() }}
              <div class="box box-default">
              <!-- box-header -->
                  
                 
                  <div class="box-header with-border text-center">
                 <h3><b>New Resident Admission Form</b></h3>
                   
                </div><!-- /.box-header -->
                
                <!-- box-body -->
                <div class="box-body" style="padding-left: 50px;">    

                  <div class="page" v-show="step === 1">
                    <div class="form-row ">
                      <div class="outer pull-right">
                        <img id="preview-image-before-upload" src="" alt="" onerror="if (this.src != 'error.jpg') this.src = '{{url('')}}/images/profile_pics/user.jpg';" class="outer" />
                    <div class="inner">
                      
                    <input class="inputfile" name="prof_pic" id="image" type="file" ><br>
                    <label style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg  xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg></label>
                    </div>
                  </div><!--
                      <div class="col-md-3 mb-6 pull-right">
                 <img id="preview-image-before-upload" src="" onerror="if (this.src != 'error.jpg') this.src = 'error.jpg';"
                      alt="preview image" style="width: 100px;height: 100px;border: 1px solid black;">

                      <label class="custom-file-upload">
                          <input type="file" name="prof_pic" id="image" style="display:none;" />
                          <i class="fa fa-edit"></i>
                      </label>
                    
                    
                  </div> -->
                </div>
                  
                    <h4 class="mb-3"><b>Personal Information</b></h4><br>              
                    
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="fname">Name of the Resident</label>                      
                        <select class="form-control" required  id="res_name" name="res_name" style="height: 26px;padding: 3px 10px;" >
                            <option value="">--   Select Resident Name  --</option>
                          @foreach($residents as $resident)
                          <option value="{{ $resident->id }}"> {{ $resident->cfname }}</option>
                          @endforeach
                        </select>
                    </div>

                   
                      <div class="col-md-2 mb-3">
                        <label for="gender">Gender</label>&nbsp;&nbsp;&nbsp;
                        
                        <input type="text" class="form-control" id="gender" placeholder=" Gender" name="gender" v-on:change="page_one.gender = $event.target.value" readonly>
       
                      </div>
                      
                      <div class="col-md-3 mb-3">
                        <label for="dob">Date of birth</label>
                        <input type="date" class="form-control" id="dob1" placeholder="Date of birth" name="dob" v-on:change="page_one.dob = $event.target.value" readonly>              
                      </div>
                       </div>&nbsp;&nbsp;&nbsp;
                        <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label for="religion">Religion</label>
                        <input type="text" class="form-control" id="religion" placeholder="Religion"  name="religion" v-on:change="page_one.religion = $event.target.value" readonly>              
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="nationality">Nationality</label>
                        <input type="text" class="form-control" id="nationality" placeholder="Nationality"  name="nationality" v-on:change="page_one.nationality = $event.target.value" >            
                      </div> 
                       <div class="col-md-3 mb-3">
                        <label for="res_ph">Mobile Number</label>
                        <input type="tel" class="form-control" id="res_ph" placeholder="Phone" name="ph"  v-on:change="page_one.res_ph = $event.target.value" readonly>          
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      
                      <div class="col-md-3 mb-3">
                        <label for="res_email">Email</label>
                        <input type="email" class="form-control" id="res_email" placeholder="Email"  name="res_email"  v-on:change="page_one.res_email = $event.target.value" readonly>                
                      </div>
                      <!--<div class="col-md-3 mb-3">
                        <label for="res_fax">Fax</label>
                        <input type="text" class="form-control" id="Fax" placeholder="res_fax" name="res_fax" v-on:change="page_one.res_fax = $event.target.value">            
                      </div>-->
                        <div class="col-md-3 mb-3">
                        <label for="acc">Account to be addressed</label>
                        <input type="text" class="form-control" id="acc" placeholder="Account to be addressed" name="acc"  v-on:change="page_one.acc = $event.target.value">            
                      </div> 

                      <div class="col-md-3 mb-3">
                        <label for="l_known">Languages Known</label>
                        <input type="text" class="form-control" id="l_known" placeholder="Languages Known"  name="l_known"  v-on:change="page_one.l_known = $event.target.value">          
                      </div>  


                      <div class="col-md-3 mb-3">
                        <label for="pre_address">Previous Address</label>
                        <input type="text" class="form-control" id="pre_address" placeholder="Previous Address" name="pre_address"  v-on:change="page_one.pre_address = $event.target.value" readonly>          
                      </div>

                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-3 mb-3" >
                        <label for="medicard_no">Medicare card no.</label>
                        <input type="text" class="form-control" id="medicard_no" placeholder="Medicare card number" name="medicard_no"  v-on:change="page_one.medicard_no = $event.target.value" readonly>
                        </div>

                      <div class="col-md-3 mb-3">
                        <label for="expiry_date">Expiry Month & Year</label>
                        <input type="month" class="form-control" id="exp_date1" placeholder="Expiry date" style="height:26px;"  name="exp_date" onChange="compareDate();" id="exp_date" v-on:change="page_one.expiry_date = $event.target.value" readonly>            
                      </div>
                        <div class="col-md-3 mb-3">
                        <label for="ent_no">Entitlement No</label>
                        <input type="text" style="width:200px;" class="form-control" id="ent_no" placeholder="Entitlement No" name="ent_no"  v-on:change="page_one.ent_no = $event.target.value">            
                      </div>
                       
                      <div class="col-md-3 mb-3">
                        <label for="respite">Respite/permanent</label>
                       <select name="respite" id="respite" class="form-control" style="height: 26px;padding: 3px 10px;"> 
                            <option value="Respite" style="font-size: 14px;">Respite</option> 
                            <option value="Permanent" style="font-size: 14px;">Permanent</option> 
                        </select> 
                  
                      </div> 

                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                                     
                      <div class="col-md-3 mb-3">
                        <label for="weeks">Book From</label>
                        <input type='date' name="start_period" id="book_from" class="form-control" placeholder="Book From"  required />          
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="weeks">Book To</label>
                        <input type='date' name="end_period" id="book_to" class="form-control" placeholder="Book From" required />          
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="adm_date">Admission Date</label>
                        <input type="date" class="form-control" id="adm_date" placeholder="Admission Date" name="adm_date"  v-on:change="page_one.adm_date = $event.target.value" disabled required>          
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="room_no">Room No</label>
                        <select class="form-control" required  id="room_no" name="room_no" style="height: 26px;padding: 3px 10px;">
                            <option value="">--Select Room--</option>
                          @foreach($rooms as $room)
                          <option value="{{ $room->id }}"> &nbsp;&nbsp;&nbsp;{{ $room->room_no}}&nbsp;&nbsp;&nbsp; </option>
                          @endforeach
                        </select>

                      </div>

                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-3 mb-3">

                        <label for="ref_by">Bed no</label>
                        
                         <select class="form-control" required  id="bednos" name="bed" style="height: 26px;padding: 3px 10px;">
                            <option value="">--Select Bed--</option>
                            
                        </select>          
                      </div>
                      <div class="col-md-3 mb-3">

                        <label for="ref_by">Room Structure</label>
                        <input type="text"  class="form-control" placeholder="Room Type" id="roomtype" name="room_type"   readonly>            
                      </div> 
                      <div class="col-md-3 mb-3">
                        <label for="acc">Room Rent</label>
                        <input type="text" class="form-control" id="roommmrent" placeholder="Room Rent" name="room_rent"  readonly>            
                      </div>   
                      
                      
                    <div class="col-md-3 mb-3">

                        <label for="ref_by">Ref By</label>
                        <input type="text" class="form-control" id="ref_by" placeholder="Ref By"  name="ref_by" v-on:change="page_one.ref_by = $event.target.value">            
                      </div> 

                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">

                       <div class="col-md-6 mb-3">
                        <label for="ent_no">Allergy Details</label>
                        <textarea placeholder="Allergy Details" class="form-control" name="allergy_det"  v-on:change="page_one.allergy_det = $event.target.value"></textarea>

                                  
                      </div>
                       <div class="col-md-6 mb-3">
                        <label for="ent_no">Status</label>
                          <select name="status" id="status" class="form-control" style="height: 26px;padding: 3px 10px;width: 200px;"> 
                            <option value="Active" style="font-size: 14px;">Active</option> 
                            <option value="Vaccate" style="font-size: 14px;">Vaccate</option> 
                            <option value="Transfered" style="font-size: 14px;">Transfered</option>
                        </select>    

                      </div> 
                    
                       
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                   
                     
                      <!--<div class="col-md-4 mb-3">
                        <label for="likes">Likes</label>                        
                        <textarea class="form-control" id="likes" placeholder="likes" name="likes"  v-on:change="page_one.likes = $event.target.value"></textarea>            
                      </div> 
                       <div class="col-md-4 mb-3">
                        <label for="dislikes">Dislikes</label>
                        <textarea class="form-control" id="dislikes" placeholder="Dislikes" name="dislikes"  v-on:change="page_one.dislikes = $event.target.value"></textarea>
                      </div> -->
                       
                    </div>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   

                      
                      <!--<div class="col-md-4 mb-3">
                        <label for="allowed_status">Visitors Allowed ?</label>
                        <br><input type="radio"  id="allowed_status"  value="Yes" name="allowed_status"  v-on:change="page_one.allowed_status = $event.target.value">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="allowed_status" value="No" name="allowed_status"  v-on:change="page_one.allowed_status = $event.target.value">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                        
                      </div>&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="allergy_status">Do you have any Allergey ?</label>
                        <br><input type="radio"  id="Allergey"  value="Yes" name="allergy_status"  v-on:change="page_one.allergy_status = $event.target.value">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="allergy_status" value="No" name="allergy_status"  v-on:change="page_one.allergy_status = $event.target.value">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="tof_allergy">Allergey Details</label>
                        <textarea class="form-control" id="tof_allergy" placeholder=" Hobbies" name="tof_allergy" v-on:change="page_one.tof_allergy = $event.target.value"></textarea>     
                      </div> 
                      <div class="col-md-4 mb-3">
                        <label for="hobies"> Hobbies</label>
                        <textarea class="form-control" id="hobies" placeholder=" Hobbies" name="hobies"  v-on:change="page_one.hobies = $event.target.value"></textarea>
                      </div>
                    </div>-->
                    
                    <h4 class="mb-3"><b>Nominated Person</b></h4><br>
               
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="nok_name">Name</label>
                        <input type="text" class="form-control" id="nok_name" placeholder="Name" name="nok_name" v-on:change="page_one.nok_name = $event.target.value" readonly>              
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="nok_address">Address</label>
                        <input type="text" class="form-control" id="nok_address" placeholder="Address" name="nok_address" v-on:change="page_one.nok_address = $event.target.value" readonly>              
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="nok_ph">Mobile Number</label>
                        <input type="tel" class="form-control" id="nok_ph" placeholder="Mobile Number" name="nok_ph" v-on:change="page_one.nok_ph = $event.target.value" readonly>  
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="nok_lan">Land Phone</label>
                        <input type="tel" class="form-control" id="nok_lan" placeholder="Land phone" name="nok_lan" v-on:change="page_one.nok_lan = $event.target.value" >  
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="nok_nok">Email</label>
                        <input type="email" class="form-control" id="nok_email" placeholder="Email" name="nok_email" v-on:change="page_one.nok_email = $event.target.value" readonly>  
                      </div>
                     <!-- <div class="col-md-4 mb-3">
                        <label for="nok_fax">Fax</label>
                        <input type="text" class="form-control" id="nok_fax" placeholder="Fax" name="nok_fax" v-on:change="page_one.nok_fax = $event.target.value">  
                      </div>-->
                      <div class="col-md-4 mb-3">
                        <label for="nok_relation">Relationship</label>
                        <input type="text" class="form-control" id="nok_relation" placeholder="Relationship" name="nok_relation" v-on:change="page_one.nok_relation = $event.target.value" readonly>  
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;                   

                    
                    <br>&nbsp;&nbsp;&nbsp;    <h4 class="mb-3"><b>GP Details</b></h4><br>

                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="gp_name">General practitioner Name</label>
                        <input type="text" class="form-control" id="gp_name" placeholder="General practitioner Name" name="gp_name"  v-on:change="page_one.gp_name = $event.target.value">          
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="gp_address">Address</label>
                        <input type="text" class="form-control" id="gp_address" placeholder="Address" name="gp_address" v-on:change="page_one.gp_address = $event.target.value">              
                      </div>
                      <div class="col-md-4 mb-3">
                          <label for="ph3">Mobile Number</label>
                          <input type="tel" class="form-control" id="ph3" placeholder="000-000-0000" name="ph3" v-on:change="page_one.ph3 = $event.target.value">              
                        </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">

                        <div class="col-md-4 mb-3">
                        <label for="gp_lan">Land Phone</label>
                        <input type="tel" class="form-control" id="gp_lan" placeholder="Land phone" name="gp_lan" v-on:change="page_one.gp_lan = $event.target.value">  
                      </div>
                        <div class="col-md-4 mb-3">
                          <label for="gp_email">Email</label>
                          <input type="email" class="form-control" id="gp_email" placeholder="Email" name="gp_email" v-on:change="page_one.gp_email = $event.target.value">              
                        </div>
                      <div class="col-md-4 mb-3">
                        <label for="gp_fax">Fax</label>
                        <input type="text" class="form-control" id="gp_fax" placeholder="Fax" name="gp_fax" v-on:change="page_one.gp_fax = $event.target.value">  
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <h4 class="mb-3"><b>Guardian Detail</b></h4><br>
               
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="gr_name">Name</label>
                        <input type="text" class="form-control" id="gr_name" placeholder="Name" name="gr_name" v-on:change="page_one.gr_name = $event.target.value" readonly>              
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="gr_address">Address</label>
                        <input type="text" class="form-control" id="gr_address" placeholder="Fax" name="gr_address" v-on:change="page_one.gr_address = $event.target.value" readonly>  
                      </div> 
                      <div class="col-md-4 mb-3">
                        <label for="gr_mob">Mobile Number</label>
                        <input type="tel" class="form-control" id="gr_mob" placeholder="Mobile" name="gr_mob" v-on:change="page_one.gr_mob = $event.target.value" readonly>  
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      
                      <div class="col-md-4 mb-3">
                        <label for="gr_lan">Land Phone</label>
                        <input type="tel" class="form-control" id="gr_lan" placeholder="Land Phone" name="gr_lan" v-on:change="page_one.gr_lan = $event.target.value">  
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="gr_email">Email</label>
                        <input type="email" class="form-control" id="gr_email" placeholder="Email" name="gr_email" v-on:change="page_one.gr_email = $event.target.value" readonly>  
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="gr_relation">Relation</label>
                        <input type="text" class="form-control" id="gr_relation" placeholder="Relation" name="gr_relation" v-on:change="page_one.gr_relation = $event.target.value">              
                      </div> 
                      
                    </div>&nbsp;&nbsp;&nbsp;
                    <h4 class="mb-3"><b>Health Service</b></h4><br>
               
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="hs_name">Name</label>
                        <input type="text" class="form-control" id="hs_name" placeholder="Name" name="hs_name" v-on:change="page_one.hs_name = $event.target.value">              
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="hs_address">Address</label>
                        <input type="text" class="form-control" id="hs_address" placeholder="Address" name="hs_address" v-on:change="page_one.hs_address = $event.target.value">              
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="hs_lan">Land Phone</label>
                        <input type="tel" class="form-control" id="hs_lan" placeholder="Land Phone" name="hs_lan" v-on:change="page_one.hs_lan = $event.target.value">  
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      
                      <div class="col-md-3 mb-3">
                        <label for="hs_email">Email</label>
                        <input type="email" class="form-control" id="hs_email" placeholder="Email" name="hs_email" v-on:change="page_one.hs_email = $event.target.value">  
                      </div>
                      <div class="col-md-2 mb-3">
                        <label for="hs_fax">Fax</label>
                        <input type="text" class="form-control" id="hs_fax" placeholder="Fax" name="hs_fax" v-on:change="page_one.hs_fax = $event.target.value">  
                      </div>
                      <div class="col-md-2 mb-3">
                        <label for="aftr_hrs">After Hours No.</label>
                        <input type="text" class="form-control" id="aftr_hrs" placeholder="After Hours No" name="aftr_hrs" v-on:change="page_one.aftr_hrs = $event.target.value">  
                      </div>
                      <div class="col-md-5 mb-3">
                        <label for="med_history">Medical History</label>
                        <textarea class="form-control" id="med_history" placeholder="Medical History" name="med_history" v-on:change="page_one.med_history = $event.target.value"></textarea>
                         
                      </div>
                    </div>
                   
                      <h4 class="mb-3"><b>Pension Details</b></h4><br>
               
                    <div class="form-row">
                      
                      <div class="col-md-3 mb-3">
                        <label for="pension_no">Pension card no.</label>
                        <input type="text" class="form-control" id="pension_no" placeholder="Pension card" name="pension_no"  v-on:change="page_one.pension_no = $event.target.value">          
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="pen_exp">Expiry date</label>
                        <input type="date" class="form-control" id="pen_exp" placeholder="Expiry date"  name="pen_exp" v-on:change="page_one.pen_exp = $event.target.value">            
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="client_refno">Client Reference no</label>
                        <input type="text" class="form-control" id="client_refno" placeholder="Client Reference no" name="client_refno" v-on:change="page_one.client_refno = $event.target.value" readonly>              
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="con_card">Taxi Concession details</label>
                        <input type="text" class="form-control" id="con_card" placeholder="Taxi Concession details" name="con_card" v-on:change="page_one.con_card = $event.target.value">  
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                     <div class="col-md-4 mb-3">
                        <label for="nok_taxi">Taxi Concession Card</label>
                        <input type="text" class="form-control" id="tp" placeholder="Taxi Concession Card" name="nok_taxi"  v-on:change="page_one.nok_taxi = $event.target.value" readonly>            
                      </div> 

                      <div class="col-md-4 mb-3">
                        <label for="nok_exp">Expiry Month & Year</label>
                        <input type="month" class="form-control" id="tpexp" placeholder="Expiry date" style="height:26px;"  name="exp_date" onChange="compareDate();" v-on:change="page_one.nok_exp = $event.target.value" readonly>         
                      </div>
                      <div class="col-md-4 mb-3" >
                        <label for="nok_other">Other</label>
                        <input type="text" class="form-control" id="nok_other" placeholder="Other" name="nok_other"  v-on:change="page_one.nok_other = $event.target.value">
                        </div>
                    </div>&nbsp;&nbsp;&nbsp;

                      <h4 class="mb-3"><b>Income Details</b></h4><br>
               
                    <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label for="client_refno">Type of Income</label>
                        
                        <input type="text" style="width: 300px;" class="form-control" id="tof" name="income_type" placeholder="Type of Income" readonly>
                      
                      </div>
                      </div>&nbsp;&nbsp;&nbsp;
               
                    <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label for="client_refno">Financial Administrator</label>
                        <input type="text" class="form-control" id="inc_sname" placeholder="Finance Admin Name" name="inc_sname" v-on:change="page_one.inc_sname = $event.target.value">              
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="nok_adr">Address</label>
                        <input type="text" class="form-control" id="nok_adr" placeholder="Address" name="nok_adr" v-on:change="page_one.nok_adr = $event.target.value">              
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="con_card">Phone No.</label>
                        <input type="text" class="form-control" id="inc_phone" placeholder="Phone" name="inc_phone" v-on:change="page_one.inc_phone = $event.target.value">  
                      </div> 
                       <div class="col-md-3 mb-3">
                        <label for="inc_email">Email</label>
                        <input type="email" class="form-control" id="inc_email" placeholder="Email" name="inc_email" v-on:change="page_one.inc_email = $event.target.value">  
                      </div>  
                       
                     </div>                                            
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  

                   <div class="form-row">
                      <div class="col-md-2 mb-3">
                        <label for="inc_ref">Reference No.</label>
                        <input type="text" class="form-control" id="inc_ref" placeholder="Reference No." name="inc_ref" v-on:change="page_one.inc_ref = $event.target.value">              
                      </div>
                      <div class="col-md-5 mb-3">
                        <label>Has this form is uploaded and notified to Accounts:</label>
                        <br><input type="radio"  id="nok_up"  value="Yes" name="nok_up">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="nok_up" value="No" name="nok_up">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div> 
                      <div class="col-md-5 mb-3">
                        <label>Has this Admission been notified to Pharmacy:</label>
                        <br><input type="radio"  id="nok_noti"  value="Yes" name="nok_noti">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="nok_noti" value="No" name="nok_noti">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>  
                     </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                                                                

                  <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="nok_st">Staff Name:</label>
                        <select class="form-control" style="height: 26px;padding: 3px 10px;" id="nok_st" name="nok_st">
                            <option value="" required>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}"> {{ $emp->name }}</option>
                          @endforeach
                        </select>
                                    
                      </div>
                      <div class="col-md-8 mb-3" style="width:250px;">
                        <label for="nok_dt">Date:</label>
                        <input type="date" class="form-control" id="nok_dt" placeholder="Date" name="nok_dt" v-on:change="page_one.nok_dt = $event.target.value">  
                      </div>
                    </div>
                                               
                  <!--<div class="page" v-show="step === 2">              
                    
                   <h4 class="mb-3"><b> <br>Family details</b></h4><br>

                   <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="f1name">First name</label>
                        <input type="text" class="form-control" id="f1name" placeholder="First Name"  name="f1name"  v-on:change="page_one.f1name = $event.target.value">                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="m1name">Middle name</label>
                        <input type="text" class="form-control" id="m1name" placeholder="Middle Name" name="m1name"  v-on:change="page_one.m1name = $event.target.value">                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="l1name">Last name</label>
                        <input type="text" class="form-control" id="l1name" placeholder="Last Name" name="l1name"  v-on:change="page_one.l1name = $event.target.value">                
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;
                      <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="relation">Relation</label>
                        <input type="text" class="form-control" id="relation" placeholder="Relation" name="relation"  v-on:change="page_one.relation = $event.target.value">      
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="address1">Address</label>
                        <input type="text" class="form-control" id="address1" placeholder="Address" name="address1" v-on:change="page_one.address1 = $event.target.value">              
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="gender1">Gender</label>&nbsp;&nbsp;&nbsp;
                        <br><input type="radio"  id="gender1"  value="Female" name="gender1"  v-on:change="page_one.gender1 = $event.target.value">&nbsp;&nbsp;&nbsp;Female&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="gender1" value="Male" name="gender1"  v-on:change="page_one.gender1 = $event.target.value">&nbsp;&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="gender1" value="Other" name="gender1"  v-on:change="page_one.gender1 = $event.target.value">&nbsp;&nbsp;&nbsp;Other &nbsp;&nbsp;&nbsp;           
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="ph1">Phone number</label>
                        <input type="tel" class="form-control" id="ph1" placeholder="Phone number" name="ph1" v-on:change="page_one.ph1 = $event.target.value">              
                      </div>    
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email"  v-on:change="page_one.email = $event.target.value">      
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" placeholder="Country" name="country" v-on:change="page_one.country = $event.target.value">              
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="religion1">Religion</label>
                        <input type="text" class="form-control" id="religion1" placeholder="Religion" name="religion1"  v-on:change="page_one.religion1 = $event.target.value">      
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;              
             
                    
                  </div> -->           
              
                  <!--<br><br><div class="page" v-show="step === 3">
                    
                    <br><h4 class="mb-3"><b>Power of attorney Details</b></h4><br>
               
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="po_maker">Person who make power of attorney</label>
                        <input type="text" class="form-control" id="po_maker" placeholder="Person who make power of attorney" name="po_maker"  v-on:change="page_one.po_maker = $event.target.value">          
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="po_maker_address">Address</label>
                        <input type="text" class="form-control" id="po_maker_address" placeholder="Address" name="po_maker_address" v-on:change="page_one.po_maker_address = $event.target.value">              
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="po_granter">Person who the power granted</label>
                        <input type="text" class="form-control" id="po_granter" placeholder="Person who make power of attorney" name="po_granter"  v-on:change="page_one.po_granter = $event.target.value">      
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="po_granter_address">Address of the power granted person</label>
                        <input type="text" class="form-control" id="po_granter_address" placeholder="Address of the power granted person" name="po_granter_address" v-on:change="page_one.po_granter_address = $event.target.value">              
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="grant_reason">Reason for granting</label>
                        <input type="text" class="form-control" id="grant_reason" placeholder="Reason for granting" name="grant_reason"  v-on:change="page_one.grant_reason = $event.target.value">      
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="g_date">Granted date</label>
                        <input type="date" class="form-control" id="g_date" placeholder="Granted date" name="g_date" v-on:change="page_one.g_date = $event.target.value">              
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="place">Place</label>
                        <input type="text" class="form-control" id="place" placeholder="Place" name="place"  v-on:change="page_one.place = $event.target.value">      
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
                        <br><input type="radio"  id="Allergey"  value="Yes" name="allergey"  v-on:change="page_one.allergey = $event.target.value">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="allergey" value="No" name="allergey"  v-on:change="page_one.allergey = $event.target.value">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="allergey_details">Allergey Details</label>
                        <input type="text" class="form-control" id="allergey_details" placeholder="Allergey Details" name="allergey_details" v-on:change="page_one.allergey_details = $event.target.value">              
                      </div> 
                    </div>
                     <!--<div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="tof_allergy">Type of alergy caused</label>
                        <input type="text" class="form-control" id="tof_allergy" placeholder="Type of alergy caused" name="tof_allergy"  v-on:change="page_one.tof_allergy = $event.target.value">          
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
                        <input type="text" class="form-control" id="duration" placeholder="Duration period to visit" name="duration"  v-on:change="page_one.duration = $event.target.value">          
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-row">

                      <div class="col-md-6 mb-3">
                        <label for="madicine">Name of the Medicines</label>
                        <input type="text" class="form-control" id="madicine" placeholder="Name of the Medicines" name="madicine" v-on:change="page_one.madicine = $event.target.value">              
                      </div>  
                      <div class="col-md-6 mb-3">
                        <label for="tests_report">Test Reports</label>
                        <input type="file"  id="tests_report" placeholder="Choose File" name="tests_report"  v-on:change="page_one.tests_report = $event.target.value">          
                      </div>&nbsp;&nbsp;&nbsp;                      
                        
                    
                    
                  </div>-->
     
                 <!-- <div class="page" v-show="step === 5">
                   
                    <h4 class="mb-3"><b>Visitors Allowed</b></h4><br>
                   
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="allowed_status">Allowed Status</label>
                        <br><input type="radio"  id="allowed_status"  value="Yes" name="allowed_status"  v-on:change="page_one.allowed_status = $event.target.value">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="allowed_status" value="No" name="allowed_status"  v-on:change="page_one.allowed_status = $event.target.value">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="gender2">Gender</label>
                        <br><input type="radio"  id="gender2"  value="Female" name="gender2"  v-on:change="page_one.gender2 = $event.target.value">&nbsp;&nbsp;&nbsp;Female&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="gender2" value="Male" name="gender2"  v-on:change="page_one.gender2 = $event.target.value">&nbsp;&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="gender2" value="Other" name="gender2"  v-on:change="page_one.gender2 = $event.target.value">&nbsp;&nbsp;&nbsp;Other &nbsp;&nbsp;&nbsp;                   
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
                        <label for="ph2">Mobile Number</label>
                        <input type="tel" class="form-control" id="ph2" placeholder="Mobile Number" name="ph2" v-on:change="page_one.ph2 = $event.target.value">              
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
                        <input type="text" class="form-control" id="gp_name" placeholder="General practitioner Name" name="gp_name"  v-on:change="page_one.gp_name = $event.target.value">          
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="gp_address">Address</label>
                        <input type="text" class="form-control" id="gp_address" placeholder="Address" name="gp_address" v-on:change="page_one.gp_address = $event.target.value">              
                      </div>  
                    </div>&nbsp;&nbsp;&nbsp;
                     <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="ph3">Mobile Number</label>
                        <input type="tel" class="form-control" id="ph3" placeholder="Mobile Number" name="ph3" v-on:change="page_one.ph3 = $event.target.value">              
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

                  <div class="page" v-show="step === 7">
                    
                    <h4 class="mb-3"><b>Next of kin</b></h4><br>

                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="allowed_status_nok">Allowed Status</label>
                        <br><input type="radio"  id="allowed_status_nok"  value="Yes" name="allowed_status_nok"  v-on:change="page_one.allowed_status_nok = $event.target.value">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="allowed_status_nok" value="No" name="allowed_status_nok"  v-on:change="page_one.allowed_status_nok = $event.target.value">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="gender3">Gender</label>
                      <br><input type="radio"  id="gender3"  value="Female" name="gender3"  v-on:change="page_one.gender3 = $event.target.value">&nbsp;&nbsp;&nbsp;Female&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="gender3" value="Male" name="gender3"  v-on:change="page_one.gender3 = $event.target.value">&nbsp;&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="gender3" value="Other" name="gender3"  v-on:change="page_one.gender3 = $event.target.value">&nbsp;&nbsp;&nbsp;Other &nbsp;&nbsp;&nbsp; 
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
                        <label for="nok_ph">Mobile Number</label>
                        <input type="tel" class="form-control" id="nok_ph" placeholder="Mobile Number" name="nok_ph" v-on:change="page_one.nok_ph = $event.target.value">  
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
                          <p class="card-text"><strong>Mobile Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>@{{ page_one.ph3 }}</p>
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
                </div>
             
                <div class="box-footer text-right" style="padding-right:50px;">
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
<script>
$('#res_name').change(function(){
    var id = $(this).val();
    var url = '{{ route("getref", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#dob1').val(response.cdob);            
                $('#gender').val(response.cgender);            
                $('#religion').val(response.creligion);            

                $('#res_ph').val(response.cph);            
                $('#res_email').val(response.cemail);           
                 
                $('#pre_address').val(response.caddress);           
                $('#medicard_no').val(response.pen_medino);           
                $('#exp_date1').val(response.pen_mediexp);           
                
                $('#nok_name').val(response.nok_name);           
                $('#nok_address').val(response.nok_address);           
                $('#nok_ph').val(response.nok_ph);           
                $('#nok_email').val(response.nok_email);           
                $('#nok_relation').val(response.nok_relation);   

                $('#gr_name').val(response.gua_name);           
                $('#gr_address').val(response.gua_addr);           
                $('#gr_email').val(response.gua_email);           
                $('#gr_mob').val(response.gua_ph);           

                $('#tp').val(response.pen_taxi);           
                $('#tpexp').val(response.pen_taxiexp);           
                $('#client_refno').val(response.gua_refno);           
                $('#tof').val(response.pen_type);           



            }
            else{
              alert("error");
 
            }
        }
    });
});
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
<script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#image').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
 
</script>
<script type="text/javascript">
  $('input[type="checkbox"]').on('change', function() {
    $('input[name="' + this.name + '"]').not(this).prop('checked', false);
});
</script>
<script type="text/javascript">
  function addbox() {
    if (document.getElementById('other').checked) {
        document.getElementById('income').style.display = 'block';
    } else {
        document.getElementById('income').style.display = 'none';
    }
}

</script>
<script type="text/javascript">
  

$('#respite').change(function () {
    if ($(this).find('option:selected').text() != 'Permanent') {
        $('#adm_date').prop('disabled', true);
        $('#book_from').prop('disabled', false);
        $('#book_to').prop('disabled', false);


    } else {
        $('#adm_date').prop('disabled', false);
        $('#book_from').prop('disabled', true);
        $('#book_to').prop('disabled', true);
    }
});

</script>
<script>
$('#room_no').change(function(){
    var id = $(this).val();
    var url = '{{ route("getRoomDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#roommmrent').val(response.room_rent);
                $('#roomtype').val(response.type);                        

            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script>
  $('#room_no').change(function(){
    var id = $(this).val();
    var url = '{{ route("getBed", ":id") }}';
    url = url.replace(':id', id);
    output = [];

    $.ajax({
        url: url,
        type: 'get',
        sync: false,
        dataType: 'json',
        success: function(response){
            if(response != null){
          
                response.beds.forEach(bed =>
                  output.push(`<option value="${bed.bed_no}" >${bed.bed_no}</option>`)
                  )
               
              $('#bednos').html(output.join(''));
            }
            else{
              alert("error");
            }
        }
    });
});
</script>

@include ('partials.bootstrap-table', ['search' => true, 'showFooter' => true, 'columns' => \App\Presenters\BookingPresenter::dataTableLayout()])
@stop
