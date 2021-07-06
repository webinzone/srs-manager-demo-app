
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
                        <select class="form-control" required="" id="r_name" name="r_name" style="height: 26px;padding: 3px 10px;">
                          @foreach($residents as $resident)
                          <option value="{{ $resident->id }}" {{ $resident_agreement->res_name == $resident->fname. $resident->mname. $resident->lname ? 'selected' : ''  }}> {{ $resident->fname}}. {{$resident->mname}}. {{$resident->lname  }}</option>
                          @endforeach
                        </select>
                       </div>
                                                            
                      <div class="col-md-2 mb-3">
                        <label>Room No</label>
                        <input type="text" name="room_no" id="room1" class="form-control"  value="{{ $resident_agreement->room_no}}"   placeholder="Room No">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Need assistance  in reading ?</label>
                        <br><input type="radio"  id="asistance_status" {{ $resident_agreement->asistance_status == 'Yes' ? 'checked' : ''  }} value="Yes" name="asistance_status">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" {{ $resident_agreement->asistance_status == 'No' ? 'checked' : ''  }}  id="asistance_status" value="No" name="asistance_status">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Staff</label>
                        <input type="text" name="staff" id="staff1" value="{{ $resident_agreement->staff}}" class="form-control"  placeholder="Staff">                                        
                      </div>
                      
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Guardian Details</b></h5>

                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Guardian</label>
                        <input type="text" value="{{ $resident_agreement->guardian}}" name="guardian" id="guardian1" class="form-control"  placeholder="Guardian">                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Telephone</label>
                        <input type="tel" id="g_tel1" name="g_tel" class="form-control" value="{{ $resident_agreement->g_tel}}" placeholder="Telephone">                                        
                      </div>
                      
                      <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" id="g_email1" name="g_email" class="form-control" value="{{ $resident_agreement->g_email}}" placeholder="Email">                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Address</label>
                        <textarea name="g_adress" id="g_adress1" class="form-control" value="" placeholder="Address">{{ $resident_agreement->g_adress}}</textarea>
                                                              
                      </div>
                </div>
                <h5 style="color:#980000;font-size: 16px;"><b>Nomini Details</b></h5>
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Person Nominated</label>
                        <input type="text" name="p_nomini" class="form-control" value="{{ $resident_agreement->p_nomini}}" placeholder="Person Nominated">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Telephone</label>
                        <input type="tel" name="per_tel" class="form-control" value="{{ $resident_agreement->per_tel}}" placeholder="Telephone">                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="per_email" class="form-control" value="{{ $resident_agreement->per_email}}" placeholder="Email">                                       
                      </div>
                     
                      <div class="col-md-3 mb-3">
                        <label>Address</label>
                        <textarea name="per_address" class="form-control" value="" placeholder="Address">{{ $resident_agreement->per_address}}</textarea>
                      </div>
                </div>
                <h5 style="color:#980000;font-size: 16px;"><b>Emergency Contact Details</b></h5>

                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Emergency Contact</label>
                        <input type="text" name="emg_contact" class="form-control" value="{{ $resident_agreement->emg_contact}}" placeholder="Emergency Contact">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Telephone</label>
                        <input type="tel" name="emg_tel" class="form-control" value="{{ $resident_agreement->emg_tel}}" placeholder="Telephone">                                        
                      </div>

                      <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="emg_email" class="form-control" value="{{ $resident_agreement->emg_email}}" placeholder="Email">                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Address</label>
                        <textarea  name="emg_address" class="form-control" value="" placeholder="Address">{{ $resident_agreement->emg_address}}</textarea>
                       
                      </div>
                </div>
               <h5 style="color:#980000;font-size: 16px;"><b>Duration Of Stay</b></h5>

                <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label>Indefinite period of stay from</label>
                        <input type="date" name="i_period" class="form-control" value="{{ $resident_agreement->i_period}}" placeholder="Indefinite period of stay form">                                        
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Fixed period stay form</label>
                        <input type="date" name="f_period" class="form-control" value="{{ $resident_agreement->f_period}}" placeholder="Fixed period stay form">                                        
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Ending on</label>
                        <input type="date" name="ending_on" class="form-control" value="{{ $resident_agreement->ending_on}}" placeholder="Ending on">                                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Fee And Charges</b></h5>

                <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label>Accommodation & personal support Fee</label>
                        <input type="text" name="acc_fee" class="form-control" value="{{ $resident_agreement->acc_fee}}" placeholder="Fee for accommodation and personal support">                                        
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Frequency of payment</label><br>
                            <label><input {{ $resident_agreement->freq_pay == 'Weekly' ? 'checked' : ''  }}  type="checkbox" name="freq_pay[]" value="Weekly"> Weekly</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->freq_pay == 'Fortnightly' ? 'checked' : ''  }}  type="checkbox" name="freq_pay[]" value="Fortnightly"> Fortnightly</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->freq_pay == 'Every Calender Month' ? 'checked' : ''  }} type="checkbox" name="freq_pay[]" value="Every Calender Month"> Every Calender Month</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->freq_pay == 'Other' ? 'checked' : ''  }} type="checkbox" name="freq_pay[]" value="Other"> Other</label>&nbsp;&nbsp;          
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Any rent paid in advance</label><br>
                        

                                <label><input {{ $resident_agreement->any_rent_adv == 'Weekly' ? 'checked' : ''  }}  type="checkbox" name="any_rent_adv[]" value="Weekly"> Weekly</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->any_rent_adv == 'Fortnightly' ? 'checked' : ''  }}  type="checkbox" name="any_rent_adv[]" value="Fortnightly"> Fortnightly</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->any_rent_adv == 'Every Calender Month' ? 'checked' : ''  }} type="checkbox" name="any_rent_adv[]" value="Every Calender Month"> Every Calender Month</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->any_rent_adv == 'Other' ? 'checked' : ''  }} type="checkbox" name="any_rent_adv[]" value="Other"> Other</label>&nbsp;&nbsp;                                             
                      </div>
                </div>&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>How to pay</label><br>
                         <label><input {{ $resident_agreement->pay_method == 'Direct Debit' ? 'checked' : ''  }} type="checkbox" name="pay_method[]" value="Direct Debit"> Direct Debit</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->pay_method == 'Cash' ? 'checked' : ''  }} type="checkbox" name="pay_method[]" value="Cash"> Cash</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->pay_method == 'State Trustees' ? 'checked' : ''  }} type="checkbox" name="pay_method[]" value="State Trustees"> State Trustees</label>&nbsp;&nbsp;
                                <label><label><input {{ $resident_agreement->pay_method == 'Centrelink' ? 'checked' : ''  }} type="checkbox" name="pay_method[]" value="Centrelink"> Centrelink</label>&nbsp;&nbsp;                                       
                                  <input {{ $resident_agreement->pay_method == 'Other' ? 'checked' : ''  }} type="checkbox" name="pay_method[]" value="Other"> Other</label>&nbsp;&nbsp;                                      
                      </div>
                      
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Other Fee & Charges</b></h5>
 
                
                <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label>Security deposite charged ?</label>
                        <br><input type="radio" id={{ $resident_agreement->secu_depo == 'Yes' ? 'checked' : ''  }} "secu_depo"  value="Yes" name="secu_depo">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" {{ $resident_agreement->secu_depo == 'No' ? 'checked' : ''  }} id="secu_depo" value="No" name="secu_depo">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp; 
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Amount Payable</label>
                        <input type="text" name="amt_pay" class="form-control" value="{{ $resident_agreement->amt_pay}}" placeholder="Amount Payable">                                        
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Condition report provided to the resident ?</label>
                        <br><input type="radio"  id="condition_rep" {{ $resident_agreement->condition_rep == 'Yes' ? 'checked' : ''  }}  value="Yes" name="condition_rep">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" {{ $resident_agreement->condition_rep == 'No' ? 'checked' : ''  }} id="condition_rep" value="No" name="condition_rep">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>Furniture in resident's room belonging to the SRS</label>
                        
                        <textarea name="pers_prop" class="form-control" value="" placeholder="Furniture in resident's room belonging to thr SRS">{{ $resident_agreement->pers_prop}}</textarea>                                        
                      </div>
                    
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                <div class="form-row">
                      
                      <div class="col-md-3 mb-3">
                        <label>Reservation fee charged ?</label>
                        <br><input type="radio" {{ $resident_agreement->reserv_fee == 'Yes' ? 'checked' : ''  }} id="reserv_fee"  value="Yes" name="reserv_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" {{ $resident_agreement->reserv_fee == 'No' ? 'checked' : ''  }}  id="reserv_fee" value="No" name="reserv_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                      </div>
                      <div class="col-md-3 mb-3">

                        <label>Reservation Amount</label>
                        <input type="text" name="amt_res" class="form-control" value="{{ $resident_agreement->amt_res}}" placeholder="Amount">                                       
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Establishment fee charged ?</label>
                        <br><input type="radio" {{ $resident_agreement->est_fee == 'Yes' ? 'checked' : ''  }} id="est_fee"  value="Yes" name="est_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" {{ $resident_agreement->est_fee == 'No' ? 'checked' : ''  }}  id="est_fee" value="No" name="est_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>
                      <div class="col-md-3 mb-3">

                        <label>Establishment Amount</label>
                        <input type="text" name="amt_est" class="form-control" value="{{ $resident_agreement->amt_est}}" placeholder="Amount">                                       
                      </div>
                       
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                
                <div class="form-row">
                      <div class="col-md-6 mb-3">

                        <label>Fee in advance charged for other items/service provide by SRS ?</label>
                        <br><input {{ $resident_agreement->advnc_fee == 'Yes' ? 'checked' : ''  }} type="radio"  id="advnc_fee"  value="Yes" name="advnc_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input {{ $resident_agreement->advnc_fee == 'No' ? 'checked' : ''  }} type="radio"  id="advnc_fee" value="No" name="advnc_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                      
                      </div>
                        <div class="col-md-3 mb-3">

                        <label>Advance Amount</label>
                        <input type="text" name="amt_adv" class="form-control" value="{{ $resident_agreement->amt_adv}}" placeholder="Amount">                                       
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
                        <br><input type="radio" {{ $resident_agreement->srs_assist_status == 'Yes' ? 'checked' : ''  }} id="srs_assist_status"  value="Yes" name="srs_assist_status">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  {{ $resident_agreement->srs_assist_status == 'No' ? 'checked' : ''  }} id="srs_assist_status" value="No" name="srs_assist_status">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                       
                      </div>
                       <div class="col-md-6 mb-3">
                        <label>Ammount to be managed</label>
                        <input type="text" style="width:200px" name="assist_amnt" class="form-control" value="{{ $resident_agreement->assist_amnt}}" placeholder="Ammount to be managed">                                        
                      </div>
                </div>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Personal and Special Support Services</b></h5>
                <div class="form-row">
                <div class="col-md-12 mb-3">
                <table style="border: 2px; border-width: 1px; border-color: black; padding-left: 8px;">
                  <tr style="padding:5px;">
                    <th>Type of Support</th>
                    <th colspan="3">Level of assistance offered</th>
                    <th>Included in fee</th>
                  </tr>
                  <tr>
                    <td></td>
                    <td>&nbsp;&nbsp;&nbsp;   Full</td>
                    <td>&nbsp;&nbsp;&nbsp;   Part</td>
                    <td>&nbsp;&nbsp;&nbsp;   None</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Bathing and showering</td>
                    <td> &nbsp;&nbsp;&nbsp;   
                     <input type="checkbox" {{ $resident_agreement->bath == 'Full' ? 'checked' : ''  }} name="bath" value="Full" />    
                    </td>
                     <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" {{ $resident_agreement->bath == 'Part' ? 'checked' : ''  }} name="bath" value="Part" />    
                    </td>
                    <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" {{ $resident_agreement->bath == 'None' ? 'checked' : ''  }} name="bath" value="None" />    
                    </td>
                    <td><input type="text" value="{{ $resident_agreement->bath_fee}}" name="bath_fee"></td>
                  </tr>
                  <tr>
                    <td>Oral Support</td>
                    <td>&nbsp;&nbsp;&nbsp;     
                     <input {{ $resident_agreement->oral == 'Full' ? 'checked' : ''  }} type="checkbox" name="oral" value="Full" />    
                    </td>
                     <td>&nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" {{ $resident_agreement->oral == 'Part' ? 'checked' : ''  }}  name="oral" value="Part" />    
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" {{ $resident_agreement->oral == 'None' ? 'checked' : ''  }}  name="oral" value="None" />    
                    </td>
                    <td><input type="text" value="{{ $resident_agreement->oral_fee}}" name="oral_fee"></td>
                  </tr>
                  <tr>
                    <td>Hair and nails</td>
                    <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" {{ $resident_agreement->hair == 'Full' ? 'checked' : ''  }}  name="hair" value="Full" />    
                    </td>
                     <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" {{ $resident_agreement->hair == 'Part' ? 'checked' : ''  }} name="hair" value="Part" />    
                    </td>
                    <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" {{ $resident_agreement->hair == 'None' ? 'checked' : ''  }} name="hair" value="None" />    
                    </td>
                    <td><input type="text" value="{{ $resident_agreement->hair_fee}}"" name="hair_fee"></td>
                  </tr>
                  <tr>
                    <td>Toileting</td>
                    <td>&nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" {{ $resident_agreement->toileting == 'Full' ? 'checked' : ''  }}  name="toileting" value="Full" />    
                    </td>
                     <td>&nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" {{ $resident_agreement->toileting == 'Part' ? 'checked' : ''  }} name="toileting" value="Part" />    
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" {{ $resident_agreement->toileting == 'None' ? 'checked' : ''  }} name="toileting" value="None" />    
                    </td>
                    <td><input type="text" value="{{ $resident_agreement->toileting_fee}}"  name="toileting_fee"></td>
                  </tr>
                  <tr>
                    <td>Mobility</td>
                    <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" {{ $resident_agreement->mobility == 'Full' ? 'checked' : ''  }}  name="mobility" value="Full" />    
                    </td>
                     <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" {{ $resident_agreement->mobility == 'Part' ? 'checked' : ''  }} name="mobility" value="Part" />    
                    </td>
                    <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox"  {{ $resident_agreement->mobility == 'None' ? 'checked' : ''  }} name="mobility" value="None" />    
                    </td>
                    <td><input type="text" value="{{ $resident_agreement->mobility_fee}}" name="mobility_fee"></td>
                  </tr>
                  <tr>
                    <td>Assistance with medication</td>
                    <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" {{ $resident_agreement->medi_assi == 'Full' ? 'checked' : ''  }}  name="medi_assi" value="Full" />    
                    </td>
                     <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" {{ $resident_agreement->medi_assi == 'Part' ? 'checked' : ''  }} name="medi_assi" value="Part" />    
                    </td>
                    <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" {{ $resident_agreement->medi_assi == 'None' ? 'checked' : ''  }} name="medi_assi" value="None" />    
                    </td>
                    <td><input type="text" value="{{ $resident_agreement->medi_assi_fee}}" name="medi_assi_fee"></td>
                  </tr>
                  <tr>
                    <td>Continence management</td>
                    <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" {{ $resident_agreement->continence == 'Full' ? 'checked' : ''  }}  name="continence" value="Full" />    
                    </td>
                     <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" {{ $resident_agreement->continence == 'Part' ? 'checked' : ''  }} name="continence" value="Part" />    
                    </td>
                    <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" {{ $resident_agreement->continence == 'None' ? 'checked' : ''  }} name="continence" value="None" />    
                    </td>
                    <td><input type="text" value="{{ $resident_agreement->continence_fee}}" name="continence_fee"></td>
                  </tr>
                  <tr>
                    <td>Bed making</td>
                    <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" {{ $resident_agreement->bed_make == 'Full' ? 'checked' : ''  }}  name="bed_make" value="Full" />    
                    </td>
                     <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox"  {{ $resident_agreement->bed_make == 'Part' ? 'checked' : ''  }} name="bed_make" value="Part" />    
                    </td>
                    <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox"  {{ $resident_agreement->bed_make == 'None' ? 'checked' : ''  }} name="bed_make" value="None" />    
                    </td>
                    <td><input type="text" value="{{ $resident_agreement->bed_make_fee}}" name="bed_make_fee"></td>
                  </tr>
                  <tr>
                    <td>Dressing</td>
                    <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" {{ $resident_agreement->dressing == 'Full' ? 'checked' : ''  }}  name="dressing" value="Full" />    
                    </td>
                     <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" {{ $resident_agreement->dressing == 'Part' ? 'checked' : ''  }} name="dressing" value="Part" />    
                    </td>
                    <td> &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" {{ $resident_agreement->dressing == 'None' ? 'checked' : ''  }} name="dressing" value="None" />    
                    </td>
                    <td><input type="text" value="{{ $resident_agreement->dressing_fee}}" name="dressing_fee"></td>
                  </tr><br>
                </table>
              </div></div>
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
    </div>
</div>
@stop

@section('moar_scripts')
<script type="text/javascript">
  $('input[type="checkbox"]').on('change', function() {
    $('input[name="' + this.name + '"]').not(this).prop('checked', false);
});
</script>
@include ('partials.bootstrap-table')
@stop

