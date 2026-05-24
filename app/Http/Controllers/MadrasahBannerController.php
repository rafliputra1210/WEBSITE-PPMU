<?php

namespace App\Http\Controllers;

use App\Models\MadrasahBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MadrasahBannerController extends Controller
{
    public function index()
    {
        $banners = MadrasahBanner::orderBy('order', 'asc')->get();
        return view('admin.madrasah-banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.madrasah-banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'       => 'required|image|mimes:jpeg,png,jpg,webp|max:3048',
            'title'       => 'nullable|string|max:255',
            'subtitle'    => 'nullable|string',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|string|max:255',
            'order'       => 'required|integer',
            'is_active'   => 'boolean',
        ]);

        $data = $request->except('image');
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('madrasah-banners', 'public');
            $data['image'] = $path;
        }

        MadrasahBanner::create($data);

        return redirect()->route('admin.madrasah-banner.index')
            ->with('success', 'Banner Madrasah berhasil ditambahkan');
    }

    public function edit(MadrasahBanner $madrasahBanner)
    {
        return view('admin.madrasah-banner.edit', compact('madrasahBanner'));
    }

    public function update(Request $request, MadrasahBanner $madrasahBanner)
    {
        $request->validate([
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3048',
            'title'       => 'nullable|string|max:255',
            'subtitle'    => 'nullable|string',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|string|max:255',
            'order'       => 'required|integer',
        ]);

        $data = $request->except('image');
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($madrasahBanner->image && Storage::disk('public')->exists($madrasahBanner->image)) {
                Storage::disk('public')->delete($madrasahBanner->image);
            }
            $path = $request->file('image')->store('madrasah-banners', 'public');
            $data['image'] = $path;
        }

        $madrasahBanner->update($data);

        return redirect()->route('admin.madrasah-banner.index')
            ->with('success', 'Banner Madrasah berhasil diperbarui');
    }

    public function destroy(MadrasahBanner $madrasahBanner)
    {
        if ($madrasahBanner->image && Storage::disk('public')->exists($madrasahBanner->image)) {
            Storage::disk('public')->delete($madrasahBanner->image);
        }

        $madrasahBanner->delete();

        return redirect()->route('admin.madrasah-banner.index')
            ->with('success', 'Banner Madrasah berhasil dihapus');
    }
}
