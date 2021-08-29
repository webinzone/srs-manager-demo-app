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

      @include ('partials.nav_side')

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
