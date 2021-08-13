<!-- pdf.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RESIDENTIAL AND SERVICES AGREEMENT
    </title>
    
   
  <style type="text/css">
  p{
    left: 10px;
  }
table, td, th {
  border: 1px solid black;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }
  .container{
  width: 1000px;
  padding: 50px;
  margin: auto;
  border: 3px solid black;

  }
  .container-head{
    padding-left: 10px;
  }
  input.right {
        float: right;
        right: 30px;
      }
  </style>

    <link rel="stylesheet" href="{{ url(mix('css/dist/report.css')) }}">


  </head>

  <body onload="checkEdits()">
  
  <div id="webui">
    <div id="edit2" contenteditable="true">

    <div class="row">
      
      <input type="button" class="right" style="right: 90px; align-items: right;" onclick="printDiv('print-content1')" value="PRINT"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="button" style="left:200px;" value="SAVE" onclick="saveEdits()"/>&nbsp;&nbsp;&nbsp;<br><br>
      <div id="print-content">
        <div class="container">

    <center>
      <h1 >MEADOWBROOK</h1>
    </center>
    <p style="font-size: 15px;"><center><b>2-10 Brid Rd Melton South Vic: 3338 Ph: 03-97476999 Fax: 03-97460344 Email: info@meadowbrook.com.au</b></p></center>
    <h3><center>RESIDENTIAL AND SERVICES AGREEMENT</center></h3><br>
    <div class="container-head">
    <p><i>Type of service</i></p>
    <p>Our facility is a Supported Residential Service</p>
    <p><i>Philosophy</i></p>
    <p>At Meadowbrook SRS we believe that all people must be treated as individuals and deserve Support and services based upon their individual emotional, spiritual, social, physical, intellectual, and aesthetic needs. Treat this as your home!</p>
    <p><i>Objectives</i></p>
    <p><i>The objectives of Meadowbrook SRS are:</i></p>
    <ul>
      <li>To provide high quality special and personal Support.</li>
      <li>To provide a warm and caring social environment.</li>
      <li>To ensure each resident receives Support based on his or her individual needs.</li>
      <li>To ensure each resident is able to participate in appropriate activities of his or her choice.</li>
      <li>To ensure all services listed in the residential statement are available.</li><br>
    </ul>
      <table>
        <tr>
          <td>&nbsp;&nbsp;Proprietor: Pradeep Divukar: Telephone: 01283 I 5689</td>
          <td>&nbsp;&nbsp;Manager: Pradeep D:  Telephone: 03-97 476999</td>
        </tr>
      </table><br>
    <p>This is an agreement between a resident and the proprietor of this SRS regarding the terms and condition of your stay in the SRS. This SRS is regulated by the Department of Health. We deliver services in a way that is consistent with the principles and standards set out in the Supported Residential Services ACT 2010, and the private proprietor of new dimensions PTY LTD.</p><br>
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
    <td><b>Resident's:</b> Guardian/Administrator</td>
    <td>{{ $resident_agreement->guardian}}</td>
    <td>Telephone {{ $resident_agreement->g_tel}}</td>
    <td>Address (postal and/or email) {{ $resident_agreement->g_adress}}</td>
  </tr>
  <tr>
    <td colspan="4" style="width: 185px;"><i>A resident may nominate a person to receive information about the resident 's accomadation and personal support received at the SRS</i></td>
  </tr>
  <tr>
    <td><b>Person Nominated:</b></td>
    <td>{{ $resident_agreement->p_nomini}}</td>
    <td>Telephone {{ $resident_agreement->per_tel}}</td>
    <td>Address (postal and/or email) {{ $resident_agreement->per_address}}</td>
  </tr>
  <tr>
    <td><b>Emergency Contact:</b></td>
    <td>{{ $resident_agreement->emg_contact}}</td>
    <td>Telephone {{ $resident_agreement->emg_tel}}</td>
    <td>Address (postal and/or email) {{ $resident_agreement->emg_address}}</td>
  </tr>
