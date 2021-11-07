@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
  <a href="{{ route('room_items.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
@stop

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class=" col" style="padding-left: 100px;">


          
         <form id="create-form" class="form-horizontal" method="post" action = "{{ route ('room_items.update', $room_item->id) }}" style="width: 1050px; align-items: center;   background-color: #fff; " autocomplete="off" role="form" >
            @method('PATCH') 

                 {{ csrf_field() }}
            <!-- box -->
             <div class="box box-default">
                <!-- box-header -->
               <!-- box-header -->
              <div class="box-header with-border text-center">
                 <h3><b>Room Item</b></h3>
                   
                </div><!-- /.box-header -->

                </div><!-- /.box-header -->


                <!-- box-body -->
             <div class="box-body" style="padding-left: 50px;">                         
                    <div class="form-row" style="padding-bottom:10px;">
                    <div class="col-md-4 mb-2" >
                      <label for="name" >Item Code</label>
                      <input type="text" name="icode" id="icode" placeholder="Item Code" value="{{ $room_item->icode}}" class="form-control" readonly>        
                    </div>
                      
                    <div class="col-md-5 mb-3">
                      <label for="name" >Item Name</label>
                      <input type="text" name="iname" id="iname" placeholder="Item Name" value="{{ $room_item->iname}}" class="form-control" >
                    </div>
                   </div>

                    
                    
                    <br><br>

                    <br><br>
                     <div class="box-footer text-right" style="padding-right:80px;">
                        <br><br><a class="btn btn-link text-left" href="{{ route('room_items.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check icon-white" aria-hidden="true"></i> Save</button>
                    </div>
                </div>

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
