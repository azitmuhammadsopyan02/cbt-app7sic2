@extends('layouts.siswa')

@section('title', 'Dashboard Siswa')

@section('page-title', 'Dashboard')

@section('content')

<div class="dashboard">

    {{-- =========================
         WELCOME
    ========================== --}}

    <div class="welcome-card">

        <div class="welcome-content">

            <div class="welcome-icon">
                👋
            </div>

            <div>

                <h1>
                    Selamat Datang,
                    {{ $user->name }}!
                </h1>

                <p>
                    Siap mengikuti ujian hari ini?
                    Pilih ujian yang tersedia dan mulai kerjakan.
                </p>

            </div>

        </div>

        <div class="welcome-decoration">
            🎓
        </div>

    </div>


    {{-- =========================
         STATISTIK
    ========================== --}}

    <div class="stats-grid">

        {{-- UJIAN TERSEDIA --}}

        <div class="stat-card">

            <div class="stat-icon blue">
                📝
            </div>

            <div class="stat-info">

                <span>
                    Ujian Tersedia
                </span>

                <strong>
                    {{ $ujians->count() }}
                </strong>

            </div>

        </div>


        {{-- UJIAN SELESAI --}}

        <div class="stat-card">

            <div class="stat-icon green">
                ✅
            </div>

            <div class="stat-info">

                <span>
                    Ujian Selesai
                </span>

                <strong>
                    {{ $jumlahSelesai }}
                </strong>

            </div>

        </div>


        {{-- NILAI TERAKHIR --}}

        <div class="stat-card">

            <div class="stat-icon orange">
                🏆
            </div>

            <div class="stat-info">

                <span>
                    Nilai Terakhir
                </span>

                <strong>

                    @if($hasilTerakhir)
                        {{ number_format($hasilTerakhir->nilai, 0) }}
                    @else
                        -
                    @endif

                </strong>

            </div>

        </div>

    </div>


    {{-- =========================
         UJIAN TERSEDIA
    ========================== --}}

    <div class="section-header">

        <div>

            <h2>
                Ujian Tersedia
            </h2>

            <p>
                Ujian yang dapat kamu kerjakan saat ini.
            </p>

        </div>

        <a href="{{ route('siswa.ujian.index') }}">
            Lihat Semua →
        </a>

    </div>


    @if($ujians->count() > 0)

        <div class="exam-grid">

            @foreach($ujians->take(3) as $ujian)

                <div class="exam-card">

                    <div class="exam-top">

                        <div class="exam-icon">
                            📝
                        </div>

                        <span class="active-badge">
                            Aktif
                        </span>

                    </div>


                    <h3>
                        {{ $ujian->nama_ujian }}
                    </h3>


                    <p class="exam-description">

                        {{ $ujian->deskripsi
                            ?? 'Ujian yang tersedia untuk kamu kerjakan.' }}

                    </p>


                    <div class="exam-meta">

                        <span>
                            ⏱ {{ $ujian->durasi }} Menit
                        </span>

                        <span>
                            📚 {{ $ujian->soals_count }} Soal
                        </span>

                    </div>


                    <a
                        href="{{ route('siswa.ujian.show', $ujian) }}"
                        class="btn-start"
                    >
                        Mulai Ujian
                        →
                    </a>

                </div>

            @endforeach

        </div>

    @else

        <div class="empty-card">

            <div>
                📭
            </div>

            <h3>
                Belum Ada Ujian
            </h3>

            <p>
                Saat ini belum ada ujian yang tersedia.
            </p>

        </div>

    @endif


    {{-- =========================
         RIWAYAT TERBARU
    ========================== --}}

    <div class="section-header history-header">

        <div>

            <h2>
                Aktivitas Terakhir
            </h2>

            <p>
                Hasil ujian yang baru saja kamu selesaikan.
            </p>

        </div>

        <a href="{{ route('siswa.riwayat') }}">
            Lihat Riwayat →
        </a>

    </div>


    @if($riwayatTerbaru->count() > 0)

        <div class="history-card">

            @foreach($riwayatTerbaru as $hasil)

                <div class="history-item">

                    <div class="history-left">

                        <div class="history-icon">
                            📝
                        </div>

                        <div>

                            <strong>
                                {{ $hasil->ujian->nama_ujian }}
                            </strong>

                            <span>
                                {{ $hasil->waktu_selesai
                                    ? $hasil->waktu_selesai->format('d M Y, H:i')
                                    : '-' }}
                            </span>

                        </div>

                    </div>


                    <div class="history-right">

                        <div class="score">

                            {{ number_format($hasil->nilai, 0) }}

                        </div>

                        <span class="completed">
                            ✓ Selesai
                        </span>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="empty-history">

            <span>
                Belum ada aktivitas ujian.
            </span>

        </div>

    @endif

