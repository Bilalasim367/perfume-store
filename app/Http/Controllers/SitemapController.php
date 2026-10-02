<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $products = Product::active()->latest()->limit(100)->get();
        $categories = Category::all();
        
        $content = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>' . url('/') . '</loc>
        <priority>1.0</priority>
        <changefreq>daily</changefreq>
    </url>
    <url>
        <loc>' . url('/about') . '</loc>
        <priority>0.8</priority>
        <changefreq>monthly</changefreq>
    </url>
    <url>
        <loc>' . url('/contact') . '</loc>
        <priority>0.8</priority>
        <changefreq>monthly</changefreq>
    </url>
    <url>
        <loc>' . url('/products') . '</loc>
        <priority>0.9</priority>
        <changefreq>daily</changefreq>
    </url>
    <url>
        <loc>' . url('/bundles') . '</loc>
        <priority>0.8</priority>
        <changefreq>weekly</changefreq>
    </url>
    <url>
        <loc>' . url('/track') . '</loc>
        <priority>0.6</priority>
        <changefreq>monthly</changefreq>
    </url>';

        foreach ($categories as $category) {
            $content .= '
    <url>
        <loc>' . url('/products?category=' . $category->slug) . '</loc>
        <priority>0.7</priority>
        <changefreq>weekly</changefreq>
    </url>';
        }

        foreach ($products as $product) {
            $content .= '
    <url>
        <loc>' . route('products.show', $product) . '</loc>
        <priority>0.7</priority>
        <changefreq>weekly</changefreq>
    </url>';
        }

        $content .= '
</urlset>';

        return response($content, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
}
