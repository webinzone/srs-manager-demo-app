<!-- pdf.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RESIDENTIAL AND SERVICES AGREEMENT
    </title>
    
   
  <style type="text/css">

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
  input.right {
        float: right;
        right: 30px;
      }
  </style>




  </head>

  <body>

  <div id="webui">
    <div class="row">
      <input type="button" class="right" style="right: 30px; align-items: right;" onclick="printDiv('print-content')" value="PRINT"/>&nbsp;&nbsp;&nbsp;<br><br>
      <div id="print-content">
        <div class="container">

    <center>
      <h1 >MEADOWBROOK</h1>
    </center>
    <h2>RESIDENTIAL AND SERVICES AGREEMENT</h2><br>
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
      <li>To ensure all services listed in the residential statement are available.</li>
    </ul><br>
    <p>This is an agreement between a resident and the proprietor of this SRS regarding the terms and condition of your stay in the SRS. This SRS is regulated by the Department of Health. We deliver services in a way that is consistent with the principles and standards set out in the Supported Residential Services ACT 2010, and the private proprietor of new dimensions PTY LTD.</p><br>
    <table>
      <tr>
        <td rowspan="2" style="width: 185px;align-items: center;">&nbsp;&nbsp;&nbsp;&nbsp;<b>RESIDENT DETAILS</b></td>
        <td>Name:  {{ $resident_agreement->r_name}}</td>
        <td>Room No:  {{ $resident_agreement->room_no}}</td>
      </tr>
      <tr>
        <td>Guide to resident and prospective resident:  {{ $resident_agreement->res_gp}}</td>
        <td>Need assistance  in reading ?:  {{ $resident_agreement->asistance_status}}</td>
        <td>(Yes/No)</td>
        <td>Staff: {{ $resident_agreement->staff}}</td>
      </tr>
    </table>&nbsp;&nbsp;
    <table>
      <tr>
        <td>Guardian: {{ $resident_agreement->guardian}}</td>
        <td>Telephone:  {{ $resident_agreement->g_tel}}</td>
        <td>Address:  {{ $resident_agreement->g_adress}}</td>
        <td>Email: {{ $resident_agreement->g_email}}</td>
      </tr>
      <tr>
        <td>Person Nominated: {{ $resident_agreement->p_nomini}}</td>
        <td>Telephone:  {{ $resident_agreement->per_tel}}</td>
        <td>Address:  {{ $resident_agreement->per_address}}</td>
        <td>Email: {{ $resident_agreement->per_email}}</td>
      </tr>
       <tr>
        <td>Emergency Contact: {{ $resident_agreement->emg_contact}}</td>
        <td>Telephone:  {{ $resident_agreement->emg_tel}}</td>
        <td>Address:  {{ $resident_agreement->emg_address}}</td>
        <td>Email: {{ $resident_agreement->emg_email}}</td>
      </tr>
    </table>&nbsp;&nbsp;
    <table>
      <tr>
        <td colspan="5" style="width: 185px" style=>&nbsp;&nbsp;&nbsp;&nbsp;<center><b>DURATION OF STAY</b></td></center>
      </tr>
      <tr>
        <td>Fixed period stay form:  {{ $resident_agreement->f_period}}</td>
        <td>Ending on:  {{ $resident_agreement->ending_on}}</td>
      </tr>
      <tr>
        <td>Indefinite period of stay form: </td>
        <td>{{ $resident_agreement->i_period}}</td>
      </tr>
    </table>&nbsp;&nbsp;
    <table>
      <tr>
        <td colspan="5" style="width: 185px" style=>&nbsp;&nbsp;&nbsp;&nbsp;<center><b>FEES AND CHARGES</b></td></center>
      </tr>
      <tr>
        <td>Fee for accommodation and personal support:  </td>
        <td>Amount:  {{ $resident_agreement->acc_fee}}</td>
      </tr>
      <tr>
        <td>Frequency of payment: </td>
        <td><input {{ $resident_agreement->freq_pay == 'Weekly' ? 'checked' : ''  }} type="checkbox">Weekly &nbsp;&nbsp;<input type="checkbox" {{ $resident_agreement->freq_pay == 'Fortnightly' ? 'checked' : ''  }}>Fortnightly&nbsp;&nbsp;<input type="checkbox" {{ $resident_agreement->freq_pay == 'Every Calender Month' ? 'checked' : ''  }}>Every calendar month&nbsp;&nbsp;<input type="checkbox" {{ $resident_agreement->freq_pay == 'Other' ? 'checked' : ''  }}>Other</td>
      </tr>
      <tr>
        <td>Any rent paid in advance: </td>
        <td><input {{ $resident_agreement->any_rent_adv == 'Weekly' ? 'checked' : ''  }} type="checkbox">Weekly &nbsp;&nbsp;<input type="checkbox" {{ $resident_agreement->any_rent_adv == 'Fortnightly' ? 'checked' : ''  }}>Fortnightly&nbsp;&nbsp;<input type="checkbox" {{ $resident_agreement->any_rent_adv == 'Every Calender Month' ? 'checked' : ''  }}>Every calendar month&nbsp;&nbsp;<input type="checkbox" {{ $resident_agreement->any_rent_adv == 'Other' ? 'checked' : ''  }}>Other</td>
      </tr>
      <tr>
        <td>How to pay: </td>
        <td><input {{ $resident_agreement->pay_method == 'Direct Debit' ? 'checked' : ''  }}type="checkbox">Direct Debit &nbsp;&nbsp;<input type="checkbox" {{ $resident_agreement->pay_method == 'Cash' ? 'checked' : ''  }}>Cash&nbsp;&nbsp;<input {{ $resident_agreement->pay_method == 'State Trustees' ? 'checked' : ''  }} type="checkbox">State Trustees&nbsp;&nbsp;<input{{ $resident_agreement->pay_method == 'Centrelink' ? 'checked' : ''  }} type="checkbox">Centrelink<input type="checkbox" {{ $resident_agreement->pay_method == 'Other' ? 'checked' : ''  }}>Other</td>
      </tr>
    </table>&nbsp;&nbsp;
    <table>
      <tr>
        <td colspan="5" style="width: 185px" style=>&nbsp;&nbsp;&nbsp;&nbsp;<center><b>OTHER FEES AND CHARGES</b></td></center>
      </tr>
      <tr>
        <td>Security Deposit Charged:  {{ $resident_agreement->secu_depo}}</td>
        <td><input type="checkbox" {{ $resident_agreement->secu_depo == 'Yes' ? 'checked' : ''  }} >Yes &nbsp;&nbsp;<input type="checkbox" {{ $resident_agreement->secu_depo == 'No' ? 'checked' : ''  }} >No&nbsp;&nbsp;</td>
      </tr>
      <tr>
        <td>Amount Payable: </td>
        <td>{{ $resident_agreement->amt_pay}}</td>
      </tr>
    </table>&nbsp;&nbsp;
    <table>
      <tr>
        <td colspan="5" style="width: 185px" style=>&nbsp;&nbsp;&nbsp;&nbsp;<center><b>OTHER FEES AND CHARGES</b></td></center>
      </tr>
      <tr>
        <td>Condition report provided to the resident?:  </td>
        <td><input type="checkbox" {{ $resident_agreement->condition_rep == 'Yes' ? 'checked' : ''  }}>Yes &nbsp;&nbsp;<input type="checkbox" {{ $resident_agreement->condition_rep == 'No' ? 'checked' : ''  }}>No&nbsp;&nbsp;</td>
      </tr>
      <tr>
        <td>Furniture in resident's room belonging to thr SRS: {{ $resident_agreement->pers_prop}}</td>
        <td><p>Attach or List items duly signed by staff and resident</p></td>
      </tr>
