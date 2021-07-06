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

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('resident_agreements.store') }}" style="width: 1000px; align-items: center;   background-color: #fff; " autocomplete="off" role="form" enctype="multipart/form-data">
                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
               
                <div class="box-header with-border text-center">
                       <h3><b>New Resident Agreement Form</b></h3>
                   
                </div>
                <div class="box-body" style="padding-left: 50px;">    
                <h5 style="color:#980000;font-size: 16px;"><b>Resident Details</b></h5>
                <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label>Resident Name</label>
                        <select class="form-control" required="" id="resi_name" name="r_name" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Resident Name  --</option>
                          @foreach($residents as $resident)
                          <option value="{{ $resident->id }}"> {{ $resident->fname}}. {{$resident->mname}}. {{$resident->lname  }}</option>
                          @endforeach
                        </select>
                       </div>
                                                            
                      <div class="col-md-2 mb-3">
                        <label>Room No</label>
                        <input type="text" name="room_no" id="roomm" class="form-control" placeholder="Room No">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Need assistance  in reading ?</label>
                        <br><input type="radio"  id="asistance_status"  value="Yes" name="asistance_status">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="asistance_status" value="No" name="asistance_status">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Staff</label>
                        <input type="text" name="staff" id="staffm" class="form-control" placeholder="Staff">                                        
                      </div>
                      
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Guardian Details</b></h5>

                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Guardian</label>
                        <input type="text" name="guardian" id="guardianm" class="form-control" placeholder="Guardian">                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Telephone</label>
                        <input type="tel" name="g_tel" id="gtel" class="form-control" placeholder="Telephone">                                        
                      </div>
                      
                      <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="g_email" id="gemail" class="form-control" placeholder="Email">                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Address</label>
                        <textarea name="g_adress" class="form-control" id="gadress" placeholder="Address"></textarea>
                                                              
                      </div>
                </div>
                <h5 style="color:#980000;font-size: 16px;"><b>Nomini Details</b></h5>
                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Person Nominated</label>
                        <input type="text" name="p_nomini" class="form-control" placeholder="Person Nominated">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Telephone</label>
                        <input type="tel" name="per_tel" class="form-control" placeholder="Telephone">                                        
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="per_email" class="form-control" placeholder="Email">                                       
                      </div>
                     
                      <div class="col-md-3 mb-3">
                        <label>Address</label>
                        <textarea name="per_address" class="form-control" placeholder="Address"></textarea>
                      </div>
                </div>
                <h5 style="color:#980000;font-size: 16px;"><b>Emergency Contact Details</b></h5>

                <div class="form-row">
                      <div class="col-md-3 mb-3">
                        <label>Emergency Contact</label>
                        <input type="text" name="emg_contact" class="form-control" placeholder="Emergency Contact">                                        
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Telephone</label>
                        <input type="tel" name="emg_tel" class="form-control" placeholder="Telephone">                                        
                      </div>

                      <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="emg_email" class="form-control" placeholder="Email">                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Address</label>
                        <textarea  name="emg_address" class="form-control" placeholder="Address"></textarea>
                       
                      </div>
                </div>
               <h5 style="color:#980000;font-size: 16px;"><b>Duration Of Stay</b></h5>

                <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label>Indefinite period of stay from</label>
                        <input type="date" name="i_period" class="form-control" placeholder="Indefinite period of stay form">                                        
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Fixed period stay form</label>
                        <input type="date" name="f_period" id="fperiod" class="form-control" placeholder="Fixed period stay form">                                        
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Ending on</label>
                        <input type="date" name="ending_on" id="endperiod" class="form-control" placeholder="Ending on">                                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Fee And Charges</b></h5>

                <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label>Accommodation & personal support Fee</label>
                        <input type="text" name="acc_fee" class="form-control" placeholder="Fee for accommodation and personal support">                                        
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Frequency of payment</label><br>
                            <label><input  type="checkbox" name="freq_pay[]" value="Weekly"> Weekly</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="freq_pay[]" value="Fortnightly"> Fortnightly</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="freq_pay[]" value="Every Calender Month"> Every Calender Month</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="freq_pay[]" value="Other"> Other</label>&nbsp;&nbsp;          
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Any rent paid in advance</label><br>
                        

                            <label><input  type="checkbox" name="any_rent_adv[]" value="Weekly"> Weekly</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="any_rent_adv[]" value="Fortnightly"> Fortnightly</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="any_rent_adv[]" value="Every Calender Month"> Every Calender Month</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="any_rent_adv[]" value="Other"> Other</label>&nbsp;&nbsp;                                          
                      </div>
                </div>&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label>How to pay</label><br>
                         <label><input  type="checkbox" name="pay_method[]" value="Direct Debit"> Direct Debit</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="pay_method[]" value="Cash"> Cash</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="pay_method[]" value="State Trustees"> State Trustees</label>&nbsp;&nbsp;
                                <label><label><input  type="checkbox" name="pay_method[]" value="Centrelink"> Centrelink</label>&nbsp;&nbsp;                                       
                                  <input  type="checkbox" name="pay_method[]" value="Other"> Other</label>&nbsp;&nbsp;                                      
                      </div>
                      
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Other Fee & Charges</b></h5>
 
                
                <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label>Security deposite charged ?</label>
                        <br><input type="radio"  id="secu_depo"  value="Yes" name="secu_depo">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="secu_depo" value="No" name="secu_depo">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp; 
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Amount Payable</label>
                        <input type="text" name="amt_pay" class="form-control" placeholder="Amount Payable">                                        
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Condition report provided to the resident ?</label>
                        <br><input type="radio"  id="condition_rep"  value="Yes" name="condition_rep">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="condition_rep" value="No" name="condition_rep">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>Furniture in resident's room belonging to the SRS</label>
                        
                        <textarea name="pers_prop" class="form-control" placeholder="Furniture in resident's room belonging to thr SRS"></textarea>                                        
                      </div>
                    
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                <div class="form-row">
                      
                      <div class="col-md-3 mb-3">
                        <label>Reservation fee charged ?</label>
                        <br><input type="radio"  id="reserv_fee"  value="Yes" name="reserv_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="reserv_fee" value="No" name="reserv_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;
                      </div>
                      <div class="col-md-3 mb-3">

                        <label>Reservation Amount</label>
                        <input type="text" name="amt_res" class="form-control" placeholder="Amount">                                       
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Establishment fee charged ?</label>
                        <br><input type="radio"  id="est_fee"  value="Yes" name="est_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="est_fee" value="No" name="est_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                        
                      </div>
                      <div class="col-md-3 mb-3">

                        <label>Establishment Amount</label>
                        <input type="text" name="amt_est" class="form-control" placeholder="Amount">                                       
                      </div>
                       
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                
                <div class="form-row">
                      <div class="col-md-6 mb-3">

                        <label>Fee in advance charged for other items/service provide by SRS ?</label>
                        <br><input type="radio"  id="advnc_fee"  value="Yes" name="advnc_fee">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="advnc_fee" value="No" name="advnc_fee">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                      
                      </div>
                        <div class="col-md-3 mb-3">

                        <label>Advance Amount</label>
                        <input type="text" name="amt_adv" class="form-control" placeholder="Amount">                                       
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Refund to resident</label>
                        <input type="text" name="refund" class="form-control" placeholder="Refund to resident">                                       
                      </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Management Of Resident's Money</b></h5>

                <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label>Will the SRS assist the resident in managing their finances ?</label>
                        <br><input type="radio"  id="srs_assist_status"  value="Yes" name="srs_assist_status">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="srs_assist_status" value="No" name="srs_assist_status">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                                       
                      </div>
                       <div class="col-md-6 mb-3" >
                        <label>Ammount to be managed</label>
                        <input type="text" style="width:200px" name="assist_amnt" class="form-control" placeholder="Ammount to be managed">                                        
                      </div>
                </div>


                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 style="color:#980000;font-size: 16px;"><b>Personal and Special Support Services</b></h5>
                <div class="form-row">
                  <div class="col-md-12 mb-3" >
                <table style="border: 2px; border-width: 1px; border-color: black; padding-left: 8px;left: 50px;">
                  <tr style="padding:5px;">
                    <th>Type of Support</th>
                    <th colspan="3">Level of assistance offered</th>
                    <th>Included in fee</th>
                  </tr>
                  <tr>
                    <td></td>
                    <td>&nbsp;&nbsp;&nbsp;   Full</td>
                    <td>&nbsp;&nbsp;&nbsp;   Part</td>
                    <td>&nbsp;&nbsp;&nbsp;   None</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Bathing and showering</td>
                    <td> &nbsp;&nbsp;&nbsp;   
                     <input type="checkbox" name="bath" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;      
                     <input type="checkbox" name="bath" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;      
                     <input type="checkbox" name="bath" value="None" />    
                    </td>
                    <td><input type="text" name="bath_fee"></td>
                  </tr>
                  <tr>
                    <td>Oral Support</td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="oral" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="oral" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="oral" value="None" />    
                    </td>
                    <td><input type="text" name="oral_fee"></td>
                  </tr>
                  <tr>
                    <td>Hair and nails</td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="hair" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="hair" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="hair" value="None" />    
                    </td>
                    <td><input type="text" name="hair_fee"></td>
                  </tr>
                  <tr>
                    <td>Toileting</td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="toileting" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="toileting" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="toileting" value="None" />    
                    </td>
                    <td><input type="text" name="toileting_fee"></td>
                  </tr>
                  <tr>
                    <td>Mobility</td>
                    <td>  &nbsp;&nbsp;&nbsp;      
                     <input type="checkbox" name="mobility" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;      
                     <input type="checkbox" name="mobility" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;      
                     <input type="checkbox" name="mobility" value="None" />    
                    </td>
                    <td><input type="text" name="mobility_fee"></td>
                  </tr>
                  <tr>
                    <td>Assistance with medication</td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="medi_assi" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="medi_assi" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="medi_assi" value="None" />    
                    </td>
                    <td><input type="text" name="medi_assi_fee"></td>
                  </tr>
                  <tr>
                    <td>Continence management</td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="continence" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="continence" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="continence" value="None" />    
                    </td>
                    <td><input type="text" name="continence_fee"></td>
                  </tr>
                  <tr>
                    <td>Bed making</td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="bed_make" value="Full" />    
                    </td>
                     <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="bed_make" value="Part" />    
                    </td>
                    <td>  &nbsp;&nbsp;&nbsp;     
                     <input type="checkbox" name="bed_make" value="None" />    
                    </td>
                    <td><input type="text" name="bed_make_fee"></td>
                  </tr>
                  <tr>
                    <td>Dressing</td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" name="dressing" value="Full" />    
                    </td>
                     <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" name="dressing" value="Part" />    
                    </td>
                    <td>   &nbsp;&nbsp;&nbsp;    
                     <input type="checkbox" name="dressing" value="None" />    
                    </td>
                    <td><input type="text" name="dressing_fee"></td>
                  </tr><br>
                </table>
              </div>
            </div>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <br><br>
                    
                    <!--<div class="form-group ">
                        <label>Upload Profile Photo</label>
                        <div class="col-md-7 col-sm-12 required">
                            <input type="file" name="profile_pic">                                       
                        </div>
                    </div>-->
                    <div class="box-footer text-right" style="padding-right:50px;">
                     <br><br>   <a class="btn btn-link text-left" href="{{ route('resident_agreements.index') }}">Cancel</a>
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
    var url = '{{ route("getRSADetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
               // $('#roomm').val(response.data.room_no);
               // $('#staffm').val(response.staff.stf_name);
                $('#guardianm').val(response.gr_name);
                $('#gtel').val(response.gr_lan);
                $('#gemail').val(response.gr_email);
                $('#gadress').val(response.gr_address);
                //$('#fperiod').val(response.books.b_from);
                //$('#endperiod').val(response.books.b_to);

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
                $('#roomm').val(response.room_no);            

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
    var url = '{{ route("getRSAbookDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#fperiod').val(response.b_from);
                $('#endperiod').val(response.b_to);           

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
