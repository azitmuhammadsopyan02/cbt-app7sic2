<?php

namespace App\Http\Controllers;

use App\Models\HasilUjian;
use Illuminate\Http\Request;

class HasilUjianController extends Controller
{
    /**
     * Menampilkan semua hasil ujian.
     */
    public function index(Request $request)
    {
        $query = HasilUjian::with([
            'user',
            'ujian'
        ])
        ->whereNotNull('waktu_selesai')
        ->latest('waktu_selesai');

        // Filter berdasarkan ujian
        if ($request->filled('ujian_id')) {
            $query->where(
                'ujian_id',
                $request->ujian_id
            );
        }

        $hasilUjians = $query->get();

        return view(
            'admin.hasil.index',
            compact('hasilUjians')
        );
    }

    /**
     * Menampilkan detail hasil ujian.
     */
    public function show(HasilUjian $hasil)
    {
        $hasil->load([
            'user',
            'ujian'
        ]);

        return view(
            'admin.hasil.show',
            compact('hasil')
        );
    }
}