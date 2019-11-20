<?php
/**
 * Banner
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Banner'], function () {
        Route::resource('banners', 'BannersController');
        //For Datatable
        Route::post('banners/get', 'BannersTableController')->name('banners.get');
    });
    
});