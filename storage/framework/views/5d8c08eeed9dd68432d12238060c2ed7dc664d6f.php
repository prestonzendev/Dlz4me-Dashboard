<?php echo Html::style('css/youcodehere/admin-login.css'); ?>

<?php echo Html::style('css/bootstrap.min.css'); ?>

<?php echo Html::script('js/bootstrap.min.js'); ?>

<?php echo e(Html::script('js/jquery-1.12.0.min.js')); ?>

<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <div class="panel-heading">Administrator Login</div>
    </div>
    <div class="fadeIn first">
      <img src="<?php echo e(env('IMG_URL')); ?>/storage/app/public/img/logo/<?php echo e($setting->logo); ?>" id="icon" alt="Administrator Login" />
    </div>
    <div class="form-group"><div class="col-md-12"><?php echo $__env->make('includes.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?></div></div>
    <!-- Login Form -->
    <?php echo e(Form::open(['route' => 'admin.login', 'class' => 'form-horizontal form-prevent-multiple-submissions'])); ?>

    <div class="panel-body">

                <?php echo e(Form::open(['route' => 'admin.login', 'class' => 'form-horizontal form-prevent-multiple-submissions'])); ?>


                <div class="form-group">
                    <div class="col-md-12">
                        <?php echo e(Form::input('email', 'email', $email, ['required' => 'required', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.email')])); ?>

                    </div><!--col-md-6-->
                </div><!--form-group-->

                <div class="form-group">
                    <div class="col-md-12">
                        <?php echo e(Form::input('password', 'password', null, ['required' => 'required', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.password')])); ?>

                    </div><!--col-md-6-->
                </div><!--form-group-->

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <?php echo e(Form::checkbox('remember')); ?> <?php echo e(trans('labels.frontend.auth.remember_me')); ?>

                            </label>
                        </div>
                    </div><!--col-md-6-->
                </div><!--form-group-->
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <?php echo e(Form::submit(trans('labels.frontend.auth.login_button'), ['class' => 'btn btn-primary button-prevent-mutiple-submissions', 'style' => 'margin-right:15px'])); ?>

                        
                    </div><!--col-md-6-->
                </div><!--form-group-->

               

            </div><!-- panel body -->
        <?php echo e(Form::close()); ?>


    <!-- Remind Passowrd -->
    <div id="formFooter">
      <?php echo e(link_to_route('admin.password.reset', trans('labels.frontend.passwords.forgot_password', ['class' => 'underlineHover']))); ?>

    </div>

  </div>
</div>

