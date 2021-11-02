<?php

use App\Http\Controllers\LogradouroController;
use App\Http\Controllers\UserController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login', [UserController::class, 'login'])->name('users.login');

Route::group(['middleware' => 'jwt.verify'], function () {
    //Users
    Route::apiResource('users', UserController::class);
    Route::post('logout', [UserController::class, 'logout'])->name('users.logout');

    //Address
    Route::apiResource('address', LogradouroController::class);
    Route::post('address/search', [LogradouroController::class,'search'])->name('address.search');
});


