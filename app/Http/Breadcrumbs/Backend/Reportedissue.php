<?php

Breadcrumbs::register('admin.reportedissues.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.reportedissues.management'), route('admin.reportedissues.index'));
});

Breadcrumbs::register('admin.reportedissues.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.reportedissues.index');
    $breadcrumbs->push(trans('menus.backend.reportedissues.create'), route('admin.reportedissues.create'));
});

Breadcrumbs::register('admin.reportedissues.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.reportedissues.index');
    $breadcrumbs->push(trans('menus.backend.reportedissues.edit'), route('admin.reportedissues.edit', $id));
});
