<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomePageController extends Controller
{
public function searchProduct(Request $request)
{
    $query = Product::query();

    // Nếu có keyword -> tìm trên nhiều cột
    if ($request->filled('keyword')) {
        $keyword = $request->keyword;
        $query->where(function ($q) use ($keyword) {
            $q->where('product_name', 'like', "%$keyword%")
              ->orWhere('product_code', 'like', "%$keyword%")
              ->orWhere('type', 'like', "%$keyword%")
              ->orWhere('stone_type', 'like', "%$keyword%")
              ->orWhere('color', 'like', "%$keyword%")
              ->orWhere('material', 'like', "%$keyword%")
              ->orWhere('gender', 'like', "%$keyword%")
              ->orWhere('finish_quality', 'like', "%$keyword%");
        });
    }

    // Nếu không có keyword thì không trả về gì
    else {
        return response()->json([
            'total' => 0,
            'products' => [],
        ]);
    }

    $products = $query
        ->select('id', 'product_name', 'slug', 'product_code', 'price', 'type')
        ->with(['images:id,product_id,image_path'])
        ->get();

    return response()->json([
        'total' => $products->count(),
        'products' => $products,
    ]);
}




}

