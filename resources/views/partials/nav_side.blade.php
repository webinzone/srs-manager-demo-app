       <nav class="navbar navbar-static-top" role="navigation" style="background-color: #3c8dbc;color: white;">
          <!-- Sidebar toggle button above the compact sidenav -->
          <a href="#" style="color: white; background-color: #3c8dbc" class="sidebar-toggle btn btn-white" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="nav navbar-nav navbar-left">
              <div class="left-navblock">
                 @if ($snipeSettings->brand == '3')
                      <a class="logo navbar-brand no-hover" href="{{ url('/') }}">
                          
                          <b>Residential Care Manager</b>
                      </a>
                  
                  @endif
              </div>
            </div>

          <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu" >
              <ul class="nav navbar-nav">
                  
                @if(Auth::user()->s_role == "c_admin")
                  @can('index', \App\Models\RentDetail::class)
                  <li aria-hidden="true"{!! (Request::is('rent_details*') ? ' class="active"' : '') !!} tabindex="-1">
                      <a href="{{ route('rents.index') }}" tabindex="-1" style="color: white;">
                          <i class="fa fa-file"></i>
                          <span class="sr-only">Rent Details</span>
                      </a>
                  </li>
                  @endcan

                  @can('index', \App\Models\Complaint::class)
                  <li aria-hidden="true"{!! (Request::is('complaints*') ? ' class="active"' : '') !!} tabindex="-1">
                      <a href="{{ route('complaints.index') }}" tabindex="-1" style="color: white;">
                          <i class="fa fa-comments"></i>
                          <span class="sr-only">Complaints</span>
                      </a>
                  </li>
                  @endcan

                  <!--@can('index', \App\Models\Booking::class)
                  <li aria-hidden="true"{!! (Request::is('bookings*') ? ' class="active"' : '') !!} tabindex="-1">
                      <a href="{{ route('bookings.index') }}" tabindex="-1" style="color: white;">
                          <i class="fa fa-list-alt" aria-hidden="true"></i>                         
                          <span class="sr-only">Bookings</span>
                      </a>
                  </li>
                  @endcan -->

                   @can('index', \App\Models\StaffRoaster::class)
                  <li aria-hidden="true"{!! (Request::is('staff_roasters*') ? ' class="active"' : '') !!} tabindex="-1">
                      <a href="{{ route('staff_roasters.index') }}" tabindex="-1" style="color: white;">
                          <i class="fa fa-users" aria-hidden="true"></i>                      
                          <span class="sr-only">Staff Roaster</span>
                      </a>
                  </li>
                  @endcan

                  @can('index', \App\Models\ResidentialAgreement::class)
                  <li aria-hidden="true"{!! (Request::is('resident_agreements*') ? ' class="active"' : '') !!} tabindex="-1">
                      <a href="{{ route('resident_agreements.index') }}" tabindex="-1" style="color: white;">
                          <i class="fa fa-id-card" aria-hidden="true"></i>                        
                          <span class="sr-only">RSA</span>
                      </a>
                  </li>
                  @endcan
                 

                  @can('index', \App\Models\ConditionReport::class)
                  <li aria-hidden="true"{!! (Request::is('condition_reports*') ? ' class="active"' : '') !!} tabindex="-1">
                      <a href="{{ route('condition_reports.index') }}" tabindex="-1" style="color: white;">
                          <i class="fa fa-list" aria-hidden="true"></i>                         
                          <span class="sr-only">Room Assets</span>
                      </a>
                  </li>
                  @endcan

                @endif

                  <li>
                  <form class="navbar-form navbar-left form-horizontal" role="search" action="{{ route('search') }}" method="get" >
                      <div class="col-xs-12 col-md-12">
                          <div class="col-xs-12 form-group">
                              <label class="sr-only" for="tagSearch">Search Incidents</label>
                              <input type="text" class="form-control" id="search" name="search" placeholder="Search Incidents" style="height: 34px;">
                          </div>
                          <div class="col-xs-1">
                              <button type="submit" class="btn btn-primary pull-right" style="background-color: #307095;border-color: #122b40;">
                                  <i class="fa fa-search" aria-hidden="true"></i>
                                  <span class="sr-only">Search</span>
                              </button>
                          </div>
                      </div>
                  </form>
                  </li>

                  @can('admin')
                  @if(Auth::user()->s_role !== "c_users")
                  <li class="dropdown" aria-hidden="true">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" tabindex="-1" style="color: white;">
                      {{ trans('general.create') }}
                      <strong class="caret"></strong>
                    </a>
                   <ul class="dropdown-menu">
                   
                         @can('create', \App\Models\User::class)
                             <li {!! (Request::is('users/create') ? 'class="active"' : '') !!}>
                                 <a href="{{ route('users.create') }}" tabindex="-1">
                                     <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                                     Add Users
                                 </a>
                             </li>
                         @endcan
                    
                   </ul>
                </li>
                @endif
               @endcan

               @can('admin')
               @if ($snipeSettings->show_alerts_in_menu=='1')
               <!-- Tasks: style can be found in dropdown.less -->
               <?php $alert_items = \App\Helpers\Helper::checkLowInventory(); ?>

              <!-- <li class="dropdown tasks-menu">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white;">
                   <i class="fa fa-flag-o" aria-hidden="true"></i>
                     <span class="sr-only">Alerts</span>
                   @if (count($alert_items))
                    <span class="label label-danger" style="color: white; background-color: red;">{{ count($alert_items) }}</span>
                   @endif
                 </a>
                 <ul class="dropdown-menu">
                   <li class="header">You have {{ count($alert_items) }} items below or almost below minimum quantity levels</li>
                   <li>
                     <ul class="menu">

                      @for($i = 0; count($alert_items) > $i; $i++)

                        <li>
                          <a href="{{route($alert_items[$i]['type'].'.show', $alert_items[$i]['id'])}}">
                            <h2>{{ $alert_items[$i]['name'] }}
                              <small class="pull-right">
                                {{ $alert_items[$i]['remaining'] }} remaining
                              </small>
                            </h2>
                            <div class="progress xs">
                              <div class="progress-bar progress-bar-yellow" style="width: {{ $alert_items[$i]['percent'] }}%" role="progressbar" aria-valuenow="{{ $alert_items[$i]['percent'] }}" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">{{ $alert_items[$i]['percent'] }}% Complete</span>
                              </div>
                            </div>
                          </a>
                        </li>
                      @endfor
                     </ul>
                 </li>
                   {{-- <li class="footer">
                     <a href="#">View all tasks</a>
                   </li> --}}
                 </ul>
               </li>-->
               @endcan
               @endif


               <!-- User Account: style can be found in dropdown.less -->
               @if (Auth::check())
               <li class="dropdown user user-menu">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white;">
                   @if (Auth::user()->present()->gravatar())
                       <img src="{{ Auth::user()->present()->gravatar() }}" class="user-image" alt="">
                   @else
                      <i class="fa fa-user fa-fws" aria-hidden="true"></i>
                   @endif

                   <span class="hidden-xs">{{ Auth::user()->first_name }} <strong class="caret"></strong></span>
                 </a>
                 <ul class="dropdown-menu">
                   <!-- User image -->
                    <!-- <li {!! (Request::is('account/profile') ? ' class="active"' : '') !!}>
                       <a href="{{ route('view-assets') }}">
                             <i class="fa fa-check fa-fw" aria-hidden="true"></i>
                             {{ trans('general.viewassets') }}
                       </a></li>

                     <li {!! (Request::is('account/requested') ? ' class="active"' : '') !!}>
                         <a href="{{ route('account.requested') }}">
                             <i class="fa fa-check fa-disk fa-fw" aria-hidden="true"></i>
                             Requested Assets
                         </a></li>
                     <li {!! (Request::is('account/accept') ? ' class="active"' : '') !!}>
                         <a href="{{ route('account.accept') }}">
                             <i class="fa fa-check fa-disk fa-fw"></i>
                             Accept Assets
                         </a></li>
                        -->


                     <li>
                          <a href="{{ route('profile') }}">
                             <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                              {{ trans('general.editprofile') }}
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('account.password.index') }}">
                             <i class="fa fa-asterisk fa-fw" aria-hidden="true"></i>
                             {{ trans('general.changepassword') }}
                         </a>
                     </li>



                     
                     <li class="divider"></li>
                     <li>
                         <a href="{{ url('/logout') }}">
                             <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>
                             {{ trans('general.logout') }}
                         </a>
                     </li>
                 </ul>
               </li>
               @endif

            </ul>
          </div>
      </nav>
       <a href="#" style="float:left" class="sidebar-toggle-mobile visible-xs btn" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <i class="fa fa-bars"></i>
      </a>
       <!-- Sidebar toggle button-->
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="background-color: #222d32;color: white;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree" style="color: white;">
            @can('admin')
            <li {!! (Request::is('home*') ? ' class="active"' : '') !!}>
              <a href="{{ route('home') }}" style="background-color: #222d32;color: #b8c7ce;">
                <i class="fa fa-dashboard" ></i> <span style="color: white">Dashboard</span>
              </a>
            </li>           
            @endcan
            
            <li class="treeview">
                <a href="#" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-shield" aria-hidden="true"></i>
                  <span style="color: white;">Administration</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="background-color: #2c3b41;color: white;width: 177px;">
                  @if(Auth::user()->s_role == "super_admin")
                  <li>
                      <a href="{{ route('company_masters.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        Company Master
                    </a>
                  </li>
                  <li>
                      <a href="{{ route('location_masters.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        Location Master
                    </a>
                  </li>
                  @endif
                  @if(Auth::user()->s_role == "c_admin" || Auth::user()->s_role == "c_users")
                  <li>
                      <a href="{{ route('room_details.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        Room Master
                    </a>
                  </li>
                  @endif
                 
                </ul>
              </li>
               @if(Auth::user()->s_role == "c_admin" || Auth::user()->s_role == "c_users")
              <li class="treeview">
                <a href="#" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span style="color: white;">Residents</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="background-color: #2c3b41;color: white;width: 177px;">
                  
                  <li>
                      <a href="{{ route('clients.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                         Resident Records
                    </a>
                  </li>

                  <li>
                      <a href="{{ route('condition_reports.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                         Condition Report
                    </a>
                  </li>

                  <li>
                      <a href="{{ route('resident_agreements.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                         RSA
                    </a>
                  </li>

                  <li>
                      <a href="{{ route('referrals.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                         Referal Record
                    </a>
                  </li>

                    <li>
                      <a href="{{ route('support_plans.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                         Support Plans
                    </a>
                  </li>
                   
                    <li>
                      <a href="{{ route('incidents.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                         Incident Records
                    </a>
                  </li>


                  <li>
                      <a href="{{ route('transfer_records.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                         Transfer Record
                    </a>
                  </li>

                  <li>
                      <a href="{{ route('vaccates.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                         Vaccate Records
                    </a>
                  </li>
                
              
                 
                </ul>
              </li>

        

            <li class="treeview">
                <a href="#" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-users" aria-hidden="true"></i>
                                  
                  <span style="color: white;">Employess</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="background-color: #2c3b41;color: white;width: 177px;">
                  <li>
                      <a href="{{ route('srs_staffs.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                       Employees
                    </a>
                  </li>
                  <li>
                      <a href="{{ route('staff_roasters.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                          Staff Roaster
                      </a>
                  </li>
                
                </ul>
              </li>
              <li class="treeview">
                <a href="#" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-money" aria-hidden="true"></i>

                                  
                  <span style="color: white;">Accounts</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="background-color: #2c3b41;color: white;width: 177px;">
                  <li>
                      <a href="/generateAccountReport" target="_blank" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                       Accounts Report
                    </a>
                  </li>
                  <li>
                      <a href="{{ route('rents.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                          Rent Details
                      </a>
                  </li>
                
                </ul>
              </li>
             <!--@can('view', \App\Models\Booking::class)
            <li{!! (Request::is('bookings*') ? ' class="active"' : '') !!}>
                <a href="{{ route('bookings.index') }}" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-list-alt" aria-hidden="true"></i>
                  <span style="color: white;">Bookings</span>
                </a>
            </li>
            @endcan -->

            @can('view', \App\Models\ResidentAgreement::class)
            <li{!! (Request::is('appointments*') ? ' class="active"' : '') !!}>
                <a href="{{ route('appointments.index') }}" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-calendar" aria-hidden="true"></i>

                  <span style="color: white;">Appointments</span>
                </a>
            </li>
            @endcan

             <li class="treeview">
                <a href="#" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                  <span style="color: white;">Shift Handovers</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="background-color: #2c3b41;color: white;width: 177px;">
                  <li>
                      <a href="{{ route('mngshifts.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        Morning - Evening
                    </a>
                  </li>
                  <li>
                      <a href="{{ route('evngshifts.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        Evening - Morning
                    </a>
                  </li>
                  
                 
                </ul>
              </li>
         

             @can('view', \App\Models\ResidentAgreement::class)
            <!--<li{!! (Request::is('resident_agreements*') ? ' class="active"' : '') !!}>
                <a href="{{ route('room_details.index') }}" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-object-group" aria-hidden="true"></i>

                  <span style="color: white;">Rooms</span>
                </a>
            </li>-->
            @endcan


            @can('view', \App\Models\Complaint::class)
            <li{!! (Request::is('complaints*') ? ' class="active"' : '') !!}>
                <a href="{{ route('complaints.index') }}" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-comments"></i>
                  <span style="color: white;">Complaints</span>
                </a>
            </li>
            @endcan

    

            
          <!--  @can('view', \App\Models\SrsStaff::class)
            <li{!! (Request::is('staff_roasters*') ? ' class="active"' : '') !!}>
                <a href="{{ route('srs_staffs.index') }}" style="background-color: #222d32;color: #b8c7ce;">
                  
                  <i class="fa fa-users" aria-hidden="true"></i>

                  <span style="color: white;">Staffs</span>
                </a>
            </li>
            @endcan
            @can('view', \App\Models\StaffRoaster::class)
            <li{!! (Request::is('staff_roasters*') ? ' class="active"' : '') !!}>
                <a href="{{ route('staff_roasters.index') }}" style="background-color: #222d32;color: #b8c7ce;">
                  
                  <i class="fa fa-users" aria-hidden="true"></i>

                  <span style="color: white;">Staff Roaster</span>
                </a>
            </li>
            @endcan-->

          


            @can('view', \App\Models\ProgressNotes::class)
            <li{!! (Request::is('progress_notes*') ? ' class="active"' : '') !!}>
                <a href="{{ route('progress_notes.index') }}" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-file-text-o" aria-hidden="true"></i>
                  <span style="color: white;">Progress Notes</span>
                </a>
            </li>
            @endcan
            
            <li class="treeview">
                <a href="#" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-files-o"></i>                  
                  <span style="color: white;">Reports</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="background-color: #2c3b41;color: white;width: 177px;">
                  <li>
                      <a href="/reports" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        Resident Reports
                    </a>
                  </li>
                  <li>
                      <a href="/agreement" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        RSA Reports
                    </a>
                  </li>
                  <li>
                      <a href="/condition" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        Condition Reports
                    </a>
                  </li>
                  <li>
                      <a href="/generateAccountReport" style="color: #b8c7ce;" target="_blank">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        Accounts Reports
                    </a>
                  </li>
                  <li>
                      <a href="/referral" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        Referal Reports
                    </a>
                  </li>
                  <li>
                      <a href="/shiftreports" style="color: #b8c7ce;" >
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        Handover Reports
                    </a>
                  </li>
                  <li>
                      <a href="/progress" style="color: #b8c7ce;" >
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        Progress Reports
                    </a>
                  </li>
                  <li>
                      <a href="/supportplan" style="color: #b8c7ce;" >
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        Support Plans
                    </a>
                  </li>
                  <li>
                      <a href="/rent" style="color: #b8c7ce;" >
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        Rent Reports
                    </a>
                  </li>
                  <li>
                      <a href="/incident" style="color: #b8c7ce;" >
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        Incident Reports
                    </a>
                  </li>
                  <li>
                      <a href="/generatetransfer" style="color: #b8c7ce;" >
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        Transfer Reports
                    </a>
                  </li>
                  
                  <li>
                      <a href="/appointment" style="color: #b8c7ce;" >
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        Appointments 
                    </a>
                  </li>
                  <!--<li>
                      <a href="{{ route('handovers.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        Handover Reports
                    </a>
                  </li>
                  <li>
                      <a href="{{ route('progresses.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        Progresses Reports
                    </a>
                  </li>
                  <li>
                      <a href="{{ route('incidents.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        Incident Reports
                    </a>
                  </li>
                  <li>
                      <a href="{{ route('files.index') }}" style="color: #b8c7ce;">
                          <i class="fa fa-circle-o text-grey" aria-hidden="true"></i>
                        File Reports
                    </a>
                  </li>-->
                </ul>

              </li>

            <!--@can('view', \App\Models\RentDetail::class)
            <li{!! (Request::is('handovers*') ? ' class="active"' : '') !!}>
                <a href="{{ route('handovers.index') }}" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                  <span style="color: white;">Shift Handovers</span>
                </a>
            </li>
            @endcan-->
           
            <!--@can('view', \App\Models\RentDetail::class)
            <li{!! (Request::is('rent_details*') ? ' class="active"' : '') !!}>
                <a href="{{ route('rent_details.index') }}" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-file"></i>
                  <span style="color: white;">Rent Details</span>
                </a>
            </li>
            @endcan-->


            
           
            @endif
            

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>