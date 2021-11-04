@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop

@section('header_right')
    @can('create', \App\Models\GpDetail::class)
        <a href="{{ route('gp_details.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
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
    <div class="row" style="padding-left: 80px;padding-right: 80px;">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" action="" autocomplete="off"  style="width:1100px;padding: 20px;">
          <div class="box box-default">
            <div class="box-header with-border">
                <center>
                <h2 class="box-title"> <b>GP Details</h2></b></h2>                    
                </center>
            </div>

            <div class="box-body" style="width:950px;padding-left: 70px;"><br>

            <table style="padding:10px;">
         <tr>
       
        <td> &nbsp;&nbsp;&nbsp;&nbsp;Resident Name: &nbsp;&nbsp;&nbsp;&nbsp; {{ $gp_detail->res_name}}</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Room No: &nbsp;&nbsp;&nbsp;&nbsp; {{ $gp_detail->room}}</td>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;Bed No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{ $gp_detail->bed}}</td>
      </tr>

      <tr>
           <td>&nbsp;&nbsp;&nbsp;&nbsp;Address: &nbsp;&nbsp;&nbsp;&nbsp; {{ $gp_detail->address}}</td>

      
        <td>&nbsp;&nbsp;&nbsp;&nbsp;DOB:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;{{date('d-m-Y', strtotime($gp_detail->dob)) }} </td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;{{date('d-m-Y', strtotime($gp_detail->created_at)) }} </td>
      </tr>
    </table><br><br>

    <table style="border: 2px; border-width: 1px; border-color: black;">
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;No</td>

        <td>&nbsp;&nbsp;&nbsp;&nbsp;Category</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Name</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Address</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Phone No</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Email</td>

      </tr>
    @for ($i=0; $i < $num; $i++)
      <tr class="blank_row">
        <td > &nbsp;&nbsp;&nbsp;&nbsp;{{$item_no[$i] }}</td>

        <td > &nbsp;&nbsp;&nbsp;&nbsp;{{$category[$i] }}</td>
        <td> &nbsp;&nbsp;&nbsp;&nbsp;{{$name[$i] }}  </td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$address[$i] }}</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$ph[$i] }}</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$email[$i] }}</td>
           
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