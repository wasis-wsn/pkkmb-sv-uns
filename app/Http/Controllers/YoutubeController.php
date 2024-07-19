<?php

namespace App\Http\Controllers;

use App\Models\Youtube;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

use Auth;

class YoutubeController extends Controller
{
    public function index()
    {
        $youtubes = Youtube::all();
        return Inertia::render('YoutubeView', ['data' => $youtubes]);
    }

    


    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul_youtube' => 'required|string|max:255',
                'link_youtube' => 'required|string',
            ]);

            $user = Auth::user();

            Youtube::create([
                'user_id' => $user->id,
                'judul_youtube' => $validated['judul_youtube'],
                'link_youtube' => $validated['link_youtube']
            ]);

            return redirect()->route('youtube');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // public function update(Request $request, Galeri $galeri)
    // {
    //     $validated = $request->validate([
    //         'judul_dokum' => 'required|string|max:255',
    //         'deskripsi_dokum' => 'nullable|string',
    //         'jenis_dokum' => 'required|string|max:255',
    //         'photo_dokum' => 'nullable|file|max:10240'
    //     ]);

    //     if ($request->hasFile('photo_dokum')) {
    //         $path = $request->file('photo_dokum')->store('galeri', 'public');
    //         $galeri->photo_dokum = $path;
    //     }

    //     $galeri->update([
    //         'judul_dokum' => $validated['judul_dokum'],
    //         'deskripsi_dokum' => $validated['deskripsi_dokum'],
    //         'jenis_dokum' => $validated['jenis_dokum']
    //     ]);

    //     return redirect()->route('galeri');
    // }

    public function update(Request $request, Youtube $youtube)
    {
        \Log::info('Update method called');
        \Log::info('Request data: ' . json_encode($request->all()));

        $validated = $request->validate([
                'judul_youtube' => 'nullable|string|max:255',
                'link_youtube' => 'nullable|string',
        ]);

        \Log::info('Validated data: ' . json_encode($validated));

        $dataToUpdate = [];

        if ($request->filled('judul_youtube')) {
            $dataToUpdate['judul_youtube'] = $validated['judul_youtube'];
        }

        if ($request->filled('link_youtube')) {
            $dataToUpdate['link_youtube'] = $validated['link_youtube'];
        }

        \Log::info('Data to update: ' . json_encode($dataToUpdate));

        $youtube->update($dataToUpdate);

        \Log::info('Update completed');

        return redirect()->route('youtube');
    }

    public function destroy($id)
    {
        // Your deletion logic here
        Youtube::destroy($id);

        // Return a valid Inertia response
        return redirect()->route('youtube');
    }

}
