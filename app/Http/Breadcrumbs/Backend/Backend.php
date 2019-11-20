<?php

Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('admin.dashboard'));
});

require __DIR__.'/Search.php';
require __DIR__.'/Access/User.php';
require __DIR__.'/Access/Role.php';
require __DIR__.'/Access/Permission.php';
require __DIR__.'/Page.php';
require __DIR__.'/Setting.php';
require __DIR__.'/Blog_Category.php';
require __DIR__.'/Blog_Tag.php';
require __DIR__.'/Blog_Management.php';
require __DIR__.'/Faqs.php';
require __DIR__.'/Menu.php';
require __DIR__.'/LogViewer.php';

require __DIR__.'/Event.php';
require __DIR__.'/Servicecategory.php';
require __DIR__.'/Termandcondition.php';
require __DIR__.'/Service.php';
require __DIR__.'/Policytype.php';
require __DIR__.'/Membershipdetail.php';
require __DIR__.'/Newslettersubscriber.php';
require __DIR__.'/Testmod.php';
require __DIR__.'/Banner.php';
require __DIR__.'/Faqcategory.php';
require __DIR__.'/Contact.php';
require __DIR__.'/Preference.php';
require __DIR__.'/Preferencesoption.php';
require __DIR__.'/Subscriptionplan.php';
require __DIR__.'/Review.php';
require __DIR__.'/Usersubscriptionplan.php';
require __DIR__.'/Reportedissue.php';