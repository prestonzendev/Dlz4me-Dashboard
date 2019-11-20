<?php
/**
 * Routes for : Events
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
	
	Route::group( ['namespace' => 'Event'], function () {
	    Route::get('events', 'EventsController@index')->name('events.index');
	    
	    
	    
	    //For Datatable
	    Route::post('events/get', 'EventsTableController')->name('events.get');
	});
	
});