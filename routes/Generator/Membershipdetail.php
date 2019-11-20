<?php
/**
 * Membership Details
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'MembershipDetail'], function () {
        Route::resource('membershipdetails', 'MembershipdetailsController');
        //For Datatable
        Route::post('membershipdetails/get', 'MembershipdetailsTableController')->name('membershipdetails.get');
    });
    
});