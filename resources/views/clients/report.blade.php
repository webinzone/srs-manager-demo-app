<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Residential care Manager
    </title>
    
    
  <style type="text/css">

  table, td, th {
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
    <p style="font-size: 15px;"><center><b>2-10 Brid Rd Melton South Vic: 3338 Ph: 03-97476999 Fax: 03-97460344 Email: info@meadowbrook.com.au</b></p></center>
    <h3 style="width:300px;height:30px;border:1px solid #000;">&nbsp;New Resident Admission Form&nbsp;</h3>
    <h5>Personal Details:</h5>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Name</td>
        <td style="border: 1px solid black;">Date of Birth</td>
        <td style="border: 1px solid black;">Nationality</td>
        <td style="border: 1px solid black;">Religion</td>
        <td style="border: 1px solid black;">Languages Spoken</td>
        <td style="border: 1px solid black;">M/F</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $client_detail->fname}}. {{ $client_detail->mname}}. {{ $client_detail->lname}}</td>
        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($client_detail->dob)) }}</td>
        <td style="border: 1px solid black;">{{ $client_detail->nationality}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->religion}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->l_known}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->gender}}</td>        
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Ref By</td>
        <td style="border: 1px solid black;" colspan="3">{{ $client_detail->ref_by}}</td>
        <td style="border: 1px solid black;">Admission Date</td>
        <td style="border: 1px solid black;">Room No</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;" colspan="4">Previous Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; {{ $client_detail->pre_address}}</td>
        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($client_detail->adm_date)) }}</td>
        <td style="border: 1px solid black;">{{ $client_detail->room_no}}</td>
      </tr>   
      
    </table><br>
      <table style="border: 1px solid black;">
         <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Medicare Number</td>
        <td style="border: 1px solid black;">Expiry</td>
        <td style="border: 1px solid black;">Pension Number</td>
        <td style="border: 1px solid black;">Expiry</td>
        <td style="border: 1px solid black;">Safety Net Entitlenment Number</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $client_detail->medicard_no}}</td>
        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($client_detail->exp_date)) }}</td>
        <td style="border: 1px solid black;">{{ $client_detail->pension_no}}</td>
        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($client_detail->pen_exp)) }}</td>
        <td style="border: 1px solid black;">{{ $client_detail->ent_no}}</td>        
      </tr>
    </table><br>
     <h5>PERMANENT / RESPITE: {{ $client_detail->respite}} - {{ $duration}}</h5>
    <table>
      <tr>
        <td>Weeks : {{ $weeks}}</td>
      </tr>
      <tr>
        <td>Accont to be addressed : {{ $client_detail->acc}}</td>
      </tr>
      <tr>
        <td>Phone : {{ $client_detail->ph}}</td>
        <td  style="width:658px;">Email ID : {{ $client_detail->res_email}}</td>
      </tr>
    </table><br>
    

    <h5>Pension Details</h5>
    <table>
      <tr>
        <td>Type of Income : {{ $pension_detail->income_type}}   <label id="oi"> {{ $client_detail->other_income}}</label></td>
      </tr>
      <tr>
        <td>Client Reference no : {{ $pension_detail->client_refno}}</td>
        <td style="width:660px;">Taxi Concession Card details : {{ $pension_detail->con_card}}</td>
      </tr>
    </table><br> 

    <h5>Next Of Kin / Representative</h5>
    <table>
      <tr>
        <td style="width:340px;">Name : {{ $next_of_kin->name}}</td>
        <td>Email : {{ $next_of_kin->nok_email}}</td>
      </tr>
      <tr>
        <td>Address : {{ $next_of_kin->address}}</td>
      <tr>
        <td>Lan Phone : {{ $next_of_kin->ph}}</td>
        <td>Mobile : {{ $next_of_kin->nok_lan}}</td>
        <td>Fax : {{ $next_of_kin->nok_fax}}</td>
      </tr>
    </table><br>
    
    <h5>Guardian / Administrator</h5>
    <table>
      <tr>
        <td>Name : {{ $client_detail->gr_name}}</td>
        <td style="width:655px;">Relationship : {{ $client_detail->gr_relation}}</td>
      </tr>
      <tr>
        <td>Address : {{ $client_detail->gr_address}}</td>
      </tr>
      <tr>
        <td >Email : {{ $client_detail->gr_email}}</td>
      </tr>
      
      <tr>
        <td>Lan Phone : {{ $client_detail->gr_lan}}</td>
        <td style="width:655px;">Mobile : {{ $client_detail->gr_mob}}</td>
      
    </table><br>

    
    <h5>Medical Practitioner</h5>
    <table>
      <tr>
        <td style="width:350px;">Name : {{ $gpdetail->gp_name}}</td>
        <td >Email : {{ $gpdetail->gp_email}}</td>
      </tr>
      <tr>
        <td>Address : {{ $gpdetail->address}}</td>
      <tr>
        <td>Lan Phone : {{ $gpdetail->gp_lan}}</td>
        <td>Mobile : {{ $gpdetail->ph}}</td>
        <td>Fax : {{ $gpdetail->gp_fax}}</td>
      </tr>
    </table><br>
    
    <h5>Other Health Services</h5>
    <table>
      <tr>
        <td>Name : {{ $health_service->hs_name}}</td>
      </tr>
      <tr>
        <td>Address : {{ $health_service->hs_address}}</td>
      </tr>
      <tr>
        <td style="width:350px;">Lan Phone : {{ $health_service->hs_lan}}</td>
        <td style="width:460px;">(after hours) : {{ $health_service->aftr_hrs}}</td>
        <td >Fax : {{ $health_service->hs_fax}}</td>
      <tr>
        <td>Email : {{ $health_service->hs_email}}</td>
      </tr>
    </table><br>
    <h5><u>Additional Information : Medical history/diagnosis : {{ $health_service->med_history}}</u></h5><br>
     <label>Date Fixed to Pharmacy: ..............................................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Signature: ..............................................................</label>
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