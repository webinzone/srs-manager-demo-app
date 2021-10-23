@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
    @can('create', \App\Models\ResidentAgreement::class)
        <a href="{{ route('resident_agreements.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

@section('inputFields')

{{-- Page content --}}
@section('content')
<style type="text/css">
  table, td, th {
    border: 1px solid black;
    align-items: center;
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

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('resident_agreements.store') }}" style="width: 1000px; align-items: center;   background-color: #fff; " autocomplete="off" role="form" enctype="multipart/form-data">
                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
               
                <div class="box-header with-border text-center">
                       <h3><b>New Resident Agreement Form</b></h3>
                   
                </div>
                <div class="box-body" style="padding-left: 50px;">    
                <h5 style="color:#980000;font-size: 16px;"><b>Resident Details</b></h5>
                <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label>Resident Name</label>
                        <select class="form-control" required="" id="resi_name" name="r_name" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Resident Name  --</option>
                          @foreach($residents as $resident)
                          <option value="{{ $resident->id }}"> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach
                        </select>
                       </div>
                                                            
                      <div class="col-md-2 mb-3">
                        <label>Room No</label>
                        <input type="text" name="room_no" id="roomm" class="form-control" placeholder="Room No" readonly>                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Need assistance  in reading ?</label>
                        <br><input type="radio"  id="asistance_status"  value="Yes" name="asistance_status">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="asistance_status" value="No" name="asistance_status">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Staff</label>
                        <input type="text" name="staff" id="staffm" class="form-control" placeholder="Staff" readonly>                                        
                      </div>
                      
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Guardian Details</b></h5>

                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Guardian</label>
                        <input type="text" name="guardian" id="guardianm" class="form-control" placeholder="Guardian" readonly>                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Phone No.</label>
                        <input type="tel" name="g_tel" id="gtel" class="form-control" placeholder="Phone No." readonly>                                        
                      </div>
                      
                      <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="g_email" id="gemail" class="form-control" placeholder="Email" readonly>                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Address</label>
                        <textarea name="g_adress"  readonly class="form-control" id="gadress" placeholder="Address"></textarea>
                                                              
                      </div>
                </div>
                <h5 style="color:#980000;font-size: 16px;"><b>NOK/Nomini Details</b></h5>
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Person Nominated</label>
                        <input type="text" name="p_nomini" class="form-control" placeholder="Person Nominated">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Phone No.</label>
                        <input type="tel" name="per_tel" class="form-control" placeholder="Phone No.">                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="per_email" class="form-control" placeholder="Email">                                       
                      </div>
                     
                      <div class="col-md-3 mb-3">
                        <label>Address</label>
                        <textarea name="per_address" class="form-control" placeholder="Address"></textarea>
                      </div>
                </div>
                <h5 style="color:#980000;font-size: 16px;"><b>Emergency Contact Details</b></h5>

                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Emergency Contact</label>
                        <input type="text" name="emg_contact" class="form-control" placeholder="Emergency Contact">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Phone No.</label>
                        <input type="tel" name="emg_tel" class="form-control" placeholder="Phone No.">                                        
                      </div>

                      <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="emg_email" class="form-control" placeholder="Email">                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Address</label>
                        <textarea  name="emg_address" class="form-control" placeholder="Address"></textarea>
                       
                      </div>
                </div>
                <h5 style="color:#980000;font-size: 16px;"><b>Finance Administrator/State Trustees</b></h5>
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Name</label>
                        <input type="text" name="adm_name" class="form-control" placeholder="Name">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="adm_em" class="form-control" placeholder="Email">                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Phone No.</label>
                        <input type="tel" name="adm_ph" class="form-control" placeholder="Phone No.">                                        
                      </div>
                     
                      <div class="col-md-3 mb-3">
                        <label>Address</label>
                        <textarea name="adm_adr" class="form-control" placeholder="Address"></textarea>
                      </div>
                </div>
               <h5 style="color:#980000;font-size: 16px;"><b>Duration Of Stay</b></h5>

                <div class="form-row">
                      <!--<div class="col-md-4 mb-3">
                        <label>Indefinite period of stay from</label>
                        <input type="date" name="i_period" class="form-control" placeholder="Indefinite period of stay form">                                        
                      </div>-->
                      
                      <div class="col-md-3 mb-3">
                        <label>Fixed period stay from</label>
                        <input type="date" style="width: 200px;" name="f_period" readonly id="fperiod" class="form-control" placeholder="Fixed period stay form">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Ending on</label>
                        <input type="date" style="width: 200px;" name="ending_on"  readonly id="endperiod" class="form-control" placeholder="Ending on">                                       
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Admission Date</label>
                        <input type="date" style="width: 200px;" name="adm_date" readonly id="adm_date" class="form-control" placeholder="Ending on">                                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                   <div class="col-md-3 mb-3">
                       <label for="st_typ">Respite/permanent</label>
                       <select name="st_typ" id="st_typ" class="form-control" style="height: 26px;padding: 3px 10px;"> 
                            <option value="Respite" style="font-size: 14px;">Respite</option> 
                            <option value="Permanent" style="font-size: 14px;">Permanent</option> 
                        </select>                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Start Date</label>
                        <input type="date" style="width: 200px;" name="st_sdt"  readonly id="st_sdt" class="form-control" placeholder="Start Date">                                       
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>End Date</label>
                        <input type="date" style="width: 200px;" name="st_edt" readonly id="st_edt" class="form-control" placeholder="End Date">                                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Fee And Charges</b></h5>

                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Accommodation & personal support Fee</label>
                        <input type="text" name="acc_fee" class="form-control" placeholder="Fee for accommodation and personal support">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Frequency of payment</label><br>
                            <label><input  type="checkbox" name="freq_pay" value="Weekly"> Weekly</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="freq_pay" value="Fortnightly"> Fortnightly</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="freq_pay" value="Every Calender Month"> Every Calender Month</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="freq_pay" value="Other"> Other</label>&nbsp;&nbsp;   <br>       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Any rent paid in advance</label><br>
                        

                            <label><input  type="checkbox" name="any_rent_adv" value="Weekly"> Weekly</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="any_rent_adv" value="Fortnightly"> Fortnightly</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="any_rent_adv" value="Every Calender Month"> Every Calender Month</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="any_rent_adv" value="Other"> Other</label>&nbsp;&nbsp;<br>                                          
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>How to pay</label>
                        <input type="text" name="pay_method" class="form-control" placeholder="Payment Method" id="pay_meth" readonly>
                                                               
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <br><h5 style="color:#980000;font-size: 16px;"><b>Other Fee & Charges</b></h5>
 
                
                <div class="form-row" style="top: 10px;">
                      <div class="col-md-4 mb-3">
                        <label>Security deposite charged ?</label>
                        <br><input type="radio" onclick="findselected();" id="secu_depo"  value="Yes" name="secu_depo">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" onclick="findselected();" id="secu_depo" value="No" name="secu_depo">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp; 
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Amount Payable</label>
                        <input type="text" name="amt_pay" id="amt_pay" class="form-control" placeholder="Amount Payable" disabled>                                        
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Condition report provided to the resident ?</label>
                        <br><input required type="radio"  id="condition_rep"  value="Yes" name="condition_rep">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" required="" id="condition_rep" value="No" name="condition_rep">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>Furniture in resident's room belonging to the SRS</label>
                        
                        <textarea name="pers_prop" class="form-control" placeholder="Furniture in resident's room belonging to thr SRS"></textarea>                                        
                      </div>
                    
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                <div class="form-row">
                      
                      <div class="col-md-3 mb-3">
                        <label>Reservation fee charged ?</label>
                        <br><input type="radio"  id="r1"  onclick="findselected1();" value="Yes" name="reserv_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" onclick="findselected1();" id="r1" value="No" name="reserv_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                      </div>
                      <div class="col-md-3 mb-3">

                        <label>Reservation Amount</label>
                        <input type="text" id="r2" name="amt_res" class="form-control" placeholder="Amount" disabled>                                       
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Establishment fee charged ?</label>
                        <br><input type="radio"  id="e1" onclick="findselected2();" value="Yes" name="est_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="e1" onclick="findselected2();" value="No" name="est_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>
                      <div class="col-md-3 mb-3">

                        <label>Establishment Amount</label>
                        <input type="text" id="e2" name="amt_est" class="form-control" placeholder="Amount" disabled>                                       
                      </div>
                       
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                
                <div class="form-row">
                      <div class="col-md-6 mb-3">

                        <label>Fee in advance charged for other items/service provide by SRS ?</label>
                        <br><input type="radio" onclick="findselected3();" id="a1"  value="Yes" name="advnc_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="a1" onclick="findselected3();" value="No" name="advnc_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                      
                      </div>
                        <div class="col-md-3 mb-3">

                        <label>Advance Amount</label>
                        <input type="text" name="amt_adv" id="a2" class="form-control" placeholder="Amount" disabled>                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Refund to resident</label>
                        <input type="text" name="refund" class="form-control" placeholder="Refund to resident">                                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Management Of Resident's Money</b></h5>

                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Will the SRS assist the resident in managing their finances ?</label>
                        <br><input type="radio" onclick="findselected4();" id="srs_assist_status"  value="Yes" name="srs_assist_status">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" onclick="findselected4();" id="srs_assist_status" value="No" name="srs_assist_status">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                       
                      </div>
                       <div class="col-md-6 mb-3" >
                        <label>Ammount to be managed</label>
                        <input type="text" id="s1" style="width:200px" name="assist_amnt" class="form-control" placeholder="Ammount to be managed" disabled>                                        
                      </div>
                </div>


                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Personal and Special Support Services</b></h5>
                <div class="form-row">
                  <div class="col-md-12 mb-3" >
                <table style="border: 2px; border-width: 1px; border-color: black; padding-left: 8px;left: 50px;">
                  <tr style="padding:5px;">
                    <th>Type of Support</th>
                    <th colspan="3">Level of assistance offered</th>
                    <th>Included in fee</th>
                  </tr>
                  <tr>
                    <td></td>
                    <td>&nbsp;&nbsp;&nbsp;   <b>Full</b></td>
                    <td>&nbsp;&nbsp;&nbsp;   <b>Part</b></td>
                    <td>&nbsp;&nbsp;&nbsp;   <b>None</b></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Bathing and showering</td>
                    <td> &nbsp;&nbsp;&nbsp;   
                     <input type="checkbox" name="bath" onclick="findselected5();" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;      
                     <input type="checkbox" name="bath" onclick="findselected5();" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;      
                     <input type="checkbox" name="bath" onclick="findselected5();" value="None" />    
                    </td>
                    <td><input type="text" id="f1" name="bath_fee"></td>
                  </tr>
                  <tr>
                    <td>Oral Support</td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="oral" onclick="findselected6();" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="oral" onclick="findselected6();" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="oral" onclick="findselected6();" value="None" />    
                    </td>
                    <td><input type="text" id="f2" name="oral_fee"></td>
                  </tr>
                  <tr>
                    <td>Hair and nails</td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="hair" onclick="findselected7();" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="hair" onclick="findselected7();" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="hair" onclick="findselected7();" value="None" />    
                    </td>
                    <td><input type="text" id="f3" name="hair_fee"></td>
                  </tr>
                  <tr>
                    <td>Toileting</td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="toileting" onclick="findselected8();" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="toileting" onclick="findselected8();" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="toileting" onclick="findselected8();" value="None" />    
                    </td>
                    <td><input type="text" id="f4" name="toileting_fee"></td>
                  </tr>
                  <tr>
                    <td>Mobility</td>
                    <td>  &nbsp;&nbsp;&nbsp;      
                     <input type="checkbox" name="mobility" onclick="findselected9();" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;      
                     <input type="checkbox" name="mobility" onclick="findselected9();" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;      
                     <input type="checkbox" name="mobility" onclick="findselected9();" value="None" />    
                    </td>
                    <td><input type="text" id="f5" name="mobility_fee"></td>
                  </tr>
                  <tr>
                    <td>Assistance with medication</td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="medi_assi" onclick="findselected10();" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="medi_assi" onclick="findselected10();" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="medi_assi" onclick="findselected10();" value="None" />    
                    </td>
                    <td><input type="text" id="f6" name="medi_assi_fee"></td>
                  </tr>
                  <tr>
                    <td>Continence management</td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="continence" onclick="findselected11();" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="continence"onclick="findselected11();" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="continence"onclick="findselected11();" value="None" />    
                    </td>
                    <td><input type="text" id="f7" name="continence_fee"></td>
                  </tr>
                  <tr>
                    <td>Bed making</td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="bed_make" onclick="findselected12();" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="bed_make" onclick="findselected12();" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="bed_make" onclick="findselected12();" value="None" />    
                    </td>
                    <td><input type="text" id="f8" name="bed_make_fee"></td>
                  </tr>
                  <tr>
                    <td>Dressing</td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" name="dressing" onclick="findselected13();" value="Full" />    
                    </td>
                     <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" name="dressing" onclick="findselected13();" value="Part" />    
                    </td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" name="dressing" onclick="findselected13();" value="None" />    
                    </td>
                    <td><input type="text" id="f9" name="dressing_fee"></td>
                  </tr>
                  <tr>
                    <td>Room Cleaning</td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="room_cl" onclick="findselected14();" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="room_cl" onclick="findselected14();" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="room_cl" onclick="findselected14();" value="None" />    
                    </td>
                    <td><input type="text" id="f10" name="room_det"></td>
                  </tr>
                  <tr>
                    <td>Transport Assistance-Details</td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" name="tr_assi" onclick="findselected15();" value="Full" />    
                    </td>
                     <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" name="tr_assi" onclick="findselected15();" value="Part" />    
                    </td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" name="tr_assi" onclick="findselected15();" value="None" />    
                    </td>
                    <td><input type="text" id="f11" name="tr_det"></td>
                  </tr>
                  <tr>
                    <td>Eating</td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" name="eating" onclick="findselected16();" value="Full" />    
                    </td>
                     <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" name="eating" onclick="findselected16();" value="Part" />    
                    </td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" name="eating" onclick="findselected16();" value="None" />    
                    </td>
                    <td><input type="text" id="f12" name="eat_det"></td>
                  </tr>
                  <tr>
                    <td>Laundry</td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" name="laundry" onclick="findselected17();" value="Full" />    
                    </td>
                     <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" name="laundry" onclick="findselected17();" value="Part" />    
                    </td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" name="laundry" onclick="findselected17();" value="None" />    
                    </td>
                    <td><input type="text" id="f13" name="laundry_det"></td>
                  </tr>
                  <tr>
                    <td>Other services required</td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" name="other" onclick="findselected18();" value="Full" />    
                    </td>
                     <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" name="other" onclick="findselected18();" value="Part" />    
                    </td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" name="other" onclick="findselected18();" value="None" />    
                    </td>
                    <td><input type="text" id="f14" name="other_det"></td>
                  </tr><br>
                </table>

                <h5 style="color:#980000;font-size: 16px;"><b>Proprietor/ Manager</b></h5>

                <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label>Name</label>
                        <input type="text" name="pr_name" id="pr_name" class="form-control" placeholder="Name" >                                       
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Witness</label>
                        <input type="text" name="pr_wit" id="pr_wit" class="form-control" placeholder="Witness" >                                        
                      </div>
                      
                      <div class="col-md-4 mb-3">
                        <label>Date</label>
                        <input type="date" name="pr_date" id="pr_date" class="form-control" placeholder="Date" >                                       
                      </div>
                </div>
                <h5 style="color:#980000;font-size: 16px;"><b>Resident</b></h5>

                <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label>Name</label>
                        <input type="text" name="re_name" id="re_name" class="form-control" placeholder="Name" >                                       
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Witness</label>
                        <input type="text" name="re_wt" id="re_wt" class="form-control" placeholder="Witness" >                                        
                      </div>
                      
                      <div class="col-md-4 mb-3">
                        <label>Date</label>
                        <input type="date" name="re_date" id="re_date" class="form-control" placeholder="Date" >                                       
                      </div>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <br><br>
                <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label>This agreement starts on</label>
                        <input type="date" name="st_dt" id="st_dt" class="form-control" placeholder="This agreement starts on" >                                       
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>This agreement ends on</label>
                        <input type="date" name="ed_dt" id="ed_dt" class="form-control" placeholder="This agreement ends on" >                                       
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>PL check if notified to Accounts?</label>
                        <br><input type="radio"  id="not_acc"  value="Yes" name="not_acc">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" id="not_acc" value="No" name="not_acc">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                      </div>
                </div>
                

              </div>
            </div>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <br><br>
                    
                    <!--<div class="form-group ">
                        <label>Upload Profile Photo</label>
                        <div class="col-md-7 col-sm-12 required">
                            <input type="file" name="profile_pic">                                       
                        </div>
                    </div>-->
                    <div class="box-footer text-right" style="padding-right:50px;">
                     <br><br>   <a class="btn btn-link text-left" href="{{ route('resident_agreements.index') }}">Cancel</a>
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




