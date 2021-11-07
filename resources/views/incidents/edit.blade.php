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

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('incidents.update', $incident->id) }}" autocomplete="off" role="form" style="width: 800px;">
            @method('PATCH') 
                 
                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
                <div class="box-header with-border text-center">
                   <h3><b>Incident Report - {{ $incident->icode }} </b></h3> <input  type="text" style="width: 50px;" name="icode" width="100px;"  required="" value="{{$incident->icode}}" readonly="" hidden="">
                </div><!-- /.box-header -->

                <!-- box-body -->
                <div class="box-body" style="padding-left: 40px;padding-right: 40px;">                          
                     <div class="form-group ">

                      <div class="col-md-4 mb-3">
                        <label for="name">Person/involved effected</label>
                        <select class="form-control" required="" id="resi_name" name="p_name" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Resident Name  --</option>
                          @foreach($residents as $resident)
                          <option value="{{ $resident->id }}" {{ $incident->p_name == $resident->fname." ".$resident->mname." ".$resident->lname ? 'selected' : ''  }}> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach
                        </select>   
                      </div>
                        <div class="col-md-4 mb-3">
                        <label for="name">Incident Date</label>
                        <input type="date" name="i_date" class="form-control" value="{{ $incident->i_date}}" placeholder="Incident Date">                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="name">Incident Time</label>
                        <input type="time" name="i_time" class="form-control" value="{{ $incident->i_time}}" placeholder="Incident Time">                
                      </div>
                  </div>
                  <div class="form-group ">
                    <div class="col-md-3 mb-3">
                        <label for="name" >Staff Name</label>
                         
                        <input type="text"  class="form-control" value="{{ $incident->s_name}}" id="staff" name="s_name" placeholder="Staff" readonly>             
                      </div>
                    
                      <div class="col-md-3 mb-3">
                        <label for="name">Location</label>
                        <input type="text" name="place" class="form-control" value="{{ $incident->place}}" placeholder="Location">                
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Persons notified</label><br>
                            <label><input {{ $incident->doctor == 'Doctor' ? 'checked' : ''  }}  type="checkbox" name="doctor" value="Doctor"> Doctor</label>&nbsp;&nbsp;
                            <label><input {{ $incident->doctor == 'NOK' ? 'checked' : ''  }}  type="checkbox" name="nok" value="NOK"> NOK</label>&nbsp;&nbsp;
                            <label><input {{ $incident->doctor == 'Case Manager' ? 'checked' : ''  }}  type="checkbox" name="case_mgr" value="Case Manager"> Case Manager</label>&nbsp;&nbsp;
                            <label><input {{ $incident->doctor == 'DHSS' ? 'checked' : ''  }}  type="checkbox" name="dhhs" value="DHSS"> DHSS</label>&nbsp;&nbsp;
                            <label><input {{ $incident->doctor == 'Management' ? 'checked' : ''  }}  type="checkbox" name="management" value="Management"> Management</label>&nbsp;&nbsp;  <br>                
                      </div>  
                    </div>
                    <div class="form-group ">
                         
                    </div>
                    <div class="form-group ">
                        <div class="col-md-6 mb-3">
                        <label for="name">Notified Date</label>
                        <input type="date" name="n_date" class="form-control" value="{{ $incident->n_date}}"  placeholder="Notified Date">                
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="name">Notified Time</label>
                        <input type="time" name="n_time" class="form-control" value="{{ $incident->n_time}}"placeholder="Notified Time">                
                      </div>
                  </div>
                  <div class="form-group ">
                        <div class="col-md-6 mb-3">
                        <label>Has Resident transfferd to the hospital?</label>
                        <br><input type="radio"  id="res_hos"  value="Yes" name="res_hos" {{ $incident->res_hos == 'Yes' ? 'checked' : ''  }} id="res_hos"  value="Yes" name="res_hos">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="res_hos" value="No" name="res_hos" {{ $incident->res_hos == 'No' ? 'checked' : ''  }} id="res_hos"  value="No" name="res_hos"> &nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="name">Incident Details</label>
                        <textarea  name="i_details" class="form-control"  placeholder="Incident Details">{{ $incident->i_details}}</textarea>                
                      </div>
                  </div>
                  <div class="form-group ">
                        <div class="col-md-4 mb-3">
                        <label for="name">Action Date</label>
                        <input type="date" name="action_date" class="form-control" value="{{ $incident->action_date}}" placeholder="Action Date">                
                      </div>
                        <div class="col-md-4 mb-3">
                        <label for="name">Actions taken</label>
                        <textarea  name="actions" class="form-control"  placeholder="Actions taken">{{ $incident->actions}}</textarea>                
                      </div>
                      
                      <div class="col-md-4 mb-3">
                        <label for="name">Follow up Needed</label>
                        <textarea  name="need" class="form-control" placeholder="Follow up Needed">{{ $incident->need}}</textarea>                
                      </div>
                  </div>
                  <div class="form-group ">
                        <div class="col-md-12 mb-3">
                        <label for="name">Other details</label>
                        <textarea  name="o_det" class="form-control" placeholder="Other details">{{ $incident->o_det}}</textarea>                
                      </div>
                  </div>
                  <div class="form-group ">
                        <div class="col-md-12 mb-3">
                        <label>Prescribed reportable incident</label><br>
                        <label><input {{ $incident->i_prescribed == 'Unexpected Death' ? 'checked' : ''  }}  type="checkbox" name="i_prescribed" value="Unexpected Death"> Unexpected Death</label>&nbsp;&nbsp;
                        <label><input {{ $incident->i_prescribed == 'Alleged Serious Assault ( Sexual )' ? 'checked' : ''  }}  type="checkbox" name="i_prescribed" value="Alleged Serious Assault ( Sexual )"> Alleged Serious Assault ( Sexual )</label>&nbsp;&nbsp;
                        <label><input {{ $incident->i_prescribed == 'Serious injury of a resident' ? 'checked' : ''  }}  type="checkbox" name="i_prescribed" value="Serious injury of a resident"> Serious injury of a resident</label>&nbsp;&nbsp;
                        <label><input {{ $incident->i_prescribed == 'lleged Serious Assault ( Physical)' ? 'checked' : ''  }}  type="checkbox" name="i_prescribed" value="lleged Serious Assault ( Physical)"> lleged Serious Assault ( Physical)</label>&nbsp;&nbsp;
                        <label><input {{ $incident->i_prescribed == 'Fire or other emergency even' ? 'checked' : ''  }}  type="checkbox" name="i_prescribed" value="Fire or other emergency even"> Fire or other emergency even</label>&nbsp;&nbsp;<br>                
                      </div>   
                    </div>
                    <div class="form-group ">
                     <div class="col-md-6 mb-3">
                        <label for="name">Police Notified</label>
                        <textarea  name="police_noti" class="form-control" placeholder="Police Notified">{{ $incident->police_noti}}</textarea>                
                      </div>
                        <div class="col-md-6 mb-3">
                        <label>Does the resident’s support plan need updating?</label>
                        <br><input type="radio"  id="sp_update"  value="Yes" name="sp_update" {{ $incident->sp_update == 'Yes' ? 'checked' : ''  }} id="sp_update"  value="Yes" name="sp_update">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="sp_update" value="No" name="sp_update" {{ $incident->sp_update == 'No' ? 'checked' : ''  }} id="sp_update"  value="No" name="sp_update"> &nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;                 
                      </div>
                     
                  </div>
                  <div class="form-group ">
                        <div class="col-md-6 mb-3">
                        <label>Reported to the Department</label>
                        <br><input type="radio"  id="reported"  value="Yes" name="reported" {{ $incident->reported == 'Yes' ? 'checked' : ''  }} id="reported"  value="Yes" name="reported">&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="reported" value="No" name="reported" {{ $incident->reported == 'No' ? 'checked' : ''  }} id="reported"  value="No" name="reported"> &nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;               
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="name">Authorized Officer’s Name</label>
                        <input type="text" name="auth_name" class="form-control" value="{{ $incident->auth_name}}" placeholder="Authorized Officer’s Name">                
                      </div>
                  </div>
                  <div class="form-group ">
                        <div class="col-md-6 mb-3">
                        <label for="name">Reported Date</label>
                        <input type="date" name="rep_date" class="form-control " value="{{ $incident->rep_date}}" placeholder="Reported Date">                
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="name">Reported Time</label>
                        <input type="time" name="rep_time" class="form-control " value="{{ $incident->rep_time}}" placeholder="Reported Time">                
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
@include ('partials.bootstrap-table')
@stop