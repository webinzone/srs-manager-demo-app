@extends('layouts/default')

{{-- Page title --}}
@section('title')
Incidents
@parent
@stop

@section('header_right')
    @can('create', \App\Models\Incident::class)
        <a href="{{ route('incidents.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')
<style type="text/css">
      table, td, th {
    border: 1px solid black;
  }
  td{
    width: 200px;
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
                 <h3><b>Incident Report</b></h3>
                   
                </div><!-- /.box-header -->
           

            <div class="box-body" style="padding-left:80px;">

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
        </form>
      </div>
    </div>
  </div>

@stop

@section('moar_scripts')
@include ('partials.bootstrap-table')
@stop
