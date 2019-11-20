<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api\V1', 'prefix' => 'v1', 'as' => 'v1.'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('register', 'RegisterController@register');
        Route::post('login', 'AuthController@login');
    });

    Route::group(['middleware' => ['jwt.auth']], function () {
        Route::group(['prefix' => 'auth'], function () {
            Route::post('logout', 'AuthController@logout');
            Route::post('refresh', 'AuthController@refresh');

            // Password Reset Routes
            Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
            // Route::post('password/reset', 'ResetPasswordController@reset')->name('password.reset');
        });
        // Users
        Route::resource('users', 'UsersController', ['except' => ['create', 'edit']]);
        Route::post('users/delete-all', 'UsersController@deleteAll');
        //@todo need to change the route name and related changes
        Route::get('deactivated-users', 'DeactivatedUsersController@index');
        Route::get('deleted-users', 'DeletedUsersController@index');

        // Roles
        Route::resource('roles', 'RolesController', ['except' => ['create', 'edit']]);
        Route::post('roles/delete-all', 'RolesController@deleteAll');

        // Permission
        Route::resource('permissions', 'PermissionController', ['except' => ['create', 'edit']]);

        // Page
        Route::resource('pages', 'PagesController', ['except' => ['create', 'edit']]);

        // Faqs
        Route::resource('faqs', 'FaqsController', ['except' => ['create', 'edit']]);

        // Blog Categories
        Route::resource('blog_categories', 'BlogCategoriesController', ['except' => ['create', 'edit']]);

        // Blog Tags
        Route::resource('blog_tags', 'BlogTagsController', ['except' => ['create', 'edit']]);

        // Blogs
        Route::resource('blogs', 'BlogsController', ['except' => ['create', 'edit']]);
    });
});

//------------------------------API's Route--------------------------------------//

Route::get('pages/{slug}','Api\CmsController@index');
Route::get('faqs','Api\CmsController@faqs');
Route::post('contact-us/submit','Api\ContactusController@submit');

//Reset Password API's
Route::group([
    'namespace' => 'Api',
    'middleware' => 'api',
    'prefix' => 'password'
], function () {
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});


//Login and Register related API's
Route::post('login', 'Api\UserController@login');
Route::post('social-login', 'Api\UserController@socialLogin');
Route::post('register', 'Api\UserController@register');
Route::post('register/activate', 'Api\UserController@registerActivate');
Route::post('check/email', 'Api\UserController@checkEmail');
Route::post('check-otp', 'Api\PasswordResetController@checkOTP');
Route::post('register/resend-otp', 'Api\UserController@registerResendOtp');
/*Route::post('send-sms','Api\SmsController@store');
Route::post('verify-user','Api\SmsController@verifyContact');*/

//Offers related API's
Route::get('get/offer/categories', 'Api\OfferController@getOfferCategories');
Route::get('get/featured-categories', 'Api\OfferController@getFeaturedCategories');
Route::get('get/offers', 'Api\OfferController@getOffers');
Route::get('get/offer-details', 'Api\OfferController@getOfferDetails');
Route::get('get/featuredoffers', 'Api\OfferController@getFeaturedOffers');
Route::get('get/vendor-offers', 'Api\OfferController@getVendorOffers');
Route::get('get/category-offers', 'Api\OfferController@getCategoryOffers');

//Vendors related API's
Route::get('get/vendors', 'Api\UserController@getVendors');

//Search related API's
Route::post('search/offers', 'Api\OfferController@SearchOffers');
Route::post('search/suggest-offers', 'Api\OfferController@SearchSuggestionOffers');

Route::post('apply/refercode', 'Api\UserController@applyReferral');


//Authenticate API's
Route::group(['middleware' => 'authenticateApi'], function(){
Route::get('get/profile', 'Api\UserController@getProfile');
Route::post('profile/update', 'Api\UserController@profileUpdate');
Route::post('change/password', 'Api\UserController@changePassword');

//Apply Offer
Route::get('apply/offer', 'Api\OfferController@applyOffer');
Route::get('status/apply-offer', 'Api\OfferController@applyOfferStatus');

//Wallet
Route::get('wallet/details', 'Api\WalletController@details');
Route::get('wallet/available-balance', 'Api\WalletController@AvailableBalance');
Route::get('wallet/history', 'Api\WalletController@History');
Route::post('wallet/update/{id}', 'Api\WalletController@update');

//referralcode
Route::get('get/refercode', 'Api\UserController@getReferCode');

//bankaccount
Route::get('bank/list', 'Api\BankAccountController@list');
Route::post('bank/create', 'Api\BankAccountController@create');
Route::get('bank/delete', 'Api\BankAccountController@delete');
//Redeem

Route::get('redeem/list', 'Api\RedeemController@list');
Route::post('redeem/request', 'Api\RedeemController@create');

// map
Route::get('map/list/', 'Api\MapController@list');

});
