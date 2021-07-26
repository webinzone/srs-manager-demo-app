@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
    @can('create', \App\Models\Transfer::class)
        <a href="{{ route('transfer_records.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

@section('inputFields')

{{-- Page content --}}
@section('content')
<style type="text/css">
  table, td, th {
    border: 1px solid black;
    align-items: center;
  }

  table {
    width: 800px;
    left: 80px;
    border-collapse: collapse;
    align-items: center;
    align-content: center;
  }
</style>
<div id="webui">
  
  <div class="row" style="padding-left: 80px;padding-right: 80px;">
    
        <!-- col-md-8 -->
        <div class="col-md-10 offset-1">

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('transfer_records.update', $transfer_record->id) }}" style="width: 1000px; align-items: center;   background-color: #fff; " autocomplete="off" role="form" >
             @method('PATCH') 
                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
               
                <div class="box-header with-border text-center">
                       <h3><b>Transfer Record</b></h3>
                   
                </div>
                <div class="box-body" style="padding-left: 50px;">    
                <h5 style="color:#980000;font-size: 16px;"><b>Resident Details</b></h5>
                <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label>Resident Name</label>
                        <select class="form-control" required="" id="resi_name" name="user_name" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Resident Name  --</option>
                          @foreach($residents as $resident)
                          <option value="{{ $resident->id }}" {{ $transfer_record->user_name == $resident->fname." ".$resident->mname." ".$resident->lname ? 'selected' : ''  }}> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach
                        </select>
                       </div>
                                                            
                      <div class="col-md-3 mb-3">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" id="dob" class="form-control" value="{{ $transfer_record->dob}}" placeholder="Date of Birth" readonly>                                        
                      </div>
                      <div class="col-md-2 mb-3">
                         <label for="gender">Gender</label>&nbsp;&nbsp;&nbsp;
                            <input type="text" name="gender" id="gender" class="form-control" value="{{ $transfer_record->gender}}" placeholder="Gender" readonly>                                     
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Nationality</label>
                        <input type="text" name="nation" id="nation" class="form-control" value="{{ $transfer_record->nation}}" placeholder="Nationality" readonly>                                        
                      </div>
                      
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                

                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Language Spoken</label>
                        <input type="text" name="lan" id="lan" class="form-control" value="{{ $transfer_record->lan}}"  placeholder="Language Spoken" readonly>                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Religion</label>
                        <input type="text" name="religion" id="religion" class="form-control" value="{{ $transfer_record->religion}}"  placeholder="Religion" readonly>                                        
                      </div>
                      
                      <div class="col-md-3 mb-3">
                        <label>Medicare No</label>
                        <input type="text" name="medi_no" id="medi_no" class="form-control" value="{{ $transfer_record->medi_no}}"  placeholder="Medicare No" readonly>                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Pension No</label>
                        <input type="text" name="pension_no" id="pension_no" class="form-control" value="{{ $transfer_record->pension_no}}"  placeholder="Pension No" readonly>
                                                              
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Transfer Details</b></h5>
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>From</label>
                        <textarea rows="4" name="from" class="form-control" placeholder="From Address">{{ $transfer_record->from}}</textarea>
                                                             
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>To</label>
                        <textarea rows="4"  name="to" class="form-control" placeholder="To Address">{{ $transfer_record->to}}</textarea>                                      
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Reason For Transfer</label>
                        <textarea rows="4"  name="reason" class="form-control" placeholder="Reason For Transfer">{{ $transfer_record->reason}}</textarea>
                       
                      </div>

                      <div class="col-md-3 mb-12">
                        <label><b>Notification</b></label>
                       
                        <textarea rows="4"  name="notif" class="form-control" placeholder="Notification">{{ $transfer_record->notif}}</textarea>                                        
                      </div>
                      <!--<div class="col-md-3 mb-3">
                        <label>Chemist Detail</label>
                        <input type="text" name="chemist" class="form-control" placeholder="Chemist Detail">                                        
                      </div>-->
                       
                     
                      
                </div>
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">

                      <div class="col-md-12 mb-3">
                        <label>Date</label>
                        <input type="date" style="width: 200px;" name="date" class="form-control" value="{{ $transfer_record->date}}" placeholder="Date">                                        
                      </div>
                     <!-- <div class="col-md-3 mb-3">
                        <label>Phone No.</label>
                        <input type="text" name="ph" class="form-control" placeholder="Phone No.">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Fax</label>
                        <input type="text" name="fax" class="form-control" placeholder="Fax">                                        
                      </div>-->

                      
                      
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Next of Kin</b></h5>

                <div class="form-row">
                      <div class="col-md-6 mb-3 ">
                        <label>Contact</label>
                        <input type="text" name="nok_contact" class="form-control" value="{{ $transfer_record->nok_contact}}"  placeholder="Contact" id="co1">                                        
                      </div>
                      <div class="col-md-6 mb-3 ">
                        <label>Has been advised of the transfer?</label>
                        <br><input type="radio"  id="advised"  value="Yes" name="advised" {{ $transfer_record->advised == 'Yes' ? 'checked' : ''  }} id="advised"  value="Yes" name="advised">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="advised" value="No" name="advised" {{ $transfer_record->advised == 'No' ? 'checked' : ''  }} id="advised"  value="No" name="advised"> &nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>

                      
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <br><h5 style="color:#980000;font-size: 16px;"><b>Resident's Guardian</b></h5>
 
                
                <div class="form-row">
                      <div class="col-md-6 mb-3 ">
                        <label>Contact</label>
                        <input type="text" name="gua_contact" class="form-control" value="{{ $transfer_record->gua_contact}}" placeholder="Contact" id="co2">                                        
                      </div>
                      <div class="col-md-6 mb-3 ">
                        <label>Has been advised of the transfer?</label>
                        <br><input type="radio"  id="guardian_adv"  value="Yes" name="guardian_adv" {{ $transfer_record->guardian_adv == 'Yes' ? 'checked' : ''  }} id="guardian_adv"  value="Yes" name="guardian_adv">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="guardian_adv" value="No" name="guardian_adv" {{ $transfer_record->guardian_adv == 'No' ? 'checked' : ''  }} id="guardian_adv"  value="No" name="guardian_adv">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <br><h5 style="color:#980000;font-size: 16px;"><b>Person Nominated by Resident</b></h5>
 
                
                <div class="form-row">
                      <div class="col-md-6 mb-3 ">
                        <label>Contact</label>
                        <input type="text" id="co3" name="nomini_contact" class="form-control" value="{{ $transfer_record->nomini_contact}}" placeholder="Contact">                                        
                      </div>
                      <div class="col-md-6 mb-3 ">
                        <label>Has been advised of the transfer?</label>
                        <br><input type="radio"  id="nomini_adv"  value="Yes" name="nomini_adv" {{ $transfer_record->nomini_adv == 'Yes' ? 'checked' : ''  }} id="nomini_adv"  value="Yes" name="nomini_adv">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="nomini_adv" value="No" name="nomini_adv" {{ $transfer_record->nomini_adv == 'No' ? 'checked' : ''  }} id="nomini_adv"  value="No" name="nomini_adv">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>

                  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <br><h5 style="color:#980000;font-size: 16px;"><b>Resident's Administrator</b></h5>
 
                
                <div class="form-row">
                      <div class="col-md-6 mb-3 ">
                        <label>Contact</label>
                        <input type="text" name="resadmin_contact" id="co4" class="form-control" value="{{ $transfer_record->resadmin_contact}}" placeholder="Contact">                                        
                      </div>
                      <div class="col-md-6 mb-3 ">
                        <label>Has been advised of the transfer?</label>
                        <br><input type="radio"  id="admin_adv"  value="Yes" name="admin_adv" {{ $transfer_record->admin_adv == 'Yes' ? 'checked' : ''  }} id="admin_adv"  value="Yes" name="admin_adv">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="admin_adv" value="No" name="admin_adv" {{ $transfer_record->admin_adv == 'No' ? 'checked' : ''  }} id="admin_adv"  value="No" name="admin_adv">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>

                  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <h5 style="color:#980000;font-size: 16px;"><b>Resident's Medical Practitioner Details </b></h5>
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Name</label>
                        <input type="text" name="doc_name" id="a" class="form-control" value="{{ $transfer_record->doc_name}}" placeholder=" Name" readonly>                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Phone Number</label>
                        <input type="text" name="doc_ph" id="b" class="form-control" value="{{ $transfer_record->doc_ph}}" placeholder="Phone Number" readonly>                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Fax</label>
                        <input type="text" name="doc_fax" id="c" class="form-control" value="{{ $transfer_record->doc_fax}}" placeholder="Fax" readonly>                                       
                      </div>
                     
                      <div class="col-md-3 mb-3">
                        <label>Other</label>
                        <textarea name="doc_other" class="form-control" value="{{ $transfer_record->doc_other}}" placeholder="other"></textarea>
                      </div>
                </div>
                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Detail of Known Allergies</label>
                        <textarea name="allergy" id="al" class="form-control" placeholder="Known Allergies">{{ $transfer_record->allergy}}</textarea>                                       
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Pre Existing Medical Condition</label>
                        <textarea name="exis_medi" id="d" class="form-control" placeholder="Pre Existing MedicalCondition">{{ $transfer_record->exis_medi}}</textarea>
                                                               
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <h5 style="color:#980000;font-size: 16px;"><b> Details of Current Resident's Medication</b></h5>
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Current Medication Details</label>
                        <textarea name="medi_chart" class="form-control" placeholder="Current Medication Details">{{ $transfer_record->medi_chart}}</textarea>                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Has all of the above medication been sent with Resident?</label>
                        <br><input type="radio"  id="medi_sent"  value="Yes" name="medi_sent" {{ $transfer_record->medi_sent == 'Yes' ? 'checked' : ''  }} id="medi_sent"  value="Yes" name="medi_sent">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="medi_sent" value="No" name="medi_sent" {{ $transfer_record->medi_sent == 'No' ? 'checked' : ''  }} id="medi_sent"  value="No" name="medi_sent">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp; <br><br><br>                                       
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Summary of Current Support Requirements</label>
                        <textarea name="sum_req" class="form-control" placeholder="Current Medication Details">{{ $transfer_record->sum_req}}</textarea>                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>List of Reports Sent With Resident </label>
                        <textarea name="medi_list" class="form-control" placeholder="List of Reports Sent With Resident">{{ $transfer_record->medi_list}}</textarea>                                        
                      </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                   
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Other Relevant Details </label>
                        <textarea name="other_relevent" class="form-control" placeholder="Other Relevant Details">{{ $transfer_record->other_relevent}}</textarea>                                        
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Staff in Charge</label>
                        <input type="text" style="width: 200px;" name="staff_incharge" class="form-control" value="{{ $transfer_record->staff_incharge}}" id="staffm" placeholder="Staff in Charge" readonly>                                        
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <br><br>
                    
                    <!--<div class="form-group ">
                        <label>Upload Profile Photo</label>
                        <div class="col-md-7 col-sm-12 required">
                            <input type="file" name="profile_pic">                                       
                        </div>
                    </div>-->
                    <div class="box-footer text-right" style="padding-right:50px;">
                     <br><br>   <a class="btn btn-link text-left" href="{{ route('transfer_records.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check icon-white" aria-hidden="true"></i> Save</button>
                    </div>

                </div> <!-- ./box-body -->
                            <!-- col-md-8 -->

                </div><!-- ./row -->
     </form>
