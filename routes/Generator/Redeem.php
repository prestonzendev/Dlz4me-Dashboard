<?php
/**
 * Redeems
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Redeem'], function () {
    	Route::get('redeems/changestatus', 'RedeemsController@changeStat')->name('redeems.changestatus');
        Route::resource('redeems', 'RedeemsController');
        //For Datatable
        Route::post('redeems/get', 'RedeemsTableController')->name('redeems.get');
    });
    
});