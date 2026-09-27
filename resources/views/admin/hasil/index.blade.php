@extends('layouts.admin')

@section('title', 'Hasil Ujian')

@section('content')

<div class="page-header">

    <div>
        <h1>Hasil Ujian</h1>

        <p>
            Lihat hasil ujian siswa yang telah selesai.
        </p>
    </div>

</div>


{{-- STATISTIK --}}

<div class="stats-grid">

    <div class="stat-card">

        <div class="stat-icon blue">
            📊
        </div>

        <div>
            <span>Total Hasil</span>
            <strong>{{ $hasilUjians->count() }}</strong>
        </div>

    </div>


    <div class="stat-card">

        <div class="stat-icon green">
            ✓
        </div>

        <div>
            <span>Sudah Selesai</span>
            <strong>{{ $hasilUjians->count() }}</strong>
        </div>

    </div>


    <div class="stat-card">

        <div class="stat-icon orange">
            🏆
        </div>

        <div>
            <span>Rata-rata Nilai</span>

            <strong>
                {{ $hasilUjians->count() > 0
                    ? number_format($hasilUjians->avg('nilai'), 1)
                    : '-' }}
            </strong>

        </div>

    </div>

</div>


{{-- ALERT --}}

@if(session('success'))

    <div class="alert-success">
        ✓ {{ session('success') }}
    </div>

@endif


{{-- TABLE --}}

<div class="table-card">

    <div class="table-header">

        <div>
            <h2>Daftar Hasil Ujian</h2>

            <p>
                Data hasil pengerjaan siswa.
            </p>
        </div>

    </div>


    @if($hasilUjians->count() > 0)

        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Siswa</th>
                        <th>Ujian</th>
                        <th>Benar</th>
                        <th>Salah</th>
                        <th>Nilai</th>
                        <th>Waktu Selesai</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($hasilUjians as $index => $hasil)

                        <tr>

                            <td>
                                {{ $index + 1 }}
                            </td>


                            <td>

                                <div class="student">

                                    <div class="avatar">
                                        {{ strtoupper(
                                            substr(
                                                $hasil->user->name,
                                                0,
                                                1
                                            )
                                        ) }}
                                    </div>

                                    <div>

                                        <strong>
                                            {{ $hasil->user->name }}
                                        </strong>

                                        <span>
                                            {{ $hasil->user->email }}
                                        </span>

                                    </div>

                                </div>

                            </td>


                            <td>

                                <strong class="exam-name">
                                    {{ $hasil->ujian->nama_ujian }}
                                </strong>

                            </td>


                            <td>

                                <span class="correct">
                                    {{ $hasil->jumlah_benar }}
                                </span>

                            </td>


                            <td>

                                <span class="wrong">
                                    {{ $hasil->jumlah_salah }}
                                </span>

                            </td>


                            <td>

                                <span
                                    class="
                                        score
                                        {{ $hasil->nilai >= 80
                                            ? 'high'
                                            : ($hasil->nilai >= 60
                                                ? 'medium'
                                                : 'low') }}
                                    "
                                >
                                    {{ number_format($hasil->nilai, 0) }}
                                </span>

                            </td>


                            <td>

                                <span class="date">

                                    {{ $hasil->waktu_selesai
                                        ? $hasil->waktu_selesai
                                            ->format('d M Y H:i')
                                        : '-' }}

                                </span>

                            </td>


                            <td>

                                <a
                                    href="{{ route(
                                        'admin.hasil.show',
                                        $hasil
                                    ) }}"
                                    class="btn-detail"
                                >
                                    Detail →
                                </a>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        <div class="empty">

            <div>
                📭
            </div>

            <h3>
                Belum Ada Hasil
            </h3>

            <p>
                Belum ada siswa yang menyelesaikan ujian.
            </p>

        </div>

    @endif

</div>


<style>

.page-header {
    margin-bottom: 25px;
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


/* STAT */

.stats-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
    margin-bottom: 25px;
}

.stat-card {
    background: white;
    border: 1px solid #eef2f7;
    border-radius: 16px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 14px;
    box-shadow: 0 7px 22px rgba(0,0,0,.05);
}

.stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
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

.stat-card span {
    display: block;
    color: #64748b;
    font-size: 12px;
    margin-bottom: 5px;
}

.stat-card strong {
    color: #173b6c;
    font-size: 23px;
}


/* ALERT */

.alert-success {
    background: #dcfce7;
    color: #166534;
    padding: 13px 16px;
    border-radius: 10px;
    margin-bottom: 20px;
    font-size: 13px;
}


/* TABLE */

.table-card {
    background: white;
    border: 1px solid #eef2f7;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 7px 22px rgba(0,0,0,.05);
}

.table-header {
    padding: 22px;
    border-bottom: 1px solid #eef2f7;
}

.table-header h2 {
    color: #173b6c;
    font-size: 17px;
    margin-bottom: 5px;
}

.table-header p {
    color: #94a3b8;
    font-size: 12px;
}

.table-wrapper {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th {
    background: #f8fafc;
    color: #64748b;
    font-size: 11px;
    text-align: left;
    padding: 14px 16px;
    white-space: nowrap;
}

td {
    padding: 15px 16px;
    border-top: 1px solid #eef2f7;
    color: #475569;
    font-size: 12px;
    white-space: nowrap;
}

tr:hover td {
    background: #fafcff;
}


/* STUDENT */

.student {
    display: flex;
    align-items: center;
    gap: 10px;
}

.avatar {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background: #eaf2ff;
    color: #173b6c;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
}

.student strong {
    display: block;
    color: #173b6c;
    font-size: 12px;
}

.student span {
    display: block;
    color: #94a3b8;
    font-size: 10px;
    margin-top: 3px;
}

.exam-name {
    color: #173b6c;
}


/* NILAI */

.correct {
    color: #15803d;
    font-weight: 700;
}

.wrong {
    color: #dc2626;
    font-weight: 700;
}

.score {
    display: inline-flex;
    min-width: 40px;
    height: 30px;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    font-weight: 800;
}

.score.high {
    background: #dcfce7;
    color: #15803d;
}

.score.medium {
    background: #fef3c7;
    color: #a16207;
}

.score.low {
    background: #fee2e2;
    color: #b91c1c;
}

.date {
    color: #64748b;
}


/* BUTTON */

.btn-detail {
    display: inline-block;
    background: #eaf2ff;
    color: #1d4ed8;
    text-decoration: none;
    padding: 8px 11px;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 700;
}

.btn-detail:hover {
    background: #dbeafe;
}


/* EMPTY */

.empty {
    text-align: center;
    padding: 55px 20px;
}

.empty div {
    font-size: 42px;
    margin-bottom: 10px;
}

.empty h3 {
    color: #173b6c;
    margin-bottom: 6px;
}

.empty p {
    color: #94a3b8;
    font-size: 13px;
}


/* RESPONSIVE */

@media(max-width: 800px) {

    .stats-grid {
        grid-template-columns: 1fr;
    }

}

</style>

@endsection