function findselected14() { 

    var result = document.querySelector('input[name="room_cl"]:checked').value;
    if(result=="None"){

        document.getElementById("f10").setAttribute('disabled', false);
    }
    else{
        document.getElementById("f10").removeAttribute('disabled', true);
    }
}
function findselected15() { 

    var result = document.querySelector('input[name="tr_assi"]:checked').value;
    if(result=="None"){

        document.getElementById("f11").setAttribute('disabled', false);
    }
    else{
        document.getElementById("f11").removeAttribute('disabled', true);
    }
}
function findselected16() { 

    var result = document.querySelector('input[name="eating"]:checked').value;
    if(result=="None"){

        document.getElementById("f12").setAttribute('disabled', false);
    }
    else{
        document.getElementById("f12").removeAttribute('disabled', true);
    }
}
function findselected17() { 

    var result = document.querySelector('input[name="laundry"]:checked').value;
    if(result=="None"){

        document.getElementById("f13").setAttribute('disabled', false);
    }
    else{
        document.getElementById("f13").removeAttribute('disabled', true);
    }
}
function findselected18() { 

    var result = document.querySelector('input[name="other"]:checked').value;
    if(result=="None"){

        document.getElementById("f14").setAttribute('disabled', false);
    }
    else{
        document.getElementById("f14").removeAttribute('disabled', true);
    }
}
</script>
@include ('partials.bootstrap-table')
@stop