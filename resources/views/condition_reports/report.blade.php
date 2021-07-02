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
      <input type="button" class="right" style="right: 30px; align-items: right;" onclick="printDiv('print-content')" value="PRINT"/>&nbsp;&nbsp;&nbsp;<br><br>
      <div id="print-content">
        <div class="container">

    <center>
      <h1 >MEADOWBROOK</h1>
    </center>
    <table>
      <tr>
        <td rowspan="2" style="width: 185px;align-items: center;">&nbsp;&nbsp;&nbsp;&nbsp;<b>CONDITION REPORT</b></td>
        <td>Resident Name:  {{ $condition_report->res_name}}</td>
        <td>Room No:  {{ $condition_report->room}}</td>
      </tr>
      <tr>
        <td>Staff Name:  {{ $condition_report->stf_name}}</td>
        <td>Date: {{date('d-m-Y', strtotime($condition_report->res_date)) }} </td>
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
    @for ($i=0; $i < $num; $i++)
      <tr class="blank_row">
        <td > {{$item_no[$i] }}</td>
        <td> {{$items[$i] }}  </td>
        <td>{{$owned_by[$i] }}</td>
        <td>{{$res_cond[$i] }}</td>
        <td>{{$res_comments[$i] }}</td>
        <td></td>   
        <td></td>     
      </tr>
    @endfor
     
    </table><br>
   </div>
   </div>
 </div>
 </div>

<script type="text/javascript">
    function printDiv(divName) {
        var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border: 1px solid black;' +
        '    width: 100%;' +
        'border-collapse: collapse;' +
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