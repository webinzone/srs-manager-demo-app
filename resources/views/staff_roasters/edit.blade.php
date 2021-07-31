
@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop
@section('header_right')
  <a href="{{ route('staff_roasters.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
@stop

{{-- Page content --}}
@section('content')
<style type="text/css">
      table, td, th {
    border: 1px solid black;
    padding: 10px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    padding: 10px;
  }
</style>
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class=" col" style="padding-left: 100px;">


          
         <form id="create-form" class="form-horizontal" method="post" action = "{{ route ('staff_roasters.update', $staff_roaster->id) }}" style="width: 1050px; align-items: center;   background-color: #fff; "  autocomplete="off" role="form" >
            @method('PATCH') 

                 {{ csrf_field() }}
              <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
               <!-- box-header -->
              <div class="box-header with-border text-center">
                 <h3><b>Staff Roaster</b></h3>
                   
                </div><!-- /.box-header -->


                <!-- box-body -->
      <div class="box-body">
              
                    
                        <div class="table-responsive">
                            <button style="float: right;bottom: 50px; " class="btn  btn-primary text-right" 
                              id="addBtn" type="button">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button><br>
                              <table id="paper-table">
                                <thead>
                                  <tr>
                                    <td colspan="10" align="center" style="padding-top: 5px;font-size: 16px;"><br><b>Meadowbrook- Roster</b></td>
                                    <td colspan="4" style="">Date&nbsp;&nbsp;<input type="date" name="s_date" value="{{ $staff_roaster->s_date}}">
                                    </td>
                                  </tr>
                                  <tr>
                                    <th class="text-center">Properitor/PD</th>
                                    <th class="text-center">Proposed time</th>
                                    <th class="text-center">Monday</th>
                                    <th class="text-center">Tuesday</th>
                                    <th class="text-center">Wednesday</th>
                                    <th class="text-center">Thursday</th>
                                    <th class="text-center">Friday</th>
                                    <th class="text-center">Saturday</th>
                                    <th class="text-center">Sunday</th>
                                    <th class="text-center">Staff</th>
                                    <th class="text-center">Init</th>
                                    <th class="text-center">Task</th>
                                    <th class="text-center">Total Hrs</th>
                                    <th class="text-center">Action</th>                                   
                                  </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i <= $num; $i++)
                                    <tr>
                                    <td class="row-index text-center">
                                     <input value="{{ $staff_roaster->position[$i]}} name="position"  type="text" >
                                     </td>
                                     <td class="row-index text-center">
                                     <input value="{{ $staff_roaster->pr_time[$i]}} name="pr_time" type="text" >
                                     </td>
                                     <td class="row-index text-center">
                                     <input value="{{ $staff_roaster->mon[$i]}} name="mon" type="text" >
                                     </td>
                                     <td class="row-index text-center">
                                     <input value="{{ $staff_roaster->tues[$i]}} type="text" name="tues"  >
                                     </td>
                                     <td class="row-index text-center">
                                     <input value="{{ $staff_roaster->wed[$i]}} name="wed" type="text" >
                                     </td>
                                     <td class="row-index text-center">
                                     <input value="{{ $staff_roaster->thurs[$i]}} name="thurs" type="text" >
                                     </td>
                                     <td class="row-index text-center">
                                     <input value="{{ $staff_roaster->fri[$i]}} name="fri" type="text" >
                                     </td>
                                     <td class="row-index text-center">
                                     <input value="{{ $staff_roaster->sat[$i]}} name="sat" type="text" >
                                     </td>
                                     <td class="row-index text-center">
                                     <input value="{{ $staff_roaster->sun[$i]}} name="sun" type="text" >
                                     </td>
                                     <td class="row-index text-center">
                                     <input value="{{ $staff_roaster->s_name[$i]}} name="s_name" type="text" >
                                     </td>
                                     <td class="row-index text-center">
                                     <input value="{{ $staff_roaster->init[$i]}} name="init" type="text" >
                                     </td>
                                     <td class="row-index text-center">
                                     <input value="{{ $staff_roaster->task[$i]}} name="task" type="text" >
                                     </td>
                                     <td class="row-index text-center">
                                     <input value="{{ $staff_roaster->total_hrs[$i]}} name="total_hrs" type="text" >
                                     </td>
                                      <td class="text-center">
                                        
                                        <a style="height:20px;background-color:white;color:red;"  href="#" class="delete-row"><i class="fa fa-trash icon-white"></i></a>
                                        </td>
                                    </tr>
                                        @endfor
                                </tbody>


                                <tbody id="tbody">
                          
                                </tbody>
                              </table><br>
            <h6 ><b>CONTINGENCY STAFF</b></h6>
            <table style="border-color: white;">
                <td><input type="text" value="{{ $staff_roaster->con_1}}" name="con_1" id="con_1" class="form-control" placeholder="Staff"></td>
                <td><input type="text" value="{{ $staff_roaster->con_2}}" name="con_2" id="con_2" class="form-control" placeholder="Init"></td>
                <td><input type="text" value="{{ $staff_roaster->con_3}}" name="con_3" id="con_3" class="form-control" placeholder="Task">    </td>
            </table>
                 
                            
                          </div>
            
                    <div id="fieldList" style="padding-bottom: 20px;padding-top: 20px;">
                    </div>
                 
               
                    
                    

                                       
                     <div class="box-footer text-right" style="padding-right:80px;">
                        <br><br><a class="btn btn-link text-left" href="{{ route('staff_roasters.index') }}">Cancel</a>
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
            }
            else{
                alert("error");
            }
        }
    });
});
</script>

