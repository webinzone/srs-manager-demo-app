@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
    @can('create', \App\Models\Referral::class)
        <a href="{{ route('referrals.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

@section('inputFields')

{{-- Page content --}}
@section('content')
<style type="text/css">
  table, td, th {
    border: 1px solid black;
    align-items: center;
    padding: 10px;
  }

  table {
    width: 800px;
    left: 80px;
    border-collapse: collapse;
    align-items: center;
    align-content: center;
  }
</style>
<div id="webui">
  
  <div class="row" style="padding-left: 80px;padding-right: 80px;">
    
        <!-- col-md-8 -->
        <div class="col-md-10 offset-1">

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('referrals.update', $referral->id) }}" style="width: 1000px; align-items: center;   background-color: #fff; " autocomplete="off" role="form" enctype="multipart/form-data">
             @method('PATCH')

                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
               
                <div class="box-header with-border text-center">
                       <h3><b>Referral Form</b></h3>
                   
                </div>

                <h5 style="color:#980000;font-size: 16px;left: 90px;"><b><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PART A: for client or client's representative (if applicable)</i></b></h5>
                <div class="box-body" style="padding-left: 50px;">    
                     <h5 style="color:#980000;font-size: 16px;"><b>Client  Details</b></h5>

                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Rsident Name</label>                        
                        <select class="form-control" required="" id="resi_name" name="cfname" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Resident Name  --</option>
                          @foreach($residents as $resident)
                            <option value="{{ $resident->id }}" {{ $referral->cfname == $resident->fname." ".$resident->mname." ".$resident->lname ? 'selected' : ''  }}> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach
                        </select>                                      
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Surname:</label>
                        <input type="text" name="csurname" class="form-control" value="{{ $referral->csurname}}" placeholder="Surname:">                                        
                      </div>

                      <div class="col-md-3 mb-3">
                        <label>Date of Birth</label>
                        <input type="date" name="cdob" id="dob" class="form-control" value="{{ $referral->cdob}}" placeholder="Date of Birth" readonly>                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="cgender">Gender</label>&nbsp;&nbsp;&nbsp;
                          <input type="text" id="gender" name="cgender" class="form-control" value="{{ $referral->cgender}}" placeholder="Gender" readonly>
                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Religion</label>
                        <input type="text" name="creligion" id="rel" class="form-control" value="{{ $referral->creligion}}" placeholder="Religion" readonly>                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Mobile</label>
                        <input type="tel" name="cph" class="form-control"value="{{ $referral->cph}}" id="ph1" placeholder=" Mobile" readonly>                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Email ID</label>
                        <input type="email" name="cemail" id="em1" class="form-control" value="{{ $referral->cemail}}" placeholder="Email ID" readonly>                                       
                      </div>
                     
                      <div class="col-md-3 mb-3">
                        <label>Current Address</label>
                        <textarea name="caddress" id="adr" class="form-control" placeholder="Current Address" readonly>{{ $referral->caddress}} </textarea>
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>CONSENT TO RELEASE OF INFORMATION</b></h5>
                <div class="form-row">
                      <div class="col-md-4 mb-3">
                         <label>Name of person giving this consent</label>
                        <input type="text" name="con_name" id="con_name" class="form-control" value="{{ $referral->con_name}}" placeholder="Name of person giving this consent">
                       </div>
                                                            
                      <div class="col-md-4 mb-3">
                        <label>Name of person being referred</label>
                        <input type="text" name="refer_name" id="refer_name" class="form-control" value="{{ $referral->refer_name}}" placeholder="Name of person being referred">                                        
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Date</label>
                        <input type="date" name="r_date" id="r_date" class="form-control" value="{{ $referral->r_date}}" placeholder="Date">                                       
                      </div>
                      
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Representative Name</label>
                        <input type="text" name="rep_name" id="rep_name
                        " class="form-control" value="{{ $referral->rep_name}}" placeholder="Representative Name" >                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Relationship</label>
                        <input type="text" name="relation" id="relation" class="form-control" value="{{ $referral->relation}}" placeholder="Relationship" >                                        
                      </div>
                      
                      <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $referral->email}}" placeholder="Email" >                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="ph" id="ph" class="form-control" value="{{ $referral->ph}}" placeholder="Phone" >
                                                              
                      </div>
                </div><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b><i>PART B: for completion by referrer</i></b></h5>
                <div class="form-row">
                      <div class="col-md-4 mb-3">
                         <label>Reason for Referral to SRS</label>
                        <textarea name="reason" class="form-control" placeholder="Reason for Referral to SRS">{{ $referral->reason}}</textarea>
                       </div>
                                                            
                      <div class="col-md-4 mb-3">
                        <label>Referral of this client is appropriate ?</label>
                        <textarea name="appr_becoz" class="form-control" placeholder="I consider that referral of this client to the SRS is appropriate because">{{ $referral->appr_becoz}}</textarea>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Date</label>
                        <input type="date" name="ref_date" class="form-control" value="{{ $referral->ref_date}}" placeholder="Date">                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Position</label>
                        <input type="text" name="ref_posi" class="form-control" value="{{ $referral->ref_posi}}" placeholder="Position">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Agency</label>
                        <input type="text" name="ref_agency" class="form-control" value="{{ $referral->ref_agency}}" placeholder="Agency">                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Email ID</label>
                        <input type="email" name="ref_email" class="form-control" value="{{ $referral->ref_email}}" placeholder="Email ID">                                       
                      </div>
                     
                      <div class="col-md-3 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="ref_ph" class="form-control" value="{{ $referral->ref_ph}}" placeholder="Phone">
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
              <h5 style="color:#980000;font-size: 16px;">[If client is residing in another SRS]</h5>
                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Name of SRS</label>
                        <input type="text" name="csrs_name" class="form-control" value="{{ $referral->cemail}}" placeholder="csrs_name of SRS">                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="csrs_ph" class="form-control" value="{{ $referral->csrs_ph}}" placeholder="Phone">                                        
                      </div>
                </div>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;">[if the client has private health insurance]</h5>
                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Insurer</label>
                        <input type="text" name="csrs_insu" class="form-control" value="{{ $referral->csrs_insu}}" placeholder="Insurer">                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Ref. Number</label>
                        <input type="text" name="csrs_refno" class="form-control" value="{{ $referral->csrs_refno}}" placeholder="Ref. Number">                                        
                      </div>
                </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 


               <h5 style="color:#980000;font-size: 16px;"><b>Next of Kin Details</b></h5>

               <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="nok_name" id="nname" class="form-control" value="{{ $referral->nok_name}}" placeholder="Name" readonly>                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Relation</label>
                        <input type="text" name="nok_relation" class="form-control" value="{{ $referral->nok_relation}}" placeholder="Relation">                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Address</label>
                        <textarea name="nok_address" id="nadr" class="form-control" placeholder="Address" readonly>{{ $referral->nok_address}}</textarea>                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" id="nemail" name="nok_email" class="form-control" value="{{ $referral->nok_email}}" placeholder="Email" readonly>                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="nok_ph" id="nph" class="form-control" value="{{ $referral->nok_ph}}" placeholder="Phone" readonly>                                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Medical Practitioner</b></h5>

               <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="gp_name" id="gpname" class="form-control" value="{{ $referral->gp_name}}" placeholder="Name" readonly>                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Address</label>
                        <textarea name="gp_address" id="gpadr" class="form-control" placeholder="Address" readonly>{{ $referral->gp_address}}</textarea>                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Phone</label>
                        <input type="tel" id="gpph" name="gp_ph" class="form-control" value="{{ $referral->gp_ph}}" placeholder="Phone" readonly>                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Fax</label>
                        <input type="text" id="gpfax" name="gp_fax" class="form-control" value="{{ $referral->gp_fax}}" placeholder="Fax" readonly>                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" id="gpemail" name="gp_email" class="form-control" value="{{ $referral->gp_email}}" placeholder="Email" readonly>                                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Guardian Details (if the client has guardian)</b></h5>

               <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Client Ref Number</label>
                        <input type="text" name="gua_refno" id="" class="form-control" value="{{ $referral->gua_refno}}" placeholder="Client Ref Number">                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" id="gname" name="gua_name" class="form-control" value="{{ $referral->gua_name}}" placeholder="Name" readonly>                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Address</label>
                        <textarea name="gua_addr" id="gadr" class="form-control" placeholder="Address" readonly>{{ $referral->gua_addr}}</textarea>                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Email ID</label>
                        <input type="email" id="gemail" name="gua_email" class="form-control" value="{{ $referral->gua_email}}" placeholder="Email ID" readonly>                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="gua_ph" id="gph" class="form-control" value="{{ $referral->gua_ph}}" placeholder="Phone" readonly>                                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;">[If the client has an administrator]</h5>

               <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="ad_name" class="form-control" value="{{ $referral->ad_name}}" placeholder="Name">                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Client Ref Number</label>
                        <input type="text" name="ad_refno" class="form-control" value="{{ $referral->ad_refno}}" placeholder="Client Ref Number">
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Address</label>
                        <textarea name="ad_addr" class="form-control" placeholder="Address">{{ $referral->ad_addr}}</textarea>                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Email ID</label>
                        <input type="email" name="ad_email" class="form-control" value="{{ $referral->ad_email}}" placeholder="Email ID">                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="ad_ph" class="form-control" value="{{ $referral->ad_ph}}" placeholder="Phone">                                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Pension Details</b></h5>

                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Type of Income</label>
                        <input type="text" class="form-control" value="{{ $referral->pen_type}}" id="tof" name="pen_type" placeholder="Type of Income" readonly>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Client Ref Number</label>
                        <input type="text" name="pen_refno" id="ref" class="form-control" value="{{ $referral->pen_refno}}" placeholder="Client Ref Number" readonly>                                          
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Medicare Number</label>
                        <input type="text" name="pen_medino" id="medi1" class="form-control" value="{{ $referral->pen_medino}}" placeholder="Medicare Number" readonly >                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Expiry Date</label>
                        <input type="month" name="pen_mediexp" id="mediexp" class="form-control" value="{{ $referral->pen_mediexp}}" placeholder="Expiry Date" readonly>                                        
                      </div>
                      
                      <div class="col-md-3 mb-3">
                        <label>Taxi Card Concession Number</label>
                        <input type="text" name="pen_taxi" id="taxi" class="form-control" value="{{ $referral->pen_taxi}}" placeholder="Taxi Card Concession Number" readonly>                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Expiry Date</label>
                        <input type="date" name="pen_taxiexp" id="pen_taxiexp" class="form-control" value="{{ $referral->pen_taxiexp}}" placeholder="Expiry Date" >
                                                              
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <h5 style="color:#980000;font-size: 16px;"><b>Medication.This information to be provided by client's health provider.</b></h5>
                <div class="form-row">
                  <div class="col-md-12 mb-3" >
                <table id="drugss" style="border: 2px; border-width: 1px; border-color: black; padding-left: 8px;left: 50px; padding: 10px;">
                  <tr style="padding:5px;">
                    <th>Drug name</th>
                    <th>Dose</th>
                    <th>Frequency</th>
                    <th>Duration</th>
                    <th>Last Taken</th>
                  </tr>
                @for ($i=0; $i < $num; $i++)
                  <tr>
                  <td><input type="text" id="f7" value="{{ $drug[$i] }}"  name="medi_drugname[]"></td>
                  <td><input type="text" id="f7" value="{{ $dose[$i] }}" name="medi_dose[]"></td>
                  <td><input type="text" id="f7" value="{{ $freq[$i] }}" name="medi_freq[]"></td>
                  <td><input type="text" id="f7" value="{{ $duration[$i] }}" name="medi_duration[]"></td>
                  <td><input type="text" id="f7" value="{{ $last[$i] }}" name="medi_lasttaken[]"></td>
                </tr>
                @endfor
                <tr>
                  <td><input type="text" id="f7" name="medi_drugname[]"></td>
                  <td><input type="text" id="f7" name="medi_dose[]"></td>
                  <td><input type="text" id="f7" name="medi_freq[]"></td>
                  <td><input type="text" id="f7" name="medi_duration[]"></td>
                  <td><input type="text" id="f7" name="medi_lasttaken[]"></td>
                </tr>
                <tr>
                  <td><input type="text" id="f7" name="medi_drugname[]"></td>
                  <td><input type="text" id="f7" name="medi_dose[]"></td>
                  <td><input type="text" id="f7" name="medi_freq[]"></td>
                  <td><input type="text" id="f7" name="medi_duration[]"></td>
                  <td><input type="text" id="f7" name="medi_lasttaken[]"></td>
                </tr>
                <tr>
                  <td><input type="text" id="f7" name="medi_drugname[]"></td>
                  <td><input type="text" id="f7" name="medi_dose[]"></td>
                  <td><input type="text" id="f7" name="medi_freq[]"></td>
                  <td><input type="text" id="f7" name="medi_duration[]"></td>
                  <td><input type="text" id="f7" name="medi_lasttaken[]"></td>
                </tr>
                
                
                </table>
              </div>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                       <label>Does client have the medication with her/him?</label>
                        <br><input type="radio" {{ $referral->c_medi == 'Yes' ? 'checked' : ''  }} id="c_medi" onchange="findselected();" value="Yes" name="c_medi">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" {{ $referral->c_medi == 'No' ? 'checked' : ''  }} id="c_medi" value="No" onchange="findselected();" name="c_medi">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>
                      <div class="col-md-6 mb-3">
                       <label>Is the client able to administer own medication?</label>
                      <br> <input type="radio" {{ $referral->c_ownmedi == 'Yes' ? 'checked' : ''  }} id="c_ownmedi" onchange="findselected();" value="Yes" name="c_ownmedi">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" {{ $referral->c_ownmedi == 'No' ? 'checked' : ''  }} id="c_ownmedi" value="No" onchange="findselected();" name="c_ownmedi">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>
                    
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                <div class="form-row"> 
                      <div class="col-md-12 mb-3">
                        <label>Please specify any anticipated side effects of medication</label>
                        <textarea name="c_medisideeffect" class="form-control"  placeholder="Please specify any anticipated side effects of medication">{{ $referral->c_medisideeffect}}</textarea>
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <h5 style="color:#980000;font-size: 16px;"><b>Physical Status</b></h5>
                    <div class="form-row">
                       <div class="col-md-12 mb-3">
                        <label>Please list any pre-existing medical conditions or allergies</label>
                        <textarea name="ph_status" class="form-control" placeholder="Please list any pre-existing medical conditions or allergies">{{ $referral->ph_status}}</textarea>                                        
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <h5 style="color:#980000;font-size: 16px;"><b>Cognitive Status</b></h5>
                    <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>Please list any cognitive issues to which SRS staff need to be alerted, e.g. orientation to time and place; independence in decision making; memory impairment; other.</label>
                         <textarea name="cogi_status" class="form-control" placeholder="Please list any cognitive issues to which SRS staff need to be alerted, e.g. orientation to time and place; independence in decision making; memory impairment; other.">{{ $referral->cogi_status}}</textarea>                                       
                      </div>
                       
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Disability</b></h5>
                <h6 style="color:#980000;font-size: 16px;">[If the client is registered with Disability Services (DHS)]</h6>

               <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>Primary Disability</label>
                        <input type="text" name="dis_primary" class="form-control" value="{{ $referral->dis_primary}}" placeholder="Primary Disability">                                   
                      </div>
                </div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Case Manager</label>
                        <input type="text" name="dis_casemngr" class="form-control" value="{{ $referral->dis_casemngr}}" placeholder="Case Manager">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Organisation</label>
                        <input type="text" name="dis_org" class="form-control" value="{{ $referral->dis_org}}" placeholder="Organisation">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="dis_email" class="form-control" value="{{ $referral->dis_email}}" placeholder="Email">                                       
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="dis_ph" class="form-control" value="{{ $referral->dis_ph}}" placeholder="Phone">                                       
                      </div>
                       
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Mental Health Sfafus</b></h5>

               <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>Please specify any mental health issues to which staff needs to be alerted</label>
                        <input type="text" name="ment_status" class="form-control" value="{{ $referral->ment_status}}" placeholder="Please specify any mental health issues to which staff needs to be alerted">                                   
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Case Manager</label>
                        <input type="text" name="ment_casemngr" class="form-control" value="{{ $referral->ment_casemngr}}" placeholder="Case Manager">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Organisation</label>
                        <input type="text" name="ment_org" class="form-control" value="{{ $referral->ment_org}}" placeholder="Organisation">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="ment_email" class="form-control" value="{{ $referral->ment_email}}" placeholder="Email">                                       
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="ment_ph" class="form-control" value="{{ $referral->ment_ph}}" placeholder="Phone">                                       
                      </div>
                       
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>Behaviour List any behaviour Self-harm</label><br>
                            <label><input  {{ $ch1 == 'true' ? 'checked' : ''  }}  type="checkbox" name="behav_harm[]" value="Smoking"> Smoking</label>&nbsp;&nbsp;
                                <label><input {{ $ch2 == 'true' ? 'checked' : ''  }}  type="checkbox" name="behav_harm[]" value="Self-Motivation"> Self-Motivation</label>&nbsp;&nbsp;
                                <label><input {{ $ch3 == 'true' ? 'checked' : ''  }} type="checkbox" name="behav_harm[]" value="Capacity for cooperation"> Capacity for cooperation</label>&nbsp;&nbsp;
                                <label><input {{ $ch4 == 'true' ? 'checked' : ''  }} type="checkbox" name="behav_harm[]" value="Wandering"> Wandering</label>&nbsp;&nbsp;
                                <label><input {{ $ch5 == 'true' ? 'checked' : ''  }} type="checkbox" name="behav_harm[]" value="Capacity to share"> Capacity to share</label>&nbsp;&nbsp;
                                <label><input {{ $ch6 == 'true' ? 'checked' : ''  }} type="checkbox" name="behav_harm[]" value="Capacity to socialise"> Capacity to socialise</label>&nbsp;&nbsp;
                                <label><input {{ $ch7 == 'true' ? 'checked' : ''  }} type="checkbox" name="behav_harm[]" value="Verbal aggression"> Verbal aggression</label>&nbsp;&nbsp;
                                <label><input {{ $ch8 == 'true' ? 'checked' : ''  }} type="checkbox" name="behav_harm[]" value="Drug/alcohol"> Drug/alcohol</label>&nbsp;&nbsp;
                                <label><input {{ $ch9 == 'true' ? 'checked' : ''  }} type="checkbox" name="behav_harm[]" value="Impulse control"> Impulse control</label>&nbsp;&nbsp;
                                <label><input {{ $ch10 == 'true' ? 'checked' : ''  }} type="checkbox" name="behav_harm[]" value="Other"> Other</label>&nbsp;&nbsp;      
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                
                <div class="form-row">
                      <div class="col-md-12 mb-3">

                        <label>Details</label>
                        <textarea name="behav_details" class="form-control" placeholder="Details">{{ $referral->behav_details}}</textarea>                                      
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>List any known "triggers" for problem behaviour</label>
                        <textarea name="triger" class="form-control" placeholder="List any known triggers for problem behaviour">{{ $referral->triger}}</textarea>                                       
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                  <div class="col-md-12 mb-3" >
            <table style="border: 2px; border-width: 1px; border-color: black; padding-left: 8px;left: 50px;">
                  <tr style="padding:5px;">
                    <thead style="padding:10px;">
                    <th style="left:5px;" width="50px;">S.NO</th>
                    <th width="500px;">If you answer "Yes" pl provide further information.</th>
                    <th width="50px;">&nbsp;&nbsp;YES</th>
                    <th width="50px;">&nbsp;&nbsp;NO</th>
                    <th width="200px;">Details(If you answer "Yes" pl provide further information)</th>
                    </thead>
                  </tr>
                  <tr>
                  <td>1</td>
                  <td>Have you been told by a doctor or other health professional that you have a health condition (eg breathing problems, a cancer, heart problems, chronic kidney disease, diabetes, high biood pressure, arthritis, osteoporosis or other condition)?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected11();" {{ $referral2->med1 == 'Yes' ? 'checked' : ''  }} name="med1" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected11();" {{ $referral2->med1 == 'NO' ? 'checked' : ''  }} name="med1" value="NO" /> </td>
                  <td><input type="text" id="f1" name="med1_det" style="height:70px;" value="{{ $referral2->med1_det}}"></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Have you recently had problems with your teeth, mouth, gums or dentures?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected12();" {{ $referral2->med2 == 'Yes' ? 'checked' : ''  }} name="med2" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected12();" {{ $referral2->med2 == 'NO' ? 'checked' : ''  }} name="med2" value="NO" /> </td>
                  <td><input type="text" id="f2" name="med2_det" style="height:70px;" value="{{ $referral2->med2_det}}"></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Are you concerned about your medications?</td>

                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected13();" {{ $referral2->med3 == 'Yes' ? 'checked' : ''  }} name="med3" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected13();" {{ $referral2->med3 == 'NO' ? 'checked' : ''  }} name="med3" value="NO" /> </td>
                  <td><input type="text" id="f33" name="med3_det" style="height:70px;" value="{{ $referral2->med3_det}}"></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Are you concerned about your lack of physical activity?</td>

                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected14();" {{ $referral2->med4 == 'Yes' ? 'checked' : ''  }} name="med4" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected14();" {{ $referral2->med4 == 'NO' ? 'checked' : ''  }} name="med4" value="NO" /> </td>
                  <td><input type="text" id="f4" name="med4_det" style="height:70px;" value="{{ $referral2->med4_det}}"></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Are you concerned about your weight?</td>

                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected15();" {{ $referral2->med5 == 'Yes' ? 'checked' : ''  }} name="med5" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected15();" {{ $referral2->med5 == 'NO' ? 'checked' : ''  }} name="med5" value="NO" /> </td>
                  <td><input type="text" id="f5" name="med5_det" style="height:70px;" value="{{ $referral2->med5_det}}"></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Have you recently lost weight without trying?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected16();" {{ $referral2->med6 == 'Yes' ? 'checked' : ''  }} name="med6" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected16();" {{ $referral2->med6 == 'NO' ? 'checked' : ''  }} name="med6" value="NO" /> </td>
                  <td><input type="text" id="f66" name="med6_det" style="height:70px;" value="{{ $referral2->med6_det}}"></td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Do currently smoke tobacco?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected17();" {{ $referral2->med7 == 'Yes' ? 'checked' : ''  }} name="med7" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected17();" {{ $referral2->med7 == 'NO' ? 'checked' : ''  }} name="med7" value="NO" /> </td>
                  <td><input type="text" id="f7" name="med7_det" style="height:70px;" value="{{ $referral2->med7_det}}"></td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Have you quit smoking tobacco in the last 5 years?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected18();" {{ $referral2->med8 == 'Yes' ? 'checked' : ''  }} name="med8" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected18();" {{ $referral2->med8 == 'NO' ? 'checked' : ''  }} name="med8" value="NO" /> </td>
                  <td><input type="text" id="f8" name="med8_det" style="height:70px;" value="{{ $referral2->med8_det}}"></td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>Are you concerned about how much alcohol you drink?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected19();" {{ $referral2->med9 == 'Yes' ? 'checked' : ''  }} name="med9" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected19();" {{ $referral2->med9 == 'NO' ? 'checked' : ''  }} name="med9" value="NO" /> </td>
                  <td><input type="text" id="f9" name="med9_det" style="height:70px;" value="{{ $referral2->med9_det}}"></td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>Are you concerned about your use of drugs?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected20();" {{ $referral2->med10 == 'Yes' ? 'checked' : ''  }} name="med10" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected20();" {{ $referral2->med10 == 'NO' ? 'checked' : ''  }} name="med10" value="NO" /> </td>
                  <td><input type="text" id="f10" name="med10_det" style="height:70px;" value="{{ $referral2->med10_det}}"></td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>Are you concerned about your gambling?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected11();" {{ $referral2->med11 == 'Yes' ? 'checked' : ''  }} name="med11" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected11();" {{ $referral2->med11 == 'NO' ? 'checked' : ''  }} name="med11" value="NO" /> </td>
                  <td><input type="text" id="f11" name="med11_det" style="height:70px;" value="{{ $referral2->med11_det}}"></td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>Is your financial situation very difficult?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected12();" {{ $referral2->med12 == 'Yes' ? 'checked' : ''  }} name="med12" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected12();" {{ $referral2->med12 == 'NO' ? 'checked' : ''  }} name="med12" value="NO" /> </td>
                  <td><input type="text" id="f12" name="med12_det" style="height:70px;" value="{{ $referral2->med12_det}}"></td>
                </tr>
                <tr>
                  <td>13</td>
                  <td>Do you often feel sad or depressed?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected13();" {{ $referral2->med13 == 'Yes' ? 'checked' : ''  }} name="med13" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected13();" {{ $referral2->med13 == 'NO' ? 'checked' : ''  }} name="med13" value="NO" /> </td>
                  <td><input type="text" id="f13" name="med13_det" style="height:70px;" value="{{ $referral2->med13_det}}"></td>
                </tr>
                <tr>
                  <td>14</td>
                  <td>Do you often feel nervous or anxious?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected14();" {{ $referral2->med14 == 'Yes' ? 'checked' : ''  }} name="med14" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected14();" {{ $referral2->med14 == 'NO' ? 'checked' : ''  }} name="med14" value="NO" /> </td>
                  <td><input type="text" id="f14" name="med14_det" style="height:70px;" value="{{ $referral2->med14_det}}"></td>
                </tr>
                <tr>
                  <td>15</td>
                  <td>Have you felt afraid of someone who controls or hurts you?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected15();" {{ $referral2->med15 == 'Yes' ? 'checked' : ''  }} name="med15" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected15();" {{ $referral2->med15 == 'NO' ? 'checked' : ''  }} name="med15" value="NO" /> </td>
                  <td><input type="text" id="f15" name="med15_det" style="height:70px;" value="{{ $referral2->med15_det}}"></td>
                </tr>
                <tr>
                  <td>16</td>
                  <td>Are you homeless or at risk of homelessness?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected16();" {{ $referral2->med16 == 'Yes' ? 'checked' : ''  }} name="med16" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected16();" {{ $referral2->med16 == 'NO' ? 'checked' : ''  }} name="med16" value="NO" /> </td>
                  <td><input type="text" id="f16" name="med16_det" style="height:70px;" value="{{ $referral2->med16_det}}"></td>
                </tr>
                <tr>
                  <td>17</td>
                  <td>Would you rate your health as poor?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected17();" {{ $referral2->med17 == 'Yes' ? 'checked' : ''  }} name="med17" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected17();" {{ $referral2->med17 == 'NO' ? 'checked' : ''  }} name="med17" value="NO" /> </td>
                  <td><input type="text" id="f17" name="med17_det" style="height:70px;" value="{{ $referral2->med17_det}}"></td>
                </tr>
                <tr>
                  <td>18</td>
                  <td>Would you rate your life circumstances as poor?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected18();" {{ $referral2->med18 == 'Yes' ? 'checked' : ''  }} name="med18" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected18();" {{ $referral2->med18 == 'NO' ? 'checked' : ''  }} name="med18" value="NO" /> </td>
                  <td><input type="text" id="f18" name="med18_det" style="height:70px;" value="{{ $referral2->med18_det}}"></td>
                </tr>
                </table>
              </div>


                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="form-row">
                  <div class="col-md-12 mb-3" >
                <table>
                  <tr>
                    <th>Personal Care</th>
                    <th>No Assistance</th>
                    <th>Prompting/Supervision</th>
                    <th>Active Assistance</th>
                  </tr>
                  <tr>
                  <td>Eating/d rinking/diet</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p1 == 'No Assistance' ? 'checked' : ''  }} name="p1" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p1 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p1" value="Prompting/Supervision" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p1 == 'Active Assistance' ? 'checked' : ''  }} name="p1" value="Active Assistance" /> </td>
                </tr>
                <tr>
                  <td>Mobility</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p2 == 'No Assistance' ? 'checked' : ''  }} name="p2" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p2 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p2" value="Prompting/Supervision" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p2 == 'Active Assistance' ? 'checked' : ''  }} name="p2" value="Active Assistance" /> </td>
                </tr>
                <tr>
                  <td>Showering/bathing</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p3 == 'No Assistance' ? 'checked' : ''  }} name="p3" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p3 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p3" value="Prompting/Supervision" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p3 == 'Active Assistance' ? 'checked' : ''  }} name="p3" value="Active Assistance" /> </td>
                </tr>
                <tr>
                  <td>Shaving/grooming</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p4 == 'No Assistance' ? 'checked' : ''  }} name="p4" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p4 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p4" value="Prompting/Supervision" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p4 == 'Active Assistance' ? 'checked' : ''  }} name="p4" value="Active Assistance" /> </td>
                </tr>
                <tr>
                  <td>Dressing</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p5 == 'No Assistance' ? 'checked' : ''  }} name="p5" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p5 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p5" value="Prompting/Supervision" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p5 == 'Active Assistance' ? 'checked' : ''  }} name="p5" value="Active Assistance" /> </td>
                </tr>
                <tr>
                  <td>Dental hygiene</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p6 == 'No Assistance' ? 'checked' : ''  }} name="p6" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p6 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p6" value="Prompting/Supervision" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p6 == 'Active Assistance' ? 'checked' : ''  }} name="p6" value="Active Assistance" /> </td>
                </tr>
                <tr>
                  <td>Toileting</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p7 == 'No Assistance' ? 'checked' : ''  }} name="p7" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p7 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p7" value="Prompting/Supervision" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p7 == 'Active Assistance' ? 'checked' : ''  }} name="p7" value="Active Assistance" /> </td>
                </tr>
                <tr>
                  <td>Foot care/nail care</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p8 == 'No Assistance' ? 'checked' : ''  }} name="p8" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p8 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p8" value="Prompting/Supervision" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p8 == 'Active Assistance' ? 'checked' : ''  }} name="p8" value="Active Assistance" /> </td>
                </tr>
                <tr>
                  <td>Laundry</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p9 == 'No Assistance' ? 'checked' : ''  }} name="p9" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p9 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p9" value="Prompting/Supervision" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p9 == 'Active Assistance' ? 'checked' : ''  }} name="p9" value="Active Assistance" /> </td>
                </tr>
                <tr>
                  <td>Housekeeping</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p10 == 'No Assistance' ? 'checked' : ''  }} name="p10" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p10 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p10" value="Prompting/Supervision" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="radio" onchange="findselected5();" {{ $referral2->p10 == 'Active Assistance' ? 'checked' : ''  }} name="p10" value="Active Assistance" /> </td>
                </tr>
                </table>
              </div>
            </div>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <h5 style="color:#980000;font-size: 16px;"><b>Aids and Appliances</b></h5>
          <h5 style="font-size: 16px;">Does client use any aids or appliances?</h5>

                <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label>Mobility</label><br>
                            <label><input type="checkbox"  {{ $a1_ch1 == 'true' ? 'checked' : ''  }} name="a1[]" value="Stick" />&nbsp;&nbsp;Stick</label>&nbsp;&nbsp;
                            <label><input type="checkbox"  {{ $a2_ch2 == 'true' ? 'checked' : ''  }} name="a1[]" value="Frame" />&nbsp;&nbsp;Frame</label>&nbsp;&nbsp;
                            <label><input type="checkbox"  {{ $a3_ch3 == 'true' ? 'checked' : ''  }} name="a1[]" value="Wheelchair" />&nbsp;&nbsp;Wheelchair</label>&nbsp;&nbsp;
                            <label><input type="checkbox"  {{ $a4_ch4 == 'true' ? 'checked' : ''  }} name="a1[]" value="Other" />&nbsp;&nbsp;Other</label>&nbsp;&nbsp;<br>       
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Communication</label><br>
                        <label><input type="checkbox"  {{ $a2_ch1 == 'true' ? 'checked' : ''  }} name="a2[]" value="Glasses" />&nbsp;&nbsp;Glasses</label>&nbsp;&nbsp;
                            <label><input type="checkbox"  {{ $a2_ch2 == 'true' ? 'checked' : ''  }} name="a2[]" value="Hearing Aid" />&nbsp;&nbsp;Hearing Aid</label>&nbsp;&nbsp;
                            <label><input type="checkbox"  {{ $a2_ch3 == 'true' ? 'checked' : ''  }} name="a2[]" value="Interpreter" />&nbsp;&nbsp;Interpreter</label>
                            <label><input type="checkbox"  {{ $a2_ch4 == 'true' ? 'checked' : ''  }} name="a2[]" value="Other" />&nbsp;&nbsp;Other</label>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Other</label><br>
                        <label><input type="checkbox"  {{ $a3_ch1 == 'true' ? 'checked' : ''  }} name="a3[]" value="Dentures" />&nbsp;&nbsp;Dentures</label>&nbsp;&nbsp;
                            <label><input type="checkbox"  {{ $a3_ch2 == 'true' ? 'checked' : ''  }} name="a3[]" value="Continence aids" />&nbsp;&nbsp;Continence aids</label>&nbsp;&nbsp;                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               
                <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>Comments</label>
                        <textarea name="a_comments" class="form-control" placeholder="Comments">{{ $referral2->a_comments}}</textarea>
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Community Living Skills</b></h5>
                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Is the client able to access public transport?</label><br>
                            <label><input type="checkbox" onchange="findselected5();" {{ $referral2->public_trans == 'Yes' ? 'checked' : ''  }} name="public_trans" value="Yes" />&nbsp;&nbsp;Yes</label>&nbsp;&nbsp;
                            <label><input type="checkbox" onchange="findselected5();" {{ $referral2->public_trans == 'No' ? 'checked' : ''  }} name="public_trans" value="No" />&nbsp;&nbsp;No</label>&nbsp;&nbsp;
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Is the client able to make and keep appointments?</label><br>
                            <label><input type="checkbox" onchange="findselected5();" {{ $referral2->app_keep == 'Yes' ? 'checked' : ''  }} name="app_keep" value="Yes" />&nbsp;&nbsp;Yes</label>&nbsp;&nbsp;
                            <label><input type="checkbox" onchange="findselected5();" {{ $referral2->app_keep == 'No' ? 'checked' : ''  }} name="app_keep" value="No" />&nbsp;&nbsp;No</label>&nbsp;&nbsp;
                          </div>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <h5 style="color:#980000;font-size: 16px;"><b>Recreation/ Socialization</b></h5>
                <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>If the client attends any community based social activities, please provide details</label>
                        <textarea name="social_activity" class="form-control" placeholder="If the client attends any community based social activities, please provide details">{{ $referral2->social_activity}}</textarea>
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>If the client has interests or hobbies, please provide details</label>
                        <textarea name="hobbies" class="form-control" placeholder="If the client has interests or hobbies, please provide details:">{{ $referral2->hobbies}}</textarea>
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Relevant Health and Community Services</b></h5>
                <h5 style="font-size: 16px;">If the client has a case manager</h5>

               <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Name</label>
                        <input type="text" name="case_name" class="form-control" value="{{ $referral2->case_name}}" placeholder="Name">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Organisation</label>
                        <input type="text" name="case_org" class="form-control" value="{{ $referral2->case_org}}" placeholder="Organisation">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Email ID</label>
                        <input type="email" name="case_email" class="form-control" value="{{ $referral2->case_email}}"  placeholder="Email ID">                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="case_ph" class="form-control" value="{{ $referral2->case_ph}}" placeholder="Phone">                                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      
                      <div class="col-md-12 mb-3">
                        <label>Address</label>
                        <textarea  style="width: 250px;" name="case_addr" class="form-control" placeholder="Address">{{ $referral2->case_addr}}</textarea>                                        
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <h5 style="font-size: 16px;">If the client currently accesses other services, please provide details</h5>

               <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Contact person</label>
                        <input type="text" name="serv_per" class="form-control" value="{{ $referral2->serv_per}}" placeholder="Contact person">                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Organisation</label>
                        <input type="text" name="serv_org" class="form-control" value="{{ $referral2->serv_org}}" placeholder="Organisation">                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label>Address</label>
                        <textarea name="serv_adr" class="form-control" placeholder="Address">{{ $referral2->serv_adr}}</textarea>                                        
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Email ID</label>
                        <input type="email" name="serv_email" class="form-control" value="{{ $referral2->serv_email}}"  placeholder="Email ID">                                        
                      </div>
                       <div class="col-md-4 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="serv_ph" class="form-control" value="{{ $referral2->serv_ph}}"  placeholder="Phone">                                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <h5 style="font-size: 16px;">If the client has been referred to additional services, please provide details:</h5>

               <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Contact person</label>
                        <input type="text" name="addserv_per" class="form-control" value="{{ $referral2->addserv_per}}" placeholder="Contact person">                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Organisation</label>
                        <input type="text" name="addserv_org" class="form-control" value="{{ $referral2->addserv_org}}" placeholder="Organisation">                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Email ID</label>
                        <input type="email" name="addserv_email" class="form-control" value="{{ $referral2->addserv_email}}" placeholder="Email ID">                                        
                      </div>
                       <div class="col-md-6 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="addserv_ph" class="form-control" value="{{ $referral2->addserv_ph}}" placeholder="Phone">                                       
                      </div>
                  
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                        <label>Address</label>
                        <textarea name="addserv_adr"  class="form-control" placeholder="Address">{{ $referral2->addserv_adr}}</textarea>                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label><b>Other relevant information/additional details</b></label>
                        <textarea  name="other_relev" class="form-control" placeholder="Other relevant information/additional deta ils">{{ $referral2->other_relev}}</textarea>                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Name:</label>
                        <input type="text" name="rel_name" id="rel_name
                        " class="form-control" value="{{ $referral2->rel_name}}" placeholder="Name:" >                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Position</label>
                        <input type="text" name="rel_pos" id="rel_pos" class="form-control" value="{{ $referral2->rel_pos}}" placeholder="Position" >                                        
                      </div>
                      
                      <div class="col-md-3 mb-3">
                        <label>Organisation</label>
                        <input type="text" name="rel_org" id="rel_org" class="form-control" value="{{ $referral2->rel_org}}" placeholder="Organisation" >                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Date</label>
                        <input type="date" name="rel_date" id="rel_date" class="form-control" value="{{ $referral2->rel_date}}" placeholder="Date" >
                                                              
                      </div>
                </div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <br><br>
                    
                    <!--<div class="form-group ">
                        <label>Upload Profile Photo</label>
                        <div class="col-md-7 col-sm-12 required">
                            <input type="file" name="profile_pic">                                       
                        </div>
                    </div>-->
                    <div class="box-footer text-right" style="padding-right:50px;">
                     <br><br>   <a class="btn btn-link text-left" href="{{ route('referrals.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check icon-white" aria-hidden="true"></i> Save</button>
                    </div>

                </div> <!-- ./box-body -->
                            <!-- col-md-8 -->

                </div><!-- ./row -->
     </form>
