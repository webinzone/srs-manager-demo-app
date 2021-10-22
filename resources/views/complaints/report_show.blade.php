@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop


{{-- Page content --}}
@section('content')

 <div id="webui">
    <div class="row" >
        <!-- left column -->
      <div class="col-md-7">
   
           <div class="box box-default" style="left: 100px;padding-bottom: 50px;">
              <!-- box-header -->
                  <div class="box-header with-border text-center">
                 <h3><b>Generate Complaint Report</b></h3>
                   
                </div><!-- /.box-header -->

                <!-- box-body -->
                <div class="box-body" style="padding-left: 50px;">    
              

           <form class="form-horizontal" target="_blank"  action="{{ route('generateComplaintReport') }}" method="get" >

                     <div class="form-row">
                      <div class="col-md-5 mb-3">
                        <label for="fname">Select Staff Name</label>
                         <select class="form-control" required="" id="res_name" name="res_name" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Staff Name  --</option>
                          @foreach($staffs as $st)
                          <option value="{{ $st->id }}"> {{ $st->f_name}}</option>
                          @endforeach
                        </select>
                       
                      </div>
                      <div class="col-md-3 mb-3">
                          <br><button type="submit" target="_blank" id="button" class="btn btn-primary pull-right" >
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


</script>

@include ('partials.bootstrap-table')
@stop