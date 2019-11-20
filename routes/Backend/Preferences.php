<?php

/*
 * Blogs Management
 */
Route::group(['namespace' => 'Preferences'], function () {
    //Route::resource('preferences', 'PreferencesController', ['except' => ['show']]);
    
    Route::get('/preferences/create', ['as' => 'admin.preferences.create' , 'uses' => 'PreferencesController@create']);
    Route::post('/preferences/create', ['as' => 'admin.preferences.store' , 'uses' => 'PreferencesController@store']);
    
    Route::get('/preferences/edit', ['as' => 'admin.preferences.edit' , 'uses' => 'PreferencesController@edit']);
    Route::put('/preferences/edit', ['as' => 'admin.preferences.update' , 'uses' => 'PreferencesController@update']);
});
