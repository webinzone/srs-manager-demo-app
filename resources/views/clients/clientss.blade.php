@extends('layouts/default')

{{-- Page title --}}
@section('title')
Add Clients
@parent
@stop
@section('header_right')
    @can('create', \App\Models\Client::class)
        <a href="{{ route('clients.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop
{{-- Page content --}}
@section('content')
<h3>dddddddddddddd</h3>
@stop

@section('moar_scripts')
@include ('partials.bootstrap-table', ['search' => true, 'showFooter' => true, 'columns' => \App\Presenters\ClientDetailPresenter::dataTableLayout()])
@stop