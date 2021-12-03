@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop
@section('header_right')
  <a href="{{ route('rosters.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
@stop

{{-- Page content --}}
@section('content')

<div id="webui">
  
  <div class="row">
      <!-- col-md-8 -->
      <div class=" col-md-12" style="padding-left: 30px;">

          
         <form id="create-form" class="form-horizontal" method="post" action = "{{ route ('rosters.update', $roster->id) }}" style="width: 1150px; align-items: center;   background-color: #fff; " autocomplete="off" role="form" >
            @method('PATCH') 

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
              <input type="date" name="p_from" id="p_from" placeholder="From" value="{{ $roster->p_from }}" class="form-control" >
             </div>
               <div class="col-md-3 mb-3" >
              <label for="name" >To</label>
                        <input type="date" name="p_to" id="p_to" placeholder="To" value="{{ $roster->p_to }}" class="form-control" >                            

             </div>
                     
              <div class="col-md-3 mb-3">
              <label for="name" >Manager</label>
                <select class="form-control" required=""  name="mngr" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}" {{ $roster->mngr == $emp->name ? 'selected' : '' }}>{{ $emp->name }}</option>
                          @endforeach
                        </select>
             </div>
                 <div class="col-md-3 mb-3">
              <label for="name" >Acting Manager</label>
                    <select class="form-control" required=""  name="a_mngr" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Staff Name  --</option>
                         @foreach($emps as $emp)
                          <option value="{{ $emp->name }}" {{ $roster->a_mngr == $emp->name ? 'selected' : '' }}>{{ $emp->name }}</option>
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
                          <option value="{{ $emp->name }}" {{ $roster->c_oofr == $emp->name ? 'selected' : '' }}>{{ $emp->name }}</option>
                          @endforeach
                        </select>
             </div>
              <div class="col-md-3 mb-3" >
                 <label for="name" >Prop</label>
                <input type="text" name="prop" id="prop" placeholder="Prop" value="{{ $roster->prop }}" class="form-control" >                            

             </div>
                 <div class="col-md-3 mb-3">
                  <label for="name" >Facility Manager</label>
                     <select class="form-control" required=""  name="faci" style="height: 26px;padding: 3px 10px;">
                            <option>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}" {{ $roster->faci == $emp->name ? 'selected' : '' }}>{{ $emp->name }}</option>
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
                  <table class="table table-bordered" id="paper-table">
                                <thead>
                                  <tr>
                                    <th class="text-center">Emp</th>
                                    <th class="text-center">Role</th>
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
                                    @for ($i=0; $i < $num; $i++)

                                <tbody id="tbodym">
                                    <tr id="R{$i}">
                                         <td class="row-index text-center">
             <select class="form-control" style="height: 26px;padding: 3px 10px;" id="e_name" name="e_name[]">
                           <option>Emp</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}" {{ $roster->e_name == $emp->name ? 'selected' : '' }}>{{ $emp->name }}</option>
                          @endforeach
                        </select>
             </td>
             <td class="row-index text-center">
             <select class="form-control" style="height: 26px;padding: 3px 10px;" id="e_name" name="e_pos[]">
                  <option>Role</option>
                @foreach($emps as $emp)
               <option value="{{ $emp->posi }}" {{ $roster->e_pos == $emp->posi ? 'selected' : '' }}>{{ $emp->posi }}</option>
                @endforeach
              </select>
             
             </td>
             <td class="row-index text-center" width="100px;">
             <input type="text" placeholder="From" value="{{  $sun[$i] }}"  onfocus="(this.type='time')" id="start" name="sun[]">
             <input type="text" placeholder="To" value="{{  $sunto[$i] }}"  onfocus="(this.type='time')" id="end" name="sunto[]" >

             </td>
             <td class="row-index text-center">
             <input type="text" placeholder="From"  value="{{  $mon[$i] }}" onfocus="(this.type='time')" id="time" name="mon[]"  >
             <input type="text" placeholder="to" value="{{  $monto[$i] }}"  onfocus="(this.type='time')" id="time" name="monto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" placeholder="From"  value="{{  $tue[$i] }}" onfocus="(this.type='time')" id="time" name="tue[]"  >
             <input type="text" placeholder="to" value="{{  $tueto[$i] }}"  onfocus="(this.type='time')" id="time" name="tueto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" placeholder="From" value="{{  $wed[$i] }}"  onfocus="(this.type='time')" id="time" name="wed[]"  >
             <input type="text" placeholder="To" value="{{  $wedto[$i] }}"  onfocus="(this.type='time')" id="time" name="wedto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" placeholder="From" value="{{  $thu[$i] }}"  onfocus="(this.type='time')" id="time" name="thu[]"  >
             <input type="text" placeholder="To" value="{{  $thuto[$i] }}"  onfocus="(this.type='time')" id="time" name="thuto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" placeholder="From" value="{{  $fri[$i] }}"  onfocus="(this.type='time')" id="time" name="fri[]"  >
             <input type="text" placeholder="To" value="{{  $frito[$i] }}"  onfocus="(this.type='time')" id="time" name="frito[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" placeholder="From" value="{{  $sat[$i] }}"  onfocus="(this.type='time')" id="time" name="sat[]"  >
             <input type="text" placeholder="To" value="{{  $satto[$i] }}"  onfocus="(this.type='time')" id="time" name="satto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" name="tot_hr[]"  value="{{  $tot_hr[$i] }}" >
             </td>
                                      <tr>                           
                                </tbody>
                                @endfor
                    <tbody id="tbody">
              
                    </tbody>
                  </table>
                </div>
                
              </div>
            <div id="fieldList" style="padding-bottom: 20px;padding-top: 20px;">
            </div>
                
                      <!--<div class="col-md-4 mb-3">
                        <label for="name" >Location Id</label>
                        <select class="form-control" style="height: 26px;padding: 3px 10px;" required="" name="location_id" id="location_id">
                            <option>--Select Location Id --</option>
                        </select>
                      </div>-->
                    
                    
                    <br><br>

                    <br><br>
                     <div class="box-footer text-right" style="">
                        <br><br><a class="btn btn-link text-left" href="{{ route('rosters.index') }}">Cancel</a>
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
                $('#stf11').val(response.nok_st);
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
             <input type="text" placeholder="From"  onfocus="(this.type='time')" id="time" name="mon[]"  >
             <input type="text" placeholder="to"  onfocus="(this.type='time')" id="time" name="monto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" placeholder="From"  onfocus="(this.type='time')" id="time" name="tue[]"  >
             <input type="text" placeholder="to"  onfocus="(this.type='time')" id="time" name="tueto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" placeholder="From"  onfocus="(this.type='time')" id="time" name="wed[]"  >
             <input type="text" placeholder="To"  onfocus="(this.type='time')" id="time" name="wedto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" placeholder="From"  onfocus="(this.type='time')" id="time" name="thu[]"  >
             <input type="text" placeholder="To"  onfocus="(this.type='time')" id="time" name="thuto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" placeholder="From"  onfocus="(this.type='time')" id="time" name="fri[]"  >
             <input type="text" placeholder="To"  onfocus="(this.type='time')" id="time" name="frito[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" placeholder="From"  onfocus="(this.type='time')" id="time" name="sat[]"  >
             <input type="text" placeholder="To"  onfocus="(this.type='time')" id="time" name="satto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" name="tot_hr[]"  >
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
