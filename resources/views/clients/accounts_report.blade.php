<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Residential care Manager
    </title>
    
    
  <style type="text/css">

  td,th {
    width: 200px;
    padding: 5px;
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
      <h1 >{{ $locations->master_name}}</h1>
    </center>
    <p style="font-size: 15px;"><center><b>{{ $locations->address}} Ph: {{ $locations->ph}} Fax: {{ $locations->fax}} Email: {{ $locations->email}}</b></p></center>
    <h2><center>Accounts Detail Report</center></h2>
    <table style="border: 1px solid black;">
      <thead style="border: 1px solid black;">
        <tr>
          <th style="border: 1px solid black;">No</th>
          <th style="border: 1px solid black;">Name</th>
          <th style="border: 1px solid black;">Type of Income</th>
          <th style="border: 1px solid black;">Rent/ Week</th>
          <th style="border: 1px solid black;">Frequency of payment</th>                    
          <th style="border: 1px solid black;">Finance Admin Name</th>
          <th style="border: 1px solid black;">Phone Number</th>
          <th style="border: 1px solid black;">Email</th>
        </tr>
      </thead>
        <tbody>
        @foreach ($client_details as $res)  
        
                     
          <tr>
            <td style="border: 1px solid black;">{{ $i++ }}</td>
            <td style="border: 1px solid black;">{{ $res->fname}}&nbsp; {{ $res->mname}}&nbsp;&nbsp; {{ $res->lname}}</td>
            
             <td style="border: 1px solid black;">
              @foreach($pension_details as $income)
              {{ $income->client_id == $res->id ? $income->income_type : ''}}
             @endforeach 
              </td>
                      
            <td style="border: 1px solid black;">{{ $res->week_rent}}</td>           
            <td style="border: 1px solid black;">
              @foreach($resident_agreements as $agree)
              {{ $agree->r_name == $res->fname." ".$res->mname." ".$res->lname ? $agree->freq_pay : ''}}
             @endforeach 
           </td>
            <td style="border: 1px solid black;">{{ $res->inc_sname}}</td>
            <td style="border: 1px solid black;">{{ $res->inc_phone}}</td>
            <td style="border: 1px solid black;">{{ $res->inc_email}}</td>
          </tr>
         
        @endforeach         
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
        '    width: 200px;' +
        'padding: 5px;' +
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
