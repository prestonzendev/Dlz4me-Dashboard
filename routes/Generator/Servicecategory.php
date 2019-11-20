<?php
/**
 * Service Categories
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'ServiceCategory'], function () {
        Route::resource('servicecategories', 'ServicecategoriesController');
        //For Datatable
        Route::post('servicecategories/get', 'ServicecategoriesTableController')->name('servicecategories.get');
    });
    
});