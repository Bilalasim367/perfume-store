<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdController extends Controller
{
    public function index(Request $request): View
    {
        $query = Ad::query();

        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%'.$request->search.'%');
        }

        if ($request->has('placement') && $request->placement) {
            $query->where('placement', $request->placement);
        }

        if ($request->has('status') && $request->status) {
            $query->where('is_active', $request->status === 'active');
        }

        $ads = $query->latest()->paginate(20)->withQueryString();

        return view('admin.ads.index', compact('ads'));
    }

    public function create(): View
    {
        return view('admin.ads.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|string|max:500',
            'link' => 'nullable|string|max:500',
            'placement' => 'nullable|string|in:home,product,cart,checkout',
            'position' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->only(['title', 'image', 'link', 'placement', 'position']);
        $data['is_active'] = $request->boolean('is_active', true);

        Ad::create($data);

        return redirect()->route('admin.ads.index')->with('success', 'Ad created');
    }

    public function edit(Ad $ad): View
    {
        return view('admin.ads.edit', compact('ad'));
    }

    public function update(Request $request, Ad $ad): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|string|max:500',
            'link' => 'nullable|string|max:500',
            'placement' => 'nullable|string|in:home,product,cart,checkout',
            'position' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->only(['title', 'image', 'link', 'placement', 'position']);
        $data['is_active'] = $request->boolean('is_active', true);

        $ad->update($data);

        return redirect()->route('admin.ads.index')->with('success', 'Ad updated');
    }

    public function destroy(Ad $ad): RedirectResponse
    {
        $ad->delete();

        return redirect()->route('admin.ads.index')->with('success', 'Ad deleted');
    }
}
