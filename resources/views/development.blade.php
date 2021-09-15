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
                <div class="row">
                    <div class="col-md-12">
                     <h2><center><b>Under Development ...</b></center></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('moar_scripts')
@stop