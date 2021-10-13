@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop

@section('header_right')
    @can('create', \App\Models\SrsStaff::class)
        <a href="{{ route('srs_staffs.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
    @endcan
@stop

{{-- Page content --}}
@section('content')

  <div id="webui">
    <div class="row" style="padding-left: 100px;">
        <!-- left column -->
      <div class="col-md-7">
        <form class="form-horizontal" method="" style="width:1000px;" action="" autocomplete="off">
          <div class="box box-default">
             <div class="box-header with-border text-center">
                 <h3><b>Employee</b></h3>
                   
                </div><!-- /.box-header -->
            <div class="box-body" style="padding-left:80px;">

                <!-- Asset name -->
                <div class="form-group">
                    <label class="col-sm-6 control-label">Name:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->name}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-6 control-label">Address:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->address}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Phone Number:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->ph}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Date of Birth:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ date('d-m-Y', strtotime($srs_staff->dob))}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Email:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->email}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-6 control-label">Employment Date:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->empdate}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Position:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->posi}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Tax File Number (TFN):</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->tfn}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Australian Business Number:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->abn}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Super Company:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->s_comp}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Super number:</label>
                    <div class="col-md-6">
                        <p class="form-control-static">{{ $srs_staff->s_no}}</p>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-6 control-label">Signature:</label>
                    <div class="col-md-6">
                         <img id="preview-sign-before-upload" style="width: 100px;height: 50px;" src="{{url('')}}/images/sign/{{    $srs_staff->empsign}}"  alt="" onerror="if (this.src != 'error.jpg') this.src = '{{url('')}}/images/sign/default1.jpg';" class="outer" />
                    </div>
                </div>

               <table class="table table-bordered" style="border: 2px; border-width: 1px; border-color: black;">
      <tr>
         <th width="100px; class="text-center">No</th>
        <th width="200px;" class="text-center">Certificate Name</th>
        <th class="text-center">Issue Date</th>
        <th class="text-center">Expiry date</th>
        <th width="150px;" class="text-center">Certificate</th>

      </tr>
      @for ($i=0; $i < $num; $i++)

      <tr class="blank_row">
        <td > {{$item_no[$i] }}</td>
        <td> {{$quali[$i] }}  </td>
        <td>{{$qop_date[$i] }}</td>
        <td>{{$certi_exp[$i] }}</td>
        <td><a href="{{ route('getDownload',$emp_certi[$i]) }}">{{$emp_certi[$i] }}</a></td>
        </tr>
    @endfor
     
    </table><br>
              
              
          
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@stop

@section('moar_scripts')
@include ('partials.bootstrap-table')
@stop
