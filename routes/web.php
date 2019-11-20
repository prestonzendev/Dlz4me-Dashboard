<?php

Route::get('config-clear', function()
{
\Artisan::call('config:clear');
dd("Done");
});

/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */
// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController@swap');

/* ----------------------------------------------------------------------- */
/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function ()
{
    includeRouteFiles(__DIR__ . '/Frontend/');
});
 

Route::get('recaptchacreate', 'RecaptchaController@create');
Route::post('store', 'RecaptchaController@store');

/**
 * Administrator Login Controllers
 * All route names are prefixed with 'frontend.auth'.
 */

Route::group(['middleware' => 'guest'], function ()
{
// Authentication Routes
    Route::get('admin/login', '\App\Http\Controllers\Frontend\Auth\AdminLoginController@showAdminLoginForm')->name('admin.login');
    Route::post('admin/login', '\App\Http\Controllers\Frontend\Auth\AdminLoginController@login')->name('admin.login');
    Route::get('admin/password/reset', '\App\Http\Controllers\Frontend\Auth\ForgotPasswordController@showAdminLinkRequestForm')->name('admin.password.reset');
    Route::post('admin/password/email', '\App\Http\Controllers\Frontend\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::post('chats/convertemoji', '\App\Http\Controllers\Frontend\User\UserContactController@convertemoji')->name('convertemoji');
});


/*
 * These routes require the admin to be logged in
 */

//to redirect admin to admin dashboard
Route::get('/admin', function()
{
    return redirect('/admin/dashboard');
});

Route::group(['middleware' => 'auth:admin'], function ()
{
    Route::get('admin/logout', '\App\Http\Controllers\Frontend\Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('admin/review/show/{id}', '\App\Http\Controllers\Backend\Review\ReviewsController@showreview')->name('admin.review.show');
});

/* ----------------------------------------------------------------------- */

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin','preventBackHistory']], function ()
{
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    includeRouteFiles(__DIR__ . '/Backend/');
});

/*
 * Routes From Module Generator
 */

Route::group(['middleware' => 'preventBackHistory'], function ()
{
    includeRouteFiles(__DIR__ . '/Generator/');
});


/*
* Routes From Module Generator
*/
includeRouteFiles(__DIR__.'/Generator/');