<?php

Breadcrumbs::register('admin.policytypes.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.policytypes.management'), route('admin.policytypes.index'));
});

Breadcrumbs::register('admin.policytypes.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.policytypes.index');
    $breadcrumbs->push(trans('menus.backend.policytypes.create'), route('admin.policytypes.create'));
});

Breadcrumbs::register('admin.policytypes.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.policytypes.index');
    $breadcrumbs->push(trans('menus.backend.policytypes.edit'), route('admin.policytypes.edit', $id));
});
