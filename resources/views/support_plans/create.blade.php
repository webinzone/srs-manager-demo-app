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

@section('inputFields')

{{-- Page content --}}
@section('content')
<style type="text/css">
  table, td, th {
    border: 1px solid black;
    align-items: center;
    padding: 10px;
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
  
    <div class="row">
        <!-- col-md-8 -->
        <div class=" col" style="padding-left: 100px;">

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('support_plans.store') }}" autocomplete="off" role="form" style="width: 950px;">
                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
                <div class="box-header with-border text-center">
                   <h3><b>Support Plans</b></h3>
                   
                </div><!-- /.box-header -->

                <!-- box-body -->
                <div class="box-body" style="padding-left: 40px;padding-right: 40px;">                          
                    <div class="form-group ">
                      <div class="col-md-4 mb-3">
                        <label for="name" >Resident Name</label>
                        <select class="form-control" required="" id="resi_name" name="user_name" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Resident Name  --</option>
                          @foreach($residents as $resident)
                          <option value="{{ $resident->id}} "> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach
                        </select>                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="name">In consult with</label>
                        <input type="text" name="cons" id="cons" class="form-control" placeholder="In consult with">                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="name">Admission Date</label>
                        <input type="date" name="adm_date" id="admm" class="form-control" placeholder="Admission Date" readonly>                
                      </div>
                  </div>
                  <div class="form-group ">
                      <div class="col-md-3 mb-3">
                        <label for="name">General practitioner Name</label>
                        <input type="text" name="gp_name" id="gpname" class="form-control" placeholder="General practitioner Name" readonly>                
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="name">Contact details</label>
                        <input type="text" name="gp_contact" id="gp_contact" class="form-control" placeholder="Contact details" readonly>                
                      </div>   
                      <div class="col-md-3 mb-3">
                        <label for="name">Other Health Practitioners</label>
                        <input type="text" name="other_gp" id="other_gp" class="form-control" placeholder="Other Health Practitioners">                 
                    </div>
                      <div class="col-md-3 mb-3">
                        <label for="name">Nominated person contact</label>
                        <input type="text" name="nomini" id="nom" class="form-control" placeholder="contact details" readonly>                
                      </div>
                    </div>
                    <div class="form-group ">
                      <div class="col-md-12 mb-3"><br>
                    <table>
                        <tr>
                            <th>Review Date</th>
                            <th>Reviewed in consultation with</th>
                            <th>Notes</th>
                        </tr>
                        <tr>
                            <td><input type="date" name="review[]"></td>
                            <td><input type="text" name="r_with[]"></td>
                            <td><input type="text" name="r_notes[]"></td>
                        </tr>
                        <tr>
                            <td><input type="date" name="review[]"></td>
                            <td><input type="text" name="r_with[]"></td>
                            <td><input type="text" name="r_notes[]"></td>
                        </tr>
                        <tr>
                            <td><input type="date" name="review[]"></td>
                            <td><input type="text" name="r_with[]"></td>
                            <td><input type="text" name="r_notes[]"></td>
                        </tr>
                        <tr>
                            <td><input type="date" name="review[]"></td>
                            <td><input type="text" name="r_with[]"></td>
                            <td><input type="text" name="r_notes[]"></td>
                        </tr>
                    </table><br>
                </div>
            </div>
            <div class="form-group ">
                      <div class="col-md-12 mb-3">
                    <table>
                        <tr>
                            <th>Area of Need</th>
                            <th>Summary of Personal Support Services to be provided</th>
                            <th>Frequency(day/week/etc)</th>
                        </tr>
                        <tr>
                            <td>HEALTH CARE</td>
                            <td><textarea  name="health_care" class="form-control" placeholder="Health Care"></textarea></td>
                            <td><textarea  name="f1" class="form-control" placeholder="Health Care"></textarea></td>
                        </tr>
                        <tr>
                            <td>PERSONAL HYGIENE</td>
                            <td><textarea  name="hygiene" class="form-control" placeholder="PERSONAL HYGIENE"></textarea></td>
                            <td><textarea  name="f2" class="form-control" placeholder="PERSONAL HYGIENE"></textarea></td>
                        </tr>
                        <tr>
                            <td>Behaviour and OTHER</td>
                            <td><textarea  name="behaviour" class="form-control" placeholder="Behaviour and OTHER"></textarea></td>
                            <td><textarea  name="f3" class="form-control" placeholder="Behaviour and OTHER"></textarea></td>
                        </tr>
                        <tr>
                            <td>MEDICATION</td>
                            <td><textarea  name="medication" class="form-control" placeholder="MEDICATION"></textarea></td>
                            <td><textarea  name="f4" class="form-control" placeholder="MEDICATION"></textarea></td>
                        </tr>
                        <tr>
                            <td>MOBILITY</td>
                            <td><textarea  name="mobility" class="form-control" placeholder="MOBILITY"></textarea></td>
                            <td><textarea  name="f5" class="form-control" placeholder="MOBILITY"></textarea></td>
                        </tr>
                        <tr>
                            <td>SOCIAL CONTACT EMOTIONAL WELLBEING</td>
                            <td><textarea  name="social_contact" class="form-control" placeholder="SOCIAL CONTACT EMOTIONAL WELLBEING"></textarea></td>
                            <td><textarea  name="f6" class="form-control" placeholder="SOCIAL CONTACT EMOTIONAL WELLBEING"></textarea></td>
                        </tr>
                        <tr>
                            <td>EATING NUTRITION</td>
                            <td><textarea  name="nutrition" class="form-control" placeholder="EATING NUTRITION"></textarea></td>
                            <td><textarea  name="f7" class="form-control" placeholder="EATING NUTRITION"></textarea></td>
                        </tr>
                    </table>
                </div>
            </div>
                  <!--  <div class="form-group ">
                        <label for="name" >Company Id</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="company_id" class="form-control" placeholder="Company Id">                                     
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" >Location Id</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="location_id" class="form-control" placeholder="Location Id">                                     
                        </div>
                    </div>-->
                    <div class="box-footer text-right">
                        <a class="btn btn-link text-left" href="{{ route('support_plans.index') }}">Cancel</a>
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
    var url = '{{ route("getGPDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
             
                $('#gpname').val(response.gp_name);
                $('#gp_contact').val(response.address+' - '+response.ph); 
              


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
              $('#nom').val(response.p_nomini+' - '+response.per_tel); 

            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
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
                if(response.respite == "Respite")
                {
                 $('#admm').val(response.start_period); 
                }
                else
                {
                 $('#admm').val(response.adm_date);   

                }        
               
            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
@include ('partials.bootstrap-table')
@stop