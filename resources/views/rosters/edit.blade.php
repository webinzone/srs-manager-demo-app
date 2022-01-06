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
<style type="text/css">

  table, td, th {
    border: 1px solid black;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  

   td {
    width: 200px;
  }
  
  </style>

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
                <input type="hidden" name="diff" id="diff">
                  <table class="table table-striped" id="paper-table">
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
             <select class="form-control"  style="height: 26px;padding: 3px 10px;width:120px;" id="e_name" name="e_name[]">
                           <option>Emp</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}" {{ $roster->e_name == $emp->name ? 'selected' : '' }}>{{ $emp->name }}</option>
                          @endforeach
                        </select>
             </td>
             <td class="row-index text-center">
             <select class="form-control" style="height: 26px;padding: 3px 10px;width:120px;" id="e_name" name="e_pos[]">
                  <option>Role</option>
                @foreach($emps as $emp)
               <option value="{{ $emp->posi }}" {{ $roster->e_pos == $emp->posi ? 'selected' : '' }}>{{ $emp->posi }}</option>
                @endforeach
              </select>
             
             </td>
             <td class="row-index text-center">
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="From" value="{{  $sun[$i] }}"  onfocus="(this.type='time')" id="start" name="sun[]">
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="To" value="{{  $sunto[$i] }}"  onfocus="(this.type='time')" id="end" name="sunto[]" >

             </td>
             <td class="row-index text-center">
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="From"  value="{{  $mon[$i] }}" onfocus="(this.type='time')" id="time" name="mon[]"  >
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="to" value="{{  $monto[$i] }}"  onfocus="(this.type='time')" id="time" name="monto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="From"  value="{{  $tue[$i] }}" onfocus="(this.type='time')" id="time" name="tue[]"  >
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="to" value="{{  $tueto[$i] }}"  onfocus="(this.type='time')" id="time" name="tueto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="From" value="{{  $wed[$i] }}"  onfocus="(this.type='time')" id="time" name="wed[]"  >
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="To" value="{{  $wedto[$i] }}"  onfocus="(this.type='time')" id="time" name="wedto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="From" value="{{  $thu[$i] }}"  onfocus="(this.type='time')" id="time" name="thu[]"  >
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="To" value="{{  $thuto[$i] }}"  onfocus="(this.type='time')" id="time" name="thuto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="From" value="{{  $fri[$i] }}"  onfocus="(this.type='time')" id="time" name="fri[]"  >
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="To" value="{{  $frito[$i] }}"  onfocus="(this.type='time')" id="time" name="frito[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="From" value="{{  $sat[$i] }}"  onfocus="(this.type='time')" id="time" name="sat[]"  >
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="To" value="{{  $satto[$i] }}"  onfocus="(this.type='time')" id="time" name="satto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" style="height: 26px;padding: 3px 10px;width:70px;" name="tot_hr[]"  value="{{  $tot_hr[$i] }}" >
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
                        <button type="submit" id="calc1" class="btn btn-primary"><i class="fa fa-check icon-white" aria-hidden="true" ></i> Save</button>
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
             <select class="form-control" style="height: 26px;padding: 3px 10px;width:120px;" id="e_name" name="e_name[]">
                           <option>Emp</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}"> {{ $emp->name }}</option>
                          @endforeach
                        </select>
             </td>
             <td class="row-index text-center">
             <select class="form-control" style="height: 26px;padding: 3px 10px;width:120px;" id="e_name" name="e_pos[]">
                  <option>Role</option>
                @foreach($emps as $emp)
                <option value="{{ $emp->posi }}"> {{ $emp->posi }}</option>
                @endforeach
              </select>
             
             </td>
             <td class="row-index text-center">
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="From"  onfocus="(this.type='time')" id="start" name="sun[]">
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="To"  onfocus="(this.type='time')" id="end" name="sunto[]" >

             </td>
             <td class="row-index text-center">
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="From"  onfocus="(this.type='time')" id="time" name="mon[]"  >
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="to"  onfocus="(this.type='time')" id="time" name="monto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="From"  onfocus="(this.type='time')" id="time" name="tue[]"  >
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="to"  onfocus="(this.type='time')" id="time" name="tueto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="From"  onfocus="(this.type='time')" id="time" name="wed[]"  >
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="To"  onfocus="(this.type='time')" id="time" name="wedto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="From"  onfocus="(this.type='time')" id="time" name="thu[]"  >
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="To"  onfocus="(this.type='time')" id="time" name="thuto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="From"  onfocus="(this.type='time')" id="time" name="fri[]"  >
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="To"  onfocus="(this.type='time')" id="time" name="frito[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="From"  onfocus="(this.type='time')" id="time" name="sat[]"  >
             <input type="text" style="height: 26px;padding: 3px 10px;width:100px;" placeholder="To"  onfocus="(this.type='time')" id="time" name="satto[]"  >
             </td>
             <td class="row-index text-center">
             <input type="text" style="height: 26px;padding: 3px 10px;width:70px;" name="tot_hr[]"  >
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

  <script>
  $('#calc1').on('click', function () {

        var tot_hours1 = new Array();
        var tot_minutes1 = new Array();
        var tot_hours2 = new Array();
        var tot_minutes2 = new Array();
        var tot_hours3 = new Array();
        var tot_minutes3 = new Array();
        var tot_hours4 = new Array();
        var tot_minutes4 = new Array();
        var tot_hours5 = new Array();
        var tot_minutes5 = new Array();
        var tot_hours6 = new Array();
        var tot_minutes6 = new Array();
        var tot_hours7 = new Array();
        var tot_minutes7 = new Array();
        var total_hr = new Array();

        var sun = document.getElementsByName('sun[]');
        var sunto = document.getElementsByName('sunto[]');
        var hours = [];
        var minutes = [];
        
        for (var i = 0; i <sun.length; i++) {
        var suninp=sun[i];
        var suntoinp=sunto[i];
       
    var timeOfCall = suninp.value,
        timeOfResponse = suntoinp.value,
        hours = timeOfResponse.split(':')[0] - timeOfCall.split(':')[0],
        minutes = timeOfResponse.split(':')[1] - timeOfCall.split(':')[1];
        
        minutes = minutes.toString().length<2?'0'+minutes:minutes;
        if(minutes<0){ 
            hours--;
            minutes = 60 + minutes;
        }
        hours = hours.toString().length<2?'0'+hours:hours;

       
        tot_hours1.push(hours);
        if (isNaN(minutes)) {
             minutes = 0;
         }
        tot_minutes1.push(minutes);
        }
        
        var mon = document.getElementsByName('mon[]');
        var monto = document.getElementsByName('monto[]');
        for (var i = 0; i <mon.length; i++) {
        var moninp=mon[i];
        var montoinp=monto[i];
       
        var timeOfCall2 = moninp.value,
        timeOfResponse2 = montoinp.value,
        hours2 = timeOfResponse2.split(':')[0] - timeOfCall2.split(':')[0],
        minutes2 = timeOfResponse2.split(':')[1] - timeOfCall2.split(':')[1];
    
        minutes2 = minutes2.toString().length<2?'0'+minutes2:minutes2;
        if(minutes2<0){ 
            hours2--;
            minutes2 = 60 + minutes2;
        }
        hours2 = hours2.toString().length<2?'0'+hours2:hours2;

       
        tot_hours2.push(hours2);
        if (isNaN(minutes2)) {
             minutes2 = 0;
         }
        tot_minutes2.push(minutes2);
        }
     
        var tue = document.getElementsByName('tue[]');
        var tueto = document.getElementsByName('tueto[]');
        for (var i = 0; i <tue.length; i++) {
        var tueinp=tue[i];
        var tuetoinp=tueto[i];
       
        var timeOfCall3 = tueinp.value,
        timeOfResponse3 = tuetoinp.value,
        hours3 = timeOfResponse3.split(':')[0] - timeOfCall3.split(':')[0],
        minutes3 = timeOfResponse3.split(':')[1] - timeOfCall3.split(':')[1];
    
        minutes3 = minutes3.toString().length<2?'0'+minutes3:minutes3;
        if(minutes3<0){ 
            hours3--;
            minutes3 = 60 + minutes3;
        }
        hours3 = hours3.toString().length<2?'0'+hours3:hours3;
       
        tot_hours3.push(hours3);
        if (isNaN(minutes3)) {
             minutes3 = 0;
         }
        tot_minutes3.push(minutes3);
        }

        var wed = document.getElementsByName('wed[]');
        var wedto = document.getElementsByName('wedto[]');
        for (var i = 0; i <wed.length; i++) {
        var wedinp=wed[i];
        var wedtoinp=wedto[i];
       
        var timeOfCall4 = wedinp.value,
        timeOfResponse4 = wedtoinp.value,
        hours4 = timeOfResponse4.split(':')[0] - timeOfCall4.split(':')[0],
        minutes4 = timeOfResponse4.split(':')[1] - timeOfCall4.split(':')[1];
    
        minutes4 = minutes4.toString().length<2?'0'+minutes4:minutes4;
        if(minutes4<0){ 
            hours4--;
            minutes4 = 60 + minutes4;
        }
        hours4 = hours4.toString().length<2?'0'+hours4:hours4;
           
        tot_hours4.push(hours4);
        if (isNaN(minutes4)) {
             minutes4 = 0;
         }
        tot_minutes4.push(minutes4);
        }


        var thu = document.getElementsByName('thu[]');
        var thuto = document.getElementsByName('thuto[]');
        for (var i = 0; i <thu.length; i++) {
        var thuinp=thu[i];
        var thutoinp=thuto[i];
       
        var timeOfCall5 = thuinp.value,
        timeOfResponse5 =  thutoinp.value,
            hours5 = timeOfResponse5.split(':')[0] - timeOfCall5.split(':')[0],
        minutes5 = timeOfResponse5.split(':')[1] - timeOfCall5.split(':')[1];
    
        minutes5 = minutes5.toString().length<2?'0'+minutes5:minutes5;
        if(minutes5<0){ 
            hours5--;
            minutes5 = 60 + minutes5;
        }
        hours5 = hours5.toString().length<2?'0'+hours5:hours5;
               
        tot_hours5.push(hours5);
        if (isNaN(minutes5)) {
             minutes5 = 0;
         }
        tot_minutes5.push(minutes5);
        }

        var fri = document.getElementsByName('fri[]');
        var frito = document.getElementsByName('frito[]');
        for (var i = 0; i <fri.length; i++) {
        var friinp=fri[i];
        var fritoinp=frito[i];
       
        var timeOfCall6 = friinp.value,
        timeOfResponse6 =  fritoinp.value,
            hours6 = timeOfResponse6.split(':')[0] - timeOfCall6.split(':')[0],
        minutes6 = timeOfResponse6.split(':')[1] - timeOfCall6.split(':')[1];
    
        minutes6 = minutes6.toString().length<2?'0'+minutes6:minutes6;
        if(minutes6<0){ 
            hours6--;
            minutes6 = 60 + minutes6;
        }
        hours6 = hours6.toString().length<2?'0'+hours6:hours6;
               
        tot_hours6.push(hours6);
        if (isNaN(minutes6)) {
             minutes6 = 0;
         }
        tot_minutes6.push(minutes6);
        }

        var sat = document.getElementsByName('sat[]');
        var satto = document.getElementsByName('satto[]');
        for (var i = 0; i <sat.length; i++) {
        var satinp=sat[i];
        var sattoinp=satto[i];
       
        var timeOfCall7 = satinp.value,
        timeOfResponse7 =  sattoinp.value,
            hours7 = timeOfResponse7.split(':')[0] - timeOfCall7.split(':')[0],
        minutes7 = timeOfResponse7.split(':')[1] - timeOfCall7.split(':')[1];
    
        minutes7 = minutes7.toString().length<2?'0'+minutes7:minutes7;
        if(minutes7<0){ 
            hours7--;
            minutes7 = 60 + minutes7;
        }
        hours7 = hours7.toString().length<2?'0'+hours7:hours7;
               
        tot_hours7.push(hours7);
        if (isNaN(minutes7)) {
             minutes7 = 0;
         }
        tot_minutes7.push(minutes7);
        }

        for (var i = 0; i <tot_hours1.length; i++) {

         tot_hours = parseInt(tot_hours1[i])+parseInt(tot_hours2[i])+parseInt(tot_hours3[i])+parseInt(tot_hours4[i])+parseInt(tot_hours5[i])+parseInt(tot_hours6[i])+parseInt(tot_hours7[i]),
        tot_minutes = parseInt(tot_minutes1[i])+parseInt(tot_minutes2[i])+parseInt(tot_minutes3[i])+parseInt(tot_minutes4[i])+parseInt(tot_minutes5[i])+parseInt(tot_minutes6[i])+parseInt(tot_minutes7[i]);

        tot_minutes = tot_minutes.toString().length<2?'0'+tot_minutes:tot_minutes;
        if(tot_minutes<0){ 
            tot_hours--;
            tot_minutes = 60 + tot_minutes;
        }
        tot_hours = tot_hours.toString().length<2?'0'+tot_hours:tot_hours;
        
        
        total_hr.push(tot_hours + ':' + tot_minutes); 
        //total_hr = tot_hours + ':' + tot_minutes;   


        }
        //for (var i = 0; i <total_hr.length; i++) {
            //document.getElementsByName("tot_hr")[i].value = total_hr[i];
        //}

        $('#diff').val(total_hr);

    });
  
  </script>

@include ('partials.bootstrap-table')
@stop
