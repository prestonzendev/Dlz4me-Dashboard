<?php

Breadcrumbs::register('admin.enquiries.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.enquiries.management'), route('admin.enquiries.index'));
});

Breadcrumbs::register('admin.enquiries.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.enquiries.index');
    $breadcrumbs->push(trans('menus.backend.enquiries.create'), route('admin.enquiries.create'));
});

Breadcrumbs::register('admin.enquiries.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.enquiries.index');
    $breadcrumbs->push(trans('menus.backend.enquiries.edit'), route('admin.enquiries.edit', $id));
});
