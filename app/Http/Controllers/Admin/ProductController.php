<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $query = Product::with('category');

        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }

        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('status') && $request->status) {
            $query->where('is_active', $request->status === 'active');
        }

        $products = $query->latest()->paginate(20)->withQueryString();
        $categories = Category::all();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean',
        ]);

        $data = $request->only(['name', 'category_id', 'description', 'price', 'original_price', 'stock', 'is_active']);
        $data['slug'] = Str::slug($request->name);
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();

            // Save to public/storage/products
            $publicPath = public_path('storage/products');
            if (! is_dir($publicPath)) {
                mkdir($publicPath, 0755, true);
            }
            $file->move($publicPath, $filename);
            $data['image'] = 'storage/products/'.$filename;
        }

        $product = Product::create($data);

        // Handle additional images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                if ($image) {
                    $filename = time().'_'.$index.'_'.uniqid().'.'.$image->getClientOriginalExtension();
                    $publicPath = public_path('storage/products');
                    $image->move($publicPath, $filename);

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => 'storage/products/'.$filename,
                        'position' => $index,
                    ]);
                }
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created');
    }

    public function edit(Product $product): View
    {
        $categories = Category::all();
        $product->load('images');

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name,'.$product->id,
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean',
        ]);

        $data = $request->only(['name', 'category_id', 'description', 'price', 'original_price', 'stock', 'is_active']);
        $data['slug'] = Str::slug($request->name);
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image && file_exists(public_path($product->image))) {
                @unlink(public_path($product->image));
            }

            $file = $request->file('image');
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();

            // Save to public/storage/products
            $publicPath = public_path('storage/products');
            if (! is_dir($publicPath)) {
                mkdir($publicPath, 0755, true);
            }
            $file->move($publicPath, $filename);
            $data['image'] = 'storage/products/'.$filename;
        }

        $product->update($data);

        // Handle additional images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                if ($image) {
                    $filename = time().'_'.$index.'_'.uniqid().'.'.$image->getClientOriginalExtension();
                    $publicPath = public_path('storage/products');
                    $image->move($publicPath, $filename);

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => 'storage/products/'.$filename,
                        'position' => $product->images->count() + $index,
                    ]);
                }
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted');
    }
}
