<?php

Breadcrumbs::register('admin.servicecategories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.servicecategories.management'), route('admin.servicecategories.index'));
});

Breadcrumbs::register('admin.servicecategories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.servicecategories.index');
    $breadcrumbs->push(trans('menus.backend.servicecategories.create'), route('admin.servicecategories.create'));
});

Breadcrumbs::register('admin.servicecategories.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.servicecategories.index');
    $breadcrumbs->push(trans('menus.backend.servicecategories.edit'), route('admin.servicecategories.edit', $id));
});
