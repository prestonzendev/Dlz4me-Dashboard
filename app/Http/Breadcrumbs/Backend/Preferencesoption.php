<?php

Breadcrumbs::register('admin.preferencesoptions.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.preferencesoptions.management'), route('admin.preferencesoptions.index'));
});

Breadcrumbs::register('admin.preferencesoptions.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.preferencesoptions.index');
    $breadcrumbs->push(trans('menus.backend.preferencesoptions.create'), route('admin.preferencesoptions.create'));
});

Breadcrumbs::register('admin.preferencesoptions.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.preferencesoptions.index');
    $breadcrumbs->push(trans('menus.backend.preferencesoptions.edit'), route('admin.preferencesoptions.edit', $id));
});
