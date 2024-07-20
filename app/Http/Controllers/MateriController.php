<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    public function getAllMateri()
    {
        $materis = Materi::all();
        return response()->json(['data' => $materis], 200);
    }

    public function index()
    {
        $materis = Materi::all();
        return Inertia::render('MateriView', ['data' => $materis]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul_materi' => 'required|string|max:255',
                'deskripsi_materi' => 'required|string',
                'isi_materi' => 'required|string',
            ]);

            $user = Auth::user();

            Materi::create([
                'user_id' => $user->id,
                'judul_materi' => $validated['judul_materi'],
                'deskripsi_materi' => $validated['deskripsi_materi'],
                'isi_materi' => $validated['isi_materi']
            ]);

            return redirect()->route('materi');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, Materi $id)
    {
        $validated = $request->validate([
            'judul_materi' => 'nullable|string|max:255',
            'deskripsi_materi' => 'nullable|string',
            'isi_materi' => 'nullable|string',
        ]);

        $dataToUpdate = [];

        if ($request->filled('judul_materi')) {
            $dataToUpdate['judul_materi'] = $validated['judul_materi'];
        }

        if ($request->filled('deskripsi_materi')) {
            $dataToUpdate['deskripsi_materi'] = $validated['deskripsi_materi'];
        }

        if ($request->filled('isi_materi')) {
            $dataToUpdate['isi_materi'] = $validated['isi_materi'];
        }

        $id->update($dataToUpdate);

        return redirect()->route('materi');
    }

    public function destroy($id)
    {
        Materi::destroy($id);

        return redirect()->route('materi');
    }
}

