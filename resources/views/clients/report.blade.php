<!-- pdf.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Residential care Manager
    </title>
    <!-- Tell the browser to be responsive to screen width -->
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
  </style>




  </head>

  <body>
    <center>
      <h1 >MEADOWBROOK S R S</h1>
    </center>
    <p style="font-size: 15px;">2-10 Brid Rd Melton South Vic: 3338 Ph: 03-97476999 Fax: 03-97460344 Email: info@meadowbrook.com.au</p>
    <h3 style="width:250px;height:30px;border:1px solid #000;">&nbsp;New Resident Admission Form&nbsp;</h3>
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
        <td>{{ $client_detail->fname}}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>        
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
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>        
      </tr>
    </table><br>
    <h5>PERMANENT / RESPITE</h5>
    <label>Weeks : <u>{{ $client_detail->fname}}</u></label><br>
    <label>Accont to be addressed :</label><br>
    <label>Phone/Fax :</label><br>
    <label>Email ID :</label><br>

    <h5>Pension Details</h5>
    <label>Type of Income :</label><br>
    <label>Client Reference no :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>fari Concessiorr Card cletails: </label><br> 

    <h5>Next Of Kin / Representative</h5>
    <label>Name :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Email :</label><br>
    <label>Address :</label><br>
    <label>Lan Phone :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Mobile :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Fax :</label><br>
    
    <h5>Guardian / Administrator</h5>
    <label>Name :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Relationship :</label><br>
    <label>Lan Phone :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Mobile :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Email :</label><br>
    <label>Address :</label><br>

    
    <h5>Medical Practitioner</h5>
    <label>Name :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Email :</label><br>
    <label>Address :</label><br>
    <label>Lan Phone :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Mobile :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Fax :</label><br>
    
    <h5>Other Health Services</h5>
    <label>Name :</label><br>
    <label>Address :</label><br>
    <label>Lan Phone :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>(after hours) :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Fax :</label><br>
    <label>Email :</label><br>
    <h5><u>Additional Information : Medical history/diagnosis</u></h5><br>
     <label>Date Fixed to Pharmacy: ............................... &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Signature:........................</label>

    <!--<h2>Client Details</h2>
      <table class="table table-bordered">
           <tr>
                                <td>{{ $client_detail->fname}}</td>
                                <td> {{ $client_detail->mname}}</td>
                                <td> {{ $client_detail->lname}}</td>
                                <td>{{ $client_detail->gender}}</td>
                                <td>{{ $client_detail->ph}}</td>
                                                         
                              </tr>
      </table>
 -->

  </body>
</html>