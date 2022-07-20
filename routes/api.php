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

    ### Tag ###
    Tag\TagController,
};
use App\Http\Controllers\Api\SubSection\SubSectionController;
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
        Route::post('/edit/{id}', 'editCategory');
        Route::post('/delete/{id}', 'deleteCategory');
    });

    //SubSection
    Route::controller(SubSectionController::class)->prefix('sub-sections')->group(function () {
        Route::post('/add', 'addSubSection');
        Route::post('/update/{id}', 'updateSubSection');
        Route::post('/delete/{id}', 'deleteSubSection');
    });


    // Resources
    Route::controller(ResourceController::class)->prefix('resources')->group(function () {

        Route::post('/update/{id}', 'updateResource');
        Route::post('/delete/{id}', 'deleteResource');
        Route::post('/acceptResource/{id}', 'acceptResource');
    });

    // Link
    Route::controller(LinkController::class)->prefix('links')->group(function () {
        Route::post('/add', 'addLink');
        Route::post('/edit/{id}', 'editLink');
        Route::post('/delete/{id}', 'deleteLink');
    });

    //Tags
    Route::controller(TagController::class)->prefix('tags')->group(function () {
        Route::post('/add', 'addTag');
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
    Route::get('/{id}', 'getCategory');
});

//SubSection
Route::controller(SubSectionController::class)->prefix('sub-sections')->group(function () {
    Route::get('getSubSection/{id}', 'getSubSectionById');
    Route::get('getSubByCategory/{id}', 'getSubSectionsByCategoryId');
});

// Resources
Route::controller(ResourceController::class)->prefix('resources')->group(function () {
    Route::get('/', 'getResourcesCount');
    Route::get('/getLastSixResources', 'getLastSixResources');
    Route::get('/getAllResources', 'getAllResources');
    Route::post('/add', 'addResource');
    Route::get('/getResourceById/{id}', 'getResourceById');

});

//Tags
Route::controller(TagController::class)->prefix('tags')->group(function () {
    Route::get('/', 'getTags');
    Route::get('/{id}', 'getTag');
});

// Link
Route::controller(LinkController::class)->prefix('links')->group(function () {
    Route::get('/', 'getLinks');
    Route::get('/{id}', 'getLink');
});


//register & login routes
Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});
