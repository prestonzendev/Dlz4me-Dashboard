<?php $__env->startSection('content'); ?>
<div class="inside-wrapper dashboard-page">
    <div class="container">
        <div class="inside-wrapperInner">
        <div class="row">
        	<h1><?php echo e($homecontent['home-text']['title']); ?></h1>
        	<?php echo e(strip_tags($homecontent['home-text']['description'])); ?>

          
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>