<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Bundle;
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

        $minPriceInput = $request->input('min_price');
        $maxPriceInput = $request->input('max_price');
        
        if ($minPriceInput !== null && $minPriceInput !== '') {
            $query->where('price', '>=', (float) $minPriceInput);
        }

        if ($maxPriceInput !== null && $maxPriceInput !== '') {
            $query->where('price', '<=', (float) $maxPriceInput);
        }

        $sortBy = $request->input('sort', 'newest');
        match ($sortBy) {
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            default => $query->orderBy('created_at', 'desc'),
        };

        $products = $query->paginate(12)->withQueryString();
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

    public function bundles(): View
    {
        $bundles = Bundle::active()->latest()->paginate(12);
        return view('products.bundles', compact('bundles'));
    }
}
