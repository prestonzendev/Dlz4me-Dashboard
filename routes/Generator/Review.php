<?php
/**
 * Review
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Review'], function () {
        Route::resource('reviews', 'ReviewsController');
        //For Datatable
        Route::post('reviews/get', 'ReviewsTableController')->name('reviews.get');
    });
    
});