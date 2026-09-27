@extends('layouts.siswa')

@section('title', 'Hasil Ujian')

@section('page-title', 'Hasil Ujian')

@section('content')

<style>

    .result-wrapper {
        max-width: 700px;
        margin: 30px auto;
    }

    .result-card {
        background: white;

        border: 1px solid #e5e7eb;

        border-radius: 22px;

        padding: 40px;

        text-align: center;
    }

    .success-icon {
        width: 75px;
        height: 75px;

        border-radius: 50%;

        background: #dcfce7;

        color: #15803d;

        display: flex;

        align-items: center;

        justify-content: center;

        margin: 0 auto 20px;

        font-size: 34px;

        font-weight: bold;
    }

    .result-card h1 {
        font-size: 26px;
        color: #172033;
    }

    .exam-name {
        color: #64748b;
        margin-top: 8px;
    }

    .score-box {
        background: #f8fafc;

        border-radius: 16px;

        padding: 25px;

        margin: 30px 0;
    }

    .score-label {
        color: #64748b;
        font-size: 13px;
    }

    .score {
        font-size: 58px;

        font-weight: bold;

        color: #173b6c;

        margin-top: 5px;
    }

    .result-grid {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 15px;

        margin-bottom: 25px;
    }

    .result-item {
        padding: 18px;

        border-radius: 13px;
    }

    .correct {
        background: #f0fdf4;
    }

    .wrong {
        background: #fef2f2;
    }

    .result-item span {
        display: block;

        font-size: 12px;

        color: #64748b;

        margin-bottom: 5px;
    }

    .result-item strong {
        font-size: 25px;
    }

    .correct strong {
        color: #15803d;
    }

    .wrong strong {
        color: #dc2626;
    }

    .back-btn {
        display: inline-block;

        background: #173b6c;

        color: white;

        text-decoration: none;

        padding: 13px 24px;

        border-radius: 10px;

        font-size: 14px;

        font-weight: bold;
    }

    @media(max-width:600px) {

        .result-card {
            padding: 25px;
        }

        .result-grid {
            grid-template-columns: 1fr;
        }

    }

</style>


<div class="result-wrapper">

    <div class="result-card">


        <!-- ICON -->

        <div class="success-icon">
            ✓
        </div>


        <h1>
            Ujian Selesai!
        </h1>


        <p class="exam-name">

            {{ $hasil->ujian->nama_ujian }}

        </p>


        <!-- NILAI -->

        <div class="score-box">

            <div class="score-label">
                Nilai Kamu
            </div>

            <div class="score">

                {{ number_format(
                    $hasil->nilai,
                    0
                ) }}

            </div>

        </div>


        <!-- DETAIL -->

        <div class="result-grid">


            <div class="result-item correct">

                <span>
                    Jawaban Benar
                </span>

                <strong>
                    {{ $hasil->jumlah_benar }}
                </strong>

            </div>


            <div class="result-item wrong">

                <span>
                    Jawaban Salah
                </span>

                <strong>
                    {{ $hasil->jumlah_salah }}
                </strong>

            </div>


        </div>


        <!-- INFO -->

        <div style="
            color:#64748b;
            font-size:13px;
            margin-bottom:25px;
        ">

            Ujian diselesaikan pada

            <strong>
                {{ $hasil->waktu_selesai
                    ? $hasil->waktu_selesai
                        ->format('d/m/Y H:i')
                    : '-' }}
            </strong>

        </div>


        <!-- BACK -->

        <a
            href="{{ route(
                'siswa.dashboard'
            ) }}"

            class="back-btn">

            Kembali ke Dashboard

        </a>

    </div>

</div>

@endsection