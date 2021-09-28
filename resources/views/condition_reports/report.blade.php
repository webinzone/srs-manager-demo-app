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

   <body onload="checkEdits()">

  <div id="webui">
    <div class="row">
      
         <input type="button" class="right" style="right: 90px; align-items: right;" onclick="printDiv('print-content1')" value="PRINT"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="button" style="left:200px;" value="SAVE" onclick="saveEdits()"/>&nbsp;&nbsp;&nbsp;<br><br>
  <div id="print-content1">
     <div id="edit3" contenteditable="true">
        <div class="container">

     <center>
      <h1 >{{ $locations->master_name}}</h1>
    </center>
    <p style="font-size: 15px;"><center><b>{{ $locations->address}} Ph: {{ $locations->ph}} Fax: {{ $locations->fax}} Email: {{ $locations->email}}</b></p></center>
    <table>
      <tr>
        <td rowspan="2" style="width: 200px;align-items: center;">&nbsp;&nbsp;&nbsp;&nbsp;<b>CONDITION &nbsp;&nbsp; REPORT</b></td>
        <td>&nbsp;&nbsp;Resident Name:  {{ $condition_report->res_name}}</td>
        <td>&nbsp;&nbsp;Room No:  {{ $condition_report->room}}</td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;Staff Name:  {{ $condition_report->stf_name}}</td>
        <td>&nbsp;&nbsp;Date: {{date('d-m-Y', strtotime($condition_report->res_date)) }} </td>
      </tr>
    </table>

    <p> Legends:&nbsp;&nbsp;Facilty Owned: F &nbsp;&nbsp;&nbsp;&nbsp;Resident Owned: O &nbsp;&nbsp;&nbsp;&nbsp; Poor: P &nbsp;&nbsp;&nbsp;&nbsp;Good: G &nbsp;&nbsp;&nbsp;&nbsp;In need of Repair: R</p>
    <table style="border: 2px; border-width: 1px; border-color: black;">
      <tr>
        <td><center>Item no</center></td>
        <td><center>Item / Furniture</center></td>
        <td style="width:50px;"><center>Owned By</center></td>
        <td style="width:20px;"><center>Condition(P/G/R)</center></td>
        <td><center>Comments / Description</center></td>
        <td><center>Resident Sign</center></td>
        <td><center>Staff's Sign</center></td>

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
          'width: 1000;' +
          'padding: 10px;' +
          'margin: auto;' +
          'border: 3px solid black;' +
          '}' +
        '</style>';

        htmlToPrint += document.getElementById(divName).outerHTML;
        w=window.open();
        w.document.write(htmlToPrint);
        w.print();
        w.close();
    }
</script>
<script type="text/javascript">
  function saveEdits() {

//get the editable element
var editElem3 = document.getElementById("edit3");

//get the edited element content
var userVersion3 = editElem3.innerHTML;

//save the content to local storage
localStorage.userEdits5 = userVersion3;

//write a confirmation to the user
document.getElementById("update").innerHTML="";

}

function checkEdits() {

//find out if the user has previously saved edits
if(localStorage.userEdits5!=null)
document.getElementById("edit3").innerHTML = localStorage.userEdits5;
}
</script>
  </body>
</html>