@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
    @can('create', \App\Models\Vaccate::class)
        <a href="{{ route('vaccates.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

@section('inputFields')

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('vaccates.store') }}" autocomplete="off" role="form" style="width: 800px;">
                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
                <div class="box-header with-border text-center">
                   <h3><b>Notice to Vacate</b></h3>
                   
                </div><!-- /.box-header -->

                <!-- box-body -->
                <div class="box-body" style="padding-left: 40px;padding-right: 40px;">     
                    <h4>RESIDENT/ROOM DETAILS</h4>
                    <p>Details of person(s) receiving the notice: </p>
                                           
                    <div class="form-group ">
                      <div class="col-md-6 mb-3">
                        <label>Resident Name</label>
                        <select class="form-control" required="" id="resi_name" name="res_name" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Resident Name  --</option>
                          @foreach($residents as $resident)
                          <option value="{{ $resident->id }}"> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach
                        </select>                
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Name of Resident's person nominated</label>
                        <input type="text" name="p_nomini" id="p_nomini" class="form-control" placeholder="Name of Resident's person nominated">                
                      </div>
                    </div>
                      <p>Details of resident’s occupancy at the SRS</p>
                      <div class="form-group ">
                      <div class="col-md-4 mb-3">
                        <label>Room No</label>
                        <input type="text" name="roomno" id="roomno" class="form-control" placeholder="Room No" readonly>                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>SRS Name</label>
                        <input type="text" name="srs_name" id="srs_name" class="form-control" placeholder="SRS Name">                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>SRS Address</label>
                        <input type="text" name="srs_addr" id="srs_addr" class="form-control" placeholder="SRS Address">                
                      </div>
                    </div>
                    <h4>PROPRIETOR/MANAGER DETAILS</h4>
                    <p>Details of proprietor and person giving the notice:</p>
                    <div class="form-group ">
                      <div class="col-md-3 mb-3">
                        <label>Proprietor Name</label>
                        <input type="text" name="pr_name" id="pr_name" class="form-control" placeholder="Proprietor Name">                
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Person giving Notice</label>
                        <input type="text" name="pr_noti" id="pr_noti" class="form-control" placeholder="Person giving Notice">                
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Position in SRS</label>
                        <input type="text" name="pr_posi" id="pr_posi" class="form-control" placeholder="Position in SRS">                
                      </div>
                       <div class="col-md-3 mb-3">
                        <label>Phone Number</label>
                        <input type="tel" name="ph" id="ph" class="form-control" placeholder="Phone Number">                
                      </div>
                    </div>
                    <p>Address for serving documents:</p>
                    <div class="form-group ">
                        <div class="col-md-12 mb-3">
                        <label>Address</label>
                        <textarea  name="address" id="adr" class="form-control" placeholder="Address"></textarea>                
                      </div>
                    </div>
                    <h4>TERMINATION DETAILS</h4>
                    <p>Termination reason:</p>
                    <div class="form-group ">
                      <div class="col-md-4 mb-3">
                        <label>Section</label>
                        <input type="text" name="ter_sec" id="ter_sec" class="form-control" placeholder="Section">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Reason</label>
                        <textarea  name="reason" class="form-control" placeholder="Reason"></textarea> 
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Supporting Information</label>
                        <input type="text" name="ter_sup" id="ter_sup" class="form-control" placeholder="Supporting Information">
                      </div>
                    </div>
                    <p>Termination date:</p>
                    <div class="form-group ">
                      <div class="col-md-4 mb-3">
                        <label>Minimum days notice to vaccate</label>
                        <input type="text" name="ter_days" id="ter_days" class="form-control" placeholder="Minimum days notice to vaccate">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="name">Requested date to leave the SRS</label>
                        <input type="date" name="v_date" id="res_date" class="form-control" placeholder="Date Resident is requested to leave the SRS">               
                      </div>
                      <div class="col-md-4 mb-3">
                        <label>Actual days notice to vaccate</label>
                        <input type="text" name="act_date" id="act_date" class="form-control" placeholder="Actual days notice to vaccate">
                      </div>                        
                    </div>
                    <h4>DELIVERY OF NOTICE</h4>
                    <div class="form-group ">
                    <div class="col-md-6 mb-3">
                        <label>This notice was given to the resident:</label>
                        <br><input type="radio"  id="del_by"  value="By Hand" name="del_by">&nbsp;&nbsp;&nbsp;By Hand&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="del_by" value="By Post" name="del_by">&nbsp;&nbsp;&nbsp;By Post&nbsp;&nbsp;&nbsp;               
                      </div>
                      <div class="col-md-6 mb-3" style="width:250px;">
                        <label for="name">Dated</label>
                        <input type="date" name="ress_date" id="ress_date" class="form-control" placeholder="Dated">               
                      </div>
                    </div>
                    <div class="form-group ">
                      <div class="col-md-6 mb-3">
                        <label>This notice was given to resident’s person nominated:</label>
                        <br><input type="radio"  id="nomini_by"  value="By Hand" name="nomini_by">&nbsp;&nbsp;&nbsp;By Hand&nbsp;&nbsp;&nbsp;
                        <input type="radio"  id="nomini_by" value="By Post" name="nomini_by">&nbsp;&nbsp;&nbsp;By Post&nbsp;&nbsp;&nbsp;               
                      </div>
                      <div class="col-md-6 mb-3" style="width:250px;">
                        <label for="name">Dated</label>
                        <input type="date" name="nom_date" id="nom_date" class="form-control" placeholder="Dated">               
                      </div>
                    </div>
                    <div class="form-group ">
                    <div class="col-md-12 mb-3" style="width:250px;">
                        <label for="name">Date</label>
                        <input type="date" name="del_date" id="del_date" class="form-control" placeholder="Date">               
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
                        <a class="btn btn-link text-left" href="{{ route('vaccates.index') }}">Cancel</a>
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
    var url = '{{ route("getRSAclientDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#roomno').val(response.room_no);            
                 $('#ph').val(response.ph);
                $('#gender').val(response.gender);
                $('#email').val(response.res_email);
                $('#adr').val(response.pre_address);           

                   

            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script type="text/javascript">
    Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
})
    $(document).ready( function() {
    $('#res_date').val(new Date().toDateInputValue());
});
</script>
@include ('partials.bootstrap-table')
@stop
