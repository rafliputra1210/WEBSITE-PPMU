<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Progres;
use Illuminate\Support\Facades\Storage;

class ProgresController extends Controller
{
    public function index()
    {
        $progres = Progres::latest()->paginate(10);
        return view('admin.progres.index', compact('progres'));
    }

    public function create()
    {
        return view('admin.progres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['judul', 'keterangan']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('progres', 'public');
        }

        Progres::create($data);

        return redirect()->route('admin.progres.index')->with('success', 'Data progres berhasil ditambahkan');
    }

    public function edit(Progres $progre)
    {
        // the route parameter name is usually singular of resource, e.g. progre or progres
        // let's just use $id to be safe
    }
    
    public function editById($id)
    {
        $progres = Progres::findOrFail($id);
        return view('admin.progres.edit', compact('progres'));
    }

    public function update(Request $request, $id)
    {
        $progres = Progres::findOrFail($id);
        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['judul', 'keterangan']);

        if ($request->hasFile('foto')) {
            if ($progres->foto) {
                Storage::disk('public')->delete($progres->foto);
            }
            $data['foto'] = $request->file('foto')->store('progres', 'public');
        }

        $progres->update($data);

        return redirect()->route('admin.progres.index')->with('success', 'Data progres berhasil diperbarui');
    }

    public function destroy($id)
    {
        $progres = Progres::findOrFail($id);
        if ($progres->foto) {
            Storage::disk('public')->delete($progres->foto);
        }
        $progres->delete();

        return redirect()->route('admin.progres.index')->with('success', 'Data progres berhasil dihapus');
    }
}
