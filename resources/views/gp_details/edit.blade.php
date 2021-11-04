@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
  <a href="{{ route('gp_details.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
@stop

{{-- Page content --}}
@section('content')
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class=" col" style="padding-left: 100px;">


          
         <form id="create-form" class="form-horizontal" method="post" action = "{{ route ('gp_details.update', $gp_detail->id) }}" style="width: 1050px; align-items: center;   background-color: #fff; " autocomplete="off" role="form" >
            @method('PATCH') 

                 {{ csrf_field() }}
            <!-- box -->
             <div class="box box-default">
                <!-- box-header -->
               <!-- box-header -->
              <div class="box-header with-border text-center">
                 <h3><b>GP Details</b></h3>
                   
                </div><!-- /.box-header -->

                </div><!-- /.box-header -->


                <!-- box-body -->
             <div class="box-body" style="padding-left: 50px;">                         
                    <div class="form-row" style="padding-bottom:10px;">
                    <div class="col-md-4 mb-3">
                        <label for="name" >Resident Name</label>
                        <input type="text" style="width: 200px;" value="{{ $gp_detail->res_name }}" name="res_name" readonly class="form-control">
                       <!-- <select class="form-control" required="" id="resname" name="res_name" style="height: 26px;padding: 3px 10px;" readonly>
                          @foreach($residents as $resident)
                          <option value="{{ $resident->id }}" {{ $gp_detail->res_name == $resident->fname." ".$resident->mname." ".$resident->lname ? 'selected' : ''  }}> {{ $resident->fname}} {{$resident->mname}} {{$resident->lname}}</option>
                          @endforeach
                        </select>-->
                       </div>
                     
                   <div class="col-md-3 mb-3">
                        <label for="name" >Room No</label>
                        <input type="text" name="room" value="{{ $gp_detail->room }}" id="room" placeholder="Room No" class="form-control" readonly>                                       
                       </div>
                           <div class="col-md-2 mb-3">
                        <label for="name" >Bed</label>
                         
                        <input type="text" name="bed" value="{{ $gp_detail->bed }}" id="bed" placeholder="Bed No" class="form-control" readonly>
                      </div>
                            <div class="col-md-3 mb-3">
                              <label for="name" >Date of Birth</label>
                                         
                                <input type="text" value="{{ $gp_detail->dob }}" name="dob" id="dob" placeholder="Date of Birth" class="form-control" readonly>
                            </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            

                 
                    <div id="fieldList"  style="padding-bottom: 20px;padding-top: 20px; width: 1000px;">
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                 <div  class="form-row" style="padding-bottom:10px;">
                        <div class="table-responsive">
                            <button style="float: right;bottom: 50px; " class="btn  btn-primary text-right" 
                              id="addBtn" type="button">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button><br>
                              <table class="table table-bordered" id="paper-table">
                                <thead>
                                  <tr>
                                    <th width="65px;" class="text-center">No.</th>
                                    <th  class="text-center">Category</th>
                                    <th width="150px;" class="text-center">Name</th>
                                    <th width="200px;" class="text-center">Address</th>
                                    <th class="text-center">Phone No</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Action</th>                                                                      

                                  </tr>
                                </thead>
                                    @for ($i=0; $i < $num; $i++)

                                <tbody id="tbodym">
                                    <tr id="R{$i}">
                                        <td class="row-index text-center">
                                         <input type="text" name="item_no[]" value="{{  $item_no[$i] }}" >
                                         </td>
                                      <td class="row-index text-center">
                                         <input type="text" name="category[]" value="{{  $category[$i] }}" >
                                         </td>
                                         <td class="row-index text-center">
                                         <input name="name[]" type="text" value="{{  $name[$i] }}">
                                         </td>
                                         <td class="row-index text-center">
                                          <input type="text" name="address[]"  class="form-control" value="{{ $address[$i] }}">                                      
                                         </td>
                                         <td class="row-index text-center">
                                         <input name="ph[]" type="tel" value="{{  $ph[$i] }}">
                                         </td>
                                         <td class="row-index text-center">
                                         <input name="email[]" type="email" value="{{  $email[$i] }}">
                                         </td>
                                         <td>
                                            <!--<a style="height:20px;background-color:white;color:red;padding-left: 20px;"  class="btn " href="{{ route('getRow', [$gp_detail->id, 'val' => $i]) }}"><i class="fa fa-trash icon-white"></i></a>-->
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a style="height:20px;background-color:white;color:red;"  href="#" class="delete-row"><i class="fa fa-trash icon-white"></i></a>
                                         </td>
                                         
                                      <tr>                           
                                </tbody>
                                @endfor
                                <tbody id="tbody">
                                    
                                </tbody>

                              </table>
                            </div>
                            
                          </div>
                
                      <!--<div class="col-md-4 mb-3">
                        <label for="name" >Location Id</label>
                        <select class="form-control" style="height: 26px;padding: 3px 10px;" required="" name="location_id" id="location_id">
                            <option>--Select Location Id --</option>
                        </select>
                      </div>-->
                    
                    
                    <br><br>

                    <br><br>
                     <div class="box-footer text-right" style="padding-right:80px;">
                        <br><br><a class="btn btn-link text-left" href="{{ route('gp_details.index') }}">Cancel</a>
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

