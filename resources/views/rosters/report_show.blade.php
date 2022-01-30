@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop


{{-- Page content --}}
@section('content')

 <div id="webui">
    <div class="row">
        <!-- left column -->
      <div class="col-md-8">
    
           <div class="box box-default" style="left: 100px;padding-bottom: 50px;">
              <!-- box-header -->
                  <div class="box-header with-border text-center">
                 <h3><b>Generate Staff Roster</b></h3>

                </div><!-- /.box-header -->

                <!-- box-body -->
                <div class="box-body" style="padding-left: 50px;">    
                 <h5>Weekily Roster</h5>
              

           <form class="form-horizontal" target="_blank"  action="{{ route('generateRosterReport') }}" method="get" >

                     <div class="form-row">
                      <div class="col-md-3 mb-3">
                         <label for="fname">From </label>
                        <input type="date" name="from" id="res_date">
                       
                      </div>
                      <div class="col-md-3 mb-3">
                         <label for="fname">To </label>
                        <input type="date" name="to" id="res_date">
                       
                      </div>
                      <div class="col-md-3 mb-3">
                          <br><button type="submit" style="width:200px;" target="_blank" id="button" class="btn btn-primary pull-right" >
                                   Generate Report
                          </button>
                      </div>
                      </div>

                  </form>
                  <br><br><br><br>


                   <h5>Monthly Roster</h5>
              

           <form class="form-horizontal" target="_blank"  action="{{ route('generateMonthlyRosterReport') }}" method="get" >

                     <div class="form-row">
                      <div class="col-md-3 mb-3">
                         <label for="fname">Month & Year </label>
                        <input type="month" name="month" >
                       
                      </div>
                      
                      <div class="col-md-3 mb-3">
                          <br><button type="submit" style="width:200px;" target="_blank" id="button" class="btn btn-primary pull-right" >
                                   Generate Report
                          </button>
                      </div>
                      </div>

                  </form>
              </div>
              <div class="box-footer text-right">

                    </div>

          </div>
                  
         </div>
       </div>
  </div>

@stop

@section('moar_scripts')
<script type='text/javascript'>
$('res_name').change(function(){
  var theVal = $(this).val();
  switch(theVal){
    case '0':
      $('#button').prop('disabled', true);
      break;
    case '1':
      $('#button').prop('disabled', false);
      break;
  }
});


</script>

@include ('partials.bootstrap-table')
@stop
