<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class SponsorController extends Controller
{
    public function getAllSponsor()
    {
        $sponsors = Sponsor::all();
        return response()->json(['data' => $sponsors], 200);
    }

    public function index()
    {
        $sponsors = Sponsor::all();
        return Inertia::render('SponsorView', ['data' => $sponsors]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_sponsor' => 'required|string|max:255',
                'logo_sponsor' => 'nullable|file|max:10240',
            ]);

            if ($request->hasFile('logo_sponsor')) {
                $path = $request->file('logo_sponsor');
                $fileName = $path->hashName();
                $path->storeAs('public/sponsor', $fileName);
            } else {
                $fileName = null;
            }

            $user = Auth::user();

            Sponsor::create([
                'user_id' => $user->id,
                'nama_sponsor' => $validated['nama_sponsor'],
                'logo_sponsor' => $fileName,
            ]);

            return redirect()->route('sponsor');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, Sponsor $sponsor)
    {
        $validated = $request->validate([
            'nama_sponsor' => 'nullable|string|max:255',
            'logo_sponsor' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:10240'
        ]);

        $dataToUpdate = [];

        if ($request->filled('nama_sponsor')) {
            $dataToUpdate['nama_sponsor'] = $validated['nama_sponsor'];
        }

        if ($request->hasFile('logo_sponsor')) {
            $path = $request->file('logo_sponsor');
            $fileName = $path->hashName();
            $path->storeAs('public/sponsor', $fileName);
            $dataToUpdate['logo_sponsor'] = $fileName;
        }

        $sponsor->update($dataToUpdate);

        return redirect()->route('sponsor');
    }

    public function destroy($id)
    {
        Sponsor::destroy($id);
        return redirect()->route('sponsor');
    }
}

