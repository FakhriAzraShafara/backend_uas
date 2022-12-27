<?php

use App\Http\Controllers\Api\Agama42Controller;
use App\Http\Controllers\Api\User42Controller;
use App\Http\Controllers\Api\Detaildata42Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/agama42',Agama42Controller::class);
Route::resource('/user42', User42Controller::class);
route::resource('/detaildata42', DetailData42Controller::class);
Route::put('/user42/UpdateFoto42/{id}', [User42Controller::class, 'updateImage']);
Route::put('/user42/UpdatePassword42/{id}', [User42Controller::class, 'updatePassword']);

