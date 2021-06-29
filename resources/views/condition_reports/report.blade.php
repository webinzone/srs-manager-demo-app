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
    height: 25px;
    border-collapse: collapse;
  }
  .blank_row
  {
      height: 15px !important; /* overwrites any other rules */
      background-color: #FFFFFF;
  }

  </style>
  </head>

  <body>
    <center>
      <h1 >MEADOWBROOK</h1>
    </center>
    <table>
      <tr>
        <td rowspan="2" style="width: 185px;align-items: center;">&nbsp;&nbsp;&nbsp;&nbsp;<b>CONDITION REPORT</b></td>
        <td>Resident Name:</td>
        <td>Room No:</td>
      </tr>
      <tr>
        <td>Staff Name:</td>
        <td>Date:</td>
      </tr>
    </table>

    <p> Legends:&nbsp;&nbsp;Facilty Owned: F &nbsp;&nbsp;&nbsp;&nbsp;Resident Owned: O &nbsp;&nbsp;&nbsp;&nbsp; Poor: P &nbsp;&nbsp;&nbsp;&nbsp;Good: G &nbsp;&nbsp;&nbsp;&nbsp;In need of Repair: R</p>
    <table style="border: 2px; border-width: 1px; border-color: black;">
      <tr>
        <td>Item no</td>
        <td>Item / Furniture</td>
        <td>Owned By</td>
        <td>Condition(P/G/R)</td>
        <td>Comments / Description</td>
        <td>Resident Sign</td>
        <td>Staff's Sign</td>

      </tr>
      <tr class="blank_row">
        <td ></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>   
        <td></td>     
      </tr>
      <tr class="blank_row">
        <td ></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>   
        <td></td>     
      </tr>
      <tr class="blank_row">
        <td ></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>   
        <td></td>     
      </tr>
      <tr class="blank_row">
        <td ></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>   
        <td></td>     
      </tr>
      <tr class="blank_row">
        <td ></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>   
        <td></td>     
      </tr>
      <tr class="blank_row">
        <td ></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>   
        <td></td>     
      </tr>
      <tr class="blank_row">
        <td ></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>   
        <td></td>     
      </tr>
      
    </table><br>
   

  </body>
</html>