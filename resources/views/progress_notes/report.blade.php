                                                  

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
    <h2><center>Staff Progress Notes</center></h2>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Full Name</td>
        <td style="border: 1px solid black;">{{ $resi->res_name}}</td>

        <td style="border: 1px solid black;">Given Name</td>
        <td style="border: 1px solid black;">{{ $resi->g_name}}</td>

      </tr>
     
    </table><br>

    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">DOB/Age</td>
        <td style="border: 1px solid black;">{{ date('d-m-Y', strtotime($resi->dob))}}</td>

        <td style="border: 1px solid black;">Sex</td>
        <td style="border: 1px solid black;">{{ $resi->gender}}</td>

        <td style="border: 1px solid black;">Room No</td>
        <td style="border: 1px solid black;">{{ $resi->room}}</td>

      </tr>
      
    </table><br>
    <table style="border: 2px; border-width: 1px; border-color: black;">
      <tr style="border: 1px solid black;">
        <th style="border: 1px solid black;" >Date</th>
        <th style="border: 1px solid black;">Activity Progress Notes</th>
        <th style="border: 1px solid black;">Staff</th>
      </tr>
      @foreach($progress_note as $resident)
      <tr>
        <td style="border: 1px solid black;" align="center">{{ date('d-m-Y', strtotime($resident->p_date))}}</td>
        <td style="border: 1px solid black;" align="center">{{ $resident->prg_note}}</td>
        <td style="border: 1px solid black;" align="center">{{ $resident->staff}}</td>
      </tr>
      @endforeach
    
    
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
<script type="text/javascript">
  function saveEdits() {

//get the editable element
var editElem3 = document.getElementById("edit3");

//get the edited element content
var userVersion3 = editElem3.innerHTML;

//save the content to local storage
localStorage.userEdits6 = userVersion3;

//write a confirmation to the user
document.getElementById("update").innerHTML="";

}

function checkEdits() {

//find out if the user has previously saved edits
if(localStorage.userEdits6!=null)
document.getElementById("edit3").innerHTML = localStorage.userEdits6;
}
</script>
  </body>
</html>                          