<script type="text/javascript">
    Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
})
    $(document).ready( function() {
    $('#res_date').val(new Date().toDateInputValue());
});
</script>
<script type="text/javascript">
    $('#company_id').change(function(){
    var id = $(this).val();
    var url = '{{ route("getLocation", ":id") }}';
    url = url.replace(':id', id);
    output = [];

    $.ajax({
        url: url,
        type: 'get',
        sync: false,
        dataType: 'json',
        success: function(response){
            if(response != null){
              // $('#location_id').val(response.location_id);
                 //response.location_id.forEach(location =>
                    //$('#location_id').append(`<option value="${location.location_id}">${location.//location_id}</option>`)
                //)
                 //alert("success");
                response.locations.forEach(location =>
                    output.push(`<option lue="${location.location_id}">${location.location_id}</option>`)
                    )
//$('#location_id').append(`<option lue="${location.location_id}">${location.location_id}</option>`)
//                
              $('#location_id').html(output.join(''));
            }
            else{
                alert("error");
            }
        }
    });
});
</script>
<script type="text/javascript">
    $(function() {
    output = [];
  $("#addMore").click(function(e) {
   // e.preventDefault();
   output.push(` &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="form-row"> <div class="col-md-2 mb-3" style="width: 90px;">  <input type="text" name="item_no[]" class="form-control" id="item_no" ></div>&nbsp;&nbsp;&nbsp;  <div class="col-md-3 mb-3" style="width: 150px;">  <input type="text" name="items[]" class="form-control" placeholder="Items"></div> &nbsp;&nbsp;&nbsp; <div class="col-md-2 mb-3"> <select name="owned_by[]" required class="form-control" style="height: 26px;padding: 3px 10px;">                             <option value="" style="font-size: 14px;">---Select--</option>                             <option value="O" style="font-size: 14px;">Resident</option>                            <option value="F" style="font-size: 14px;">Facility</option>                        </select>   </div>&nbsp;&nbsp;&nbsp;    <div class="col-md-2 mb-3">   <select name="res_cond[]" required class="form-control" style="height: 26px;padding: 3px 10px;">                             <option value="" style="font-size: 14px;">---Select--</option>                             <option value="P" style="font-size: 14px;">Poor</option>                             <option value="G" style="font-size: 14px;">Good</option>                             <option value="R" style="font-size: 14px;">In need of repair</option>          </select>                        </div>  <div class="col-md-2 mb-3" style="width: 200px;">    <input type="text" name="res_comments[]" class="form-control" placeholder="Resident Comments">  </div> <button style="height:20px;background-color:white;color:red;"  class="delete btn "><i class="fa fa-trash icon-white"></i></button></div>  `);
    $("#fieldList").html(output.join(''));
  });

  $("body").on("click", ".delete", function (e) {
   $(this).parent("div").remove();


});

});

</script>
  <script>
    $(document).ready(function () {
  
      // Denotes total number of rows
      var rowIdx = 0;
  
      // jQuery button click event to add a row
      $('#addBtn').on('click', function () {
  
        // Adding a row inside the tbody.
        $('#tbody').append(`<tr id="R${++rowIdx}">
             <td class="row-index text-center">
             <input name="position[]" type="text" >
             </td>
             <td class="row-index text-center">
             <input name="pr_time[]" type="text" >
             </td>
             <td class="row-index text-center">
             <input name="mon[]" type="text" >
             </td>
             <td class="row-index text-center">
             <input type="text" name="tues[]"  >
             </td>
             <td class="row-index text-center">
             <input name="wed[]" type="text" >
             </td>
             <td class="row-index text-center">
             <input name="thurs[]" type="text" >
             </td>
             <td class="row-index text-center">
             <input name="fri[]" type="text" >
             </td>
             <td class="row-index text-center">
             <input name="sat[]" type="text" >
             </td>
             <td class="row-index text-center">
             <input name="sun[]" type="text" >
             </td>
             <td class="row-index text-center">
             <input name="s_name[]" type="text" >
             </td>
             <td class="row-index text-center">
             <input name="init[]" type="text" >
             </td>
             <td class="row-index text-center">
             <input name="task[]" type="text" >
             </td>
             <td class="row-index text-center">
             <input name="total_hrs[]" type="text" >
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
