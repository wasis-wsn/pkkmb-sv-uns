<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class DokumentasiController extends Controller
{
    public function getAllDokumentasi()
    {
        $dokumentasi = Dokumentasi::all();
        return response()->json(['data' => $dokumentasi], 200);
    }

    public function index()
    {
        $dokumentasi = Dokumentasi::all();
        return Inertia::render('DokumentasiView', ['data' => $dokumentasi]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'photo_galeri.*' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:10240'
            ]);

            $user = Auth::user();
            $photos = $request->file('photo_galeri');

            foreach ($photos as $photo) {
                $path = $photo->storeAs('public/galeri', $photo->hashName());

                Dokumentasi::create([
                    'user_id' => $user->id,
                    'photo_galeri' => $photo->hashName(),
                ]);
            }

            return redirect()->route('dokumentasi');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function update(Request $request, Dokumentasi $id)
    {
        $validated = $request->validate([
            'photo_galeri' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:10240'
        ]);

        $dataToUpdate = [];
        if (isset($validated['photo_galeri'])) {
            $fileName = $validated['photo_galeri']->hashName();
            $validated['photo_galeri']->storeAs('public/galeri', $fileName);
            $dataToUpdate['photo_galeri'] = $fileName;
        }

        $id->update($dataToUpdate);

        return redirect()->route('dokumentasi');
    }

    public function destroy($id)
    {
        Dokumentasi::destroy($id);

        return redirect()->route('dokumentasi');
    }
}
