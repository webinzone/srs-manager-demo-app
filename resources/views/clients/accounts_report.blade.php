<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Residential care Manager
    </title>
    
    
  <style type="text/css">

  td {
    width: 200px;
    padding: 10px;
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
    <h2><center>Accounts Detail Report</center></h2>
    <h3 style="font-family:Bedrock">Personal Details:</h3>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Name</td>
        <td style="border: 1px solid black;">{{ $client_detail->fname}}&nbsp; {{ $client_detail->mname}}&nbsp;&nbsp; {{ $client_detail->lname}}</td>
        
      </tr>
      
    </table><br>
     
     <h3 style="font-family:Bedrock">Payment Details</h3>
    <table style="padding-top: 5px;">
      <tr>
        <td style="border: 1px solid black;">Frequency of payment</td>
        <td style="border: 1px solid black;">{{ $resident_agreement->freq_pay}}</td>        
      </tr>
      <tr>
        <td style="border: 1px solid black;">Amount</td>
        <td style="border: 1px solid black;">{{ $client_detail->room_rent}}</td>        
      </tr>
      <tr>
        <td style="border: 1px solid black;">Type of Income</td>
        <td style="border: 1px solid black;">{{ $pension_detail->income_type}}</td>        
      </tr>

    </table><br>
    

    <h3 style="font-family:Bedrock">Contact Details:</h3>
    <table>
      <tr>
        <td style="border: 1px solid black;">Source Admin Name</td>
        <td style="border: 1px solid black;">{{ $client_detail->inc_sname}}</td>
       
      </tr>
      <tr>
        <td style="border: 1px solid black;">Phone Number</td>
        <td style="border: 1px solid black;">{{ $client_detail->inc_phone}}</td>
       
      </tr>
      <tr>
        <td style="border: 1px solid black;">Email</td>
        <td style="border: 1px solid black;">{{ $client_detail->inc_email}}</td>
       
      </tr>
    
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
        'padding: 10px;' +
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
