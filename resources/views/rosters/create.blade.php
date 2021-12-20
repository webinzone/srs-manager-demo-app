@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
    @can('create', \App\Models\Roster::class)
        <a href="{{ route('rosters.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;left: 20px;"> Back</a>
        <a href="/previous" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Same As Previous</a>
        
        
    @endcan
@stop

@section('inputFields')

{{-- Page content --}}


@section('content')
<div id="webui">
  
  <div class="row">
      <!-- col-md-8 -->
      <div class=" col-md-12" style="padding-left: 30px;">

        <form id="create-form" class="form-horizontal" method="post" action="{{ route('rosters.store') }}"  style="width: 1150px; align-items: center;   background-color: #fff; " autocomplete="off" role="form" >
                 {{ csrf_field() }}

          <!-- box -->
          <div class="box box-default" style="width: 1000px;">
              <!-- box-header -->
             <!-- box-header -->

              <div class="box-header with-border text-center">
                 <h3><b>Staff Roster</b></h3>

                   
                </div><!-- /.box-header -->

              <!-- box-body -->
       <div class="box-body" style="padding-left: 20px;padding-right: 0px;width: 1000px;">                      


      
        <div class="form-row" style="padding-bottom:30px;width: 1000px;">
          <div class="col-md-3 mb-3">
              <label for="name" >From</label>
              <input type="date" name="p_from" id="p_from" placeholder="From" class="form-control" >
             </div>
               <div class="col-md-3 mb-3" >
              <label for="name" >To</label>
                        <input type="date" name="p_to" id="p_to" placeholder="To" class="form-control" >                            

             </div>
                     
              <div class="col-md-3 mb-3">
              <label for="name" >Manager</label>
                <select class="form-control" required=""  name="mngr" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}"> {{ $emp->name }}</option>
                          @endforeach
                        </select>
             </div>
                 <div class="col-md-3 mb-3">
              <label for="name" >Acting Manager</label>
                    <select class="form-control" required=""  name="a_mngr" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}"> {{ $emp->name }}</option>
                          @endforeach
                        </select>
      
            </div>
          </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="form-row" style="padding-bottom:30px;width: 1000px">

            <div class="col-md-3 mb-3">
              <label for="name" >Complaint Officer</label>
              <select class="form-control" required=""  name="c_oofr" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}"> {{ $emp->name }}</option>
                          @endforeach
                        </select>
             </div>
              <div class="col-md-3 mb-3" >
                 <label for="name" >Prop</label>
                <input type="text" name="prop" id="prop" placeholder="Prop" class="form-control" >                            

             </div>
                 <div class="col-md-3 mb-3">
                  <label for="name" >Facility Manager</label>
                     <select class="form-control" required=""  name="faci" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}"> {{ $emp->name }}</option>
                          @endforeach
                        </select>    
            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
           <div  class="form-row" style="padding-bottom:30px;width: 1100px">
              <div class="table-responsive">
                <button style="float: right;bottom: 50px; " class="btn  btn-primary text-right" 
                  id="addBtn" type="button">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </button><br>
                  <table class="table table-bordered" width="1000px;">
                    <thead>
                      <tr>
                        <th class="text-center" width="100px;">Emp </th>
                        <th class="text-center" width="100px;">Role</th>
                        <th class="text-center">Sun</th>
                        <th class="text-center">Mon</th>
                        <th class="text-center">Tue</th>
                        <th class="text-center">Wed</th>
                        <th class="text-center">Thu</th>
                        <th class="text-center">Fri</th>
                        <th class="text-center">Sat</th>
                        <th class="text-center">Total Hours</th>                                   
                      </tr>
                    </thead>
                    <tbody id="tbody">
              
                    </tbody>
                  </table>
                </div>
                
              </div>
            <div id="fieldList" style="padding-bottom: 20px;padding-top: 20px;">
            </div>
         
        
               
                    

                               
             <div class="box-footer text-right" style="">
              <br><br><a class="btn btn-link text-left" href="{{ route('rosters.index') }}">Cancel</a>
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
                $('#stf').val(response.nok_st);
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

  <script>
    $(document).ready(function () {
  
      // Denotes total number of rows
      var rowIdx = 0;
  
      // jQuery button click event to add a row
      $('#addBtn').on('click', function () {
  
        // Adding a row inside the tbody.
        $('#tbody').append(`<tr id="R${++rowIdx}">
             <td class="row-index text-center">
             <select class="form-control" style="height: 26px;padding: 3px 10px;" id="e_name" name="e_name[]">
                           <option>Emp</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}"> {{ $emp->name }}</option>
                          @endforeach
                        </select>
             </td>
             <td class="row-index text-center">
             <select class="form-control" style="height: 26px;padding: 3px 10px;" id="e_name" name="e_pos[]">
                  <option>Role</option>
                @foreach($emps as $emp)
                <option value="{{ $emp->posi }}"> {{ $emp->posi }}</option>
                @endforeach
              </select>
             
             </td>
             <td class="row-index text-center" width="100px;">
             <input type="text" placeholder="From"  onfocus="(this.type='time')" id="start" name="sun[]">
             <input type="text" placeholder="To"  onfocus="(this.type='time')" id="end" name="sunto[]" >

             </td>
             <td class="row-index text-center">
             <input type="text" placeholder="From"  onfocus="(this.type='time')" id="start2" name="mon[]"  >
             <input type="text" placeholder="to"  onfocus="(this.type='time')" id="end2" name="monto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" placeholder="From"  onfocus="(this.type='time')" id="start3" name="tue[]"  >
             <input type="text" placeholder="to"  onfocus="(this.type='time')" id="end3" name="tueto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" placeholder="From"  onfocus="(this.type='time')" id="start4" name="wed[]"  >
             <input type="text" placeholder="To"  onfocus="(this.type='time')" id="end4" name="wedto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" placeholder="From"  onfocus="(this.type='time')" id="start5" name="thu[]"  >
             <input type="text" placeholder="To"  onfocus="(this.type='time')" id="end5" name="thuto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" placeholder="From"  onfocus="(this.type='time')" id="start6" name="fri[]"  >
             <input type="text" placeholder="To"  onfocus="(this.type='time')" id="end6" name="frito[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" placeholder="From"  onfocus="(this.type='time')" id="start7" name="sat[]"  >
             <input type="text" placeholder="To"  onfocus="(this.type='time')" id="end7" name="satto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" name="tot_hr[]" id="tot" readonly>
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
 
  <script>
var start = document.getElementById("start").value;
var end = document.getElementById("end").value;

document.getElementById("start").onchange = function() {diff(start,end)};
document.getElementById("end").onchange = function() {diff(start,end)};


function diff(start, end) {
    start = document.getElementById("start").value; //to update time value in each input bar
    end = document.getElementById("end").value; //to update time value in each input bar
    
    start = start.split(":");
    end = end.split(":");
    var startDate = new Date(0, 0, 0, start[0], start[1], 0);
    var endDate = new Date(0, 0, 0, end[0], end[1], 0);
    var diff = endDate.getTime() - startDate.getTime();
    var hours = Math.floor(diff / 1000 / 60 / 60);
    diff -= hours * 1000 * 60 * 60;
    var minutes = Math.floor(diff / 1000 / 60);

    return (hours < 9 ? "0" : "") + hours + ":" + (minutes < 9 ? "0" : "") + minutes;
}

setInterval(function(){document.getElementById("diff").value = diff(start, end);}, 1000); //to update time every second (1000 is 1 sec interval and function encasing original code you had down here is because setInterval only reads functions) You can change how fast the time updates by lowering the time interval
</script>


@include ('partials.bootstrap-table')
@stop
