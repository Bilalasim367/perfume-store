<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BannerController extends Controller
{
    public function index(): View
    {
        $banners = Banner::latest()->paginate(20);

        return view('admin.banners.index', compact('banners'));
    }

    public function create(): View
    {
        return view('admin.banners.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|string|max:500',
            'link' => 'nullable|string|max:500',
            'position' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->only(['title', 'image', 'link', 'position']);
        $data['is_active'] = $request->boolean('is_active', true);

        Banner::create($data);

        return redirect()->route('admin.banners.index')->with('success', 'Banner created');
    }

    public function edit(Banner $banner): View
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|string|max:500',
            'link' => 'nullable|string|max:500',
            'position' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->only(['title', 'image', 'link', 'position']);
        $data['is_active'] = $request->boolean('is_active', true);

        $banner->update($data);

        return redirect()->route('admin.banners.index')->with('success', 'Banner updated');
    }

    public function destroy(Banner $banner): RedirectResponse
    {
        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted');
    }
}
