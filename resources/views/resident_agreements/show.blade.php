@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop

@section('header_right')
    @can('create', \App\Models\ResidentAgreement::class)
        <a href="{{ route('resident_agreements.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
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
                 <h3><b>Resident Agreements</b></h3>
                   
                </div><!-- /.box-header -->

            <div class="box-body" style="padding-left:80px;">

                <!-- Asset name --
                <div class="form-group">
                    <div class="col-md-6">
                        <img  class="img-responsive pad" src="{{url('')}}/images/profile_pics/{{ $resident_agreement->profile_pic}}" style="width: 200px;height: 200px;">

                    </div>
                </div>-->
                <h4>Resident Details</h4>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Resident Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->r_name}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Room No:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->room_no}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Need assistance  in reading ?:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->asistance_status}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Staff:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->staff}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Guardian:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->guardian}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Telephone:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->g_tel}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Address:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->g_adress}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->g_email}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Person Nominated:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->p_nomini}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Telephone:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->per_tel}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Address:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->per_address}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->per_email}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Emergency Contact:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->emg_contact}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Telephone:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->emg_tel}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Address:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->emg_address}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->emg_email}}</p>
                    </div>
                </div>
                <h4>Duration Of Stay</h4>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Indefinite period of stay form:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->i_period}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Fixed period stay form:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->f_period}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Ending on:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->ending_on}}</p>
                    </div>
                </div>
                <h4>Fee & Charges</h4>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Fee for accommodation and personal support:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->acc_fee}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Frequency of payment:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->freq_pay}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Any rent paid in advance:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->any_rent_adv}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">How to pay:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->pay_method}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Amount:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->amt_fee}}</p>
                    </div>
                </div> 
                <h4>Other Fee & charges</h4>  
                <div class="form-group">
                    <label class="col-sm-3 control-label">Security deposite charged:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->secu_depo}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Amount Payable:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->amt_pay}}</p>
                    </div>
                </div>
                <h4>Other Fee & charges</h4>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Condition report provided to the resident?:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->condition_rep}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Furniture in resident's room belonging to thr SRS:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->pers_prop}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Reservation fee charged:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->reserv_fee}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount : $ {{ $resident_agreement->amt_res}}</p></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Establishment fee charged:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->est_fee}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount : $ {{ $resident_agreement->amt_est}}</p></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Establishment fee charged:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->est_fee}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Fee in advance charged for other items/service provide by SRS:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->advnc_fee}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount : $ {{ $resident_agreement->amt_adv}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Refund to resident:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->refund}}</p>
                    </div>
                </div>
                <h4>Management Of Resident Money</h4>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Will the SRS assist the resident in managing their finances:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->srs_assist_status}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Ammount to be managed:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $resident_agreement->assist_amnt}}</p>
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
