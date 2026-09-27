<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ujian;
use App\Models\Soal;
use App\Models\HasilUjian;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'jumlahSiswa' => User::where('role', 'siswa')->count(),
            'jumlahUjian' => Ujian::count(),
            'jumlahSoal' => Soal::count(),
            'jumlahHasil' => HasilUjian::count(),
        ]);
    }
}