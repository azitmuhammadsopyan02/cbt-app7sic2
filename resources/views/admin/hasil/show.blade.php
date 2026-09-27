@extends('layouts.admin')

@section('title', 'Detail Hasil Ujian')

@section('content')

<div class="page-header">

    <div>

        <a
            href="{{ route('admin.hasil.index') }}"
            class="back-link"
        >
            ← Kembali ke Hasil Ujian
        </a>

        <h1>
            Detail Hasil Ujian
        </h1>

        <p>
            Informasi lengkap hasil pengerjaan siswa.
        </p>

    </div>

</div>


<div class="result-grid">

    {{-- PROFIL SISWA --}}

    <div class="card">

        <div class="card-title">
            <span>👤</span>
            Data Siswa
        </div>

        <div class="profile">

            <div class="big-avatar">

                {{ strtoupper(
                    substr(
                        $hasil->user->name,
                        0,
                        1
                    )
                ) }}

            </div>

            <div>

                <h2>
                    {{ $hasil->user->name }}
                </h2>

                <p>
                    {{ $hasil->user->email }}
                </p>

            </div>

        </div>

    </div>


    {{-- DATA UJIAN --}}

    <div class="card">

        <div class="card-title">
            <span>📝</span>
            Data Ujian
        </div>

        <div class="info-list">

            <div>
                <span>Nama Ujian</span>
                <strong>
                    {{ $hasil->ujian->nama_ujian }}
                </strong>
            </div>

            <div>
                <span>Durasi</span>
                <strong>
                    {{ $hasil->ujian->durasi }} Menit
                </strong>
            </div>

            <div>
                <span>Waktu Mulai</span>
                <strong>
                    {{ $hasil->waktu_mulai
                        ? $hasil->waktu_mulai
                            ->format('d M Y, H:i:s')
                        : '-' }}
                </strong>
            </div>

            <div>
                <span>Waktu Selesai</span>
                <strong>
                    {{ $hasil->waktu_selesai
                        ? $hasil->waktu_selesai
                            ->format('d M Y, H:i:s')
                        : '-' }}
                </strong>
            </div>

        </div>

    </div>

</div>


{{-- NILAI --}}

<div class="score-card">

    <div class="score-main">

        <span>Nilai Akhir</span>

        <strong>
            {{ number_format($hasil->nilai, 0) }}
        </strong>

    </div>


    <div class="score-item">

        <span>Jawaban Benar</span>

        <strong class="correct">
            {{ $hasil->jumlah_benar }}
        </strong>

    </div>


    <div class="score-item">

        <span>Jawaban Salah</span>

        <strong class="wrong">
            {{ $hasil->jumlah_salah }}
        </strong>

    </div>

</div>


<div class="status-card">

    <div class="status-icon">
        ✓
    </div>

    <div>

        <strong>
            Ujian Telah Selesai
        </strong>

        <span>
            Siswa telah menyelesaikan ujian ini.
        </span>

    </div>

</div>


<style>

.page-header {
    margin-bottom: 25px;
}

.back-link {
    display: inline-block;
    color: #2563eb;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 10px;
}

.page-header h1 {
    color: #173b6c;
    font-size: 26px;
    margin-bottom: 5px;
}

.page-header p {
    color: #64748b;
    font-size: 14px;
}


/* GRID */

.result-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-bottom: 20px;
}

.card {
    background: white;
    border: 1px solid #eef2f7;
    border-radius: 18px;
    padding: 23px;
    box-shadow: 0 7px 22px rgba(0,0,0,.05);
}

.card-title {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #173b6c;
    font-weight: 700;
    font-size: 14px;
    padding-bottom: 16px;
    margin-bottom: 18px;
    border-bottom: 1px solid #eef2f7;
}


/* PROFILE */

.profile {
    display: flex;
    align-items: center;
    gap: 14px;
}

.big-avatar {
    width: 55px;
    height: 55px;
    border-radius: 15px;
    background: #eaf2ff;
    color: #173b6c;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    font-weight: 800;
}

.profile h2 {
    color: #173b6c;
    font-size: 17px;
    margin-bottom: 5px;
}

.profile p {
    color: #94a3b8;
    font-size: 12px;
}


/* INFO */

.info-list > div {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    padding: 10px 0;
    border-bottom: 1px solid #f1f5f9;
}

.info-list > div:last-child {
    border-bottom: none;
}

.info-list span {
    color: #94a3b8;
    font-size: 12px;
}

.info-list strong {
    color: #334155;
    font-size: 12px;
    text-align: right;
}


/* SCORE */

.score-card {
    background: linear-gradient(
        135deg,
        #173b6c,
        #2563eb
    );

    border-radius: 18px;

    padding: 25px;

    color: white;

    display: grid;

    grid-template-columns:
        1.5fr 1fr 1fr;

    gap: 20px;

    align-items: center;

    box-shadow:
        0 10px 30px rgba(23,59,108,.18);

    margin-bottom: 20px;
}

.score-main {
    border-right: 1px solid rgba(255,255,255,.2);
}

.score-main span,
.score-item span {
    display: block;
    font-size: 12px;
    color: #dbeafe;
    margin-bottom: 7px;
}

.score-main strong {
    display: block;
    font-size: 38px;
}

.score-item {
    text-align: center;
}

.score-item strong {
    font-size: 25px;
}

.correct {
    color: #86efac;
}

.wrong {
    color: #fca5a5;
}


/* STATUS */

.status-card {
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    border-radius: 15px;
    padding: 17px 20px;
    display: flex;
    align-items: center;
    gap: 13px;
}

.status-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background: #22c55e;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
}

.status-card strong {
    display: block;
    color: #166534;
    font-size: 13px;
    margin-bottom: 4px;
}

.status-card span {
    color: #4d7c5b;
    font-size: 11px;
}


/* RESPONSIVE */

@media(max-width: 700px) {

    .result-grid {
        grid-template-columns: 1fr;
    }

    .score-card {
        grid-template-columns: 1fr;
    }

    .score-main {
        border-right: none;
        border-bottom: 1px solid rgba(255,255,255,.2);
        padding-bottom: 15px;
    }

    .score-item {
        text-align: left;
    }

}

</style>

@endsection