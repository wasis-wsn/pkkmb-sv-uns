<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class KelompokController extends Controller
{
    public function getAllKelompok()
    {
        $kelompoks = Kelompok::orderBy('nama_kelompok')->get();
        return response()->json(['data' => $kelompoks], 200);
    }

    public function index()
    {
        $kelompoks = Kelompok::orderBy('nama_kelompok')->get();
        return Inertia::render('KelompokView', ['data' => $kelompoks]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_kelompok' => 'required|string|max:255',
            ]);

            Kelompok::create([
                'nama_kelompok' => $validated['nama_kelompok'],
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
        ]);

        $dataToUpdate = [];

        if ($request->filled('nama_kelompok')) {
            $dataToUpdate['nama_kelompok'] = $validated['nama_kelompok'];
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

