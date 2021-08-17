@extends('layouts/resident')


@section('content')

<div class="panel with-nav-tabs panel-default" style="padding-left:28px;padding-right: 32px;background-color: #BDF5BD;border-color: #BDF5BD;">
                       <div class="panel-heading single-project-nav">
                          <ul class="nav nav-tabs"> 
                           <li >
                              <a href="{{ route("residentDetails", $r_id) }}" ><i class="fa fa-user" aria-hidden="true" style="font-size: 20px;"></i></a>
                           </li>
                           <li >
                              <a href="{{ route("rsaDetails", $r_id) }}" >Resident Agreement</a>
                           </li>
                           <li >
                              <a href="{{ route("roomDetails", $r_id) }}" >Conditions</a>
                           </li>
                           
                           <li >
                               <a href="{{ route("referralDetails", $r_id) }}" >Referal</a>
                           </li>
                          
                           <li class="active">
                               <a href="{{ route("plansDetails", $r_id) }}" >Support Plan</a>
                           </li>
                           <li >
                               <a href="{{ route("incidentDetails", $r_id) }}" >Incident</a>
                           </li>
                           <li>
                               <a href="{{ route("transferDetails", $r_id) }}" >Transfer</a>
                           </li>
                           <li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reports <span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu">
                                 <li><a href="{{ route('generateResReport', ['res' => $r_id]) }}" target="_blank">Resident</a></li>
                                 <li class="divider"></li>                                 
                                 <li><a href="{{ route('generateReport', ['res_name' => $r_id]) }}" target="_blank">Condition Report</a></li>
                                 <li class="divider"></li>
                                 <li><a href="{{ route('generateRSAReport', ['res_name' => $r_id]) }}" target="_blank">RSA</a></li>
                                 <li class="divider"></li>
                                 <li><a href="{{ route('generateReferralReport', ['res_name' => $r_id]) }}" target="_blank">Referral</a></li>
                                 <li class="divider"></li>
                                 <li><a href="{{ route('generateRentReport', ['res_name' => $r_id]) }}"  target="_blank">Rent Details</a></li>
                                  <li class="divider"></li>
                                 <li><a href="{{ route('generateProgressReport', ['res_name' => $r_id]) }}"  target="_blank">Progress Report</a></li>
                                 <li class="divider"></li>
                                 <li><a href="{{ route('generateTransferReport', ['res_name' => $r_id]) }}" target="_blank">Transfer</a></li>
                                 
                                
                              </ul>
                          </li>
                       </ul>
                    </div>
                    
                 </div>


<div id="webui">  
  <div class="row" style="padding-left: 30px;padding-right: 80px;">
      
    
        <!-- col-md-8 -->
        <div class="col-md-10 offset-1">

       
          <form id="create-form" class="form-horizontal" method="" action="" autocomplete="off" role="form" style="width: 1000px;">
          
            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
                <div class="box-header with-border text-center">
                   <h3><b>{{ $head }}</b></h3>
                   
                </div><!-- /.box-header -->

                <!-- box-body -->
                <div class="box-body" style="padding-left: 40px;padding-right: 40px;">                          
                    <div class="form-row">
                        <h4 style="border: 1px solid black;background-color: #ebedf0;padding: 10px;"><center>No data available !</center></h4>
                    </div><br><br>

                </div> <!-- ./box-body -->
                            <!-- col-md-8 -->

                </div><!-- ./row -->
     </form>
</div>
@stop

@section('moar_scripts')
@include ('partials.bootstrap-table')
@stop