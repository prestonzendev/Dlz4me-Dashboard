<?php

Breadcrumbs::register('admin.termandconditions.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.termandconditions.management'), route('admin.termandconditions.index'));
});

Breadcrumbs::register('admin.termandconditions.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.termandconditions.index');
    $breadcrumbs->push(trans('menus.backend.termandconditions.create'), route('admin.termandconditions.create'));
});

Breadcrumbs::register('admin.termandconditions.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.termandconditions.index');
    $breadcrumbs->push(trans('menus.backend.termandconditions.edit'), route('admin.termandconditions.edit', $id));
});
