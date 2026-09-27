<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function index()
    {
        $ujians = Ujian::latest()->get();

        return view('admin.ujian.index', compact('ujians'));
    }

    public function create()
    {
        return view('admin.ujian.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_ujian' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'durasi' => 'required|integer|min:1',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        $data['aktif'] = $request->has('aktif');

        Ujian::create($data);

        return redirect()
            ->route('admin.ujian.index')
            ->with('success', 'Ujian berhasil ditambahkan.');
    }

    public function destroy(Ujian $ujian)
    {
        $ujian->delete();

        return back()->with(
            'success',
            'Ujian berhasil dihapus.'
        );
    }
}