<script>
$('#resname').change(function(){
    var id = $(this).val();
    var url = '{{ route("getDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#room').val(response.room_no);
                $('#bed').val(response.bed_no);
                $('#dob').val(response.dob);

            }
            else{
                alert("error");
            }
        }
    });
});
</script>


<script>
    $(document).ready(function () {
  
      // Denotes total number of rows
      var rowIdx = {!! $num !!};
  
      // jQuery button click event to add a row
      $('#addBtn').on('click', function () {
  
        // Adding a row inside the tbody.
        $('#tbody').append(`<tr id="R${++rowIdx}">
             <td class="row-index text-center">
             <input type="text" name="item_no[]" value="${rowIdx}" readonly>
             </td>
             <td class="row-index text-center">
             <input name="category[]" type="text" >
             </td>
             <td class="row-index text-center">
              <input name="name[]" type="text" >
             </td>
             <td class="row-index text-center">
              <input name="address[]" type="text" >
             </td>
             <td class="row-index text-center">
             <input type="text" name="ph[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" name="email[]"  >
             </td>
              <td class="text-center">
                
                  <button style="height:20px;background-color:white;color:red;"  class="remove btn "><i class="fa fa-trash icon-white"></i></button>
                </td>
              </tr>`);
      });
  
      // jQuery button click event to remove a row.
      $('#tbody').on('click', '.remove', function () {
  
        // Getting all the rows next to the row
        // containing the clicked button
        var child = $(this).closest('tr').nextAll();
  
        // Iterating across all the rows 
        // obtained to change the index
        child.each(function () {
  
          // Getting <tr> id.
          var id = $(this).attr('id');
  
          // Getting the <p> inside the .row-index class.
          var idx = $(this).children('.row-index').children('p');
  
          // Gets the row number from <tr> id.
          var dig = parseInt(id.substring(1));
  
          // Modifying row index.
          idx.html(`Row ${dig - 1}`);
  
          // Modifying row id.
          $(this).attr('id', `R${dig - 1}`);
        });
  
        // Removing the current row.
        $(this).closest('tr').remove();
  
        // Decreasing total number of rows by 1.
        rowIdx--;
      });

      $('#tbodym').on('click', '.remove', function () {
  
        // Getting all the rows next to the row
        // containing the clicked button
        var child = $(this).closest('tr').nextAll();
  
        // Iterating across all the rows 
        // obtained to change the index
        child.each(function () {
  
          // Getting <tr> id.
          var id = $(this).attr('id');
  
          // Getting the <p> inside the .row-index class.
          var idx = $(this).children('.row-index').children('p');
  
          // Gets the row number from <tr> id.
          var dig = parseInt(id.substring(1));
  
          // Modifying row index.
          idx.html(`Row ${dig - 1}`);
  
          // Modifying row id.
          $(this).attr('id', `R${dig - 1}`);
        });
  
        // Removing the current row.
        $(this).closest('tr').remove();
  
        // Decreasing total number of rows by 1.
        rowIdx--;
      });
    });
  </script>
  <script type="text/javascript">
     $('#paper-table').on('click', 'a', function() {
  $(this).closest('tr').remove();

  //check if no more rows and remove the table
  if ($('#paper-table tbody tr').length == 0) {
    $('#paper-table').remove();
  }
});
  </script>
@include ('partials.bootstrap-table')
@stop
