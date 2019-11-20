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
              {{ Form::open(['route' => 'frontend.auth.password.reset', 'class' => 'form-horizontal form-prevent-multiple-submissions']) }}
              <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-inner">
                  <div class="row">
                    <div class="form-group">
                            <div class="col-md-12">
                                {{ Form::label('email', trans('validation.attributes.frontend.register-user.email') . ' : ', ['class' => 'control-label']) }}
                                {{ $email }} 
                                {{ Form::input('hidden', 'email', $email, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }} 
                            </div><!--col-md-6-->
                        </div><!--form-group-->
                    </div>

                    <div class="row">
                    <div class="col-md-6 field">
                      {{ Form::input('password', 'password', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.register-user.password')]) }}
                      <small>Note: Password must contain at least 8 characters. </small>
                    </div>
                    <div class="col-md-6 field">
                     {{ Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.register-user.password_confirmation')]) }}
                    </div>
                    <div class="col-md-12"> </div>
                  </div>
                </div>
                <div class="btn-outer text-right">
                   {{ Form::submit(trans('labels.frontend.passwords.reset_password_button'), ['class' => 'btn btn-primary button-prevent-mutiple-submissions']) }}
                </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