</div>


<style>

/* =========================
   DASHBOARD
========================= */

.dashboard {
    max-width: 1200px;
    margin: auto;
}


/* =========================
   WELCOME
========================= */

.welcome-card {

    position: relative;

    overflow: hidden;

    background:
        linear-gradient(
            135deg,
            #173b6c,
            #2563eb
        );

    color: white;

    border-radius: 20px;

    padding: 30px;

    margin-bottom: 25px;

    box-shadow:
        0 12px 30px rgba(23,59,108,.20);

}


.welcome-content {

    display: flex;

    align-items: center;

    gap: 18px;

    position: relative;

    z-index: 2;

}


.welcome-icon {

    width: 55px;
    height: 55px;

    background:
        rgba(255,255,255,.15);

    border:
        1px solid rgba(255,255,255,.2);

    border-radius: 15px;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 25px;
}


.welcome-card h1 {

    font-size: 24px;

    margin-bottom: 7px;
}


.welcome-card p {

    color: #dbeafe;

    font-size: 14px;

    line-height: 1.6;
}


.welcome-decoration {

    position: absolute;

    right: 35px;
    bottom: -15px;

    font-size: 100px;

    opacity: .12;
}


/* =========================
   STATS
========================= */

.stats-grid {

    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 18px;

    margin-bottom: 30px;
}


.stat-card {

    background: white;

    border-radius: 16px;

    padding: 20px;

    display: flex;

    align-items: center;

    gap: 15px;

    border:
        1px solid #eef2f7;

    box-shadow:
        0 7px 22px rgba(0,0,0,.05);
}


.stat-icon {

    width: 50px;
    height: 50px;

    border-radius: 14px;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 22px;
}


.stat-icon.blue {

    background: #dbeafe;
}


.stat-icon.green {

    background: #dcfce7;
}


.stat-icon.orange {

    background: #fef3c7;
}


.stat-info span {

    display: block;

    color: #64748b;

    font-size: 13px;

    margin-bottom: 5px;
}


.stat-info strong {

    display: block;

    color: #173b6c;

    font-size: 25px;
}


/* =========================
   SECTION HEADER
========================= */

.section-header {

    display: flex;

    justify-content: space-between;

    align-items: end;

    margin-bottom: 15px;
}


.section-header h2 {

    color: #173b6c;

    font-size: 20px;

    margin-bottom: 5px;
}


.section-header p {

    color: #94a3b8;

    font-size: 13px;
}


.section-header a {

    color: #2563eb;

    text-decoration: none;

    font-size: 13px;

    font-weight: 600;
}


.section-header a:hover {

    text-decoration: underline;
}


/* =========================
   EXAM GRID
========================= */

.exam-grid {

    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 18px;

    margin-bottom: 35px;
}


.exam-card {

    background: white;

    border-radius: 18px;

    padding: 22px;

    border:
        1px solid #eef2f7;

    box-shadow:
        0 7px 22px rgba(0,0,0,.05);

    transition: .25s;
}


.exam-card:hover {

    transform: translateY(-4px);

    box-shadow:
        0 12px 30px rgba(0,0,0,.08);
}


