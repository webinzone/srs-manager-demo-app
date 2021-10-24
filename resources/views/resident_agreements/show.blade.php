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

{{-- Page content --}}
@section('content')
<style type="text/css">
      table, td, th {
    border: 1px solid black;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    padding: 10px;
  }
</style>
  <div id="webui">
    <div class="row" style="padding-left: 80px;padding-right: 80px;">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" action="" autocomplete="off" style="width: 1000px; align-items: center;   background-color: #fff; padding-right: 100px;">
          <div class="box box-default">
            <div class="box-header with-border text-center">
                 <h3><b>Resident Agreements</b></h3>
                   
                </div><!-- /.box-header -->

            <div class="box-body" style="padding-left:80px;">

                <!-- Asset name --
                <div class="form-group">
                    <div class="col-md-6">
                        <img  class="img-responsive pad" src="{{url('')}}/images/profile_pics/{{ $resident_agreement->profile_pic}}" style="width: 200px;height: 200px;">

                    </div>
                </div>-->
<table>
      <tr>
        <td><b>RESIDENT DETAILS:</b></td>
        <td><b>Name</b></td>
        <td>{{ $resident_agreement->r_name}}</td>
        <td>Room No:  </td>
        <td>{{ $resident_agreement->room_no}}</td>
      </tr>
      <tr>
        <td width="290px;">Guide to resident and prospective resident:  {{ $resident_agreement->res_gp}}</td>
        <td><b><a style="color:black;" href="http://www2.health.vic.gov.au">http://www2.health.vic.gov.au</a></b></td>
        <td width="200px;" >Need assistance  in reading ?</td>
        <td width="100px;">(Yes/No){{ $resident_agreement->asistance_status}}</td>
        <td>Staff: {{ $resident_agreement->staff }}</td>
      </tr>
    </table>&nbsp;&nbsp;
    <table>
  <tr>
    <td colspan="5">A resident may nominate a person to receive information about the resident’s accommodation and personal support received at the SRS.</td>
</tr>
<tr>
  <td>Contact details</td>
  <td>NOK/Nominated</td>
  <td>Guardian/Administrator</td>
  <td>Emergency Contact</td>
  <td>Finance Administrator/State Trustees</td>
</tr>
<tr>
  <td>Name</td>
  <td>{{ $resident_agreement->p_nomini}}</td>
  <td>{{ $resident_agreement->guardian}}</td>
  <td>{{ $resident_agreement->emg_contact}}</td>
  <td>{{ $resident_agreement->adm_name}}</td>
</tr>
<tr>
  <td>Email</td>
  <td>{{ $resident_agreement->per_email}}</td>
  <td>{{ $resident_agreement->g_email}}</td>
  <td>{{ $resident_agreement->emg_email}}</td>
  <td>{{ $resident_agreement->adm_em}}</td>
</tr>
<tr>
  <td>Phone(inc: A/H)</td>
  <td>{{ $resident_agreement->per_tel}}</td>
  <td>{{ $resident_agreement->g_tel}}</td>
  <td>{{ $resident_agreement->emg_tel}}</td>
  <td>{{ $resident_agreement->adm_ph}}</td>
</tr>
<tr>
  <td>Address</td>
  <td>{{ $resident_agreement->per_address}}</td>
  <td>{{ $resident_agreement->g_adress}}</td>
  <td>{{ $resident_agreement->emg_address}}</td>
  <td>{{ $resident_agreement->adm_adr}}</td>
