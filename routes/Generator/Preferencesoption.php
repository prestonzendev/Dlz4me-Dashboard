<?php
/**
 * Preferences Options
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Preferencesoption'], function () {
        Route::resource('preferencesoptions', 'PreferencesoptionsController');
        //For Datatable
        Route::post('preferencesoptions/get', 'PreferencesoptionsTableController')->name('preferencesoptions.get');
        
        Route::post('preferencesoptions/deleteoptionvalue', 'PreferencesoptionsController@deleteOptionValue')->name('preferencesoptions.deleteoptionvalue');
    });
    
});