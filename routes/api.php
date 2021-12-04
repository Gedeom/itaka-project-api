<?php

use App\Http\Controllers\CidadeController;
use App\Http\Controllers\EstadoCivilController;
use App\Http\Controllers\EtniaController;
use App\Http\Controllers\LogradouroController;
use App\Http\Controllers\ParentescoController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\SitTrabalhistaController;
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
    Route::post('address/search', [LogradouroController::class, 'search'])->name('address.search');

    //Person
    Route::apiResource('person', PessoaController::class);
    Route::post('person/search', [PessoaController::class, 'search'])->name('person.search');

    //Civil Status
    Route::apiResource('civil-status', EstadoCivilController::class);
    Route::post('civil-status/search', [EstadoCivilController::class, 'search'])->name('civil-status.search');

    //Race
    Route::apiResource('race', EtniaController::class);
    Route::post('race/search', [EtniaController::class, 'search'])->name('race.search');

    //Kinship
    Route::apiResource('kinship', ParentescoController::class);
    Route::post('kinship/search', [ParentescoController::class, 'search'])->name('kinship.search');

    //Work situation
    Route::apiResource('work-situation', SitTrabalhistaController::class);
    Route::post('work-situation/search', [SitTrabalhistaController::class, 'search'])->name('work-situation.search');

    //City
    Route::apiResource('city', CidadeController::class);
    Route::post('city/search', [CidadeController::class, 'search'])->name('city.search');
});


