@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop

@section('header_right')
    @can('create', \App\Models\RoomItem::class)
        <a href="{{ route('room_items.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
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
                <h2 class="box-title"> <b>Room Item</h2></b></h2>                    
                </center>
            </div>

            <div class="box-body" style="width:950px;padding-left: 70px;"><br>

            <table style="padding:10px;">
      <tr>
       
        <td> &nbsp;&nbsp;&nbsp;&nbsp;Item code:</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Item Name:</td>
      </tr>
      <tr>
        <td> {{ $room_item->icode}}</td>
        <td> {{ $room_item->iname}} </td>
      </tr>
    </table><br><br>

   
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