</table>&nbsp;&nbsp;
    <table>
  <tr>
    <td colspan="5" ><center><b>DURATION OF STAY</b></td></center>
  </tr>
  <tr>
    <td>Your stay is for a fixed period</td>
    <td>Starting on : {{date('d-m-Y', strtotime($resident_agreement->f_period)) }}  and Ending on :{{date('d-m-Y', strtotime($resident_agreement->ending_on)) }}</td>
  </tr>
  <tr>
    <td>Your stay is for an indefinite period</td>
    <td>Starting on : @if($resident_agreement->respite == "Permanent") {{date('d-m-Y', strtotime($resident_agreement->i_period)) }} @endif</td>
  </tr>
</table>&nbsp;&nbsp;
    <table>
      <tr>
        <td colspan="5" ><center><b>FEES AND CHARGES</b></td></center>
      </tr>
      <tr>
        <td>Fee for accommodation and personal support:  </td>
        <td>Amount:$  {{ $resident_agreement->acc_fee}}</td>
      </tr>
      <tr>
        <td>Frequency of payment: </td>
        <td><label><input {{ $resident_agreement->freq_pay == 'Weekly' ? 'checked' : ''  }}  type="checkbox" name="freq_pay" value="Weekly"> Weekly</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->freq_pay == 'Fortnightly' ? 'checked' : ''  }}  type="checkbox" name="freq_pay" value="Fortnightly"> Fortnightly</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->freq_pay == 'Every Calender Month' ? 'checked' : ''  }} type="checkbox" name="freq_pay" value="Every Calender Month"> Every Calender Month</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->freq_pay == 'Other' ? 'checked' : ''  }} type="checkbox" name="freq_pay" value="Other"> Other</label>&nbsp;&nbsp;
        </td>
      </tr>
      <tr>
        <td>Any rent paid in advance: </td>
        <td><label><input {{ $resident_agreement->any_rent_adv == 'Weekly' ? 'checked' : ''  }}  type="checkbox" name="any_rent_adv" value="Weekly"> Weekly</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->any_rent_adv == 'Fortnightly' ? 'checked' : ''  }}  type="checkbox" name="any_rent_adv" value="Fortnightly"> Fortnightly</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->any_rent_adv == 'Every Calender Month' ? 'checked' : ''  }} type="checkbox" name="any_rent_adv" value="Every Calender Month"> Every Calender Month</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->any_rent_adv == 'Other' ? 'checked' : ''  }} type="checkbox" name="any_rent_adv" value="Other"> Other</label>&nbsp;&nbsp;</td>
      </tr>
      <tr>
        <td>How to pay: </td>
        <td><label><input {{ $resident_agreement->pay_method == 'Direct Debit' ? 'checked' : ''  }}  type="checkbox" name="pay_method" value="Direct Debit"> Direct Debit</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->pay_method == 'Cash' ? 'checked' : ''  }}  type="checkbox" name="pay_method" value="Cash"> Cash</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->pay_method == 'State Trustees' ? 'checked' : ''  }} type="checkbox" name="pay_method" value="State Trustees"> State Trustees</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->pay_method == 'Centerlink' ? 'checked' : ''  }} type="checkbox" name="pay_method" value="Centerlink"> Centerlink</label>&nbsp;&nbsp;
                                <label><input {{ $resident_agreement->pay_method == 'Other' ? 'checked' : ''  }} type="checkbox" name="pay_method" value="Other"> Other</label>&nbsp;&nbsp;</td>
      </tr>
    </table>&nbsp;&nbsp;
    <table>
      <tr>
        <td colspan="5" ><center><b>OTHER FEES AND CHARGES</b></td></center>
      </tr>
      <tr>
        <td rowspan="2" width="300px;"><b>Security Deposit Charged: </b> <br>
        <i>Terms and conditions of refund</i></td>
        <td width="300px;"><input type="radio" {{ $resident_agreement->secu_depo == 'Yes' ? 'checked' : ''  }} id="secu_depo" onchange="findselected();" value="Yes" name="secu_depo">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" {{ $resident_agreement->secu_depo == 'No' ? 'checked' : ''  }} id="secu_depo" value="No" onchange="findselected();" name="secu_depo">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;<b> Amount Payable:$ </b>{{ $resident_agreement->amt_pay}}</td><br>
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
        <td width="300px;"><input type="radio" required=""  id="condition_rep" {{ $resident_agreement->condition_rep == 'Yes' ? 'checked' : ''  }}  value="Yes" name="condition_rep">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" required="" {{ $resident_agreement->condition_rep == 'No' ? 'checked' : ''  }} id="condition_rep" value="No" name="condition_rep">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;  If Yes,<i>Condition report must be provided as separate attachment</i>          </td>
      </tr>
      <tr>
        <td width="300px;"><b>Furniture in resident's room belonging to thr SRS</b>
         </td>
        <td width="300px;"><p>Attach or List items duly signed by staff and resident</p></td>
      </tr>
