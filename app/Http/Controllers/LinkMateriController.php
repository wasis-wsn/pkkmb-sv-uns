<?php

namespace App\Http\Controllers;

use App\Models\LinkMateri;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class LinkMateriController extends Controller
{
    public function getAllLinkMateri()
    {
        $materilink = LinkMateri::all();
        return response()->json(['data' => $materilink], 200);
    }

    public function index()
    {
        $materilink = LinkMateri::all();
        return Inertia::render('MateriLinkView', ['data' => $materilink]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul_file' => 'required|string|max:255',
                'link_drive' => 'required|string',
            ]);

            $user = Auth::user();

            LinkMateri::create([
                'user_id' => $user->id,
                'judul_file' => $validated['judul_file'],
                'link_drive' => $validated['link_drive']
            ]);

            return redirect()->route('linkmateri');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, LinkMateri $id)
    {
        $validated = $request->validate([
            'judul_file' => 'nullable|string|max:255',
            'link_drive' => 'nullable|string',
        ]);

        $dataToUpdate = [];

        if ($request->filled('judul_file')) {
            $dataToUpdate['judul_file'] = $validated['judul_file'];
        }

        if ($request->filled('link_drive')) {
            $dataToUpdate['link_drive'] = $validated['link_drive'];
        }

        $id->update($dataToUpdate);

        return redirect()->route('linkmateri');
    }

    public function destroy($id)
    {
        LinkMateri::destroy($id);
        return redirect()->route('linkmateri');
    }
}
