@extends('layouts.admin')

@section('title', 'Data Soal')

@section('content')

<div class="page-header">

    <div>
        <h1>Data Soal</h1>

        <p>
            Pilih ujian untuk melihat dan mengelola soal.
        </p>
    </div>

</div>


@if(session('success'))

    <div class="alert-success">
        ✓ {{ session('success') }}
    </div>

@endif


<div class="exam-grid">

    @forelse($ujians as $ujian)

        <div class="exam-card">

            <div class="exam-top">

                <div class="exam-icon">
                    📝
                </div>

                @if($ujian->aktif)

                    <span class="badge-active">
                        Aktif
                    </span>

                @else

                    <span class="badge-inactive">
                        Nonaktif
                    </span>

                @endif

            </div>


            <h2>
                {{ $ujian->nama_ujian }}
            </h2>


            <p class="description">

                {{ $ujian->deskripsi
                    ?? 'Tidak ada deskripsi ujian.' }}

            </p>


            <div class="info">

                <span>
                    📚 {{ $ujian->soals_count }} Soal
                </span>

                <span>
                    ⏱ {{ $ujian->durasi }} Menit
                </span>

            </div>


            <a
                href="{{ route('admin.soal.index', $ujian) }}"
                class="btn"
            >
                Kelola Soal →
            </a>

        </div>

    @empty

        <div class="empty">

            <div class="empty-icon">
                📭
            </div>

            <h2>
                Belum Ada Ujian
            </h2>

            <p>
                Buat ujian terlebih dahulu sebelum menambahkan soal.
            </p>

            <a
                href="{{ route('admin.ujian.create') }}"
                class="btn"
            >
                + Buat Ujian
            </a>

        </div>

    @endforelse

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

.alert-success {
    background: #dcfce7;
    color: #166534;
    border-radius: 10px;
    padding: 13px 16px;
    margin-bottom: 20px;
    font-size: 14px;
}

.exam-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.exam-card {
    background: white;
    border-radius: 18px;
    padding: 22px;
    border: 1px solid #eef2f7;
    box-shadow: 0 8px 25px rgba(0,0,0,.05);
    transition: .25s;
}

.exam-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 35px rgba(0,0,0,.08);
}

.exam-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
}

.exam-icon {
    width: 48px;
    height: 48px;
    border-radius: 13px;
    background: #eaf2ff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 21px;
}

.badge-active,
.badge-inactive {
    padding: 6px 10px;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 700;
}

.badge-active {
    background: #dcfce7;
    color: #15803d;
}

.badge-inactive {
    background: #fee2e2;
    color: #b91c1c;
}

.exam-card h2 {
    color: #173b6c;
    font-size: 18px;
    margin-bottom: 8px;
}

.description {
    color: #64748b;
    font-size: 13px;
    line-height: 1.6;
    min-height: 42px;
}

.info {
    display: flex;
    gap: 15px;
    margin: 18px 0;
    color: #64748b;
    font-size: 12px;
}

.btn {
    display: block;
    text-align: center;
    text-decoration: none;
    background: #173b6c;
    color: white;
    padding: 11px;
    border-radius: 10px;
    font-size: 13px;
    font-weight: 600;
    transition: .2s;
}

.btn:hover {
    background: #0f2d54;
}

.empty {
    grid-column: 1 / -1;
    background: white;
    border-radius: 18px;
    padding: 50px;
    text-align: center;
    border: 1px solid #eef2f7;
}

.empty-icon {
    font-size: 45px;
    margin-bottom: 10px;
}

.empty h2 {
    color: #173b6c;
    margin-bottom: 8px;
}

.empty p {
    color: #94a3b8;
    margin-bottom: 20px;
}

@media(max-width: 900px) {

    .exam-grid {
        grid-template-columns: repeat(2, 1fr);
    }

}

@media(max-width: 600px) {

    .exam-grid {
        grid-template-columns: 1fr;
    }

}

</style>

@endsection