<?php

use App\Http\Controllers\Api\{
    ### Auth ###
    Auth\RegisterController,
    Auth\LoginController,
    Auth\LogoutController,

    ### Category ###
    Category\CategoryController,

    ### Resource ###
    Resource\ResourceController,

    ### Link ###
    Link\LinkController,

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

//Logout
Route::middleware(['auth'])->post('/logout',[LoginController::class, 'logout'] );

Route::middleware(['auth'])->group(function () {

    //Category
    Route::controller(CategoryController::class)->prefix('categories')->group(function () {
        Route::get('/', 'getCategories');
        Route::get('/{id}', 'category');
        Route::post('/add', 'addCategory');
        Route::post('/edit', 'editCategory');
        Route::post('/delete', 'deleteCategory');
    });

    // Resources
    Route::controller(ResourceController::class)->prefix('resources')->group(function () {
        Route::get('/', 'getResource');
        Route::post('/add', 'addResource');
        Route::post('/edit', 'editResource');
        Route::post('/delete', 'deleteResource');
    });

    // Link
    Route::controller(LinkController::class)->prefix('links')->group(function () {
        Route::get('/', 'getLinks');
        Route::get('/{id}', 'link');
        Route::post('/add', 'addLink');
        Route::post('/edit', 'editLink');
        Route::post('/delete', 'deleteLink');
    });
});


