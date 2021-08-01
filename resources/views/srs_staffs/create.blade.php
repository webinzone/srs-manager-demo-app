
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

@section('inputFields')

{{-- Page content --}}
@section('content')
<style type="text/css">
    td{
        width: auto;
    }
</style>
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class=" col" style="padding-left: 100px;">
        

          <form id="create-form" class="form-horizontal" method="post" action="{{ route('srs_staffs.store') }}" autocomplete="off" role="form" style="width: 1050px;" enctype="multipart/form-data" >
                 {{ csrf_field() }}

            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
                <div class="box-header with-border text-center">
                   <h3><b>Employees</b></h3>
                   
                </div><!-- /.box-header -->

                <!-- box-body -->
                <div class="box-body" style="padding-left: 40px;padding-right: 40px;">                          
                    <div class="form-group ">
                      <div class="col-md-4 mb-3">
                        <label for="fname">First name</label>
                        <input type="text" class="form-control" placeholder="First Name" id="fname" name="fname"  v-on:change="page_one.fname = $event.target.value" >                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="mname">Middle name</label>
                        <input type="text" class="form-control" placeholder="Middle Name" id="mname" name="mname"  v-on:change="page_one.mname = $event.target.value">                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="lname">Last name</label>
                        <input type="text" class="form-control" placeholder="Last Name" id="lname" name="lname"  v-on:change="page_one.lname = $event.target.value">                
                      </div>                        
                    </div>
                    <div class="form-group ">
                           <div class="col-md-4 mb-3 ">
                        <label for="name" >Date of Birth</label>

                 <input type="date" name="dob" class="form-control" placeholder="Date of Birth">                                        
                        </div>
                        
                           <div class="col-md-4 mb-3 ">
                        <label for="name" >Phone Number</label>

                 <input type="text" name="ph" class="form-control" placeholder="Phone Number">                                       
                        </div>
                        <div class="col-md-4 mb-3 ">
                        <label for="name" >Email</label>

                 <input type="email" name="email" class="form-control" placeholder="Email">                                        
                        </div>
                    </div>
                    <div class="form-group ">
                         
                        <div class="col-md-4 mb-3 ">
                          <label for="name" >Position</label>

                          <input type="text" name="posi" class="form-control" placeholder="Position">                                       
                        </div>

                       <div class="col-md-4 mb-3 ">
                            <label for="name" >Tax File Number (TFN)</label>

                             <input type="text" name="tfn" class="form-control" placeholder="TFN">                                        
                        </div>
                        
                     <div class="col-md-4 mb-3 ">
                        <label for="name" >Australian Business Number</label>

                        <input type="text" name="abn" class="form-control" placeholder="ABN">                                        
                     </div>
                        
                    </div>

                    <div class="form-group ">
                     

                         <div class="col-md-4 mb-3 ">
                             <label for="name" >Address</label>
                              <textarea  name="address" class="form-control" placeholder="Address"></textarea>                                 
                        </div>

                         <div class="col-md-4 mb-3 ">
                          <label for="name" >Super Company</label>

                          <input type="text" name="s_comp" class="form-control" placeholder="Super Company">                                       
                        </div>

                       <div class="col-md-4 mb-3 ">
                            <label for="name" >Super number </label>

                             <input type="text" name="s_no" class="form-control" placeholder="Super number">                                        
                        </div>
                                           
                        <!--<div class="col-md-6 mb-3 ">
                        <label for="name" >Qualification</label>

                        <textarea name="quali" placeholder="Qualifications" class="form-control"></textarea>

                           
                        </div>-->
                    </div>
                    

                        <div class="table-responsive">
                            <button style="float: right;bottom: 50px; height: ; " class="btn  btn-primary text-right" 
                              id="addBtn" type="button">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button><br>
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th width="100px; class="text-center">No</th>
                                    <th width="200px;" class="text-center">Qualification</th>
                                    <th class="text-center">Optained Date</th>
                                    <th class="text-center">Expiry date</th>
                                    <th width="150px;" class="text-center">Certificate</th>
                                    <th  class="text-center">Action</th>                                   
                                  </tr>
                                </thead>
                                <tbody id="tbody">
                          
                                </tbody>
                              </table>
                            </div>
                            
                        


                     <div class="form-group ">
                         
                        
                     <!--<div class="col-md-4 mb-3 ">
                        <label for="name" >First Aid & CPR </label>

                        <input type="date" name="fi_date" class="form-control" placeholder="First Aid & CPR (Issue date)">                                        
                     </div>-->
                        
                    </div>

                    <div class="form-group ">
                         
                       <!-- <div class="col-md-4 mb-3 ">
                          <label for="name" >Criminal check </label>

                          <input type="date" name="crime" class="form-control" placeholder="Criminal check (Release date)">                                       
                        </div>

                       <div class="col-md-6 mb-3 ">
                            <label for="name" >Working With Children Check </label>

                             <input type="text" style="width: 250px;" name="w_child" class="form-control" placeholder="Super number">                                        
                        </div>-->
                        
                     
                        
                    </div>

                  <!--  <div class="form-group ">
                        <label for="name" >Company Id</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="company_id" class="form-control" placeholder="Company Id">                                     
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" >Location Id</label>
                        <div class="col-md-7 col-sm-12 ">
                 <input type="text" name="location_id" class="form-control" placeholder="Location Id">                                     
                        </div>
                    </div>-->
                    <div class="box-footer text-right">
                        <a class="btn btn-link text-left" href="{{ route('srs_staffs.index') }}">Cancel</a>
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
    $(document).ready(function () {
  
      // Denotes total number of rows
      var rowIdx = 0;
  
      // jQuery button click event to add a row
      $('#addBtn').on('click', function () {
  
        // Adding a row inside the tbody.
        $('#tbody').append(`<tr id="R${++rowIdx}">
             <td class="row-index text-center" >
             <input type="number" name="item_no[]" value="${rowIdx}" readonly>
             </td>
             <td class="row-index text-center">
             <input name="quali[]" type="text" >
             </td>
             <td class="row-index text-center">
             <input name="qop_date[]" type="date" >
             
             </td>
             <td class="row-index text-center">
             <input name="certi_exp[]" type="date" >
             
             </td>
             <td class="row-index text-center">
             <input type="file" name="emp_certi[]" >
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

@include ('partials.bootstrap-table')
@stop

