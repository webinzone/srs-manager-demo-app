@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop

@section('header_right')
    @can('create', \App\Models\ResidentAgreement::class)
        <a href="{{ route('referrals.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')
<style type="text/css">
tr{
  border: 1px solid black;
}

  td {
    width: 200px;
    padding: 5px;
     border: 1px solid black;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid black;
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
      th{
        border: 1px solid black;
      }
  </style>

  <div id="webui">
    <div class="row" style="padding-left: 80px;padding-right: 80px;">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" action="" autocomplete="off" style="width: 1000px; align-items: center;   background-color: #fff; padding-right: 100px;">
          <div class="box box-default">
            <div class="box-header with-border text-center">
                 <h3><b>Referral Report</b></h3>
                   
                </div><!-- /.box-header -->

            <div class="box-body" style="padding-left:80px;">

                <!-- Asset name -->
              

    <h3 style="font-family:Bedrock">PART A: for b client or client's representative (if applicable):</h3>
    <h5 style="font-size: 16px;"><b>CONSENT TO RELEASE OF INFORMATION</b></h5>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Name of person giving this consent</td>
        <td style="border: 1px solid black;">Name of person being referred</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $referral->con_name}}</td>
        <td style="border: 1px solid black;">{{ $referral->refer_name}}</td>
      </tr>
    </table><br>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Date</td>
      </tr>
      <tr style="border: 1px solid black;"> 
        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($referral->r_date)) }}</td>     
      </tr>
    </table><br>

    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Representative Name</td>
        <td style="border: 1px solid black;">Relationship</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $referral->rep_name}}</td>
        <td style="border: 1px solid black;">{{ $referral->relation}}</td>
      </tr>
    </table><br>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Email</td>
        <td style="border: 1px solid black;">Phone</td>
      </tr>
      <tr style="border: 1px solid black;"> 
        <td style="border: 1px solid black;">{{ $referral->email}}</td>
        <td style="border: 1px solid black;">{{ $referral->ph}}</td>     
      </tr>
    </table><br>
    <h3 style="font-family:Bedrock">PART B: for completion by referrer:</h3>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Reason for Referral to SRS</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $referral->reason}}</td>
      </tr>
    </table><br>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">I consider that referral of this client to the SRS is appropriate because</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $referral->appr_becoz}}</td>
      </tr>
    </table><br>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Date</td>
      </tr>
      <tr style="border: 1px solid black;"> 
        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($referral->ref_date)) }}</td>     
      </tr>
    </table><br>

    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Position</td>
        <td style="border: 1px solid black;">Agency</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $referral->ref_posi}}</td>
        <td style="border: 1px solid black;">{{ $referral->ref_agency}}</td> </tr>
    </table><br>
    </table><br>

    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Email ID</td>
        <td style="border: 1px solid black;">Phone</td>
      </tr>
      <tr style="border: 1px solid black;"> 
        <td style="border: 1px solid black;">{{ $referral->ref_email}}</td>
        <td style="border: 1px solid black;">{{ $referral->ref_ph}}</td>     
      </tr>
    </table><br>
    
    <h3 style="font-family:Bedrock">Client  Details:</h3>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">First Name</td>
        <td style="border: 1px solid black;">Surname</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $referral->cfname}}</td>
        <td style="border: 1px solid black;">{{ $referral->csurname}}</td>   
      </tr>
    </table><br>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Date of Birth</td>
        <td style="border: 1px solid black;">Gender</td>
        <td style="border: 1px solid black;">Religion</td>
      </tr>
      <tr style="border: 1px solid black;">

        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($referral->cdob)) }}</td>
        <td style="border: 1px solid black;">{{ $referral->cgender}}</td>  
        <td style="border: 1px solid black;">{{ $referral->creligion}}</td>
      </tr>
    </table><br>
    

    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Client Contact details: Mobile</td>
        <td style="border: 1px solid black;">Email ID</td>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $referral->cph}}</td> 
        <td style="border: 1px solid black;">{{ $referral->cemail}}</td>   
      </tr>
    </table><br>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Current Address</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $referral->caddress}}</td>
      </tr>
    </table>
    
    <h4><i>[If client is residing in another SRS]:</i></h4>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Name of SRS</td>
        <td style="border: 1px solid black;">Phone</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $referral->csrs_name}}</td>
        <td style="border: 1px solid black;">{{ $referral->csrs_ph}}</td>  
      </tr>
    </table><br>

    <h4><i>[if the client has private health insurance]:</i></h4>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Insurer</td>
        <td style="border: 1px solid black;">Ref. Number</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $referral->csrs_insu}}</td>
        <td style="border: 1px solid black;">{{ $referral->csrs_refno}}</td>  
      </tr>
    </table><br>

    <h3 style="font-family:Bedrock">Next of Kin Details:</h3>
    <table>
      <tr>
        <td style="border: 1px solid black;">Name</td>
        <td style="border: 1px solid black;">Relation</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->nok_name}}</td>
        <td style="border: 1px solid black;">{{ $referral->nok_relation}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Address</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->nok_address}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Email</td>
        <td style="border: 1px solid black;">Phone</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->nok_email}}</td>
        <td style="border: 1px solid black;">{{ $referral->nok_ph}}</td>
      </tr>
    </table><br>
    
    <h3 style="font-family:Bedrock">Medical Practitioner:</h3>
    <table>
      <tr>
        <td style="border: 1px solid black;">Name</td>
        <td style="border: 1px solid black;">Address</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->gp_name}}</td>
        <td style="border: 1px solid black;">{{ $referral->gp_address}}</td>      
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Phone</td>
        <td style="border: 1px solid black;">Fax</td>
        <td style="border: 1px solid black;">Email</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->gp_ph}}</td>
        <td style="border: 1px solid black;">{{ $referral->gp_fax}}</td>
        <td style="border: 1px solid black;">{{ $referral->gp_email}}</td>      
      </tr>
    </table><br>

    <h3 style="font-family:Bedrock">Guardian Details <i>[if the ctient has guardian]</i>:</h3>
    <table>
      <tr>
        <td style="border: 1px solid black;">Client Ref Number</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->gua_refno}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Name</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->gua_name}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Address</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->gua_addr}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Email</td>
        <td style="border: 1px solid black;">Phone</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->gua_email}}</td>
        <td style="border: 1px solid black;">{{ $referral->gua_ph}}</td>
      </tr>
    </table><br>

    <h3><i>[If the client has an administrator]:</i></h3>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Name</td>
        <td style="border: 1px solid black;">Client Ref Number</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $referral->ad_name}}</td>
        <td style="border: 1px solid black;">{{ $referral->ad_refno}}</td>  
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Address</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->ad_addr}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Email</td>
        <td style="border: 1px solid black;">Phone</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->ad_email}}</td>
        <td style="border: 1px solid black;">{{ $referral->ad_ph}}</td>
      </tr>
    </table><br>
    
    <h3 style="font-family:Bedrock">Pension Details:</h3>
    <table>
      <tr>
        <td style="border: 1px solid black;">Type of Income</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->pen_type}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Client Ref Number</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->pen_refno}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Medicare Number</td>
        <td style="border: 1px solid black;">Expiry Date</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->pen_medino}}</td>
        <td style="border: 1px solid black;">{{date('F-Y', strtotime($referral->pen_mediexp)) }}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Taxi Card Concession Number</td>
        <td style="border: 1px solid black;">Expiry Date</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->pen_taxi}}</td>
        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($referral->pen_taxiexp)) }}</td>
      </tr>
    </table><br>
    <table style="border: 2px; border-width: 1px; border-color: black; padding-left: 8px;left: 50px;">
      <tr style="padding:5px;"><h4><i>Medication.This information to be provided by client's health provider.</i></h4>
      </tr>
      <tr>
        <th>Drug name</th>
        <th>Dose</th>
        <th>Frequency</th>
        <th>Duration</th>
        <th>Last Taken</th>
      </tr>
        @for ($i=0; $i < $num; $i++)
                  <tr>
                  <td><input type="text" id="f7" value="{{ $drug[$i] }}"  name="medi_drugname[]"></td>
                  <td><input type="text" id="f7" value="{{ $dose[$i] }}" name="medi_dose[]"></td>
                  <td><input type="text" id="f7" value="{{ $freq[$i] }}" name="medi_freq[]"></td>
                  <td><input type="text" id="f7" value="{{ $duration[$i] }}" name="medi_duration[]"></td>
                  <td><input type="text" id="f7" value="{{ $last[$i] }}" name="medi_lasttaken[]"></td>
                </tr>
                @endfor
      
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Does client have the medication with her/him?</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->c_medi}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Is the client able to administer own medication?</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->c_ownmedi}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Please specify any anticipated side effects of medication</td>
      </tr>
      <tr>
         <td style="border: 1px solid black;">{{ $referral->c_medisideeffect}}</td>
       </tr>
     </table>
    <h3 style="font-family:Bedrock">Physical Status:</h3>
    <table>
      <tr>
        <td style="border: 1px solid black;">Please list any pre-existing medical conditions or allergies</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->ph_status}}</td>
      </tr>
    </table><br>
    <h3 style="font-family:Bedrock">Cognitive Status:</h3>
    <table>
      <tr>
        <td style="border: 1px solid black;">Please list any cognitive issues to which SRS staff need to be alerted, e.g. orientation to time and place; independence in decision making; memory impairment; other.</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->cogi_status}}</td>
      </tr>
    </table><br>
    <h3 style="font-family:Bedrock">Disability:</h3>
    <h4><i>[If the client is registered with Disability Services (DHS)]:</i></h4>
    <table>
      <tr>
        <td style="border: 1px solid black;">Primary Disability</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->dis_primary}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Case Manager</td>
        <td style="border: 1px solid black;">Organisation</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->dis_casemngr}}</td>
        <td style="border: 1px solid black;">{{ $referral->dis_org}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Email</td>
        <td style="border: 1px solid black;">Phone</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->dis_email}}</td>
        <td style="border: 1px solid black;">{{ $referral->dis_ph}}</td>
      </tr>
    </table><br>
    <h3 style="font-family:Bedrock">Mental Health Sfafus:</h3>
    <table>
      <tr>
        <td style="border: 1px solid black;">Please specify any mental health issues to which staff needs to be alerted</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->ment_status}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Case Manager</td>
        <td style="border: 1px solid black;">Organisation</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->ment_casemngr}}</td>
        <td style="border: 1px solid black;">{{ $referral->ment_org}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Email</td>
        <td style="border: 1px solid black;">Phone</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->ment_email}}</td>
        <td style="border: 1px solid black;">{{ $referral->ment_ph}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Behaviour List any behaviour Self-harm</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->behav_harm}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Details</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->behav_details}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">List any known "triggers" for problem behaviour</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral->triger}}</td>
      </tr>
    </table><br>

    <table style="border: 1px solid black; border-width: 1px; border-color: black; padding-left: 8px;left: 50px;">
                  <tr style="padding:5px; border: 1px solid black;">
                    <th width="50px;" style="border:1px solid black;">S.NO</th>
                    <th style="border:1px solid black;">If you answer "Yes" pl provide further information.</th>
                    <th style="border:1px solid black;">YES</th>
                    <th style="border:1px solid black;">NO</th>
                    <th style="border:1px solid black;">Details(If you answer "Yes" pl provide further information)</th>
                  </tr>
                  <tr>
                  <td>1</td>
                  <td>Have you been told by a doctor or other health professional that you have a health condition (eg breathing problems, a cancer, heart problems, chronic kidney disease, diabetes, high biood pressure, arthritis, osteoporosis or other condition)?</td>
                 <td><form action="">    
                 {!! $referral2->med1 == 'Yes' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
                 </form></td>
                 <td><form action="">    
                 {!! $referral2->med1 == 'NO' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
                 </form></td>
               <td>{{ $referral2->med1_det}}</td>
               </tr>
               <tr>
                  <td>2</td>
                  <td>Have you recently had problems with your teeth, mouth, gums or dentures?</td>
                 <td><form action="">    
                 {!! $referral2->med2 == 'Yes' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
                 </form></td>
                 <td><form action="">    
                 {!! $referral2->med2 == 'NO' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
                 </form></td>
               <td>{{ $referral2->med2_det}}</td>
               </tr>
               <tr>
                  <td>3</td>
                  <td>Are you concerned about your medications?</td>
                 <td><form action="">    
                 {!! $referral2->med3 == 'Yes' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
                 </form></td>
                 <td><form action="">    
                 {!! $referral2->med3 == 'NO' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
                 </form></td>
               <td>{{ $referral2->med3_det}}</td>
               </tr>
               <tr>
                  <td>4</td>
                  <td>Are you concerned about your lack of physical activity?</td>
                 <td><form action="">    
                 {!! $referral2->med4 == 'Yes' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
                 </form></td>
                 <td><form action="">    
                 {!! $referral2->med4 == 'NO' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
                 </form></td>
               <td>{{ $referral2->med4_det}}</td>
               </tr>
               <tr>
                  <td>5</td>
                  <td>Are you concerned about your weight?</td>
                 <td><form action="">    
                 {!! $referral2->med5 == 'Yes' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
                 </form></td>
                 <td><form action="">    
                 {!! $referral2->med5 == 'NO' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
                 </form></td>
               <td>{{ $referral2->med5_det}}</td>
               </tr>
               <tr>
                  <td>6</td>
                  <td>Have you recently lost weight without trying?</td>
                 <td><form action="">    
                 {!! $referral2->med6 == 'Yes' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
                 </form></td>
                 <td><form action="">    
                 {!! $referral2->med6 == 'NO' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
                 </form></td>
               <td>{{ $referral2->med6_det}}</td>
               </tr>
               <tr>
                  <td>7</td>
                  <td>Do currently smoke tobacco?</td>
                 <td><form action="">    
                 {!! $referral2->med7 == 'Yes' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
                 </form></td>
                 <td><form action="">    
                 {!! $referral2->med7 == 'NO' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
                 </form></td>
               <td>{{ $referral2->med7_det}}</td>
               </tr>
               <tr>
                  <td>8</td>
                  <td>Have you quit smoking tobacco in the last 5 years?</td>
                 <td><form action="">    
                 {!! $referral2->med8 == 'Yes' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
                 </form></td>
                 <td><form action="">    
                 {!! $referral2->med8 == 'NO' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
                 </form></td>
               <td>{{ $referral2->med8_det}}</td>
               </tr>
               <tr>
                  <td>9</td>
                  <td>Are you concerned about how much alcohol you drink?</td>
                 <td><form action="">    
                 {!! $referral2->med9 == 'Yes' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
                 </form></td>
                 <td><form action="">    
                 {!! $referral2->med9 == 'NO' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
                 </form></td>
               <td>{{ $referral2->med9_det}}</td>
               </tr>
               <tr>
                  <td>10</td>
                  <td>Are you concerned about your use of drugs?</td>
                 <td><form action="">    
                 {!! $referral2->med10 == 'Yes' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
                 </form></td>
                 <td><form action="">    
                 {!! $referral2->med10 == 'NO' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
                 </form></td>
               <td>{{ $referral2->med10_det}}</td>
               </tr>
               <tr>
                  <td>11</td>
                  <td>Are you concerned about your gambling?</td>
                 <td><form action="">    
                 {!! $referral2->med11 == 'Yes' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
                 </form></td>
                 <td><form action="">    
                 {!! $referral2->med11 == 'NO' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
                 </form></td>
               <td>{{ $referral2->med11_det}}</td>
               </tr>
               <tr>
                  <td>12</td>
                  <td>Is your financial situation very difficult?</td>
                 <td><form action="">    
                 {!! $referral2->med12 == 'Yes' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
                 </form></td>
                 <td><form action="">    
                 {!! $referral2->med12 == 'NO' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
                 </form></td>
               <td>{{ $referral2->med12_det}}</td>
               </tr>
               <tr>
                  <td>13</td>
                  <td>Do you often feel sad or depressed?</td>
                 <td><form action="">    
                 {!! $referral2->med13 == 'Yes' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
                 </form></td>
                 <td><form action="">    
                 {!! $referral2->med13 == 'NO' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
                 </form></td>
               <td>{{ $referral2->med13_det}}</td>
               </tr>
               <tr>
                  <td>14</td>
                  <td>Do you often feel nervous or anxious?</td>
                 <td><form action="">    
                 {!! $referral2->med14 == 'Yes' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
                 </form></td>
                 <td><form action="">    
                 {!! $referral2->med14 == 'NO' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
                 </form></td>
               <td>{{ $referral2->med14_det}}</td>
               </tr>
               <tr>
                  <td>15</td>
                  <td>Have you felt afraid of someone who controls or hurts you?</td>
                 <td><form action="">    
                 {!! $referral2->med15 == 'Yes' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
                 </form></td>
                 <td><form action="">    
                 {!! $referral2->med15 == 'NO' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
                 </form></td>
               <td>{{ $referral2->med15_det}}</td>
               </tr>
               <tr>
                  <td>16</td>
                  <td>Are you homeless or at risk of homelessness?</td>
                 <td><form action="">    
                 {!! $referral2->med16 == 'Yes' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
                 </form></td>
                 <td><form action="">    
                 {!! $referral2->med16 == 'NO' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
                 </form></td>
               <td>{{ $referral2->med16_det}}</td>
               </tr>
               <tr>
                  <td>17</td>
                  <td>Would you rate your health as poor?</td>
                 <td><form action="">    
                 {!! $referral2->med17 == 'Yes' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
                 </form></td>
                 <td><form action="">    
                 {!! $referral2->med17 == 'NO' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
                 </form></td>
               <td>{{ $referral2->med17_det}}</td>
               </tr>
               <tr>
                  <td>18</td>
                  <td>Would you rate your life circumstances as poor?</td>
                 <td><form action="">    
                 {!! $referral2->med18 == 'Yes' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
                 </form></td>
                 <td><form action="">    
                 {!! $referral2->med18 == 'NO' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
                 </form></td>
               <td>{{ $referral2->med18_det}}</td>
               </tr>
             </table><br>
             <br>

      <table style="border: 2px; border-width: 1px; border-color: black;">
      <tr>
        <th>Personal Care</th>
        <th>No Assistance</th>
        <th>Prompting/Supervision</th>
        <th>Active Assistance</th>
      </tr>
      <tr>
        <td>Eating/d rinking/diet</td>
        <td><form action="">    
         {!! $referral2->p1 == 'No Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
         <td><form action="">    
         {!! $referral2->p1 == 'Prompting/Supervision' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td><form action="">    
          {!! $referral2->p1 == 'Active Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
      </tr>
      <tr>
        <td>Mobility</td>
        <td><form action="">    
         {!! $referral2->p2 == 'No Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
         <td><form action="">    
         {!! $referral2->p2 == 'Prompting/Supervision' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td><form action="">    
          {!! $referral2->p2 == 'Active Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
      </tr>
      <tr>
        <td>Showering/bathing</td>
        <td><form action="">    
         {!! $referral2->p3 == 'No Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
         <td><form action="">    
         {!! $referral2->p3 == 'Prompting/Supervision' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td><form action="">    
          {!! $referral2->p3 == 'Active Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
      </tr>
      <tr>
        <td>Shaving/grooming</td>
        <td><form action="">    
         {!! $referral2->p4 == 'No Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
         <td><form action="">    
         {!! $referral2->p4 == 'Prompting/Supervision' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td><form action="">    
          {!! $referral2->p4 == 'Active Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
      </tr>
      <tr>
        <td>Dressing</td>
        <td><form action="">    
         {!! $referral2->p5 == 'No Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
         <td><form action="">    
         {!! $referral2->p5 == 'Prompting/Supervision' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td><form action="">    
          {!! $referral2->p5 == 'Active Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
      </tr>
      <tr>
        <td>Dental hygiene</td>
        <td><form action="">    
         {!! $referral2->p6 == 'No Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
         <td><form action="">    
         {!! $referral2->p6 == 'Prompting/Supervision' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td><form action="">    
          {!! $referral2->p6 == 'Active Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
      </tr>
      <tr>
        <td>Toileting</td>
        <td><form action="">    
         {!! $referral2->p7 == 'No Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
         <td><form action="">    
         {!! $referral2->p7 == 'Prompting/Supervision' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td><form action="">    
          {!! $referral2->p7 == 'Active Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
      </tr>
      <tr>
        <td>Foot care/nail care</td>
        <td><form action="">    
         {!! $referral2->p8 == 'No Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
         <td><form action="">    
         {!! $referral2->p8 == 'Prompting/Supervision' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td><form action="">    
          {!! $referral2->p8 == 'Active Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
      </tr>
      <tr>
        <td>Laundry</td>
        <td><form action="">    
         {!! $referral2->p9 == 'No Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
         <td><form action="">    
         {!! $referral2->p9 == 'Prompting/Supervision' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td><form action="">    
          {!! $referral2->p9 == 'Active Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
      </tr>
      <tr>
        <td>Housekeeping</td>
        <td><form action="">    
         {!! $referral2->p10 == 'No Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
         <td><form action="">    
         {!! $referral2->p10 == 'Prompting/Supervision' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td><form action="">    
          {!! $referral2->p10 == 'Active Assistance' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
      </tr>
    </table><br><br>
    <h3 style="font-family:Bedrock">Aids and Appliances:</h3>
    <h4>Does client use any aids or appliances?</h4>
    <table>
      <tr>
        <td style="border: 1px solid black;">Mobility</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral2->a1}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Communication</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral2->a2}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Other</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral2->a3}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Comments</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral2->a_comments}}</td>
      </tr>
    </table>
    <h3 style="font-family:Bedrock">Community Living Skills:</h3>
    <table>
      <tr>
        <td style="border: 1px solid black;">Is the client able to access public transport?</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral2->public_trans}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Is the client able to make and keep appointments?</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral2->app_keep}}</td>
      </tr>
    </table><br>
    <h3 style="font-family:Bedrock">Recreation/ Socialization:</h3>
    <table>
      <tr>
        <td style="border: 1px solid black;">If the client attends any community based social activities, please provide details</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral2->social_activity}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">If the client has interests or hobbies, please provide details</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral2->hobbies}}</td>
      </tr>
    </table><br>
    <h3 style="font-family:Bedrock">Relevant Health and Community Services:</h3>
    <h4>If the client has a case manager</h4>
    <table>
      <tr>
        <td style="border: 1px solid black;">Name</td>
        <td style="border: 1px solid black;">Organisation</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral2->case_name}}</td>
        <td style="border: 1px solid black;">{{ $referral2->case_org}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Email ID</td>
        <td style="border: 1px solid black;">Phone</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral2->case_email}}</td>
        <td style="border: 1px solid black;">{{ $referral2->case_ph}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Address</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral2->case_addr}}</td>
      </tr>
    </table>

    </table><br>
    <table>
      <tr>
    <h4>If the client currently accesses other services, please provide details</h4>
    <table>
      <tr>
        <td style="border: 1px solid black;">Contact person</td>
        <td style="border: 1px solid black;">Organisation</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral2->serv_per}}</td>
        <td style="border: 1px solid black;">{{ $referral2->serv_org}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Address</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral2->serv_adr}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Email ID</td>
        <td style="border: 1px solid black;">Phone</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral2->serv_email}}</td>
        <td style="border: 1px solid black;">{{ $referral2->serv_ph}}</td>
      </tr>
    </table><br>
    <h4>If the client has been referred to additional services, please provide details</h4>
    <table>
      <tr>
        <td style="border: 1px solid black;">Contact person</td>
        <td style="border: 1px solid black;">Organisation</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral2->addserv_per}}</td>
        <td style="border: 1px solid black;">{{ $referral2->addserv_org}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Address</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral2->addserv_adr}}</td>
      </tr>
    </table><br>
      <table>
        <tr>
        <td style="border: 1px solid black;">Email ID</td>
        <td style="border: 1px solid black;">Phone</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral2->addserv_email}}</td>
        <td style="border: 1px solid black;">{{ $referral2->addserv_ph}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Other relevant information/additional details</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral2->other_relev}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Name</td>
        <td style="border: 1px solid black;">Position</td>
        <td style="border: 1px solid black;">Organisation</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $referral2->rel_name}}</td>
        <td style="border: 1px solid black;">{{ $referral2->rel_pos}}</td>
        <td style="border: 1px solid black;">{{ $referral2->rel_org}}</td>
      </tr>
    </table><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Date</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($referral2->rel_date)) }}</td>
      </tr>
    </table><br>
    </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@stop

@section('moar_scripts')
@include ('partials.bootstrap-table')
@stop
