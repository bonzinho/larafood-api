<?php

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function(){

        /*
         * Role X User
         */
        Route::get('users/{id}/role/{idPermission}/detach', 'ACL\RoleUserController@detachRoleUser')->name('users.role.detach');
        Route::post('users/{id}/role/store', 'ACL\RoleUserController@attachRolesUser')->name('users.roles.attach');
        Route::any('users/{id}/role/create', 'ACL\RoleUserController@rolesAvailable')->name('users.roles.available');
        Route::get('users/{id}/role', 'ACL\RoleUserController@roles')->name('users.roles');
        Route::get('role/{id}/users/', 'ACL\RoleUserController@users')->name('roles.users');

        /*
         * Permissions X Role
         */

        Route::post('roles/{id}/permissions/store', 'ACL\PermissionRoleController@attachPermissionsRole')->name('roles.permissions.attach');
        Route::any('roles/{id}/permissions/create', 'ACL\PermissionRoleController@permissionsAvailable')->name('roles.permissions.available');
        Route::get('roles/{id}/permissions', 'ACL\PermissionRoleController@permissions')->name('roles.permissions');
        Route::get('roles/{id}/permissions/{idPermission}/detach', 'ACL\PermissionRoleController@detachPermissionsRole')->name('roles.permissions.detach');
        Route::get('permissions/{id}/roles/', 'ACL\PermissionRoleController@roles')->name('permissions.roles');

        /*
       * Routes Profiles
       */

        Route::resource('roles', 'ACL\RoleController')->middleware('can:roles');
        Route::any('roles/search', 'ACL\RoleController@search')->name('roles.search')->middleware('can:roles');

        /*
        * Routes Tenants
        */

        Route::resource('tenants', 'TenantController');
        Route::any('tenants/search', 'TenantController@search')->name('tenants.search');

        /*
         * Routes Tables
        */

        Route::get('tables/qrcode/{identify}', 'TableController@qrcode')->name('tables.qrcode');
        Route::resource('tables', 'TableController');
        Route::any('tables/search', 'TableController@search')->name('tables.search');


        /*
         * Product X Categories
         */
        Route::get('products/{id}/category/{idCategory}/detach', 'CategoryProductController@detachCategoryProduct')->name('products.categories.detach');
        Route::post('products/{id}/category/store', 'CategoryProductController@attachCategoriesProduct')->name('products.categories.attach');
        Route::any('products/{id}/category/create', 'CategoryProductController@categoriesAvailable')->name('product.categories.available');
        Route::get('products/{id}/category', 'CategoryProductController@categories')->name('products.categories');
        Route::get('category/{id}/products/', 'CategoryProductController@products')->name('categories.products');

        /*
         * Routes Products
        */

        Route::resource('products', 'ProductController')->middleware('can:products');
        Route::any('products/search', 'ProductController@search')->name('products.search')->middleware('can:products');

        /*
         * Routes Categories
        */

        Route::resource('categories', 'CategoryController');
        Route::any('categories/search', 'CategoryController@search')->name('categories.search');

        /*
         * Routes Users
        */

        Route::resource('users', 'UserController');
        Route::any('users/search', 'UserController@search')->name('users.search');

        /*
         * Route Home
         */

        Route::get('/', 'PlanController@index')->name('admin.index');


        /*
       * Routes Profiles
       */

        Route::resource('profiles', 'ACL\ProfileController')->middleware('can:profiles');
        Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search')->middleware('can:profiles');

        /*
         * Permissions Profiles
        */

        Route::resource('permissions', 'ACL\PermissionController');
        Route::any('search', 'ACL\PermissionController@search')->name('permissions.search');

        /*
         * Permissions X Profile
         */

        Route::post('profiles/{id}/permissions/store', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
        Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
        Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
        Route::get('profiles/{id}/permissions/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionsProfile')->name('profiles.permissions.detach');
        Route::get('permissions/{id}/profiles/', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');

        /*
         * Plan X Profile
         */
        Route::get('plans/{id}/profile/{idPermission}/detach', 'ACL\PlanProfileController@detachProfilePlan')->name('plans.profiles.detach');
        Route::post('plans/{id}/profile/store', 'ACL\PlanProfileController@attachProfilePlan')->name('plans.profiles.attach');
        Route::any('plans/{id}/profile/create', 'ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
        Route::get('plans/{id}/profile', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
        Route::get('profile/{id}/plans/', 'ACL\PlanProfileController@plans')->name('profiles.plans');


        /*
         * Routes Plans
         */

        Route::prefix('plans')->group(function(){
            Route::get('/', 'PlanController@index')->name('plans.index');
            Route::get('create', 'PlanController@create')->name('plans.create');
            Route::post('/', 'PlanController@store')->name('plans.store');
            Route::get('{url}', 'PlanController@show')->name('plans.show');
            Route::delete('{url}', 'PlanController@destroy')->name('plans.destroy');
            Route::get('{url}/edit', 'PlanController@edit')->name('plans.edit');
            Route::put('{url}', 'PlanController@update')->name('plans.update');
            Route::any('search', 'PlanController@search')->name('plans.search');



            /*
            * Routes Details Plans
            */

            Route::get('{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('plans.details.edit');
            Route::put('{url}/details/{idDetail}', 'DetailPlanController@update')->name('plans.details.update');

            Route::get('{url}/details', 'DetailPlanController@index')->name('plans.details.index');
            Route::get('{url}/details/create', 'DetailPlanController@create')->name('plans.details.create');
            Route::post('{url}/details', 'DetailPlanController@store')->name('plans.details.store');
            Route::get('{url}/details/{idDetail}', 'DetailPlanController@show')->name('plans.details.show');
            Route::delete('{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('plans.details.destroy');




        });





});



/*
 * Site
 */

Route::get('/plan/{url}', 'Site\SiteController@plan')->name('plan.subscription');
Route::get('/', 'Site\SiteController@index')->name('site.home');


/*
 * Auth Routes
 */
Auth::routes();
