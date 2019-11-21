<?php

  header("Access-Control-Allow-Origin: *");

?>
<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<title><?php echo $__env->yieldContent('title', "DLZ4ME"); ?></title>
<?php echo Html::style('css/bootstrap.min.css'); ?>

<?php echo Html::style('css/jquery.smartmenus.bootstrap-4.css'); ?>

<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<?php echo Html::style('css/all.min.css'); ?>

<?php echo Html::style('css/owlcarouseltheme.css'); ?>

<?php echo Html::style('css/style.css'); ?>

<?php echo Html::style('css/responsive.css'); ?>

<?php echo Html::style('css/bootstrap-datetimepicker.min.css'); ?>

<?php echo Html::style('css/youcodehere/frontend-youcodehere.css'); ?>

<?php echo e(Html::script('js/jquery-2.2.3.min.js')); ?>


<!-- Scripts -->
        <script>
            window.Laravel = <?php
echo json_encode([
    'csrfToken' => csrf_token(),
]);
?>
        </script>
        <?php
        if (!empty($setting->google_analytics)) {
            echo $setting->google_analytics;
        }
        ?>
<?php echo $__env->yieldPushContent('forced-styles'); ?>
</head>

<body>
<?php echo $__env->make('frontend.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend.includes.slider', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php if($reqPath!=='/'): ?>
<div class="bradcrumb-sec">
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <?php if(strpos($reqPath, 'edit') !== false): ?>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        <?php else: ?>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e($reqPath); ?></li>
        <?php endif; ?>
    </ol>
</nav>
</div>
</div>
<?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('frontend.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- JavaScripts -->
    <?php echo $__env->yieldContent('before-scripts'); ?>
    <?php echo e(Html::script('js/moment.min.js')); ?>

    <?php echo e(Html::script('js/frontend/frontend.js')); ?>

    <?php echo e(Html::script('js/bootstrap-datetimepicker.min.js')); ?>

    <?php echo e(Html::script('js/youcodehere/frontend-youcodehere.js')); ?>

    <?php echo e(Html::script('js/youcodehere/jquery.inputmask.bundle.js')); ?>

    <?php echo e(Html::script('js/youcodehere/input-mask.js')); ?>

    <?php echo $__env->yieldContent('after-scripts'); ?>
</body>
</html>
