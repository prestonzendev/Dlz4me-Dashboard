<!--Action Button-->
<?php if(Active::checkUriPattern('admin/access/user/customers') || Active::checkUriPattern('admin/access/user/customers/deleted') || Active::checkUriPattern('admin/access/user/customers/deactivated')): ?>
<?php endif; ?>
<!--Action Button-->
<div class="btn-group">
    <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown">Action
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="<?php echo e(route('admin.access.user.vendor.index')); ?>"><i class="fa fa-list-ul"></i> List</a></li>
        <?php if (access()->allow('create-user')): ?>
        <li><a href="<?php echo e(route('admin.access.user.vendor.create')); ?>"><i class="fa fa-plus"></i> Add new</a></li>
        <?php endif; ?>
        <?php if (access()->allow('view-deactive-user')): ?>
        <li><a href="<?php echo e(route('admin.access.user.deactivated')); ?>"><i class="fa fa-square"></i> Deactivated Users</a></li>
        <?php endif; ?>
        <?php if (access()->allow('view-deleted-user')): ?>
        <?php endif; ?>
    </ul>
</div>
