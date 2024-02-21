<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'getCategories']);
    Route::post('/', [CategoryController::class, 'createCategory']);
    Route::put('/{id}', [CategoryController::class, 'updateCategory']);
    Route::delete('/{id}', [CategoryController::class, 'deleteCategory']);
});

Route::group(['prefix' => 'news'], function () {
    Route::get('/', [NewsController::class, 'getNews']);
    Route::get('/{id}', [NewsController::class, 'getNewsById']);
    Route::post('/', [NewsController::class, 'createNews']);
    Route::put('/{id}', [NewsController::class, 'updateNews']);
    Route::delete('/{id}', [NewsController::class, 'deleteNews']);
});

