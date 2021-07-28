@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
    @can('create', \App\Models\ProgressNote::class)
        <a href="{{ route('progress_notes.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

@section('inputFields')

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('progress_notes.store') }}" autocomplete="off" role="form" style="width: 800px;">
                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
                <div class="box-header with-border text-center">
                   <h3><b>Progress Notes</b></h3>
                   
                </div><!-- /.box-header -->

                <!-- box-body -->
                <div class="box-body" style="padding-left: 40px;padding-right: 40px;">                          
                    <div class="form-group ">
                      <div class="col-md-4 mb-3">
                        <label>Resident Name</label>
                        <select class="form-control" required="" id="resi_name" name="res_name" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Resident Name  --</option>
                          @foreach($residents as $resident)
                          <option value="{{ $resident->id}} "> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach
                        </select>                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="name" >Given Name</label>
                         <input type="text" id="" placeholder="Given Name" class="form-control" name="g_name" >               
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="name" >Staff Name</label>
                         <input type="text" id="staff" placeholder="Staff" class="form-control" name="staff" readonly>               
                      </div>
                      
                    </div>

                    <div class="form-group ">

                        <div class="col-md-4 mb-3">
                        <label for="name" >DOB</label>
                         <input type="text" id="dob" placeholder="DOB" class="form-control" name="dob" readonly>               
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="name" >Gender</label>
                         <input type="text" id="gender" placeholder="Gender" class="form-control" name="gender" readonly>               
                      </div>

                      <div class="col-md-2 mb-3">
                        <label for="name" >Room No</label>
                         <input type="text" id="room" placeholder="Room No" class="form-control" name="room" readonly>               
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="name" >Date</label>
                         <input type="date" id="res_date" placeholder="Date" class="form-control" name="p_date" >               
                      </div>
                    </div>

                    <div class="form-group ">
                           <div class="col-md-12 mb-3 ">
                        <label for="name" >ProgressNote</label>

                 <textarea  name="prg_note" rows="5" class="form-control" placeholder="ProgressNote"></textarea>                                        
                        </div>
                        
                          <!-- <div class="col-md-6 mb-3 ">
                        <label for="name" >Career</label>

                        <textarea  name="career" rows="5" class="form-control" placeholder="Career"></textarea>                                       
                        </div>-->
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
                        <a class="btn btn-link text-left" href="{{ route('progress_notes.index') }}">Cancel</a>
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
                $('#room').val(response.room_no);            
                 $('#dob').val(response.dob);
                $('#gender').val(response.gender);
                  

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
