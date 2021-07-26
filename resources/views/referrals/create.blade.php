

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

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('referrals.store') }}" style="width: 1000px; align-items: center;   background-color: #fff; " autocomplete="off" role="form" enctype="multipart/form-data">
                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
               
                <div class="box-header with-border text-center">
                       <h3><b>Referral Form</b></h3>
                   
                </div>

                <h5 style="color:#980000;font-size: 16px;left: 90px;"><b><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PART A: for b client or client's representative (if applicable)</i></b></h5>
                <div class="box-body" style="padding-left: 50px;">    
                <h5 style="color:#980000;font-size: 16px;"><b>CONSENT TO RELEASE OF INFORMATION</b></h5>
                <div class="form-row">
                      <div class="col-md-4 mb-3">
                         <label>Name of person giving this consent</label>
                        <input type="text" name="con_name" id="con_name" class="form-control" placeholder="Name of person giving this consent">
                       </div>
                                                            
                      <div class="col-md-4 mb-3">
                        <label>Name of person being referred</label>
                        <input type="text" name="refer_name" id="refer_name" class="form-control" placeholder="Name of person being referred">                                        
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Date</label>
                        <input type="date" name="r_date" id="r_date" class="form-control" placeholder="Date">                                       
                      </div>
                      
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Representative Name</label>
                        <input type="text" name="rep_name" id="rep_name
                        " class="form-control" placeholder="Representative Name" >                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Relationship</label>
                        <input type="text" name="relation" id="relation" class="form-control" placeholder="Relationship" >                                        
                      </div>
                      
                      <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" >                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="ph" id="ph" class="form-control" placeholder="Phone" >
                                                              
                      </div>
                </div><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b><i>PART B: for completion by referrer</i></b></h5>
                <div class="form-row">
                      <div class="col-md-4 mb-3">
                         <label>Reason for Referral to SRS</label>
                        <textarea name="reason" class="form-control" placeholder="Reason for Referral to SRS"></textarea>
                       </div>
                                                            
                      <div class="col-md-4 mb-3">
                        <label>Referral of this client is appropriate ?</label>
                        <textarea name="appr_becoz" class="form-control" placeholder="I consider that referral of this client to the SRS is appropriate because"></textarea>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Date</label>
                        <input type="date" name="ref_date" class="form-control" placeholder="Date">                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Position</label>
                        <input type="text" name="ref_posi" class="form-control" placeholder="Position">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Agency</label>
                        <input type="text" name="ref_agency" class="form-control" placeholder="Agency">                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Email ID</label>
                        <input type="email" name="ref_email" class="form-control" placeholder="Email ID">                                       
                      </div>
                     
                      <div class="col-md-3 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="ref_ph" class="form-control" placeholder="Phone">
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Client  Details</b></h5>

                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Rsident Name</label>
                        <input type="text" name="cfname" class="form-control" placeholder="First Name">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Surname:</label>
                        <input type="text" name="csurname" class="form-control" placeholder="Surname:">                                        
                      </div>

                      <div class="col-md-3 mb-3">
                        <label>Date of Birth</label>
                        <input type="date" name="cdob" class="form-control" placeholder="Date of Birth">                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="cgender">Gender</label>&nbsp;&nbsp;&nbsp;
                          <input type="text" name="cgender" class="form-control" placeholder="Gender">
                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Religion</label>
                        <input type="text" name="creligion" class="form-control" placeholder="Religion">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Client Contact details: Mobile</label>
                        <input type="text" name="cph" class="form-control" placeholder="Client Contact details: Mobile">                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Email ID</label>
                        <input type="email" name="cemail" class="form-control" placeholder="Email ID">                                       
                      </div>
                     
                      <div class="col-md-3 mb-3">
                        <label>Current Address</label>
                        <textarea name="caddress" class="form-control" placeholder="Current Address"></textarea>
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <h5 style="color:#980000;font-size: 16px;">[If client is residing in another SRS]</h5>
                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Name of SRS</label>
                        <input type="text" name="csrs_name" class="form-control" placeholder="Name of SRS">                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="csrs_ph" class="form-control" placeholder="Phone">                                        
                      </div>
                </div>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;">[if the client has private health insurance]</h5>
                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Insurer</label>
                        <input type="text" name="csrs_insu" class="form-control" placeholder="Insurer">                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Ref. Number</label>
                        <input type="text" name="csrs_refno" class="form-control" placeholder="Ref. Number">                                        
                      </div>
                </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 


               <h5 style="color:#980000;font-size: 16px;"><b>Next of Kin Details</b></h5>

               <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="nok_name" class="form-control" placeholder="Name">                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Relation</label>
                        <input type="text" name="nok_relation" class="form-control" placeholder="Relation">                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Address</label>
                        <textarea name="nok_address" class="form-control" placeholder="Address"></textarea>                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="nok_email" class="form-control" placeholder="Email">                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="nok_ph" class="form-control" placeholder="Phone">                                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Medical Practitioner</b></h5>

               <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="gp_name" class="form-control" placeholder="Name">                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Address</label>
                        <textarea name="gp_address" class="form-control" placeholder="Address"></textarea>                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="gp_ph" class="form-control" placeholder="Phone">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Fax</label>
                        <input type="text" name="gp_fax" class="form-control" placeholder="Fax">                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="gp_email" class="form-control" placeholder="Email">                                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Guardian Details (if the ctient has guardian)</b></h5>

               <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Client Ref Number</label>
                        <input type="text" name="gua_refno" class="form-control" placeholder="Client Ref Number">                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="gua_name" class="form-control" placeholder="Name">                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Address</label>
                        <textarea name="gua_addr" class="form-control" placeholder="Address"></textarea>                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Email ID</label>
                        <input type="email" name="gua_email" class="form-control" placeholder="Email ID">                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="gua_ph" class="form-control" placeholder="Phone">                                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;">[If the client has an administrator]</h5>

               <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="ad_name" class="form-control" placeholder="Name">                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Client Ref Number</label>
                        <input type="text" name="ad_refno" class="form-control" placeholder="Client Ref Number">
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Address</label>
                        <textarea name="ad_addr" class="form-control" placeholder="Address"></textarea>                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Email ID</label>
                        <input type="email" name="ad_email" class="form-control" placeholder="Email ID">                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="ad_ph" class="form-control" placeholder="Phone">                                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Pension Details</b></h5>

                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Type of Income</label>
                        <input type="text" class="form-control" name="pen_type" placeholder="Type of Income">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Client Ref Number</label>
                        <input type="text" name="pen_refno" class="form-control" placeholder="Client Ref Number">                                          
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Medicare Number</label>
                        <input type="text" name="pen_medino" id="pen_medino
                        " class="form-control" placeholder="Medicare Number" >                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Expiry Date</label>
                        <input type="date" name="pen_mediexp" id="pen_mediexp" class="form-control" placeholder="Expiry Date" >                                        
                      </div>
                      
                      <div class="col-md-3 mb-3">
                        <label>Taxi Card Concession Number</label>
                        <input type="text" name="pen_taxi" id="pen_taxi" class="form-control" placeholder="Taxi Card Concession Number" >                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Expiry Date</label>
                        <input type="date" name="pen_taxiexp" id="pen_taxiexp" class="form-control" placeholder="Expiry Date" >
                                                              
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <h5 style="color:#980000;font-size: 16px;"><b>Medication.This information to be provided by client's health provider.</b></h5>
                <div class="form-row">
                  <div class="col-md-12 mb-3" >
                <table style="border: 2px; border-width: 1px; border-color: black; padding-left: 8px;left: 50px; padding: 10px;">
                  <tr style="padding:5px;">
                    <th>Drug name</th>
                    <th>Dose</th>
                    <th>Frequency</th>
                    <th>Duration</th>
                    <th>Last Taken</th>
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
                        <br><input type="radio"  id="r1"  onclick="findselected1();" value="Yes" name="c_medi">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" onclick="findselected1();" id="r1" value="No" name="c_medi">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>
                      <div class="col-md-6 mb-3">
                       <label>Is the client able to administer own medication?</label>
                        <br><input type="radio"  id="r1"  onclick="findselected1();" value="Yes" name="c_ownmedi">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" onclick="findselected1();" id="r1" value="No" name="c_ownmedi">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>
                    
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                <div class="form-row"> 
                      <div class="col-md-12 mb-3">
                        <label>Please specify any anticipated side effects of medication</label>
                        <textarea name="c_medisideeffect" class="form-control" placeholder="Please specify any anticipated side effects of medication"></textarea>
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <h5 style="color:#980000;font-size: 16px;"><b>Physical Status</b></h5>
                    <div class="form-row">
                       <div class="col-md-12 mb-3">
                        <label>Please list any pre-existing medical conditions or allergies</label>
                        <textarea name="ph_status" class="form-control" placeholder="Please list any pre-existing medical conditions or allergies"></textarea>                                        
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <h5 style="color:#980000;font-size: 16px;"><b>Cognitive Status</b></h5>
                    <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>Please list any cognitive issues to which SRS staff need to be alerted, e.g. orientation to time and place; independence in decision making; memory impairment; other.</label>
                         <textarea name="cogi_status" class="form-control" placeholder="Please list any cognitive issues to which SRS staff need to be alerted, e.g. orientation to time and place; independence in decision making; memory impairment; other."></textarea>                                       
                      </div>
                       
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Disability</b></h5>
                <h6 style="color:#980000;font-size: 16px;">[If the client is registered with Disability Services (DHS)]</h6>

               <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>Primary Disability</label>
                        <input type="text" name="dis_primary" class="form-control" placeholder="Primary Disability">                                   
                      </div>
                </div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Case Manager</label>
                        <input type="text" name="dis_casemngr" class="form-control" placeholder="Case Manager">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Organisation</label>
                        <input type="text" name="dis_org" class="form-control" placeholder="Organisation">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="dis_email" class="form-control" placeholder="Email">                                       
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="dis_ph" class="form-control" placeholder="Phone">                                       
                      </div>
                       
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Mental Health Sfafus</b></h5>

               <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>Please specify any mental health issues to which staff needs to be alerted</label>
                        <input type="text" name="ment_status" class="form-control" placeholder="Please specify any mental health issues to which staff needs to be alerted">                                   
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Case Manager</label>
                        <input type="text" name="ment_casemngr" class="form-control" placeholder="Case Manager">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Organisation</label>
                        <input type="text" name="ment_org" class="form-control" placeholder="Organisation">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="ment_email" class="form-control" placeholder="Email">                                       
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="ment_ph" class="form-control" placeholder="Phone">                                       
                      </div>
                       
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>Behaviour List any behaviour Self-harm</label><br>
                            <label><input  type="checkbox" name="behav_harm" value="Smoking"> Smoking</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="behav_harm" value="Self-Motivation"> Self-Motivation</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="behav_harm" value="Capacity for cooperation"> Capacity for cooperation</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="behav_harm" value="Physical aggression"> Physical aggression</label>&nbsp;&nbsp;  
                                <label><input  type="checkbox" name="behav_harm" value="Wandering"> Wandering</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="behav_harm" value="Capacity to share"> Capacity to share</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="behav_harm" value="Capacity to socialise"> Capacity to socialise</label>&nbsp;&nbsp; 
                                <label><input  type="checkbox" name="behav_harm" value="Verbal aggression"> Verbal aggression</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="behav_harm" value="Drug/alcohol"> Drug/alcohol</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="behav_harm" value="Impulse control"> Impulse control</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="behav_harm" value="Other"> Other</label>&nbsp;&nbsp;<br>       
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                
                <div class="form-row">
                      <div class="col-md-12 mb-3">

                        <label>Details</label>
                        <textarea name="behav_details" class="form-control" placeholder="Details"></textarea>                                      
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>List any known "triggers" for problem behaviour</label>
                        <textarea name="triger" class="form-control" placeholder="List any known triggers for problem behaviour"></textarea>                                       
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
                    <input type="checkbox" name="med1" onclick="findselected5();" value="YES" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med1" onclick="findselected5();" value="NO" /></td>
                  <td><input type="text" id="f7" name="med1_det" style="height:70px;"></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Have you recently had problems with your teeth, mouth, gums or dentures?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med2" onclick="findselected5();" value="YES" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med2" onclick="findselected5();" value="NO" /></td>
                  <td><input type="text" id="f7" name="med2_det"></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Are you concerned about your medications?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med3" onclick="findselected5();" value="YES" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med3" onclick="findselected5();" value="NO" /></td>
                  <td><input type="text" id="f7" name="med3_det"></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Are you concerned about your lack of physical activity?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med4" onclick="findselected5();" value="YES" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med4" onclick="findselected5();" value="NO" /></td>
                  <td><input type="text" id="f7" name="med4_det"></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Are you concerned about your weight?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med5" onclick="findselected5();" value="YES" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med5" onclick="findselected5();" value="NO" /></td>
                  <td><input type="text" id="f7" name="med5_det"></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Have you recently lost weight without trying?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med6" onclick="findselected5();" value="YES" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med6" onclick="findselected5();" value="NO" /></td>
                  <td><input type="text" id="f7" name="med6_det"></td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Do currently smoke tobacco?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med7" onclick="findselected5();" value="YES" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med7" onclick="findselected5();" value="NO" /></td>
                  <td><input type="text" id="f7" name="med7_det"></td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Have you quit smoking tobacco in the last 5 years?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med8" onclick="findselected5();" value="YES" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med8" onclick="findselected5();" value="NO" /></td>
                  <td><input type="text" id="f7" name="med8_det"></td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>Are you concerned about how much alcohol you drink?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med9" onclick="findselected5();" value="YES" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med9" onclick="findselected5();" value="NO" /></td>
                  <td><input type="text" id="f7" name="med9_det"></td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>Are you concerned about your use of drugs?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med10" onclick="findselected5();" value="YES" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med10" onclick="findselected5();" value="NO" /></td>
                  <td><input type="text" id="f7" name="med10_det"></td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>Are you concerned about your gambling?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med11" onclick="findselected5();" value="YES" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med11" onclick="findselected5();" value="NO" /></td>
                  <td><input type="text" id="f7" name="med11_det"></td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>Is your financial situation very difficult?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med12" onclick="findselected5();" value="YES" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med12" onclick="findselected5();" value="NO" /></td>
                  <td><input type="text" id="f7" name="med12_det"></td>
                </tr>
                <tr>
                  <td>13</td>
                  <td>Do you often feel sad or depressed?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med13" onclick="findselected5();" value="YES" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med13" onclick="findselected5();" value="NO" /></td>
                  <td><input type="text" id="f7" name="med13_det"></td>
                </tr>
                <tr>
                  <td>14</td>
                  <td>Do you often feel nervous or anxious?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med14" onclick="findselected5();" value="YES" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med14" onclick="findselected5();" value="NO" /></td>
                  <td><input type="text" id="f7" name="med14_det"></td>
                </tr>
                <tr>
                  <td>15</td>
                  <td>Have you felt afraid of someone who controls or hurts you?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med15" onclick="findselected5();" value="YES" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med15" onclick="findselected5();" value="NO" /></td>
                  <td><input type="text" id="f7" name="med315det"></td>
                </tr>
                <tr>
                  <td>16</td>
                  <td>Are you homeless or at risk of homelessness?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med16" onclick="findselected5();" value="YES" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med16" onclick="findselected5();" value="NO" /></td>
                  <td><input type="text" id="f7" name="med16_det"></td>
                </tr>
                <tr>
                  <td>17</td>
                  <td>Would you rate your health as poor?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med17" onclick="findselected5();" value="YES" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med17" onclick="findselected5();" value="NO" /></td>
                  <td><input type="text" id="f7" name="med17_det"></td>
                </tr>
                <tr>
                  <td>18</td>
                  <td>Would you rate your life circumstances as poor?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med18" onclick="findselected5();" value="YES" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="med18" onclick="findselected5();" value="NO" /></td>
                  <td><input type="text" id="f7" name="med18_det"></td>
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
                    <input type="checkbox" name="p1" onclick="findselected5();" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p1" onclick="findselected5();" value="Prompting/Supervision" /></td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p1" onclick="findselected5();" value="Active Assistance" /></td>
                </tr>
                <tr>
                  <td>Mobility</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p2" onclick="findselected5();" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p2" onclick="findselected5();" value="Prompting/Supervision" /></td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p2" onclick="findselected5();" value="Active Assistance" /></td>
                </tr>
                <tr>
                  <td>Showering/bathing</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p3" onclick="findselected5();" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p3" onclick="findselected5();" value="Prompting/Supervision" /></td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p3" onclick="findselected5();" value="Active Assistance" /></td>
                </tr>
                <tr>
                  <td>Shaving/grooming</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p4" onclick="findselected5();" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p4" onclick="findselected5();" value="Prompting/Supervision" /></td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p4" onclick="findselected5();" value="Active Assistance" /></td>
                </tr>
                <tr>
                  <td>Dressing</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="5" onclick="findselected5();" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="5" onclick="findselected5();" value="Prompting/Supervision" /></td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="5" onclick="findselected5();" value="Active Assistance" /></td>
                </tr>
                <tr>
                  <td>Dental hygiene</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p6" onclick="findselected5();" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p6" onclick="findselected5();" value="Prompting/Supervision" /></td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p6" onclick="findselected5();" value="Active Assistance" /></td>
                </tr>
                <tr>
                  <td>Toileting</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p7" onclick="findselected5();" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p7" onclick="findselected5();" value="Prompting/Supervision" /></td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p7" onclick="findselected5();" value="Active Assistance" /></td>
                </tr>
                <tr>
                  <td>Foot care/nail care</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p8" onclick="findselected5();" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p8" onclick="findselected5();" value="Prompting/Supervision" /></td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p8" onclick="findselected5();" value="Active Assistance" /></td>
                </tr>
                <tr>
                  <td>Laundry</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p9" onclick="findselected5();" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p9" onclick="findselected5();" value="Prompting/Supervision" /></td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p9" onclick="findselected5();" value="Active Assistance" /></td>
                </tr>
                <tr>
                  <td>Housekeeping</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p10" onclick="findselected5();" value="No Assistance" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p10" onclick="findselected5();" value="Prompting/Supervision" /></td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="p10" onclick="findselected5();" value="Active Assistance" /></td>
                </tr>
                </table>
              </div>
            </div>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <h5 style="color:#980000;font-size: 16px;"><b>Aids and Appliances</b></h5>
          <h5 style="font-size: 16px;">Does client use any aids or appliances?</h5>

                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Mobility</label><br>
                            <label><input  type="checkbox" name="a1" value="Stick"> Stick</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="a1" value="Frame"> Frame</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="a1" value="Wheelchair"> Wheelchair</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="a1" value="Other"> Other</label>&nbsp;&nbsp;   <br>       
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Communication</label><br>
                            <label><input  type="checkbox" name="a2" value="Glasses"> Glasses</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="a2" value="Hearing Aid"> Hearing Aid</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="a2" value="Interpreter"> Interpreter</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="a2" value="Other"> Other</label>&nbsp;&nbsp;   <br>       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      
                </div>
                <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>Comments</label>
                        <textarea name="a_comments" class="form-control" placeholder="Comments"></textarea>
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Community Livi ng Skills</b></h5>
                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Is the client able to access public transport?</label><br>
                            <label><input  type="checkbox" name="public_trans" value="Yes"> Yes</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="public_trans" value="No"> No</label>&nbsp;&nbsp;
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Is the client able to make and keep appointments?</label><br>
                            <label><input  type="checkbox" name="app_keep" value="Yes"> Yes</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="app_keep" value="No"> No</label>&nbsp;&nbsp;
                      </div>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <h5 style="color:#980000;font-size: 16px;"><b>Recreation/ Socialization</b></h5>
                <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>If the client attends any community based social activities, please provide details</label>
                        <textarea name="social_activity" class="form-control" placeholder="If the client attends any community based social activities, please provide details"></textarea>
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>If the client has interests or hobbies, please provide details</label>
                        <textarea name="hobbies" class="form-control" placeholder="If the client has interests or hobbies, please provide details:"></textarea>
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Relevant Health and Community Services</b></h5>
                <h5 style="font-size: 16px;">If the client has a case manager</h5>

               <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Name</label>
                        <input type="text" name="case_name" class="form-control" placeholder="Name">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Organisation</label>
                        <input type="text" name="case_org" class="form-control" placeholder="Organisation">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Email ID</label>
                        <input type="email" name="case_email" class="form-control" placeholder="Email ID">                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="case_ph" class="form-control" placeholder="Phone">                                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      
                      <div class="col-md-12 mb-3">
                        <label>Address</label>
                        <textarea  style="width: 250px;" name="case_addr" class="form-control" placeholder="Address"></textarea>                                        
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <h5 style="font-size: 16px;">If the client currently accesses other services, please provide details</h5>

               <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Contact person</label>
                        <input type="text" name="serv_per" class="form-control" placeholder="Contact person">                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Organisation</label>
                        <input type="text" name="serv_org" class="form-control" placeholder="Organisation">                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>Address</label>
                        <textarea name="serv_adr" style="width: 250px;" class="form-control" placeholder="Address"></textarea>                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Email ID</label>
                        <input type="email" name="serv_email" class="form-control" placeholder="Email ID">                                        
                      </div>
                       <div class="col-md-6 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="serv_ph" class="form-control" placeholder="Phone">                                       
                      </div>
                  
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="font-size: 16px;">If the client has been referred to additional services, please provide details:</h5>

               <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Contact person</label>
                        <input type="text" name="addserv_per" class="form-control" placeholder="Contact person">                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Organisation</label>
                        <input type="text" name="addserv_org" class="form-control" placeholder="Organisation">                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>Address</label>
                        <textarea name="addserv_adr" style="width: 250px;" class="form-control" placeholder="Address"></textarea>                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Email ID</label>
                        <input type="email" name="addserv_email" class="form-control" placeholder="Email ID">                                        
                      </div>
                       <div class="col-md-6 mb-3">
                        <label>Phone</label>
                        <input type="tel" name="addserv_ph" class="form-control" placeholder="Phone">                                       
                      </div>
                  
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label><b>Other relevant information/additional details</b></label>
                        <textarea style="width: 250px;" name="other_relev" class="form-control" placeholder="Other relevant information/additional deta ils"></textarea>                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Name:</label>
                        <input type="text" name="rel_name" id="rel_name
                        " class="form-control" placeholder="Name:" >                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Position</label>
                        <input type="text" name="rel_pos" id="rel_pos" class="form-control" placeholder="Position" >                                        
                      </div>
                      
                      <div class="col-md-3 mb-3">
                        <label>Organisation</label>
                        <input type="text" name="rel_org" id="rel_org" class="form-control" placeholder="Organisation" >                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Date</label>
                        <input type="date" name="rel_date" id="rel_date" class="form-control" placeholder="Date" >
                                                              
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
                $('#roomm').val(response.room_no);            
                 $('#fperiod').val(response.start_period);
                $('#endperiod').val(response.end_period);
                $('#adm_date').val(response.adm_date);           
                   

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
  function onlyOne(checkbox) {
    var checkboxes = document.getElementsByName('bath')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}
