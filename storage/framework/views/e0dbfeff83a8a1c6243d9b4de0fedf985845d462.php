<li class="<?php echo e(active_class(isActiveMenuItem($item))); ?> <?php if(!empty($item->children)): ?> <?php echo e('treeview'); ?> <?php endif; ?> ">
    <a href="<?php echo e(getRouteUrl($item->url, $item->url_type)); ?>" <?php if(!empty($item->open_in_new_tab) && ($item->open_in_new_tab == 1)): ?> <?php echo e('target="_blank"'); ?> <?php endif; ?>>
        <i class="fa <?php echo e(@$item->icon); ?>"></i>
        <span><?php echo e($item->name); ?></span>
        <?php if(!empty($item->children)): ?>
            <i class="fa fa-angle-left pull-right"></i>
        <?php endif; ?>
    </a>
    <?php if(!empty($item->children)): ?>
    <ul class="treeview-menu <?php echo e(active_class(isActiveMenuItem($item), 'menu-open')); ?>" style="display: none; <?php echo e(active_class(isActiveMenuItem($item), 'display: block;')); ?>">
        <?php echo e(renderMenuItems($item->children)); ?>

    </ul>
    <?php endif; ?>
</li>
