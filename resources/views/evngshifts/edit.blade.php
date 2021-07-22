
@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
  <a href="{{ route('evngshifts.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
@stop

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
          <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">


          <form id="create-form" class="form-horizontal" method="post" action="{{ route('evngshifts.update', $evngshift->id) }}"  style="width: 800px;" autocomplete="off" role="form" >
                        @method('PATCH') 

                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
               <!-- box-header -->
              <div class="box-header with-border text-center">
                 <h3><b>Evening Shift</b></h3>
                   
                </div><!-- /.box-header -->


                <!-- box-body -->
                -->
                <div class="box-body" style="padding-left: 100px;padding-right: 40px;"> 
                     <div class="form-row">
                        <div class="col-md-2 mb-3" style="left:100px;">
                        <label for="name" >Date</label>
                      </div>
                      <div class="col-md-6 mb-3" style="left:0px;">
                        <input type="date" style="width: 250px;" value="{{$evngshift->eveng_date}}" name="eveng_date" id="res_date" class="form-control" >                                     
                       </div>
                    </div>      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;               
                    <div class="form-row" >
                         <div class="col-md-4 mb-3" >
                       <label for="name" >Evening staff</label>
                         <select class="form-control" style="height: 26px;padding: 3px 10px;" id="evng_staff" name="evng_staff">
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}" {{ $evngshift->evng_staff == $emp->name ? 'selected' : ''  }}> {{ $emp->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    <div class="col-md-8 mb-3">
                        <label for="name" >Morning staff</label>
                         <select class="form-control" style="width: 250px;height: 26px;padding: 3px 10px;" id="mng_staff" name="mng_staff">
                             @foreach($emps as $emp)
                          <option value="{{ $emp->name }}" {{ $evngshift->mng_staff == $emp->name ? 'selected' : ''  }}> {{ $emp->name }}</option>
                          @endforeach
                        </select>
                      </div>
                     

                     </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     
                     
                     <div class="form-row" >
                      <div class="col-md-4 mb-3">
                        <label for="name" >Resident Name</label>
                        <select class="form-control" required="" id="resi_name" name="res_name" style="height: 26px;padding: 3px 10px;">
                          @foreach($residents as $resident)
                          <option value="{{ $resident->id }}" {{ $evngshift->res_name == $resident->fname." ".$resident->mname." ".$resident->lname ? 'selected' : ''  }}> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname}}</option>
                          @endforeach
                        </select>                                   
                       </div>
                       <div class="col-md-8 mb-3">
                        <label for="name" >Room No</label>
                        <input type="text" style="width: 250px;" name="room" id="rooms" class="form-control" value="{{$evngshift->room}}" readonly>
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     
                    <div class="form-row" >
                      <div class="col-md-12 mb-3">
                        <label for="name" >Note</label>
                        <textarea name="notes" style="width: 250px;" id="notes" class="form-control" >{{$evngshift->notes}}</textarea>                                     
                       </div>
                   </div>
                       
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     
                    

                                       
                     <div class="box-footer text-right" style="padding-right:80px;">
                        <br><br><a class="btn btn-link text-left" href="{{ route('evngshifts.index') }}">Cancel</a>
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
                $('#rooms').val(response.room_no);                    
                   

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