</table>
   </div>
   </div>
 </div>
 </div>

 <div id="print-content">
        <div class="container">

      <table>
        <tr>
        <td>Reservation fee charged: </td>
        <td><input type="checkbox" {{ $resident_agreement->reserv_fee == 'Yes' ? 'checked' : ''  }}>Yes &nbsp;&nbsp;<input type="checkbox" {{ $resident_agreement->reserv_fee == 'No' ? 'checked' : ''  }}>No&nbsp;&nbsp;Amount Payable:$ {{ $resident_agreement->amt_res}}</td>
      </tr>
      <tr>
        <td>Establishment fee charged: </td>
        <td><input type="checkbox" {{ $resident_agreement->est_fee == 'Yes' ? 'checked' : ''  }}>Yes &nbsp;&nbsp;<input type="checkbox" {{ $resident_agreement->est_fee == 'No' ? 'checked' : ''  }}>No&nbsp;&nbsp;Amount Payable:$ {{ $resident_agreement->amt_est}}</td>
      </tr>
      <tr>
        <td>Fee in advance charged for other items/service provide by SRS: </td>
        <td><input type="checkbox" {{ $resident_agreement->advnc_fee == 'Yes' ? 'checked' : ''  }}>Yes &nbsp;&nbsp;<input type="checkbox" {{ $resident_agreement->advnc_fee == 'No' ? 'checked' : ''  }}>No&nbsp;&nbsp;Amount Payable:$ {{ $resident_agreement->amt_adv}}</td>
      </tr>
      <tr>
        <td>Refund to resident: {{ $resident_agreement->refund}}</td>
        <td><p>Refunds of money held in trust will be returned to the resident within 14 days of leaving the SRS. A resident can apply to the Victorian Civil and Administrative
