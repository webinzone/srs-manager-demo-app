<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Residential care Manager
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1" name="viewport">

      <meta name="apple-mobile-web-app-capable" content="yes">



      <link rel="apple-touch-icon" href="">
      <link rel="apple-touch-startup-image" href="">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">


      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="baseUrl" content="{{ url('/') }}/">

    <script nonce="{{ csrf_token() }}">
      window.Laravel = { csrfToken: '{{ csrf_token() }}' };
    </script>

     {{-- stylesheets --}}
    <link rel="stylesheet" href="{{ url(mix('css/dist/all.css')) }}">
    
    {{-- page level css --}}
    @stack('css')

    
    @if (($snipeSettings) && ($snipeSettings->header_color!=''))
    <style nonce="{{ csrf_token() }}">
        .main-header .navbar, .main-header .logo {
            background-color: {{ $snipeSettings->header_color }};
            background: -webkit-linear-gradient(top,  {{ $snipeSettings->header_color }} 0%,{{ $snipeSettings->header_color }} 100%);
            background: linear-gradient(to bottom, {{ $snipeSettings->header_color }} 0%,{{ $snipeSettings->header_color }} 100%);
            border-color: {{ $snipeSettings->header_color }};
        }
        .skin-{{ $snipeSettings->skin!='' ? $snipeSettings->skin : 'blue' }} .sidebar-menu > li:hover > a, .skin-{{ $snipeSettings->skin!='' ? $snipeSettings->skin : 'blue' }} .sidebar-menu > li.active > a {
          border-left-color: {{ $snipeSettings->header_color }};
        }

        .btn-primary {
          background-color: {{ $snipeSettings->header_color }};
          border-color: {{ $snipeSettings->header_color }};
        }
    </style>
    @endif

    {{-- Custom CSS --}}
    @if (($snipeSettings) && ($snipeSettings->custom_css))
    <style>
        {!! $snipeSettings->show_custom_css() !!}
    </style>
    @endif

      @if (($snipeSettings) && ($snipeSettings->custom_css))
          <style>
              {!! $snipeSettings->show_custom_css() !!}
          </style>
      @endif


    <script nonce="{{ csrf_token() }}">
          window.snipeit = {
              settings: {
                  "per_page": {{ $snipeSettings->per_page }}
              }
          };
    </script>
    <!-- Add laravel routes into javascript  Primarily useful for vue.-->
    @routes

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <script src="{{ url(asset('js/html5shiv.js')) }}" nonce="{{ csrf_token() }}"></script>
        <script src="{{ url(asset('js/respond.js')) }}" nonce="{{ csrf_token() }}"></script>
       

        
 

<style type="text/css">
  .navbar-custom-menu li:hover {
   background-color: #222d32;
}
.navbar-custom-menu a:hover{
  color: white !important;
  background-color: #222d32 !important;

}
</style>
<style type="text/css">
 
  .form-horizontal .control-label {
    padding-top: 7px;
    margin-bottom: 0;
    text-align: left;
    padding-left: 20px;
}
.form-control,input[type=text],input[type=date],input[type=time],input[type=tel],input[type=number],input[type=email],select {
    display: block;
    width: 100%;
    height: 26px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    }
    .form-control, input[type=search] {
    height: 34px;
}
</style>


<style type="text/css">
  form {
  padding: 1.5rem;
}

form .page {
  height: 50rem;
  width: 50rem;
}

button.next {
  position: absolute;
  bottom: 0;
  right: 0px;
  margin-right: 1.5rem;
  margin-bottom: 1rem;
}

button.previous {
  position: absolute;
  bottom: 0;
  color: white;
  left: 38px;
  margin-left: 1rem;
  margin-bottom: 1rem;
}


button.edit {
  position: absolute;
  bottom: 0;
  right: 0;
}
 .next {
  background-color: #3c8dbc
}

.previous {
  background-color: #980000;
}

.progress-bar {
  background-color: #3c8dbc;
}

h4 {
  color: #980000;
}
.progress {
    height: 20px;
    width: 870px;
    margin-bottom: 20px;

    }
</style>

<style type="text/css">
  .form-row {
    margin-right: -15px;
    margin-left: -15px;
    width: 900px;
}
</style>