</tr>
</table>&nbsp;&nbsp;&nbsp;&nbsp;
    <table>
      <tr>
        <td colspan="2" ><b>FEES AND CHARGES:</b>Fee for accommodation and personal support: As per services listed</td>
        <td><b>Amount:$  {{ $resident_agreement->acc_fee}}</b></td>
      </tr>
      <tr>
        <td>Type of Stay</td>
        <td>Start Date</td>
        <td>End Date</td>
      </tr>
      <tr>
      <td>Permanent</td>
      <td>@if($resident_agreement->respite == "Permanent") {{date('d-m-Y', strtotime($resident_agreement->i_period)) }} @endif</td>
      <td>Indefinite</td>
     </tr>
     <tr>
      <td>Respite</td>
      <td>{{date('d-m-Y', strtotime($resident_agreement->f_period)) }}</td>
      <td>{{date('d-m-Y', strtotime($resident_agreement->ending_on)) }}</td>
     </tr>
     <tr>
      <td width="250px;">Frequency of payment</td>
      <td colspan="2" ><label><input {{ $resident_agreement->freq_pay == 'Weekly' ? 'checked' : ''  }}  type="checkbox" disabled name="freq_pay" value="Weekly"> Weekly</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->freq_pay == 'Fortnightly' ? 'checked' : ''  }}  type="checkbox" disabled name="freq_pay" value="Fortnightly"> Fortnightly</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->freq_pay == 'Every Calender Month' ? 'checked' : ''  }} type="checkbox" disabled name="freq_pay" value="Every Calender Month"> Every Calender Month</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->freq_pay == 'Other' ? 'checked' : ''  }} type="checkbox" disabled name="freq_pay" value="Other"> Other</label>&nbsp;&nbsp;</td>
        </tr>
        <tr>
        <td width="250px;">Any Rent paid in advance</td>
        <td colspan="2"><label><input {{ $resident_agreement->any_rent_adv == 'Weekly' ? 'checked' : ''  }}  type="checkbox" disabled name="any_rent_adv" value="Weekly"> Weekly</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->any_rent_adv == 'Fortnightly' ? 'checked' : ''  }}  type="checkbox" disabled name="any_rent_adv" value="Fortnightly"> Fortnightly</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->any_rent_adv == 'Every Calender Month' ? 'checked' : ''  }} type="checkbox" disabled name="any_rent_adv" value="Every Calender Month"> Every Calender Month</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->any_rent_adv == 'Other' ? 'checked' : ''  }} type="checkbox" disabled name="any_rent_adv" value="Other"> Other</label>&nbsp;&nbsp;</td>
      </tr>
      <td width="250px;">Payment source</td>
      <td colspan="2"><label><input {{ $resident_agreement->pay_method == 'Direct Debit' ? 'checked' : ''  }}  type="checkbox" disabled name="pay_method" value="Direct Debit"> Direct Debit</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->pay_method == 'Cash' ? 'checked' : ''  }}  type="checkbox" disabled name="pay_method" value="Cash"> Cash</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->pay_method == 'State Trustees' ? 'checked' : ''  }} type="checkbox" disabled name="pay_method" value="State Trustees"> State Trustees</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->pay_method == 'Centerlink' ? 'checked' : ''  }} type="checkbox" disabled name="pay_method" value="Centerlink"> Centerlink</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->pay_method == 'Other' ? 'checked' : ''  }} type="checkbox" disabled name="pay_method" value="Other"> Other</label>&nbsp;&nbsp;</td>
      </tr>
    </table>&nbsp;&nbsp;

    <table>
      <tr>
        <td colspan="5"></td>
      </tr>
      <tr>
        <td colspan="5" ><center><b>OTHER FEES AND CHARGES</b></td></center>
      </td>
    </tr>
    <tr>
        <td colspan="5"></td>
    <tr>
      <td colspan="2"><b>Furniture in resident’s room belonging to the SRS</b></td>
      <td>Attach or List items duly signed by staff and resident</td>
    </tr>
    <tr>
        <td  width="300px;">Reservation fee charged:<i>Ref(terms/conditions)</i> </td>
        <td colspan="5"  width="300px;"><input type="radio" disabled onchange="findselected1();" {{ $resident_agreement->reserv_fee == 'Yes' ? 'checked' : ''  }} id="reserv_fee"  value="Yes" name="reserv_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
        <input type="radio" disabled onchange="findselected1();" {{ $resident_agreement->reserv_fee == 'No' ? 'checked' : ''  }}  id="reserv_fee" value="No" name="reserv_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp; 
         <b>Amount:$</b> {{ $resident_agreement->amt_res}} </td>
      </tr>
      <tr>
        <td  width="300px;">Security Deposit Charged: <br></td>
        <td colspan="5" width="300px;">NO Will be refunded subject to all fees are paid in full and room in satisfactory condition</td><br>
      </tr>
      <tr>
        <td width="300px;">Establishment fee charged:<i>Ref(terms/conditions)</i> </td>
        <td  colspan="5" width="300px;"><input type="radio" disabled onchange="findselected2();" {{ $resident_agreement->est_fee == 'Yes' ? 'checked' : ''  }} id="est_fee"  value="Yes" name="est_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
        <input type="radio" disabled onchange="findselected2();" {{ $resident_agreement->est_fee == 'No' ? 'checked' : ''  }}  id="est_fee" value="No" name="est_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
        <b>Amount:$</b> {{ $resident_agreement->amt_est}}
        </td>
      </tr>
      <tr>
        <td width="300px;">Fee in advance charged (for other items/service provide by SRS):<i>Ref(terms/conditions)</i> </td>
        <td colspan="5" width="300px;"><input {{ $resident_agreement->advnc_fee == 'Yes' ? 'checked' : ''  }} type="radio" disabled onchange="findselected3();"  id="advnc_fee"  value="Yes" name="advnc_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input {{ $resident_agreement->advnc_fee == 'No' ? 'checked' : ''  }} type="radio" disabled onchange="findselected3();"  id="advnc_fee" value="No" name="advnc_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                        <b>Amount:$</b> {{ $resident_agreement->amt_adv}} </td>
      </tr>
      <tr>
        <td width="300px;"></td>
        <td colspan="3" width="300px;"></td>
      </tr>
      <tr>
        <td colspan="5">Refunds to resident: (Terms/Conditions): Fees of refund held to be included)<br><br>
          <i>Refunds of money held in trust will be returned to the resident within 14 days of leaving the SRS. A resident can apply to the Victorian Civil and Administrative Tribunal (VCAT) for an order if the proprietor does not refund a security, fee in advance, reservation fee or establishment fee in accordance with the Act, must be included.</i>
        </td>
      </tr>
      <tr>
        <td width="300px;"></td>
        <td colspan="3" width="300px;"></td>
      </tr>
  </table>&nbsp;&nbsp;


    <!--<table>
      <tr>
        <td colspan="5" ><center><b>OTHER FEES AND CHARGES</b></td></center>
      </tr>
      <tr>
        <td rowspan="2" width="300px;"><b>Security Deposit Charged: </b> <br>
        <i>Terms and conditions of refund</i></td>
        <td width="300px;"><input type="radio" disabled {{ $resident_agreement->secu_depo == 'Yes' ? 'checked' : ''  }} id="secu_depo" onchange="findselected();" value="Yes" name="secu_depo">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" disabled {{ $resident_agreement->secu_depo == 'No' ? 'checked' : ''  }} id="secu_depo" value="No" onchange="findselected();" name="secu_depo">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;<b> Amount Payable:$ </b>{{ $resident_agreement->amt_pay}}</td><br>
      </tr>
      <tr>
        <td><i>Will be refunded subject to all fees are paid in full and room in satisifactory condition</i></td>
        </tr>
    </table>&nbsp;&nbsp;
    <table>
      <tr>
        <td colspan="5" ><center><b>OTHER FEES AND CHARGES</b></td></center>
      </tr>
      <tr>
        <td width="300px;"><b>Condition report provided to the resident  </b></td>
        <td width="300px;"><input type="radio" disabled required=""  id="condition_rep" {{ $resident_agreement->condition_rep == 'Yes' ? 'checked' : ''  }}  value="Yes" name="condition_rep">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" disabled required="" {{ $resident_agreement->condition_rep == 'No' ? 'checked' : ''  }} id="condition_rep" value="No" name="condition_rep">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;  If Yes,<i>Condition report must be provided as separate attachment</i>          </td>
      </tr>
      <tr>
        <td width="300px;"><b>Furniture in resident's room belonging to thr SRS</b>
         </td>
        <td width="300px;"><p>Attach or List items duly signed by staff and resident</p></td>
      </tr>
