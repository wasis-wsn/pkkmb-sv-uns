<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Prodi;
use App\Models\Skill;
use App\Models\Kelompok;
use App\Models\Mahasiswa;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::all();
        $mahasiswas = Mahasiswa::all();
        $prodi = Prodi::all();
        $kelompok = Kelompok::all();
        $skills = Skill::all();

        return Inertia::render('DashboardView', [
            'user' => $user,
            'mahasiswa' => $mahasiswas,
            'prodi' => $prodi,
            'kelompok' => $kelompok,
            'skills' => $skills
        ]);
    }
}
