<?php
/**
 * Usersubscriptionplan
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Usersubscriptionplan'], function () {
        Route::resource('usersubscriptionplans', 'UsersubscriptionplansController');
        //For Datatable
        Route::post('usersubscriptionplans/get', 'UsersubscriptionplansTableController')->name('usersubscriptionplans.get');
    });
    
});