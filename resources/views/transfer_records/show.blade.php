@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop

@section('header_right')
    @can('create', \App\Models\TransferRecord::class)
        <a href="{{ route('transfer_records.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')
<style type="text/css">
      table, td, th {
    border: 1px solid black;
    padding: 10px;
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
                 <h3><b>Transfer Record</b></h3>
                   
                </div><!-- /.box-header -->
           

            <div class="box-body" style="padding-left:80px;">
          
                <h3 style="font-family:Bedrock">Resident Details:</h3>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Resident Name</td>
        <td style="border: 1px solid black;">Date of Birth</td>
        <td style="border: 1px solid black;">Gender</td>
        <td style="border: 1px solid black;">Nationality</td>
        <td style="border: 1px solid black;">Languages Known</td>
        <td style="border: 1px solid black;">Religion</td>
        <td style="border: 1px solid black;">Medicare No</td>
        <td style="border: 1px solid black;">Pension No</td>
      </tr>
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $transfer_record->user_name}}</td>
        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($transfer_record->dob)) }}</td>
        <td style="border: 1px solid black;">{{ $transfer_record->gender}}</td>
        <td style="border: 1px solid black;">{{ $transfer_record->nation}}</td>
        <td style="border: 1px solid black;">{{ $transfer_record->lan}}</td>
        <td style="border: 1px solid black;">{{ $transfer_record->religion}}</td>
        <td style="border: 1px solid black;">{{ $transfer_record->medi_no}}</td> 
        <td style="border: 1px solid black;">{{ $transfer_record->pension_no}}</td>        
      </tr>
    </table><br>
    <h3 style="font-family:Bedrock">Transfer Details:</h3>

     <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;" width="200px">From</td>
        <td style="border: 1px solid black;" width="200px">To</td>
        <td style="border: 1px solid black;" width="200px">Reason</td>
        <td style="border: 1px solid black;" width="200px">Notification</td>
        <td style="border: 1px solid black;" width="100px">Date</td>
       
      </tr>
      <tr style="border: 1px solid black;">
       
        <td style="border: 1px solid black;">{{ $transfer_record->from}}</td>
        <td style="border: 1px solid black;">{{ $transfer_record->to}}</td>

        <td style="border: 1px solid black;">{{ $transfer_record->reason}}</td> 
        <td style="border: 1px solid black;">{{ $transfer_record->notif}}</td>

        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($transfer_record->date)) }}</td>       
      </tr>
    </table><br>

    <h3 style="font-family:Bedrock">Next Of Kin / Relative:</h3>
    <table>
      <tr>
        <td style="border: 1px solid black;" width="550px;">Contact</td>
        <td style="border: 1px solid black;">Has been advised of the transfer?</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $transfer_record->nok_contact}}</td>
        <td style="border: 1px solid black;">{{ $transfer_record->advised}}</td>
      </tr>
    </table><br>
    
    <h3 style="font-family:Bedrock">Resident's Guardian:</h3>
    <table>
      <tr>
        <td style="border: 1px solid black;" width="550px;">Contact</td>
        <td style="border: 1px solid black;">Has been advised of the transfer?</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $transfer_record->gua_contact}}</td>
        <td style="border: 1px solid black;">{{ $transfer_record->guardian_adv}}</td>      
      </tr>
    </table><br>

    
    <h3 style="font-family:Bedrock">Person Nominated by Resident:</h3>
    <table>
      <tr>
        <td style="border: 1px solid black;" width="550px;">Contact</td>
        <td style="border: 1px solid black;">Has been advised of the transfer?</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $transfer_record->nomini_contact}}</td>
        <td style="border: 1px solid black;">{{ $transfer_record->nomini_adv}}</td>
      </tr>
    </table><br>

    <h3 style="font-family:Bedrock">Resident's Administrator:</h3>
    <table>
      <tr>
        <td style="border: 1px solid black;" width="550px;">Contact</td>
        <td style="border: 1px solid black;">Has been advised of the transfer?</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $transfer_record->resadmin_contact}}</td>
        <td style="border: 1px solid black;">{{ $transfer_record->admin_adv}}</td>
      </tr>
    </table><br>
    
    <h3 style="font-family:Bedrock">Resident's Medical Practitioner/Health Details:</h3>
    <table>
      <tr>
        <td style="border: 1px solid black;">Doctor Name</td>
        <td style="border: 1px solid black;">Phone Number</td>
        <td style="border: 1px solid black;">Fax</td>
        <td style="border: 1px solid black;">Other</td>
        <td style="border: 1px solid black;">Detail of Known Allergies</td>
        <td style="border: 1px solid black;">Pre Existing Medical Condition</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $transfer_record->doc_name}}</td>
        <td style="border: 1px solid black;">{{ $transfer_record->doc_ph}}</td>
        <td style="border: 1px solid black;">{{ $transfer_record->doc_fax}}</td>
        <td style="border: 1px solid black;">{{ $transfer_record->doc_other}}</td>
        <td style="border: 1px solid black;">{{ $transfer_record->allergy}}</td>
        <td style="border: 1px solid black;">{{ $transfer_record->exis_medi}}</td>      
      </tr>
    </table><br>
    <h3 style="font-family:Bedrock">Details of Current Resident's Medication:</h3>
    <table>
      <tr>
        <td style="border: 1px solid black;" width="500px;">Current Medication Details</td>
        <td style="border: 1px solid black;">Has all of the above medication been sent with Resident?</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">{{ $transfer_record->medi_chart}}</td>
        <td style="border: 1px solid black;">{{ $transfer_record->medi_sent}}</td>
      </tr>
    </table><br>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Summary of Current Support Requirements</td>
      </tr>
       <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $transfer_record->sum_req}}</td>
      </tr>
    </table><br>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">List of Reports Sent With Resident</td>
      </tr>
       <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $transfer_record->medi_chart}}</td>
      </tr>
    </table><br>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Other Relevant Details </td>
      </tr>
       <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">{{ $transfer_record->other_relevent}}</td>
      </tr>
    </table><br> 
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;" width="200px;">Staff in Charge </td>
        <td style="border: 1px solid black; padding-left: 10px">{{ $transfer_record->staff_incharge}}</td>
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
