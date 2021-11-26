@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop

@section('header_right')
    @can('create', \App\Models\Roster::class)
        <a href="{{ route('rosters.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
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
                <h2 class="box-title"> <b>Roster</h2></b></h2>                    
                </center>
            </div>

            <div class="box-body" style="width:950px;padding-left: 70px;"><br>

            <table style="padding:10px;">
      <tr>
       
        <td> &nbsp;&nbsp;&nbsp;&nbsp;Period: &nbsp;&nbsp;&nbsp;&nbsp; {{ $roster->p_from}} - &nbsp;&nbsp;&nbsp;&nbsp; {{ $roster->p_to}}</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Manager: &nbsp;&nbsp;&nbsp;&nbsp; {{ $roster->mngr}}</td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Acting Manager:&nbsp;&nbsp;&nbsp;&nbsp; {{ $roster->a_mngr}}</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Complaints Officer:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; {{ $roster->c_oofr}} </td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Prop:&nbsp;&nbsp;&nbsp;&nbsp; {{ $roster->prop}}</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Facility Manager:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; {{ $roster->faci}} </td>
      </tr>
    </table><br><br>

    <table style="border: 2px; border-width: 1px; border-color: black;">
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Emp Name</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Role</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Sun</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Mon</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Tue</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Wed</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Thur</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Fri</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Sat</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Total Hour</td>

      </tr>
    @for ($i=0; $i < $num; $i++)
      <tr class="blank_row">
        <td > &nbsp;&nbsp;&nbsp;&nbsp;{{$e_pos[$i] }}</td>
        <td> &nbsp;&nbsp;&nbsp;&nbsp;{{$e_pos[$i] }}  </td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$sun[$i] }}</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$mon[$i] }}</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$tue[$i] }}</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$wed[$i] }}</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$thu[$i] }}</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$fri[$i] }}</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$sat[$i] }}</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$tot_hr[$i] }}</td>
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