</script>
<script type="text/javascript">
  $('input[type="checkbox"]').on('change', function() {
    $('input[name="' + this.name + '"]').not(this).prop('checked', false);
});
</script>
<script type="text/javascript">
 function findselected() { 
    var result = document.querySelector('input[name="secu_depo"]:checked').value;
    if(result=="No"){

        document.getElementById("amt_pay").setAttribute('disabled', false);
    }
    else{
        document.getElementById("amt_pay").removeAttribute('disabled', true);
    }
}
function findselected1() { 
    var result = document.querySelector('input[name="reserv_fee"]:checked').value;
    if(result=="No"){

        document.getElementById("r2").setAttribute('disabled', false);
    }
    else{
        document.getElementById("r2").removeAttribute('disabled', true);
    }
}
function findselected2() { 
    var result = document.querySelector('input[name="est_fee"]:checked').value;
    if(result=="No"){

        document.getElementById("e2").setAttribute('disabled', false);
    }
    else{
        document.getElementById("e2").removeAttribute('disabled', true);
    }
}
function findselected3() { 
    var result = document.querySelector('input[name="advnc_fee"]:checked').value;
    if(result=="No"){

        document.getElementById("a2").setAttribute('disabled', false);
    }
    else{
        document.getElementById("a2").removeAttribute('disabled', true);
    }
}
function findselected4() { 
    var result = document.querySelector('input[name="srs_assist_status"]:checked').value;
    if(result=="No"){

        document.getElementById("s1").setAttribute('disabled', false);
    }
    else{
        document.getElementById("s1").removeAttribute('disabled', true);
    }
}
function findselected5() { 
    var result = document.querySelector('input[name="bath"]:checked').value;
    if(result=="None"){

        document.getElementById("f1").setAttribute('disabled', false);
    }
    else{
        document.getElementById("f1").removeAttribute('disabled', true);
    }
  }
