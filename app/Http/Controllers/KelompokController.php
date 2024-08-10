<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use App\Models\Gardana;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class KelompokController extends Controller
{
    public function getAllKelompok()
    {
        $kelompoks = Kelompok::orderBy('nama_kelompok')->get();
        $gardana = Gardana::orderBy('nama_gardana')->get();
        return response()->json([
            'data' => $kelompoks,
            'gardana' => $gardana        
        ], 200);
    }

    public function index()
    {
        $kelompoks = Kelompok::orderBy('nama_kelompok')->get();
        $gardana = Gardana::orderBy('nama_gardana')->get();
        return Inertia::render('KelompokView', [
            'data' => $kelompoks,
            'gardana' => $gardana
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_kelompok' => 'required|string|max:255',
                'gardana_id' => 'required|exists:gardana,id',
            ]);

            Kelompok::create([
                'nama_kelompok' => $validated['nama_kelompok'],
                'gardana_id' => $validated['gardana_id'],
            ]);

            return redirect()->route('kelompok');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, Kelompok $id)
    {
        $validated = $request->validate([
            'nama_kelompok' => 'nullable|string|max:255',
            'gardana_id' => 'required|exists:gardana,id',
        ]);

        $dataToUpdate = [];

        if ($request->filled('nama_kelompok')) {
            $dataToUpdate['nama_kelompok'] = $validated['nama_kelompok'];
        }

        if ($request->filled('gardana_id')) {
            $dataToUpdate['gardana_id'] = $validated['gardana_id'];
        }

        $id->update($dataToUpdate);

        return redirect()->route('kelompok');
    }

    public function destroy($id)
    {
        Kelompok::destroy($id);
        return redirect()->route('kelompok');
    }
}

