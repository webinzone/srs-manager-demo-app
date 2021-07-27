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
                      <div class="col-md-6 mb-3">
                        <label>Resident Name</label>
                        <select class="form-control" required="" id="resi_name" name="res_name" style="height: 26px;padding: 3px 10px;">
                          @foreach($residents as $resident)
                            <option value="{{ $resident->id }}" {{ $progress_note->res_name == $resident->fname." ".$resident->mname." ".$resident->lname ? 'selected' : ''  }}> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach
                        </select>                
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="name" >Staff Name</label>
                         <input type="text" id="staff" placeholder="Staff" class="form-control" value="{{ $progress_note->staff}}" name="staff" readonly>               
                      </div>
                    </div>
                    <div class="form-group ">
                           <div class="col-md-6 mb-3 ">
                        <label for="name" >ProgressNote</label>

                 <textarea  name="prg_note" rows="5" class="form-control" placeholder="Progress Note">{{ $progress_note->prg_note}}</textarea>                                        
                        </div>
                        
                           <div class="col-md-6 mb-3 ">
                        <label for="name" >Career</label>

                 <textarea  name="career" rows="5" class="form-control" placeholder="Career">{{ $progress_note->career}}</textarea>                                       
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
@include ('partials.bootstrap-table')
@stop