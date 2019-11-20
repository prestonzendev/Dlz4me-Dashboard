<?php
/**
 * Reported Issues
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Reportedissue'], function () {
        Route::resource('reportedissues', 'ReportedissuesController');
        //For Datatable
        Route::post('reportedissues/get', 'ReportedissuesTableController')->name('reportedissues.get');
    });
    
});