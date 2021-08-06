<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Residential care Manager
    </title>
    
    
  <style type="text/css">

  .container{
  width: 1000px;
  padding: 50px;
  margin: auto;
  border: 3px solid black;

  }
  td{
    border: 1px solid black;
  }
  table {
    width: 100%;
    border: 1px solid black;
  }
  .border-class{
       border: 1px solid black;
       padding: 10px;

      }
  .abc{
  padding: 10px;
  width: auto;
  border: 1px solid black;
  }
  .myDIV {
  text-decoration: underline;
  text-decoration-style:dotted;
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
    <h2><center>Referral Report </center></h2>
    <h3 style="font-family:Bedrock"><i>PART A: for b client or client's representative (if applicable):</i></h3>
    <div class="abc">
    <h5 style="font-size: 16px;"><b><i>CONSENT TO RELEASE OF INFORMATION</b></i></h5>
    I,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="con_name" id="con_name" class="border-class" style="width:400px"  value="{{ $referral->con_name}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="refer_name" id="refer_name" class="border-class" style="width:400px"  value="{{ $referral->refer_name}}" readonly>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Name of person giving this consent) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Name of person being referred)</p>
    <p>connsent for the information collected on the attached SRS Referral Form to be released to the SRS provider who will be providing accommodation and care to:</p>
    <p>Signed............................................................................................................................................
    <input type="text" name="r_date" id="r_date" class="border-class"  style="width:300px" value="Date:&nbsp;&nbsp;&nbsp; {{ $referral->r_date}}" readonly></p>
      

    <table>
      <tr>
        <td class="border-class" style="width:640px">Representative Name:&nbsp;&nbsp;&nbsp; {{ $referral->rep_name}} </td>
        <td class="border-class">Relationship: &nbsp;&nbsp;&nbsp;{{ $referral->relation}}</td>
      </tr>
      <tr>
         <td class="border-class" width="550px">Email:&nbsp;&nbsp;&nbsp; {{ $referral->email}}</td>
        <td class="border-class">Phone:&nbsp;&nbsp;&nbsp; {{ $referral->ph}}</td>
      </tr>
    </table>
    <p>[Note: this consent is requested in order to comply with privacy legislation]</p>
  </div>

    <h3 style="font-family:Bedrock">PART B: for completion by referrer:</h3>
    <div class="abc">
      <h5 style="font-size: 16px;"><b><i>REASON FOR REFERRAL TO SRS </b></i></h5>
      I,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="reason" id="reason" class="border-class" style="width:500px"  value="{{ $referral->reason}}">&nbsp;&nbsp; am familiar with the above-named SRS and the services it provides to residents<br>
      <p>I consider that referral of this client to the SRS is appropriate because:</p>
      <textarea name="appr_becoz" class="border-class" style="width:900px" readonly>{{ $referral->appr_becoz}}</textarea><br>
      <p>Signed............................................................................................................................&nbsp;&nbsp;&nbsp;&nbsp;
        <label>Date</label>&nbsp;&nbsp;
    <input type="text" name="ref_date" id="ref_date" class="border-class"  style="width:300px" value=" {{ $referral->ref_date}}" readonly></p><br>
    <label>Position</label>&nbsp;&nbsp;
    <input type="text" name="ref_posi" id="ref_posi" class="border-class"  style="width:300px" value=" {{ $referral->ref_posi}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Agency</label>&nbsp;&nbsp;
    <input type="text" name="ref_agency" id="ref_agency" class="border-class"  style="width:300px" value=" {{ $referral->ref_agency}}" readonly><br><br>
    <input type="text" name="ref_email" id="ref_email" class="border-class"  style="width:550px" value="Email ID: &nbsp;&nbsp;&nbsp;{{ $referral->ref_email}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="ref_ph" id="ref_ph" class="border-class"  style="width:280px" value=" Phone: &nbsp;&nbsp;&nbsp;{{$referral->ref_ph}}" readonly>
  </div>
  <p><center>Meadowbrook SRS: Ph: 0397476999, Fax: 0397460344 Sydenham Grace : Ph: 03 83908400, Fax: 03 83908500 </center><br><center>Email: info@gracemanor.com.au sydenham@gracemanor.com.au pradeep@gracemanor.com.au</center><br>
<center>Web : www.g racemanor.com.au</center></p>

    <div class="abc">
    <h3 style="font-family:Bedrock"><i>Client  Details:</i></h3>
      <input type="text" name="cfname" id="cfname" class="border-class" style="width:400px"  value="First Name:&nbsp;&nbsp;&nbsp;{{ $referral->cfname}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="csurname" id="csurname" class="border-class" style="width:400px"  value="Surname:&nbsp;&nbsp;&nbsp; {{ $referral->csurname}}" readonly><br><br>
    <input type="text" name="cdob" id="cdob" class="border-class" style="width:320px"  value="Date of Birth:&nbsp;&nbsp;&nbsp; {{ $referral->cdob}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Gender:</label>&nbsp;&nbsp;&nbsp;{{ $referral->cgender}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="creligion" id="creligion" class="border-class" style="width:310px"  value="Religion:&nbsp;&nbsp;&nbsp; {{ $referral->creligion}}" readonly><br><br>
    <input type="text" name="cph" id="cph" class="border-class" style="width:910px"  value="Client Contact details: Mobile:&nbsp;&nbsp;&nbsp;{{ $referral->cph}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email ID: &nbsp;&nbsp;&nbsp;{{ $referral->cemail}}" readonly><br><br>
    <input type="text" name="caddress" id="caddress" class="border-class" style="width:910px"  value="Current Address:&nbsp;&nbsp;&nbsp;{{ $referral->caddress}}" readonly>
    <p>[If client is residing in another SRS]:</p>
    <label>Name of SRS</label>&nbsp;&nbsp;&nbsp;
    <input type="text" name="csrs_name" id="csrs_name" class="border-class"  style="width:450px" value="{{ $referral->csrs_name}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="csrs_ph" id="csrs_ph" class="border-class"  style="width:280px" value=" Ph: &nbsp;&nbsp;&nbsp;{{$referral->csrs_ph}}" readonly><br><br>
    <p>[if the client has private health insurance]:</p>
    <label>Insurer</label>&nbsp;&nbsp;&nbsp;
    <input type="text" name="csrs_insu" id="csrs_insu" class="border-class"  style="width:400px" value="{{ $referral->csrs_insu}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Ref. Number</label>&nbsp;&nbsp;&nbsp;
    <input type="text" name="csrs_refno" id="csrs_refno" class="border-class"  style="width:280px" value="{{$referral->csrs_refno}}" readonly>
  </div><br>
    

   
    
    <div class="abc">
    <h3 style="font-family:Bedrock"><i>Next of Kin Details:</i></h3>
    <label>Name</label>&nbsp;&nbsp;&nbsp;
    <input type="text" name="nok_name" id="nok_name" class="border-class"  style="width:480px" value="{{ $referral->nok_name}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="nok_relation" id="nok_relation" class="border-class"  style="width:300px" value="Relation:&nbsp;&nbsp;&nbsp; {{$referral->nok_relation}}" readonly><br><br>
    <input type="text" name="nok_address" id="nok_address" class="border-class" style="width:910px"  value="Address:&nbsp;&nbsp;&nbsp;{{ $referral->nok_address}}" readonly><br><br>
    <input type="text" name="nok_email" id="nok_email" class="border-class"  style="width:530px" value="Email :&nbsp;&nbsp;&nbsp; {{ $referral->nok_email}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="nok_ph" id="nok_ph" class="border-class"  style="width:305px" value=" Phone: &nbsp;&nbsp;&nbsp;{{$referral->nok_ph}}" readonly><br><br>
    </div><br><br>
    
    <div class="abc">
    <label>Medical Practitioner:</label>
    <input type="text" name="nok_address" id="nok_address" class="border-class" style="width:770px"  value="Name/Address&nbsp;&nbsp;&nbsp;{{ $referral->gp_name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $referral->gp_address}}" readonly><br><br>
    <input type="text" name="nok_address" id="nok_address" class="border-class" style="width:910px"  value="Phone/Fax/Email:&nbsp;&nbsp;&nbsp;{{ $referral->gp_ph}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $referral->gp_fax}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $referral->gp_email}}" readonly><br><br>
  </div><br><br>

  <div class="abc">
    <label>Guardian Details <i>(if the ctient has guardian)</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Client Ref Number: &nbsp;&nbsp; {{ $referral->gua_refno}}</label><br><br>
    <input type="text" name="gua_name" id="gua_name" class="border-class" style="width:910px"  value="Name/Address:&nbsp;&nbsp;&nbsp;{{ $referral->gua_name}}" readonly><br><br>
    <input type="text" name="gua_addr" id="gua_addr" class="border-class" style="width:910px"  value="Address:&nbsp;&nbsp;&nbsp;{{ $referral->gua_addr}}" readonly><br><br>
    <input type="text" name="gua_email" id="gua_email" class="border-class"  style="width:530px" value="Email Id : &nbsp;&nbsp;&nbsp;{{ $referral->gua_email}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="gua_ph" id="gua_ph" class="border-class"  style="width:305px" value=" Phone:&nbsp;&nbsp;&nbsp; {{$referral->gua_ph}}" readonly><br><br>
  </div><br><br>
  <div class="abc">
    <p>[If the client has an administrator]:</p>
    <input type="text" name="ad_name" id="ad_name" class="border-class" style="width:400px"  value="Name: &nbsp;&nbsp;&nbsp;{{$referral->ad_name}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="ad_refno" id="ad_refno" class="border-class" style="width:400px"  value="Client Ref Number:&nbsp;&nbsp;&nbsp; {{ $referral->ad_refno}}" readonly><br><br>
    <input type="text" name="ad_addr" id="ad_addr" class="border-class" style="width:915px"  value="Address:&nbsp;&nbsp;&nbsp;{{ $referral->ad_addr}}" readonly><br><br>
    <input type="text" name="ad_email" id="ad_email" class="border-class" style="width:400px"  value="Email: &nbsp;&nbsp;&nbsp;{{$referral->ad_email}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="ad_ph" id="ad_ph" class="border-class" style="width:400px"  value="Phone:&nbsp;&nbsp;&nbsp; {{ $referral->ad_ph}}" readonly><br><br>
  </div><br><br>
  <div class="abc">
    <p><b><i>Pension Details</i></b><br>
    Type of Income
    <input disabled {{ $referral->pen_type == 'Centrelink' ? 'checked' : ''  }}  type="checkbox" name="pen_type" value="Centrelink" > Centrelink</label>&nbsp;&nbsp;
                                <label><input disabled {{ $referral->pen_type == 'Veterans Affairs' ? 'checked' : ''  }}  type="checkbox" name="pen_type" value="Veterans Affairs" readonly> Veterans Affairs</label>&nbsp;&nbsp;
                                <label><input disabled {{ $referral->pen_type == 'Overseas Pension' ? 'checked' : ''  }} type="checkbox" name="pen_type" value="Overseas Pension" readonly> Overseas Pension</label>&nbsp;&nbsp;
                                <label><input disabled {{ $referral->pen_type == 'Other' ? 'checked' : ''  }} type="checkbox" name="pen_type" value="Other" readonly> Other</label>&nbsp;&nbsp;</p><br><br>
    <input type="text" name="pen_refno" id="pen_refno" class="border-class" style="width:910px"  value="Client Ref Number:&nbsp;&nbsp;&nbsp;{{ $referral->pen_refno}}" readonly><br><br>
    <input type="text" name="pen_medino" id="pen_medino" class="border-class"  style="width:510px" value="Medicare Number&nbsp;&nbsp;&nbsp; {{ $referral->pen_medino}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="pen_mediexp" id="pen_mediexp" class="border-class"  style="width:300px" value=" Expiry Date &nbsp;&nbsp;&nbsp;{{$referral->pen_mediexp}}" readonly><br><br>
    <input type="text" name="pen_taxi" id="pen_taxi" class="border-class"  style="width:510px" value="Taxi Card Concession Number&nbsp;&nbsp;&nbsp; {{ $referral->pen_taxi}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="pen_taxiexp" id="pen_taxiexp" class="border-class"  style="width:300px" value=" Expiry Date &nbsp;&nbsp;&nbsp;{{$referral->pen_taxiexp}}" readonly><br><br>
    </div><br><br>


    
                <div class="table">
                  <div class="col-md-12 mb-3" >
                <table id="drugss" style="border: 2px; border-width: 1px; border-color: black; padding-left: 8px;left: 50px; padding: 10px;">
                  <tr style="padding:5px;">Medication.This information to be provided by client's health provider. </tr>
                  <tr style="padding:5px;">
                    <th>Drug name</th>
                    <th>Dose</th>
                    <th>Frequency</th>
                    <th>Duration</th>
                    <th>Last Taken</th>
                  </tr>
                @for ($i=0; $i < $num; $i++)
                  <tr>
                  <td><input type="text" id="f7" value="{{ $drug[$i] }}"  name="medi_drugname[]" readonly></td>
                  <td><input type="text" id="f7" value="{{ $dose[$i] }}" name="medi_dose[]" readonly></td>
                  <td><input type="text" id="f7" value="{{ $freq[$i] }}" name="medi_freq[]" readonly></td>
                  <td><input type="text" id="f7" value="{{ $duration[$i] }}" name="medi_duration[]" readonly></td>
                  <td><input type="text" id="f7" value="{{ $last[$i] }}" name="medi_lasttaken[]" readonly></td>
                </tr>
                @endfor
                <tr>
                  <td><input type="text" id="f7" name="medi_drugname[]" readonly></td>
                  <td><input type="text" id="f7" name="medi_dose[]" readonly></td>
                  <td><input type="text" id="f7" name="medi_freq[]" readonly></td>
                  <td><input type="text" id="f7" name="medi_duration[]" readonly></td>
                  <td><input type="text" id="f7" name="medi_lasttaken[]" readonly></td>
                </tr>
                <tr>
                  <td><input type="text" id="f7" name="medi_drugname[]" readonly></td>
                  <td><input type="text" id="f7" name="medi_dose[]" readonly></td>
                  <td><input type="text" id="f7" name="medi_freq[]" readonly></td>
                  <td><input type="text" id="f7" name="medi_duration[]" readonly></td>
                  <td><input type="text" id="f7" name="medi_lasttaken[]" readonly></td>
                </tr>
                <tr>
                  <td><input type="text" id="f7" name="medi_drugname[]" readonly></td>
                  <td><input type="text" id="f7" name="medi_dose[]" readonly></td>
                  <td><input type="text" id="f7" name="medi_freq[]" readonly></td>
                  <td><input type="text" id="f7" name="medi_duration[]" readonly></td>
                  <td><input type="text" id="f7" name="medi_lasttaken[]" readonly></td>
                </tr>
                
                
                </table>
              </div>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="abc">
    <label>Does client have the medication with her/him?</label>
                        <input type="radio" disabled  {{ $referral->c_medi == 'Y' ? 'checked' : ''  }} id="c_medi" onchange="findselected();" value="Y" name="c_medi" readonly>&nbsp;&nbsp;&nbsp;Y&nbsp;&nbsp;&nbsp;
                        <input type="radio" disabled {{ $referral->c_medi == 'N' ? 'checked' : ''  }} id="c_medi" value="N" onchange="findselected();" name="c_medi" readonly>&nbsp;&nbsp;&nbsp;N&nbsp;&nbsp;&nbsp;<br><br>
    <label>Is the client able to administer own medication?</label>
                      <input type="radio" disabled {{ $referral->c_ownmedi == 'Y' ? 'checked' : ''  }} id="c_ownmedi" onchange="findselected();" value="Y" name="c_ownmedi" readonly>&nbsp;&nbsp;&nbsp;Y&nbsp;&nbsp;&nbsp;
                        <input type="radio" disabled {{ $referral->c_ownmedi == 'N' ? 'checked' : ''  }} id="c_ownmedi" value="N" onchange="findselected();" name="c_ownmedi" readonly>&nbsp;&nbsp;&nbsp;N&nbsp;&nbsp;&nbsp;<br><br>
    <p>Please specify any anticipated side effects of medication:</p>
    <textarea name="c_medisideeffect" class="border-class" style="width:900px" readonly>{{ $referral->c_medisideeffect}}</textarea><br>
  </div><br>

  <div class="abc">
    <p><i>Physical Status:</i></p>
    <p>Please list any pre-existing medical conditions or allergies.</p>
    <textarea name="ph_status" class="border-class" style="width:900px"  readonly>{{ $referral->ph_status}}</textarea><br>
  </div><br>

  <div class="abc">
    <p><i>Cognitive Status</i></p>
    <p>Please list any cognitive issues to which SRS staff need to be alerted, e.g. orientation to time and place; independence in decision making; memory impairment; other.</p>
    <textarea name="cogi_status" class="border-class" style="width:900px" readonly>{{ $referral->cogi_status}}</textarea><br>
    <p><i>Disability</i></p>
    <p>[If the client is registered with Disability Services (DHS)]:</p>
    <input type="text" name="dis_primary" id="dis_primary" class="border-class" style="width:905px"  value="Primary Disability:&nbsp;&nbsp;&nbsp;{{ $referral->dis_primary}}" readonly><br><br>
    <input type="text" name="dis_casemngr" id="dis_casemngr" class="border-class" style="width:420px"  value="Case Manager:&nbsp;&nbsp;&nbsp;{{ $referral->dis_casemngr}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="dis_org" id="dis_org" class="border-class" style="width:420px"  value="Organisation:&nbsp;&nbsp;&nbsp; {{ $referral->dis_org}}" readonly><br><br>
    <input type="text" name="dis_email" id="dis_email" class="border-class"  style="width:530px" value="Email Id :&nbsp;&nbsp;&nbsp; {{ $referral->dis_email}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="dis_ph" id="dis_ph" class="border-class"  style="width:325px" value=" Phone:&nbsp;&nbsp;&nbsp; {{$referral->dis_ph}}" readonly><br><br>
  </div><br><br>
   <div class="abc">
    <p><i>Mental Health Status:</i></p>
    <p>Please specify any mental health issues to which staff needs to be alerted.</p>
    <textarea name="ment_status" class="border-class" style="width:900px" readonly>{{ $referral->ment_status}}</textarea><br>
    <p>[if the client is subject to a Community Treatment Order]:</p>
    <input type="text" name="ment_casemngr" id="ment_casemngr" class="border-class" style="width:420px"  value="Case Manager:&nbsp;&nbsp;&nbsp;{{ $referral->ment_casemngr}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="ment_org" id="ment_org" class="border-class" style="width:415px"  value="Organisation:&nbsp;&nbsp;&nbsp; {{ $referral->ment_org}}" readonly><br><br>
    <input type="text" name="ment_email" id="ment_email" class="border-class"  style="width:525px" value="Email  :&nbsp;&nbsp;&nbsp; {{ $referral->ment_email}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="ment_ph" id="ment_ph" class="border-class"  style="width:325px" value=" Phone:&nbsp;&nbsp;&nbsp; {{$referral->ment_ph}}" readonly><br><br>
  </div><br><br>

  <div class="abc">
    <label><i>Behaviour</i><br>
    List any behaviour </label>
                            <br><label><input disabled  {{ $referral->behav_harm == 'Self-harm' ? 'checked' : ''  }}  type="checkbox" name="behav_harm" value="Self-harm" > Self-harm</label>&nbsp;&nbsp;
                            <label><input disabled  {{ $referral->behav_harm == 'Smoking' ? 'checked' : ''  }}  type="checkbox" name="behav_harm" value="Smoking" > Smoking</label>&nbsp;&nbsp;
                                <label><input disabled {{ $referral->behav_harm == 'Self-Motivation' ? 'checked' : ''  }}  type="checkbox" name="behav_harm" value="Self-Motivation" > Self-Motivation</label>&nbsp;&nbsp;
                                <label><input disabled {{ $referral->behav_harm == 'Capacity for cooperation' ? 'checked' : ''  }} type="checkbox" name="behav_harm" value="Capacity for cooperation" > Capacity for cooperation</label>&nbsp;&nbsp;
                                <label><input disabled {{ $referral->behav_harm == 'Wandering' ? 'checked' : ''  }} type="checkbox" name="behav_harm" value="Wandering" > Wandering</label>&nbsp;&nbsp;
                                <label><input disabled {{ $referral->behav_harm == 'Capacity to share' ? 'checked' : ''  }} type="checkbox" name="behav_harm" value="Capacity to share" > Capacity to share</label>&nbsp;&nbsp;
                                <label><input disabled {{ $referral->behav_harm == 'Capacity to socialise' ? 'checked' : ''  }} type="checkbox" name="behav_harm" value="Capacity to socialise" > Capacity to socialise</label>&nbsp;&nbsp;
                                <label><input disabled {{ $referral->behav_harm == 'Verbal aggression' ? 'checked' : ''  }} type="checkbox" name="behav_harm" value="Verbal aggression" > Verbal aggression</label>&nbsp;&nbsp;
                                <label><input disabled {{ $referral->behav_harm == 'Drug/alcohol' ? 'checked' : ''  }} type="checkbox" name="behav_harm" value="Drug/alcohol" > Drug/alcohol</label>&nbsp;&nbsp;
                                <label><input disabled {{ $referral->behav_harm == 'Impulse control' ? 'checked' : ''  }} type="checkbox" name="behav_harm" value="Impulse control" > Impulse control</label>&nbsp;&nbsp;
                                <label><input disabled {{ $referral->behav_harm == 'Other' ? 'checked' : ''  }} type="checkbox" name="behav_harm" value="Other" > Other</label>&nbsp;&nbsp; <br><br>     
    <textarea name="behav_details" class="border-class" style="width:900px" readonly>Details:&nbsp;&nbsp;&nbsp;{{ $referral->behav_details}}</textarea><br><br>
    <textarea name="triger" class="border-class" style="width:900px" readonly>List any known "triggers" for problem behaviour :&nbsp;&nbsp;&nbsp;{{ $referral->triger}}</textarea><br>
  </div><br><br>

  <div class="form-row">
                  <div class="col-md-12 mb-3" >
            <table style="border: 1px solid black; padding-left: 8px;left: 50px;">
                  <tr style="border: 1px solid black; padding-left: 8px;left: 50px;">
                    <thead style="padding:10px;">
                    <th style="left:5px;" width="50px;">S.NO</th>
                    <th width="500px;">If you answer "Yes" pl provide further information.</th>
                    <th width="50px;">&nbsp;&nbsp;YES</th>
                    <th width="50px;">&nbsp;&nbsp;NO</th>
                    <th width="200px;">Details(If you answer "Yes" pl provide further information)</th>
                    </thead>
                  </tr>
                  <tr>
                  <td>1</td>
                  <td>Have you been told by a doctor or other health professional that you have a health condition (eg breathing problems, a cancer, heart problems, chronic kidney disease, diabetes, high biood pressure, arthritis, osteoporosis or other condition)?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med1 == 'Yes' ? 'checked' : ''  }} name="med1" value="Yes"/></td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med1 == 'NO' ? 'checked' : ''  }} name="med1" value="NO"/> </td>
                  <td>{{ $referral2->med1_det}}</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Have you recently had problems with your teeth, mouth, gums or dentures?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med2 == 'Yes' ? 'checked' : ''  }} name="med2" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med2 == 'NO' ? 'checked' : ''  }} name="med2" value="NO"/> </td>
                  <td>{{ $referral2->med2_det}}</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Are you concerned about your medications?</td>

                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med3 == 'Yes' ? 'checked' : ''  }} name="med3" value="Yes"/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med3 == 'NO' ? 'checked' : ''  }} name="med3" value="NO"/> </td>
                  <td>{{ $referral2->med3_det}}</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Are you concerned about your lack of physical activity?</td>

                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med4 == 'Yes' ? 'checked' : ''  }} name="med4" value="Yes" /> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med4 == 'NO' ? 'checked' : ''  }} name="med4" value="NO" /> </td>
                  <td>{{ $referral2->med4_det}}</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Are you concerned about your weight?</td>

                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med5 == 'Yes' ? 'checked' : ''  }} name="med5" value="Yes"/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med5 == 'NO' ? 'checked' : ''  }} name="med5" value="NO"/> </td>
                  <td>{{ $referral2->med5_det}}</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Have you recently lost weight without trying?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med6 == 'Yes' ? 'checked' : ''  }} name="med6" value="Yes"/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med6 == 'NO' ? 'checked' : ''  }} name="med6" value="NO"/> </td>
                  <td>{{ $referral2->med6_det}}</td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Do currently smoke tobacco?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med7 == 'Yes' ? 'checked' : ''  }} name="med7" value="Yes"/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med7 == 'NO' ? 'checked' : ''  }} name="med7" value="NO"/> </td>
                  <td>{{ $referral2->med7_det}}</td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Have you quit smoking tobacco in the last 5 years?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med8 == 'Yes' ? 'checked' : ''  }} name="med8" value="Yes"/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med8 == 'NO' ? 'checked' : ''  }} name="med8" value="NO"/> </td>
                  <td>{{ $referral2->med8_det}}</td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>Are you concerned about how much alcohol you drink?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med9 == 'Yes' ? 'checked' : ''  }} name="med9" value="Yes"/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med9 == 'NO' ? 'checked' : ''  }} name="med9" value="NO"/> </td>
                  <td>{{ $referral2->med9_det}}</td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>Are you concerned about your use of drugs?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med10 == 'Yes' ? 'checked' : ''  }} name="med10" value="Yes"/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med10 == 'NO' ? 'checked' : ''  }} name="med10" value="NO"/> </td>
                  <td>{{ $referral2->med10_det}}</td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>Are you concerned about your gambling?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med11 == 'Yes' ? 'checked' : ''  }} name="med11" value="Yes"/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med11 == 'NO' ? 'checked' : ''  }} name="med11" value="NO"/> </td>
                  <td>{{ $referral2->med11_det}}</td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>Is your financial situation very difficult?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med12 == 'Yes' ? 'checked' : ''  }} name="med12" value="Yes"/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med12 == 'NO' ? 'checked' : ''  }} name="med12" value="NO"/> </td>
                  <td>{{ $referral2->med12_det}}</td>
                </tr>
                <tr>
                  <td>13</td>
                  <td>Do you often feel sad or depressed?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med13 == 'Yes' ? 'checked' : ''  }} name="med13" value="Yes"/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med13 == 'NO' ? 'checked' : ''  }} name="med13" value="NO"/> </td>
                  <td>{{ $referral2->med13_det}}</td>
                </tr>
                <tr>
                  <td>14</td>
                  <td>Do you often feel nervous or anxious?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med14 == 'Yes' ? 'checked' : ''  }} name="med14" value="Yes"/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med14 == 'NO' ? 'checked' : ''  }} name="med14" value="NO"/> </td>
                  <td>{{ $referral2->med14_det}}</td>
                </tr>
                <tr>
                  <td>15</td>
                  <td>Have you felt afraid of someone who controls or hurts you?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med15 == 'Yes' ? 'checked' : ''  }} name="med15" value="Yes"/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med15 == 'NO' ? 'checked' : ''  }} name="med15" value="NO"/> </td>
                  <td>{{ $referral2->med15_det}}</td>
                </tr>
                <tr>
                  <td>16</td>
                  <td>Are you homeless or at risk of homelessness?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med16 == 'Yes' ? 'checked' : ''  }} name="med16" value="Yes"/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med16 == 'NO' ? 'checked' : ''  }} name="med16" value="NO"/> </td>
                  <td>{{ $referral2->med16_det}}</td>
                </tr>
                <tr>
                  <td>17</td>
                  <td>Would you rate your health as poor?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med17 == 'Yes' ? 'checked' : ''  }} name="med17" value="Yes"/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med17 == 'NO' ? 'checked' : ''  }} name="med17" value="NO"/> </td>
                  <td>{{ $referral2->med17_det}}</td>
                </tr>
                <tr>
                  <td>18</td>
                  <td>Would you rate your life circumstances as poor?</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med18 == 'Yes' ? 'checked' : ''  }} name="med18" value="Yes"/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->med18 == 'NO' ? 'checked' : ''  }} name="med18" value="NO"/> </td>
                  <td>{{ $referral2->med18_det}}</td>
                </tr>
                </table>
              </div>


                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
     

    

      <div class="form-row">
                  <div class="col-md-12 mb-3" >
                <table>
                  <tr>
                    <th>Personal Care</th>
                    <th>No Assistance</th>
                    <th>Prompting/Supervision</th>
                    <th>Active Assistance</th>
                  </tr>
                  <tr>
                  <td>Eating/d rinking/diet</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p1 == 'No Assistance' ? 'checked' : ''  }} name="p1" value="No Assistance" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p1 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p1" value="Prompting/Supervision" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p1 == 'Active Assistance' ? 'checked' : ''  }} name="p1" value="Active Assistance" readonly/> </td>
                </tr>
                <tr>
                  <td>Mobility</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p2 == 'No Assistance' ? 'checked' : ''  }} name="p2" value="No Assistance" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p2 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p2" value="Prompting/Supervision" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p2 == 'Active Assistance' ? 'checked' : ''  }} name="p2" value="Active Assistance" readonly/> </td>
                </tr>
                <tr>
                  <td>Showering/bathing</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p3 == 'No Assistance' ? 'checked' : ''  }} name="p3" value="No Assistance" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p3 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p3" value="Prompting/Supervision" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p3 == 'Active Assistance' ? 'checked' : ''  }} name="p3" value="Active Assistance" readonly/> </td>
                </tr>
                <tr>
                  <td>Shaving/grooming</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p4 == 'No Assistance' ? 'checked' : ''  }} name="p4" value="No Assistance" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p4 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p4" value="Prompting/Supervision" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p4 == 'Active Assistance' ? 'checked' : ''  }} name="p4" value="Active Assistance" readonly/> </td>
                </tr>
                <tr>
                  <td>Dressing</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p5 == 'No Assistance' ? 'checked' : ''  }} name="p5" value="No Assistance" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p5 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p5" value="Prompting/Supervision" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p5 == 'Active Assistance' ? 'checked' : ''  }} name="p5" value="Active Assistance" readonly/> </td>
                </tr>
                <tr>
                  <td>Dental hygiene</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p6 == 'No Assistance' ? 'checked' : ''  }} name="p6" value="No Assistance" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p6 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p6" value="Prompting/Supervision" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p6 == 'Active Assistance' ? 'checked' : ''  }} name="p6" value="Active Assistance" readonly/> </td>
                </tr>
                <tr>
                  <td>Toileting</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p7 == 'No Assistance' ? 'checked' : ''  }} name="p7" value="No Assistance" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p7 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p7" value="Prompting/Supervision" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p7 == 'Active Assistance' ? 'checked' : ''  }} name="p7" value="Active Assistance" readonly/> </td>
                </tr>
                <tr>
                  <td>Foot care/nail care</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p8 == 'No Assistance' ? 'checked' : ''  }} name="p8" value="No Assistance" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p8 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p8" value="Prompting/Supervision" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p8 == 'Active Assistance' ? 'checked' : ''  }} name="p8" value="Active Assistance" readonly/> </td>
                </tr>
                <tr>
                  <td>Laundry</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p9 == 'No Assistance' ? 'checked' : ''  }} name="p9" value="No Assistance" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p9 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p9" value="Prompting/Supervision" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p9 == 'Active Assistance' ? 'checked' : ''  }} name="p9" value="Active Assistance" readonly/> </td>
                </tr>
                <tr>
                  <td>Housekeeping</td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p10 == 'No Assistance' ? 'checked' : ''  }} name="p10" value="No Assistance" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p10 == 'Prompting/Supervision' ? 'checked' : ''  }} name="p10" value="Prompting/Supervision" readonly/> </td>
                  <td>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" disabled onchange="findselected5();" {{ $referral2->p10 == 'Active Assistance' ? 'checked' : ''  }} name="p10" value="Active Assistance" readonly/> </td>
                </tr>
                </table>
              </div>
            </div><br><br>
   <div class="abc">
    <p><i>Aids and Appliances</i></p>
    <label>Does client use any aids or appliances?</label><br>
        <label>Mobility</label>&nbsp;&nbsp;&nbsp;
                            <label><input type="checkbox" disabled onchange="findselected5();" {{ $referral2->a1 == 'Stick' ? 'checked' : ''  }} name="a1" value="Stick" readonly/>&nbsp;&nbsp;Stick</label>&nbsp;&nbsp;
                            <label><input type="checkbox" disabled onchange="findselected5();" {{ $referral2->a1 == 'Frame' ? 'checked' : ''  }} name="a1" value="Frame" readonly/>&nbsp;&nbsp;Frame</label>&nbsp;&nbsp;
                            <label><input type="checkbox" disabled onchange="findselected5();" {{ $referral2->a1 == 'Wheelchair' ? 'checked' : ''  }} name="a1" value="Wheelchair" readonly/>&nbsp;&nbsp;Wheelchair</label>&nbsp;&nbsp;
                            <label><input type="checkbox" disabled onchange="findselected5();" {{ $referral2->a1 == 'Other' ? 'checked' : ''  }} name="a1" value="Other" readonly/>&nbsp;&nbsp;Other</label>&nbsp;&nbsp;<br> 
                        <label>Communication</label>&nbsp;&nbsp;&nbsp;
                        <label><input type="checkbox" disabled onchange="findselected5();" {{ $referral2->a2 == 'Glasses' ? 'checked' : ''  }} name="a2" value="Glasses" readonly/>&nbsp;&nbsp;Glasses</label>&nbsp;&nbsp;
                            <label><input type="checkbox" disabled onchange="findselected5();" {{ $referral2->a2 == 'Hearing Aid' ? 'checked' : ''  }} name="a2" value="Hearing Aid" readonly/>&nbsp;&nbsp;Hearing Aid</label>&nbsp;&nbsp;
                            <label><input type="checkbox" disabled onchange="findselected5();" {{ $referral2->a2 == 'Interpreter' ? 'checked' : ''  }} name="a2" value="Interpreter" readonly/>&nbsp;&nbsp;Interpreter</label>
                            <label><input type="checkbox" disabled onchange="findselected5();" {{ $referral2->a2 == 'Other' ? 'checked' : ''  }} name="a2" value="Other" readonly/>&nbsp;&nbsp;Other</label><br>
                        <label>Other</label>&nbsp;&nbsp;&nbsp;
                        <label><input type="checkbox" disabled onchange="findselected5();" {{ $referral2->a3 == 'Dentures' ? 'checked' : ''  }} name="a3" value="Dentures" readonly/>&nbsp;&nbsp;Dentures</label>&nbsp;&nbsp;
                            <label><input type="checkbox" disabled onchange="findselected5();" {{ $referral2->a3 == 'Continence aids' ? 'checked' : ''  }} name="a3" value="Continence aids" readonly/>&nbsp;&nbsp;Continence aids</label>&nbsp;&nbsp;<br><br>     
    <textarea name="a_comments" class="border-class" style="width:900px">Comments&nbsp;&nbsp;{{ $referral->a_comments}}</textarea><br><br>                
   </div><br><br>
   <div class="abc">
    <p><i>Community Living Skills</i><br>
      <label>Is the client able to access public transport?</label>
                            <label><input type="checkbox" disabled onchange="findselected5();" {{ $referral2->public_trans == 'Yes' ? 'checked' : ''  }} name="public_trans" value="Yes" readonly/>&nbsp;&nbsp;Yes</label>&nbsp;&nbsp;
                            <label><input type="checkbox" disabled onchange="findselected5();" {{ $referral2->public_trans == 'No' ? 'checked' : ''  }} name="public_trans" value="No" readonly/>&nbsp;&nbsp;No</label>&nbsp;&nbsp;<br><br>
      <label>Is the client able to make and keep appointments?</label>
                            <label><input type="checkbox" disabled onchange="findselected5();" {{ $referral2->app_keep == 'Yes' ? 'checked' : ''  }} name="app_keep" value="Yes" readonly/>&nbsp;&nbsp;Yes</label>&nbsp;&nbsp;
                            <label><input type="checkbox" disabled onchange="findselected5();" {{ $referral2->app_keep == 'No' ? 'checked' : ''  }} name="app_keep" value="No" readonly/>&nbsp;&nbsp;No</label>&nbsp;&nbsp;
  </p>
  <label><i>Recreation/ Socialization</i><br>
  If the client attends any community based social activities, please provide details:</label><br><br>
  <textarea name="social_activity" class="border-class" style="width:900px" readonly>{{ $referral->social_activity}}</textarea><br><br>                
 </div>
 <div class="abc">
 <p>If the client has interests or hobbies, please provide details:</p>
 <textarea name="hobbies" class="border-class" style="width:900px" readonly>{{ $referral->hobbies}}</textarea><br><br> 
