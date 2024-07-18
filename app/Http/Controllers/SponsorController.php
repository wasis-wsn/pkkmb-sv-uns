<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

use Auth;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsor = Sponsor::all();
        return Inertia::render('SponsorView', ['data' => $sponsor]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_sponsor' => 'required|string|max:255',
                'logo_sponsor' => 'nullable|file|max:10240',
            ]);

            $path = $request->file('logo_sponsor');
            $path->storeAs('public/sponsor', $request->file('logo_sponsor')->hashName());
            
            $user = Auth::user();
            
            Sponsor::create([
                'nama_sponsor' => $validated['nama_sponsor'],
                'logo_sponsor' => $path->hashName(),
            ]);

            return redirect()->route('sponsor');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, Sponsor $sponsor)
    {
        \Log::info('Update method called');
        \Log::info('Request data: ' . json_encode($request->all()));

        $validated = $request->validate([
            'nama_sponsor' => 'nullable|string|max:255',
            'logo_sponsor' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:10240'
        ]);

        \Log::info('Validated data: ' . json_encode($validated));

        $dataToUpdate = [];

        if ($request->filled('nama_sponsor')) {
            $dataToUpdate['nama_sponsor'] = $validated['nama_sponsor'];
        }

        if ($request->hasFile('logo_sponsor')) {
            \Log::info('File uploaded');
            $path = $request->file('logo_sponsor');
            $fileName = $path->hashName();
            $path->storeAs('public/sponsor', $fileName);
            $dataToUpdate['logo_sponsor'] = $fileName;
            \Log::info('File stored as: ' . $fileName);
        } else {
            \Log::info('Tidak ada foto yang di upload');
        }

        \Log::info('Data to update: ' . json_encode($dataToUpdate));

        $sponsor->update($dataToUpdate);

        \Log::info('Edit Berhasil!');

        return redirect()->route('sponsor');
    }

    public function destroy($id)
    {
        Sponsor::destroy($id);

        return redirect()->route('sponsor');
    }

}
