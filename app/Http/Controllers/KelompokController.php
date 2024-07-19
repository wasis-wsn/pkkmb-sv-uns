<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

use Auth;

class KelompokController extends Controller
{
    public function index()
    {
        $kelompoks = Kelompok::all();
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

    public function update(Request $request, Kelompok $kelompok)
    {
        \Log::info('Update method called');
        \Log::info('Request data: ' . json_encode($request->all()));

        $validated = $request->validate([
            'nama_kelompok' => 'nullable|string|max:255',
        ]);

        \Log::info('Validated data: ' . json_encode($validated));

        $dataToUpdate = [];

        if ($request->filled('nama_kelompok')) {
            $dataToUpdate['nama_kelompok'] = $validated['nama_kelompok'];
        }

        \Log::info('Data to update: ' . json_encode($dataToUpdate));

        $kelompok->update($dataToUpdate);

        \Log::info('Update completed');

        return redirect()->route('kelompok');
    }

    public function destroy($id)
    {
        Kelompok::destroy($id);
        return redirect()->route('kelompok');
    }
}
