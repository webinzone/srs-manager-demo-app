<!-- pdf.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Support Plans
    </title>
    
   
  <style type="text/css">

  table, td, th {
    border: 1px solid black;
  }
  td{
    width: 200px;
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

    <link rel="stylesheet" href="{{ url(mix('css/dist/report.css')) }}">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
    <p style="font-size: 15px;"><center><b>2-10 Brid Rd Melton South Vic: 3338 Ph: 03-97476999 Fax: 03-97460344 Email: info@meadowbrook.com.au</b></p></center>
    <h3><center>Personal Support Plan</center></h3><br>
    <table>
      <tr>
        <td>Resident’s Name</td>
        <td>{{ $support_plan->user_name}}</td>
        <td>In consultation with  </td>
        <td>{{ $support_plan->cons}}</td>
        <td width="">Admission Date</td>
        <td>{{date('d-m-Y', strtotime($support_plan->adm_date)) }}</td>
      </tr>
      <tr>
        <td>General practitioner Name and contact details</td>
        <td>{{ $support_plan->gp_name}} &nbsb;&nbsb; {{ $support_plan->gp_contact}}</td>
        <td>Other Health Practitioners</td>
        <td>{{ $support_plan->other_gp}}</td>
        <td>Nominated person contact details</td>
        <td>{{ $support_plan->nomini}}</td>
      </tr>
      <tr>
        <td>If Clinics or outpatient services
            attended,
            Clinic/service name
            Contact person
            Telephone
            Frequency of visits
            Service provided</td>
        <td></td>
        <td>If Clinics or outpatient services
            attended,
            Clinic/service name
            Contact person
            Telephone
            Frequency of visits
            Service provided</td>
        <td>Mid West Area Mental Health
            Service,
            Address: Majorca St, St Albans
            3021
            Phone: 8345 1260
            Email: Jill.Collins@mh.org.au
          </td>
        <td>If Clinics or outpatient
            services attended,
            Clinic/service name
            Contact person
            Telephone
            Frequency of visits
            Service provided</td>
        <td></td>
      </tr>
    </table>&nbsp;&nbsp;<br><br>
    <table id ="myTable">
      <tr>
        <td style="width:150px;">Review Date</td>
        <td style="width:300px;">Reviewed in consultation with</td>
        <td style="width:500px;">Notes</td>
      </tr>
      @for ($i=0; $i < $num; $i++)
       <tr>
        <td>{{ $review[$i] }}</td>
        <td>{{ $r_with[$i] }}</td>
        <td>{{ $r_notes[$i] }}</td>
        
      </tr>
      @endfor
    </table><br><br>
    <table>
      <tr>
        <td>Who can see this document?
            The resident, resident’s guardian or the person nominated
            <ul>
              <li>Community visitors</li>
              <li>Health practitioners who are consulted about the contents of the plan</li>
              <li>Authorised Officers of the Department of Health</li>
            </ul>
         Making sure the resident continues to receive the right personal support<br>
         This document is used to identify the support that is right for the individual resident at a particular point in time; and to set out the services
         the SRS will provide<br>
         The information must be reviewed when the resident’s personal support needs change, and otherwise, at least every 6 months</td>
        <td>What is personal support?. [Section 3 of the Supported Residential Services Act 2010]. Personal support means 
        the provision of
        one or more of the following:
        <ol type="a">
        <li> assistance with personal hygiene, toileting or dressing;</li>
        <li>assistance to achieve and maintain mobility;</li>
        <li>support to seek out and maintain contact with health professional, social networks, family, friends and the community;</li>
        <li>emotional wellbeing support;</li>
        <li>assistance with or supervision in administering medication;</li>
        <li>assistance with eating and maintaining adequate nutrition</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </ol></td>
</tr>
</table><br><br>
<table>
  <tr>
    <td>Area of Need</td>
    <td>Summary of Personal Support Services to be provided</td>
    <td>Frequency(day/week/etc)</td>
  </tr>
  <tr>
    <td>HEALTH CARE: Support provided to the resident is appropriate and links in with health care he or she may be receiving.</td>
    <td>{{ $support_plan->health_care}}</td>
    <td>{{ $support_plan->f1}}</td>
  </tr>
  <tr>
    <td>PERSONAL HYGIENE: Bathing/showering, Toileting, assist with continence, dressing/undressing, hairdressing, skin care, nail care, etc</td>
    <td>{{ $support_plan->hygiene}}</td>
    <td>{{ $support_plan->f2}}</td>
  </tr>
  <tr>
    <td>Behaviour and OTHER: Awareness of time, place or person; behavioural issues; other support requirements.</td>
    <td>{{ $support_plan->behaviour}}</td>
    <td>{{ $support_plan->f3}}</td>
  </tr>
  <tr>
    <td>MEDICATION: Assistance or supervision taking medication, medication allergies/ restrictions, medications administered away from the SRS.</td>
    <td>{{ $support_plan->medication}}</td>
    <td>{{ $support_plan->f4}}</td>
  </tr>
  <tr>
    <td>MOBILITY: Aids to mobility used, capability to move around the SRS and the community independently (with or without aids).</td>
    <td>{{ $support_plan->mobility}}</td>
    <td>{{ $support_plan->f5}}</td>
  </tr>
  <tr>
    <td>SOCIAL CONTACT EMOTIONAL WELLBEING: Activities pursued, membership of clubs or groups, involvement with family and friends, voluntary or paid work, spiritual worship.</td>
    <td>{{ $support_plan->social_contact}}</td>
    <td>{{ $support_plan->f6}}</td>
  </tr>
  <tr>
    <td>EATING &amp; NUTRITION: Dietary requirements, special diets, food preferences, food allergies or restrictions, assistance with eating or drinking, assistance with maintaining hydration.</td>
    <td>{{ $support_plan->nutrition}}</td>
    <td>{{ $support_plan->f7}}</td>
  </tr>
  </table>    



    </div></div>

</div></div>



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
<script type="text/javascript">
const rowIsEmpty = (tr) => Array.from(tr.querySelectorAll('td')).every(td => td.innerText === "");

deleteEmptyRows();

function deleteEmptyRows() {
  var myTable = document.getElementById("myTable");
  
  myTable.querySelectorAll('tr').forEach(tr => {
    if(rowIsEmpty(tr)) tr.remove();
  });

 
}
</script>

  </body>
</html>