</div><br><br>
<div class="abc">
   <p><i>Relevant Health and Community Services:</i></p>
   <label>If the client has a case manager:</label><br>
    <input type="text" name="case_name" id="case_name" class="border-class" style="width:420px"  value="Name:&nbsp;&nbsp;&nbsp;{{$referral->case_name}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="case_org" id="case_org" class="border-class" style="width:420px"  value="Organisation: &nbsp;&nbsp;&nbsp;{{ $referral->case_org}}"  readonly><br><br>
    <input type="text" name="case_email" id="case_email" class="border-class"  style="width:560px" value="Email ID:&nbsp;&nbsp;&nbsp; {{ $referral->case_email}}"  readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="case_ph" id="case_ph" class="border-class"  style="width:290px" value=" Phone:&nbsp;&nbsp;&nbsp; {{$referral->case_ph}}" readonly><br><br>
    <input type="text" name="case_addr" id="case_addr" class="border-class" style="width:905px"  value="Address:&nbsp;&nbsp;&nbsp;{{ $referral->case_addr}}" readonly><br><br><br><br>

   <label>If the client currently accesses other services, please provide details:</label><br>
    <input type="text" name="serv_per" id="serv_per" class="border-class" style="width:420px"  value="Contact person:&nbsp;&nbsp;&nbsp;{{$referral->serv_per}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="serv_org" id="serv_org" class="border-class" style="width:420px"  value="Organisation: &nbsp;&nbsp;&nbsp;{{ $referral->serv_org}}" readonly><br><br>
    <input type="text" name="serv_adr" id="serv_adr" class="border-class" style="width:905px"  value="Address:&nbsp;&nbsp;&nbsp;{{ $referral->serv_adr}}" readonly><br><br>
    <input type="text" name="serv_email" id="serv_email" class="border-class"  style="width:560px" value="Email ID: &nbsp;&nbsp;&nbsp;{{ $referral->serv_email}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="serv_ph" id="serv_ph" class="border-class"  style="width:290px" value=" Phone:&nbsp;&nbsp;&nbsp; {{$referral->serv_ph}}" readonly><br><br><br><br>

    <label>If the client has been referred to additional services, please provide details:</label><br>
    <input type="text" name="addserv_per" id="addserv_per" class="border-class" style="width:420px"  value="Contact person:&nbsp;&nbsp;&nbsp;{{$referral->addserv_per}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="addserv_org" id="addserv_org" class="border-class" style="width:420px"  value="Organisation:&nbsp;&nbsp;&nbsp; {{ $referral->addserv_org}}" readonly><br><br>
    <input type="text" name="addserv_adr" id="addserv_adr" class="border-class" style="width:905px"  value="Address:&nbsp;&nbsp;&nbsp;{{ $referral->addserv_adr}}" readonly><br><br>
    <input type="text" name="addserv_email" id="addserv_email" class="border-class"  style="width:560px" value="Email ID:&nbsp;&nbsp;&nbsp; {{ $referral->addserv_email}}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="addserv_ph" id="addserv_ph" class="border-class"  style="width:290px" value=" Phone:&nbsp;&nbsp;&nbsp; {{$referral->addserv_ph}}" readonly><br><br>
    

  </div><br><br>
  <div class="abc">
    <label><i>Other relevant information/additional details</i></label><br>
    <p class="myDIV">{{ $referral2->other_relev}}</p>
    <br><br>
    <input type="text" name="rel_name" id="rel_name" class="border-class" style="width:270px"  value="Name:&nbsp;&nbsp;&nbsp;{{$referral->rel_name}}" readonly>
    <input type="text" name="rel_pos" id="rel_pos" class="border-class" style="width:270px"  value="Position&nbsp;&nbsp;&nbsp;{{$referral->rel_pos}}" readonly>
    <input type="text" name="rel_org" id="rel_org" class="border-class" style="width:270px"  value="Organisation&nbsp;&nbsp;&nbsp;{{$referral->rel_org}}" readonly><br><br>
    <p>Signature:.............................................................................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="rel_date" id="rel_date" class="border-class" style="width:340px"  value="Date:&nbsp;&nbsp;&nbsp;{{$referral->rel_date}}" readonly ></p>
  </div>



  

    
      
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
<script>
    $(function () {
       $('input[type="text"], textarea').attr('readonly','readonly');

    });
</script>

  </body>
</html>