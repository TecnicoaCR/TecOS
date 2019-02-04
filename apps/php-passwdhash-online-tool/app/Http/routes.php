<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

if (App::environment('heroku')) {
    URL::forceSchema('https');
}

Route::get('/', ['as' => 'welcome', function() {
    return view('welcome', ['currentNavItem' => 'welcome']);
}]);
Route::controller('/password_hash', 'PasswordHashController', ['getIndex' => 'password_hash']);
Route::controller('/password_verify', 'PasswordVerifyController', ['getIndex' => 'password_verify']);
Route::controller('/password_get_info', 'PasswordGetInfoController', ['getIndex' => 'password_get_info']);
Route::controller('/password_needs_rehash', 'PasswordNeedsRehashController', ['getIndex' => 'password_needs_rehash']);
