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


{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('progress_notes.update', $progress_note->id) }}" autocomplete="off" role="form" style="width: 800px;">
             @method('PATCH')

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
                          @foreach($residents as $resident)
                            <option value="{{ $resident->id }}" {{ $progress_note->res_name == $resident->fname." ".$resident->mname." ".$resident->lname ? 'selected' : ''  }}> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach
                        </select>                
                      </div>
                     <div class="col-md-4 mb-3">
                        <label for="name" >DOB</label>
                         <input type="text" value="{{ $progress_note->dob}}" id="dob" placeholder="DOB" class="form-control" name="dob" readonly>               
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="name" >Staff Name</label>
                         <select class="form-control" style="height: 26px;padding: 3px 10px;" id="app_bookby" name="staff">
                             @foreach($emps as $emp)
                          <option value="{{ $emp->name }}" {{ $progress_note->staff == $emp->name ? 'selected' : ''  }}> {{ $emp->name }}</option>
                          @endforeach
                        </select>                                       
                      </div>
                       <input type="text" id="gname" value="{{ $progress_note->g_name }}" placeholder="Given Name" class="form-control" name="g_name" hidden> 
                                       
                    </div>

                    <div class="form-group ">

                       

                      <div class="col-md-4 mb-3">
                        <label for="name" >Gender</label>
                         <input type="text" value="{{ $progress_note->gender}}" id="gender" placeholder="Gender" class="form-control" name="gender" readonly>               
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="name" >Room No</label>
                         <input type="text" value="{{ $progress_note->room}}" id="room" placeholder="Room No" class="form-control" name="room" readonly>               
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="name" >Date</label>
                         <input type="date" value="{{ $progress_note->p_date}}" id="res_date" placeholder="Date" class="form-control" name="p_date" >               
                      </div>
                    </div>
                    <div class="form-group ">
                           <div class="col-md-12 mb-3 ">
                        <label for="name" >ProgressNote</label>

                 <textarea  name="prg_note" rows="5" class="form-control" placeholder="Progress Note">{{ $progress_note->prg_note}}</textarea>                                        
                        </div>
                        
                       <!--    <div class="col-md-6 mb-3 ">
                        <label for="name" >Career</label>

                 <textarea  name="career" rows="5" class="form-control" placeholder="Career">{{ $progress_note->career}}</textarea>                                       
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
                $('#gname').val(response.fname);
                  

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