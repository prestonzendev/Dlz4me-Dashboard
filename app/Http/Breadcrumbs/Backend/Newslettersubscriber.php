<?php

Breadcrumbs::register('admin.newslettersubscribers.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.newslettersubscribers.management'), route('admin.newslettersubscribers.index'));
});

Breadcrumbs::register('admin.newslettersubscribers.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.newslettersubscribers.index');
    $breadcrumbs->push(trans('menus.backend.newslettersubscribers.create'), route('admin.newslettersubscribers.create'));
});

Breadcrumbs::register('admin.newslettersubscribers.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.newslettersubscribers.index');
    $breadcrumbs->push(trans('menus.backend.newslettersubscribers.edit'), route('admin.newslettersubscribers.edit', $id));
});
