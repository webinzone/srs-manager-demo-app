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
    <h2><center>Incident Report</center></h2>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Incident Date</td>
        <td style="border: 1px solid black;">Incident Time</td>
        <td style="border: 1px solid black;">Person/involved effected</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($incident->i_date)) }}</td>
        <td style="border: 1px solid black;">{{ $incident->i_time}}</td>
        <td style="border: 1px solid black;">{{ $incident->p_name}}</td>
      </tr>
    </table><br>

    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Staff Name</td>
        <td style="border: 1px solid black;">{{ $incident->s_name}}</td>        
        <td style="border: 1px solid black;">Location</td>
         <td style="border: 1px solid black;">{{ $incident->place}}</td>
      </tr>
      
    </table><br>

    <table style="border: 1px solid black;">
      
       <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Persons notified</td>
         <td style="border: 1px solid black;">{{ $incident->doctor}}</td>
       <td style="border: 1px solid black;">Notified Date</td>
       <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($incident->n_date)) }}</td>
        <td style="border: 1px solid black;">Notified Time</td>
        <td style="border: 1px solid black;">{{ $incident->n_time}}</td>
      </tr>
       
    </table><br>
     
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;" width="300px">Has Resident transfferd to the hospital?</td>
        <td style="border: 1px solid black;" width="100px">{{ $incident->res_hos}}</td>
        <td style="border: 1px solid black;" width="200px">Incident Details</td>
        <td style="border: 1px solid black;">{{ $incident->i_details}}</td>
      </tr>
      <tr style="border: 1px solid black;">
        
        
      </tr>
    </table><br>

    
     <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
       <td style="border: 1px solid black;" width="200px">Action Date</td>
       <td style="border: 1px solid black;" width="200px">{{date('d-m-Y', strtotime($incident->action_date)) }}</td>
        <td style="border: 1px solid black;" width="200px">Actions taken</td>
        <td style="border: 1px solid black;" width="200px">{{ $incident->actions}}</td>
      </tr>
      <tr style="border: 1px solid black;">
        
        
      </tr>
    </table><br>

    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Follow up Needed</td>
        <td style="border: 1px solid black;">{{ $incident->need}}</td>
        <td style="border: 1px solid black;">Other details</td>
        <td style="border: 1px solid black;">{{ $incident->o_det}}</td>
      </tr>
     
    </table><br>
    
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;" width="300px">Prescribed reportable incident</td>
        <td style="border: 1px solid black;">{{ $incident->i_prescribed}}</td>
      </tr>
    
    </table><br>
    
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Police Notified</td>
        <td style="border: 1px solid black;">Does the resident’s support plan need updating?</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $incident->police_noti}}</td>
        <td style="border: 1px solid black;">{{ $incident->sp_update}}</td>
      </tr>
    </table><br>

    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Reported to the Department</td>
        <td style="border: 1px solid black;">Authorized Officer’s Name</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $incident->reported}}</td>
        <td style="border: 1px solid black;">{{ $incident->auth_name}}</td>
      </tr>
    </table><br>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
       <td style="border: 1px solid black;">Reported Date</td>
        <td style="border: 1px solid black;">Reported Time</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($incident->rep_date)) }}</td>
        <td style="border: 1px solid black;">{{ $incident->rep_time}}</td>
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