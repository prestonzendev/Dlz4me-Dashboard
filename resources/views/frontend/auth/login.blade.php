@extends('frontend.layouts.app')

@section('content')

<div class="inside-wrapper form-page login-page">
    <div class="container">
      <div class="inside-wrapperInner">
        <div class="row">
          <div class="col-md-4">
            @include('frontend.includes.reglogin')
          </div>
          <div class="col-md-8">
            <div class="form-block">
              {{ Form::open(['route' => 'frontend.auth.login', 'class' => 'form-horizontal form-prevent-multiple-submissions']) }}
                <div class="form-inner">
                  <div class="row">
                    <div class="col-md-6 field">
                      {{ Form::input('email', 'email', $email, ['class' => 'form-control inp', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('password', 'password', null, ['class' => 'form-control inp', 'placeholder' => trans('validation.attributes.frontend.register-user.password')]) }}
                    </div>
                    <div class="col-md-12">
                      <div class="remember-block d-flex justify-content-between align-items-center"> 
                      <div class="custom-control custom-checkbox">
                          {{ Form::checkbox('remember', null, null, ['class' => 'custom-control-input', 'id' => 'customCheck']) }}
                          <label class="custom-control-label" for="customCheck">{{ trans('labels.frontend.auth.remember_me') }}</label>
                        </div>
                       <span><a href="{{route('frontend.auth.password.reset')}}" class="link">{{trans('labels.frontend.passwords.forgot_password')}}</a></span> </div>
                    </div>
                  </div>
                </div>
                <div class="btn-outer text-right">
                  {{ Form::submit(trans('labels.frontend.auth.login_button'), ['class' => 'btn-purple', 'style' => 'margin-right:15px']) }}
                </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
