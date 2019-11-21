<div class="header">
  <div class="top-headerbar header-phone-email">
  <div class="container">
    <div class="d-flex justify-content-between">
      <div class="top-left">
      	<ul>
        	<li>Email: <?php echo e($setting->company_email); ?></li>
            <li>Phone: <?php echo e($setting->company_contact); ?></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="top-headerbar top-logo-header">
  <div class="container">
    <div class="d-flex justify-content-between">
      <div class="logo-left">
      	<a href="<?php echo e(route('frontend.index')); ?>"><img src="<?php echo e(env('IMG_URL')); ?>/storage/app/public/img/logo/<?php echo e($setting->logo); ?>" alt="<?php echo e(env('APP_NAME')); ?>"></a>
      </div>
      <div class="logo-right">
        <ul>
            <li><a href="<?php echo e(url('admin/login')); ?>" class="active">Login</a></li>
        </ul>
        <!-- <ul>
            <li><a href="<?php echo e(url('change-language/en')); ?>">English</a></li>
            <li><a href="<?php echo e(url('change-language/fr')); ?>">French</a></li>
        </ul> -->
      	
      </div>
    </div>
  </div>
</div>
<?php echo $__env->make('frontend.includes.nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>