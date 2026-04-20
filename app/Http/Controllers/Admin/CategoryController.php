<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::latest()->paginate(20);

        return view('admin.categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['name', 'description']);
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('categories', 'public');
            $data['image'] = 'storage/'.$path;
        }

        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category created');
    }

    public function edit(Category $category): View
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$category->id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['name', 'description']);
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            if ($category->image && Storage::exists(str_replace('storage/', '', $category->image))) {
                Storage::delete(str_replace('storage/', '', $category->image));
            }
            $path = $request->file('image')->store('categories', 'public');
            $data['image'] = 'storage/'.$path;
        }

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated');
    }

    public function destroy(Category $category): RedirectResponse
    {
        if ($category->products()->count() > 0) {
            return back()->with('error', 'Cannot delete category with products');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted');
    }
}
