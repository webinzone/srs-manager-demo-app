@extends('layouts/default')

{{-- Page title --}}

@section('title')
   
@parent
@stop
@section('header_right')
    @can('create', \App\Models\Evngshift::class)
        <a href="/" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">

            	<img  src="{{url('')}}/img/chart.jpg" width="1000px"  height="800px" />

            </div>
        </div>
    </div>

@stop

@section('moar_scripts')
@stop
