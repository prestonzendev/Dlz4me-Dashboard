@extends('frontend.layouts.app')

@section('content')

<div class="inside-wrapper form-page login-page">
    <div class="container">
      <div class="inside-wrapperInner">
        <div class="row">
          <div class="col-md-1">&nbsp;</div>
          <div class="col-md-11">
            <div class="form-block">
              {{ Form::open(['route' => 'frontend.auth.password.change', 'class' => 'form-horizontal form-prevent-multiple-submissions', 'method'=>'patch']) }}
                <div class="form-inner">
                  <div class="row">
                    <div class="col-md-6 field">
                      {{ Form::input('password', 'old_password', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Old Password']) }}
                    </div>
                    
                    <div class="col-md-12"> </div>
                  </div>

                    <div class="row">
                    <div class="col-md-6 field">
                      {{ Form::input('password', 'password', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'New Password']) }}
                      <small>Note: Password contains at least 8 characters. </small>
                    </div>
                    <div class="col-md-6 field">
                     {{ Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.register-user.password_confirmation')]) }}
                    </div>
                    <div class="col-md-12"> </div>
                  </div>
                </div>
                <div class="btn-outer text-right">
                   {{ Form::submit('Change Password', ['class' => 'button-prevent-mutiple-submissions btn-purple']) }}
                </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
