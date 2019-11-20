<?php

Breadcrumbs::register('admin.subscriptionplans.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.subscriptionplans.management'), route('admin.subscriptionplans.index'));
});

Breadcrumbs::register('admin.subscriptionplans.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.subscriptionplans.index');
    $breadcrumbs->push(trans('menus.backend.subscriptionplans.create'), route('admin.subscriptionplans.create'));
});

Breadcrumbs::register('admin.subscriptionplans.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.subscriptionplans.index');
    $breadcrumbs->push(trans('menus.backend.subscriptionplans.edit'), route('admin.subscriptionplans.edit', $id));
});
