@extends('layouts/basic')


{{-- Page content --}}
<style type="text/css">
    .alert-success, .bg-green, .callout.callout-success, .label-success, .modal-success .modal-body {
    background-color: #00a65a!important;
    color: white;
    height: 30px;
    padding: 3px;
}
.alert-danger, .alert-error, .bg-red, .callout.callout-danger, .label-danger, .modal-danger .modal-body {
    background-color: #dd4b39!important;
    color: white;
    height: 40px;
    padding: 3px;
}
.alert .close {
    color: #000;
    opacity: .2;
}
.alert .close:hover {
    opacity: .5;
}
.close {
    float: right;
    font-size: 21px;
    font-weight: 700;
    line-height: 0.5;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    opacity: .2;
}
.nine h1 {
   font-size:25px; text-transform:uppercase; color:white; letter-spacing:1px;
  font-family:"Playfair Display", serif; font-weight:300;
  width: 500px;
  left: 20px;
}
.nine h1 span {
  margin-top: 5px;
    font-size:15px; color:white; word-spacing:1px; font-weight:normal; letter-spacing:2px;
    text-transform: uppercase; font-family:"Raleway", sans-serif; font-weight:500;

    display: grid;
    grid-template-columns: 1fr max-content 1fr;
    grid-template-rows: 27px 0;
    grid-gap: 20px;
    align-items: center;
}

.nine h1 span:after,.nine h1 span:before {
    content: " ";
    display: block;
    border-bottom: 1px solid #ccc;
    border-top: 1px solid #ccc;
    height: 5px;
  background-color:#f8f8f8;
}

</style>
@section('content')


<!--<form id="login" action="{{ url('/login') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />


    <h1 id="ff-proof" class="ribbon">Residential Care Manager &nbsp;&nbsp;</h1>
    <div class="apple">
      <div class="top"><span></span></div>
      <div class="butt"><span></span></div>
      <div class="bite"></div>
  </div>
    <fieldset id="inputs">
        <input id="username" name="username" type="text" placeholder="Username" />
        <input id="password" type="text" name="password" placeholder="Password" />
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="SignIn"/>
        @if ($snipeSettings->login_note)
            <div class="col-md-12">
                <div class="alert alert-info" id="test" style="background-color: yellow;color: red;">
                    <p style="background-color:black;color: white;">{!!  Parsedown::instance()->text(e($snipeSettings->login_note))  !!}</p>
                </div>
            </div>
        @endif
     @include('notifications')
    </fieldset>
</form>-->

<div class="login-wrap">
  <div class="login-html">
    <div class="nine">
      <h1 style="color: white;font-size:25px;">Residential Care Manager</h1>
    </div>
    <!--<h2 style="color: white;font-size:25px;">Residential Care Manager</h2>-->
    <br>


        @if ($snipeSettings->login_note)
            <div class="col-md-12">
                <div class="alert alert-info" id="test" style="background-color: yellow;color: red;">
                    {!!  Parsedown::instance()->text(e($snipeSettings->login_note))  !!}
                </div>
            </div>
        @endif
<!-- Notifications -->
     @include('notifications')<br>
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label style="font-size:15px;" for="tab-1" class="tab">Sign In</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label style="font-size:15px;" for="tab-2" class="tab"></label>
    <div class="login-form">
     <br> <div class="sign-in-htm">
        <form id="login" action="{{ url('/login') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <br><div class="group" >
          <label for="user" class="label">Username</label>
          <input id="user" style="top: 5px;" name="username" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="pass" name="password" type="password" class="input" data-type="password">
        </div><br>
        <div class="group">

          <input id="check" type="checkbox" class="check" checked>
          <label for="check"><span class="icon"></span> Keep me Signed in</label>
        </div>
   
        <div class="group">
          <input type="submit" class="button" value="Sign In">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <a href="#forgot">Forgot Password?</a>
        </div>
    </form>
      </div>
      <div class="sign-up-htm">
        <div class="group">
          <label for="user" class="label">Username</label>
          <input id="user" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="pass" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <label for="pass" class="label">Repeat Password</label>
          <input id="pass" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <label for="pass" class="label">Email Address</label>
          <input id="pass" type="text" class="input">
        </div>
        <div class="group">
          <input type="submit" class="button" value="Sign Up">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <label for="tab-1">Already Member?</a>
        </div>
      </div>
    </div>
  </div>
</div>



@stop
