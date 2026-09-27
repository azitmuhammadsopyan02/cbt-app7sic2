@extends('layouts.admin')

@section('title', 'Kelola Soal')

@section('content')

<div class="page-header">

    <div>

        <a
            href="{{ route('admin.soal.ujian') }}"
            class="back-link"
        >
            ← Kembali ke Data Soal
        </a>

        <h1>
            Kelola Soal
        </h1>

        <p>
            {{ $ujian->nama_ujian }}
        </p>

    </div>


    <a
        href="{{ route('admin.soal.create', $ujian) }}"
        class="btn-add"
    >
        + Tambah Soal
    </a>

</div>


{{-- INFO UJIAN --}}

<div class="exam-info">

    <div class="exam-info-icon">
        📝
    </div>

    <div>

        <strong>
            {{ $ujian->nama_ujian }}
        </strong>

        <span>
            {{ $soals->count() }} soal
            &nbsp;•&nbsp;
            {{ $ujian->durasi }} menit
        </span>

    </div>

</div>


{{-- SUCCESS --}}

@if(session('success'))

    <div class="alert-success">
        ✓ {{ session('success') }}
    </div>

@endif


{{-- SOAL --}}

@if($soals->count() > 0)

    <div class="question-list">

        @foreach($soals as $index => $soal)

            <div class="question-card">

                {{-- HEADER SOAL --}}

                <div class="question-header">

                    <div class="question-number">
                        {{ $index + 1 }}
                    </div>

                    <div class="question-title">

                        <span>
                            Soal {{ $index + 1 }}
                        </span>

                        <small>
                            Jawaban benar:
                            <strong>
                                {{ $soal->jawaban_benar }}
                            </strong>
                        </small>

                    </div>


                    {{-- ACTION --}}

                    <div class="question-actions">

                        <a
                            href="{{ route('admin.soal.edit', $soal) }}"
                            class="btn-edit"
                        >
                            ✏️ Edit
                        </a>


                        <form
                            action="{{ route('admin.soal.destroy', $soal) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus soal ini?')"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn-delete"
                            >
                                🗑 Hapus
                            </button>

                        </form>

                    </div>

                </div>


                {{-- PERTANYAAN --}}

                <div class="question-content">

                    <p class="question-text">
                        {{ $soal->pertanyaan }}
                    </p>


                    {{-- OPTIONS --}}

                    <div class="options">

                        <div
                            class="
                                option
                                {{ $soal->jawaban_benar === 'A'
                                    ? 'correct'
                                    : '' }}
                            "
                        >

                            <span class="option-letter">
                                A
                            </span>

                            <span>
                                {{ $soal->pilihan_a }}
                            </span>

                            @if($soal->jawaban_benar === 'A')

                                <span class="check">
                                    ✓
                                </span>

                            @endif

                        </div>


                        <div
                            class="
                                option
                                {{ $soal->jawaban_benar === 'B'
                                    ? 'correct'
                                    : '' }}
                            "
                        >

                            <span class="option-letter">
                                B
                            </span>

                            <span>
                                {{ $soal->pilihan_b }}
                            </span>

                            @if($soal->jawaban_benar === 'B')

                                <span class="check">
                                    ✓
                                </span>

                            @endif

                        </div>


                        <div
                            class="
                                option
                                {{ $soal->jawaban_benar === 'C'
                                    ? 'correct'
                                    : '' }}
                            "
                        >

                            <span class="option-letter">
                                C
                            </span>

                            <span>
                                {{ $soal->pilihan_c }}
                            </span>

                            @if($soal->jawaban_benar === 'C')

                                <span class="check">
                                    ✓
                                </span>

                            @endif

                        </div>


                        <div
                            class="
                                option
                                {{ $soal->jawaban_benar === 'D'
                                    ? 'correct'
                                    : '' }}
                            "
                        >

                            <span class="option-letter">
                                D
                            </span>

                            <span>
                                {{ $soal->pilihan_d }}
                            </span>

                            @if($soal->jawaban_benar === 'D')

                                <span class="check">
                                    ✓
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

@else

    <div class="empty-card">

        <div class="empty-icon">
            📭
        </div>

        <h2>
            Belum Ada Soal
        </h2>

        <p>
            Ujian ini belum memiliki soal.
        </p>

        <a
            href="{{ route('admin.soal.create', $ujian) }}"
            class="btn-add"
        >
            + Tambah Soal Pertama
        </a>

    </div>

@endif


<style>

/* =========================
   HEADER
========================= */

