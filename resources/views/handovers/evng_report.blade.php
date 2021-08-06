<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Residential care Manager
    </title>
    
    
  <style type="text/css">
  td{
    padding-left: 10px;
    text-align: left;
    padding-top: 5px;
    padding-bottom: 5px;
    padding-right: 5px;
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
    <h2><center>Evening Shift Handover Report</center></h2><br>
    <h4>Evening Staff : {{ $evngshift->evng_staff }}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Morning Staff : <b>{{ $evngshift->mng_staff }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date : {{ date('d-m-Y', strtotime($evngshift->eveng_date))}} </h4>
    <table style="border: 1px solid black;">
      <thead style="border: 1px solid black;">
        <tr>
          <th style="border: 1px solid black;">No</th>
          <th style="border: 1px solid black;">Room</th>
          <th style="border: 1px solid black;">Resident Name</th>
          <th style="border: 1px solid black;">Evening - Morning </th>


        </tr>
      </thead>
       <tbody>
          @for ($j=0; $j < $num; $j++)        
          <tr style="align-items: center;">
            <td style="border: 1px solid black; align-content: center;align-self: center;width: 30px;" >{{ ++$i }}</td>
            <td style="border: 1px solid black;" width="100px;">{{ $room[$j]}}</td>
            <td style="border: 1px solid black;" width="350px;">{{ $res_name[$j]}}</td>
            <td style="border: 1px solid black;">{{ $notes[$j]}}</td>  
            @endfor
        </tbody>
      </table>

        
    <br> 

   
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
        'td, th {' +
        'border: 1px solid black;' +
        'padding: 5px;' +
        'border-collapse: collapse;' +
        'align-items: center' +
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

  </body>
</html>
