<?php
/**
 * Faqcategory
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Faqcategory'], function () {
        Route::resource('faqcategories', 'FaqcategoriesController');
        //For Datatable
        Route::post('faqcategories/get', 'FaqcategoriesTableController')->name('faqcategories.get');
    });
    
});