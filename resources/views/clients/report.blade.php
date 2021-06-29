<!-- pdf.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Residential care Manager
    </title>
    
    <meta content="width=device-width, initial-scale=1" name="viewport">

      <meta name="apple-mobile-web-app-capable" content="yes">



      <link rel="apple-touch-icon" href="{{ ($snipeSettings) && ($snipeSettings->favicon!='') ?  Storage::disk('public')->url(e($snipeSettings->logo)) : '/img/logo.png' }}">
      <link rel="apple-touch-startup-image" href="{{ ($snipeSettings) && ($snipeSettings->favicon!='') ?  Storage::disk('public')->url(e($snipeSettings->logo)) : '/img/logo.png' }}">
      <link rel="shortcut icon" type="image/ico" href=" ">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">


      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="baseUrl" content="{{ url('/') }}/">

    <script nonce="{{ csrf_token() }}">
      window.Laravel = { csrfToken: '{{ csrf_token() }}' };
    </script>

     {{-- stylesheets --}}
    <link rel="stylesheet" href="{{ url(mix('css/dist/all.css')) }}">
    
  <style type="text/css">

  table, td, th {
    border: 1px solid black;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }
  .container{
  width: 1500px;
  padding: 50px;
  margin: auto;
  border: 3px solid black;

  }
  </style>




  </head>

  <body>

  <div id="webui">
    <div class="row">
      <input type="button" style="left:50px;padding-left: 30px;" onclick="printDiv('print-content')" value="PRINT"/>
      <div id="print-content">
        <div class="container">
    <center>
      <h1 >MEADOWBROOK S R S</h1>
    </center>
    <p style="font-size: 15px;">2-10 Brid Rd Melton South Vic: 3338 Ph: 03-97476999 Fax: 03-97460344 Email: info@meadowbrook.com.au</p>
    <h3 style="width:300px;height:30px;border:1px solid #000;">&nbsp;New Resident Admission Form&nbsp;</h3>
    <h5>Personal Details:</h5>
    <table style="border: 2px; border-width: 1px; border-color: black;">
      <tr>
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
        <td></td>
        <td>{{ $client_detail->religion}}</td>
        <td>{{ $client_detail->l_known}}</td>
        <td>{{ $client_detail->gender}}</td>        
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
        var printContents = document.getElementById(divName).innerHTML;
        w=window.open();
        w.document.write(printContents);
        w.print();
        w.close();
    }
</script>

  </body>
</html>