<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header"><?php echo e(trans('menus.backend.sidebar.general')); ?></li>
            <li class="<?php echo e(active_class(Active::checkUriPattern('admin/dashboard'))); ?>">
                <a href="<?php echo e(route('admin.dashboard')); ?>">
                    <i class="fa fa-dashboard"></i>
                    <span><?php echo e(trans('menus.backend.sidebar.dashboard')); ?></span>
                </a>
            </li>
            <li class="header"><?php echo e(trans('menus.backend.sidebar.system')); ?></li>
            <?php echo e(renderMenuItems(getMenuItems())); ?>

        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside>
