@extends('layouts.admin')

@section('title', 'Tambah Soal')

@section('page-title', 'Tambah Soal')

@section('content')

    <div style="
        max-width:850px;
        margin:auto;
    ">

        <div style="margin-bottom:25px;">

            <h2>
                Tambah Soal
            </h2>

            <p style="
                color:#64748b;
                margin-top:5px;
            ">
                {{ $ujian->nama_ujian }}
            </p>

        </div>


        @if($errors->any())

            <div style="
                background:#fee2e2;
                color:#991b1b;
                padding:15px;
                border-radius:10px;
                margin-bottom:20px;
            ">

                <strong>
                    Periksa kembali data:
                </strong>

                <ul style="
                    margin-top:8px;
                    padding-left:20px;
                ">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        <form action="{{ route('admin.soal.store', $ujian) }}"
              method="POST"
              style="
                    background:white;
                    padding:30px;
                    border-radius:16px;
                    border:1px solid #e5e7eb;
              ">

            @csrf


            <!-- PERTANYAAN -->

            <div style="margin-bottom:22px;">

                <label style="
                    display:block;
                    font-weight:bold;
                    margin-bottom:8px;
                ">
                    Pertanyaan
                </label>

                <textarea name="pertanyaan"
                          rows="5"
                          required
                          style="
                                width:100%;
                                padding:13px;
                                border:1px solid #d1d5db;
                                border-radius:9px;
                                resize:vertical;
                          "
                          placeholder="Masukkan pertanyaan...">{{ old('pertanyaan') }}</textarea>

            </div>


            <!-- PILIHAN A -->

            <div style="margin-bottom:18px;">

                <label style="
                    display:block;
                    font-weight:bold;
                    margin-bottom:8px;
                ">
                    Pilihan A
                </label>

                <input type="text"
                       name="pilihan_a"
                       value="{{ old('pilihan_a') }}"
                       required
                       style="
                            width:100%;
                            padding:13px;
                            border:1px solid #d1d5db;
                            border-radius:9px;
                       "
                       placeholder="Jawaban A">

            </div>


            <!-- PILIHAN B -->

            <div style="margin-bottom:18px;">

                <label style="
                    display:block;
                    font-weight:bold;
                    margin-bottom:8px;
                ">
                    Pilihan B
                </label>

                <input type="text"
                       name="pilihan_b"
                       value="{{ old('pilihan_b') }}"
                       required
                       style="
                            width:100%;
                            padding:13px;
                            border:1px solid #d1d5db;
                            border-radius:9px;
                       "
                       placeholder="Jawaban B">

            </div>


            <!-- PILIHAN C -->

            <div style="margin-bottom:18px;">

                <label style="
                    display:block;
                    font-weight:bold;
                    margin-bottom:8px;
                ">
                    Pilihan C
                </label>

                <input type="text"
                       name="pilihan_c"
                       value="{{ old('pilihan_c') }}"
                       required
                       style="
                            width:100%;
                            padding:13px;
                            border:1px solid #d1d5db;
                            border-radius:9px;
                       "
                       placeholder="Jawaban C">

            </div>


            <!-- PILIHAN D -->

            <div style="margin-bottom:22px;">

                <label style="
                    display:block;
                    font-weight:bold;
                    margin-bottom:8px;
                ">
                    Pilihan D
                </label>

                <input type="text"
                       name="pilihan_d"
                       value="{{ old('pilihan_d') }}"
                       required
                       style="
                            width:100%;
                            padding:13px;
                            border:1px solid #d1d5db;
                            border-radius:9px;
                       "
                       placeholder="Jawaban D">

            </div>


            <!-- JAWABAN BENAR -->

            <div style="margin-bottom:25px;">

                <label style="
                    display:block;
                    font-weight:bold;
                    margin-bottom:8px;
                ">
                    Jawaban Benar
                </label>

                <select name="jawaban_benar"
                        required
                        style="
                            width:100%;
                            padding:13px;
                            border:1px solid #d1d5db;
                            border-radius:9px;
                            background:white;
                        ">

                    <option value="">
                        -- Pilih Jawaban Benar --
                    </option>

                    <option value="A"
                        {{ old('jawaban_benar') == 'A' ? 'selected' : '' }}>
                        A
                    </option>

                    <option value="B"
                        {{ old('jawaban_benar') == 'B' ? 'selected' : '' }}>
                        B
                    </option>

                    <option value="C"
                        {{ old('jawaban_benar') == 'C' ? 'selected' : '' }}>
                        C
                    </option>

                    <option value="D"
                        {{ old('jawaban_benar') == 'D' ? 'selected' : '' }}>
                        D
                    </option>

                </select>

            </div>


            <!-- BUTTON -->

            <div style="
                display:flex;
                justify-content:flex-end;
                gap:10px;
            ">

                <a href="{{ route('admin.soal.index', $ujian) }}"
                   style="
                        text-decoration:none;
                        padding:12px 18px;
                        border-radius:9px;
                        background:#f1f5f9;
                        color:#334155;
                   ">
                    Batal
                </a>

                <button type="submit"
                        style="
                            border:none;
                            background:#173b6c;
                            color:white;
                            padding:12px 20px;
                            border-radius:9px;
                            cursor:pointer;
                        ">
                    Simpan Soal
                </button>

            </div>

        </form>

    </div>

@endsection