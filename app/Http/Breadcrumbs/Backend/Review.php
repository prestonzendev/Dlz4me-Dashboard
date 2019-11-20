<?php

Breadcrumbs::register('admin.reviews.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.reviews.management'), route('admin.reviews.index'));
});

Breadcrumbs::register('admin.reviews.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.reviews.index');
    $breadcrumbs->push(trans('menus.backend.reviews.create'), route('admin.reviews.create'));
});

Breadcrumbs::register('admin.reviews.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.reviews.index');
    $breadcrumbs->push(trans('menus.backend.reviews.edit'), route('admin.reviews.edit', $id));
});
