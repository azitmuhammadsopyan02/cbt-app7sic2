@extends('layouts.siswa')

@section('title', 'Ujian')

@section('content')

<div class="page-header">
    <div>
        <h1>Ujian</h1>
        <p>Pilih ujian yang tersedia untuk kamu kerjakan.</p>
    </div>
</div>

@if(session('error'))
    <div class="alert-error">
        {{ session('error') }}
    </div>
@endif

@if($ujians->count() > 0)

<div class="exam-grid">

    @foreach($ujians as $ujian)

        <div class="exam-card">

            <div class="exam-icon">
                📝
            </div>

            <div class="exam-content">

                <h3>{{ $ujian->nama_ujian }}</h3>

                <p>
                    {{ $ujian->deskripsi ?? 'Tidak ada deskripsi ujian.' }}
                </p>

                <div class="exam-info">
                    <span>⏱ {{ $ujian->durasi }} Menit</span>
                    <span>📚 {{ $ujian->soals->count() }} Soal</span>
                </div>

                <a href="{{ route('siswa.ujian.show', $ujian) }}"
                   class="btn-start">
                    Mulai Ujian →
                </a>

            </div>

        </div>

    @endforeach

</div>

@else

<div class="empty-state">
    <div class="empty-icon">📭</div>

    <h3>Belum Ada Ujian</h3>

    <p>
        Saat ini belum ada ujian yang tersedia.
    </p>
</div>

@endif


<style>

.page-header {
    margin-bottom: 25px;
}

.page-header h1 {
    margin: 0;
    font-size: 28px;
    color: #173b6c;
}

.page-header p {
    margin-top: 6px;
    color: #64748b;
}

.exam-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 20px;
}

.exam-card {
    background: white;
    border-radius: 18px;
    padding: 24px;
    display: flex;
    gap: 18px;
    box-shadow: 0 8px 25px rgba(0,0,0,.06);
    border: 1px solid #eef2f7;
    transition: .25s;
}

.exam-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 30px rgba(0,0,0,.09);
}

.exam-icon {
    width: 55px;
    height: 55px;
    border-radius: 15px;
    background: #eaf2ff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 25px;
    flex-shrink: 0;
}

.exam-content {
    flex: 1;
}

.exam-content h3 {
    margin: 0 0 8px;
    color: #173b6c;
    font-size: 19px;
}

.exam-content p {
    color: #64748b;
    font-size: 14px;
    line-height: 1.6;
}

.exam-info {
    display: flex;
    gap: 15px;
    margin: 15px 0;
    font-size: 13px;
    color: #475569;
}

.btn-start {
    display: inline-block;
    background: #173b6c;
    color: white;
    text-decoration: none;
    padding: 10px 17px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 600;
    transition: .2s;
}

.btn-start:hover {
    background: #0f2d54;
}

.empty-state {
    background: white;
    border-radius: 18px;
    padding: 60px 20px;
    text-align: center;
    box-shadow: 0 8px 25px rgba(0,0,0,.05);
}

.empty-icon {
    font-size: 50px;
    margin-bottom: 15px;
}

.empty-state h3 {
    color: #173b6c;
}

.empty-state p {
    color: #64748b;
}

.alert-error {
    background: #fee2e2;
    color: #991b1b;
    padding: 14px 18px;
    border-radius: 12px;
    margin-bottom: 20px;
}

</style>

@endsection