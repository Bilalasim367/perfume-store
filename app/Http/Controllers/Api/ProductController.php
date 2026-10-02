<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::active()
            ->with('category')
            ->latest()
            ->paginate(20);
        
        return response()->json([
            'success' => true,
            'data' => $products,
        ]);
    }

    public function show(Product $product): JsonResponse
    {
        $product->load('category', 'images');
        
        return response()->json([
            'success' => true,
            'data' => $product,
        ]);
    }

    public function latest(): JsonResponse
    {
        $products = Product::active()
            ->inStock()
            ->latest()
            ->take(10)
            ->get();
        
        return response()->json([
            'success' => true,
            'data' => $products,
        ]);
    }

    public function bestSellers(): JsonResponse
    {
        $products = Product::active()
            ->inStock()
            ->latest()
            ->take(10)
            ->get();
        
        return response()->json([
            'success' => true,
            'data' => $products,
        ]);
    }
}