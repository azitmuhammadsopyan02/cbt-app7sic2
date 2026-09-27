<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use App\Models\HasilUjian;
use Illuminate\Http\Request;

class UjianSiswaController extends Controller
{
    /**
     * Menampilkan halaman ujian
     */
    public function show(Ujian $ujian)
    {
        if (!$ujian->aktif) {
            abort(404);
        }

        $soals = $ujian->soals()
            ->orderBy('id')
            ->get();

        if ($soals->isEmpty()) {
            return redirect()
                ->route('siswa.dashboard')
                ->with(
                    'error',
                    'Ujian ini belum memiliki soal.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | CEK HASIL UJIAN SISWA
        |--------------------------------------------------------------------------
        */

        $hasil = HasilUjian::where('user_id', auth()->id())
            ->where('ujian_id', $ujian->id)
            ->latest()
            ->first();


        /*
        |--------------------------------------------------------------------------
        | JIKA SUDAH PERNAH SELESAI
        |--------------------------------------------------------------------------
        */

        if ($hasil && $hasil->waktu_selesai) {

            return redirect()
                ->route('siswa.dashboard')
                ->with(
                    'error',
                    'Kamu sudah menyelesaikan ujian ini.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | JIKA BELUM ADA HASIL
        | BUAT RECORD DAN CATAT WAKTU MULAI
        |--------------------------------------------------------------------------
        */

        if (!$hasil) {

            $hasil = HasilUjian::create([
                'user_id' => auth()->id(),
                'ujian_id' => $ujian->id,
                'jumlah_benar' => 0,
                'jumlah_salah' => 0,
                'nilai' => 0,
                'waktu_mulai' => now(),
                'waktu_selesai' => null,
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | HITUNG SISA WAKTU
        |--------------------------------------------------------------------------
        */

        $durasiDetik = $ujian->durasi * 60;

        $waktuTerpakai =
            now()->diffInSeconds(
                $hasil->waktu_mulai
            );

        $sisaWaktu =
            max(
                0,
                $durasiDetik - $waktuTerpakai
            );


        /*
        |--------------------------------------------------------------------------
        | JIKA WAKTU SUDAH HABIS
        |--------------------------------------------------------------------------
        */

        if ($sisaWaktu <= 0) {

            return $this->prosesSubmit(
                $ujian,
                $hasil,
                []
            );
        }


        return view(
            'siswa.ujian.show',
            compact(
                'ujian',
                'soals',
                'hasil',
                'sisaWaktu'
            )
        );
    }


    /**
     * Submit ujian
     */
    public function submit(
        Request $request,
        Ujian $ujian
    ) {
        if (!$ujian->aktif) {
            abort(404);
        }


        $hasil = HasilUjian::where('user_id', auth()->id())
            ->where('ujian_id', $ujian->id)
            ->whereNull('waktu_selesai')
            ->latest()
            ->first();


        /*
        |--------------------------------------------------------------------------
        | TIDAK ADA UJIAN YANG SEDANG BERJALAN
        |--------------------------------------------------------------------------
        */

        if (!$hasil) {

            return redirect()
                ->route('siswa.dashboard')
                ->with(
                    'error',
                    'Ujian ini sudah selesai atau belum dimulai.'
                );
        }


        $jawaban = $request->input(
            'jawaban',
            []
        );


        return $this->prosesSubmit(
            $ujian,
            $hasil,
            $jawaban
        );
    }


    /**
     * Proses penilaian
     */
    private function prosesSubmit(
        Ujian $ujian,
        HasilUjian $hasil,
        array $jawaban
    ) {

        $soals = $ujian->soals()
            ->orderBy('id')
            ->get();


        $jumlahBenar = 0;


        foreach ($soals as $soal) {

            if (
                isset($jawaban[$soal->id]) &&
                strtoupper(
                    $jawaban[$soal->id]
                ) === strtoupper(
                    $soal->jawaban_benar
                )
            ) {

                $jumlahBenar++;
            }
        }


        $jumlahSoal =
            $soals->count();


        $jumlahSalah =
            $jumlahSoal - $jumlahBenar;


        $nilai =
            $jumlahSoal > 0
                ? ($jumlahBenar / $jumlahSoal) * 100
                : 0;


        /*
        |--------------------------------------------------------------------------
        | SIMPAN HASIL
        |--------------------------------------------------------------------------
        */

        $hasil->update([

            'jumlah_benar' =>
                $jumlahBenar,

            'jumlah_salah' =>
                $jumlahSalah,

            'nilai' =>
                $nilai,

            'waktu_selesai' =>
                now(),

        ]);


        return redirect()
            ->route(
                'siswa.hasil',
                $hasil
            )
            ->with(
                'success',
                'Ujian berhasil diselesaikan.'
            );
    }


    /**
     * Halaman hasil siswa
     */
    public function hasil(HasilUjian $hasil)
    {
        if (
            $hasil->user_id !==
            auth()->id()
        ) {
            abort(403);
        }


        $hasil->load('ujian');


        return view(
            'siswa.ujian.hasil',
            compact('hasil')
        );
    }
}