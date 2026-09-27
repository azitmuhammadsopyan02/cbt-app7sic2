<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Ujian | CBT</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            padding: 40px 20px;
        }

        .container {
            max-width: 700px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 5px 25px rgba(0,0,0,.06);
        }

        h1 {
            margin-bottom: 8px;
        }

        .subtitle {
            color: #64748b;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .checkbox {
            display: flex;
            gap: 8px;
            align-items: center;
            margin-bottom: 20px;
        }

        .checkbox input {
            width: auto;
            margin: 0;
        }

        .buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 12px 18px;
            border: none;
            border-radius: 9px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .primary {
            background: #2563eb;
            color: white;
        }

        .secondary {
            background: #e2e8f0;
            color: #334155;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Tambah Ujian</h1>

        <p class="subtitle">
            Masukkan informasi ujian yang akan diberikan kepada siswa.
        </p>

        @if($errors->any())
            <div class="error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('admin.ujian.store') }}"
            method="POST"
        >

            @csrf

            <label>Nama Ujian</label>

            <input
                type="text"
                name="nama_ujian"
                value="{{ old('nama_ujian') }}"
                placeholder="Contoh: Ujian ASJ"
                required
            >

            <label>Deskripsi</label>

            <textarea
                name="deskripsi"
                placeholder="Deskripsi ujian..."
            >{{ old('deskripsi') }}</textarea>

            <label>Durasi</label>

            <input
                type="number"
                name="durasi"
                value="{{ old('durasi', 60) }}"
                min="1"
                required
            >

            <div class="row">

                <div>
                    <label>Tanggal Mulai</label>

                    <input
                        type="date"
                        name="tanggal_mulai"
                        value="{{ old('tanggal_mulai') }}"
                    >
                </div>

                <div>
                    <label>Tanggal Selesai</label>

                    <input
                        type="date"
                        name="tanggal_selesai"
                        value="{{ old('tanggal_selesai') }}"
                    >
                </div>

            </div>

            <div class="checkbox">

                <input
                    type="checkbox"
                    name="aktif"
                    id="aktif"
                    checked
                >

                <label for="aktif">
                    Ujian Aktif
                </label>

            </div>

            <div class="buttons">

                <button
                    type="submit"
                    class="btn primary"
                >
                    Simpan Ujian
                </button>

                <a
                    href="{{ route('admin.ujian.index') }}"
                    class="btn secondary"
                >
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>