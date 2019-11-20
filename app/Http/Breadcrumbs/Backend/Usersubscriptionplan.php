<?php

Breadcrumbs::register('admin.usersubscriptionplans.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.usersubscriptionplans.management'), route('admin.usersubscriptionplans.index'));
});

Breadcrumbs::register('admin.usersubscriptionplans.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.usersubscriptionplans.index');
    $breadcrumbs->push(trans('menus.backend.usersubscriptionplans.create'), route('admin.usersubscriptionplans.create'));
});

Breadcrumbs::register('admin.usersubscriptionplans.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.usersubscriptionplans.index');
    $breadcrumbs->push(trans('menus.backend.usersubscriptionplans.edit'), route('admin.usersubscriptionplans.edit', $id));
});