</table><br>
      <table>
        <tr>
        <td  width="300px;">Reservation fee charged:<i>Ref(terms/conditions)</i> </td>
        <td colspan="5"  width="300px;"><input type="radio" disabled onchange="findselected1();" {{ $resident_agreement->reserv_fee == 'Yes' ? 'checked' : ''  }} id="reserv_fee"  value="Yes" name="reserv_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
        <input type="radio" disabled onchange="findselected1();" {{ $resident_agreement->reserv_fee == 'No' ? 'checked' : ''  }}  id="reserv_fee" value="No" name="reserv_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp; 
         <b>Amount:$</b> {{ $resident_agreement->amt_res}} </td>
      </tr>
      <tr>
        <td width="300px;">Establishment fee charged:<i>Ref(terms/conditions)</i> </td>
        <td  colspan="5" width="300px;"><input type="radio" disabled onchange="findselected2();" {{ $resident_agreement->est_fee == 'Yes' ? 'checked' : ''  }} id="est_fee"  value="Yes" name="est_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
        <input type="radio" disabled onchange="findselected2();" {{ $resident_agreement->est_fee == 'No' ? 'checked' : ''  }}  id="est_fee" value="No" name="est_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
        <b>Amount:$</b> {{ $resident_agreement->amt_est}}
        </td>
      </tr>
      <tr>
        <td width="300px;">Fee in advance charged (for other items/service provide by SRS):<i>Ref(terms/conditions)</i> </td>
        <td colspan="5" width="300px;"><input {{ $resident_agreement->advnc_fee == 'Yes' ? 'checked' : ''  }} type="radio" disabled onchange="findselected3();"  id="advnc_fee"  value="Yes" name="advnc_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input {{ $resident_agreement->advnc_fee == 'No' ? 'checked' : ''  }} type="radio" disabled onchange="findselected3();"  id="advnc_fee" value="No" name="advnc_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                        <b>Amount:$</b> {{ $resident_agreement->amt_adv}} </td>
      <tr>
        <td> (Terms/Conditions):Fees of refund heldto be included</td>
        <td  colspan="5"></td>
      </tr>
      <tr>
        <td width="300px;">Refund to resident: {{ $resident_agreement->refund}}</td>
        <td colspan="1" width="500px;"><p><i>Refunds of money held in trust will be returned to the resident within 14 days of leaving the SRS. A resident can apply to the Victorian Civil and Administrative
