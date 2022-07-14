<?php

use App\Http\Controllers\Api\{
    ### Auth ###
    Auth\AuthController,

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


Route::middleware(['jwt'])->group(function () {

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

    // Auth
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/get-user', [AuthController::class, 'getUser']);
    });
});


//register & login routes
Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});
