<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        $homeAds = Ad::active()->byPlacement(Ad::PLACEMENT_HOME)->featured()->get();
        $featuredProducts = Product::active()->inStock()->featured()->get();
        $collections = Collection::with('products')->active()->get();

        return view('home', compact('categories', 'homeAds', 'featuredProducts', 'collections'));
    }
}
