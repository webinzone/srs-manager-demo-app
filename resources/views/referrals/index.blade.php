@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop

@section('header_right')
    @can('create', \App\Models\Referral::class)
        <a href="{{ route('referrals.create') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Create New</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-12">

    <div class="box box-default">
        <div class="box-header with-border text-center">
                 <h3><b>Referral Form</b></h3>
                   
                </div><!-- /.box-header -->

      <div class="box-body">
        <div class="table-responsive">

            <table
                data-columns="{{ \App\Presenters\ReferralPresenter::dataTableLayout() }}"
                data-cookie-id-table="referralsTable"
                data-toolbar="#toolbar"
                data-pagination="true"
                data-id-table="referralsTable"
                data-search="true"
                data-side-pagination="server"
                data-show-columns="true"
                data-show-export="true"
                data-show-refresh="true"
                data-show-footer="true"
                data-sort-order="asc"
                id="referralsTable"
                class="table table-striped snipe-table"
                data-url="{{ route('api.referrals.index') }}"
                data-export-options='{
                "fileName": "Referrals",
                "ignoreColumn": ["actions"]
                }'                
               >
            
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@stop

@section('moar_scripts')
@include ('partials.bootstrap-table', ['search' => true, 'showFooter' => true, 'columns' => \App\Presenters\ReferralPresenter::dataTableLayout()])
@stop
