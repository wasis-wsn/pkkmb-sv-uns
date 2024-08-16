<?php

namespace App\Http\Controllers;

use App\Models\Youtube;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class YoutubeController extends Controller
{
    public function getAllYoutube()
    {
        $youtubes = Youtube::orderBy('created_at', 'desc')->get();
        return response()->json(['data' => $youtubes], 200);
    }

    public function index()
    {
        $youtubes = Youtube::orderBy('created_at', 'desc')->get();
        return Inertia::render('YoutubeView', ['data' => $youtubes]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul_youtube' => 'required|string|max:255',
                'link_youtube' => 'required|string',
                'deskripsi_youtube' => 'required|string',
            ]);

            $user = Auth::user();

            Youtube::create([
                'user_id' => $user->id,
                'judul_youtube' => $validated['judul_youtube'],
                'link_youtube' => $validated['link_youtube'],
                'deskripsi_youtube' => $validated['deskripsi_youtube']
            ]);

            return redirect()->route('youtube');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, Youtube $id)
    {
        $validated = $request->validate([
            'judul_youtube' => 'nullable|string|max:255',
            'link_youtube' => 'nullable|string',
            'deskripsi_youtube' => 'required|string',
        ]);

        $dataToUpdate = [];

        if ($request->filled('judul_youtube')) {
            $dataToUpdate['judul_youtube'] = $validated['judul_youtube'];
        }

        if ($request->filled('link_youtube')) {
            $dataToUpdate['link_youtube'] = $validated['link_youtube'];
        }
        
        if ($request->filled('deskripsi_youtube')) {
            $dataToUpdate['deskripsi_youtube'] = $validated['deskripsi_youtube'];
        }

        $id->update($dataToUpdate);

        return redirect()->route('youtube');
    }

    public function destroy($id)
    {
        Youtube::destroy($id);
        return redirect()->route('youtube');
    }
}
