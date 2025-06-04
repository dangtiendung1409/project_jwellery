<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DetailsProductController extends Controller
{
    public function getProductDetail($slug)
    {
        $product = Product::with(['images', 'category'])
            ->where('slug', $slug)
            ->firstOrFail();

        return response()->json($product);
    }
    public function getRelatedProducts($slug)
{
    $product = Product::with('category')->where('slug', $slug)->firstOrFail();

    $relatedProducts = Product::with('images') // lấy hình nếu cần
        ->where('category_id', $product->category_id)
        ->where('slug', '!=', $slug) // loại trừ chính nó
        ->latest()
        ->take(4)
        ->get();

    return response()->json($relatedProducts);
}

}

