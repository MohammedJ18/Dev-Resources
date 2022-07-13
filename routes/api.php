<?php

use App\Http\Controllers\Api\{
    ### Auth ###
    Auth\RegisterController,
    Auth\LoginController,
    Auth\LogoutController,

    ### Category ###
    Category\CategoryController,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
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
Route::controller(LoginController::class)->middleware(['api'])->group(function () {
    Route::post('/login', 'login');

    Route::post('/refresh', 'refresh');
    Route::get('/user', 'me');
});

Route::middleware(['auth'])->post('/logout',[LoginController::class, 'logout'] );

Route::middleware(['auth'])->group(function () {
    Route::controller(CategoryController::class)->prefix('categories')->group(function () {
        Route::get('/', 'categories');
    });
});