function findselected6() { 

    var result = document.querySelector('input[name="oral"]:checked').value;
    if(result=="None"){

        document.getElementById("f2").setAttribute('disabled', false);
    }
    else{
        document.getElementById("f2").removeAttribute('disabled', true);
    }
  }
function findselected7() { 

    var result = document.querySelector('input[name="hair"]:checked').value;
    if(result=="None"){

        document.getElementById("f3").setAttribute('disabled', false);
    }
    else{
        document.getElementById("f3").removeAttribute('disabled', true);
    }
}
function findselected8() { 

    var result = document.querySelector('input[name="toileting"]:checked').value;
    if(result=="None"){

        document.getElementById("f4").setAttribute('disabled', false);
    }
    else{
        document.getElementById("f4").removeAttribute('disabled', true);
    }
}
function findselected9() { 

    var result = document.querySelector('input[name="mobility"]:checked').value;
    if(result=="None"){

        document.getElementById("f5").setAttribute('disabled', false);
    }
    else{
        document.getElementById("f5").removeAttribute('disabled', true);
    }
}
function findselected10() { 

    var result = document.querySelector('input[name="medi_assi"]:checked').value;
    if(result=="None"){

        document.getElementById("f6").setAttribute('disabled', false);
    }
    else{
        document.getElementById("f6").removeAttribute('disabled', true);
    }
}
function findselected11() { 

    var result = document.querySelector('input[name="continence"]:checked').value;
    if(result=="None"){

        document.getElementById("f7").setAttribute('disabled', false);
    }
    else{
        document.getElementById("f7").removeAttribute('disabled', true);
    }
}
function findselected12() { 

    var result = document.querySelector('input[name="bed_make"]:checked').value;
    if(result=="None"){

        document.getElementById("f8").setAttribute('disabled', false);
    }
    else{
        document.getElementById("f8").removeAttribute('disabled', true);
    }
}
function findselected13() { 

    var result = document.querySelector('input[name="dressing"]:checked').value;
    if(result=="None"){

        document.getElementById("f9").setAttribute('disabled', false);
    }
    else{
        document.getElementById("f9").removeAttribute('disabled', true);
    }
}
</script>
@include ('partials.bootstrap-table')
@stop
