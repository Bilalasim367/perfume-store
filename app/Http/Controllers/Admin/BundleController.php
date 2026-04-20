<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bundle;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BundleController extends Controller
{
    public function index(): View
    {
        $bundles = Bundle::with('products')->latest()->paginate(10);

        return view('admin.bundles.index', compact('bundles'));
    }

    public function create(): View
    {
        $products = Product::active()->get();

        return view('admin.bundles.create', compact('products'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'product_ids' => 'required|array',
            'product_ids.*' => 'exists:products,id',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $bundle = Bundle::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'original_price' => $validated['original_price'] ?? null,
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active', true),
        ]);

        $bundle->products()->sync($validated['product_ids']);

        return redirect()->route('admin.bundles.index')->with('success', 'Bundle created successfully');
    }

    public function edit(string $id): View
    {
        $bundle = Bundle::with('products')->findOrFail($id);
        $products = Product::active()->get();

        return view('admin.bundles.edit', compact('bundle', 'products'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $bundle = Bundle::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'product_ids' => 'required|array',
            'product_ids.*' => 'exists:products,id',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $bundle->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'original_price' => $validated['original_price'] ?? null,
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active', true),
        ]);

        $bundle->products()->sync($validated['product_ids']);

        return redirect()->route('admin.bundles.index')->with('success', 'Bundle updated successfully');
    }

    public function destroy(string $id): RedirectResponse
    {
        $bundle = Bundle::findOrFail($id);
        $bundle->delete();

        return redirect()->route('admin.bundles.index')->with('success', 'Bundle deleted successfully');
    }
}