</div>
@stop

@section('moar_scripts')
<script type="text/javascript">
$('#resi_name').change(function(){
    var id = $(this).val();
    var url = '{{ route("getRSAclientDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#dob').val(response.dob);            
                 $('#gender').val(response.gender);
                $('#nation').val(response.nationality);
                $('#medi_no').val(response.medicard_no); 
                $('#pension_no').val(response.pension_no);           
                $('#religion').val(response.religion);           
                $('#lan').val(response.l_known);
                $('#al').val(response.allergy_det);                         

            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script>
$('#resi_name').change(function(){
    var id = $(this).val();
    var url = '{{ route("getGPDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
             
                $('#a').val(response.gp_name);
                $('#b').val(response.gp_lan);
                $('#c').val(response.gp_fax);

            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script>
$('#resi_name').change(function(){
    var id = $(this).val();
    var url = '{{ route("getNokDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
             
                $('#co1').val((response.name)+' - '+(response.ph));


            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>

<script>
$('#resi_name').change(function(){
    var id = $(this).val();
    var url = '{{ route("getHealthDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
             
              
                $('#d').val(response.med_history);

               

            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>


<script>
$('#resi_name').change(function(){
    var id = $(this).val();
    var url = '{{ route("getRSAstaffDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#staffm').val(response.stf_name);            

            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script>
$('#resi_name').change(function(){
    var id = $(this).val();
    var url = '{{ route("getRSAincomeDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#pay_meth').val(response.income_type);            

            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script>
$('#resi_name').change(function(){
    var id = $(this).val();
    var url = '{{ route("getNominiDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
              $('#co3').val(response.p_nomini+' - '+response.per_tel); 

            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script>
$('#resi_name').change(function(){
    var id = $(this).val();
    var url = '{{ route("getGuaDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
               
              $('#co2').val(response.gr_name+' - '+response.gr_mob);
            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script type="text/javascript">
  function onlyOne(checkbox) {
    var checkboxes = document.getElementsByName('bath')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}
</script>
<script type="text/javascript">
  $('input[type="checkbox"]').on('change', function() {
    $('input[name="' + this.name + '"]').not(this).prop('checked', false);
});
</script>

@include ('partials.bootstrap-table')
@stop

