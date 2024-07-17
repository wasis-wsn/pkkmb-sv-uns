<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::all();
        return Inertia::render('Galeri/Index', ['galeris' => $galeris]);
    }

    public function create()
    {
        return Inertia::render('Galeri/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jenis' => 'required|string|in:Galeri1,Galeri2,Slide',
            'file' => 'required|image|mimes:png,jpg,svg|max:10240',
        ]);

        $file = $request->file('file')->store('galeri_files');

        Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'jenis' => $request->jenis,
            'file' => $file,
        ]);

        return redirect()->route('galeris.index')->with('success', 'Galeri created successfully.');
    }

    public function show(Galeri $galeri)
    {
        return Inertia::render('Galeri/Show', ['galeri' => $galeri]);
    }

    public function edit(Galeri $galeri)
    {
        return Inertia::render('Galeri/Edit', ['galeri' => $galeri]);
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jenis' => 'required|string|in:Galeri1,Galeri2,Slide',
            'file' => 'nullable|image|mimes:png,jpg,svg|max:10240',
        ]);

        if ($request->hasFile('file')) {
            Storage::delete($galeri->file);
            $file = $request->file('file')->store('galeri_files');
            $galeri->file = $file;
        }

        $galeri->update($request->only('judul', 'deskripsi', 'jenis'));

        return redirect()->route('galeris.index')->with('success', 'Galeri updated successfully.');
    }

    public function destroy(Galeri $galeri)
    {
        Storage::delete($galeri->file);
        $galeri->delete();

        return redirect()->route('galeris.index')->with('success', 'Galeri deleted successfully.');
    }
}