Tribunal (VCAT) for an order if the proprietor does not refund a security, fee in
advance, reservation fee or establishment fee in accordance with the Act, must be
included.</i></p>
</td>
      </tr>
    </table>&nbsp;&nbsp;-->

    <table >
      <tr>
        <td colspan="5" ><center><b>MANAGEMENT OF RESIDENT’S MONEY</b></td></center>
      </tr>
      <tr>
        <td width="300px;">Will the SRS assist the resident in managing their finances? <input type="radio" disabled onchange="findselected4();" {{ $resident_agreement->srs_assist_status == 'Yes' ? 'checked' : ''  }} id="srs_assist_status"  value="Yes" name="srs_assist_status">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" disabled onchange="findselected4();"  {{ $resident_agreement->srs_assist_status == 'No' ? 'checked' : ''  }} id="srs_assist_status" value="No" name="srs_assist_status">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                        Amount to be managed: {{ $resident_agreement->assist_amnt}} <br>
                        <i>Note:The maximum amount of the resident's money that we can manage is the amount equivalent to one month's fees.</i></td>
      </tr>
    </table><br>

    <table>
      <tr>
        <td colspan="5" ><center><b>ITEMS AND SERVICES PROVIDED
       </b></td></center>
      </tr>
      <tr>
      <td><p><i>Pl note: Resident to notify and list of the frequency and the supports/services that they receive from external agencies/funding, to enable us the provide the right support to you.</i></p><br>
        <p><i>Services offered by SRS included in your weekly fees.</i><br>
