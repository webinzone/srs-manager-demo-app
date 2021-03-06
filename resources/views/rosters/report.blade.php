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
     <div id="edit3334" contenteditable="true">
        <div class="container">

     <center>
      <h1 >{{ $locations->master_name}}</h1>
    </center>
    <p style="font-size: 15px;"><center><b>{{ $locations->address}} Ph: {{ $locations->ph}} Fax: {{ $locations->fax}} Email: {{ $locations->email}}</b></p></center>
    <table>
      <tr>
        <td rowspan="2" style="width: 200px;align-items: center;">&nbsp;&nbsp;&nbsp;&nbsp;<b>STAFF &nbsp;&nbsp; ROSTER</b></td>
        <td>&nbsp;&nbsp;From:  {{ date('d-m-Y', strtotime($roster->p_from))}}</td>
        <td>&nbsp;&nbsp;To:  {{ date('d-m-Y', strtotime($roster->p_to))}}</td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;Manager:  {{ $roster->mngr}}</td>
        <td>&nbsp;&nbsp;Acting Manager: {{ $roster->a_mngr}} </td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;Complaint Officer:  {{ $roster->c_oofr}}</td>
        <td>&nbsp;&nbsp;Prop: {{ $roster->prop}} </td>
        <td>&nbsp;&nbsp;Prop: {{ $roster->faci}} </td>
      </tr>
    </table>

    
    <table style="border: 2px; border-width: 1px; border-color: black;">
      <tr>
        <td><center>Emp</center></td>
        <td><center>Role</center></td>
        <td><center>Sun</center></td>
        <td><center>Mon</center></td>
        <td><center>Tue</center></td>
        <td><center>Wed</center></td>
        <td><center>Thu</center></td>
        <td><center>Fri</center></td>
        <td><center>Sat</center></td>
        <td><center>Total Hours</center></td>

      </tr>
    @for ($i=0; $i < $num; $i++)
      <tr class="blank_row">
        <td>{{$e_name[$i] }}</td>
        <td>{{$e_pos[$i] }}  </td>
        <td>{{ $sun_leav[$i] == '' ? $sun[$i].' - '.$sunto[$i] : $sun_leav[$i] }}</td>
        <td>{{ $mon_leav[$i] == '' ? $mon[$i].' - '.$monto[$i] : $mon_leav[$i] }}</td>
        <td>{{ $tues_leav[$i] == '' ? $tue[$i].' - '.$tueto[$i] : $tues_leav[$i] }}</td>
        <td>{{ $wed_leav[$i] == '' ? $wed[$i].' - '.$wedto[$i] : $wed_leav[$i] }}</td>
        <td>{{ $thur_leav[$i] == '' ? $thu[$i].' - '.$thuto[$i] : $thur_leav[$i] }}</td>
        <td>{{ $fri_leav[$i] == '' ? $fri[$i].' - '.$frito[$i] : $fri_leav[$i] }}</td>
        <td>{{ $sat_leav[$i] == '' ? $sat[$i].' - '.$satto[$i] : $sat_leav[$i] }}</td>
      
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$tot_hr[$i] }}&nbsp;&nbsp;hr</td>    
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
var editElem3334 = document.getElementById("edit3334");

//get the edited element content
var userVersion3334 = editElem3334.innerHTML;

//save the content to local storage
localStorage.userEdits55566 = userVersion3334;

//write a confirmation to the user
document.getElementById("update").innerHTML="";

}

function checkEdits() {

//find out if the user has previously saved edits
if(localStorage.userEdits55566!=null)
document.getElementById("edit3334").innerHTML = localStorage.userEdits55566;
}
</script>
  </body>
</html>