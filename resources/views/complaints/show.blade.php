@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop

@section('header_right')
    @can('create', \App\Models\Complaint::class)
        <a href="{{ route('complaints.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
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
  }
  .container{
  width: 1000px;
  padding: 50px;
  margin: auto;
  border: 3px solid black;

  }
 
      td{
        width: 200px;
        padding: 3px;
      }
  </style>
  <div id="webui">
   <div class="row" style="padding-left: 100px;">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" style="width:1000px;" action="" autocomplete="off">
          <div class="box box-default">
            <div class="box-header with-border">
                <h2 class="box-header with-border text-center" style="padding-left: 100px;"> <b> Complaints </b></h2>
            </div>

            <div class="box-body" style="padding-left:50px;padding-right: 50px;">


               <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <td style="border: 1px solid black;">Staff Name</td>
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
        <td style="border: 1px solid black;">Person Nominated</td>
        <td style="border: 1px solid black;">{{ $complaint->p_nomini}}</td>
        <td style="border: 1px solid black;">Date & Time Notified</td>
        <td style="border: 1px solid black;">{{date('d-m-Y', strtotime($complaint->noti_date)) }}&nbsp;&nbsp;&nbsp;&nbsp;{{ $complaint->noti_time}}</td>        
      </tr>
      <tr>
        <td style="border: 1px solid black;">Complaint Details</td>
        <td style="border: 1px solid black;" colspan="5">{{ $complaint->com_details}}</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;height: 70px;">Suggestion for improvements</td>
        <td style="border: 1px solid black;height: 70px;" colspan="3">{{ $complaint->suggestions}}</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;"  colspan="5">To complete by Complaints Officer after investigating the complaint &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action Date:&nbsp;&nbsp;{{date('d-m-Y', strtotime($complaint->action_date)) }}</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;height: 70px;">Action Taken</td>
        <td style="border: 1px solid black;height: 70px;" colspan="3">{{ $complaint->action_taken}}</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;height: 70px;">Outcome/Method of Communication: Email, Ph, verbal, etc</td>
        <td style="border: 1px solid black;height: 70px;" colspan="3">{{ $complaint->outcome}}</td>     
      </tr>
      <tr>
        <td style="border: 1px solid black;" colspan="5">Note:</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;" colspan="5">Please note: Management will consider the issues rose in due course and action will commence within 2 working days to address areas of concern where appropriate. All complaints are confidential in nature.</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;height: 20px;" colspan="5"></td>
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
