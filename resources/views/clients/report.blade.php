<!-- pdf.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Residential care Manager
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
      <input type="button" class="right" style="right: 30px; align-items: right;" onclick="printDiv('print-content1')" value="PRINT"/>&nbsp;&nbsp;&nbsp;<br><br>
      <div id="print-content1">
        <div class="container">
    <center>
      <h1 >MEADOWBROOK S R S</h1>
    </center>
    <p style="font-size: 15px;">2-10 Brid Rd Melton South Vic: 3338 Ph: 03-97476999 Fax: 03-97460344 Email: info@meadowbrook.com.au</p>
    <h3 style="width:300px;height:30px;border:1px solid #000;">&nbsp;New Resident Admission Form&nbsp;</h3>
    <h5>Personal Details:</h5>
    <table>
      <tr style="border: 1px solid black;">
        <td>Name</td>
        <td>Date of Birth</td>
        <td>Nationality</td>
        <td>Religion</td>
        <td>Languages Spoken</td>
        <td>M/F</td>
      </tr>
      <tr>
        <td>{{ $client_detail->fname}}. {{ $client_detail->mname}}. {{ $client_detail->lname}}</td>
        <td>{{ $client_detail->dob}}</td>
        <td>{{ $client_detail->nationality}}</td>
        <td>{{ $client_detail->religion}}</td>
        <td>{{ $client_detail->l_known}}</td>
        <td>{{ $client_detail->gender}}</td>        
      </tr>
      <tr>
        <td>Ref By</td>
        <td colspan="3">{{ $client_detail->ref_by}}</td>
        <td>Admission Date</td>
        <td>Roon No</td>
      </tr>
      <tr>
        <td colspan="4">Previous Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; {{ $client_detail->pre_address}}</td>
        <td>{{ $client_detail->adm_date}}</td>
        <td>{{ $client_detail->room_no}}</td>
      </tr>   
      
    </table><br>
    <table>
         <tr>
        <td>Medicare Number</td>
        <td>Expiry</td>
        <td>Pension Number</td>
        <td>Expiry</td>
        <td>Safety Net Entitlenment Number</td>
      </tr>
      <tr>
        <td>{{ $client_detail->medicard_no}}</td>
        <td>{{ $client_detail->exp_date}}</td>
        <td>{{ $client_detail->pension_no}}</td>
        <td>{{ $client_detail->pen_exp}}</td>
        <td>{{ $client_detail->ent_no}}</td>        
      </tr>
    </table><br>
    <h5>PERMANENT / RESPITE: {{ $client_detail->respite}}</h5>
    <label>Weeks : {{ $client_detail->weeks}}</label><br>
    <label>Accont to be addressed : {{ $client_detail->acc}}</label><br>
    <label>Phone : {{ $client_detail->ph}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Fax : {{ $client_detail->res_fax}}</label><br>
    <label>Email ID : {{ $client_detail->res_email}}</label><br>

    <h5>Pension Details</h5>
    <label>Type of Income : {{ $pension_detail->income_type}}</label><br>
    <label>Client Reference no : {{ $pension_detail->client_refno}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Taxi Concession Card details: {{ $pension_detail->con_card}}</label><br> 

    <h5>Next Of Kin / Representative</h5>
    <label>Name : {{ $next_of_kin->name}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Email : {{ $next_of_kin->nok_email}}</label><br>
    <label>Address : {{ $next_of_kin->address}}</label><br>
    <label>Lan Phone : {{ $next_of_kin->ph}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Mobile : {{ $next_of_kin->nok_lan}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Fax : {{ $next_of_kin->nok_fax}}</label><br>
    
    <h5>Guardian / Administrator</h5>
    <label>Name : {{ $guardian_detail->gr_name}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Relationship : {{ $guardian_detail->gr_relation}}</label><br>
    <label>Lan Phone : {{ $guardian_detail->gr_lan}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Mobile : {{ $guardian_detail->gr_mob}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Email : {{ $guardian_detail->gr_email}}</label><br>
    <label>Address : {{ $guardian_detail->gr_address}}</label><br>

    
    <h5>Medical Practitioner</h5>
    <label>Name : {{ $gpdetail->gp_name}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Email :{{ $gpdetail->gp_email}}</label><br>
    <label>Address : {{ $gpdetail->address}}</label><br>
    <label>Lan Phone : {{ $gpdetail->gp_lan}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Mobile : {{ $gpdetail->ph}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Fax : {{ $gpdetail->gp_fax}}</label><br>
    
    <h5>Other Health Services</h5>
    <label>Name : {{ $health_service->hs_name}}</label><br>
    <label>Address : {{ $health_service->hs_address}}</label><br>
    <label>Lan Phone : {{ $health_service->hs_lan}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>(after hours) : {{ $health_service->aftr_hrs}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Fax : {{ $health_service->hs_fax}}</label><br>
    <label>Email : {{ $health_service->hs_email}}</label><br>
    <h5><u>Additional Information : Medical history/diagnosis : {{ $health_service->med_history}}</u></h5><br>
     <label>Date Fixed to Pharmacy: ............................... &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Signature:........................</label>
      </div>
   </div>
 </div>
 </div>

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
          'width: 900px;' +
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
    }</script>

  </body>
</html>