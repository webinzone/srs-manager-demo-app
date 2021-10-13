<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Residential care Manager
    </title>
    
    <style type="text/css">
  td{
    width: auto;
    padding: 5px;
    text-align: center;
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
    <h2><center>Appointment - {{date('d-m-Y', strtotime($sdate)) }}</center></h2>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Resident</td>
        <td style="border: 1px solid black;">Time</td>
        <td style="border: 1px solid black;">Address</td>
        <td style="border: 1px solid black;">Appointment with</td>
        <td style="border: 1px solid black;">Reason </td>
        <td style="border: 1px solid black;">Fasting </td>
        <td style="border: 1px solid black;">Booked By</td>
        <td style="border: 1px solid black;">Additional Information</td>
        <td style="border: 1px solid black;">Status</td>

      
      </tr>
      @foreach ($appointments as $appointment)  

      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $appointment->res_name}}</td>
        <td style="border: 1px solid black;">{{ $appointment->app_time}}</td>
        <td style="border: 1px solid black;">{{ $appointment->app_address}}</td>       
        <td style="border: 1px solid black;">{{ $appointment->app_with}}</td>
        <td style="border: 1px solid black;">{{ $appointment->app_reason}}</td>
        <td style="border: 1px solid black;">{{ $appointment->fasting}}</td>        
         <td style="border: 1px solid black;">{{ $appointment->app_bookby}}</td>
        <td style="border: 1px solid black;">{{ $appointment->app_note}}</td>
        <td style="border: 1px solid black;">{{ $appointment->status}}</td>        

      </tr>
      @endforeach
      @foreach ($apps as $appointment)  

      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $appointment->res_name}}</td>
        <td style="border: 1px solid black;">{{ $appointment->app_time}}</td>
        <td style="border: 1px solid black;">{{ $appointment->app_address}}</td>       
        <td style="border: 1px solid black;">{{ $appointment->app_with}}</td>
        <td style="border: 1px solid black;">{{ $appointment->app_reason}}</td>
         <td style="border: 1px solid black;">{{ $appointment->app_bookby}}</td>
        <td style="border: 1px solid black;">{{ $appointment->app_note}}</td>
        <td style="border: 1px solid black;">{{ $appointment->status}}</td>        

      </tr>
      @endforeach
    </table><br>

   
         </div>
   </div>
 </div>
 </div>

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
    }</script>

  </body>
</html>
