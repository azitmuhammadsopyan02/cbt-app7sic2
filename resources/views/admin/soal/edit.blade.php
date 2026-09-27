@extends('layouts.admin')

@section('title', 'Edit Soal')

@section('content')

<div class="page-header">

    <div>

        <a
            href="{{ route('admin.soal.index', $soal->ujian_id) }}"
            class="back-link"
        >
            ← Kembali ke Soal
        </a>

        <h1>Edit Soal</h1>

        <p>
            {{ $soal->ujian->nama_ujian }}
        </p>

    </div>

</div>


@if($errors->any())

    <div class="alert-error">

        <strong>
            Periksa kembali data berikut:
        </strong>

        <ul>

            @foreach($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

            @endforeach

        </ul>

    </div>

@endif


<div class="form-card">

    <form
        action="{{ route('admin.soal.update', $soal) }}"
        method="POST"
    >

        @csrf
        @method('PUT')


        {{-- PERTANYAAN --}}

        <div class="form-group">

            <label>
                Pertanyaan
            </label>

            <textarea
                name="pertanyaan"
                rows="5"
                required
                placeholder="Tulis pertanyaan..."
            >{{ old('pertanyaan', $soal->pertanyaan) }}</textarea>

        </div>


        {{-- PILIHAN --}}

        <div class="options-title">

            <h3>
                Pilihan Jawaban
            </h3>

            <span>
                Tentukan jawaban yang benar di bagian bawah.
            </span>

        </div>


        <div class="options-grid">

            {{-- A --}}

            <div class="form-group">

                <label>
                    Pilihan A
                </label>

                <input
                    type="text"
                    name="pilihan_a"
                    value="{{ old('pilihan_a', $soal->pilihan_a) }}"
                    required
                    placeholder="Jawaban A"
                >

            </div>


            {{-- B --}}

            <div class="form-group">

                <label>
                    Pilihan B
                </label>

                <input
                    type="text"
                    name="pilihan_b"
                    value="{{ old('pilihan_b', $soal->pilihan_b) }}"
                    required
                    placeholder="Jawaban B"
                >

            </div>


            {{-- C --}}

            <div class="form-group">

                <label>
                    Pilihan C
                </label>

                <input
                    type="text"
                    name="pilihan_c"
                    value="{{ old('pilihan_c', $soal->pilihan_c) }}"
                    required
                    placeholder="Jawaban C"
                >

            </div>


            {{-- D --}}

            <div class="form-group">

                <label>
                    Pilihan D
                </label>

                <input
                    type="text"
                    name="pilihan_d"
                    value="{{ old('pilihan_d', $soal->pilihan_d) }}"
                    required
                    placeholder="Jawaban D"
                >

            </div>

        </div>


        {{-- JAWABAN BENAR --}}

        <div class="form-group correct-answer">

            <label>
                Jawaban Benar
            </label>

            <select
                name="jawaban_benar"
                required
            >

                <option value="">
                    -- Pilih Jawaban Benar --
                </option>

                <option
                    value="A"
                    {{ old('jawaban_benar', $soal->jawaban_benar) === 'A' ? 'selected' : '' }}
                >
                    A
                </option>

                <option
                    value="B"
                    {{ old('jawaban_benar', $soal->jawaban_benar) === 'B' ? 'selected' : '' }}
                >
                    B
                </option>

                <option
                    value="C"
                    {{ old('jawaban_benar', $soal->jawaban_benar) === 'C' ? 'selected' : '' }}
                >
                    C
                </option>

                <option
                    value="D"
                    {{ old('jawaban_benar', $soal->jawaban_benar) === 'D' ? 'selected' : '' }}
                >
                    D
                </option>

            </select>

        </div>


        {{-- BUTTON --}}

        <div class="form-actions">

            <a
                href="{{ route('admin.soal.index', $soal->ujian_id) }}"
                class="btn-cancel"
            >
                Batal
            </a>

            <button
                type="submit"
                class="btn-save"
            >
                💾 Simpan Perubahan
            </button>

        </div>

    </form>

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
    margin-bottom: 12px;
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

.alert-error {
    background: #fee2e2;
    color: #991b1b;
    border-radius: 10px;
    padding: 15px 18px;
    margin-bottom: 20px;
    font-size: 13px;
}

.alert-error ul {
    margin: 8px 0 0 18px;
}

.form-card {
    background: white;
    border-radius: 18px;
    padding: 30px;
    border: 1px solid #eef2f7;
    box-shadow: 0 8px 25px rgba(0,0,0,.05);
    max-width: 1000px;
}

.form-group {
    margin-bottom: 22px;
}

.form-group label {
    display: block;
    color: #173b6c;
    font-size: 13px;
    font-weight: 700;
    margin-bottom: 8px;
}

textarea,
input,
select {
    width: 100%;
    border: 1px solid #dbe3ee;
    border-radius: 10px;
    padding: 12px 14px;
    font-family: inherit;
    font-size: 13px;
    color: #334155;
    outline: none;
    transition: .2s;
    background: white;
}

textarea {
    resize: vertical;
}

textarea:focus,
input:focus,
select:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37,99,235,.10);
}

.options-title {
    margin: 5px 0 18px;
}

.options-title h3 {
    color: #173b6c;
    font-size: 16px;
    margin-bottom: 4px;
}

.options-title span {
    color: #94a3b8;
    font-size: 12px;
}

.options-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0 20px;
}

.correct-answer {
    max-width: 300px;
    margin-top: 5px;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    border-top: 1px solid #eef2f7;
    padding-top: 22px;
    margin-top: 10px;
}

.btn-cancel,
.btn-save {
    border: none;
    border-radius: 10px;
    padding: 11px 18px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
}

.btn-cancel {
    background: #f1f5f9;
    color: #475569;
}

.btn-save {
    background: #173b6c;
    color: white;
}

.btn-save:hover {
    background: #0f2d54;
}

@media(max-width: 700px) {

    .form-card {
        padding: 20px;
    }

    .options-grid {
        grid-template-columns: 1fr;
    }

    .form-actions {
        flex-direction: column;
    }

    .btn-cancel,
    .btn-save {
        width: 100%;
        text-align: center;
    }

}

</style>

@endsection