.exam-top {

    display: flex;

    justify-content: space-between;

    align-items: center;

    margin-bottom: 18px;
}


.exam-icon {

    width: 45px;
    height: 45px;

    background: #eaf2ff;

    border-radius: 12px;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 20px;
}


.active-badge {

    background: #dcfce7;

    color: #15803d;

    padding: 5px 9px;

    border-radius: 7px;

    font-size: 11px;

    font-weight: 700;
}


.exam-card h3 {

    color: #173b6c;

    font-size: 17px;

    margin-bottom: 8px;
}


.exam-description {

    color: #64748b;

    font-size: 13px;

    line-height: 1.6;

    min-height: 42px;

    margin-bottom: 15px;
}


.exam-meta {

    display: flex;

    gap: 15px;

    color: #64748b;

    font-size: 12px;

    margin-bottom: 18px;
}


.btn-start {

    display: block;

    text-align: center;

    background: #173b6c;

    color: white;

    text-decoration: none;

    padding: 11px;

    border-radius: 10px;

    font-size: 13px;

    font-weight: 600;

    transition: .2s;
}


.btn-start:hover {

    background: #0f2d54;
}


/* =========================
   EMPTY
========================= */

.empty-card {

    background: white;

    border-radius: 18px;

    padding: 45px;

    text-align: center;

    margin-bottom: 35px;

    border:
        1px solid #eef2f7;
}


.empty-card > div {

    font-size: 40px;

    margin-bottom: 10px;
}


.empty-card h3 {

    color: #173b6c;

    margin-bottom: 6px;
}


.empty-card p {

    color: #94a3b8;

    font-size: 13px;
}


/* =========================
   HISTORY
========================= */

.history-header {

    margin-top: 5px;
}


.history-card {

    background: white;

    border-radius: 18px;

    padding: 5px 22px;

    border:
        1px solid #eef2f7;

    box-shadow:
        0 7px 22px rgba(0,0,0,.05);
}


.history-item {

    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 17px 0;

    border-bottom:
        1px solid #eef2f7;
}


.history-item:last-child {

    border-bottom: none;
}


.history-left {

    display: flex;

    align-items: center;

    gap: 13px;
}


.history-icon {

    width: 42px;
    height: 42px;

    border-radius: 11px;

    background: #eaf2ff;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 18px;
}


.history-left strong {

    display: block;

    color: #173b6c;

    font-size: 14px;

    margin-bottom: 4px;
}


.history-left span {

    display: block;

    color: #94a3b8;

    font-size: 11px;
}


.history-right {

    display: flex;

    align-items: center;

    gap: 15px;
}


.score {

    min-width: 45px;
    height: 34px;

    background: #dcfce7;

    color: #15803d;

    border-radius: 9px;

    display: flex;

    align-items: center;

    justify-content: center;

    font-weight: 800;

    font-size: 14px;
}


.completed {

    color: #15803d;

    font-size: 12px;

    font-weight: 600;
}


.empty-history {

    background: white;

    border-radius: 18px;

    padding: 25px;

    color: #94a3b8;

    font-size: 13px;

    text-align: center;
}


/* =========================
   RESPONSIVE
========================= */

@media(max-width: 900px) {

    .stats-grid {

        grid-template-columns:
            repeat(2, 1fr);
    }


    .exam-grid {

        grid-template-columns:
            repeat(2, 1fr);
    }

}


@media(max-width: 600px) {

    .stats-grid {

        grid-template-columns: 1fr;
    }


    .exam-grid {

        grid-template-columns: 1fr;
    }


    .welcome-card {

        padding: 22px;
    }


    .welcome-card h1 {

        font-size: 20px;
    }


    .welcome-decoration {

        display: none;
    }


    .section-header {

        align-items: flex-start;

        gap: 10px;

        flex-direction: column;
    }


    .history-item {

        align-items: flex-start;

        gap: 10px;
    }


    .history-right {

        flex-direction: column;

        align-items: flex-end;

        gap: 5px;
    }

}

</style>

@endsection