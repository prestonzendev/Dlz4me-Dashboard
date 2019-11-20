<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::get('/faqs', 'FrontendController@faqs')->name('faqs');
Route::get('/terms', 'FrontendController@terms')->name('terms');
Route::get('/privacy', 'FrontendController@privacy')->name('privacy');

Route::get('change-language/{language}', 'FrontendController@change_langage');


Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
Route::get('chats/get_conversations', 'UserContactController@getchatconversations')->name('chat_conversations');
Route::get('chats/load_more_messages', 'UserContactController@loadmoremessages')->name('loadmoremessages');
Route::post('chats/message_seen', 'UserContactController@seenmessages')->name('message_seen');

});
/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth:user'], function () {



    Route::group(['namespace' => 'User', 'as' => 'user.','middleware' => ['is-customer']], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        Route::get('account/change-password', 'AccountController@changePasswordPage')->name('account.change-password');

        /*
         * User Profile Specific
         */
        //Route::patch('profile/update', 'ProfileController@update')->name('profile.update');

        /*
         * User Profile Picture
         */
        Route::patch('profile-picture/update', 'ProfileController@updateProfilePicture')->name('profile-picture.update');


        Route::get('subscription-plans', 'ProfileController@subscriptionplans')->name('subscription.plans');
        Route::post('upgrade/plan', 'ProfileController@upgrade')->name('upgrade.plan');

        Route::get('plan/payment', 'ProfileController@paymentproceed')->name('payment');
        Route::post('payment/process', 'ProfileController@process')->name('payment.process');

        Route::get('profile', 'ProfileController@viewprofile')->name('profile');
        Route::get('viewprofile', 'ProfileController@showprofile')->name('viewprofile');
        Route::post('profile/create', 'ProfileController@create')->name('profile.create');

        Route::post('profile/update', 'ProfileController@update')->name('profile.update');

        Route::post('makecontact', 'UserContactController@makecontactrequest')->name('makecontact');
        Route::post('showprofile', 'UserContactController@makecontactrequest')->name('setviewdetails');
        Route::get('showprofile', 'UserContactController@makecontactrequest')->name('setviewdetails');
        Route::get('viewlogs', 'UserContactController@viewlogs')->name('viewlogs');
        Route::post('viewlogs', 'UserContactController@viewlogs')->name('viewlogs');
        Route::get('mymatches', 'UserContactController@mymatches')->name('mymatches');

        Route::get('myinbox', 'UserContactController@myinbox')->name('myinbox');
        Route::post('myinbox', 'UserContactController@myinbox')->name('myinbox');

        Route::get('pendingcontacts', 'UserContactController@mypendingcontacts')->name('pending.contacts');
        Route::post('pendingcontacts', 'UserContactController@mypendingcontacts')->name('pending.contacts');

        Route::get('mycontacts', 'UserContactController@mycontacts')->name('mycontacts');
        Route::post('mycontacts', 'UserContactController@mycontacts')->name('mycontacts');

        Route::post('search', 'ProfileController@search')->name('search');
        Route::get('search', 'ProfileController@search')->name('search');  
    });

    Route::group(['namespace' => 'Vendor', 'as' => 'vendor.','middleware' => ['is-vendor']], function () {
        Route::get('vendor/dashboard', 'VendorController@index')->name('dashboard');
        Route::get('vendor/profile', 'VendorController@profile')->name('profile');
        Route::post('profile/edit', 'VendorController@editprofile')->name('profile.edit');
        Route::resource('services','OfferController');
        Route::get('vendor/offers', 'OfferController@index')->name('offer-list');
        Route::get('vendor/offerform', 'OfferController@show')->name('show-offer');
        Route::post('vendor/create-offer', 'OfferController@create')->name('create-offer');

    }); 

    Route::get('reportissue', 'ContactusController@reportissue')->name('reportissue');
    Route::post('reportissue', 'ContactusController@reportissue')->name('reportissue');

});



/*
* Show pages
*/
Route::get('pages/{slug}', 'FrontendController@showPage')->name('pages.show');

/*
     * Contact us form
     */
    Route::get('contact-us', 'ContactusController@show')->name('contact-us.show');
    Route::post('contact-us/submit', 'ContactusController@submit')->name('contact-us.submit');

    Route::get('thankyou', 'FrontendController@thankyou')->name('thankyou');
    Route::get('review/{id}', 'FrontendController@showreview')->name('showreview');
    Route::get('reviews', 'FrontendController@reviews')->name('reviews');
    

/*
* Subcribe an email for newsletter
*/
Route::group(['namespace' => 'NewsletterSubscriber', 'as' => 'newslettersubscriber.'], function () {
    Route::post('newsletter-subscriber/subscribe', 'NewslettersubscribersController@store')->name('newslettersubscriber.subscribe');
});
