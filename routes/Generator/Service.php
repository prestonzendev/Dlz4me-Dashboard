<?php
/**
 * Services
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Service'], function () {
        Route::resource('services', 'ServicesController');
        Route::get('services/featured/offer', 'ServicesController@featuredOffer')->name('services.featured');
        Route::post('services/makefeatured', 'ServicesController@makeFeatured')->name('services.makefeatured');
        //For Datatable
        Route::post('services/getFeatured', 'ServicesTableController@getFeatured')->name('services.getFeatured');
        Route::post('services/get', 'ServicesTableController')->name('services.get');
    });
    
});