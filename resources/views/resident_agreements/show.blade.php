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
      <td>
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
        
    <br><br>
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
        </table><br>
        <p><b>Residential and Services Agreement - Summary for resident</b></p>
        <ul>
          <li>Your fee to stay here will be $ <u>{{ $client->week_rent}} </u> per week</li>
          <li>You will pay your fee weekly/fortnightly</li>
          <li>The length of your stay here is <u>{{ $client->weeks}} weeks</u> </li>
          <li>You have nominated {{ $resident_agreement->p_nomini}}  to receive information about your personal support and accommodation</li>
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
