<!doctype html>
<html class="no-js" lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" sizes="16x16" type="image/png" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/storage/app/public/img/favicon/<?php echo e(settings()->favicon); ?>">

    <title><?php echo $__env->yieldContent('title', 'DLZ4ME'); ?></title>

    <!-- Meta -->
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Default Description'); ?>">
    <meta name="author" content="<?php echo $__env->yieldContent('meta_author', 'Viral Solani'); ?>">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <?php echo $__env->yieldContent('meta'); ?>

    <!-- Styles -->
    <?php echo $__env->yieldContent('before-styles'); ?>

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    <?php if (session()->has('lang-rtl')): ?>
    <?php echo e(Html::style(getRtlCss(mix('css/backend.css')))); ?>

    <?php else: ?>
    <?php echo e(Html::style(mix('css/backend.css'))); ?>

    <?php endif; ?>
    <?php echo e(Html::style(mix('css/backend-custom.css'))); ?>

    <!-- <?php echo e(Html::style('css/universal.css')); ?> -->
    <?php echo $__env->yieldContent('after-styles'); ?>

    <!-- Html5 Shim and Respond.js IE8 support of Html5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <?php echo e(Html::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')); ?>

        <?php echo e(Html::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js')); ?>

    <![endif]-->

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([ 'csrfToken' => csrf_token() ]); ?>

        ;
    </script>
<?php
if (!empty($google_analytics)) {
    echo $google_analytics;
}
?>
</head>
<body class="skin-<?php echo e(config('backend.theme')); ?> <?php echo e(config('backend.layout')); ?>">
    <div class="loading" style="display:none"></div>
    <?php echo $__env->make('includes.partials.logged-in-as', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="wrapper" id="app">
        <?php echo $__env->make('backend.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('backend.includes.sidebar-dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <?php echo $__env->yieldContent('page-header'); ?>
                <!-- Breadcrumbs would render from routes/breadcrumb.php -->
                <?php if(Breadcrumbs::exists()): ?>
                <?php echo Breadcrumbs::render(); ?>

                <?php endif; ?>
            </section>

            <!-- Main content -->
            <section class="content main-container">
                <?php echo $__env->make('includes.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->yieldContent('content'); ?>
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <?php echo $__env->make('backend.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div><!-- ./wrapper -->

    <!-- JavaScripts -->
    <?php echo $__env->yieldContent('before-scripts'); ?>
    <?php echo e(Html::script(mix('js/backend.js'))); ?>

    <?php echo e(Html::script(mix('js/backend-custom.js'))); ?>

    <?php echo e(Html::script('js/youcodehere/backend-youcodehere.js')); ?>

    <?php echo e(Html::script('js/youcodehere/jquery.inputmask.bundle.js')); ?>

    <?php echo e(Html::script('js/youcodehere/input-mask.js')); ?>

    <?php echo e(Html::script('js/moment.min.js')); ?>

    <?php echo e(Html::script('js/bootstrap-datetimepicker.min.js')); ?>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApy3vqAJKoRjGcuwZP19SXXgX22EB_xhA&libraries=places&callback=initAutocomplete"
async defer></script>
    <?php echo $__env->yieldContent('after-scripts'); ?>
</body>
</html>
