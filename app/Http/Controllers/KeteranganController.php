<?php

namespace App\Http\Controllers;

use App\Models\KeteranganSkill;
use App\Models\Skill;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class KeteranganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAllketerangan()
    {
        $keterangans = KeteranganSkill::with(['skill', 'mahasiswa'])->get();
        $skills = Skill::all();
        $mahasiswas = Mahasiswa::pluck('nama_mahasiswa', 'id');
    
        return response()->json([
            'data' => $keterangans,
            'skill' => $skills,
            'mahasiswa' => $mahasiswas,
        ], 200); // Status code 200
    }
    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all keterangan skills with related skill and mahasiswa data
        $keterangans = KeteranganSkill::with(['skill', 'mahasiswa'])->get();
        $skills = Skill::all();
        $mahasiswas = Mahasiswa::pluck('nama_mahasiswa', 'id');

        return Inertia::render('KeteranganSkill', [
            'data' => $keterangans,
            'skill' => $skills,  // Menambahkan data skill
            'mahasiswa' => $mahasiswas,  // Menambahkan data mahasiswa, jika memang ini yang dimaksudkan sebagai 'prodi'
        ]);
    }


    public function create()
    {
        // Get all skills and mahasiswas for the form
        $skills = Skill::all();
        $mahasiswas = Mahasiswa::all();

        return view('keterangan.create', compact('skills', 'mahasiswas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'deskripsi_skill' => 'required|string',
            'photo_piagam' => 'required|file|image|max:10240', // 10MB max
            'skill_id' => 'required|exists:skill,id',
            'mahasiswa_id' => 'required|exists:mahasiswa,id',
        ]);

        if ($request->hasFile('photo_piagam')) {
            $path = $request->file('photo_piagam')->store('public/piagam');
            $fileName = basename($path);
        } else {
            return back()->withErrors(['photo_piagam' => 'The photo piagam field is required.']);
        }


        KeteranganSkill::create([
            'deskripsi_skill' => $request->deskripsi_skill,
            'photo_piagam' => $fileName,
            'skill_id' => $request->skill_id,
            'mahasiswa_id' => $request->mahasiswa_id,
        ]);
        return redirect()->route('keterangan')->with('success', 'Keterangan skill created successfully.');
    }

    // Store User
    public function storeUser(Request $request)
    {
        $request->validate([
            'deskripsi_skill' => 'required|string',
            'photo_piagam' => 'nullable|file|mimes:jpeg,png,jpg,gif,zip,pdf|max:10240', // Allow images, zip, and pdf files, 10MB max
            'skill_id' => 'required|exists:skill,id',
        ]);


        $fileName = null; // Default to null in case no file is uploaded

        if ($request->hasFile('photo_piagam')) {
            $path = $request->file('photo_piagam')->store('public/piagam');
            $fileName = basename($path);
        }
        $mahasiswa = Auth::user()->mahasiswa;

        KeteranganSkill::create([
            'deskripsi_skill' => $request->deskripsi_skill,
            'photo_piagam' => $fileName,
            'skill_id' => $request->skill_id,
            'mahasiswa_id' => $mahasiswa->id,
        ]);

        return redirect()->route('profile')->with('success', 'Skill added successfully.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KeteranganSkill $id)
    {
        $validated = $request->validate([
            'deskripsi_skill' => 'nullable|string',
            'photo_piagam' => 'nullable|file|image|max:10240', // 10MB max
            'skill_id' => 'nullable|exists:skill,id',
            'mahasiswa_id' => 'nullable|exists:mahasiswa,id',
        ]);

        $dataToUpdate = [];

        if ($request->filled('deskripsi_skill')) {
            $dataToUpdate['deskripsi_skill'] = $validated['deskripsi_skill'];
        }

        if ($request->hasFile('photo_piagam')) {
            $path = $request->file('photo_piagam')->store('public/piagam');
            $fileName = basename($path);
            $dataToUpdate['photo_piagam'] = $fileName;
        }

        if ($request->filled('skill_id')) {
            $dataToUpdate['skill_id'] = $validated['skill_id'];
        }

        if ($request->filled('mahasiswa_id')) {
            $dataToUpdate['mahasiswa_id'] = $validated['mahasiswa_id'];
        }

        // Update the data
        $id->update($dataToUpdate);

        return redirect()->route('keterangan');
    }

    public function updateUser(Request $request, KeteranganSkill $id)
    {
        $validated = $request->validate([
            'deskripsi_skill' => 'nullable|string',
            'photo_piagam' => 'nullable|file|image|max:10240', // 10MB max
            'skill_id' => 'nullable|exists:skill,id',
            'mahasiswa_id' => 'nullable|exists:mahasiswa,id',
        ]);

        $dataToUpdate = [];

        if ($request->filled('deskripsi_skill')) {
            $dataToUpdate['deskripsi_skill'] = $validated['deskripsi_skill'];
        }

        if ($request->hasFile('photo_piagam')) {
            $path = $request->file('photo_piagam')->store('public/piagam');
            $fileName = basename($path);
            $dataToUpdate['photo_piagam'] = $fileName;
        }

        if ($request->filled('skill_id')) {
            $dataToUpdate['skill_id'] = $validated['skill_id'];
        }

        if ($request->filled('mahasiswa_id')) {
            $dataToUpdate['mahasiswa_id'] = $validated['mahasiswa_id'];
        }

        // Update the data
        $id->update($dataToUpdate);

        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $keterangan = KeteranganSkill::findOrFail($id);
        $keterangan->delete();

        // Redirect atau render view tanpa respons JSON
        return redirect()->route('keterangan')->with('success', 'Data berhasil dihapus');
    }
    public function destroyUser($id)
    {
        $keterangan = KeteranganSkill::findOrFail($id);
        $keterangan->delete();

        // Redirect atau render view tanpa respons JSON
        return redirect()->route('profile')->with('success', 'Data berhasil dihapus');
    }
}
