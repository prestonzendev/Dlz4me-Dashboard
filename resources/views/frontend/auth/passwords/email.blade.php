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
              {{ Form::open(['route' => 'frontend.auth.password.email', 'class' => 'form-horizontal form-prevent-multiple-submissions']) }}
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="form-inner">
                  <div class="row">
                    <div class="col-md-12 field">
                      {{ Form::input('email', 'email', null, ['class' => 'form-control inp', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
                    </div>
                    <div class="col-md-12">
                      <div class="remember-block d-flex justify-content-between align-items-center">
                        <div class="custom-control custom-checkbox"></div>
                       <span><a href="{{route('frontend.auth.login')}}" class="link">Go back to Login ?</a></span> </div>
                    </div>
                  </div>
                </div>
                <div class="btn-outer text-right">
                  {{ Form::submit(trans('labels.frontend.passwords.send_password_reset_link_button'), ['class' => 'btn-purple button-prevent-mutiple-submissions']) }}
                </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
