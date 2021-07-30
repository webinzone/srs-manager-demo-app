<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rent Details
    </title>
    
    
  <style type="text/css">
  td{
    width: 200px;
    padding: 10px;
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
    <h2><center>Rent Details</center></h2>
   
    <table style="border: 2px; border-width: 1px; border-color: black;">
      <tr>
        <td><b>Resident Name</b></td>
        <td>{{ $resi->res_name}}</td>
        <td><b>Room No</b></td>
        <td>{{ $resi->roomno}}</td>
        <td><b>Room Type</b></td>
        <td>{{ $resi->room_type}}</td>
      </tr>
      <tr>
        <td><b>Payment Metdod</b></td>
        <td>{{ $resi->tof}}</td>

        <td><b>Rent</b></td>
        <td>{{ $resi->rent_pay}}</td>

        <td><b>Advance Payment</b></td>
        <td>{{ $resi->adv_pay}}</td>
            
      </tr>
    
    </table><br>
    <table>
      <tr>
        <td><b>Paid Date</b></td>
        <td><b>Due Date</b></td>
        <td><b>Status</b></td>
      </tr>
      @foreach($rents as $resident)
      <tr>
        <td>{{ $resident->pay_date}}</td>
        <td>{{ $resident->nextpay_date}}</td>
        <td>{{ $resident->status}}</td>       
      </tr>
      @endforeach
    </table>
  
    
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