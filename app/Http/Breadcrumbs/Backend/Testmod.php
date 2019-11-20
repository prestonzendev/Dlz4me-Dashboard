<?php

Breadcrumbs::register('admin.testmods.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.testmods.management'), route('admin.testmods.index'));
});

Breadcrumbs::register('admin.testmods.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.testmods.index');
    $breadcrumbs->push(trans('menus.backend.testmods.create'), route('admin.testmods.create'));
});

Breadcrumbs::register('admin.testmods.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.testmods.index');
    $breadcrumbs->push(trans('menus.backend.testmods.edit'), route('admin.testmods.edit', $id));
});