Tribunal (VCAT) for an order if the proprietor does not refund a security, fee in
advance, reservation fee or establishment fee in accordance with the Act, must be
included.</p>
</td>
      </tr>
    </table>&nbsp;&nbsp;
  </div> <div class="container">

    <table>
      <tr>
        <td colspan="5" style="width: 185px" style=>&nbsp;&nbsp;&nbsp;&nbsp;<center><b>MANAGEMENT OF RESIDENT’S MONEY</b></td></center>
      </tr>
      <tr>
        <td>Will the SRS assist the resident in managing their finances:  </td>
        <td><input type="checkbox" {{ $resident_agreement->srs_assist_status == 'Yes' ? 'checked' : ''  }}>Yes &nbsp;&nbsp;<input type="checkbox" {{ $resident_agreement->srs_assist_status == 'No' ? 'checked' : ''  }}>No&nbsp;&nbsp;&nbsp;&nbsp;
        Ammount to be managed:$ {{ $resident_agreement->assist_amnt}}</td>
      </tr>
    </table><br>
    </div><div class="container">
    <table>
      <tr>
        <td colspan="5" style="width: 185px" style=>&nbsp;&nbsp;&nbsp;&nbsp;<center><b>ITEMS AND SERVICES PROVIDED
       </b></td></center>
      </tr>
      <tr>
      <td><p><i>Services offered</i></p><br>
        <p><b>Towards any extra services that need to be included may incur variations in your charge/week, payable by
towards which will be notified to you after your Support plan assessment. Care and Support needs may change
depending on your ongoing requirements and fees may change.</b></p><br>
      <p>Personal and Special Support Services (tick applicable boxes)</p><br>
      <table style="border: 2px; border-width: 1px; border-color: black;">
      <tr>
        <th>Type of Support</th>
        <th colspan="3">Level of assistance offered</th>
        <th>Included in fee</th>
      </tr>
      <tr>
        <td></td>
        <td>Full</td>
        <td>Part</td>
        <td>None</td>
        <td></td>
      </tr>
      <tr>
        <td>Bathing and showering</td>
        <td><form action="">    
         <input type="checkbox" name="" value="Fall" />    
        </form></td>
         <td><form action="">    
         <input type="checkbox" name="" value="Part" />    
        </form></td>
        <td><form action="">    
         <input type="checkbox" name="" value="None" />    
        </form></td>
        <td>Y/N</td>
      </tr>
      <tr>
        <td>Oral Support</td>
        <td><form action="">    
         <input type="checkbox" name="" value="Fall" />    
        </form></td>
         <td><form action="">    
         <input type="checkbox" name="" value="Part" />    
        </form></td>
        <td><form action="">    
         <input type="checkbox" name="" value="None" />    
        </form></td>
        <td>Y/N</td>
      </tr>
      <tr>
        <td>Hair and nails</td>
        <td><form action="">    
         <input type="checkbox" name="" value="Fall" />    
        </form></td>
         <td><form action="">    
         <input type="checkbox" name="" value="Part" />    
        </form></td>
        <td><form action="">    
         <input type="checkbox" name="" value="None" />    
        </form></td>
        <td>Y/N</td>
      </tr>
      <tr>
        <td>Toileting</td>
        <td><form action="">    
         <input type="checkbox" name="" value="Fall" />    
        </form></td>
         <td><form action="">    
         <input type="checkbox" name="" value="Part" />    
        </form></td>
        <td><form action="">    
         <input type="checkbox" name="" value="None" />    
        </form></td>
        <td>Y/N</td>
      </tr>
      <tr>
        <td>Mobility</td>
        <td><form action="">    
         <input type="checkbox" name="" value="Fall" />    
        </form></td>
         <td><form action="">    
         <input type="checkbox" name="" value="Part" />    
        </form></td>
        <td><form action="">    
         <input type="checkbox" name="" value="None" />    
        </form></td>
        <td>Y/N</td>
      </tr>
      <tr>
        <td>Assistance with medication</td>
        <td><form action="">    
         <input type="checkbox" name="" value="Fall" />    
        </form></td>
         <td><form action="">    
         <input type="checkbox" name="" value="Part" />    
        </form></td>
        <td><form action="">    
         <input type="checkbox" name="" value="None" />    
        </form></td>
        <td>Y/N</td>
      </tr>
      <tr>
        <td>Continence management</td>
        <td><form action="">    
         <input type="checkbox" name="" value="Fall" />    
        </form></td>
         <td><form action="">    
         <input type="checkbox" name="" value="Part" />    
        </form></td>
        <td><form action="">    
         <input type="checkbox" name="" value="None" />    
        </form></td>
        <td>Y/N</td>
      </tr>
      <tr>
        <td>Bed making</td>
        <td><form action="">    
         <input type="checkbox" name="" value="Fall" />    
        </form></td>
         <td><form action="">    
         <input type="checkbox" name="" value="Part" />    
        </form></td>
        <td><form action="">    
         <input type="checkbox" name="" value="None" />    
        </form></td>
        <td>Y/N</td>
      </tr>
      <tr>
        <td>Dressing</td>
        <td><form action="">    
         <input type="checkbox" name="" value="Fall" />    
        </form></td>
         <td><form action="">    
         <input type="checkbox" name="" value="Part" />    
        </form></td>
        <td><form action="">    
         <input type="checkbox" name="" value="None" />    
        </form></td>
        <td>Y/N</td>
      </tr><br>
    </table>
      <h7><p><i>Other Services</i></p></h7>
        <p>Please note: Support plan review and updates happens on regular basis.</p>
       <h7><p><i>Room maintenance</i></p></h7>
        <p>Help with maintaining your room and making your bed is available daily when required.</p>
       <h7><p><i>Personal Laundry</i></p></h7>
        <p>Assist with personal laundry is available once a week (Depends on individual circumstances). Current cost for this service is S0 All articles must be washing machine safe and clearly marked with the resident's name.</p><br>
    <table>
      <tr>
        <td colspan="5" style="width: 185px" style=>&nbsp;&nbsp;&nbsp;&nbsp;<center><b>RESIDENT CONCERNS AND COMPLAINTS</b></td></center>
      </tr>
      <tr>
        <td><p>At our facility, complaints (from you/family) and fee dback are taken seriously, and we will do our best to resolve them promptly. We have nominated our Manager as
