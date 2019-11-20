<?php
/**
 * Preferences
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Preference'], function () {
        Route::resource('preferences', 'PreferencesController');
        //For Datatable
        Route::post('preferences/get', 'PreferencesTableController')->name('preferences.get');
    });
    
});