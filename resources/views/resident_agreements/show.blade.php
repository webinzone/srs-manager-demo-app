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
<style type="text/css">
      table, td, th {
    border: 1px solid black;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    padding: 10px;
  }
</style>
  <div id="webui">
    <div class="row">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" action="" autocomplete="off" style="width: 1000px; align-items: center;   background-color: #fff; padding-right: 100px;">
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
                   <table>
      <tr>
        <td rowspan="2" style="width: 185px;align-items: center;">&nbsp;&nbsp;&nbsp;&nbsp;<b>RESIDENT DETAILS</b></td>
        <td >Name</td>
        <td>{{ $resident_agreement->r_name}}</td>
        <td>Room No:  </td>
        <td>{{ $resident_agreement->room_no}}</td>
      </tr>
      <tr>
        <td width="290px;">Guide to resident and prospective resident:  {{ $resident_agreement->res_gp}}</td>
        <td width="200px;" >Need assistance  in reading ?</td>
        <td width="100px;">{{ $resident_agreement->asistance_status}}</td>
        <td>Staff: {{ $resident_agreement->staff}}</td>
      </tr>
    </table>&nbsp;&nbsp;
    <table>
      <tr>
        <td>Relation</td>
        <td>Name</td>
        <td>Address</td>
        <td>Phone</td>
        <td>Email</td>

      </tr>
      <tr>
        <td>Guardian</td>
        <td>{{ $resident_agreement->guardian}}</td>
        <td> {{ $resident_agreement->g_adress}}</td>
        <td>  {{ $resident_agreement->g_tel}}</td>
        <td> {{ $resident_agreement->g_email}}</td>
      </tr>
      <tr>
        <td>Person Nominated</td>
        <td>{{ $resident_agreement->p_nomini}}</td>
        <td> {{ $resident_agreement->per_address}}</td>
        <td>  {{ $resident_agreement->per_tel}}</td>
        <td> {{ $resident_agreement->per_email}}</td>
      </tr>
       <tr>
        <td>Emergency Contact</td>
        <td>{{ $resident_agreement->emg_contact}}</td>
        <td> {{ $resident_agreement->emg_address}}</td>
        <td>  {{ $resident_agreement->emg_tel}}</td>
        <td> {{ $resident_agreement->emg_email}}</td>
      </tr>
    </table>&nbsp;&nbsp;
    <table>
      <tr>
        <td colspan="5" ><center><b>DURATION OF STAY</b>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $resident_agreement->admin}}</td></center>
      </tr>
      <tr>
        @if($resident_agreement->admin =='Respite')

        <td style="width:500px;">Fixed period stay from:  {{date('d-m-Y', strtotime($resident_agreement->f_period)) }}</td>
        <td>Ending on:   {{date('d-m-Y', strtotime($resident_agreement->ending_on)) }}</td>

        @else
        
        <td style="width:500px;">Admission Date</td>
        <td>{{ $resident_agreement->adv_fee}}</td>
        @endif

      </tr>
    </table>&nbsp;&nbsp;
    <table>
      <tr>
        <td colspan="5" ><center><b>FEES AND CHARGES</b></td></center>
      </tr>
      <tr>
        <td>Fee for accommodation and personal support:  </td>
        <td>Amount:  {{ $resident_agreement->acc_fee}}</td>
      </tr>
      <tr>
        <td>Frequency of payment: </td>
        <td>{{ $resident_agreement->freq_pay}}</td>
      </tr>
      <tr>
        <td>Any rent paid in advance: </td>
        <td>{{ $resident_agreement->any_rent_adv}}</td>
      </tr>
      <tr>
        <td>How to pay: </td>
        <td>{{ $resident_agreement->pay_method}}</td>
      </tr>
    </table>&nbsp;&nbsp;
    <table>
      <tr>
        <td colspan="5" ><center><b>OTHER FEES AND CHARGES</b></td></center>
      </tr>
      <tr>
        <td width="300px;">Security Deposit Charged:  </td>
        <td width="300px;">{{ $resident_agreement->secu_depo }}</td>
      </tr>
      <tr>
        <td width="300px;">Amount Payable: </td>
        <td width="300px;">{{ $resident_agreement->amt_pay}}</td>
      </tr>
    </table>&nbsp;&nbsp;
    <table>
      <tr>
        <td colspan="5" ><center><b>OTHER FEES AND CHARGES</b></td></center>
      </tr>
      <tr>
        <td width="300px;">Condition report provided to the resident?:  </td>
        <td width="300px;">{{ $resident_agreement->condition_rep}}</td>
      </tr>
      <tr>
        <td width="300px;">Furniture in resident's room belonging to thr SRS: </td>
        <td width="300px;"><p>{{ $resident_agreement->pers_prop}}</p></td>
      </tr>
</table>
      <table>
        <tr>
        <td width="300px;">Reservation fee charged: </td>
        <td width="300px;">{{ $resident_agreement->reserv_fee}} </td>
        <td width="300px;"> Amount:</td>
        <td width="300px;">{{ $resident_agreement->amt_res}}</td>
      </tr>
      <tr>
        <td width="300px;">Establishment fee charged: </td>
        <td width="300px;">{{ $resident_agreement->est_fee}}</td>
        <td width="300px;"> Amount:</td>
        <td width="300px;">{{ $resident_agreement->amt_est}}</td>
      </tr>
      <tr>
        <td width="300px;">Fee in advance charged for other items/service provide by SRS: </td>
        <td width="300px;">{{ $resident_agreement->advnc_fee}}</td>
        <td width="300px;"> Amount:</td>
        <td width="300px;">{{ $resident_agreement->amt_adv}}</td>
      </tr>
      <tr>
        <td width="300px;">Refund to resident: {{ $resident_agreement->refund}}</td>
        <td width="500px;"><p>Refunds of money held in trust will be returned to the resident within 14 days of leaving the SRS. A resident can apply to the Victorian Civil and Administrative
