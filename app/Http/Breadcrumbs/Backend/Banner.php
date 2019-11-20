<?php

Breadcrumbs::register('admin.banners.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.banners.management'), route('admin.banners.index'));
});

Breadcrumbs::register('admin.banners.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.banners.index');
    $breadcrumbs->push(trans('menus.backend.banners.create'), route('admin.banners.create'));
});

Breadcrumbs::register('admin.banners.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.banners.index');
    $breadcrumbs->push(trans('menus.backend.banners.edit'), route('admin.banners.edit', $id));
});
