<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profil di admin
     */
    public function adminIndex()
    {
        $pesantren = Profile::firstOrCreate(['entitas' => 'pesantren']);
        $madrasah  = Profile::firstOrCreate(['entitas' => 'madrasah']);

        return view('admin.profile.index', compact('pesantren', 'madrasah'));
    }

    /**
     * Update data profil
     */
    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);

        $request->validate([
            'sejarah' => 'nullable|string',
            'visi'    => 'nullable|string',
            'misi'    => 'nullable|string',
            'gambar'  => 'nullable|image|max:2048'
        ]);

        $data = $request->only(['sejarah', 'visi', 'misi']);

        if ($request->hasFile('gambar')) {
            if ($profile->gambar && Storage::disk('public')->exists($profile->gambar)) {
                Storage::disk('public')->delete($profile->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('profile', 'public');
        }

        $profile->update($data);

        return redirect()->back()->with('success', 'Profil ' . ucfirst($profile->entitas) . ' berhasil diperbarui.');
    }

    /**
     * Tampilkan profil pesantren untuk publik
     */
    public function showPesantren()
    {
        $profile = Profile::where('entitas', 'pesantren')->first();
        return view('pesantren.profil', compact('profile'));
    }

    /**
     * Tampilkan profil madrasah untuk publik
     */
    public function showMadrasah()
    {
        $profile = Profile::where('entitas', 'madrasah')->first();
        return view('madrasah.profil', compact('profile'));
    }
}
