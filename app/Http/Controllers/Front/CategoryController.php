<?php

namespace App\Http\Controllers\Front;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function getCategory()
    {
        // Lấy tất cả category cha, có con kèm theo
        $categories = Category::whereNull('parent_category_id')
                        ->with('children')
                        ->get();

        return response()->json($categories);
    }
    public function getParentCategoriesWithProductCount()
{
    $parentCategories = Category::whereNull('parent_category_id')
        ->with(['children']) // lấy children để đếm sản phẩm trong cả cây
        ->get();

    $result = $parentCategories->map(function ($category) {
        // Lấy tất cả ID con
        $allCategoryIds = $this->getAllCategoryIds($category);

        // Đếm tổng sản phẩm trong category cha và các category con
        $productCount = Product::whereIn('category_id', $allCategoryIds)->count();

        return [
            'id' => $category->id,
            'name' => $category->category_name,
            'slug' => $category->slug,
            'product_count' => $productCount,
        ];
    });

    return response()->json($result);
}


public function getProductsByCategorySlug(Request $request, $slug)
{
    $category = Category::where('slug', $slug)->with('children')->firstOrFail();
    $categoryIds = $this->getAllCategoryIds($category);

    $query = Product::with('images')
        ->whereIn('category_id', $categoryIds);

    if ($request->filled('search')) {
        $search = $request->search;
        $query->where('product_name', 'LIKE', "%{$search}%");
    }

    if ($request->filled('price_min') && $request->filled('price_max')) {
        $query->whereBetween('price', [$request->price_min, $request->price_max]);
    }

    if ($request->filled('gender')) {
        $query->whereIn('gender', explode(',', $request->gender));
    }

    if ($request->filled('color')) {
        $query->whereIn('color', explode(',', $request->color));
    }

    if ($request->filled('material')) {
        $query->whereIn('material', explode(',', $request->material));
    }

    if ($request->filled('stone_type')) {
        $query->whereIn('stone_type', explode(',', $request->stone_type));
    }

    if ($request->filled('finish_quality')) {
        $query->whereIn('finish_quality', explode(',', $request->finish_quality));
    }

    // Paginate kết quả
    $products = $query->select('id', 'product_name', 'slug', 'price', 'product_code', 'category_id')
                     ->paginate(9);

    // Biến đổi dữ liệu trả về
    $products->getCollection()->transform(function ($product) {
        return [
            'id'    => $product->id,
            'name'  => $product->product_name,
            'slug'  => $product->slug,
            'price' => $product->price,
            'code'  => $product->product_code,
            'category_id' => $product->category_id,
            'image' => $product->images->first()->image_path ?? null,
            'rating' => round($product->averageAcceptedRating(), 1),
        ];
    });

    // ✅ Trả về dữ liệu với total rõ ràng
    return response()->json([
        'data' => $products->items(),
        'current_page' => $products->currentPage(),
        'last_page' => $products->lastPage(),
        'total' => $products->total(), // 👈 Số lượng sản phẩm
    ]);
}




private function getAllCategoryIds(Category $category)
{
    $ids = [$category->id];
    foreach ($category->children as $child) {
        $ids = array_merge($ids, $this->getAllCategoryIds($child));
    }
    return $ids;
}

}
