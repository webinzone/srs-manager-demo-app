@extends('layouts/default')

{{-- Page title --}}
@section('title')
	

@parent
@stop

@section('header_right')
<a href="{{ URL::previous() }}" class="btn btn-primary pull-right">
  {{ trans('general.back') }}</a>
@stop

{{-- Page content --}}
@section('content')

<style>
    .form-horizontal .control-label {
      padding-top: 0px;
    }

    input[type='text'][disabled], input[disabled], textarea[disabled], input[readonly], textarea[readonly], .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
      background-color: white;
      color: #555555;
      cursor:text;
    }
    table.permissions {
      display:flex;
      flex-direction: column;
    }

    .permissions.table > thead, .permissions.table > tbody {
      margin: 15px;
      margin-top: 0px;
    }

    .permissions.table > tbody {
        border: 1px solid;
    }

    .header-row {
      border-bottom: 1px solid #ccc;
    }

    .permissions-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .table > tbody > tr > td.permissions-item {
      padding: 1px;
      padding-left: 8px;
    }

    .header-name {
      cursor: pointer;
    }

</style>
<div id="webui">
  
    <div class="row">
        <!-- col-md-8 -->
         <div class=" col" style="padding-left: 170px;">

    <form class="form-horizontal" method="post" autocomplete="off" action="{{ (isset($user->id)) ? route('users.update', ['user' => $user->id]) : route('users.store') }}" enctype="multipart/form-data" id="userForm" style="width: 900px;">
      {{csrf_field()}}

      @if($user->id)
          {{ method_field('PUT') }}
      @endif
        <!-- Custom Tabs -->
      <div class="nav-tabs-custom">
        <!--<ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Information</a></li>
          <li><a href="#tab_2" data-toggle="tab">Permissions</a></li>
        </ul>-->
         <div class="box box-default">
        <div class="box-header with-border text-center">
                   <h3><b>@if(Auth::user()->s_role == "super_admin")
                      Admin Users
                     @else
                       Users
                     @endif</b></h3>
                   
                </div>
        <div class="box-body" style="padding-left: 40px;padding-right: 40px;">
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <div class="row">
              <div class="col-md-12">
                <!-- First Name -->
                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                  <label class="col-md-3 control-label" for="first_name">{{ trans('general.first_name') }}</label>
                  <div class="col-md-6{{  (\App\Helpers\Helper::checkIfRequired($user, 'first_name')) ? ' required' : '' }}">
                    <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}" />
                    {!! $errors->first('first_name', '<span class="alert-msg" aria-hidden="true">:message</span>') !!}
                  </div>
                </div>

                <!-- Last Name -->
                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                  <label class="col-md-3 control-label" for="last_name">{{ trans('general.last_name') }} </label>
                  <div class="col-md-6{{  (\App\Helpers\Helper::checkIfRequired($user, 'last_name')) ? ' required' : '' }}">
                    <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}" />
                    {!! $errors->first('last_name', '<span class="alert-msg" aria-hidden="true">:message</span>') !!}
                  </div>
                </div>

                <!-- Username -->
                <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                  <label class="col-md-3 control-label" for="username">{{ trans('admin/users/table.username') }}</label>
                  <div class="col-md-6{{  (\App\Helpers\Helper::checkIfRequired($user, 'username')) ? ' required' : '' }}">
                    @if ($user->ldap_import!='1' || str_contains(Route::currentRouteName(), 'clone'))
                      <input
                        class="form-control"
                        type="text"
                        name="username"
                        id="username"
                        value="{{ Request::old('username', $user->username) }}"
                        autocomplete="off"
                        readonly
                        onfocus="this.removeAttribute('readonly');"
                        {{ ((config('app.lock_passwords') && ($user->id)) ? ' disabled' : '') }}
                      >
                      @if (config('app.lock_passwords') && ($user->id))
                        <p class="help-block">{{ trans('admin/users/table.lock_passwords') }}</p>
                      @endif
                    @else
                      (Managed via LDAP)
                          <input type="hidden" name="username" value="{{ Request::old('username', $user->username) }}">

                    @endif

                    {!! $errors->first('username', '<span class="alert-msg" aria-hidden="true">:message</span>') !!}
                  </div>
                </div>

                <!-- Password -->
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                  <label class="col-md-3 control-label" for="password">
                    {{ trans('admin/users/table.password') }}
                  </label>
                  <div class="col-md-6{{  (\App\Helpers\Helper::checkIfRequired($user, 'password')) ? ' required' : '' }}">
                    @if ($user->ldap_import!='1' || str_contains(Route::currentRouteName(), 'clone') )
                      <input
                        type="password"
                        name="password"
                        class="form-control"
                        id="password"
                        value="{{ Request::old('password', $user->password) }}"
                        autocomplete="off"
                        readonly
                        onfocus="this.removeAttribute('readonly');"
                        {{ ((config('app.lock_passwords') && ($user->id)) ? ' disabled' : '') }}>
                    @else
                      (Managed via LDAP)
                    @endif
                    <span id="generated-password"></span>
                    {!! $errors->first('password', '<span class="alert-msg" aria-hidden="true">:message</span>') !!}
                  </div>
                  <div class="col-md-2">
                    @if ($user->ldap_import!='1')
                      <a href="#" class="left" id="genPassword">Generate</a>
                    @endif
                  </div>
                </div>

                @if ($user->ldap_import!='1' || str_contains(Route::currentRouteName(), 'clone'))
                <!-- Password Confirm -->
                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                  <label class="col-md-3 control-label" for="password_confirmation">
                    {{ trans('admin/users/table.password_confirm') }}
                  </label>
                  <div class="col-md-6{{  ((\App\Helpers\Helper::checkIfRequired($user, 'first_name')) && (!$user->id)) ? ' required' : '' }}">
                    <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirm"
                    class="form-control"
                    value="{{ Request::old('password', $user->password) }}"
                    autocomplete="off"
                    aria-label="password_confirmation"
                    readonly
                    onfocus="this.removeAttribute('readonly');"
                    {{ ((config('app.lock_passwords') && ($user->id)) ? ' disabled' : '') }}
                    >
                    @if (config('app.lock_passwords') && ($user->id))
                    <p class="help-block">{{ trans('admin/users/table.lock_passwords') }}</p>
                    @endif
                    {!! $errors->first('password_confirmation', '<span class="alert-msg" aria-hidden="true">:message</span>') !!}
                  </div>
                </div>
                @endif

              <!-- Activation Status -->
                   <div class="form-group {{ $errors->has('activated') ? 'has-error' : '' }}">
                          
                             <label class="col-md-3 control-label" >
                              {{  trans('general.login_enabled') }}
                            </label>
                          <div class="col-md-9">
                              @if (config('app.lock_passwords'))
                                  <div class="icheckbox disabled" style="padding-left: 10px;">
                                      <input type="checkbox" value="1" name="activated" class="minimal disabled" {{ (old('activated', $user->activated)) == '1' ? ' checked="checked"' : '' }} disabled="disabled" aria-label="activated">
                                      <!-- this is necessary because the field is disabled and will reset -->
                                      <input type="hidden" name="activated" value="{{ $user->activated }}">
                                      {{ trans('admin/users/general.activated_help_text') }}
                                      <p class="help-block">{{ trans('general.feature_disabled') }}</p>

                                  </div>
                              @elseif ($user->id === Auth::user()->id)
                                  <div class="icheckbox disabled" style="padding-left: 10px;">
                                      <input type="checkbox" value="1" name="activated" class="minimal disabled" {{ (old('activated', $user->activated)) == '1' ? ' checked="checked"' : '' }} disabled="disabled">
                                      <!-- this is necessary because the field is disabled and will reset -->
                                      <input type="hidden" name="activated" value="1" aria-label="activated">
                                      {{ trans('admin/users/general.activated_help_text') }}
                                      <p class="help-block">{{ trans('admin/users/general.activated_disabled_help_text') }}</p>
                                  </div>
                              @else
                                  <div style="padding-left: 10px;">
                                      <input type="checkbox" value="1" id="activated" name="activated" class="minimal" {{ (old('activated', $user->activated)) == '1' ? ' checked="checked"' : '' }} aria-label="activated">
                                      {{ trans('admin/users/general.activated_help_text') }}
                                  </div>
                              @endif

                              {!! $errors->first('activated', '<span class="alert-msg" aria-hidden="true">:message</span>') !!}

                      </div>
                  </div>


                  <!-- Email -->
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                  <label class="col-md-3 control-label" for="email">{{ trans('admin/users/table.email') }} </label>
                  <div class="col-md-6{{  (\App\Helpers\Helper::checkIfRequired($user, 'email')) ? ' required' : '' }}">
                    <input
                      class="form-control"
                      type="text"
                      name="email"
                      id="email"
                      value="{{ Request::old('email', $user->email) }}"
                      {{ ((config('app.lock_passwords') && ($user->id)) ? ' disabled' : '') }}
                      autocomplete="off"
                      readonly
                      onfocus="this.removeAttribute('readonly');">
                    @if (config('app.lock_passwords') && ($user->id))
                    <p class="help-block">{{ trans('admin/users/table.lock_passwords') }}</p>
                    @endif
                    {!! $errors->first('email', '<span class="alert-msg" aria-hidden="true">:message</span>') !!}
                  </div>
                </div>


                  <!-- Email user -->
                 <!-- @if (!$user->id)
                      <div class="form-group" id="email_user_row">
                          <div class="col-sm-3">
                          </div>
                          <div class="col-md-9">
                              <div class="icheckbox disabled" id="email_user_div">
                                  {{ Form::checkbox('email_user', '1', Request::old('email_user'),['class' => 'minimal', 'disabled'=>true, 'id' => 'email_user_checkbox']) }}
                                  Email this user their credentials?

                              </div>
                              <p class="help-block">
                                  {{ trans('admin/users/general.send_email_help') }}
                              </p>


                          </div>
                      </div> 
                  @endif-->

                <!-- Company --> 
                <div class="form-group" >
                 <div class="col-md-3 mb-3">
                  <label for="name" >Company Id</label>
                </div>
                     <div class="col-md-4 mb-3">
                       @if(Auth::user()->s_role == "c_admin")
                         <select class="form-control" style="height: 26px;padding: 3px 10px;"  name="companyid" >                         
                         
                          <option value="{{ Auth::user()->c_id }}" >{{ Auth::user()->c_id }}</option>
                
                        </select>   
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
                  @if(Auth::user()->s_role == "c_admin")
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
                  @if(Auth::user()->s_role == "c_admin")
                    
                        <select class="form-control" style="height: 26px;padding: 3px 10px;"  name="locationid" id="location_id">
                          <option value="{{ Auth::user()->l_id  }}" >{{ Auth::user()->l_id  }}</option>
                        </select>
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
              @if(Auth::user()->s_role == "c_admin")
                        <input type="text" name="locationname" value="{{ Auth::user()->locationname }}"  placeholder="Location" readonly>
                  @else
                    <input type="text" name="locationname"  value="{{ $user->locationname }}" id="loccc" placeholder="Location" readonly> 
                @endif
                                          
                 </div>
          </div>


         
              </div> <!--/col-md-12-->
            </div>
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane" id="tab_2">
            <div class="col-md-12">
              @if (!Auth::user()->isSuperUser())
                <p class="alert alert-warning">Only superadmins may grant a user superadmin access.</p>
              @endif
            </div>

            <table class="table table-striped permissions">
              <thead>
                <tr class="permissions-row">
                  <th class="col-md-5">Permission</th>
                  <th class="col-md-1">Grant</th>
                  <th class="col-md-1">Deny</th>
                  <th class="col-md-1">Inherit</th>
                </tr>
              </thead>
                @include('partials.forms.edit.permissions-base')
            </table>
          </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
        <div class="box-footer text-right">
          <button type="submit" class="btn btn-primary"><i class="fa fa-check icon-white" aria-hidden="true"></i> {{ trans('general.save') }}</button>
        </div>
      </div>
    </div>
  <!-- nav-tabs-custom -->
    </form>
  </div>
  </div>
  </div> <!--/col-md-8-->
