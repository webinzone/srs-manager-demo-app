@extends('layouts/default')

{{-- Page title --}}
@section('title')

@parent
@stop
@section('header_right')
  <a href="{{ route('srs_staffs.index') }}" class="btn btn-primary pull-right" style="border-color: #23536f;background-color: #307095;"> Back</a>
@stop

{{-- Page content --}}
@section('content')

<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
        <div class=" col" style="padding-left: 100px;">

          
         <form id="create-form" class="form-horizontal" method="post" action = "{{ route ('srs_staffs.update', $srs_staff->id) }}" autocomplete="off" role="form"  style="width: 1050px;" enctype="multipart/form-data" >
            @method('PATCH') 

                 {{ csrf_field() }}
            <!-- box -->
            <div class="box box-default">
                <!-- box-header -->
                <!-- box-header -->

                          <div class="box-header with-border text-center">
                 <h3><b>Employee - {{$srs_staff->em_id}} </b></h3> <input  type="text" style="width: 50px;" name="em_id" width="100px;"  required="" value="{{$srs_staff->em_id}}" readonly="" hidden="">
                   
                </div><!-- /.box-header -->

            
         <div class="box-body" style="padding-left: 40px;padding-right: 40px;">                          
                    <div class="form-group ">
                      <div class="col-md-4 mb-3">
                        <label for="fname">First name</label>
                        <input type="text" class="form-control" value="{{ $name[0]}}" id="fname" name="fname"  v-on:change="page_one.fname = $event.target.value" >                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="mname">Middle name</label>
                        <input type="text" class="form-control" value="{{ $name[1]}}"  id="mname" name="mname"  v-on:change="page_one.mname = $event.target.value">                
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="lname">Last name</label>
                        <input type="text" class="form-control" value="{{ $name[2]}}" id="lname" name="lname"  v-on:change="page_one.lname = $event.target.value">                
                      </div>                        
                    </div>
                    <div class="form-group ">
                           <div class="col-md-3 mb-3 ">
                        <label for="name" >Date of Birth</label>

                 <input type="date" name="dob" class="form-control" value="{{ $srs_staff->dob}}">                                        
                        </div>
                        
                           <div class="col-md-3 mb-3 ">
                        <label for="name" >Phone Number</label>

                 <input type="text" name="ph" class="form-control" value="{{ $srs_staff->ph}}">                                       
                        </div>
                          <div class="col-md-3 mb-3 ">
                        <label for="name" >Email</label>

                 <input type="email" name="email" class="form-control" value="{{ $srs_staff->email}}">                                        
                        </div>
                         <div class="col-md-3 mb-3 ">
                        <label for="name" >Employment Date</label>

                 <input type="date" name="empdate" value="{{ $srs_staff->empdate}}" class="form-control" >                                        
                        </div>
                    </div>
                    
                     <div class="form-group ">
                         
                        <div class="col-md-4 mb-3 ">
                          <label for="name" >Position</label>

                          <input type="text" value="{{ $srs_staff->posi}}" name="posi" class="form-control" placeholder="Position">                                       
                        </div>

                       <div class="col-md-4 mb-3 ">
                            <label for="name" >Tax File Number (TFN)</label>

                             <input type="text" value="{{ $srs_staff->tfn}}" name="tfn" class="form-control" placeholder="TFN">                                        
                        </div>
                        
                     <div class="col-md-4 mb-3 ">
                        <label for="name" >Australian Business Number</label>

                        <input type="text" value="{{ $srs_staff->abn}}" name="abn" class="form-control" placeholder="ABN">                                        
                     </div>
                        
                    </div>


                        <div class="form-group ">
                     
                    <div class="col-md-4 mb-3 ">
                             <label for="name" >Address</label>
                              <textarea  name="address" class="form-control" >{{ $srs_staff->address}}</textarea>                                 
                        </div>
                       
                

                         
                        <div class="col-md-4 mb-3 ">
                          <label for="name" >Super Company</label>

                          <input type="text" value="{{ $srs_staff->s_comp}}" name="s_comp" class="form-control" placeholder="Super Company">                                       
                        </div>

                       <div class="col-md-4 mb-3 ">
                            <label for="name" >Super number </label>

                             <input type="text" value="{{ $srs_staff->s_no}}" name="s_no" class="form-control" placeholder="Super number">                                        
                        </div>
                    </div>
                        <div class="form-group ">
                            <div class="col-md-2 mb-3 " style="width: 200px;">
                             <label for="name" >Upload Signature</label>
                              <input type="file" name="empsign" class="inputfile" id="sign">
                            </div>

                              <img id="preview-sign-before-upload" style="width: 100px;height: 50px;" src="{{url('')}}/images/sign/{{$srs_staff->empsign}}"  alt="" onerror="if (this.src != 'error.jpg') this.src = '{{url('')}}/images/sign/default1.jpg';" class="outer" />                                 
                      </div>
                            
                        
                        

                        <div class="table-responsive">
                                <button style="float: right;bottom: 50px; height: ; " class="btn  btn-primary text-right" 
                              id="addBtn" type="button">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button><br>
                              <table id="paper-table" class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th width="100px;" class="text-center">No</th>
                                    <th width="200px;" class="text-center">Certificate Name</th>
                                    <th class="text-center">Issue Date</th>
                                    <th class="text-center">Expiry date</th>
                                    <th width="150px;" class="text-center">Certificate</th>
                                    <th  class="text-center">Action</th>                                   
                                  </tr>
                                </thead>
                                     @for ($i=0; $i < $num; $i++)

                                <tbody id="tbodym">
                                    <tr id="R{$i}">
                                        <td class="row-index text-center" >
                                             <input type="number" name="item_no[]" value="{{ $item_no[$i] }}" >
                                             </td>
                                             <td class="row-index text-center">
                                             <input name="quali[]" value="{{ $quali[$i] }}" type="text" >
                                             </td>
                                             <td class="row-index text-center">
                                             <input name="qop_date[]" value="{{ $qop_date[$i] }}" type="date" >
                                             
                                             </td>
                                             <td class="row-index text-center">
                                             <input name="certi_exp[]" value="{{ $certi_exp[$i] }}" type="date" >
                                             
                                             </td>
                                             <td>
                                                <embed id="certifile" src="{{url('')}}/certificates/{{ $emp_certi[$i]}}" name="emp_certi[]" hidden />
                                             @if($emp_certi[$i])
                                             <input name="certifile[]" value="{{ $emp_certi[$i]}}" type="text"  readonly>
                                             
                                             @else
                                             
                                             <input name="emp_certi[]" id="certi" type="file" >
                                             @endif
                                             </td>
                                             <!--<td class="row-index text-center">
                                               @if($emp_certi[$i])
                                                <input value="{{url('')}}/certificates/{{ $emp_certi[$i] }}" class="form-control" type="file" name="emp_certi[]"   style="display:none;" />

                                               <p> <a href="{{route('getDownload', $emp_certi[$i])}}">{{ $emp_certi[$i] }}</a></p>&nbsp;&nbsp; &nbsp;
                                                <label for="file"><i class="fa fa-upload" aria-hidden="true"></i> </label>
                                                @else
                                             <input  type="file" name="emp_certi[]" accept="application/pdf"  />
                                             @endif-->
                                            <!-- <input  type="file" id="file" value="{{url('')}}/certificates/{{ $emp_certi[$i] }}" name="emp_certi[]" accept="application/pdf"  />&nbsp;&nbsp;<a href="{{route('getDownload', $emp_certi[$i])}}">{{ $emp_certi[$i] }}</a>
                                             </td>-->
                                             
                                         <td>
                                            &nbsp;&nbsp;&nbsp;&nbsp; <a style="height:20px;background-color:white;color:red;"  href="#" class="delete-row"><i class="fa fa-trash icon-white"></i></a>
                                         </td>
                                         
                                      <tr>                           
                                </tbody>
                                @endfor
                             
                                <tbody id="tbody">
                                    
                                </tbody>

                              </table>
                            </div>
                            
               

                  <!--  <div class="form-group ">
                         
                        <div class="col-md-4 mb-3 ">
                          <label for="name" >Criminal check </label>

                          <input type="date" name="crime" value="{{ $srs_staff->crime}}" class="form-control" placeholder="Criminal check (Release date)">                                       
                        </div>

                       <div class="col-md-6 mb-3 ">
                            <label for="name" >Working With Children Check </label>

                             <input type="text" value="{{ $srs_staff->w_child}}" style="width: 250px;" name="w_child" class="form-control" placeholder="Super number">                                        
                        </div>
                        
                     
                        
                    </div>-->

                <!-- ./box-body -->
                            <!-- col-md-8 -->

            </div>
                 
                    <div class="box-footer text-right" style="padding-right:50px;">
                        <a class="btn btn-link text-left" href="{{ route('srs_staffs.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check icon-white" aria-hidden="true"></i> Save</button>
                    </div>

                </div> 


<!-- ./row -->
        </form>
      </div>
    </div>
</div>
@stop

@section('moar_scripts')
 <script>
    $(document).ready(function () {
  
      // Denotes total number of rows
      var rowIdx = {!! $num !!};
      
  
      // jQuery button click event to add a row
      $('#addBtn').on('click', function () {
  
        // Adding a row inside the tbody.
        $('#tbody').append(`<tr id="R${++rowIdx}">
             <td class="row-index text-center" >
             <input type="number" name="item_no[]" value="${rowIdx}" >
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
             <input type="file" id="file" name="emp_certi[]" accept="application/pdf">
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

  <script type="text/javascript">
      $(document).ready(function (e) {
 
   
   $('#certi').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#certifile').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
  </script>

  <script>
function myFunction() {
  document.getElementById("file").multiple = true;
}
</script>
<script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#sign').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-sign-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
 
</script>
@include ('partials.bootstrap-table')
@stop