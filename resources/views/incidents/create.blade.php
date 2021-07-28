@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
    @can('create', \App\Models\Incident::class)
        <a href="{{ route('incidents.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

@section('inputFields')

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('incidents.store') }}" autocomplete="off" role="form" style="width: 800px;">
                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
                <div class="box-header with-border text-center">
                   <h3><b>Incident</b></h3>
                   
                </div><!-- /.box-header -->

                <!-- box-body -->
                <div class="box-body" style="padding-left: 40px;padding-right: 40px;">                          
                     <div class="form-group ">

                      <div class="col-md-4 mb-3">
                        <label for="name">Person/involved effected</label>
                        <select class="form-control" required="" id="resi_name" name="p_name" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Resident Name  --</option>
                          @foreach($residents as $resident)
                          <option value="{{ $resident->id}} "> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach
                        </select>   
                      </div>
                        <div class="col-md-4 mb-3">
                        <label for="name">Incident Date</label>
                        <input type="date" name="i_date" class="form-control" placeholder="Incident Date">                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="name">Incident Time</label>
                        <input type="time" name="i_time" class="form-control" placeholder="Incident Time">                
                      </div>
                  </div>
                  <div class="form-group ">
                    <div class="col-md-3 mb-3">
                        <label for="name" >Staff Name</label>
                         
                        <input type="text"  class="form-control" id="staff" name="s_name" placeholder="Staff" readonly>             
                      </div>
                    
                      <div class="col-md-3 mb-3">
                        <label for="name">Location</label>
                        <input type="text" name="place" class="form-control" placeholder="Location">                
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Persons notified</label><br>
                            <label><input  type="checkbox" name="doctor" value="Doctor"> Doctor</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="doctor" value="NOK"> NOK</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="doctor" value="Case Manager"> Case Manager</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="doctor" value="DHSS"> DHSS</label>&nbsp;&nbsp; 
                                <label><input  type="checkbox" name="doctor" value="Management"> Management</label>&nbsp;&nbsp;
                                  <br>                
                      </div>  
                    </div>
                    <div class="form-group ">
                         
                    </div>
                    <div class="form-group ">
                        <div class="col-md-6 mb-3">
                        <label for="name">Notified Date</label>
                        <input type="date" name="n_date" class="form-control" placeholder="Notified Date">                
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="name">Notified Time</label>
                        <input type="time" name="n_time" class="form-control" placeholder="Notified Time">                
                      </div>
                  </div>
                  <div class="form-group ">
                        <div class="col-md-6 mb-3">
                        <label>Has Resident transfferd to the hospital?</label>
                        <br><input type="radio"  id="res_hos"  onclick="findselected1();" value="Yes" name="res_hos">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" onclick="findselected1();" id="res_hos" value="No" name="res_hos">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="name">Incident Details</label>
                        <textarea  name="i_details" class="form-control" placeholder="Incident Details"></textarea>                
                      </div>
                  </div>
                  <div class="form-group ">
                        <div class="col-md-4 mb-3">
                        <label for="name">Action Date</label>
                        <input type="date" name="action_date" class="form-control" placeholder="Action Date">                
                      </div>
                        <div class="col-md-4 mb-3">
                        <label for="name">Actions taken</label>
                        <textarea  name="actions" class="form-control" placeholder="Actions taken"></textarea>                
                      </div>
                      
                      <div class="col-md-4 mb-3">
                        <label for="name">Follow up Needed</label>
                        <textarea  name="need" class="form-control" placeholder="Follow up Needed"></textarea>                
                      </div>
                  </div>
                  <div class="form-group ">
                        <div class="col-md-12 mb-3">
                        <label for="name">Other details</label>
                        <textarea  name="o_det" class="form-control" placeholder="Other details"></textarea>                
                      </div>
                  </div>
                  <div class="form-group ">
                        <div class="col-md-12 mb-3">
                        <label>Prescribed reportable incident</label><br>
                            <label><input  type="checkbox" name="i_prescribed" value="Unexpected Death"> Unexpected Death</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="i_prescribed" value="Alleged Serious Assault ( Sexual )"> Alleged Serious Assault ( Sexual )</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="case_mgr" value="Serious injury of a resident"> Serious injury of a resident</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="i_prescribed" value="Alleged Serious Assault ( Physical)"> Alleged Serious Assault ( Physical)</label>&nbsp;&nbsp;
                                <label><input  type="checkbox" name="i_prescribed" value="Fire or other emergency even"> Fire or other emergency even</label>&nbsp;&nbsp;   <br>                
                      </div>   
                    </div>
                    <div class="form-group ">
                     <div class="col-md-6 mb-3">
                        <label for="name">Police Notified</label>
                        <textarea  name="police_noti" class="form-control" placeholder="Police Notified"></textarea>                
                      </div>
                        <div class="col-md-6 mb-3">
                        <label>Does the resident’s support plan need updating?</label>
                        <br><input type="radio"  id="sp_update"  onclick="findselected1();" value="Yes" name="sp_update">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" onclick="findselected1();" id="sp_update" value="No" name="sp_update">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                
                      </div>
                     
                  </div>
                  <div class="form-group ">
                        <div class="col-md-6 mb-3">
                        <label>Reported to the Department</label>
                        <br><input type="radio"  id="reported"  onclick="findselected1();" value="Yes" name="reported">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio" onclick="findselected1();" id="reported" value="No" name="reported">&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="name">Authorized Officer’s Name</label>
                        <input type="text" name="auth_name" class="form-control" placeholder="Authorized Officer’s Name">                
                      </div>
                  </div>
                  <div class="form-group ">
                        <div class="col-md-6 mb-3">
                        <label for="name">Reported Date</label>
                        <input type="date" name="rep_date" class="form-control" placeholder="Reported Date">                
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="name">Reported Time</label>
                        <input type="time" name="rep_time" class="form-control" placeholder="Reported Time">                
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
                        <a class="btn btn-link text-left" href="{{ route('incidents.index') }}">Cancel</a>
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
    var url = '{{ route("getRSAstaffDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#staff').val(response.stf_name);            

            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script type="text/javascript">
  $('input[type="checkbox"]').on('change', function() {
    $('input[name="' + this.name + '"]').not(this).prop('checked', false);
});
</script>
@include ('partials.bootstrap-table')
@stop