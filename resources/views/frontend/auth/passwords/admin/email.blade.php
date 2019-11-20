{!! Html::style('css/youcodehere/admin-login.css') !!}
{!! Html::style('css/bootstrap.min.css') !!}
{!! Html::script('js/bootstrap.min.js') !!}
{{ Html::script('js/jquery-1.12.0.min.js') }}
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <div class="panel-heading">Forgot Password</div>
    </div>
    <div class="fadeIn first">
      <img src="{{env('IMG_URL')}}/storage/app/public/img/logo/{{$setting->logo}}" id="icon" alt="Administrator Login" />
    </div>
    <div class="form-group"><div class="col-md-12">@include('includes.partials.messages')</div></div>
    <!-- Login Form -->
    {{ Form::open(['route' => 'admin.password.email', 'class' => 'form-horizontal form-prevent-multiple-submissions']) }}
    <div class="panel-body">

                <div class="form-group">
                    <div class="col-md-12">
                        {{ Form::input('email', 'email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
                    </div><!--col-md-6-->
                </div><!--form-group-->

                <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {{ Form::submit(trans('labels.frontend.passwords.send_password_reset_link_button'), ['class' => 'btn btn-primary button-prevent-mutiple-submissions']) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->
            </div><!-- panel body -->
        {{ Form::close() }}

    <!-- Remind Passowrd -->
    <div id="formFooter">
      {{ link_to_route('admin.login', 'Go back to Login?') }}
    </div>

  </div>
</div>

