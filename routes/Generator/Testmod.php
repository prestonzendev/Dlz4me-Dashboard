<?php
/**
 * Testmod
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Testmod'], function () {
        Route::resource('testmods', 'TestmodsController');
        //For Datatable
        Route::post('testmods/get', 'TestmodsTableController')->name('testmods.get');
    });
    
});