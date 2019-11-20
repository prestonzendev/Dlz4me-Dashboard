<?php

Breadcrumbs::register('admin.membershipdetails.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.membershipdetails.management'), route('admin.membershipdetails.index'));
});

Breadcrumbs::register('admin.membershipdetails.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.membershipdetails.index');
    $breadcrumbs->push(trans('menus.backend.membershipdetails.create'), route('admin.membershipdetails.create'));
});

Breadcrumbs::register('admin.membershipdetails.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.membershipdetails.index');
    $breadcrumbs->push(trans('menus.backend.membershipdetails.edit'), route('admin.membershipdetails.edit', $id));
});