Tribunal (VCAT) for an order if the proprietor does not refund a security, fee in
advance, reservation fee or establishment fee in accordance with the Act, must be
included.</p>
</td>
      <td width="300px;"> Amount:</td>
        <td width="300px;">{{ $resident_agreement->refund}}</td>
      </tr>
    </table>&nbsp;&nbsp;

    <table >
      <tr>
        <td colspan="5" ><center><b>MANAGEMENT OF RESIDENT’S MONEY</b></td></center>
      </tr>
      <tr>
        <td width="300px;">Will the SRS assist the resident in managing their finances:  </td>
        <td width="300px;">{{ $resident_agreement->srs_assist_status}}</td>
        <td width="300px;"> Amount:</td>
        <td width="300px;">{{ $resident_agreement->assist_amnt}}</td>
      </tr>
    </table><br>

    <table>
      <tr>
        <td colspan="5" ><center><b>ITEMS AND SERVICES PROVIDED
       </b></td></center>
      </tr>
      <tr>
      
      <p>Personal and Special Support Services </p><br>
      <table style="border: 2px; border-width: 1px; border-color: black;">
      <tr>
        <th>Types of Support</th>
        <th colspan="3">Level of assistance offered</th>
        <th>Included in fee</th>
      </tr>
      <tr>
        <td></td>
        <td><b><center>Full</center></b></td>
        <td><b><center>Part</center></b></td>
        <td><b><center>None</center></b></td>
        <td></td>
      </tr>
      <tr>
        <td>Bathing and showering</td>
        <td><form action="">    
         {!! $resident_agreement->bath == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
         <td><form action="">    
         {!! $resident_agreement->bath == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td><form action="">    
          {!! $resident_agreement->bath == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
        <td>{{ $resident_agreement->bath_fee}}</td>
      </tr>
      <tr>
        <td>Oral Support</td>
        <td><form action="">    
         {!! $resident_agreement->oral == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}  
        </form></td>
         <td><form action="">    
         {!! $resident_agreement->oral == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}     
        </form></td>
        <td><form action="">    
         {!! $resident_agreement->oral == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}     
        </form></td>
        <td>{{ $resident_agreement->oral_fee}}</td>
      </tr>
      <tr>
        <td>Hair and nails</td>
        <td><form action="">    
         {!! $resident_agreement->hair == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}       
        </form></td>
         <td><form action="">    
         {!! $resident_agreement->hair == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}        
        </form></td>
        <td><form action="">    
         {!! $resident_agreement->hair == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}      
        </form></td>
        <td>{{ $resident_agreement->hair_fee}}</td>
      </tr>
      <tr>
        <td>Toileting</td>
        <td><form action="">    
         {!! $resident_agreement->toileting == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
         <td><form action="">    
         {!! $resident_agreement->toileting == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}     
        </form></td>
        <td><form action="">    
         {!! $resident_agreement->toileting == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}     
        </form></td>
        <td>{{ $resident_agreement->toileting_fee}}</td>
      </tr>
      <tr>
        <td>Mobility</td>
        <td><form action="">    
         {!! $resident_agreement->mobility == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
         <td><form action="">    
         {!! $resident_agreement->mobility == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}
          </form></td>
        <td><form action="">    
         {!! $resident_agreement->mobility == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td>{{ $resident_agreement->mobility_fee}}</td>
      </tr>
      <tr>
        <td>Assistance with medication</td>
        <td><form action="">    
         {!! $resident_agreement->medi_assi == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
         <td><form action="">    
         {!! $resident_agreement->medi_assi == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
        <td><form action="">    
         {!! $resident_agreement->medi_assi == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
        <td>{{ $resident_agreement->medi_assi_fee}}</td>
      </tr>
      <tr>
        <td>Continence management</td>
        <td><form action="">    
         {!! $resident_agreement->continence == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
         <td><form action="">    
         {!! $resident_agreement->continence == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
        <td><form action="">    
         {!! $resident_agreement->continence == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}
        </form></td>
        <td>{{ $resident_agreement->continence_fee}}</td>
      </tr>
      <tr>
        <td>Bed making</td>
        <td><form action="">    
         {!! $resident_agreement->bed_make == 'Full' ?  '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
         <td><form action="">    
         {!! $resident_agreement->bed_make == 'Part' ?  '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
        <td><form action="">    
         {!! $resident_agreement->bed_make == 'None' ?   '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}   
        </form></td>
        <td>{{ $resident_agreement->bed_make_fee}}</td>
      </tr>
      <tr>
        <td>Dressing</td>
        <td><form action="">    
         {!! $resident_agreement->dressing == 'Full' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
         <td><form action="">    
         {!! $resident_agreement->dressing == 'Part' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td><form action="">    
         {!! $resident_agreement->dressing == 'None' ? '<center><i class="fa fa-check" aria-hidden="true"></i></center>' : ''  !!}    
        </form></td>
        <td>{{ $resident_agreement->dressing_fee}}</td>
      </tr><br>
    </table>

          
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
