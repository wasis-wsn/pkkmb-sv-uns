<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

use Auth;

class ProdiController extends Controller
{
    public function index()
    {
        $prodis = Prodi::all();
        return Inertia::render('ProdiView', ['data' => $prodis]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_prodi' => 'required|string|max:255',
            ]);

            Prodi::create([
                'nama_prodi' => $validated['nama_prodi'],
            ]);

            return redirect()->route('prodi');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, Prodi $prodi)
    {
        \Log::info('Update method called');
        \Log::info('Request data: ' . json_encode($request->all()));

        $validated = $request->validate([
            'nama_prodi' => 'nullable|string|max:255',
        ]);

        \Log::info('Validated data: ' . json_encode($validated));

        $dataToUpdate = [];

        if ($request->filled('nama_prodi')) {
            $dataToUpdate['nama_prodi'] = $validated['nama_prodi'];
        }

        \Log::info('Data to update: ' . json_encode($dataToUpdate));

        $prodi->update($dataToUpdate);

        \Log::info('Update completed');

        return redirect()->route('prodi');
    }

    public function destroy($id)
    {
        Prodi::destroy($id);
        return redirect()->route('prodi');
    }
}
