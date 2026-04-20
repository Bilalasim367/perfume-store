<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $categorySlug = $request->input('category');

        $query = Product::query()->with('category');

        if ($categorySlug) {
            $category = Category::where('slug', $categorySlug)->first();
            if ($category) {
                $query->where('category_id', $category->id)->where('is_active', true);
            }
        } else {
            $query->where('is_active', true);
        }

        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%'.strip_tags($request->search).'%');
        }

        $products = $query->latest()->paginate(12)->withQueryString();
        $categories = Category::all();
        $selectedCategory = $request->category;

        return view('products.index', compact('products', 'categories', 'selectedCategory'));
    }

    public function show(Product $product): View
    {
        $product->load('category');

        $relatedProducts = Product::active()
            ->with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        $productAds = Ad::active()->byPlacement(Ad::PLACEMENT_PRODUCT)->featured()->get();

        return view('products.show', compact('product', 'relatedProducts', 'productAds'));
    }
}
