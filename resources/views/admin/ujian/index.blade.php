@extends('layouts.admin')

@section('title', 'Data Ujian')

@section('page-title', 'Data Ujian')

@section('content')

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:25px;
    ">

        <div>
            <h2>Data Ujian</h2>

            <p style="
                color:#64748b;
                margin-top:5px;
            ">
                Kelola ujian yang tersedia di sistem CBT.
            </p>
        </div>

        <a href="{{ route('admin.ujian.create') }}"
           style="
                background:#173b6c;
                color:white;
                text-decoration:none;
                padding:12px 18px;
                border-radius:10px;
                font-size:14px;
           ">
            + Tambah Ujian
        </a>

    </div>


    <div style="
        background:white;
        border-radius:16px;
        border:1px solid #e5e7eb;
        overflow:hidden;
    ">

        <table style="
            width:100%;
            border-collapse:collapse;
        ">

            <thead>

                <tr style="
                    background:#f8fafc;
                    text-align:left;
                ">

                    <th style="padding:15px;">No</th>
                    <th style="padding:15px;">Nama Ujian</th>
                    <th style="padding:15px;">Durasi</th>
                    <th style="padding:15px;">Status</th>
                    <th style="padding:15px;">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($ujians as $ujian)

                    <tr style="
                        border-top:1px solid #e5e7eb;
                    ">

                        <td style="padding:15px;">
                            {{ $loop->iteration }}
                        </td>

                        <td style="padding:15px;">
                            <strong>
                                {{ $ujian->nama_ujian }}
                            </strong>

                            @if($ujian->deskripsi)
                                <div style="
                                    font-size:12px;
                                    color:#64748b;
                                    margin-top:4px;
                                ">
                                    {{ $ujian->deskripsi }}
                                </div>
                            @endif
                        </td>

                        <td style="padding:15px;">
                            {{ $ujian->durasi }} menit
                        </td>

                        <td style="padding:15px;">

                            @if($ujian->aktif)

                                <span style="
                                    background:#dcfce7;
                                    color:#166534;
                                    padding:6px 10px;
                                    border-radius:20px;
                                    font-size:12px;
                                ">
                                    Aktif
                                </span>

                            @else

                                <span style="
                                    background:#fee2e2;
                                    color:#991b1b;
                                    padding:6px 10px;
                                    border-radius:20px;
                                    font-size:12px;
                                ">
                                    Tidak Aktif
                                </span>

                            @endif

                        </td>

                        <td style="padding:15px;">

                            <a href="{{ route('admin.soal.index', $ujian) }}"
   style="
        text-decoration:none;
        background:#eff6ff;
        color:#1d4ed8;
        padding:7px 12px;
        border-radius:8px;
        font-size:12px;
   ">
    Soal
</a>

                            <form action="{{ route('admin.ujian.destroy', $ujian) }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Hapus ujian ini?')"
                                        style="
                                            border:none;
                                            background:#fee2e2;
                                            color:#991b1b;
                                            padding:7px 12px;
                                            border-radius:8px;
                                            cursor:pointer;
                                            font-size:12px;
                                        ">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                            style="
                                padding:40px;
                                text-align:center;
                                color:#64748b;
                            ">

                            Belum ada data ujian.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

@endsection