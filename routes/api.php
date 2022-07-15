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
        Route::post('/add', 'addCategory');
        Route::post('/edit', 'editCategory');
        Route::post('/delete', 'deleteCategory');
    });

    // Resources
    Route::controller(ResourceController::class)->prefix('resources')->group(function () {

        Route::post('/update/{id}', 'updateResource');
        Route::post('/delete/{id}', 'deleteResource');
        Route::post('/acceptResource/{id}', 'acceptResource');
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


//Category
Route::controller(CategoryController::class)->prefix('categories')->group(function () {
    Route::get('/', 'getCategories');
    Route::get('/withcount' , 'withCount');
    Route::get('/withsections/{id}', 'getCategoriesWithSections');
    Route::get('/{id}', 'getCategory');

});

// Resources
Route::controller(ResourceController::class)->prefix('resources')->group(function () {
    Route::get('/', 'getResourcesCount');
    Route::get('/getLastSixResources', 'getLastSixResources');
    Route::post('/add', 'addResource');
});

//register & login routes
Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});