<style type="text/css">
  .card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
    left: 200px;
}
*, ::after, ::before {
    box-sizing: border-box;
}
.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0,0,0,.03);
    border-bottom: 1px solid rgba(0,0,0,.125);
}
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}
.content-wrapper{

 background-color: #9F2B68;
}
</style>

  </head>
  <body  class="sidebar-mini skin-{{ $snipeSettings->skin!='' ? $snipeSettings->skin : 'blue' }} {{ (session('menu_state')!='open') ? 'sidebar-mini sidebar-collapse' : ''  }}">
  
  <a class="skip-main" href="#main">Skip to main content</a>

    <div class="wrapper">
      <header class="main-header">

        <!-- Logo -->


        <!-- Header Navbar: style can be found in header.less -->

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
                  <li class="dropdown" aria-hidden="true">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" tabindex="-1" style="color: white;">
                      {{ trans('general.create') }}
                      <strong class="caret"></strong>
                    </a>
                   <ul class="dropdown-menu">
                   
                         @can('create', \App\Models\User::class)
                             <li {!! (Request::is('users/create') ? 'class="active"' : '') !!}>
                                 <a href="{{ route('users.index') }}" tabindex="-1">
                                     <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                                     Add Users
                                 </a>
                             </li>
                         @endcan
                   </ul>
                </li>
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



                     @can('self.api')
                     <li>
                         <a href="{{ route('user.api') }}">
                             <i class="fa fa-user-secret fa-fw" aria-hidden="true"></i> Manage API Keys
                         </a>
                     </li>
                     @endcan
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
            @can('view', \App\Models\User::class)
            <li{!! (Request::is('users*') ? ' class="active"' : '') !!}>
                <a href="{{ route('clients.index') }}" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span style="color: white;">Resident</span>
                </a>
            </li>
            @endcan


            @can('view', \App\Models\ConditionReport::class)
            <li{!! (Request::is('condition_reports*') ? ' class="active"' : '') !!}>
                <a href="{{ route('condition_reports.index') }}" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-list" aria-hidden="true"></i>
                  <span style="color: white;">Condition Report</span>
                </a>
            </li>
            @endcan

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
            <li{!! (Request::is('resident_agreements*') ? ' class="active"' : '') !!}>
                <a href="{{ route('resident_agreements.index') }}" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-id-card" aria-hidden="true"></i>
                  <span style="color: white;">RSA</span>
                </a>
            </li>
            @endcan
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
              @can('view', \App\Models\TransferRecords::class)
            <li{!! (Request::is('transfer_records*') ? ' class="active"' : '') !!}>
                <a href="{{ route('transfer_records.index') }}" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-file-text-o" aria-hidden="true"></i>
                  <span style="color: white;">Transfer Records</span>
                </a>
            </li>
            @endcan

            @can('view', \App\Models\TransferRecords::class)
            <li{!! (Request::is('referrals*') ? ' class="active"' : '') !!}>
                <a href="{{ route('referrals.index') }}" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-user-plus" aria-hidden="true"></i>
                  <span style="color: white;">Referral Records</span>
                </a>
            </li>
            @endcan

             @can('view', \App\Models\ResidentAgreement::class)
            <!--<li{!! (Request::is('resident_agreements*') ? ' class="active"' : '') !!}>
                <a href="{{ route('room_details.index') }}" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-object-group" aria-hidden="true"></i>

                  <span style="color: white;">Rooms</span>
                </a>
            </li>-->
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

            @can('view', \App\Models\Complaint::class)
            <li{!! (Request::is('complaints*') ? ' class="active"' : '') !!}>
                <a href="{{ route('complaints.index') }}" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-comments"></i>
                  <span style="color: white;">Complaints</span>
                </a>
            </li>
            @endcan

             @can('view', \App\Models\SupportPlan::class)
            <li{!! (Request::is('support_plans*') ? ' class="active"' : '') !!}>
                <a href="{{ route('support_plans.index') }}" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-file-text" aria-hidden="true"></i>

                  <span style="color: white;">Support Plans</span>
                </a>
            </li>
            @endcan

            @can('view', \App\Models\SupportPlan::class)
            <li{!! (Request::is('vaccates*') ? ' class="active"' : '') !!}>
                <a href="{{ route('vaccates.index') }}" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-user-times" aria-hidden="true"></i>


                  <span style="color: white;">Vaccate Records</span>
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

            
             @can('view', \App\Models\SupportPlan::class)
            <li{!! (Request::is('incidents*') ? ' class="active"' : '') !!}>
                <a href="{{ route('incidents.index') }}" style="background-color: #222d32;color: #b8c7ce;">
                  <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>


                  <span style="color: white;">Incident Records</span>
                </a>
            </li>
            @endcan
            @endif
            

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->

      <div class="content-wrapper"  role="main">

          @if ($debug_in_production)
              <div class="row" style="margin-bottom: 0px; background-color: red; color: white; font-size: 15px;">
                  <div class="col-md-12" style="margin-bottom: 0px; background-color: #b50408 ; color: white; padding: 10px 20px 10px 30px; font-size: 16px;">
                      <i class="fa fa-warning fa-3x pull-left"></i> <strong>{{ strtoupper(trans('general.debug_warning')) }}:</strong>
                      {!! trans('general.debug_warning_text') !!}
                  </div>
              </div>
      @endif

        <!-- Content Header (Page header) -->
        <section class="content-header" style="padding-bottom: 30px;">
          <h1 class="pull-left" style="color:white;">
            @yield('title')


          </h1>

            @if (isset($helpText))
            @include ('partials.more-info',
                                   [
                                       'helpText' => $helpText,
                                       'helpPosition' => (isset($helpPosition)) ? $helpPosition : 'left'
                                   ])
            @endif
          <div class="pull-right">
            @yield('header_right')
          </div>



        </section>


        <section class="content" id="main" tabindex="-1">

          <!-- Notifications -->
          <div class="row">
              @if (config('app.lock_passwords'))
                  <div class="col-md-12">
                      <div class="callout callout-info">
                          {{ trans('general.some_features_disabled') }}
                      </div>
                  </div>
              @endif

          @include('notifications')
          </div>


          <!-- Content -->
            <div id="{!! (Request::is('*api*') ? 'app' : 'webui') !!}">
          @yield('content')
            </div>

        </section>

      </div><!-- /.content-wrapper -->



      <footer class="main-footer hidden-print">

        <div class="pull-right hidden-xs">
          @if ($snipeSettings->version_footer!='off')
              @if (($snipeSettings->version_footer=='on') || (($snipeSettings->version_footer=='admin') && (Auth::user()->isSuperUser()=='1')))
                &nbsp; <strong></strong> 
              @endif
          @endif

          @if ($snipeSettings->support_footer!='off')
              @if (($snipeSettings->support_footer=='on') || (($snipeSettings->support_footer=='admin') && (Auth::user()->isSuperUser()=='1')))
                <a target="_blank" class="btn btn-default btn-xs" href="https://snipe-it.readme.io/docs/overview" rel="noopener"></a>
                <a target="_blank" class="btn btn-default btn-xs" href="https://snipeitapp.com/support/" rel="noopener"></a>
                 @endif
          @endif

        @if ($snipeSettings->privacy_policy_link!='')
            <a target="_blank" class="btn btn-default btn-xs" rel="noopener" href="{{  $snipeSettings->privacy_policy_link }}" target="_new"></a>
        @endif


        </div>

          

          <a target="_blank" href="" rel="noopener">Residential Care Manager</a>  <i class="fa fa-heart" style="color: #a94442; font-size: 10px" aria-hidden="true"></i><span class="sr-only"></span>© 2020 Copyright
      </footer>



    </div><!-- ./wrapper -->


    <!-- end main container -->

    <div class="modal  modal-danger fade" id="dataConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">&nbsp;</h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                <form method="post" id="deleteForm" role="form">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="button" class="btn btn-default  pull-left" data-dismiss="modal">{{ trans('general.cancel') }}</button>
                    <button type="submit" class="btn btn-outline" id="dataConfirmOK">{{ trans('general.yes') }}</button>
                </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Javascript files --}}
    <script src="{{ url(mix('js/dist/all.js')) }}" nonce="{{ csrf_token() }}"></script>

    <!-- v5-beta: This pGenerator call must remain here for v5 - until fixed - so that the JS password generator works for the user create modal. -->
    <script src="{{ url('js/pGenerator.jquery.js') }}"></script>

    {{-- Page level javascript --}}
    @stack('js')

    @section('moar_scripts')
    @show

  
    <script nonce="{{ csrf_token() }}">


        // ignore: 'input[type=hidden]' is required here to validate the select2 lists
        $.validate({
            form : '#create-form',
            modules : 'date, toggleDisabled',
            disabledFormFilter : '#create-form',
            showErrorDialogs : true,
            ignore: 'input[type=hidden]'
        });





        $(function () {
  
            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="popover"]').popover();
            $('.select2 span').addClass('needsclick');
            $('.select2 span').removeAttr('title');

            // This javascript handles saving the state of the menu (expanded or not)
            $('body').bind('expanded.pushMenu', function() {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('account.menuprefs', ['state'=>'open']) }}",
                    _token: "{{ csrf_token() }}"
                });

            });

            $('body').bind('collapsed.pushMenu', function() {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('account.menuprefs', ['state'=>'close']) }}",
                    _token: "{{ csrf_token() }}"
                });
            });

        });

        // Initiate the ekko lightbox
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });



    </script>

    @if ((Session::get('topsearch')=='true') || (Request::is('/')))
    <script nonce="{{ csrf_token() }}">
         $("#tagSearch").focus();
    </script>
    @endif

    <script type="text/javascript">
  $('input[type="checkbox"]').on('change', function() {
    $('input[name="' + this.name + '"]').not(this).prop('checked', false);
});
</script>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>


  </body>
</html>
