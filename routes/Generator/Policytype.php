<?php
/**
 * Policy Type
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'PolicyType'], function () {
        Route::resource('policytypes', 'PolicytypesController');
        //For Datatable
        Route::post('policytypes/get', 'PolicytypesTableController')->name('policytypes.get');
    });
    
});