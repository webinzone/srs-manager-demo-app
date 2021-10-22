<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Residential care Manager
    </title>
    
    
  <style type="text/css">

  table, td, th {
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
     <div id="edit12" contenteditable="true">
        <div class="container">
    <center>
      <h1 >{{ $locations->master_name}}</h1>
    </center>
    <p style="font-size: 15px;"><center><b>{{ $locations->address}} Ph: {{ $locations->ph}} Fax: {{ $locations->fax}} Email: {{ $locations->email}}</b></p></center>
    <h1><center>VACATE FORM</center></h1>
    <div style="background-color:grey;color:white;padding:5px;">
      <center><h3>DEPARTMENT OF HEALTH – TEMPLATE FORM - NOTICE TO VACATE</h3></center>
    </div>
    <p style="color:blue;">This is a sample form proprietors can use to issue a notice to vacate to a resident. It includes the prescribed information as set out in Part 6 of the Supported Residential Services (Private Proprietors) Act 2010 (the Act).</p>
    <div style="background-color:grey;color:white;padding:5px;">
      <center><h3>NOTICE TO VACATE</h3></center>
    </div>
    <div>
    <p><b>How to use this form</b></p>
    <p><b>1.&nbsp;&nbsp;Identify your reason for giving a notice to vacate</b></p>
      <p>The permitted reasons are set out in the table below. Also consult Part 6 of the Act to make sure you are giving a notice to vacate correctly. In this form, insert the section number and reason for the notice.</p>
    <p><b>2.&nbsp;&nbsp;Work out the notice period required</b></p>
    <p>Each reason has a statutory minimum number of days notice that you can give your resident to vacate the SRS. You may give longer notice periods. The notice period is the number of days from the date the notice is given to the date by which the resident is requested to leave. In this form, insert the minimum notice period, the actual notice period and the date by which the resident is required to leave.</p>
    <p><b>3.&nbsp;&nbsp;Complete the notice</b></p>
    <p>Fill out the form with enough supporting factual information to validate the reason and ensure the resident understands why they have received the notice.</p>
    <p><b>4.&nbsp;&nbsp;Serve the notice</b></p>
    <p>You can give the notice by hand or registered post to the resident. You must also give a copy to the resident’s person nominated, if there is one.</p></div>
    <p><b>5.&nbsp;&nbsp;Apply to VCAT</b></p>
    <p>Keep a copy of the form for your records. If the resident does not comply, you may apply to VCAT for an order to vacate.</p>
    <p><b>Victorian Civil and Administrative Tribunal</b></p>
    <p>55 King Street Melbourne Vic 3000 Australia. Phone: (03) 9628 9800. <a href="url">www.vcat.vic.gov.au</a></p>

    <table style="border: 1px solid black;">
      <tr style="background-color:grey;color:white;padding:5px;">
       <th style="border: 1px solid black;"></th>
       <th style="border: 1px solid black;"><b>REASON</b></th>
       <th style="border: 1px solid black;"><b>MINIMUM NOTICE PERIOD</b></th> 
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">110</td>
        <td style="border: 1px solid black;">Resident, by act or omission, causes danger to any other resident or staff</td>
        <td style="border: 1px solid black;">Immediate</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">116</td>
        <td style="border: 1px solid black;">Resident has intentionally or recklessly caused or allowed serious damage to the SRS</td>
        <td style="border: 1px solid black;">Immediate</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">117</td>
        <td style="border: 1px solid black;">Resident causes serious disruption to the SRS</td>
        <td style="border: 1px solid black;">Immediate</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">112</td>
        <td style="border: 1px solid black;">Resident has used, or permitted the use of, the SRS for illegal purposes</td>
        <td style="border: 1px solid black;">2 days notice</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">111</td>
        <td style="border: 1px solid black;">Resident’s fees are more than 14 days in arrears</td>
        <td style="border: 1px solid black;">14 days notice</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">114</td>
        <td style="border: 1px solid black;">Resident is in need of more healthcare than the SRS can provide</td>
        <td style="border: 1px solid black;">14 days notice</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">115</td>
        <td style="border: 1px solid black;">Resident is in need of more personal support than the SRS can provide</td>
        <td style="border: 1px solid black;">14 days notice</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">109</td>
        <td style="border: 1px solid black;">Proprietor ceases to operate the SRS</td>
        <td style="border: 1px solid black;">28 days notice</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">113</td>
        <td style="border: 1px solid black;">Proprietor intends to undertake renovations to the SRS which require the residents to</td>
        <td style="border: 1px solid black;">60 days notice</td>
      </tr>
    </table><br><br>
    <table style="border: 1px solid black;">
      <tr style="background-color:grey;color:white;padding:5px;">
        <td style="border: 1px solid black;" colspan="2"><center>RESIDENT/ROOM DETAILS</center></td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Details of person(s) receiving the <br>notice:</td>
        <td style="border: 1px solid black;">NAME OF RESIDENT:&nbsp;{{ $vaccate->res_name}} <br>NAME OF RESIDENT’S PERSON NOMINATED:  &nbsp;{{ $vaccate->p_nomini}}</td>
      </tr>
       <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Details of resident’s occupancy at the <br>SRS</td>
        <td style="border: 1px solid black;">ROOM NUMBER:&nbsp;{{ $vaccate->roomno}}<br>
          SRS NAME:  &nbsp;{{ $vaccate->srs_name}}<br>
        SRS ADDRESS: &nbsp;{{ $vaccate->srs_addr}}</td>
      </tr>
    </table><br><br>
    <table style="border: 1px solid black;">
      <tr style="background-color:grey;color:white;padding:5px;">
        <td style="border: 1px solid black;" colspan="2"><center>PROPRIETOR/MANAGER DETAILS</center></td>
      </tr>
      <tr style="border: 1px solid black;">
        <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Details of proprietor<br> and person giving <br>the notice:</td>
        <td style="border: 1px solid black;">PROPRIETOR NAME:&nbsp;{{ $vaccate->pr_name}}<br>
          PERSON GIVING NOTICE: &nbsp;{{ $vaccate->pr_noti}}<br>
        POSITION IN SRS: &nbsp;{{ $vaccate->pr_posi}}<br>
        PHONE NUMBER:&nbsp;{{ $vaccate->ph}}
      </td>
      </tr>
      
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Address for serving<br> documents:</td>
        <td style="border: 1px solid black;">ADDRESS: As above address:&nbsp;{{ $vaccate->adr}}
        </td>
      </tr>
    </table><br><br>
    <table style="border: 1px solid black;">
      <tr style="background-color:grey;color:white;padding:5px;">
        <td style="border: 1px solid black;" colspan="2"><center>TERMINATION DETAILS</center></td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Termination reason:<br> (You may attach <br>additional information supporting <br>the reason<br> for the<br> notice.)</td>
        <td style="border: 1px solid black;">SECTION:&nbsp;{{ $vaccate->ter_sec}} <br>REASON:  &nbsp;{{ $vaccate->reason}}<br>SUPPORTING INFORMATION:&nbsp;{{ $vaccate->ter_sup}}</td>
      </tr>
       <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Termination date:</td>
        <td style="border: 1px solid black;">MINIMUM DAYS NOTICE TO VACATE:&nbsp;{{ $vaccate->ter_days}}<br>
          DATE RESIDENT IS REQUESTED TO LEAVE THE SRS:  &nbsp;{{ $vaccate->res_date}}<br>
        ACTUAL DAYS NOTICE TO VACATE: &nbsp;{{ $vaccate->act_date}}</td>
      </tr>
    </table><br><br>
    <table style="border: 1px solid black;">
      <tr style="background-color:grey;color:white;padding:5px;">
        <td style="border: 1px solid black;" colspan="2"><center>DELIVERY OF NOTICE</center></td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">This notice was given to the resident:<br>
         <input type="radio"   {{ $vaccate->del_by == 'By Hand' ? 'checked' : ''  }} id="del_by"  value="By Hand" name="del_by" disabled/>&nbsp;&nbsp;&nbsp;By Hand&nbsp;&nbsp;&nbsp;
                        <input type="radio"   {{ $vaccate->del_by == 'By Post' ? 'checked' : ''  }}  id="del_by" value="By Post" name="del_by" disabled/>&nbsp;&nbsp;&nbsp;By Post&nbsp;&nbsp;&nbsp;; <br>
                        DATED:{{ $vaccate->ress_date}}
        </td>
        <td style="border: 1px solid black;">This notice was given to resident’s person nominated:<br>
          <input type="radio"   {{ $vaccate->nomini_by == 'By Hand' ? 'checked' : ''  }} id="nomini_by"  value="By Hand" name="nomini_by" disabled/>&nbsp;&nbsp;&nbsp;By Hand&nbsp;&nbsp;&nbsp;
                        <input type="radio"    {{ $vaccate->nomini_by == 'By Post' ? 'checked' : ''  }}  id="nomini_by" value="By Post" name="nomini_by" disabled/>&nbsp;&nbsp;&nbsp;By Post&nbsp;&nbsp;&nbsp;<br>
                        DATED:{{ $vaccate->nom_date}} </td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;" colspan="2">Signature of proprietor:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;{{ $vaccate->del_date}}<br>
        </td>
      </tr>
    </table><br><br>
     <table style="border: 1px solid black;">
      <tr style="background-color:grey;color:black;padding:5px;">
        <td style="border: 1px solid black;" colspan="2"><b>Resident, please note</b><br><br>
          <b>You are entitled to apply to Victorian Civil and Administrative Tribunal to challenge a Notice to Vacate.</b><br><br>
          <b>The following time limits apply:</b>
        <ul>
          <li><b>within five days from when the notice was received for sections 110, 116 or 117</b></li>
          <li><b>within 28 days from when the notice was received for sections 109, 111, 112, 113, 114, or 115.</b></li>
        </ul>
      </td>
    </tr>
    </table>
    </div>

    

         </div>
        
       </div>
   </div>
 </div>
 
<script type="text/javascript">
  //function saveEdits() {
//
////get the editable element
//var editElem = document.getElementById("edit");
//
////get the edited element content
//var userVersion = editElem.innerHTML;
//
////save the content to local storage
//localStorage.userEdits = userVersion;
//
////write a confirmation to the user
//document.getElementById("update").innerHTML="";
//
//}
//
//function checkEdits() {
//
////find out if the user has previously saved edits
//if(localStorage.userEdits!=null)
//document.getElementById("edit").innerHTML = localStorage.userEdits;
//}
</script>
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
var editElem12 = document.getElementById("edit12");

//get the edited element content
var userVersion12 = editElem12.innerHTML;

//save the content to local storage
localStorage.userEdits12 = userVersion12;

//write a confirmation to the user
document.getElementById("update").innerHTML="";

}

function checkEdits() {

//find out if the user has previously saved edits
if(localStorage.userEdits12!=null)
document.getElementById("edit12").innerHTML = localStorage.userEdits12;
}
</script>

  </body>
</html>