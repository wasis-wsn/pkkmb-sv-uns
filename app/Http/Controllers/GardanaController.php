<?php

namespace App\Http\Controllers;

use App\Models\Gardana;
use App\Models\Kelompok;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class GardanaController extends Controller
{
    public function getAllGardana()
    {
        // Ambil semua data Gardana
        $gardana = Gardana::with('kelompok')
        ->orderBy('nama_gardana')
        ->get();

        return response()->json([
            'data' => $gardana,
        ], 200);
    }

    public function index()
    {
        // Ambil semua data Gardana
        $gardana = Gardana::with('kelompok')
        ->orderBy('nama_gardana')
        ->get();
        
        return Inertia::render('GardanaView', [
            'data' => $gardana,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_gardana' => 'required|string|max:255',
                'link_wa' => 'nullable|string|max:50',
            ]);

            // Simpan data Gardana baru
            Gardana::create([
                'nama_gardana' => $validated['nama_gardana'],
                'link_wa' => $validated['link_wa'] ?? null,
            ]);

            return redirect()->route('gardana');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    public function update(Request $request, Gardana $gardana)
    {
        $validated = $request->validate([
            'nama_gardana' => 'nullable|string|max:255',
            'link_wa' => 'nullable|string|max:50',
        ]);

        $dataToUpdate = [];

        if ($request->filled('nama_gardana')) {
            $dataToUpdate['nama_gardana'] = $validated['nama_gardana'];
        }

        if ($request->filled('link_wa')) {
            $dataToUpdate['link_wa'] = $validated['link_wa'];
        }

        $gardana->update($dataToUpdate);

        return redirect()->route('gardana');
    }

    public function destroy(Gardana $gardana)
    {
        $gardana->delete();

        return redirect()->route('gardana');
    }
}
