<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\DetailsProductController;
use App\Http\Controllers\Front\HomePageController;

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
// home page
Route::get('/getCategories', [CategoryController::class, 'getCategory']);
Route::get('/search-products', [HomePageController::class, 'searchProduct']);

// category page
Route::get('/get-parent-categories-with-count', [CategoryController::class, 'getParentCategoriesWithProductCount']);
Route::get('/products-by-category/{slug}', [CategoryController::class, 'getProductsByCategorySlug']);

// details page
Route::get('/product-detail/{slug}', [DetailsProductController::class, 'getProductDetail']);
Route::get('/related-products/{slug}', [DetailsProductController::class, 'getRelatedProducts']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
