<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function getAllSkill()
    {
        $skills = Skill::all();
        return response()->json(['data' => $skills], 200);
    }

    public function index()
    {
        $skills = Skill::all();
        return Inertia::render('SkillView', ['data' => $skills]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_skill' => 'required|string|max:255',
            ]);

            Skill::create([
                'nama_skill' => $validated['nama_skill'],
            ]);

            return redirect()->route('skill');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function storeUser(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_skill' => 'required|string|max:255',
            ]);

            Skill::create([
                'nama_skill' => $validated['nama_skill'],
            ]);

            return redirect()->route('profile');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, Skill $id)
    {
        $validated = $request->validate([
            'nama_skill' => 'nullable|string|max:255',
        ]);

        $dataToUpdate = [];

        if ($request->filled('nama_skill')) {
            $dataToUpdate['nama_skill'] = $validated['nama_skill'];
        }

        $id->update($dataToUpdate);

        return redirect()->route('skill');
    }

    public function destroy($id)
    {
        Skill::destroy($id);
        return redirect()->route('skill');
    }
}
