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
    <div class="row">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" action="" autocomplete="off">
          <div class="box box-default">
            <div class="box-header with-border">
                <h2 class="box-title"> {{ $client_detail->fname}} </h2>
            </div>

            <div class="box-body">

                <!-- Asset name -->
                <h4 class="mb-3"><b>Personal Information</b></h4><br>
                <div class="form-group">
                    <label class="col-sm-3 control-label">First Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->fname}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Middle Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->mname}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Last Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->lname}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Address:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->address}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Date of Birth:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->dob}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Phone Number:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->ph}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Country of birth:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->cob}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Age:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->age}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Gender:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->gender}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Religion:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->religion}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Languages Known:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->l_known}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Phone number:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->ph}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Medicare card number:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->medicard_no}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Expiry date:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->exp_date}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Pension card number:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->pension_no}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Insurance card number if any:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->insurance_no}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Insurance company name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->insu_compny}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Reference Source:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->reference_source}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Funding source:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->funding_source}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Visitors Allowed ?:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $visitor->allowed_status}}</p>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-3 control-label">Allergey Status:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $allergy->allergy_status}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Allergey Details:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $allergy->tof_allergy}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Hobbies:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->hobies}}</p>
                    </div>
                </div>
                <h4 class="mb-3"><b>Next of kin</b></h4><br>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $next_of_kin->name}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Address:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $next_of_kin->address}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Phone Number:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $next_of_kin->ph}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $next_of_kin->nok_email}}</p>
                    </div>
                </div>
                <h4 class="mb-3"><b>GP Details</b></h4><br>
                <div class="form-group">
                    <label class="col-sm-3 control-label">General practitioner Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $gpdetail->gp_name}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Address:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $gpdetail->address}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Phone Number:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $gpdetail->ph}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $gpdetail->gp_email}}</p>
                    </div>
                </div>
          
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