<?php
/**
 * Terms And Conditions
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'TermsAndCondition'], function () {
        Route::resource('termandconditions', 'TermandconditionsController');
        //For Datatable
        Route::post('termandconditions/get', 'TermandconditionsTableController')->name('termandconditions.get');
    });
    
});