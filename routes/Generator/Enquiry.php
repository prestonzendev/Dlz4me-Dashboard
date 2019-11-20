<?php
/**
 * Enquiry
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Enquiry'], function () {
        Route::resource('enquiries', 'EnquiriesController');
        //For Datatable
        Route::post('enquiries/get', 'EnquiriesTableController')->name('enquiries.get');
    });
    
});