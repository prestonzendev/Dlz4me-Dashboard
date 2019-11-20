<?php

/**
 * All route names are prefixed with 'admin.access'.
 */
Route::group([
    'prefix'    => 'access',
    'as'        => 'access.',
    'namespace' => 'Access',
        ], function () {

    /*
     * User Management
     */
            Route::group([
        'middleware' => 'access.routeNeedsPermission:view-access-management',
            ], function () {
                Route::group(['namespace' => 'User'], function () {
                    /*
                     * For DataTables
                     */
                    Route::post('user/get', 'UserTableController')->name('user.get');

                    /*
                     * User Status'
                     */
                    Route::get('user/deactivated', 'UserStatusController@getDeactivated')->name('user.deactivated');
                    Route::get('user/deleted', 'UserStatusController@getDeleted')->name('user.deleted');

                    /*
                     * User Types'
                     */
                    Route::get('user/customers', 'UserTypeController@getCustomers')->name('user.customers.index');
                    Route::get('user/customers/deactivated', 'UserTypeController@getDeactivatedCustomers')->name('user.customers.deactivated');
                    Route::get('user/customers/deleted', 'UserTypeController@getDeletedCustomers')->name('user.customers.deleted');

                    Route::get('user/vendor', 'UserTypeController@getVendor')->name('user.vendor.index');
                    Route::get('user/vendor/deactivated', 'UserTypeController@getDeactivatedEscorts')->name('user.vendor.deactivated');
                    Route::get('user/vendor/deleted', 'UserTypeController@getDeletedEscorts')->name('user.vendor.deleted');

                    /*
                     * User CRUD
                     */
                    Route::resource('user', 'UserController');

                    //Store Customers and Escorts
                    Route::get('user/customers/create', 'UserTypeController@createCustomer')->name('user.customers.create');
                    Route::get('user/vendor/create', 'UserTypeController@createVendor')->name('user.vendor.create');
                    Route::get('user/escorts/create', 'UserTypeController@createEscort')->name('user.escorts.create');
                    Route::post('user/customers/store', 'UserTypeController@storeCustomer')->name('user.customers.store');
                    Route::post('user/vendor/store', 'UserTypeController@storeVendor')->name('user.vendor.store');
                    Route::post('user/escorts/store', 'UserTypeController@storeEscort')->name('user.escorts.store');
                    Route::get('user/customers/edit', 'UserTypeController@editCustomer')->name('user.customers.edit');
                    Route::get('user/vendor/edit', 'UserTypeController@editVendor')->name('user.vendor.edit');
                    Route::patch('user/customers/update', 'UserTypeController@updateCustomer')->name('user.customers.update');
                    Route::patch('user/vendor/update', 'UserTypeController@updateEscort')->name('user.vendor.update');


                    /*
                     * Specific User
                     */
                    Route::group(['prefix' => 'user/{user}'], function () {
                        // Account
                        Route::get('account/confirm/resend', 'UserConfirmationController@sendConfirmationEmail')->name('user.account.confirm.resend');

                        // Status
                        Route::get('mark/{status}', 'UserStatusController@mark')->name('user.mark')->where(['status' => '[0,1]']);

                        // Password
                        Route::get('password/change', 'UserPasswordController@edit')->name('user.change-password');
                        Route::patch('password/change', 'UserPasswordController@update')->name('user.change-password');
                        Route::get('password/create', 'UserPasswordController@sendCreateLinkEmail')->name('user.create-password');


                        // Access
                        Route::get('login-as', 'UserAccessController@loginAs')->name('user.login-as');

                        // Session
                        Route::get('clear-session', 'UserSessionController@clearSession')->name('user.clear-session');
                    });

                    /*
                     * Deleted User
                     */
                    Route::group(['prefix' => 'user/{deletedUser}'], function () {
                        Route::get('delete', 'UserStatusController@delete')->name('user.delete-permanently');
                        Route::get('restore', 'UserStatusController@restore')->name('user.restore');
                        Route::get('softDelete', 'UserStatusController@softDelete')->name('user.delete_soft');
                    });
                });

                /*
                 * Role Management
                 */
                Route::group(['namespace' => 'Role'], function () {
                    Route::resource('role', 'RoleController', ['except' => ['show']]);

                    //For DataTables
                    Route::post('role/get', 'RoleTableController')->name('role.get');
                });

                /*
                 * Permission Management
                 */
                Route::group(['namespace' => 'Permission'], function () {
                    Route::resource('permission', 'PermissionController', ['except' => ['show']]);

                    //For DataTables
                    Route::post('permission/get', 'PermissionTableController')->name('permission.get');
                });
            });
        });