</div>
@stop

@section('moar_scripts')

<script>
$('#resi_name').change(function(){
    var id = $(this).val();
    var url = '{{ route("getRSADetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
               // $('#roomm').val(response.data.room_no);
               // $('#staffm').val(response.staff.stf_name);
                $('#guardianm').val(response.gr_name);
                $('#gtel').val(response.gr_lan);
                $('#gemail').val(response.gr_email);
                $('#gadress').val(response.gr_address);
                //$('#fperiod').val(response.books.b_from);
                //$('#endperiod').val(response.books.b_to);

            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script>
$('#resi_name').change(function(){
    var id = $(this).val();
    var url = '{{ route("getRSAclientDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#dob').val(response.dob);            
                $('#gender').val(response.gender);            
                $('#rel').val(response.religion);            

                $('#ph1').val(response.ph);            
                $('#em1').val(response.res_email);           
                 
                $('#adr').val(response.pre_address);           
                $('#medi1').val(response.medicard_no);           
                $('#mediexp').val(response.exp_date);           
                   

            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script>
$('#resi_name').change(function(){
    var id = $(this).val();
    var url = '{{ route("getGuaDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
               
              $('#gname').val(response.gr_name);
              $('#gph').val(response.gr_mob);
              $('#gadr').val(response.gr_address);
              $('#gemail').val(response.gr_email);


            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script>
$('#resi_name').change(function(){
    var id = $(this).val();
    var url = '{{ route("getRSAincomeDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#tof').val(response.income_type);   
                $('#taxi').val(response.con_card);            
                $('#ref').val(response.client_refno);            


            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script>
$('#resi_name').change(function(){
    var id = $(this).val();
    var url = '{{ route("getNokDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
             
                $('#nname').val((response.name));
                $('#nph').val((response.ph));
                $('#nadr').val((response.address));
                $('#nemail').val((response.nok_email));


            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script>
$('#resi_name').change(function(){
    var id = $(this).val();
    var url = '{{ route("getGPDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
             
                $('#gpname').val(response.gp_name);
                $('#gpph').val(response.ph);
                $('#gpfax').val(response.gp_fax);
                $('#gpadr').val(response.address);
                $('#gpemail').val(response.gp_email);


            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script>
$('#resi_name').change(function(){
    var id = $(this).val();
    var url = '{{ route("getRSAstaffDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#staffm').val(response.stf_name);            

            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script>
$('#resi_name').change(function(){
    var id = $(this).val();
    var url = '{{ route("getRSAincomeDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#pay_meth').val(response.income_type);            

            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script>
$('#resi_name').change(function(){
    var id = $(this).val();
    var url = '{{ route("getRSAbookDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
               

            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script type="text/javascript">
  function findselected11() { 

    var result = document.querySelector('input[name="med1"]:checked').value;
    if(result=="NO"){

        document.getElementById("f1").setAttribute('disabled', true);
    }
    else{
        document.getElementById("f1").removeAttribute('disabled', false);
    }
}
function findselected12() { 

    var result = document.querySelector('input[name="med2"]:checked').value;
    if(result=="NO"){

        document.getElementById("f2").setAttribute('disabled', true);
    }
    else{
        document.getElementById("f2").removeAttribute('disabled', false);
    }
}
function findselected13() { 

    var result = document.querySelector('input[name="med3"]:checked').value;
    if(result=="NO"){

        document.getElementById("f33").setAttribute('disabled', true);
    }
    else{
        document.getElementById("f33").removeAttribute('disabled', false);
    }
}
function findselected14() { 

    var result = document.querySelector('input[name="med4"]:checked').value;
    if(result=="NO"){

        document.getElementById("f4").setAttribute('disabled', true);
    }
    else{
        document.getElementById("f4").removeAttribute('disabled', false);
    }
}
function findselected15() { 

    var result = document.querySelector('input[name="med5"]:checked').value;
    if(result=="NO"){

        document.getElementById("f5").setAttribute('disabled', true);
    }
    else{
        document.getElementById("f5").removeAttribute('disabled', false);
    }
}
function findselected16() { 

    var result = document.querySelector('input[name="med6"]:checked').value;
    if(result=="NO"){

        document.getElementById("f66").setAttribute('disabled', true);
    }
    else{
        document.getElementById("f66").removeAttribute('disabled', false);
    }
}
function findselected17() { 

    var result = document.querySelector('input[name="med7"]:checked').value;
    if(result=="NO"){

        document.getElementById("f7").setAttribute('disabled', true);
    }
    else{
        document.getElementById("f7").removeAttribute('disabled', false);
    }
}
function findselected18() { 

    var result = document.querySelector('input[name="med8"]:checked').value;
    if(result=="NO"){

        document.getElementById("f8").setAttribute('disabled', true);
    }
    else{
        document.getElementById("f8").removeAttribute('disabled', false);
    }
}
function findselected19() { 

    var result = document.querySelector('input[name="med9"]:checked').value;
    if(result=="NO"){

        document.getElementById("f9").setAttribute('disabled', true);
    }
    else{
        document.getElementById("f9").removeAttribute('disabled', false);
    }
}
function findselected20() { 

    var result = document.querySelector('input[name="med10"]:checked').value;
    if(result=="NO"){

        document.getElementById("f10").setAttribute('disabled', true);
    }
    else{
        document.getElementById("f10").removeAttribute('disabled', false);
    }
}
function findselected21() { 

    var result = document.querySelector('input[name="med11"]:checked').value;
    if(result=="NO"){

        document.getElementById("f11").setAttribute('disabled', true);
    }
    else{
        document.getElementById("f11").removeAttribute('disabled', false);
    }
}
function findselected22() { 

    var result = document.querySelector('input[name="med12"]:checked').value;
    if(result=="NO"){

        document.getElementById("f12").setAttribute('disabled', true);
    }
    else{
        document.getElementById("f12").removeAttribute('disabled', false);
    }
}
function findselected23() { 

    var result = document.querySelector('input[name="med13"]:checked').value;
    if(result=="NO"){

        document.getElementById("f13").setAttribute('disabled', true);
    }
    else{
        document.getElementById("f13").removeAttribute('disabled', false);
    }
}
function findselected24() { 

    var result = document.querySelector('input[name="med14"]:checked').value;
    if(result=="NO"){

        document.getElementById("f14").setAttribute('disabled', true);
    }
    else{
        document.getElementById("f14").removeAttribute('disabled', false);
    }
}
function findselected25() { 

    var result = document.querySelector('input[name="med15"]:checked').value;
    if(result=="NO"){

        document.getElementById("f15").setAttribute('disabled', true);
    }
    else{
        document.getElementById("f15").removeAttribute('disabled', false);
    }
}
function findselected26() { 

    var result = document.querySelector('input[name="med16"]:checked').value;
    if(result=="NO"){

        document.getElementById("f16").setAttribute('disabled', true);
    }
    else{
        document.getElementById("f16").removeAttribute('disabled', false);
    }
}
function findselected27() { 

    var result = document.querySelector('input[name="med17"]:checked').value;
    if(result=="NO"){

        document.getElementById("f17").setAttribute('disabled', true);
    }
    else{
        document.getElementById("f17").removeAttribute('disabled', false);
    }
}
function findselected28() { 

    var result = document.querySelector('input[name="med18"]:checked').value;
    if(result=="NO"){

        document.getElementById("f18").setAttribute('disabled', true);
    }
    else{
        document.getElementById("f18").removeAttribute('disabled', false);
    }
}
</script>

@include ('partials.bootstrap-table')
@stop
