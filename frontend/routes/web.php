<?php

use App\Http\Controllers\Auth42Controller;
use App\Http\Controllers\User42Controller;
use App\Http\Controllers\agama42Controller;
use App\Http\Controllers\Detaildata42Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'halaman' => "Home"
    ]);
})->middleware('auth');


// auth
Route::get('/login42', [Auth42Controller::class, 'login'])->name('login');
Route::get('/register42', [Auth42Controller::class, 'register'])->name('auth42.register');
Route::get('/logout42', [Auth42Controller::class, 'logout'])->name('auth42.logout');

Route::post('/login42', [Auth42Controller::class, 'ProsesLogin'])->name('auth42.loginP');
Route::post('/register42', [Auth42Controller::class, 'ProsesRegis'])->name('auth42.registerP');

Route::middleware('auth')->group(function () {
    // agama->admin
    Route::resource('/agama42', agama42Controller::class)->middleware('admin');

        // profile
        Route::get('/profile42', [User42Controller::class, 'profile'])->name('user42.profile');
        Route::put('/profile42/edit/image/{id}', [User42Controller::class, 'editimage'])->name('user42.editimage');
        Route::put('/profile42/edit/password/{id}', [User42Controller::class, 'editpassword'])->name('user42.editpassword');

        // user
        Route::resource('/user42', User42Controller::class)->middleware('admin');

        // detail
        Route::resource('/detaildata42', Detaildata42Controller::class);
});
