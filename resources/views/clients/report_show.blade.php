@extends('layouts/default')

{{-- Page title --}}
@section('title')
Resident Details
@parent
@stop

@section('header_right')
    @can('create', \App\Models\Client::class)
        <a href="{{ route('clients.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')

  <div id="webui">
    <h2>Select Report</h2>
  </div>

@stop

@section('moar_scripts')
@include ('partials.bootstrap-table')
@stop