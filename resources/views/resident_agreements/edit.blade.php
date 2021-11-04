
@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
  <a href="{{ route('resident_agreements.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
@stop

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

          
         <form id="create-form" class="form-horizontal" method="post" action = "{{ route ('resident_agreements.update', $resident_agreement->id) }}" style="width: 1000px; align-items: center;   background-color: #fff; " autocomplete="off" role="form" >
            @method('PATCH') 

                {{ csrf_field() }}
            <!-- box -->
              <div class="box box-default">
                <!-- box-header -->
               
                <div class="box-header with-border text-center">
                       <h3><b>Resident Agreement</b></h3>
                   
                </div>
                               <div class="box-body" style="padding-left: 50px;">    
                <h5 style="color:#980000;font-size: 16px;"><b>Resident Details</b></h5>
                <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label>Resident Name</label>
                        <select class="form-control" required="" id="resi_name" name="r_name" style="height: 26px;padding: 3px 10px;">
                            @foreach($residents as $resident)
                            <option value="{{ $resident->id }}" {{ $resident_agreement->r_name == $resident->fname." ".$resident->mname." ".$resident->lname ? 'selected' : ''  }}> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach

                        </select>
                       </div>
                                                            
                      <div class="col-md-2 mb-3">
                        <label>Room No</label>
                        <input type="text" name="room_no" id="roomm" class="form-control" value="{{ $resident_agreement->room_no}}" placeholder="Room No" readonly>                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Need assistance  in reading ?</label>
                        <br><input type="radio"  id="asistance_status" {{ $resident_agreement->asistance_status == 'Yes' ? 'checked' : ''  }} value="Yes" name="asistance_status">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" {{ $resident_agreement->asistance_status == 'No' ? 'checked' : ''  }}  id="asistance_status" value="No" name="asistance_status">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Staff</label>
                        <input type="text" name="staff" id="staffm" class="form-control" value="{{ $resident_agreement->staff }}" placeholder="Staff" readonly>                                        
                      </div>
                      
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Guardian Details</b></h5>

                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Guardian</label>
                        <input type="text" name="guardian" id="guardianm" class="form-control" value="{{ $resident_agreement->guardian}}" placeholder="Guardian" readonly>                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Phone No.</label>
                        <input type="tel" name="g_tel" id="gtel" class="form-control" value="{{ $resident_agreement->g_tel}}" placeholder="Phone No." readonly>                                        
                      </div>
                      
                      <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="g_email" id="gemail" class="form-control" value="{{ $resident_agreement->g_email}}" placeholder="Email" readonly>                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Address</label>
                        <textarea name="g_adress"  readonly class="form-control" id="gadress" placeholder="Address">{{ $resident_agreement->g_adress}}</textarea>
                                                              
                      </div>
                </div>
                <h5 style="color:#980000;font-size: 16px;"><b>NOK/Nomini Details</b></h5>
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Person Nominated</label>
                        <input type="text" name="p_nomini" class="form-control" value="{{ $resident_agreement->p_nomini}}" placeholder="Person Nominated">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Phone No.</label>
                        <input type="tel" name="per_tel" class="form-control" value="{{ $resident_agreement->per_tel}}"  placeholder="Phone No.">                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="per_email" class="form-control" value="{{ $resident_agreement->per_email}}" placeholder="Email">                                       
                      </div>
                     
                      <div class="col-md-3 mb-3">
                        <label>Address</label>
                        <textarea name="per_address" class="form-control" placeholder="Address">{{ $resident_agreement->per_address}}</textarea>
                      </div>
                </div>
                <h5 style="color:#980000;font-size: 16px;"><b>Emergency Contact Details</b></h5>

                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Emergency Contact</label>
                        <input type="text" name="emg_contact" class="form-control" value="{{ $resident_agreement->emg_contact}}" placeholder="Emergency Contact">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Phone No.</label>
                        <input type="tel" name="emg_tel" class="form-control" value="{{ $resident_agreement->emg_tel}}" placeholder="Phone No.">                                        
                      </div>

                      <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="emg_email" class="form-control" value="{{ $resident_agreement->emg_email}}" placeholder="Email">                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Address</label>
                        <textarea  name="emg_address" class="form-control" placeholder="Address">{{ $resident_agreement->emg_address}}</textarea>
                       
                      </div>
                </div>
                <h5 style="color:#980000;font-size: 16px;"><b>Finance Administrator/State Trustees</b></h5>
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Name</label>
                        <input type="text" name="adm_name" class="form-control" value="{{ $resident_agreement->adm_name}}" placeholder="Name">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="adm_em" class="form-control" value="{{ $resident_agreement->adm_em}}"  placeholder="Email">                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Phone No.</label>
                        <input type="tel" name="adm_ph" class="form-control" value="{{ $resident_agreement->adm_ph}}"  placeholder="Phone No.">                                        
                      </div>
                     
                      <div class="col-md-3 mb-3">
                        <label>Address</label>
                        <textarea name="adm_adr" class="form-control" placeholder="Address">{{ $resident_agreement->adm_adr}} </textarea>
                      </div>
                </div>
               <h5 style="color:#980000;font-size: 16px;"><b>Duration Of Stay</b></h5>

                <div class="form-row">
                      <!--<div class="col-md-4 mb-3">
                        <label>Indefinite period of stay from</label>
                        <input type="date" name="i_period" class="form-control" placeholder="Indefinite period of stay form">                                        
                      </div>-->
                      <div class="col-md-3 mb-3">
                       <label for="st_typ">Respite/permanent</label>
                        
                        <input type="text" name="st_typ" id="st_typ" class="form-control" readonly placeholder="type of stay" value="{{ $resident_agreement->st_typ}}">                                     
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Fixed period stay from</label>
                        <input type="date" style="width: 200px;" name="f_period" readonly id="fperiod" class="form-control" value="{{ $resident_agreement->f_period}}" placeholder="Fixed period stay form">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Ending on</label>
                        <input type="date" style="width: 200px;" name="ending_on"  readonly id="endperiod" class="form-control" value="{{ $resident_agreement->ending_on}}" placeholder="Ending on">                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Admission Date</label>
                        <input type="date" style="width: 200px;" name="adm_date" readonly id="adm_date" class="form-control" value="{{ $resident_agreement->adm_date}}" placeholder="Ending on">                                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                   <!--<div class="col-md-3 mb-3">
                      <label for="st_typ">Respite/permanent</label>&nbsp;&nbsp;&nbsp;
                        <select name="st_typ"  class="form-control" style="height: 26px;padding: 3px 10px;"> 
                            <option value="" style="font-size: 14px;">---Select--</option> 
                            <option value="Respite" {{ $resident_agreement->st_typ == 'Respite' ? 'selected' : ''  }} style="font-size: 14px;">Respite</option> 
                            <option value="Permanent" {{ $resident_agreement->st_typ == 'Permanent' ? 'selected' : ''  }} style="font-size: 14px;">Permanent</option> 
                        </select>                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Start Date</label>
                        <input type="date" style="width: 200px;" name="st_sdt"  readonly id="st_sdt" class="form-control" value="{{ $rsa->st_sdt}}" placeholder="Start Date">                                       
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>End Date</label>
                        <input type="date" style="width: 200px;" name="st_edt" readonly id="st_edt" class="form-control" value="{{ $rsa->st_sdt}}" placeholder="End Date">                                       
                      </div>-->
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Fee And Charges</b></h5>

                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Accommodation & personal support Fee</label>
                        <input type="text" name="acc_fee" class="form-control" placeholder="Fee for accommodation and personal support">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Frequency of payment</label><br>
                            <label><input {{ $resident_agreement->freq_pay == 'Weekly' ? 'checked' : ''  }}  type="checkbox" name="freq_pay" value="Weekly"> Weekly</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->freq_pay == 'Fortnightly' ? 'checked' : ''  }}  type="checkbox" name="freq_pay" value="Fortnightly"> Fortnightly</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->freq_pay == 'Every Calender Month' ? 'checked' : ''  }} type="checkbox" name="freq_pay" value="Every Calender Month"> Every Calender Month</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->freq_pay == 'Other' ? 'checked' : ''  }} type="checkbox" name="freq_pay" value="Other"> Other</label>&nbsp;&nbsp;  >       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Any rent paid in advance</label><br>
                        

                            <label><input {{ $resident_agreement->any_rent_adv == 'Weekly' ? 'checked' : ''  }}  type="checkbox" name="any_rent_adv" value="Weekly"> Weekly</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->any_rent_adv == 'Fortnightly' ? 'checked' : ''  }}  type="checkbox" name="any_rent_adv" value="Fortnightly"> Fortnightly</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->any_rent_adv == 'Every Calender Month' ? 'checked' : ''  }} type="checkbox" name="any_rent_adv" value="Every Calender Month"> Every Calender Month</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->any_rent_adv == 'Other' ? 'checked' : ''  }} type="checkbox" name="any_rent_adv" value="Other"> Other</label>&nbsp;&nbsp;<br>                                          
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>How to pay</label>
                        <input type="text" name="pay_method" class="form-control" value="{{ $resident_agreement->pay_method}}"  placeholder="Payment Method" id="pay_meth" readonly>
                                                               
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <br><h5 style="color:#980000;font-size: 16px;"><b>Other Fee & Charges</b></h5>
 
                
                <div class="form-row" style="top: 10px;">
                      <div class="col-md-4 mb-3">
                        <label>Security deposite charged ?</label>
                        <br><input type="radio" {{ $resident_agreement->secu_depo == 'Yes' ? 'checked' : ''  }} id="secu_depo" onchange="findselected();" value="Yes" name="secu_depo">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" {{ $resident_agreement->secu_depo == 'No' ? 'checked' : ''  }} id="secu_depo" value="No" onchange="findselected();" name="secu_depo">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Amount Payable</label>
                        <input type="text" name="amt_pay" class="form-control" value="{{ $resident_agreement->amt_pay}}" {{ $resident_agreement->secu_depo == 'No' ? 'disabled' : ''  }} id="amt_pay1" placeholder="Amount Payable">                                        
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Condition report provided to the resident ?</label>
                        <br><input type="radio" required=""  id="condition_rep" {{ $resident_agreement->condition_rep == 'Yes' ? 'checked' : ''  }}  value="Yes" name="condition_rep">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" required="" {{ $resident_agreement->condition_rep == 'No' ? 'checked' : ''  }} id="condition_rep" value="No" name="condition_rep">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>Furniture in resident's room belonging to the SRS</label>
                        
                        <textarea name="pers_prop" class="form-control" value="" placeholder="Furniture in resident's room belonging to thr SRS">{{ $resident_agreement->pers_prop}}</textarea>                                        
                      </div>
                    
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                <div class="form-row">
                      
                      <div class="col-md-3 mb-3">
                        <label>Reservation fee charged ?</label>
                        <br><input type="radio" onchange="findselected1();" {{ $resident_agreement->reserv_fee == 'Yes' ? 'checked' : ''  }} id="reserv_fee"  value="Yes" name="reserv_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" onchange="findselected1();" {{ $resident_agreement->reserv_fee == 'No' ? 'checked' : ''  }}  id="reserv_fee" value="No" name="reserv_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                      </div>
                      <div class="col-md-3 mb-3">

                        <label>Reservation Amount</label>
                        <input type="text" name="amt_res" id="r2" class="form-control" value="{{ $resident_agreement->amt_res}}" {{ $resident_agreement->reserv_fee == 'No' ? 'disabled' : ''  }} placeholder="Amount">                                       
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Establishment fee charged ?</label>
                        <br><input type="radio" onchange="findselected2();" {{ $resident_agreement->est_fee == 'Yes' ? 'checked' : ''  }} id="est_fee"  value="Yes" name="est_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" onchange="findselected2();" {{ $resident_agreement->est_fee == 'No' ? 'checked' : ''  }}  id="est_fee" value="No" name="est_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>
                      <div class="col-md-3 mb-3">

                        <label>Establishment Amount</label>
                        <input type="text" name="amt_est" id="e2" class="form-control" value="{{ $resident_agreement->amt_est}}"  {{ $resident_agreement->est_fee == 'No' ? 'disabled' : ''  }} placeholder="Amount">                                       
                      </div>
                       
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                
                <div class="form-row">
                      <div class="col-md-6 mb-3">

                        <label>Fee in advance charged for other items/service provide by SRS ?</label>
                        <br><input {{ $resident_agreement->advnc_fee == 'Yes' ? 'checked' : ''  }} type="radio" onchange="findselected3();"  id="advnc_fee"  value="Yes" name="advnc_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input {{ $resident_agreement->advnc_fee == 'No' ? 'checked' : ''  }} type="radio" onchange="findselected3();"  id="advnc_fee" value="No" name="advnc_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                     
                      </div>
                        <div class="col-md-3 mb-3">

                        <label>Advance Amount</label>
                        <input type="text" name="amt_adv" id="a2" class="form-control" value="{{ $resident_agreement->amt_adv}}" {{ $resident_agreement->advnc_fee == 'No' ? 'disabled' : ''  }} placeholder="Amount">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Refund to resident</label>
                        <input type="text" name="refund" class="form-control" value="{{ $resident_agreement->refund}}" placeholder="Refund to resident">                                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Management Of Resident's Money</b></h5>

                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Will the SRS assist the resident in managing their finances ?</label>
                        <br><input type="radio" onchange="findselected4();" {{ $resident_agreement->srs_assist_status == 'Yes' ? 'checked' : ''  }} id="srs_assist_status"  value="Yes" name="srs_assist_status">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" onchange="findselected4();"  {{ $resident_agreement->srs_assist_status == 'No' ? 'checked' : ''  }} id="srs_assist_status" value="No" name="srs_assist_status">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                       
                      </div>
                       <div class="col-md-6 mb-3" >
                        <label>Ammount to be managed</label>
                        <input type="text" style="width:200px" name="assist_amnt" id="s1" class="form-control" value="{{ $resident_agreement->assist_amnt}}" placeholder="Ammount to be managed" {{ $resident_agreement->srs_assist_status == 'No' ? 'disabled' : ''  }}>                                        
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
                    <input type="checkbox" onchange="findselected5();" {{ $resident_agreement->bath == 'Full' ? 'checked' : ''  }} name="bath" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;      
                     <input type="checkbox" onchange="findselected5();" {{ $resident_agreement->bath == 'Part' ? 'checked' : ''  }} name="bath" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;      
                     <input type="checkbox" onchange="findselected5();" {{ $resident_agreement->bath == 'None' ? 'checked' : ''  }} name="bath" value="None" />   
                    </td>
                    <td><input type="text" id="f1" {{ $resident_agreement->bath == 'None' ? 'disabled' : ''  }} value="{{ $resident_agreement->bath_fee}}" name="bath_fee"></td>
                  </tr>
                  <tr>
                    <td>Oral Support</td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" onchange="findselected6();" {{ $resident_agreement->oral == 'Full' ? 'checked' : ''  }} name="oral" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" onchange="findselected6();" {{ $resident_agreement->oral == 'Part' ? 'checked' : ''  }}  name="oral" value="Part" />   
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" onchange="findselected6();" {{ $resident_agreement->oral == 'None' ? 'checked' : ''  }}  name="oral" value="None" />    
                    </td>
                    <td><input type="text" {{ $resident_agreement->oral == 'None' ? 'disabled' : ''  }} id="f2" value="{{ $resident_agreement->oral_fee}}" name="oral_fee"></td>
                  </tr>
                  <tr>
                    <td>Hair and nails</td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" onchange="findselected7();" {{ $resident_agreement->hair == 'Full' ? 'checked' : ''  }}  name="hair" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" onchange="findselected7();" {{ $resident_agreement->hair == 'Part' ? 'checked' : ''  }} name="hair" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" onchange="findselected7();" {{ $resident_agreement->hair == 'None' ? 'checked' : ''  }} name="hair" value="None" />    
                    </td>
                    <td><input type="text" {{ $resident_agreement->hair == 'None' ? 'disabled' : ''  }} id="f3" value="{{ $resident_agreement->hair_fee}}"" name="hair_fee"></td>
                  </tr>
                  <tr>
                    <td>Toileting</td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" onchange="findselected8();" {{ $resident_agreement->toileting == 'Full' ? 'checked' : ''  }}  name="toileting" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" onchange="findselected8();" {{ $resident_agreement->toileting == 'Part' ? 'checked' : ''  }} name="toileting" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" onchange="findselected8();" {{ $resident_agreement->toileting == 'None' ? 'checked' : ''  }} name="toileting" value="None" />     
                    </td>
                    <td><input type="text" {{ $resident_agreement->toileting == 'None' ? 'disabled' : ''  }} id="f4" value="{{ $resident_agreement->toileting_fee}}"  name="toileting_fee"></td>
                  </tr>
                  <tr>
                    <td>Mobility</td>
                    <td>  &nbsp;&nbsp;&nbsp;      
                     <input type="checkbox" onchange="findselected9();" {{ $resident_agreement->mobility == 'Full' ? 'checked' : ''  }}  name="mobility" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;      
                     <input type="checkbox" onchange="findselected9();" {{ $resident_agreement->mobility == 'Part' ? 'checked' : ''  }} name="mobility" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;      
                     <input type="checkbox" onchange="findselected9();"  {{ $resident_agreement->mobility == 'None' ? 'checked' : ''  }} name="mobility" value="None" />    
                    </td>
                    <td><input type="text" {{ $resident_agreement->mobility == 'None' ? 'disabled' : ''  }} id="f5" value="{{ $resident_agreement->mobility_fee}}" name="mobility_fee"></td>
                  </tr>
                  <tr>
                    <td>Assistance with medication</td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" onchange="findselected10();" {{ $resident_agreement->medi_assi == 'Full' ? 'checked' : ''  }}  name="medi_assi" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" onchange="findselected10();" {{ $resident_agreement->medi_assi == 'Part' ? 'checked' : ''  }} name="medi_assi" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" onchange="findselected10();" {{ $resident_agreement->medi_assi == 'None' ? 'checked' : ''  }} name="medi_assi" value="None" />    
                    </td>
                    <td><input type="text" {{ $resident_agreement->medi_assi == 'None' ? 'disabled' : ''  }} id="f6" value="{{ $resident_agreement->medi_assi_fee}}" name="medi_assi_fee"></td>
                  </tr>
                  <tr>
                    <td>Continence management</td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" onchange="findselected11();" {{ $resident_agreement->continence == 'Full' ? 'checked' : ''  }}  name="continence" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" onchange="findselected11();" {{ $resident_agreement->continence == 'Part' ? 'checked' : ''  }} name="continence" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" onchange="findselected11();" {{ $resident_agreement->continence == 'None' ? 'checked' : ''  }} name="continence" value="None" />    
                    </td>
                    <td><input type="text" {{ $resident_agreement->continence == 'None' ? 'disabled' : ''  }} id="f7" value="{{ $resident_agreement->continence_fee}}" name="continence_fee"></td>
                  </tr>
                  <tr>
                    <td>Bed making</td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" onchange="findselected12();" {{ $resident_agreement->bed_make == 'Full' ? 'checked' : ''  }}  name="bed_make" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" onchange="findselected12();"  {{ $resident_agreement->bed_make == 'Part' ? 'checked' : ''  }} name="bed_make" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" onchange="findselected12();"  {{ $resident_agreement->bed_make == 'None' ? 'checked' : ''  }} name="bed_make" value="None" />    
                    </td>
                    <td><input type="text" {{ $resident_agreement->bed_make == 'None' ? 'disabled' : ''  }} id="f8" value="{{ $resident_agreement->bed_make_fee}}" name="bed_make_fee"></td>
                  </tr>
                  <tr>
                    <td>Dressing</td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" onchange="findselected13();" {{ $resident_agreement->dressing == 'Full' ? 'checked' : ''  }}  name="dressing" value="Full" />    
                    </td>
                     <td>   &nbsp;&nbsp;&nbsp;    
                    <input type="checkbox" onchange="findselected13();" {{ $resident_agreement->dressing == 'Part' ? 'checked' : ''  }} name="dressing" value="Part" />    
                    </td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" onchange="findselected13();" {{ $resident_agreement->dressing == 'None' ? 'checked' : ''  }} name="dressing" value="None" />    
                    </td>
                    <td><input type="text" {{ $resident_agreement->dressing == 'None' ? 'disabled' : ''  }} id="f9" value="{{ $resident_agreement->dressing_fee}}" name="dressing_fee"></td>
                  </tr>
                  <tr>
                    <td>Room Cleaning</td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" onchange="findselected14();" {{ $rsa->room_cl == 'Full' ? 'checked' : ''  }}  name="room_cl" value="Full" />    
                    </td>
                     <td>   &nbsp;&nbsp;&nbsp;    
                    <input type="checkbox" onchange="findselected14();" {{ $rsa->room_cl == 'Part' ? 'checked' : ''  }} name="room_cl" value="Part" />    
                    </td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" onchange="findselected14();" {{ $rsa->room_cl == 'None' ? 'checked' : ''  }} name="room_cl" value="None" />    
                    </td>
                    <td><input type="text" {{ $rsa->room_cl == 'None' ? 'disabled' : ''  }} id="f10" value="{{ $rsa->room_det}}" name="room_det"></td>
                  </tr>
                  <tr>
                    <td>Transport Assistance-Details</td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" onchange="findselected15();" {{ $rsa->tr_assi == 'Full' ? 'checked' : ''  }}  name="tr_assi" value="Full" />    
                    </td>
                     <td>   &nbsp;&nbsp;&nbsp;    
                    <input type="checkbox" onchange="findselected15();" {{ $rsa->tr_assi == 'Part' ? 'checked' : ''  }} name="tr_assi" value="Part" />    
                    </td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" onchange="findselected15();" {{ $rsa->tr_assi == 'None' ? 'checked' : ''  }} name="tr_assi" value="None" />    
                    </td>
                    <td><input type="text" {{ $rsa->tr_assi == 'None' ? 'disabled' : ''  }} id="f11" value="{{ $rsa->tr_det}}" name="tr_det"></td>
                  </tr>
                  <tr>
                    <td>Eating</td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" onchange="findselected16();" {{ $rsa->eating == 'Full' ? 'checked' : ''  }}  name="eating" value="Full" />    
                    </td>
                     <td>   &nbsp;&nbsp;&nbsp;    
                    <input type="checkbox" onchange="findselected16();" {{ $rsa->eating == 'Part' ? 'checked' : ''  }} name="eating" value="Part" />    
                    </td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" onchange="findselected16();" {{ $rsa->eating == 'None' ? 'checked' : ''  }} name="eating" value="None" />    
                    </td>
                    <td><input type="text" {{ $rsa->eating == 'None' ? 'disabled' : ''  }} id="f12" value="{{ $rsa->eat_det}}" name="eat_det"></td>
                  </tr>
                  <tr>
                    <td>Laundry</td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" onchange="findselected16();" {{ $rsa->laundry == 'Full' ? 'checked' : ''  }}  name="laundry" value="Full" />    
                    </td>
                     <td>   &nbsp;&nbsp;&nbsp;    
                    <input type="checkbox" onchange="findselected16();" {{ $rsa->laundry == 'Part' ? 'checked' : ''  }} name="laundry" value="Part" />    
                    </td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" onchange="findselected16();" {{ $rsa->laundry == 'None' ? 'checked' : ''  }} name="laundry" value="None" />    
                    </td>
                    <td><input type="text" {{ $rsa->laundry == 'None' ? 'disabled' : ''  }} id="f13" value="{{ $rsa->laundry_det}}" name="laundry_det"></td>
                  </tr>
                  <tr>
                    <td>Other services required</td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" onchange="findselected17();" {{ $rsa->other == 'Full' ? 'checked' : ''  }}  name="other" value="Full" />    
                    </td>
                     <td>   &nbsp;&nbsp;&nbsp;    
                    <input type="checkbox" onchange="findselected17();" {{ $rsa->other == 'Part' ? 'checked' : ''  }} name="other" value="Part" />    
                    </td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" onchange="findselected17();" {{ $rsa->other == 'None' ? 'checked' : ''  }} name="other" value="None" />    
                    </td>
                    <td><input type="text" {{ $rsa->other == 'None' ? 'disabled' : ''  }} id="f14" value="{{ $rsa->other_det}}" name="other_det"></td>
                  </tr><br>
                </table>

                <h5 style="color:#980000;font-size: 16px;"><b>Proprietor/ Manager</b></h5>

                <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label>Name</label>
                        <select class="form-control" style="height: 26px;padding: 3px 10px;" id="pr_name" name="pr_name">
                           <option>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}" {{ $resident_agreement->pr_name == $emp->name ? 'selected' : '' }}>{{ $emp->name }}</option>
                          @endforeach
                        </select>                                       
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Witness</label>
                        <select class="form-control" style="height: 26px;padding: 3px 10px;" id="pr_wit" name="pr_wit">
                           <option>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}" {{ $resident_agreement->pr_wit == $emp->name ? 'selected' : '' }}>{{ $emp->name }}</option>
                          @endforeach
                        </select>                                        
                      </div>
                      
                      <div class="col-md-4 mb-3">
                        <label>Date</label>
                        <input type="date" name="pr_date" id="pr_date" class="form-control" value="{{ $resident_agreement->pr_date}}" placeholder="Date" >                                       
                      </div>
                </div>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Resident</b></h5>

                <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label>Name</label>
                        <input type="text" name="re_name" id="re_name" class="form-control" value="{{ $rsa->re_name}}" placeholder="Name" readonly>                                       
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Witness</label>
                        <select class="form-control" style="height: 26px;padding: 3px 10px;" id="re_wt" name="re_wt">
                           <option>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}" {{ $resident_agreement->re_wt == $emp->name ? 'selected' : '' }}>{{ $emp->name }}</option>
                          @endforeach
                        </select>                                         
                      </div>
                      
                      <div class="col-md-4 mb-3">
                        <label>Date</label>
                        <input type="date" name="re_date" id="re_date" class="form-control" value="{{ $rsa->re_date}}" placeholder="Date" >                                       
                      </div>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <br><br>
                <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label>This agreement starts on</label>
                        <input type="date" name="st_dt" id="st_dt" class="form-control" value="{{ $rsa->st_dt}}"  placeholder="This agreement starts on" >                                       
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>This agreement ends on</label>
                        <input type="date" name="ed_dt" id="ed_dt" class="form-control" value="{{ $rsa->ed_dt}}"  placeholder="This agreement ends on" >                                       
                      </div>
                      <div class="col-md-4 mb-3">                        <label>PL check if notified to Accounts?</label>
                        <br><input type="radio"  id="not_acc" {{ $rsa->not_acc == 'Yes' ? 'checked' : ''  }} value="Yes" name="not_acc">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" {{ $rsa->not_acc == 'No' ? 'checked' : ''  }}  id="not_acc" value="No" name="not_acc">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
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
                $('#adm_datem').val(response.adm_date); 
                $('#st_typ').val(response.respite);                             
                $('#re_name').val(response.fname+' '+response.mname+' '+response.lname); 
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
                $('#staff1').val(response.stf_name);            

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

        document.getElementById("amt_pay1").setAttribute('disabled', false);
    }
    else{
        document.getElementById("amt_pay1").removeAttribute('disabled', true);
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