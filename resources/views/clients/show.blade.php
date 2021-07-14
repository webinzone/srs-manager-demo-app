@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop

@section('header_right')
    @can('create', \App\Models\Client::class)
        <a href="{{ route('clients.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')
<style type="text/css">
      table, td, th {
    border: 1px solid black;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    padding: 10px;
  }
</style>

  <div id="webui">
    <div class="row" style="padding-left: 80px;padding-right: 80px;">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" action="" autocomplete="off" style="width: 1000px; align-items: center;   background-color: #fff; padding-right: 100px;">
          <div class="box box-default">
              <div class="box-header with-border text-center">
                 <h3><b>Rsident Details</b></h3>
                   
                </div><!-- /.box-header -->
           

            <div class="box-body" style="padding-left:80px;">

                <!-- Asset name -->
               <h4 style="font-family:Bedrock">Personal Details:</h4>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Name</td>
        <td style="border: 1px solid black;">Date of Birth</td>
        <td style="border: 1px solid black;">Nationality</td>
        <td style="border: 1px solid black;">Religion</td>
        <td style="border: 1px solid black;">Languages Spoken</td>
        <td style="border: 1px solid black;">M/F</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $client_detail->fname}}&nbsp;{{ $client_detail->mname}}&nbsp;&nbsp; {{ $client_detail->lname}}</td>
        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($client_detail->dob)) }}</td>
        <td style="border: 1px solid black;">{{ $client_detail->nationality}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->religion}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->l_known}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->gender}}</td>        
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Ref By</td>
        <td style="border: 1px solid black;" colspan="3">{{ $client_detail->ref_by}}</td>
        <td style="border: 1px solid black;">Admission Date</td>
        <td style="border: 1px solid black;">Room No</td>
        <td style="border: 1px solid black;">Room rate</td>
        <td style="border: 1px solid black;">Room Type</td>

      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;" colspan="4">Previous Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; {{ $client_detail->pre_address}}</td>
        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($client_detail->adm_date)) }}</td>
        <td style="border: 1px solid black;">{{ $client_detail->room_no}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->room_rent}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->room_type}}</td>

        
      </tr>   
      
    </table><br>
      <table style="border: 1px solid black;">
         <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Medicare Number</td>
        <td style="border: 1px solid black;">Expiry</td>
        <td style="border: 1px solid black;">Pension Number</td>
        <td style="border: 1px solid black;">Expiry</td>
        <td style="border: 1px solid black;">Safety Net Entitlenment Number</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $client_detail->medicard_no}}</td>
        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($client_detail->exp_date)) }}</td>
        <td style="border: 1px solid black;">{{ $client_detail->pension_no}}</td>
        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($client_detail->pen_exp)) }}</td>
        <td style="border: 1px solid black;">{{ $client_detail->ent_no}}</td>        
      </tr>
    </table><br>
     <h4 style="font-family:Bedrock">Permanent / Respite:</h4>{{ $client_detail->respite}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="padding-bottom:30px;"></i>
    <table style="padding-top: 5px;">
      <tr>
        <td style="border: 1px solid black;">Weeks</td>
        <td style="border: 1px solid black;">Accont to be addressed</td>
        <td style="border: 1px solid black;">Phone</td>
        <td style="border: 1px solid black;">Email ID</td>
        <td style="border: 1px solid black;">Permanent / Respite</td>
        <td style="border: 1px solid black;">Duration / Admission Date</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $weeks}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->acc}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->ph}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->res_email}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->respite}}</td>
        <td style="border: 1px solid black;">{{ $duration}}</td>       
      </tr>
    </table><br>
    

    <h4 style="font-family:Bedrock">Pension Details:</h4>
    <table>
      <tr>
        <td style="border: 1px solid black;">Type of Income</td>
        <td style="border: 1px solid black;">Client Reference no</td>
        <td style="border: 1px solid black;">Taxi Concession Card details</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $pension_detail->income_type}}   <label id="oi"> {{ $client_detail->other_income}}</label></td>
        <td style="border: 1px solid black;">{{ $pension_detail->client_refno}}</td>
        <td style="border: 1px solid black;">{{ $pension_detail->con_card}}</td>      
      </tr>
    </table><br> 

    <h4 style="font-family:Bedrock">Next Of Kin / Representative:</h4>
    <table>
      <tr>
        <td style="border: 1px solid black;">Name</td>
        <td style="border: 1px solid black;">Email</td>
        <td style="border: 1px solid black;">Address</td>
        <td style="border: 1px solid black;">Lan Phone</td>
        <td style="border: 1px solid black;">Mobile</td>
        <td style="border: 1px solid black;">Fax</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $next_of_kin->name}}</td>
        <td style="border: 1px solid black;">{{ $next_of_kin->nok_email}}</td>
        <td style="border: 1px solid black;">{{ $next_of_kin->address}}</td>
        <td style="border: 1px solid black;">{{ $next_of_kin->ph}}</td>
        <td style="border: 1px solid black;">{{ $next_of_kin->nok_lan}}</td>
        <td style="border: 1px solid black;">{{ $next_of_kin->nok_fax}}</td>      
      </tr>
    </table><br>
    
    <h4 style="font-family:Bedrock">Guardian / Administrator:</h4>
    <table>
      <tr>
        <td style="border: 1px solid black;">Name</td>
        <td style="border: 1px solid black;">Relationship</td>
        <td style="border: 1px solid black;">Address</td>
        <td style="border: 1px solid black;">Email</td>
        <td style="border: 1px solid black;">Lan Phone</td>
        <td style="border: 1px solid black;">Mobile</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $guardian_detail->gr_name}}</td>
        <td style="border: 1px solid black;">{{ $guardian_detail->gr_relation}}</td>
        <td style="border: 1px solid black;">{{ $guardian_detail->gr_address}}</td>
        <td style="border: 1px solid black;">{{ $guardian_detail->gr_email}}</td>
        <td style="border: 1px solid black;">{{ $guardian_detail->gr_lan}}</td>
        <td style="border: 1px solid black;">{{ $guardian_detail->gr_mob}}</td>      
      </tr>
    </table><br>

    
    <h4 style="font-family:Bedrock">Medical Practitioner:</h4>
    <table>
      <tr>
        <td style="border: 1px solid black;">Name</td>
        <td style="border: 1px solid black;">Email</td>
        <td style="border: 1px solid black;">Address</td>
        <td style="border: 1px solid black;">Lan Phone</td>
        <td style="border: 1px solid black;">Mobile</td>
        <td style="border: 1px solid black;">Fax</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $gpdetail->gp_name}}</td>
        <td style="border: 1px solid black;">{{ $gpdetail->gp_email}}</td>
        <td style="border: 1px solid black;">{{ $gpdetail->address}}</td>
        <td style="border: 1px solid black;">{{ $gpdetail->gp_lan}}</td>
        <td style="border: 1px solid black;">{{ $gpdetail->ph}}</td>
        <td style="border: 1px solid black;">{{ $gpdetail->gp_fax}}</td>      
      </tr>
    </table><br>
    
    <h4 style="font-family:Bedrock">Other Health Services:</h4>
    <table>
      <tr>
        <td style="border: 1px solid black;">Name</td>
        <td style="border: 1px solid black;">Address</td>
        <td style="border: 1px solid black;">Lan Phone</td>
        <td style="border: 1px solid black;">(after hours)</td>
        <td style="border: 1px solid black;">Fax</td>
        <td style="border: 1px solid black;">Email</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $health_service->hs_name}}</td>
        <td style="border: 1px solid black;">{{ $health_service->hs_address}}</td>
        <td style="border: 1px solid black;">{{ $health_service->hs_lan}}</td>
        <td style="border: 1px solid black;">{{ $health_service->aftr_hrs}}</td>
        <td style="border: 1px solid black;">{{ $health_service->hs_fax}}</td>
        <td style="border: 1px solid black;">{{ $health_service->hs_email}}</td>      
      </tr>
    </table><br>
   <h4 style="font-family:Bedrock"><u>Additional Information : <i>Medical history/diagnosis </i>: </u></h4><p style="border: 1px solid black; padding: 5px;">{{ $health_service->med_history}}</p><br><br>
          
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