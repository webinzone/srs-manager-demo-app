
@extends('layouts/default')

{{-- Page title --}}
@section('title')
Update Progresses
@parent
@stop
@section('header_right')
  <a href="{{ route('progresses.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
@stop

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">

          
         <form id="create-form" class="form-horizontal" method="post" action = "{{ route ('progresses.update', $progress->id) }}" autocomplete="off" role="form" >
            @method('PATCH') 

                 {{ csrf_field() }}
            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
                <div class="box-header with-border text-right">

                    <div class="col-md-12 box-title text-right" style="padding: 0px; margin: 0px;">

                        <div class="col-md-12" style="padding: 0px; margin: 0px;">
                            <div class="col-md-9 text-left">
                                                        </div>
                            <div class="col-md-3 text-right" style="padding-right: 10px;">
                                <a class="btn btn-link text-left" href="{{ route('progresses.index') }}">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check icon-white" aria-hidden="true"></i>
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>

                </div><!-- /.box-header -->

                <!-- box-body -->
               <div class="box-body">                           
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Name</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="name" class="form-control" value="{{ $progress->name}}">
        
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Age</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="number" name="age" class="form-control" value="{{ $progress->age}}">                                        
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Gender</label>
                        <div class="col-md-7 col-sm-12 required">
                             <select name="gender" class="form-control" id="gender">
                                  <option value="Male" {{ ($progress->gender == "Male") ? 'selected' : ''}} >Male</option>
                                  <option value="Female" {{ ($progress->gender == "Female") ? 'selected' : ''}}>Female</option>
                                  <option value="Other" {{ ($progress->gender == "Other") ? 'selected' : ''}}>Other</option>
                                </select>                          
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Room No</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="number" name="room_no" class="form-control" value="{{ $progress->room_no}}">                                       
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Progress Note</label>
                        <div class="col-md-7 col-sm-12 required">

              <textarea type="text" name="p_note" class="form-control">{{ $progress->p_note}}</textarea>                            
                        </div>
                    </div>
                   <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">Sign</label>
                        <div class="col-md-7 col-sm-12 required">
                 <input type="text" name="sign" class="form-control" value="{{ $progress->sign}}">                                       
                        </div>
                    </div>
                    <div class="box-footer text-right">
                        <a class="btn btn-link text-left" href="{{ route('progresses.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check icon-white" aria-hidden="true"></i> Save</button>
                    </div>

                </div> <!-- ./box-body -->
                            <!-- col-md-8 -->

            </div><!-- ./row -->
        </form>
      </div>
    </div>
</div>
@stop

@section('moar_scripts')
@include ('partials.bootstrap-table')
@stop

