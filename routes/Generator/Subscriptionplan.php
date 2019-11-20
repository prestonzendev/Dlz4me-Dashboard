<?php
/**
 * Subscription Plans
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Subscriptionplan'], function () {
        Route::resource('subscriptionplans', 'SubscriptionplansController');
        //For Datatable
        Route::post('subscriptionplans/get', 'SubscriptionplansTableController')->name('subscriptionplans.get');
        
        Route::post('subscriptionplans/deleteplanfeature', 'SubscriptionplansController@deletePlanFeature')->name('subscriptionplans.deleteplanfeature');
        
        Route::get('subscriptionplans/view/{id}', 'SubscriptionplansController@view')->name('subscriptionplans.view');
    });
    
});