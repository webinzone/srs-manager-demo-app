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
        <div class=" col" style="padding-left: 100px;">


          
         <form id="create-form" class="form-horizontal" method="post" action = "{{ route ('rosters.update', $roster->id) }}" style="width: 1050px; align-items: center;   background-color: #fff; " autocomplete="off" role="form" >
            @method('PATCH') 

                 {{ csrf_field() }}
            <!-- box -->
             <div class="box box-default">
                <!-- box-header -->
               <!-- box-header -->
              <div class="box-header with-border text-center">
                 <h3><b>Roster</b></h3>
                   
                </div><!-- /.box-header -->

                </div><!-- /.box-header -->


                <!-- box-body -->
             <div class="box-body" style="padding-left: 50px;padding-right: 0px;">                       
          <div class="form-row" style="padding-bottom:30px;">
            <div class="col-md-6 mb-2" style="width: 90px;">
              <h3>Period</h3>
              <label for="name" >From</label>
                        <input type="text" name="p_from" id="p_from" placeholder="From" value="{{ $roster->p_from}}" class="form-control" >
             
             </div>
                      <div class="col-md-6 mb-2" style="width: 90px;">
              <label for="name" >To</label>
                        <input type="text" name="p_to" id="p_to" placeholder="To" value="{{ $roster->p_to}}" class="form-control" >                           

             </div>
           </div>
           <div class="form-row" style="padding-bottom:30px;">
                     
                      <div class="col-md-6 mb-3">
              <label for="name" >Manager</label>
                        <input type="text" name="mngr" id="mngr" placeholder="Manager" value="{{ $roster->mngr}}" class="form-control" >                           
             </div>
                 <div class="col-md-6 mb-3">
              <label for="name" >Acting Manager</label>
                         
                        <input type="text" name="a_mngr" id="a_mngr" placeholder="Acting Manager" value="{{ $roster->a_mngr}}" class="form-control" >
            </div>
          </div>
          <div class="form-row" style="padding-bottom:30px;">
                     
                      <div class="col-md-4 mb-3">
              <label for="name" >Complaint Officer</label>
                        <input type="text" name="c_oofr" id="c_oofr" placeholder="Complaint Officer" value="{{ $roster->c_oofr}}" class="form-control" >                           
             </div>
                 <div class="col-md-4 mb-3">
              <label for="name" >Prop</label>
                         
                        <input type="text" name="prop" id="prop" placeholder="Prop" value="{{ $roster->prop}}" class="form-control" >
            </div>
            <div class="col-md-4 mb-3">
              <label for="name" >Facility Manager</label>
                        <input type="text" name="faci" id="faci" placeholder="Facility Manager" value="{{ $roster->faci}}" class="form-control" >                           
             </div>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            

                   
                    <!--<div  class="form-row" style="padding-bottom:30px;">
                        @for ($i=0; $i < $num; $i++)
                        <div class="col-md-2 mb-3" style="width: 90px;">
                        <label for="name"  >Item No</label>
                        <input type="text" name="item_no[]" id="item_no"  class="form-control" value="{{ $item_no[$i] }}" >                                      
                       </div>
                        <div class="col-md-3 mb-3">
                        <label for="name" >Item / Furniture</label>
                        <input type="text" name="items[]" class="form-control" value="{{  $items[$i] }}">                                     
                       </div>
                       <div class="col-md-2 mb-3">
                        <label for="name" >Owned By</label>
                         <select name="owned_by[]" class="form-control" style="height: 26px;padding: 3px 10px;"> 
                            <option value="O" style="font-size: 14px;" {{ $owned_by[$i] == 'O' ? 'selected' : ''  }}>Resident</option> 
                            <option value="F" style="font-size: 14px;" {{ $owned_by[$i] == 'F' ? 'selected' : ''  }}>Facility</option> 
                        </select>
                       </div>
                    
                      <div class="col-md-2 mb-3">
                        <label for="name" >Condition</label>
                            
                         <select name="res_cond[]"  class="form-control" style="height: 26px;padding: 3px 10px;"> 
                            <option value="P" style="font-size: 14px;" {{ $res_cond[$i] == 'P' ? 'selected' : ''  }}>Poor</option> 
                            <option value="G" style="font-size: 14px;" {{ $res_cond[$i] == 'G' ? 'selected' : ''  }}>Good</option> 
                            <option value="R" style="font-size: 14px;" {{ $res_cond[$i] == 'R' ? 'selected' : ''  }}>In need of repair</option> 

                        </select>
                       </div>
                      
                        <div class="col-md-3 mb-3"  style="width: 200px;">
                        <label for="name" >Comments/Description</label>
                        <input type="text" name="res_comments[]"  class="form-control" value="{{ $res_comments[$i] }}">                                      
                      </div> 
                         @endfor 
                      &nbsp;&nbsp;<div class="col-md-4 mb-3" style="width: 50px;padding-top: 6px;left: 24px;">
                      <br>
                      <button style="color:white; background-color:#23536f; top: 5px;" id="addMore">+</button> 
                  </div>
                   
                    </div>      -->

                    <!--  <div class="col-md-4 mb-3">
                    <div class="form-row">
                                  
                      
                      <div class="col-md-4 mb-3">
                        <label for="name" >Resident Sign</label>
                        <input type="text" name="res_sign" class="form-control" placeholder="Resident Sign">                                        
                       </div>
                    </div>--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>-->
                    <!--a<div class="form-row">
                       
                    <div class="col-md-4 mb-3">
                        <label for="name" >Staff Sign</label>
                        <input type="text" name="st_sign" class="form-control" placeholder="Staff Sign">                                        
                       </div>-->
                     
                    <!-- <div class="col-md-4 mb-3">
                        <label for="name" >Company Id</label>
                    
                         <select class="form-control" style="height: 26px;padding: 3px 10px;" required="" name="company_id" id="company_id">
                            <option>--Select Company ID --</option>
                          @foreach($companies as $company)
                          <option value="{{ $company->company_id }}" >{{ $company->company_id }}</option>
                          @endforeach
                        </select>                                   
                      </div>-
                    
                    </div>-->

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
                                    <th width="65px;" class="text-center"><select class="form-control" style="height: 26px;padding: 3px 10px;" id="e_name" name="e_name">
                            <option>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}"> {{ $emp->name }}</option>
                          @endforeach
                        </select></th>
                        <th width="150px;" class="text-center">Role</th>
                        <th class="text-center">Sun</th>
                        <th class="text-center">Mon No</th>
                        <th class="text-center">Tues</th>
                        <th class="text-center">Wed</th>
                        <th class="text-center">Thurs</th>
                        <th class="text-center">Fri</th>
                        <th class="text-center">Satur</th>
                        <th class="text-center">Total Hour</th>                                    
                                  </tr>
                                </thead>
                                    @for ($i=0; $i < $num; $i++)

                                <tbody id="tbodym">
                                    <tr id="R{$i}">
                                      <td class="row-index text-center">
                                         <input type="text" name="e_name[]" value="{{  $e_name[$i] }}" >
                                         </td>
                                      <td class="row-index text-center">
                                         <input type="text" name="e_pos[]" value="{{  $e_pos[$i] }}" >
                                         </td>
                                         <td class="row-index text-center">
                                         <input name="sun[]" type="text" value="{{  $sun[$i] }}">
                                         </td>
                                         <td class="row-index text-center">
                                          <input type="text" name="mon[]"  class="form-control" value="{{ $mon[$i] }}">                                      
                                         </td>
                                         <td class="row-index text-center">
                                         <input name="tue[]" type="text" value="{{  $tue[$i] }}">
                                         </td>
                                         <td class="row-index text-center">
                                         <input name="wed[]" type="text" value="{{  $wed[$i] }}">
                                         </td>
                                         <td class="row-index text-center">
                                         <input name="thu[]" type="text" value="{{  $thu[$i] }}">
                                         </td>
                                         <td class="row-index text-center">
                                         <input name="fri[]" type="text" value="{{  $fri[$i] }}">
                                         </td>
                                         <td class="row-index text-center">
                                         <input name="sat[]" type="text" value="{{  $sat[$i] }}">
                                         </td>
                                         <td class="row-index text-center">
                                         <input name="tot_hr[]" type="text" value="{{  $tot_hr[$i] }}">
                                         </td>
                                         <td>
                                            <!--<a style="height:20px;background-color:white;color:red;padding-left: 20px;"  class="btn " href="{{ route('getRow', [$roster->id, 'val' => $i]) }}"><i class="fa fa-trash icon-white"></i></a>-->
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

