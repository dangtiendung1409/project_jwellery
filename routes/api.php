<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\CategoryController;

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

Route::get('/getCategories', [CategoryController::class, 'getCategory']);
Route::get('/get-parent-categories-with-count', [CategoryController::class, 'getParentCategoriesWithProductCount']);
Route::get('/products-by-category/{slug}', [CategoryController::class, 'getProductsByCategorySlug']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
