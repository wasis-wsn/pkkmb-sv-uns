<?php

namespace App\Http\Controllers;

use App\Models\Hima;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class HimaController extends Controller
{
    public function index()
    {
        $hima = Hima::all();
        return Inertia::render('HimaView', ['data' => $hima]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_hima' => 'required|string|max:255',
                'logo_hima' => 'nullable|file|max:10240',
            ]);

            $path = $request->file('logo_hima');
            $path->storeAs('public/hima', $request->file('logo_hima')->hashName());
            
            $user = Auth::user();
            
            Hima::create([
                'user_id' => $user->id,
                'nama_hima' => $validated['nama_hima'],
                'logo_hima' => $path->hashName(),
            ]);

            return redirect()->route('hima');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, Hima $hima)
    {
        Log::info('Update method called');
        Log::info('Request data: ' . json_encode($request->all()));

        $validated = $request->validate([
            'nama_hima' => 'nullable|string|max:255',
            'logo_hima' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:10240'
        ]);

        Log::info('Validated data: ' . json_encode($validated));

        $dataToUpdate = [];

        if ($request->filled('nama_hima')) {
            $dataToUpdate['nama_hima'] = $validated['nama_hima'];
        }

        if ($request->hasFile('logo_hima')) {
            Log::info('File uploaded');
            $path = $request->file('logo_hima');
            $fileName = $path->hashName();
            $path->storeAs('public/hima', $fileName);
            $dataToUpdate['logo_hima'] = $fileName;
            Log::info('File stored as: ' . $fileName);
        } else {
            Log::info('Tidak ada foto yang di upload');
        }

        Log::info('Data to update: ' . json_encode($dataToUpdate));

        $hima->update($dataToUpdate);

        Log::info('Edit Berhasil!');

        return redirect()->route('hima');
    }

    public function destroy($id)
    {
        Hima::destroy($id);

        return redirect()->route('hima');
    }

}
