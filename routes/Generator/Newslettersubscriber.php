<?php
/**
 * Newsletter Subscribers
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::group(['namespace' => 'NewsletterSubscriber'], function () {
        Route::resource('newslettersubscribers', 'NewslettersubscribersController');
        //For Datatable
        Route::post('newslettersubscribers/get', 'NewslettersubscribersTableController')->name('newslettersubscribers.get');

        // Status
        Route::get('newslettersubscriber/mark/{id}/{status}', 'NewslettersubscribersController@mark')->name('newslettersubscriber.mark')->where(['status' => '[0,1]']);
    });
});
