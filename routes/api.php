<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\{
    ### Auth ###
    Auth\loginController,
    

};
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

//Register
Route::post('/register', [RegisterController::class, 'register']);

//Login
Route::controller(LoginController::class)->middleware(['api'])->prefix('auth')->group(function () {
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
    Route::post('/refresh', 'refresh');
    Route::get('/user', 'me');
});


Route::middleware(['auth'])->group(function () {
        ### Category ###
            Route::controller(CategoryContrpller::class)->prefix('categories')->group(function () {
                Route::get('/', 'categories');
            });
});

