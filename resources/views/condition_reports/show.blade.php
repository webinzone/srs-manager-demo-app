@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop

@section('header_right')
    @can('create', \App\Models\ConditionReport::class)
        <a href="{{ route('condition_reports.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
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

  <div id="webui">
    <div class="row">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" action="" autocomplete="off"  style="width:1100px;padding: 20px;">
          <div class="box box-default">
            <div class="box-header with-border">
                <center>
                <h2 class="box-title"> <b>Assets Details</h2></b></h2>                    
                </center>
            </div>

            <div class="box-body" style="width:950px;padding-left: 70px;"><br>

            <table style="padding:10px;">
      <tr>
       
        <td> &nbsp;&nbsp;&nbsp;&nbsp;Resident Name: &nbsp;&nbsp;&nbsp;&nbsp; {{ $condition_report->res_name}}</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Room No: &nbsp;&nbsp;&nbsp;&nbsp; {{ $condition_report->room}}</td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Staff Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{ $condition_report->stf_name}}</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;{{date('d-m-Y', strtotime($condition_report->res_date)) }} </td>
      </tr>
    </table><br><br>

    <p> Legends:&nbsp;&nbsp;Facilty Owned: F &nbsp;&nbsp;&nbsp;&nbsp;Resident Owned: O &nbsp;&nbsp;&nbsp;&nbsp; Poor: P &nbsp;&nbsp;&nbsp;&nbsp;Good: G &nbsp;&nbsp;&nbsp;&nbsp;In need of Repair: R</p><br><br>
    <table style="border: 2px; border-width: 1px; border-color: black;">
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Item no</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Item / Furniture</td>
        <td style="">&nbsp;&nbsp;&nbsp;&nbsp;Owned By</td>
        <td style="width:20px;">&nbsp;&nbsp;&nbsp;&nbsp;Condition(P/G/R)</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Comments / Description</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Resident Sign</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Staff's Sign</td>

      </tr>
    @for ($i=0; $i < $num; $i++)
      <tr class="blank_row">
        <td > &nbsp;&nbsp;&nbsp;&nbsp;{{$item_no[$i] }}</td>
        <td> &nbsp;&nbsp;&nbsp;&nbsp;{{$items[$i] }}  </td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$owned_by[$i] }}</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$res_cond[$i] }}</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$res_comments[$i] }}</td>
        <td></td>   
        <td></td>     
      </tr>
    @endfor
     
    </table><br><br><br>
            </div>
          </div>
        </form>
      </div><br><br>
    </div>
  </div>

@stop

@section('moar_scripts')
@include ('partials.bootstrap-table')
@stop