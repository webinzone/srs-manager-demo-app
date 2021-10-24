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
      td{
        width: 200px;
        padding: 3px;
      }
  </style>




  </head>

   <body onload="checkEdits()">

  <div id="webui">
    <div class="row">
      
         <input type="button" class="right" style="right: 90px; align-items: right;" onclick="printDiv('print-content1')" value="PRINT"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="button" style="left:200px;" value="SAVE" onclick="saveEdits()"/>&nbsp;&nbsp;&nbsp;<br><br>
  <div id="print-content1">
     <div id="edit11" contenteditable="true">
        <div class="container">

     <center>
      <h1 >{{ $locations->master_name}}</h1>
    </center>
    <p style="font-size: 15px;"><center><b>{{ $locations->address}} Ph: {{ $locations->ph}} Fax: {{ $locations->fax}} Email: {{ $locations->email}}</b></p></center>
    <h2><center>Complaint/Suggestion Form (Resident/relative/Visitor)</center></h2>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Facility Name</td>
        <td style="border: 1px solid black;">{{ $complaint->f_name }}</td>
        <td style="border: 1px solid black;">Date</td>
        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($complaint->c_date)) }}</td>       
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Name of Person Commenting</td>
        <td style="border: 1px solid black;">{{ $complaint->user_name}}</td>
        <td style="border: 1px solid black;">Nature of Complaint</td>
        <td style="border: 1px solid black;">{{ $complaint->com_nature}}</td>
      </tr>  
         <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Person completing form</td>
        <td style="border: 1px solid black;">{{ $complaint->p_comp}}</td>
        <td style="border: 1px solid black;">Contact Number</td>
        <td style="border: 1px solid black;">{{ $complaint->phone}}</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;"><i>Person Nominated</i></td>
        <td style="border: 1px solid black;"><i>{{ $complaint->p_nomini}}</i></td>
        <td style="border: 1px solid black;"><i>Date & Time Notified</i></td>
        <td style="border: 1px solid black;"><i>{{date('d-m-Y', strtotime($complaint->noti_date)) }}&nbsp;&nbsp;&nbsp;&nbsp;{{ $complaint->noti_time}}</i></td>        
      </tr>
      <tr>
        <td style="border: 1px solid black;">Complaint Details</td>
        <td style="border: 1px solid black;" colspan="5">{{ $complaint->com_details}}</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;height: 70px;">Suggestion for improvements</td>
        <td style="border: 1px solid black;height: 70px;" colspan="2">{{ $complaint->suggestions}}</td>
        <td style="border: 1px solid black;">sign:</td>       
      </tr>
      <tr>
        <td style="border: 1px solid black;"  colspan="5"><i>To complete by Complaints Officer after investigating the complaint &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action Date:&nbsp;&nbsp;{{date('d-m-Y', strtotime($complaint->action_date)) }}</i></td>
      </tr>
      <tr>
        <td style="border: 1px solid black;height: 70px;">Action Taken</td>
        <td style="border: 1px solid black;height: 70px;" colspan="3">{{ $complaint->action_taken}}</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;height: 70px;">Outcome/Method of Communication: Email, Ph, verbal, etc</td>
        <td style="border: 1px solid black;height: 70px;" colspan="3">Email is sent to people who trespassed in property to address the issue. <br>
          {{ $complaint->outcome}}</td>     
      </tr>
      <tr>
        <td style="border: 1px solid black;" colspan="5">Note:</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;" colspan="5"><i>Please note: Management will consider the issues rose in due course and action will commence within 2 working days to address areas of concern where appropriate. All complaints are confidential in nature.</i></td>
      </tr>
      <tr>
        <td style="border: 1px solid black;height: 20px;" colspan="5"></td>
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
var editElem11 = document.getElementById("edit11");

//get the edited element content
var userVersion11 = editElem11.innerHTML;

//save the content to local storage
localStorage.userEdits111 = userVersion11;

//write a confirmation to the user
document.getElementById("update").innerHTML="";

}

function checkEdits() {

//find out if the user has previously saved edits
if(localStorage.userEdits111!=null)
document.getElementById("edit11").innerHTML = localStorage.userEdits111;
}
</script>
  </body>
</html>