the person to receive and record residents’ complaints. We will take steps to resolve your complaint, and you will be advised of the outcome. If’ oe are not satis
with the outcome, you/family can also get assistance from a community visitor or from an Authorised Officer of the Department of Health. A copy of the SRS
Residents Handbook for further details, setting out the minimum standards of Support and accommodation, are available at the Office for your information, Living in a SRS — Guide to residents and prospective residents.</p></td>
      </tr>
    </table>&nbsp;&nbsp;
  </div></div>
  <div id="print-content">
        <div class="container">
    <center>
      <h2>HOUSE RULES</h2>
      <i>Rights of Residents:</i>You have a right to:<br>
    </center>
    
     <table>
      <tr rowspan="5" style="width: 185px;align-items: center;">
        <ul>
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
        </ul>
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
    <p> 6. If any damage to property including fitting and fixtures will be my responsibility if occurred as a result of my behaviours.</p>
    <p> 7. I declare that I have read and or Staff has read to me “The Guide for resident and Prospective residents in detail. | understand there is electronic copy on computer if needed.</p>
    <p> 8. Tam happy with the room arrangements/partition surrounding Privacy matters of my room (applicable if 1 am living in shared room),</p>&nbsp;&nbsp;
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


</div></div>

 <div id="print-content">
        <div class="container">
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
             <p>Morning Tea 10.00 am to 10.30 am</p>
             <p> Lunch 12.00 to 1.00 pm</p>
             <p>Afternoon Tea 3.00 pm to 3.30 pm</p>
             <p>Dinner 5.00 pm to 5:30 pm</p>
             <p>Supper 7 Pm to 7:30 pm</p>
             <p>Wending Machine located in dining area is available at all times</p>
             <p>Morning/afternoon tea and supper include a variety of beverages and biscuits/cakes, Tea/coffee making facilities are available during all meal times.</p>
             <p><i><b>Cleaning</b></i></p>
             <p>Cleaning is undertaken daily, between 9 a.m. and if.30am, and between 1.30 p.m. and 4 p.m depending on the roster. You may be asked to step out of your room during those times to enable cleaning to be done.</p>
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
        </div>
 </div>
 <div id="print-content">
        <div class="container">
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
            <td><p>Example: 4 residential and services agreement may be ended:</p>
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
</div></div>

</div></div>



<script type="text/javascript">
     function printDiv(divName) {
        var htmlToPrint = '' +
        '<style type="text/css">' +
        'table, td {' +
        'border: 1px solid black;' +
        '    width: 100%;' +
        'border-collapse: collapse;' +
        '}' +
         '.container{' +
          'width: 1000px;' +
          'padding: 50px;' +
          'margin: auto;' +
          'border: 3px solid black;' +
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