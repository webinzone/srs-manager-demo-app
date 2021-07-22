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

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('transfer_records.store') }}" style="width: 1000px; align-items: center;   background-color: #fff; " autocomplete="off" role="form" >
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
                          <option value="{{ $resident->id }}"> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach
                        </select>
                       </div>
                                                            
                      <div class="col-md-3 mb-3">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" id="dob" class="form-control" placeholder="Date of Birth" readonly>                                        
                      </div>
                      <div class="col-md-2 mb-3">
                         <label for="gender">Gender</label>&nbsp;&nbsp;&nbsp;
                            <input type="text" name="gender" id="gender" class="form-control" placeholder="Gender" readonly>                                     
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Nationality</label>
                        <input type="text" name="nation" id="nation" class="form-control" placeholder="Nationality" readonly>                                        
                      </div>
                      
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                

                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Language Spoken</label>
                        <input type="text" name="lan" id="lan" class="form-control" placeholder="Language Spoken" readonly>                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Religion</label>
                        <input type="text" name="religion" id="religion" class="form-control" placeholder="Religion" readonly>                                        
                      </div>
                      
                      <div class="col-md-3 mb-3">
                        <label>Medicare No</label>
                        <input type="text" name="medi_no" id="medi_no" class="form-control" placeholder="Medicare No" readonly>                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Pension No</label>
                        <input type="text" name="pension_no" id="pension_no" class="form-control" placeholder="Pension No" readonly>
                                                              
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Chemist Details</b></h5>
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Chemist Detail</label>
                        <input type="text" name="chemist" class="form-control" placeholder="Chemist Detail">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control" placeholder="Date">                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>From</label>
                        <input type="text" name="from" class="form-control" placeholder="From">                                       
                      </div>
                     
                      <div class="col-md-3 mb-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control" placeholder="Address"></textarea>
                      </div>
                </div>
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Phone No.</label>
                        <input type="text" name="ph" class="form-control" placeholder="Phone No.">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Fax</label>
                        <input type="text" name="fax" class="form-control" placeholder="Fax">                                        
                      </div>

                      <div class="col-md-3 mb-3">
                        <label>To</label>
                        <input type="email" name="to" class="form-control" placeholder="To">                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Reason For Transfer</label>
                        <textarea  name="reason" class="form-control" placeholder="Reason For Transfer"></textarea>
                       
                      </div>
                </div>

                <div class="form-row">
                      <!--<div class="col-md-4 mb-3">
                        <label>Indefinite period of stay from</label>
                        <input type="date" name="i_period" class="form-control" placeholder="Indefinite period of stay form">                                        
                      </div>-->
                      
                      <div class="col-md-12 mb-12">
                        <label><b>Notification</b></label>
                        <input type="text" style="width: 200px;" name="notif" id="notif" class="form-control" placeholder="Notification">                                        
                      </div>

                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Next of Kin</b></h5>

                <div class="form-row">
                      <div class="col-md-6 mb-3 ">
                        <label>Contact</label>
                        <input type="text" name="nok_contact" class="form-control" placeholder="Contact">                                        
                      </div>
                      <div class="col-md-6 mb-3 ">
                        <label>Has been advised of the transfer?</label>
                        <br><input type="radio"  id="advised"  value="Yes" name="advised">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="advised" value="No" name="advised">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>

                      
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <br><h5 style="color:#980000;font-size: 16px;"><b>Resident's Guardian</b></h5>
 
                
                <div class="form-row">
                      <div class="col-md-6 mb-3 ">
                        <label>Contact</label>
                        <input type="text" name="gua_contact" class="form-control" placeholder="Contact">                                        
                      </div>
                      <div class="col-md-6 mb-3 ">
                        <label>Has been advised of the transfer?</label>
                        <br><input type="radio"  id="guardian_adv"  value="Yes" name="guardian_adv">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="guardian_adv" value="No" name="guardian_adv">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <br><h5 style="color:#980000;font-size: 16px;"><b>Person Nominated by Resident</b></h5>
 
                
                <div class="form-row">
                      <div class="col-md-6 mb-3 ">
                        <label>Contact</label>
                        <input type="text" name="nomini_contact" class="form-control" placeholder="Contact">                                        
                      </div>
                      <div class="col-md-6 mb-3 ">
                        <label>Has been advised of the transfer?</label>
                        <br><input type="radio"  id="nomini_adv"  value="Yes" name="nomini_adv">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="nomini_adv" value="No" name="nomini_adv">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>

                  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <br><h5 style="color:#980000;font-size: 16px;"><b>Resident's Administrator</b></h5>
 
                
                <div class="form-row">
                      <div class="col-md-6 mb-3 ">
                        <label>Contact</label>
                        <input type="text" name="resadmin_contact" class="form-control" placeholder="Contact">                                        
                      </div>
                      <div class="col-md-6 mb-3 ">
                        <label>Has been advised of the transfer?</label>
                        <br><input type="radio"  id="admin_adv"  value="Yes" name="admin_adv">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="admin_adv" value="No" name="admin_adv">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>

                  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <h5 style="color:#980000;font-size: 16px;"><b>Resident's Medical Practitioner/Health Details </b></h5>
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Name</label>
                        <input type="text" name="doc_name" id="a" class="form-control" placeholder=" Name" readonly>                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Phone Number</label>
                        <input type="text" name="doc_ph" id="b" class="form-control" placeholder="Phone Number" readonly>                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Fax</label>
                        <input type="text" name="doc_fax" id="c" class="form-control" placeholder="Fax" readonly>                                       
                      </div>
                     
                      <div class="col-md-3 mb-3">
                        <label>Other</label>
                        <textarea name="doc_other" class="form-control" placeholder="other"></textarea>
                      </div>
                </div>
                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Detail of Known Allergies</label>
                        <input type="text" name="allergy"  class="form-control" placeholder="Doctor Name">                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Pre Existing Medical Condition</label>
                        <input type="text" name="exis_medi" id="d" class="form-control" placeholder="Pre Existing MedicalCondition">                                        
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <h5 style="color:#980000;font-size: 16px;"><b> Details of Current Resident's Medication</b></h5>
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Current Medication Details</label>
                        <textarea name="medi_chart" class="form-control" placeholder="Current Medication Details"></textarea>                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Has all of the above medication been sent with Resident?</label>
                        <br><input type="radio"  id="medi_sent"  value="Yes" name="medi_sent">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="medi_sent" value="No" name="medi_sent">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp; <br><br><br>                                       
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Summary of Current Support Requirements</label>
                        <textarea name="sum_req" class="form-control" placeholder="Current Medication Details"></textarea>                                        
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>List of Reports Sent With Resident </label>
                        <textarea name="medi_chart" class="form-control" placeholder="List of Reports Sent With Resident"></textarea>                                        
                      </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                   
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Other Relevant Details </label>
                        <textarea name="other_relevent" class="form-control" placeholder="Other Relevant Details"></textarea>                                        
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Staff in Charge</label>
                        <input type="text" style="width: 200px;" name="staff_incharge" class="form-control" id="staffm" placeholder="Staff in Charge" readonly>                                        
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
             
                $('#a').val(response.hs_name);
                $('#b').val(response.hs_lan);
                $('#c').val(response.hs_fax);
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
    var url = '{{ route("getRSAbookDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
               

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