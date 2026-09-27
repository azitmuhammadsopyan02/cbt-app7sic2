<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use App\Models\HasilUjian;

class SiswaController extends Controller
{
    /**
     * Dashboard siswa.
     */
    public function dashboard()
    {
        $user = auth()->user();

        // Semua ujian yang aktif
        $ujians = Ujian::withCount('soals')
            ->where('aktif', true)
            ->latest()
            ->get();

        // Jumlah ujian yang sudah selesai
        $jumlahSelesai = HasilUjian::where('user_id', $user->id)
            ->whereNotNull('waktu_selesai')
            ->count();

        // Nilai terakhir
        $hasilTerakhir = HasilUjian::with('ujian')
            ->where('user_id', $user->id)
            ->whereNotNull('waktu_selesai')
            ->latest('waktu_selesai')
            ->first();

        // Riwayat terbaru
        $riwayatTerbaru = HasilUjian::with('ujian')
            ->where('user_id', $user->id)
            ->whereNotNull('waktu_selesai')
            ->latest('waktu_selesai')
            ->take(5)
            ->get();

        return view('siswa.dashboard', compact(
            'user',
            'ujians',
            'jumlahSelesai',
            'hasilTerakhir',
            'riwayatTerbaru'
        ));
    }

    /**
     * Daftar ujian siswa.
     */
    public function ujian()
    {
        $ujians = Ujian::withCount('soals')
            ->where('aktif', true)
            ->latest()
            ->get();

        return view('siswa.ujian.index', compact('ujians'));
    }

    /**
     * Riwayat ujian siswa.
     */
    public function riwayat()
    {
        $hasilUjians = HasilUjian::with('ujian')
            ->where('user_id', auth()->id())
            ->whereNotNull('waktu_selesai')
            ->latest('waktu_selesai')
            ->get();

        return view('siswa.riwayat', compact('hasilUjians'));
    }
}