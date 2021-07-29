
@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
    @can('create', \App\Models\Rent::class)
        <a href="{{ route('rents.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

@section('inputFields')

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('rents.store') }}" autocomplete="off" role="form" style="width: 800px;">
                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
                <div class="box-header with-border text-center">
                   <h3><b>Rent Details</b></h3>
                   
                </div><!-- /.box-header -->

                <!-- box-body -->
                <div class="box-body" style="padding-left: 40px;padding-right: 40px;">                          
                    <div class="form-group ">
                      <div class="col-md-3 mb-3">
                       <label>Resident Name</label>
                        <select class="form-control" required="" id="resi_name" name="res_name" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Resident Name  --</option>
                          @foreach($residents as $resident)
                          <option value="{{ $resident->id }}"> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname  }}</option>
                          @endforeach
                        </select>                
                      </div>
                      <div class="col-md-3 mb-3">
                         <label for="name" >Room No</label>
                         <input type="text" name="roomno" class="form-control" placeholder="Room No" id="roomss" readonly>                
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="name">Room Type</label>
                        <input type="text" name="room_type" id="type2" class="form-control" placeholder="Room Type" readonly>                
                      </div>
                      <div class="col-md-3 mb-3 ">
                        <label for="name" >Admission date</label>
                        <input type="date" name="adm_date" id="adm" class="form-control" placeholder="Admission date" readonly>                        
                    </div>
                </div>
                    <div class="form-group ">
                        <div class="col-md-4 mb-3 ">
                        <label for="name" >How to Pay ?</label>
                        <input type="text" name="tof" id="toff" class="form-control" placeholder="Type of Income" readonly>                                        
                        </div>
                        
                        <div class="col-md-4 mb-3 ">
                        <label for="name" >Rent Payment</label>
                        <input type="text" name="rent_pay"  class="form-control" placeholder="Rent Payment" id="week" readonly>                                       
                        </div>
                        <div class="col-md-4 mb-3 ">
                        <label for="name" >Advance Payment?</label>
                        <input type="text" name="adv_pay" id="adv" class="form-control" placeholder="Advance Payment?" readonly>                                       
                        </div>
                    </div>
                    <div class="form-group ">
                     
                    
                         <div class="col-md-4 mb-3 ">
                        <label for="name" >Payment Date</label>
                        <input type="date" name="pay_date" class="form-control" placeholder="Payment Date">                                        
                        </div>
                        <div class="col-md-4 mb-3 ">
                        <label for="name" >Next Date for Payment</label>
                        <input type="date" name="nextpay_date" class="form-control" placeholder="Next Date for Payment">                                        
                        </div>
                        <div class="col-md-4 mb-3 ">
                        <label for="name" >Status</label>

                            <select name="status" class="form-control" style="height: 26px;padding: 3px 10px;"> 
                            <option value="" style="font-size: 14px;">------------  Select Status       ------------</option> 
                            <option value="Paid" style="font-size: 14px;">Paid</option> 
                            <option value="Unpaid" style="font-size: 14px;">Unpaid</option> 

                        </select>
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
                        <a class="btn btn-link text-left" href="{{ route('rents.index') }}">Cancel</a>
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
                $('#roomss').val(response.room_no);            
                $('#type2').val(response.room_type);            
                $('#week').val(response.week_rent);            
                
                 if (response.respite == "Respite") {
                $('#adm').val(response.start_period);
                 }  
                 else
                 {
                  $('#adm').val(response.adm_date);
                 }

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
              $('#adv').val(response.amt_adv); 

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
                $('#toff').val(response.income_type);   
              
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

