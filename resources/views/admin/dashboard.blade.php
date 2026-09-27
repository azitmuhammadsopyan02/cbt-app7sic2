@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('page-title', 'Dashboard')

@section('content')

    <div style="
        background: linear-gradient(135deg, #173b6c, #2563eb);
        color: white;
        border-radius: 18px;
        padding: 30px;
        margin-bottom: 25px;
    ">

        <h1 style="font-size:28px; margin-bottom:8px;">
            Selamat Datang, {{ auth()->user()->name }} 👋
        </h1>

        <p style="opacity:.85;">
            Kelola sistem ujian online dengan mudah melalui panel administrator.
        </p>

    </div>


    <!-- STATISTIK -->

    <div style="
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
        gap:18px;
        margin-bottom:30px;
    ">

        <div style="
            background:white;
            padding:22px;
            border-radius:16px;
            border:1px solid #e5e7eb;
        ">
            <small style="color:#64748b;">
                Total Siswa
            </small>

            <h2 style="margin-top:8px;">
                {{ $jumlahSiswa }}
            </h2>
        </div>


        <div style="
            background:white;
            padding:22px;
            border-radius:16px;
            border:1px solid #e5e7eb;
        ">
            <small style="color:#64748b;">
                Total Ujian
            </small>

            <h2 style="margin-top:8px;">
                {{ $jumlahUjian }}
            </h2>
        </div>


        <div style="
            background:white;
            padding:22px;
            border-radius:16px;
            border:1px solid #e5e7eb;
        ">
            <small style="color:#64748b;">
                Total Soal
            </small>

            <h2 style="margin-top:8px;">
                {{ $jumlahSoal }}
            </h2>
        </div>


        <div style="
            background:white;
            padding:22px;
            border-radius:16px;
            border:1px solid #e5e7eb;
        ">
            <small style="color:#64748b;">
                Hasil Ujian
            </small>

            <h2 style="margin-top:8px;">
                {{ $jumlahHasil }}
            </h2>
        </div>

    </div>


    <!-- MENU CEPAT -->

    <h3 style="margin-bottom:15px;">
        Menu Cepat
    </h3>

    <div style="
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
        gap:18px;
    ">

        <a href="{{ route('admin.ujian.index') }}"
           style="
                text-decoration:none;
                background:white;
                padding:22px;
                border-radius:16px;
                border:1px solid #e5e7eb;
                color:#172033;
           ">

            <div style="font-size:28px;">
                📝
            </div>

            <h3 style="margin-top:12px;">
                Data Ujian
            </h3>

            <p style="
                color:#64748b;
                font-size:13px;
                margin-top:6px;
            ">
                Kelola data ujian dan jadwal.
            </p>

        </a>


        <a href="#"
           style="
                text-decoration:none;
                background:white;
                padding:22px;
                border-radius:16px;
                border:1px solid #e5e7eb;
                color:#172033;
           ">

            <div style="font-size:28px;">
                📚
            </div>

            <h3 style="margin-top:12px;">
                Data Soal
            </h3>

            <p style="
                color:#64748b;
                font-size:13px;
                margin-top:6px;
            ">
                Kelola soal untuk setiap ujian.
            </p>

        </a>


        <a href="#"
           style="
                text-decoration:none;
                background:white;
                padding:22px;
                border-radius:16px;
                border:1px solid #e5e7eb;
                color:#172033;
           ">

            <div style="font-size:28px;">
                📈
            </div>

            <h3 style="margin-top:12px;">
                Hasil Ujian
            </h3>

            <p style="
                color:#64748b;
                font-size:13px;
                margin-top:6px;
            ">
                Lihat hasil pengerjaan siswa.
            </p>

        </a>

    </div>

@endsection