</div><!--/row-->
@stop

@section('moar_scripts')

<script>
$('#company_id').change(function(){
    var id = $(this).val();
    var url = '{{ route("getCompanyName", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#comp').val(response.company_name);            

            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script>
$('#company_id').change(function(){
    var id = $(this).val();
    var url = '{{ route("getLname", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#loccc').val(response.master_name);            

            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script>
$('#location_id').change(function(){
    var id = $(this).val();
    var url = '{{ route("getLocationName", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#loccc').val(response.master_name);            

            }
            else{
              alert("error");
 
            }
        }
    });
});
</script>
<script nonce="{{ csrf_token() }}">
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
                  output.push(`<option value="${location.id}" >${location.location_id}</option>`)
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

<script nonce="{{ csrf_token() }}">
$(document).ready(function() {

    $('#activated').on('ifChecked', function(event){
        console.log('user activated is checked');
        $("#email_user_row").show();
	});

    $('#activated').on('ifUnchecked', function(event){
        $("#email_user_row").hide();
    });

    $('#email').on('keyup',function(){
        event.preventDefault();

        if(this.value.length > 5){
            $('#email_user_checkbox').iCheck('enable');
        } else {
            $('#email_user_checkbox').iCheck('disable').iCheck('uncheck');
        }
    });


	// Check/Uncheck all radio buttons in the group
    $('tr.header-row input:radio').on('ifClicked', function () {
        value = $(this).attr('value');
        area = $(this).data('checker-group');
        $('.radiochecker-'+area+'[value='+value+']').iCheck('check');
    });

    $('.header-name').click(function() {
        $(this).parent().nextUntil('tr.header-row').slideToggle(500);
    });

    $('.tooltip-base').tooltip({container: 'body'})
    $(".superuser").change(function() {
        var perms = $(this).val();
        if (perms =='1') {
            $("#nonadmin").hide();
        } else {
            $("#nonadmin").show();
        }
    });

    $('#genPassword').pGenerator({
        'bind': 'click',
        'passwordElement': '#password',
        'displayElement': '#generated-password',
        'passwordLength': 16,
        'uppercase': true,
        'lowercase': true,
        'numbers':   true,
        'specialChars': true,
        'onPasswordGenerated': function(generatedPassword) {
            $('#password_confirm').val($('#password').val());
        }
    });

    $("#two_factor_reset").click(function(){
        $("#two_factor_resetrow").removeClass('success');
        $("#two_factor_resetrow").removeClass('danger');
        $("#two_factor_resetstatus").html('');
        $("#two_factor_reseticon").html('<i class="fa fa-spinner spin"></i>');
        $.ajax({
            url: '{{ route('api.users.two_factor_reset', ['id'=> $user->id]) }}',
            type: 'POST',
            data: {},
            headers: {
                "X-Requested-With": 'XMLHttpRequest',
                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',

            success: function (data) {
                $("#two_factor_reseticon").html('');
                $("#two_factor_resetstatus").html('<i class="fa fa-check text-success"></i>' + data.message);
            },

            error: function (data) {
                $("#two_factor_reseticon").html('');
                $("#two_factor_reseticon").html('<i class="fa fa-exclamation-triangle text-danger"></i>');
                $('#two_factor_resetstatus').text(data.message);
            }


        });
    });


});
</script>


@stop