</table><br><br>
      <table>
        <tr>
        <td  width="300px;">Reservation fee charged:<i>Ref(terms/conditions)</i> </td>
        <td colspan="5"  width="300px;"><input type="radio" onchange="findselected1();" {{ $resident_agreement->reserv_fee == 'Yes' ? 'checked' : ''  }} id="reserv_fee"  value="Yes" name="reserv_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
        <input type="radio" onchange="findselected1();" {{ $resident_agreement->reserv_fee == 'No' ? 'checked' : ''  }}  id="reserv_fee" value="No" name="reserv_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp; 
         <b>Amount:$</b> {{ $resident_agreement->amt_res}} </td>
      </tr>
      <tr>
        <td width="300px;">Establishment fee charged:<i>Ref(terms/conditions)</i> </td>
        <td  colspan="5" width="300px;"><input type="radio" onchange="findselected2();" {{ $resident_agreement->est_fee == 'Yes' ? 'checked' : ''  }} id="est_fee"  value="Yes" name="est_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
        <input type="radio" onchange="findselected2();" {{ $resident_agreement->est_fee == 'No' ? 'checked' : ''  }}  id="est_fee" value="No" name="est_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
        <b>Amount:$</b> {{ $resident_agreement->amt_est}}
        </td>
      </tr>
      <tr>
        <td width="300px;">Fee in advance charged (for other items/service provide by SRS):<i>Ref(terms/conditions)</i> </td>
        <td colspan="5" width="300px;"><input {{ $resident_agreement->advnc_fee == 'Yes' ? 'checked' : ''  }} type="radio" onchange="findselected3();"  id="advnc_fee"  value="Yes" name="advnc_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input {{ $resident_agreement->advnc_fee == 'No' ? 'checked' : ''  }} type="radio" onchange="findselected3();"  id="advnc_fee" value="No" name="advnc_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
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
    </table>&nbsp;&nbsp;

    <table >
      <tr>
        <td colspan="5" ><center><b>MANAGEMENT OF RESIDENT’S MONEY</b></td></center>
      </tr>
      <tr>
        <td width="300px;">Will the SRS assist the resident in managing their finances? <input type="radio" onchange="findselected4();" {{ $resident_agreement->srs_assist_status == 'Yes' ? 'checked' : ''  }} id="srs_assist_status"  value="Yes" name="srs_assist_status">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" onchange="findselected4();"  {{ $resident_agreement->srs_assist_status == 'No' ? 'checked' : ''  }} id="srs_assist_status" value="No" name="srs_assist_status">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                        Amount: {{ $resident_agreement->assist_amnt}} <br>
                        <i>Note:The maximum amount of the resident's money that we can manage is the amount equivalent to one month's fees.</i></td>
      </tr>
    </table><br>

    <table>
      <tr>
        <td colspan="5" ><center><b>ITEMS AND SERVICES PROVIDED
       </b></td></center>
      </tr>
      <tr>
      <td><p><i>Services offered</i></p><br>
        <p><b>Towards any extra services that need to be included may incur variations in your charge/week, payable by
