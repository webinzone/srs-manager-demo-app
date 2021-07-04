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
    <table>
      <tr>
        <td colspan="5" style="width: 185px" style=>&nbsp;&nbsp;&nbsp;&nbsp;<center><b>MANAGEMENT OF RESIDENT’S MONEY</b></td></center>
      </tr>
      <tr>
        <td>Will the SRS assist the resident in managing their finances:  </td>
        <td><input type="checkbox" {{ $resident_agreement->srs_assist_status == 'Yes' ? 'checked' : ''  }}>Yes &nbsp;&nbsp;<input type="checkbox" {{ $resident_agreement->srs_assist_status == 'No' ? 'checked' : ''  }}>No&nbsp;&nbsp;&nbsp;&nbsp;
        Ammount to be managed:$ {{ $resident_agreement->assist_amnt}}</td>
      </tr>
    </table>&nbsp;&nbsp;
    
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
        <td>Fall</td>
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
  </div></div></div></div>

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