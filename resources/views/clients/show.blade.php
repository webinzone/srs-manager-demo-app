@extends('layouts/default')

{{-- Page title --}}
@section('title')
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
              <div class="box-header with-border text-center">
                 <h3><b>Rsident Details</b></h3>
                   
                </div><!-- /.box-header -->
           

            <div class="box-body" style="padding-left:80px;">

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
                    <label class="col-sm-3 control-label">Date of Birth:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->dob}}</p>
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
                    <label class="col-sm-3 control-label">Gender:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->gender}}</p>
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
                    <label class="col-sm-3 control-label">Expiry date:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->pen_exp}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Respite:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->respite}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Weeks:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->weeks}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Account to be addressed:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->acc}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Phone:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->ph}}</p>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-3 control-label">Fax:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->res_fax}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->res_email}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Ref By:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->ref_by}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Previous Address:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->pre_address}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Entitlement No:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->ent_no}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nationality:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->nationality}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Admission Date:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->adm_date}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Room No:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $client_detail->room_no}}</p>
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
                <div class="form-group">
                    <label class="col-sm-3 control-label">Land Phone:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $next_of_kin->nok_lan}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Fax:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $next_of_kin->nok_fax}}</p>
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
                <div class="form-group">
                    <label class="col-sm-3 control-label">Land Phone:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $gpdetail->gp_lan}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Fax:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $gpdetail->gp_fax}}</p>
                    </div>
                </div>
                <h4 class="mb-3"><b>GuardianDetail</b></h4><br>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $guardian_detail->gr_name}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Relation:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $guardian_detail->gr_relation}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Land Phone:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $guardian_detail->gr_lan}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Mobile:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $guardian_detail->gr_mob}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $guardian_detail->gr_email}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Address:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $guardian_detail->gr_address}}</p>
                    </div>
                </div>
                <h4 class="mb-3"><b>HealthService</b></h4><br>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $health_service->hs_name}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Address:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $health_service->hs_address}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Land Phone:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $health_service->hs_lan}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">After Hours:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $health_service->aftr_hrs}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Fax:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $health_service->hs_fax}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $health_service->hs_email}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Medical History:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $health_service->med_history}}</p>
                    </div>
                </div>
                <h4 class="mb-3"><b>Pension Details</b></h4><br>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Type of Income:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $pension_detail->income_type}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Client Reference no:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $pension_detail->client_refno}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Taxi Concession details:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $pension_detail->con_card}}</p>
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