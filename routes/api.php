<?php

use App\Http\Controllers\Api\Auth\{
    RegisterController,
    LoginController,
    ResourceController
};
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

//Register
Route::post('/register', [RegisterController::class, 'register']);

//Login
Route::controller(LoginController::class)->middleware(['api'])->group(function () {
    Route::post('/login', 'login');
    Route::post('/refresh', 'refresh');
    Route::get('/user', 'me');
});

//Logout
Route::middleware(['auth'])->post('/logout',[LoginController::class, 'logout'] );

Route::middleware(['auth'])->group(function () {
    // Resources
    Route::controller(ResourceController::class)->prefix('resources')->group(function () {
        Route::get('/', 'getResource');
        Route::post('/add', 'addResource');
        Route::post('/edit', 'editResource');
        Route::post('/delete', 'deleteResource');
    });
});

