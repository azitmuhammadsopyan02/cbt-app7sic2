<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Ujian;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Menampilkan daftar ujian untuk memilih soal.
     */
    public function ujian()
    {
        $ujians = Ujian::withCount('soals')
            ->latest()
            ->get();

        return view('admin.soal.ujian', compact('ujians'));
    }

    /**
     * Menampilkan semua soal dalam satu ujian.
     */
    public function index(Ujian $ujian)
    {
        $soals = $ujian->soals()
            ->latest()
            ->get();

        return view(
            'admin.soal.index',
            compact('ujian', 'soals')
        );
    }

    /**
     * Form tambah soal.
     */
    public function create(Ujian $ujian)
    {
        return view(
            'admin.soal.create',
            compact('ujian')
        );
    }

    /**
     * Simpan soal baru.
     */
    public function store(
        Request $request,
        Ujian $ujian
    ) {
        $data = $request->validate([
            'pertanyaan' => 'required|string',
            'pilihan_a' => 'required|string',
            'pilihan_b' => 'required|string',
            'pilihan_c' => 'required|string',
            'pilihan_d' => 'required|string',
            'jawaban_benar' => 'required|in:A,B,C,D',
        ]);

        $ujian->soals()->create($data);

        return redirect()
            ->route('admin.soal.index', $ujian)
            ->with(
                'success',
                'Soal berhasil ditambahkan.'
            );
    }

    /**
     * Form edit soal.
     */
    public function edit(Soal $soal)
    {
        $soal->load('ujian');

        return view(
            'admin.soal.edit',
            compact('soal')
        );
    }

    /**
     * Update soal.
     */
    public function update(
        Request $request,
        Soal $soal
    ) {
        $data = $request->validate([
            'pertanyaan' => 'required|string',
            'pilihan_a' => 'required|string',
            'pilihan_b' => 'required|string',
            'pilihan_c' => 'required|string',
            'pilihan_d' => 'required|string',
            'jawaban_benar' => 'required|in:A,B,C,D',
        ]);

        $soal->update($data);

        return redirect()
            ->route(
                'admin.soal.index',
                $soal->ujian_id
            )
            ->with(
                'success',
                'Soal berhasil diperbarui.'
            );
    }

    /**
     * Hapus soal.
     */
    public function destroy(Soal $soal)
    {
        $ujianId = $soal->ujian_id;

        $soal->delete();

        return redirect()
            ->route(
                'admin.soal.index',
                $ujianId
            )
            ->with(
                'success',
                'Soal berhasil dihapus.'
            );
    }
}