<b>Personal and Support Services: Per SRS Act 2010 S.59; r.29</b><br>
Beds/Mattresses, Bedside table<br>
Bedmaking with fresh Linen and bedroom cleaning: Once a week (additional fees apply if required more frequently)<br>
Laundry services: Once a week (additional fees apply if required more frequently)<br>
Cooked Meals – As per KitchenMenu, Other dietary requirements may incur additional costs: no cost, if supported externally.</p><br>
      <p><b><center>Below Supports offered will incur additional charges </b>(tick applicable boxes)</center> </p><br>
      <table style="border: 2px; border-width: 1px; border-color: black;">
        <tr>
          <th>Tick Support/Assistance you require</th>
          <th colspan="3">Level of assistance offered for a fee</th>
          <th>Details/Description</th>
      <tr>
        <td>Types of Support</td>
        <td><b><center>Full</center></b></td>
        <td><b><center>Part</center></b></td>
        <td><b><center>None</center></b></td>
        <td></td>
      </tr>
      
      <tr>
        <td>Bathing and showering</td>
        <td><form action="">    
         {!! $resident_agreement->bath == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
         <td><form action="">    
         {!! $resident_agreement->bath == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td><form action="">    
          {!! $resident_agreement->bath == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
        <td>{{ $resident_agreement->bath_fee}}</td>
      </tr>
      <tr>
        <td>Oral Support</td>
        <td><form action="">    
         {!! $resident_agreement->oral == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}  
        </form></td>
         <td><form action="">    
         {!! $resident_agreement->oral == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}     
        </form></td>
        <td><form action="">    
         {!! $resident_agreement->oral == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}     
        </form></td>
        <td>{{ $resident_agreement->oral_fee}}</td>
      </tr>
      <tr>
        <td>Hair and nails</td>
        <td><form action="">    
         {!! $resident_agreement->hair == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}       
        </form></td>
         <td><form action="">    
         {!! $resident_agreement->hair == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}        
        </form></td>
        <td><form action="">    
         {!! $resident_agreement->hair == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}      
        </form></td>
        <td>{{ $resident_agreement->hair_fee}}</td>
      </tr>
      <tr>
        <td>Toileting</td>
        <td><form action="">    
         {!! $resident_agreement->toileting == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
         <td><form action="">    
         {!! $resident_agreement->toileting == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}     
        </form></td>
        <td><form action="">    
         {!! $resident_agreement->toileting == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}     
        </form></td>
        <td>{{ $resident_agreement->toileting_fee}}</td>
      </tr>
      <tr>
        <td>Mobility</td>
        <td><form action="">    
         {!! $resident_agreement->mobility == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
         <td><form action="">    
         {!! $resident_agreement->mobility == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}
          </form></td>
        <td><form action="">    
         {!! $resident_agreement->mobility == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td>{{ $resident_agreement->mobility_fee}}</td>
      </tr>
      <tr>
        <td>Assistance with medication</td>
        <td><form action="">    
         {!! $resident_agreement->medi_assi == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
         <td><form action="">    
         {!! $resident_agreement->medi_assi == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
        <td><form action="">    
         {!! $resident_agreement->medi_assi == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
        <td>{{ $resident_agreement->medi_assi_fee}}</td>
      </tr>
      <tr>
        <td>Continence management</td>
        <td><form action="">    
         {!! $resident_agreement->continence == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
         <td><form action="">    
         {!! $resident_agreement->continence == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
        <td><form action="">    
         {!! $resident_agreement->continence == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}
        </form></td>
        <td>{{ $resident_agreement->continence_fee}}</td>
      </tr>
      <tr>
        <td>Bed making</td>
        <td><form action="">    
         {!! $resident_agreement->bed_make == 'Full' ?  '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
         <td><form action="">    
         {!! $resident_agreement->bed_make == 'Part' ?  '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
        <td><form action="">    
         {!! $resident_agreement->bed_make == 'None' ?   '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
        <td>{{ $resident_agreement->bed_make_fee}}</td>
      </tr>
      <tr>
        <td>Room Cleaning</td>
        <td><form action="">    
         {!! $rsa->room_cl == 'Full' ?  '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
         <td><form action="">    
         {!! $rsa->room_cl == 'Part' ?  '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
        <td><form action="">    
         {!! $rsa->room_cl == 'None' ?   '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
        <td>{{ $rsa->room_det}}</td>
      </tr>
      <tr>
        <td>Transport Assistance-Details</td>
        <td><form action="">    
         {!! $rsa->tr_assi == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
         <td><form action="">    
         {!! $rsa->tr_assi == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td><form action="">    
         {!! $rsa->tr_assi == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td>{{ $rsa->tr_det}}</td>
      </tr>
       <tr>
        <td>Eating</td>
        <td><form action="">    
         {!! $rsa->eating == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
         <td><form action="">    
         {!! $rsa->eating == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td><form action="">    
         {!! $rsa->eating == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td>{{ $rsa->eat_det}}</td>
      </tr>
      <tr>
        <td>Dressing</td>
        <td><form action="">    
         {!! $resident_agreement->dressing == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
         <td><form action="">    
         {!! $resident_agreement->dressing == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td><form action="">    
         {!! $resident_agreement->dressing == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td>{{ $resident_agreement->dressing_fee}}</td>
      </tr>
      <tr>
        <td>Laundry</td>
        <td><form action="">    
         {!! $rsa->laundry == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
         <td><form action="">    
         {!! $rsa->laundry == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td><form action="">    
         {!! $rsa->laundry == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td>{{ $rsa->laundry_det}}</td>
      </tr>
      <tr>
        <td>Other services required</td>
        <td><form action="">    
         {!! $rsa->other == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
         <td><form action="">    
         {!! $rsa->other == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td><form action="">    
         {!! $rsa->other == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td>{{ $rsa->other_det}}</td>
      </tr><br>
    </table>
        <p><i>Towards any extra services not included above that need to be included may incur additional costs, payable by you towards which will be notified to you after your Support plan assessment. Support needs may change depending on your ongoing requirements and fees may change as a result which will be notified to you. Please note: Support plan review and updates happens at least half yearly or as required on regular basis.</i></p>
        <p><i><b>Room Assistance</b></i></p>
        <p><i>Help with maintaining/cleaning your room and making your bed is available daily when required for extra fee.</i></p>
    <table>
      <tr>
        <td colspan="5" ><center><b>RESIDENT CONCERNS AND COMPLAINTS</b></td></center>
      </tr>
      <tr>
        <td><p>At our facility, complaints (from you/family) and fee dback are taken seriously, and we will do our best to resolve them promptly. We have nominated our Manager as
the person to receive and record residents’ complaints. We will take steps to resolve your complaint, and you will be advised of the outcome. If’ oe are not satis
with the outcome, you/family can also get assistance from a community visitor or from an Authorised Officer of the Department of Health. A copy of the SRS
Residents Handbook for further details, setting out the minimum standards of Support and accommodation, are available at the Office for your information, Living in a SRS — Guide to residents and prospective residents.</p></td>
      </tr>
    </table>&nbsp;&nbsp;
  
    <center>
      <h2>HOUSE RULES</h2>
      <i><b>Rights of Residents:</b></i>You have a right to:<br>
    </center>
    
     <table>
      <tr rowspan="5" style="width: 185px;align-items: center;">
          <td>&nbsp;<li> Receive quality Support.</li>
          <li>Be treated with dignity and respect.</li>
          <li>Have your privacy respected.</li>
          <li>Choose your own doctor/health care protessionals to visit/provide treatment (costs may apply).</li>
          </td>
          <td>&nbsp;<li>Personal and special Support that meets your needs.</li>
          <li>Safe administration of medication.</li>
          <li>Complain about things you are not happy about.</li>
          <li>Be kept informed about things that affect you</li>
          </td>
      </tr>
    </table>&nbsp;&nbsp;
    <table>
      <tr rowspan="5" style="width: 185px;align-items: center;">
        <ul>
          <td><h4><i>Responsibilities of Residents</i></h4>
          <p>Your responsibilities include:</p>
          <li>Obeying the house rules as per our policy guidelines.</li>
          <li>Telephone usage: We suggest you use your personnel phone or Support plan payphone in the corridor for your outgoing call.</li>
          <li>Televisions and other equipment are provided in the common areas,  however you can have your Personnel TV in your room at your expense.</li>
          <li>Complying with obligations sct forth in the residential statement, which includes this document.</li>
          <li>Four weeks notice of your intention to vacate is required (Except in the case of emergency)</li>
          </td>
          <td><h4><i>Responsibilities of Proprietor</i></h4>
          <p>Our responsibilities include:</p>
          <li>Developing and reviewing with you (or your guardian) your personal Support plan.</li>
          <li>Ensuring you are provided with the services as set out in the residential statement.</li>
          <li> Ensuring all staff interact with you in a way that reflects the philosophy of Meadowbrook SRS.</li>
          <li>Consulting with you as soon as possible about any changes that may affect you.</li>
          </td>
        </ul>
      </tr>
    </table>&nbsp;&nbsp;
    <br><br><br><br><br><br>
    <p> <b>1. Smoking/Hlegal drug usage</b></p>
    <p>The policy of the facility is that there is no smoking in individual rooms. Management does not allow smoking or use of any illegal substance use in the facility. Areas are available outdoors. If caught, will be notified to the police.</p>
    <p> 2. Notification of your intention (o be away overnight or during the day is required. If possible a contact phone number would be appreciated.</p>
    <p> 3. Residents furniture that is lett after departure from the facility will incur storage fees.</p>
    <p> 4. Room Keys Each suite is lockable; the manager to use in the case of emergency keeps a spare key. The resident must replace locked keys.</p>
    <p> 5.All items owned by a resident and used in the SRS must be safety checked for electrical compliance. All Electrical Appliances bought by residents to be Test and Tagged.</p>
    <p> 6. If any damage to property including fitting and fixtures will be my responsibility if occurred as a result of my behaviours.</p>
    <p> 7. I declare that I have read and or Staff has read to me “The Guide for resident and Prospective residents in detail. | understand there is electronic copy on computer if needed.</p>
    <p> 8. Tam happy with the room arrangements/partition surrounding Privacy matters of my room (applicable if 1 am living in shared room),</p>&nbsp;&nbsp;
    <br><br><br>

    <p><b>Television and Telephones</p></b>
    <p>Residents to use their own TV and other Electronic gadgets. Each room has a telephone socket and television plug. Residents are responsible for all expenses incurred for connection and calls, should a telephone be installed</p>
    

    <p><i><b>Furniture</i></p></b>
    <p>We provide the following basic bedroom furniture. A Wardrobe, Single Bed, Bedside cabinet</p>
    <p>We try to encourage residents to fill the room with their own treasure and furniture from home to make more comfortable for them.</p>
    <p><i><b>Hairdressing</i></p></b>
    <p>In-house hairdressing service is available once a month. Charges paid directly to the Hairdresser.</p>
    <br><br><br>
    
    <p><i><h3>Health and Community Services available in the vicinity</h3></i></p>
    <p><b>General</b></p>
    <ul>
      <li>Medical and Health Care</li>
      <li>Primary Medical Centre: 247-251 Station Road Melton 8746 0200</li>
      <li>Westcare Medical Centre: 1/211 Barries Road Melton West 9747 5800</li>
      <li>Pharmaceutical Services: Meadowbrook SRS has an arrangement with the local pharmacist Archers and UFS Pharmacy</li>
      <li>Community services available in the area</li>
      <li>West Melton Community centre 2 West Melton Drive Melton West Phone: 97434069</li>
      <li>Offers range of outings, social gatherings for the elderly</li>
      <li>Melton Community Centre</li>
      <li>High street Melton Vic Phone 9747 0700</li>
            <li>A Great place to get in touch with any activities, meetings, and clubs within the area to attend</li>
            <li>City West Community Church: PO BOX 684 Melton Phone 9743 9473</li>
            <li>Offering wide variety church meetings, gathering within the community</li>
            <li>Aids and Appliances: The resident is responsible for the payment of any aids or appliances required</li>
            <li>Podiatry: We use Carepro that visit us every 6 weeks with a charge of $30 per visit</li>
            <li>Social: -Twice weekly activities are offered in- house</li>
            <li>Every effort will be made to provide and coordinate community-based services required by the individual as the need arises</li>
    </ul>
    <table>
      <tr>
        <td></td>
      </tr>
    </table>
      <br>
    <br><br><br>

    <table>
      <tr>
            <div style="border:1px solid black;">
            <center><b>ROUTINES OBSERVED AT SRS</b></center>
            </div>
             <td><p><i><b>Routines</b><br></i>
             <p>Our facility being A home away from home. Routines are kept to a minimum and are Iexible. We do our best to cater for your individual needs. Routines that may affect you include:<br>
             <i><b>Meals</b></i><br>
             Breakfast from 8.00 am to 8:45am<br>
             Available in dining room or may be served in own room if requested or if a resident is unwell<br>
             Morning Tea&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10.00 am to 10.30 am<br>
              Lunch&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12.00 to 1.00 pm<br>
             Afternoon Tea&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.00 pm to 3.30 pm<br>
             Dinner&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.00 pm to 5:30 pm<br>
             Supper&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7 Pm to 7:30 pm<br>
             Wending Machine located in dining area is available at all times<br>
             Morning/afternoon tea and supper include a variety of beverages and biscuits/cakes, Tea/coffee making facilities are available during all meal times.<br>
             <i><b>Cleaning</b></i><br>
             Cleaning is undertaken daily, between 9 a.m. and if.30am, and between 1.30 p.m. and 4 p.m depending on the roster. You may be asked to step out of your room during those times to enable cleaning to be done.</p><br>
             <p><i><b>Regular visitors</b></i><br>
             <i>Chaplain: Every fortnight<br>
             Computer and Internet: we have free computer and Internet usage<br>
             Library service (mobile): yet to start,<br>
             Podiatrist: Once a month,<br>
            Doctor: Every week. You have the right to choose either your preferred or our in-house visiting doctor
(An appointment or booking must be made to see Doctor/Podiatrist)</p></i>
            </td>
            </tr>
          </table>
        <br>
      <table>
      <tr>
           <div style="border:1px solid black;">
            <center><b>SPECIAL TERMS</b></center>
            </div>
            <td><ul>
              <li>We cannot accommodate residents experiencing chronic incontinence. Residents need to be able to transfer independently from bed  to mode or toilet.</li>
              <li>Residents must comply by facility rules, three warning will be given verbally and one in writing.</li>
              <li>If resident still doesn’t correspond, you will be given one week notice to vacate his/her room.</li>
              <li>Illicit Drugs and Alcohol consumption found in resident’s rooms will result in issuing “Notice io Vacate” immediately.</li>
              <li>Physical abuse to staff and residents may result in issuing Notice to vacate.</li>
              <li>Admission is based on four weeks respite leading to permanent if the resident follows policy and procedure of the SRS.</li>
              <li>Other:</li>
            </ul>
          </td>
        </tr>
      </table><br><br>
      <table>
      <tr>
           <div style="border:1px solid black;">
            <center><b>HOW THIS AGREEMENT CAN BE ENDED</b></center>
            </div>
            <td><p>Example: <i>A residential and services agreement may be ended:</i></p>
            <ul>
              <li>when the resident and proprictor agree that it has terminated.</li>
              <li>when an order to vacate has been made by the Victorian Civil and Administrative Tribunal (VCAT).</li>
              <li>when a resident abandons his/her room or if the resident dies, or.</li>
              <li>A resident moves out of the SRS, whether or not the resident has given a notice of intention to vacate (min of 4 weeks notice).</li>
            </ul>
          </td>
        </tr>
      </table><br><br>
      <table>
      <tr>
           <div style="border:1px solid black;">
            <center><b>NOTICES TO VACATE BY PROPRIETOR:</b>With minimum notice/under certain circumstances, resident may be given a notice to vacate.</center>
            </div>
            <td><p>These are :</p>
            <ul>
              <li>if aresident endangers the safety of others (immediate notice).</li>
              <li>if a resident causes serious damage or serious disruption (immediate notice).</li>
              <li> if a resident uses the SRS for an illegal purpose (2 days notice)</li>
              <li>if aresident requires more health Support or personal support than can be provided at the SRS (14 days notice).</li>
              <li>ifthe proprietor proposes to cease operating the SRS (28 days notice)</li>
              <li>if the proprietor intends to repair or renovate the SRS (60 days notice)</li>
            </ul>
            <p>If the immediate notice relates to your behaviour or actions, you will be liable to pay fees for fourteen days or until another resident occupies your place, which ever occurs earlier. Any fees paid in advance beyond that period will be refunded to you.<br>
              If the immediate notice does not relate to your actions or behaviour, you will not be liable to pay fees beyond the date of your departure<br>
              If you fall into arrears in payment of your fees we may give you fourteen days notice to vacate, and you will be liable to pay fees up to the expiration date of the notice.<br></p>
              <ul class="bullet">
                <li style="color: blue;"><span><i>Refer to SRS Residents Handbook for further details:</i></span></li>
                <li style="color: blue"><span><i>If you disagree with a notice to vacate, you can apply to the Victorian Civil and Administrative Tribunal (VCAT).</i></span></li>
              </ul>

          </td>
        </tr>
      </table><br>
    </i></div>
    <table>
      <tr>
        <td>
           <div style="border:1px solid black;">
            <center><b>NOTICES TO VACATE BY RESIDENT</b></center>
            </div>
            <p>If the resident wishes to vacate this SRS he/she must give minimum of 4 weeks written notice.</p>
          </td>
          </tr>
        </table><br>
      <table>
      <tr>
        <td colspan="2">
           <div>
            <center><b>AGREEMENT</b></center>
            </div>
            <p>All direct services identified in this document will be provided, if required, in accord with the principles of the SRS PP ACT, the accompanying Regulations, and the House Rules.</p>
            <p><b>Review of fees:</b>Fees for in house services/rental may be reviewed every six months or depending on your Support needs. You will be notified 28 days before the increase in writing.<br>In the event of someone dying or getting moved to a nursing home. fees will be paid up till the end of the week only.</p>
            <p><b>Specific Services Agreed to:</b></p>
            <p>I have read the terms and conditions in this agreement, including the House Rules, and agree to abide by these terms and conditions and have received a copy of this Residential and Services Agreement within 48 hours of my admission.</p>
            <p>I agree, that I have inspected the room and am happy with the condition and the privacy sharing with my new room-mate (if sharing the partitioned/room).</p>
          </td>
        </tr>
        <tr>
          <td><i>Office of the Public Advocate (OPA)</i><br>
            OPA provides advice and information via its Advice Service, publications and
website. Its role is to advocate for people with a cognitive disability who are
at serious risk, to provide guardianship for adults with a cognitive disability
(intellectual disability, acquired brain injury, mental illness, dementia), and to
support family and friends appointed as a guardian through its Private
Guardian Support Program. OPA can be contacted at 5th Floor, 436 Lonsdale
Street Melbourne 3000 or by phone on 1300 309 337</i></td>
<td><i>Community Visitors (CVs)</i><br>
  CVs are independent visitors appointed by the Public Advocate, who visit our facility
from time to time, or at your request. They can provide you with free, impartial and
confidential advice on matters to do with your stay at Meadowbrook SRS. They can
also help you if you have a complaint. Details of how to contact the CVs are on our
notice board, or you can phone OPA on 9603 9500 or 1800 136 829 (country only).
Our staff can also help you make contact with the CVs</td>
          </tr>
        </table><br><br>
        <table style="border: 2px; border-width: 1px; border-color: black;">
          <tr>
            <td></td>
            <td>Name</td>
            <td>Signature</td>
            <td>Witness</td>
            <td>Date</td>
          </tr>
          <tr>
            <td>Proprietor/ Manager</td>
            <td>{{ $resident_agreement->pr_name}}</td>
            <td></td>
            <td>{{ $resident_agreement->pr_wit}}</td>
            <td>{{date('d-m-Y', strtotime($resident_agreement->pr_date)) }}</td>
          </tr>
          <tr>
            <td>Resident</td>
            <td>{{ $rsa->re_name}}</td>
            <td></td>
            <td>{{ $rsa->re_wt}}</td>
            <td>{{date('d-m-Y', strtotime($rsa->re_date)) }}</td>
          </tr>
          <tr>
            <td colspan="5"><center>PL Note: Signature can be (Resident/Resident&#39;s Relative/Resident&#39;s Guardian)</center></td>
          </tr>
          <tr>
            <td colspan="5"></td>
          </tr>
        </table>
        <p><b>Residential and Services Agreement - Summary for resident</b></p>
        <ul>
          <li>Your fee to stay here will be $ <u>{{ $client->week_rent}} </u> per week</li>
          <li>You will pay your fee weekly/fortnightly</li>
          <li>The length of your stay here is <u>{{ $client->weeks}} weeks</u> </li>
          <li>Meal times: As per RSA Agreement. Unless Meal time variations are requested..</li>
          <li>You are not allowed to smoke or use illicit drugs inside your room or the SRS</li>
          <li>You have nominated {{ $resident_agreement->p_nomini}}  to receive information about your personal support and accommodation</li>
          <li>We will provide you with a support plan that will list all of the support and services you require. This will be reviewed regularly with you, and persons nominated in your life.</li>
          <li>You may be given a Notice to Vacate if you do not comply with the RSA agreement or if you require more personal support than the SRS can provide.</li>
          <li>If you want to move out, please let us know 4 weeks before you wish to leave</li>
          <li>If you have a complaint you can contact
          <ul>
            <li>Name of SRS staff member:</li>
            <li>the Department of Health: 9096 6962 or</li>
            <li>Community Visitors: 1300 309 337</li>
          </ul>
        </li>
          <li>This agreement starts on {{ $rsa->st_sdt}}</li>
          <li>This agreement ends on {{ $rsa->st_edt}} (if known)</li>
        </ul>
        <table style="border: 2px; border-width: 1px; border-color: black;">
          <tr>
            <td></td>
            <td>Print Name</td>
            <td>Signature</td>
            <td>Date</td>
          </tr>
          <tr>
            <td>Resident</td>
            <td>{{ $rsa->re_name}}</td>
            <td></td>
            <td>{{date('d-m-Y', strtotime($rsa->re_date)) }}</td>
          </tr>
          <tr>
            <td>Proprietor/ Manager</td>
            <td>{{ $resident_agreement->pr_name}}</td>
            <td></td>
            <td>{{date('d-m-Y', strtotime($resident_agreement->pr_date)) }}</td>
          </tr>
        </table><br>
        <table style="border: 2px; border-width: 1px; border-color: black;">
          <tr>
            <td colspan="5">PL check if notified to Accounts?<input type="radio" disabled required=""  id="not_acc" {{ $rsa->not_acc == 'No' ? 'checked' : ''  }}  value="No" name="not_acc">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                        <input type="radio" disabled required="" {{ $rsa->not_acc == 'Yes' ? 'checked' : ''  }} id="not_acc" value="Yes" name="not_acc">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;<i>Email to Accounts: accounts@gracemanor.com.au</i> </td>
                      </tr>
                      <tr>
            <td colspan="5"><b>Condition Report Provided to Resident</b><input type="radio" disabled required=""  id="condition_rep" {{ $resident_agreement->condition_rep == 'Yes' ? 'checked' : ''  }}  value="Yes" name="condition_rep">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" disabled required="" {{ $resident_agreement->condition_rep == 'No' ? 'checked' : ''  }} id="condition_rep" value="No" name="condition_rep">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;  If Yes,<i style="color:blue;">Condition report must be provided as separate attachment</i>   </td>
                      </tr>
                    </table>

              </div>
            </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@stop

@section('moar_scripts')
@include ('partials.bootstrap-table')
@stop
