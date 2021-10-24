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
                 <h3><b>Resident Details</b></h3>
                   
                </div><!-- /.box-header -->
           

            <div class="box-body" style="padding-left:80px;">

                <!-- Asset name -->
      <p style="font-size: 15px;"><b>Personal Details:</b>Type of stay :<input {{ $client_detail->respite == 'Respite' ? 'checked' : ''  }}  type="checkbox" disabled name="respite" value="Respite"> Respite</label>&nbsp;&nbsp;
                                <label><input {{ $client_detail->respite == 'Permanent' ? 'checked' : ''  }}  type="checkbox" disabled name="respite" value="Permanent"> Permanent</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No of week/s:{{ $weeks}}</p>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Name</td>
        <td style="border: 1px solid black;">Date of Birth</td>
        <td style="border: 1px solid black;">Nationality</td>
        <td style="border: 1px solid black;">Religion</td>
        <td style="border: 1px solid black;">Languages Spoken</td>
        <td style="border: 1px solid black;">M/F</td>
        <td style="border: 1px solid black;">Medicare Number</td>
        <td style="border: 1px solid black;">Taxi Concession Card</td>
        <td style="border: 1px solid black;">Other</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $client_detail->fname }} {{ $client_detail->mname }} {{ $client_detail->lname }}</td>
        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($client_detail->dob)) }}</td>
        <td style="border: 1px solid black;">{{ $client_detail->nationality}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->religion}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->l_known}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->gender}}</td> 
        <td style="border: 1px solid black;">{{ $client_detail->medicard_no}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->nok_taxi}}</td>  
        <td style="border: 1px solid black;">{{ $client_detail->nok_other}}</td>      
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Ref By</td>
        <td style="border: 1px solid black;" colspan="3">{{ $client_detail->ref_by}}</td>
        <td style="border: 1px solid black;">Admission Date</td>
        <td style="border: 1px solid black;">Room No</td>
        <td style="border: 1px solid black;">Expiry</td>
        <td style="border: 1px solid black;">Expiry</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;" colspan="4">Previous Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; {{ $client_detail->pre_address}}</td>
        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($client_detail->adm_date)) }}</td>
        <td style="border: 1px solid black;">{{ $client_detail->room_no}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->exp_date}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->nok_exp}}</td>

      </tr>   
      
    </table><br>
      <table style="border: 1px solid black;">
         <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;" colspan="2">Additional Info : Medical history/diagnosis:{{ $health_service->med_history}}</td>
      </tr>
    </table><br>
     
    

    <h3 style="font-family:Bedrock">Pension Details:</h3>
    <p><label for="income_type">Type of income : </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <label> <input {{ $pension_detail->income_type == 'Direct Debit' ? 'checked' : ''  }}  type="checkbox" disabled name="income_type" value="Direct Debit"> Direct Debit</label>&nbsp;&nbsp;
                                <label><input {{ $pension_detail->income_type == 'Cash' ? 'checked' : ''  }}  type="checkbox" disabled name="income_type" value="Cash"> Cash</label>&nbsp;&nbsp;
                                <label><input {{ $pension_detail->income_type == 'Centre Link' ? 'checked' : ''  }} type="checkbox" disabled name="income_type" value="Centre Link"> Centre Link</label>&nbsp;&nbsp;
                                <label><input {{ $pension_detail->income_type == 'Veterans Affairs' ? 'checked' : ''  }} type="checkbox" disabled name="income_type" value="Veterans Affairs"> Veterans Affairs</label>&nbsp;&nbsp;
                                <label><input {{ $pension_detail->income_type == 'State Trustees' ? 'checked' : ''  }} type="checkbox" disabled name="income_type" value="State Trustees"> State Trustees</label>&nbsp;&nbsp;
                                <label><input {{ $pension_detail->income_type == 'Other' ? 'checked' : ''  }} type="checkbox" disabled name="income_type" value="Other"> Other</label>&nbsp;&nbsp;</p>
     <p>Client Reference No (CRN) <span class="dottedUnderline">{{ $pension_detail->client_refno}}</p><br>
    <table>
      <tr>
        <td style="border: 1px solid black;">Contact details</td>
        <td style="border: 1px solid black;">NOK/Representative</td>
        <td style="border: 1px solid black;">Guardian/Administrator</td>
        <td style="border: 1px solid black;">Medical Practitioner</td>
        <td style="border: 1px solid black;">Other Health Services</td>
        <td style="border: 1px solid black;">Finance Administrator/State Trustees</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">Name</td>
        <td style="border: 1px solid black;">{{ $next_of_kin->name}}</td>
        <td style="border: 1px solid black;">{{ $guardian_detail->gr_name}}</td>
        <td style="border: 1px solid black;">{{ $gpdetail->gp_name}}</td>
        <td style="border: 1px solid black;">{{ $health_service->hs_name}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->inc_sname}}</td>     
      </tr>
       <tr>
        <td style="border: 1px solid black;">Email</td>
        <td style="border: 1px solid black;">{{ $next_of_kin->nok_email}}</td>
        <td style="border: 1px solid black;">{{ $guardian_detail->gr_email}}</td>
        <td style="border: 1px solid black;">{{ $gpdetail->gp_email}}</td>
        <td style="border: 1px solid black;">{{ $health_service->hs_email}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->inc_email}}</td>     
      </tr>
      <tr>
        <td style="border: 1px solid black;">Phone (inc: A/H)</td>
        <td style="border: 1px solid black;">{{ $next_of_kin->nok_ph}}</td>
        <td style="border: 1px solid black;">{{ $guardian_detail->gr_mob}}</td>
        <td style="border: 1px solid black;">{{ $gpdetail->ph}}</td>
        <td style="border: 1px solid black;">{{ $health_service->hs_lan}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->inc_phone}}</td>     
      </tr>
      <tr>
        <td style="border: 1px solid black;">Address</td>
        <td style="border: 1px solid black;">{{ $next_of_kin->nok_address}}</td>
        <td style="border: 1px solid black;">{{ $guardian_detail->gr_address}}</td>
        <td style="border: 1px solid black;">{{ $gpdetail->address}}</td>
        <td style="border: 1px solid black;">{{ $health_service->hs_address}}</td>
        <td style="border: 1px solid black;">{{ $client_detail->nok_adr}}</td>     
      </tr>
      <tr>
        <td style="border: 1px solid black;"></td>
        <td style="border: 1px solid black;"></td>
        <td style="border: 1px solid black;"></td>
        <td style="border: 1px solid black;"></td>
        <td style="border: 1px solid black;"></td>
        <td style="border: 1px solid black;"></td>     
      </tr>
    </table><br>

    </table><br>
      <table style="border: 1px solid black;">
         <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Has this form is uploaded and notified to Accounts:
         <br><input type="radio"   {{ $client_detail->nok_up == 'No' ? 'checked' : ''  }} id="nok_up"  value="No" name="nok_up" disabled/>&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                        <input type="radio"   {{ $client_detail->nok_up == 'Yes' ? 'checked' : ''  }}  id="nok_up" value="Yes" name="nok_up" disabled/>&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp; <br>
        Has this Admission been notified to Pharmacy:
         <br><input type="radio"   {{ $client_detail->nok_noti == 'No' ? 'checked' : ''  }} id="nok_noti"  value="No" name="nok_noti" disabled/>&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                        <input type="radio"   {{ $client_detail->nok_noti == 'Yes' ? 'checked' : ''  }}  id="nok_noti" value="Yes" name="nok_noti" disabled/>&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp; <br>
        

      </td>
        <td style="border: 1px solid black;"><i>Email to Accounts: <a href="url">accounts@gracemanor.com.au </a>[Include: Rent/wk, payment details, etc]<br>
        <table>
         <tr style="border: 1px solid black;"> <td style="border: 1px solid black;">Staff Name:{{ $client_detail->nok_st}}</td>
          <td style="border: 1px solid black;">Staff Sign:&nbsp;&nbsp;&nbsp;</td>
          <td style="border: 1px solid black;">Date:{{ $client_detail->nok_dt}}</td>
        </tr></td>
        </tr>
      </table>
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