@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop

@section('header_right')
    @can('create', \App\Models\Vaccate::class)
        <a href="{{ route('vaccates.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
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
  input.right {
        float: right;
        right: 30px;
      }
      td{
        width: 200px;
        padding: 3px;
      }
  </style>
  <div id="webui">
    <div class="row" style="padding-left: 90px;">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" style="width:1000px;" action="" autocomplete="off">
          <div class="box box-default">
             <div class="box-header with-border text-center">
                 <h3><b>Notice to Vacate </b></h3>
                   
                </div><!-- /.box-header -->
            <div class="box-body" style="padding-left:50px;padding-right: 50px;">

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
     <br><br>
     
                    
          
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
