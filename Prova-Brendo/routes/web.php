<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Http\Request;
use Illuminate\Http\Middleware;

// use AuthenticationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/**
 * route to standatr news
 */
Route::controller('NewsController')->group(
    function () {
        Route::get('/', 'index');
    }
);
Route::controller('AuthenticationController')->group(
    function () {
        /**
         * routes to login augorithm
         */
        Route::get('/login', 'index')->name('login-page');
        Route::post('/make-login', 'login')->name('login');
        Route::get('/logout', 'logOut')->name('signout');
    }
);
Route::middleware(['auth'])->group(function () {
    Route::controller('NewsController')->group(function () {
        /**
         * route to edit news
         */
        Route::get('/manage-news', 'manageNews');
        Route::get('/create-news', 'createNews');
        Route::post('/create-news-confirm', 'createNewsConfirm')->name('create-news-confirm');
        Route::post('/edit-news', 'editNews');
        Route::post('/delete-news', 'deleteNews');
        Route::post('/auth-news', 'authorizeNews');
    });
});
Route::controller('UserControler')->group(
    function () {
        Route::post('/edit-user', 'editUser');
        Route::post('/edit-user-confirm', 'editUserConfirm')->name('edit-user-confirm');
        /**
         * routes to registration algorithm
         */
        Route::post('/make-registration', 'registrate')->name('register');
        Route::get('/registration', 'registration')->name('register-user');
        Route::post('/delete-user', 'deleteUser');
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