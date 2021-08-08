@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop

@section('header_right')
    @can('create', \App\Models\Evngshift::class)
        <a href="{{ route('evngshifts.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')
 <style type="text/css">
  td{
    padding-left: 10px;
    text-align: left;
    padding-top: 5px;
    padding-bottom: 5px;
    padding-right: 5px;
  }

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
  </style>
  <div id="webui">
      <div class="row" style="padding-left: 100px;">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" style="width:1000px;" action="" autocomplete="off">
          <div class="box box-default">
            <div class="box-header with-border text-center">
                 <h3><b> Evening Shift -  Morning Shift</b></h3>
            </div>
  <div class="box-body" style="padding-left: 50px;padding-right: 40px;">    

            <h4>Evening Staff : {{ $evngshift->evng_staff }}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Morning Staff : <b>{{ $evngshift->mng_staff }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date : {{ date('d-m-Y', strtotime($evngshift->eveng_date))}}</b> </h4>
    <table style="border: 1px solid black;">
      <thead style="border: 1px solid black;">
        <tr>
          <th style="border: 1px solid black;">No</th>
          <th style="border: 1px solid black;">Room</th>
          <th style="border: 1px solid black;">Resident Name</th>
          <th style="border: 1px solid black;">Evening - Morning </th>


        </tr>
      </thead>
       <tbody>
          @for ($j=0; $j < $num; $j++)        
          <tr style="align-items: center;">
            <td style="border: 1px solid black; align-content: center;align-self: center;width: 30px;" >{{ ++$i }}</td>
            <td style="border: 1px solid black;" width="100px;">{{ $room[$j]}}</td>
            <td style="border: 1px solid black;" width="350px;">{{ $res_name[$j]}}</td>
            <td style="border: 1px solid black;">{{ $notes[$j]}}</td>  
            @endfor
        </tbody>
      </table>

        
    <br> 
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
