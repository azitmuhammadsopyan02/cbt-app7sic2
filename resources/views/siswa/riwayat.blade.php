@extends('layouts.siswa')

@section('title', 'Riwayat Ujian')

@section('content')

<div class="page-header">
    <div>
        <h1>Riwayat Ujian</h1>
        <p>Lihat hasil ujian yang sudah pernah kamu kerjakan.</p>
    </div>
</div>

@if($hasilUjians->count() > 0)

<div class="history-card">

    <div class="table-wrapper">

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Ujian</th>
                    <th>Benar</th>
                    <th>Salah</th>
                    <th>Nilai</th>
                    <th>Waktu Selesai</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

                @foreach($hasilUjians as $hasil)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        <div class="exam-name">
                            <div class="exam-icon">
                                📝
                            </div>

                            <div>
                                <strong>
                                    {{ $hasil->ujian->nama_ujian }}
                                </strong>

                                <small>
                                    {{ $hasil->ujian->durasi }} menit
                                </small>
                            </div>
                        </div>
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

                        <span class="score
                            @if($hasil->nilai >= 80)
                                score-good
                            @elseif($hasil->nilai >= 60)
                                score-medium
                            @else
                                score-low
                            @endif
                        ">
                            {{ number_format($hasil->nilai, 0) }}
                        </span>

                    </td>

                    <td>
                        {{ $hasil->waktu_selesai
                            ? $hasil->waktu_selesai->format('d/m/Y H:i')
                            : '-' }}
                    </td>

                    <td>
                        <span class="status">
                            ✓ Selesai
                        </span>
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@else

<div class="empty-state">

    <div class="empty-icon">
        📋
    </div>

    <h2>Belum Ada Riwayat</h2>

    <p>
        Kamu belum menyelesaikan ujian apapun.
    </p>

    <a href="{{ route('siswa.ujian.index') }}" class="btn-primary">
        Lihat Ujian
    </a>

</div>

@endif


<style>

.page-header {
    margin-bottom: 25px;
}

.page-header h1 {
    margin: 0;
    color: #173b6c;
    font-size: 28px;
}

.page-header p {
    margin-top: 7px;
    color: #64748b;
}


/* CARD */

.history-card {
    background: white;
    border-radius: 18px;
    padding: 22px;
    box-shadow: 0 8px 25px rgba(0,0,0,.06);
    border: 1px solid #eef2f7;
}


/* TABLE */

.table-wrapper {
    width: 100%;
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background: #f8fafc;
}

th {
    padding: 15px;
    text-align: left;
    color: #475569;
    font-size: 13px;
    font-weight: 700;
    white-space: nowrap;
}

td {
    padding: 16px 15px;
    border-top: 1px solid #eef2f7;
    color: #475569;
    font-size: 14px;
    white-space: nowrap;
}


/* EXAM */

.exam-name {
    display: flex;
    align-items: center;
    gap: 12px;
}

.exam-icon {
    width: 42px;
    height: 42px;
    border-radius: 11px;
    background: #eaf2ff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 19px;
}

.exam-name strong {
    display: block;
    color: #173b6c;
    font-size: 14px;
}

.exam-name small {
    display: block;
    margin-top: 4px;
    color: #94a3b8;
    font-size: 12px;
}


/* BENAR SALAH */

.correct {
    color: #16a34a;
    font-weight: 700;
}

.wrong {
    color: #dc2626;
    font-weight: 700;
}


/* NILAI */

.score {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    min-width: 48px;
    height: 34px;

    border-radius: 9px;

    font-weight: 800;
}

.score-good {
    background: #dcfce7;
    color: #15803d;
}

.score-medium {
    background: #fef3c7;
    color: #b45309;
}

.score-low {
    background: #fee2e2;
    color: #b91c1c;
}


/* STATUS */

.status {
    background: #dcfce7;
    color: #15803d;

    padding: 7px 11px;
    border-radius: 8px;

    font-size: 12px;
    font-weight: 700;
}


/* EMPTY */

.empty-state {
    background: white;
    border-radius: 18px;
    padding: 70px 20px;
    text-align: center;
    box-shadow: 0 8px 25px rgba(0,0,0,.05);
}

.empty-icon {
    font-size: 55px;
    margin-bottom: 15px;
}

.empty-state h2 {
    color: #173b6c;
    margin-bottom: 8px;
}

.empty-state p {
    color: #64748b;
    margin-bottom: 25px;
}


/* BUTTON */

.btn-primary {
    display: inline-block;

    background: #173b6c;
    color: white;

    text-decoration: none;

    padding: 11px 18px;

    border-radius: 10px;

    font-size: 14px;
    font-weight: 600;
}

.btn-primary:hover {
    background: #0f2d54;
}


/* RESPONSIVE */

@media (max-width: 700px) {

    .history-card {
        padding: 12px;
    }

    th,
    td {
        padding: 12px;
    }

}

</style>

@endsection