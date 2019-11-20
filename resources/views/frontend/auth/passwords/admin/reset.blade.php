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
      <img src="{{env('IMG_URL')}}/storage/app/public/img/logo/{{$setting->logo}}" id="icon" alt="Administrator Login" />
    </div>
    <div class="form-group"><div class="col-md-12">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div></div>
    <!-- Login Form -->
    <div class="panel panel-default">

                <div class="panel-heading">{{ trans('labels.frontend.passwords.reset_password_box_title') }}</div>

                <div class="panel-body">

                    {{ Form::open(['route' => 'frontend.auth.password.reset', 'class' => 'form-horizontal form-prevent-multiple-submissions']) }}

                    <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            {{ Form::label('email', trans('validation.attributes.frontend.register-user.email'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                <p class="form-control-static">{{ $email }}</p>
                                {{ Form::input('hidden', 'email', $email, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
                            </div><!--col-md-6-->
                        </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('password', trans('validation.attributes.frontend.register-user.password'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('password', 'password', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.register-user.password')]) }}
                            <small>Note: Password must contain at least 8 characters, 1 uppercase letter and 1 number. </small>
                        </div><!--col-md-6-->
                        
                    </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('password_confirmation', trans('validation.attributes.frontend.register-user.password_confirmation'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.register-user.password_confirmation')]) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {{ Form::submit(trans('labels.frontend.passwords.reset_password_button'), ['class' => 'btn btn-primary button-prevent-mutiple-submissions']) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    {{ Form::close() }}

                </div><!-- panel body -->

            </div><!-- panel -->

    <!-- Remind Passowrd -->
    <div id="formFooter">
      {{ link_to_route('admin.password.reset', trans('labels.frontend.passwords.forgot_password', ['class' => 'underlineHover'])) }}
    </div>

  </div>
</div>




    <div class="row" style="margin-top: 50px;">
        <div class="col-md-8 col-md-offset-2">

            

            

        </div><!-- col-md-8 -->

    </div><!-- row -->
