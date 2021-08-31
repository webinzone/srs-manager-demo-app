@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop

@section('header_right')
    @can('create', \App\Models\SupportPlan::class)
        <a href="{{ route('support_plans.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')

 <style type="text/css">
      table, td, th {
    border: 1px solid black;
    padding: 5px;
  }
  td{
    width: 200px;

  }

  table {
    width: 100%;
    border-collapse: collapse;
    padding: 10px;
  }
</style>
  <div id="webui">
    <div class="row" style="padding-left: 80px;padding-right: 80px;">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" action="" autocomplete="off" style="width: 1000px; align-items: center;   background-color: #fff; padding-right: 100px;">
          <div class="box box-default">
            <div class="box-header with-border text-center">
                 <h3><b>Personel Support Plan</b></h3>
                   
                </div><!-- /.box-header -->

            <div class="box-body" style="padding-left:80px;">

            <table>
      <tr>
        <td>Resident’s Name</td>
        <td>{{ $support_plan->user_name}}</td>
        <td>In consultation with  </td>
        <td>{{ $support_plan->cons}}</td>
        <td width="">Admission Date</td>
        <td>{{date('d-m-Y', strtotime($support_plan->adm_date)) }}</td>
      </tr>
      <tr>
        <td>General practitioner Name and contact details</td>
        <td>{{ $support_plan->gp_name}} - {{ $support_plan->gp_contact}}</td>
        <td>Other Health Practitioners</td>
        <td>{{ $support_plan->other_gp}}</td>
        <td>Nominated person contact details</td>
        <td>{{ $support_plan->nomini}}</td>
      </tr>
      <tr>
        <td>If Clinics or outpatient services
            attended,
            Clinic/service name
            Contact person
            Telephone
            Frequency of visits
            Service provided</td>
        <td></td>
        <td>If Clinics or outpatient services
            attended,
            Clinic/service name
            Contact person
            Telephone
            Frequency of visits
            Service provided</td>
        <td>Mid West Area Mental Health
            Service,
            Address: Majorca St, St Albans
            3021
            Phone: 8345 1260
            Email: Jill.Collins@mh.org.au
          </td>
        <td>If Clinics or outpatient
            services attended,
            Clinic/service name
            Contact person
            Telephone
            Frequency of visits
            Service provided</td>
        <td></td>
      </tr>
    </table>&nbsp;&nbsp;<br><br>
    <table id ="myTable">
      <tr>
        <td style="width:150px;">Review Date</td>
        <td style="width:300px;">Reviewed in consultation with</td>
        <td style="width:500px;">Notes</td>
      </tr>
      @for ($i=0; $i < $num; $i++)
       <tr>
        <td>{{ $review[$i] }}</td>
        <td>{{ $r_with[$i] }}</td>
        <td>{{ $r_notes[$i] }}</td>
        
      </tr>
      @endfor
    </table><br><br>
    
<table>
  <tr>
    <td>Area of Need</td>
    <td>Summary of Personal Support Services to be provided</td>
    <td>Frequency(day/week/etc)</td>
  </tr>
  <tr>
    <td>HEALTH CARE: Support provided to the resident is appropriate and links in with health care he or she may be receiving.</td>
    <td>{{ $support_plan->health_care}}</td>
    <td>{{ $support_plan->f1}}</td>
  </tr>
  <tr>
    <td>PERSONAL HYGIENE: Bathing/showering, Toileting, assist with continence, dressing/undressing, hairdressing, skin care, nail care, etc</td>
    <td>{{ $support_plan->hygiene}}</td>
    <td>{{ $support_plan->f2}}</td>
  </tr>
  <tr>
    <td>Behaviour and OTHER: Awareness of time, place or person; behavioural issues; other support requirements.</td>
    <td>{{ $support_plan->behaviour}}</td>
    <td>{{ $support_plan->f3}}</td>
  </tr>
  <tr>
    <td>MEDICATION: Assistance or supervision taking medication, medication allergies/ restrictions, medications administered away from the SRS.</td>
    <td>{{ $support_plan->medication}}</td>
    <td>{{ $support_plan->f4}}</td>
  </tr>
  <tr>
    <td>MOBILITY: Aids to mobility used, capability to move around the SRS and the community independently (with or without aids).</td>
    <td>{{ $support_plan->mobility}}</td>
    <td>{{ $support_plan->f5}}</td>
  </tr>
  <tr>
    <td>SOCIAL CONTACT EMOTIONAL WELLBEING: Activities pursued, membership of clubs or groups, involvement with family and friends, voluntary or paid work, spiritual worship.</td>
    <td>{{ $support_plan->social_contact}}</td>
    <td>{{ $support_plan->f6}}</td>
  </tr>
  <tr>
    <td>EATING &amp; NUTRITION: Dietary requirements, special diets, food preferences, food allergies or restrictions, assistance with eating or drinking, assistance with maintaining hydration.</td>
    <td>{{ $support_plan->nutrition}}</td>
    <td>{{ $support_plan->f7}}</td>
  </tr>
  </table>    



          
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@stop

@section('moar_scripts')
<script type="text/javascript">
const rowIsEmpty = (tr) => Array.from(tr.querySelectorAll('td')).every(td => td.innerText === "");

deleteEmptyRows();

function deleteEmptyRows() {
  var myTable = document.getElementById("myTable");
  
  myTable.querySelectorAll('tr').forEach(tr => {
    if(rowIsEmpty(tr)) tr.remove();
  });

 
}
</script>
@include ('partials.bootstrap-table')
@stop
