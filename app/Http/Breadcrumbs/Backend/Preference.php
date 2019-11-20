<?php

Breadcrumbs::register('admin.preferences.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.preferences.management'), route('admin.preferences.index'));
});

Breadcrumbs::register('admin.preferences.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.preferences.index');
    $breadcrumbs->push(trans('menus.backend.preferences.create'), route('admin.preferences.create'));
});

Breadcrumbs::register('admin.preferences.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.preferences.index');
    $breadcrumbs->push(trans('menus.backend.preferences.edit'), route('admin.preferences.edit', $id));
});