.page-header {

    display: flex;

    align-items: flex-end;

    justify-content: space-between;

    gap: 20px;

    margin-bottom: 20px;
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


.btn-add {

    display: inline-block;

    background: #173b6c;

    color: white;

    text-decoration: none;

    padding: 11px 17px;

    border-radius: 10px;

    font-size: 13px;

    font-weight: 600;

    white-space: nowrap;

    border: none;

    cursor: pointer;

    transition: .2s;
}


.btn-add:hover {

    background: #0f2d54;

}


/* =========================
   INFO UJIAN
========================= */

.exam-info {

    display: flex;

    align-items: center;

    gap: 14px;

    background: linear-gradient(
        135deg,
        #173b6c,
        #2563eb
    );

    color: white;

    border-radius: 16px;

    padding: 18px 22px;

    margin-bottom: 20px;

    box-shadow:
        0 8px 25px rgba(23,59,108,.15);
}


.exam-info-icon {

    width: 45px;

    height: 45px;

    border-radius: 12px;

    background: rgba(255,255,255,.15);

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 20px;
}


.exam-info strong {

    display: block;

    font-size: 16px;

    margin-bottom: 4px;
}


.exam-info span {

    color: #dbeafe;

    font-size: 12px;
}


/* =========================
   ALERT
========================= */

.alert-success {

    background: #dcfce7;

    color: #166534;

    border-radius: 10px;

    padding: 13px 16px;

    margin-bottom: 20px;

    font-size: 13px;

}


/* =========================
   QUESTION CARD
========================= */

.question-card {

    background: white;

    border: 1px solid #eef2f7;

    border-radius: 17px;

    margin-bottom: 18px;

    overflow: hidden;

    box-shadow:
        0 7px 22px rgba(0,0,0,.04);

    transition: .2s;
}


.question-card:hover {

    box-shadow:
        0 12px 28px rgba(0,0,0,.07);
}


/* =========================
   QUESTION HEADER
========================= */

.question-header {

    display: flex;

    align-items: center;

    gap: 13px;

    padding: 17px 20px;

    background: #f8fafc;

    border-bottom: 1px solid #eef2f7;
}


.question-number {

    width: 38px;

    height: 38px;

    border-radius: 10px;

    background: #173b6c;

    color: white;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 14px;

    font-weight: 800;

    flex-shrink: 0;
}


.question-title {

    flex: 1;
}


.question-title span {

    display: block;

    color: #173b6c;

    font-weight: 700;

    font-size: 13px;

    margin-bottom: 4px;
}


.question-title small {

    color: #64748b;

    font-size: 11px;
}


.question-title small strong {

    color: #15803d;

}


/* =========================
   ACTION
========================= */

.question-actions {

    display: flex;

    align-items: center;

    gap: 7px;
}


.question-actions form {

    margin: 0;
}


.btn-edit,
.btn-delete {

    border: none;

    border-radius: 8px;

    padding: 8px 11px;

    font-size: 11px;

    font-weight: 600;

    cursor: pointer;

    text-decoration: none;

    display: inline-block;

}


.btn-edit {

    background: #dbeafe;

    color: #1d4ed8;
}


.btn-edit:hover {

    background: #bfdbfe;
}


.btn-delete {

    background: #fee2e2;

    color: #b91c1c;
}


.btn-delete:hover {

    background: #fecaca;
}


/* =========================
   CONTENT
========================= */

.question-content {

    padding: 22px;
}


.question-text {

    color: #334155;

    font-size: 14px;

    line-height: 1.7;

    margin-bottom: 20px;

    white-space: pre-line;
}


/* =========================
   OPTIONS
========================= */

.options {

    display: grid;

    grid-template-columns:
        repeat(2, 1fr);

    gap: 10px;
}


.option {

    display: flex;

    align-items: center;

    gap: 10px;

    padding: 12px 14px;

    border: 1px solid #e2e8f0;

    border-radius: 10px;

    color: #475569;

    font-size: 13px;

    background: white;

}


.option.correct {

    background: #f0fdf4;

    border-color: #86efac;

    color: #166534;

    font-weight: 600;
}


.option-letter {

    width: 28px;

    height: 28px;

    border-radius: 8px;

    background: #f1f5f9;

    color: #475569;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 11px;

    font-weight: 800;

    flex-shrink: 0;
}


.correct .option-letter {

    background: #bbf7d0;

    color: #166534;
}


.check {

    margin-left: auto;

    width: 22px;

    height: 22px;

    border-radius: 50%;

    background: #22c55e;

    color: white;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 11px;

    font-weight: 800;
}


/* =========================
   EMPTY
========================= */

.empty-card {

    background: white;

    border: 1px solid #eef2f7;

    border-radius: 18px;

    padding: 55px 20px;

    text-align: center;

    box-shadow:
        0 7px 22px rgba(0,0,0,.04);
}


.empty-icon {

    font-size: 45px;

    margin-bottom: 12px;
}


.empty-card h2 {

    color: #173b6c;

    font-size: 20px;

    margin-bottom: 7px;
}


.empty-card p {

    color: #94a3b8;

    font-size: 13px;

    margin-bottom: 20px;
}


/* =========================
   RESPONSIVE
========================= */

@media(max-width: 800px) {

    .page-header {

        align-items: flex-start;

        flex-direction: column;
    }


    .options {

        grid-template-columns: 1fr;
    }

}


@media(max-width: 600px) {

    .question-header {

        align-items: flex-start;

        flex-wrap: wrap;
    }


    .question-title {

        min-width: calc(100% - 55px);
    }


    .question-actions {

        width: 100%;

        margin-left: 51px;
    }


    .question-actions form {

        flex: 1;
    }


    .btn-edit,
    .btn-delete {

        text-align: center;

        width: 100%;
    }

}

</style>

@endsection