<script type="text/javascript">
    $(function() {
    output = [];
  $("#addMore").click(function(e) {
   // e.preventDefault();
   output.push(` &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="form-row"> <div class="col-md-2 mb-3" style="width: 90px;">  <input type="text" name="item_no[]" class="form-control" id="item_no" ></div>&nbsp;&nbsp;&nbsp;  <div class="col-md-3 mb-3" >  <input type="text" name="items[]" class="form-control" placeholder="Items"></div> &nbsp;&nbsp;&nbsp; <div class="col-md-2 mb-3"> <select name="owned_by[]" required class="form-control" style="height: 26px;padding: 3px 10px;">                             <option value="" style="font-size: 14px;">---Select--</option>                             <option value="O" style="font-size: 14px;">Resident</option>                            <option value="F" style="font-size: 14px;">Facility</option>                        </select>   </div>&nbsp;&nbsp;&nbsp;    <div class="col-md-2 mb-3">   <select name="res_cond[]" required class="form-control" style="height: 26px;padding: 3px 10px;">                             <option value="" style="font-size: 14px;">---Select--</option>                             <option value="P" style="font-size: 14px;">Poor</option>                             <option value="G" style="font-size: 14px;">Good</option>                             <option value="R" style="font-size: 14px;">In need of repair</option>          </select>                        </div>  <div class="col-md-2 mb-3" style="width: 200px;">    <input type="text" name="res_comments[]" class="form-control" placeholder="Resident Comments">  </div> <button style="height:20px;background-color:white;color:red;"  class="delete btn "><i class="fa fa-trash icon-white"></i></button></div>  `);
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
      var rowIdx = {!! $num !!};
  
      // jQuery button click event to add a row
      $('#addBtn').on('click', function () {
  
        // Adding a row inside the tbody.
        $('#tbody').append(`<tr id="R${++rowIdx}">
              <td class="row-index text-center">
              <select class="form-control" style="height: 26px;padding: 3px 10px;" id="e_name" name="e_name">
                            <option>--   Select Staff Name  --</option>
                          @foreach($emps as $emp)
                          <option value="{{ $emp->name }}"> {{ $emp->name }}</option>
                          @endforeach
                        </select>
              <td class="row-index text-center">
                                  <input type="text" name="e_pos[]" value="{{  $e_pos[$i] }}" >
                                         </td>
                                         <td class="row-index text-center">
                                         <input name="sun[]" type="text" value="{{  $sun[$i] }}">
                                         </td>
                                         <td class="row-index text-center">
                                          <input type="text" name="mon[]"  class="form-control" value="{{ $mon[$i] }}">                                      
                                         </td>
                                         <td class="row-index text-center">
                                         <input name="tue[]" type="text" value="{{  $tue[$i] }}">
                                         </td>
                                         <td class="row-index text-center">
                                         <input name="wed[]" type="text" value="{{  $wed[$i] }}">
                                         </td>
                                         <td class="row-index text-center">
                                         <input name="thu[]" type="text" value="{{  $thu[$i] }}">
                                         </td>
                                         <td class="row-index text-center">
                                         <input name="fri[]" type="text" value="{{  $fri[$i] }}">
                                         </td>
                                         <td class="row-index text-center">
                                         <input name="sat[]" type="text" value="{{  $sat[$i] }}">
                                         </td>
                                         <td class="row-index text-center">
                                         <input name="tot_hr[]" type="text" value="{{  $tot_hr[$i] }}">
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