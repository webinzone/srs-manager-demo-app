          <div class="form-group" >
                 <div class="col-md-3 mb-3">
                  <label for="name" >Company Id</label>
                </div>
                     <div class="col-md-4 mb-3">
                      @if(Auth::user()->s_role == "c_admin" || Auth::user()->s_role == "c_users")
                        <input type="text" name="companyid" value="{{ Auth::user()->c_id }}"  placeholder="Company" readonly>
                      @else

                        @if($user->id)
                          <select class="form-control" style="height: 26px;padding: 3px 10px;"  name="companyid" id="company_id">
                              <option>--Select Company ID --</option>
                            @foreach($companies as $company)
                            <option value="{{ $company->company_id }}" {{ $user->c_id == $company->company_id ? 'selected' : ''  }}>{{ $company->company_id }}</option>
                            @endforeach
                          </select>   
                        @else
                           <select class="form-control" style="height: 26px;padding: 3px 10px;"  name="companyid" id="company_id">
                              <option>--Select Company ID --</option>
                            @foreach($companies as $company)
                            <option value="{{ $company->company_id }}" >{{ $company->company_id }}</option>
                            @endforeach
                          </select> 
                        @endif 
                      @endif                        

                 </div>
                 <div class="col-md-4 mb-3">
                  @if(Auth::user()->s_role == "c_admin" || Auth::user()->s_role == "c_users")
                        <input type="text" name="companyname" value="{{ Auth::user()->companyname }}"  placeholder="Company" readonly>
                  @else
                    <input type="text" name="companyname" value="{{ $user->companyname }}" id="comp" placeholder="Company" readonly> 
                  @endif                    
                 </div>
                 
               </div>
               <div class="form-group" >
                 <div class="col-md-3 mb-3">
              <label for="name" >Location Id</label>
               </div>
                <div class="col-md-4 mb-3">
                  @if(Auth::user()->s_role == "c_admin" || Auth::user()->s_role == "c_users")
                        <input type="text" name="locationid" value="{{ Auth::user()->l_id }}"  placeholder="Company" readonly>
                  @else
                      @if($user->id)
                        <select class="form-control" style="height: 26px;padding: 3px 10px;"  name="locationid" id="location_id">
                          <option value="{{ $user->l_id }}" >{{ $user->l_id }}</option>
                        </select>
                       @else
                         <select class="form-control" style="height: 26px;padding: 3px 10px;"  name="locationid" id="location_id">
                          <option>--Select Location Id --</option>
                         </select>
                      @endif
                  @endif        
            </div>
            <div class="col-md-4 mb-3">
              @if(Auth::user()->s_role == "c_admin" || Auth::user()->s_role == "c_users")
                        <input type="text" name="locationname" value="{{ Auth::user()->locationname }}"  placeholder="Location" readonly>
                  @else
                    <input type="text" name="locationname"  value="{{ $user->locationname }}" id="loccc" placeholder="Location" readonly>      
              @endif                  
           </div>
         </div>

