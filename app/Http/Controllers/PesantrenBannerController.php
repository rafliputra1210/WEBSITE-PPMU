<?php

namespace App\Http\Controllers;

use App\Models\PesantrenBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PesantrenBannerController extends Controller
{
    public function index()
    {
        $banners = PesantrenBanner::orderBy('order', 'asc')->get();
        return view('admin.pesantren-banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.pesantren-banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:3048',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->except('image');
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('pesantren-banners', 'public');
            $data['image'] = $path;
        }

        PesantrenBanner::create($data);

        return redirect()->route('admin.pesantren-banner.index')->with('success', 'Banner Pesantren berhasil ditambahkan');
    }

    public function edit(PesantrenBanner $pesantrenBanner)
    {
        return view('admin.pesantren-banner.edit', compact('pesantrenBanner'));
    }

    public function update(Request $request, PesantrenBanner $pesantrenBanner)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3048',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|string|max:255',
            'order' => 'required|integer'
        ]);

        $data = $request->except('image');
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($pesantrenBanner->image && Storage::disk('public')->exists($pesantrenBanner->image)) {
                Storage::disk('public')->delete($pesantrenBanner->image);
            }
            
            $path = $request->file('image')->store('pesantren-banners', 'public');
            $data['image'] = $path;
        }

        $pesantrenBanner->update($data);

        return redirect()->route('admin.pesantren-banner.index')->with('success', 'Banner Pesantren berhasil diperbarui');
    }

    public function destroy(PesantrenBanner $pesantrenBanner)
    {
        if ($pesantrenBanner->image && Storage::disk('public')->exists($pesantrenBanner->image)) {
            Storage::disk('public')->delete($pesantrenBanner->image);
        }
        
        $pesantrenBanner->delete();

        return redirect()->route('admin.pesantren-banner.index')->with('success', 'Banner Pesantren berhasil dihapus');
    }
}
