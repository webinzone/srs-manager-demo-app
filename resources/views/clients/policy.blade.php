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

<div class="row justify-content-center">
    <iframe src="{{ asset('policy.pdf') }}" style="" width="100%" height="600">
          
    </iframe>
</div>


@stop

@section('moar_scripts')
@stop