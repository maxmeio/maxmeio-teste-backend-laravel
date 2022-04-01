<?php

use Illuminate\Support\Facades\Route;
use Database\Seeders\DatabaseSeeder;
// use AuthenticationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/**
 * route to standatr news
 */
Route::get('/', function () {
    return view('news.news-list');
});

Route::controller('AuthenticationController')->group(
    function () {
        /**
         * routes to login augorithm
         */
        Route::get('/login', 'index');
        Route::post('/make-login', 'login')->name('login');
        /**
         * routes to registration algorithm
         */
        Route::get('/registration', 'registration')->name('register-user');
        Route::post('/make-registration', 'registrate')->name('register.custom');
        Route::get('/logout', 'logOut')->name('signout');
        /**
         * route to edit news
         */
        Route::get('/edit-news', 'editNews');
    }
);

/**
 * routes useds for admin propose
 * 
 * uncomment they if you want
 * 
 */

Route::get('/seed', function () {
    $dbSeeder = new DatabaseSeeder();
    $dbSeeder->run();
    return redirect('/');
});
// Route::get('/create_user_type', function () {
//     return view('admin.create_user_type');
// });
// Route::post('/create_user_type_form', 'UserTypeController@addUserType')->name('create_user_type_form');