towards which will be notified to you after your Support plan assessment. Care and Support needs may change
depending on your ongoing requirements and fees may change.</b></p><br>
      <p><b>Personal and Special Support Services</b>(tick applicable boxes) </p><br>
      <table style="border: 2px; border-width: 1px; border-color: black;">
      <tr>
        <th>Types of Support</th>
        <th colspan="3">Level of assistance offered</th>
        <th>Included in fee</th>
      </tr>
      <tr>
        <td></td>
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
      </tr><br>
    </table>
      <h7><p><i><b>Other Services</b></i></p></h7>
        <p>Please note: Support plan review and updates happens on regular basis.</p>
       <h7><p><i><b>Room maintenance</b></i></p></h7>
        <p>Help with maintaining your room and making your bed is available daily when required.</p>
       <h7><p><i><b>Personal Laundry</b></i></p></h7>
        <p>Assist with personal laundry is available once a week (Depends on individual circumstances). Current cost for this service is S0 All articles must be washing machine safe and clearly marked with the resident's name.</p><br>
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
    <p> 1. Smoking/Hlegal drug usage</p>
    <p>The policy of the facility is that there is no smoking in individual rooms. Management does not allow smoking or use of any illegal substance use in the facility. Areas are available outdoors. If caught, will be notified to the police.</p>
    <p> 2. Notification of your intention (o be away overnight or during the day is required. If possible a contact phone number would be appreciated.</p>
    <p> 3. Residents furniture that is lett after departure from the facility will incur storage fees.</p>
    <p> 4. Room Keys Each suite is lockable; the manager to use in the case of emergency keeps a spare key. The resident must replace locked keys.</p>
    <p> 5.All items owned by a resident and used in the SRS must be safety checked for electrical compliance. All Electrical Appliances bought by residents to be Test and Tagged.</p>
    <p> <b>6. If any damage to property including fitting and fixtures will be my responsibility if occurred as a result of my behaviours.</b></p>
    <p><b> 7. I declare that I have read and or Staff has read to me “The Guide for resident and Prospective residents in detail. | understand there is electronic copy on computer if needed.</b></p>
    <p> <b>8. Tam happy with the room arrangements/partition surrounding Privacy matters of my room (applicable if 1 am living in shared room),</b></p>&nbsp;&nbsp;
    <p><i><b>Television and Telephones</i></p></b>
    <p>Residents to use their own TV and other Electronic gadgets. Each room has a telephone socket and television plug. Residents are responsible for all expenses incurred for connection and calls, should a telephone be installed</p>
    <p><i><b>Furniture</i></p></b>
    <p>We provide the following basic bedroom furniture. A Wardrobe</p>
    <p>Single Bed</p>
    <p>Bedside cabinet</p>
    <p>We try to encourage residents to fill the room with their own treasure and furniture from home to make more comfortable for them.</p>
    <p><i><b>Hairdressing</i></p></b>
    <p>In-house hairdressing service is available once a month. Charges paid directly to the Hairdresser.</p>
    <p><i><h3>Health and Community Services available in the vicinity</h3></i></p>
    <p>General</p>
    <ul>
      <li>Medical and Health Care</li>
      <li>Primary Medical Centre: 247-251 Station Road Melton 8746 0200</li>
      <li>Westcare Medical Centre: 1/211 Barries Road Melton West 9747 5800</li>
      <li>Pharmaceutical Services: Meadowbrook SRS has an arrangement with the local pharmacist Archers and UFS Pharmacy</li>
      <li>Community services available in the area</li>
      <li>West Melton Community centre 2 West Melton Drive Melton West Phone: 97434069</li>
      <li>Offers range of outings, social gatherings for the elderly</li>
      <li>Melton Community Centre</li>
    </ul>
      <br>


          <table>
            <tr>
              <td>
          <ul>
            <li>High street Melton Vic Phone 9747 0700</li>
            <li>A Great place to get in touch with any activities, meetings, and clubs within the area to attend</li>
            <li>City West Community Church: PO BOX 684 Melton Phone 9743 9473</li>
            <li>Offering wide variety church meetings, gathering within the community</li>
            <li>Aids and Appliances: The resident is responsible for the payment of any aids or appliances required</li>
            <li>Podiatry: We use Carepro that visit us every 6 weeks with a charge of $30 per visit</li>
            <li>Social: -Twice weekly activities are offered in- house</li>
            <li>Every effort will be made to provide and coordinate community-based services required by the individual as the need arises</li>
          </ul>
        </td>
      </tr>
    </table><br>
    <table>
      <tr>
            <div style="border:1px solid black;">
            <center><b>ROUTINES OBSERVED AT SRS</b></center>
            </div>
             <td><p><i><b>Routines</b></i></p>
             <p>Our facility being A home away from home. Routines are kept to a minimum and are Iexible. We do our best to cater for your individual needs. Routines that may affect you include:</p>
             <p><i><b>Meals</b></i></p>
             <p>Breakfast from 8.00 am to 8:45am</p>
             <p>Available in dining room or may be served in own room if requested or if a resident is unwell</p>
             <p>Morning Tea&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10.00 am to 10.30 am</p>
             <p> Lunch&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12.00 to 1.00 pm</p>
             <p>Afternoon Tea&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.00 pm to 3.30 pm</p>
             <p>Dinner&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.00 pm to 5:30 pm</p>
             <p>Supper&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7 Pm to 7:30 pm</p>
             <p>Wending Machine located in dining area is available at all times</p>
             <p>Morning/afternoon tea and supper include a variety of beverages and biscuits/cakes, Tea/coffee making facilities are available during all meal times.</p>
             <p><i><b>Cleaning</b></i></p>
             <p>Cleaning is undertaken daily, between 9 a.m. and if.30am, and between 1.30 p.m. and 4 p.m depending on the roster. You may be asked to step out of your room during those times to enable cleaning to be done.</p><br>
             <p><i><b>Regular visitors</b></i></p>
             <p>Chaplain: Every fortnight</p>
             <p>Computer and Internet: we have free computer and Internet usage</p>
             <p>Library service (mobile): yet to start,</p>
             <p>Podiatrist: Once a month,</p>
            <p>Doctor: Every week. You have the right to choose either your preferred or our in-house visiting doctor
(An appointment or booking must be made to see Doctor/Podiatrist)</p>
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
            <td><p>Example: 4 <i>A residential and services agreement may be ended:</i></p>
            <ul>
              <li>when the resident and proprictor agree that it has terminated.</li>
              <li>when an order to vacate has been made by the Victorian Civil and Administrative Tribunal (VCAT).</li>
              <li>when a resident abandons his/her room or if the resident dies, or.</li>
              <li>Aresident moves out of the SRS, whether or not the resident has given a notice of intention to vacate (min of 4 weeks notice).</li>
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
            </ul>
          </td>
        </tr>
      </table>
    </i></div>
</div></div>

</div></div></div>
<script type="text/javascript">
  function saveEdits() {

//get the editable element
var editElem = document.getElementById("edit2");

//get the edited element content
var userVersion = editElem.innerHTML;

//save the content to local storage
localStorage.userEdits = userVersion;

//write a confirmation to the user
document.getElementById("update").innerHTML="";

}

function checkEdits() {

//find out if the user has previously saved edits
if(localStorage.userEdits!=null)
document.getElementById("edit2").innerHTML = localStorage.userEdits;
}
</script>



<script type="text/javascript">
     function printDiv(divName) {
        var htmlToPrint = '' +
        '<style type="text/css">' +
        'table {' +
        'border: 1px solid black;' +
        '    width: 100%;' +
        'border-collapse: collapse;' +
        '}' +
        'td {' +
        'border: 1px solid black;' +
        '    width: 200px;' +
        'border-collapse: collapse;' +
        '}' +
         '.container{' +
          'width: 1000px;' +
          'padding: 10px;' +
          'margin: auto;' +
          'border: 1px solid black;' +
          '}' +
        '</style>';

        htmlToPrint += document.getElementById(divName).outerHTML;
        w=window.open();
        w.document.write(htmlToPrint);
        w.print();
        w.close();
    }
</script>

  </body>
</html>
