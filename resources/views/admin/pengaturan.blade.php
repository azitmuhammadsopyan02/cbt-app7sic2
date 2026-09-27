@extends('layouts.admin')

@section('content')

<style>
    .settings-wrapper {
        max-width: 1000px;
    }

    .page-title {
        margin-bottom: 25px;
    }

    .page-title h1 {
        margin: 0;
        font-size: 28px;
        color: #173b6c;
        font-weight: 700;
    }

    .page-title p {
        margin: 6px 0 0;
        color: #64748b;
    }

    .settings-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
    }

    .settings-card {
        background: #fff;
        border-radius: 18px;
        padding: 28px;
        box-shadow: 0 10px 30px rgba(15, 39, 72, .08);
        border: 1px solid #e8edf3;
    }

    .settings-card.full {
        grid-column: 1 / -1;
    }

    .card-header {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 24px;
    }

    .card-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: linear-gradient(135deg, #173b6c, #285a97);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .card-header h3 {
        margin: 0;
        color: #173b6c;
        font-size: 18px;
    }

    .card-header p {
        margin: 4px 0 0;
        color: #64748b;
        font-size: 13px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        font-weight: 600;
        color: #334155;
    }

    .form-control {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #dbe2ea;
        border-radius: 10px;
        font-size: 14px;
        outline: none;
        transition: .2s;
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: #173b6c;
        box-shadow: 0 0 0 3px rgba(23, 59, 108, .08);
    }

    .btn-save {
        border: none;
        background: linear-gradient(135deg, #173b6c, #285a97);
        color: white;
        padding: 12px 20px;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: .2s;
    }

    .btn-save:hover {
        transform: translateY(-1px);
        box-shadow: 0 8px 18px rgba(23, 59, 108, .2);
    }

    .account-info {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        margin-bottom: 25px;
    }

    .info-box {
        background: #f8fafc;
        border-radius: 12px;
        padding: 16px;
    }

    .info-box small {
        color: #64748b;
        display: block;
        margin-bottom: 5px;
    }

    .info-box strong {
        color: #173b6c;
    }

    .error-text {
        color: #dc2626;
        font-size: 12px;
        margin-top: 5px;
    }

    @media (max-width: 800px) {
        .settings-grid {
            grid-template-columns: 1fr;
        }

        .settings-card.full {
            grid-column: auto;
        }

        .account-info {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="settings-wrapper">

    <div class="page-title">
        <h1>Pengaturan</h1>
        <p>Kelola informasi akun administrator dan keamanan akun.</p>
    </div>

    {{-- INFORMASI AKUN --}}
    <div class="settings-card full">

        <div class="card-header">
            <div class="card-icon">👤</div>

            <div>
                <h3>Informasi Akun</h3>
                <p>Informasi administrator yang sedang login.</p>
            </div>
        </div>

        <div class="account-info">

            <div class="info-box">
                <small>Nama</small>
                <strong>{{ $user->name }}</strong>
            </div>

            <div class="info-box">
                <small>Email</small>
                <strong>{{ $user->email }}</strong>
            </div>

            <div class="info-box">
                <small>Role</small>
                <strong>{{ ucfirst($user->role) }}</strong>
            </div>

        </div>

        <form
            action="{{ route('admin.pengaturan.profile') }}"
            method="POST"
        >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Administrator</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $user->name) }}"
                    required
                >

                @error('name')
                    <div class="error-text">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $user->email) }}"
                    required
                >

                @error('email')
                    <div class="error-text">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn-save">
                Simpan Perubahan
            </button>
        </form>

    </div>


    {{-- PASSWORD --}}
    <div class="settings-card full">

        <div class="card-header">
            <div class="card-icon">🔐</div>

            <div>
                <h3>Keamanan Akun</h3>
                <p>Ubah password administrator secara berkala.</p>
            </div>
        </div>

        <form
            action="{{ route('admin.pengaturan.password') }}"
            method="POST"
        >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Password Lama</label>

                <input
                    type="password"
                    name="current_password"
                    class="form-control"
                    placeholder="Masukkan password lama"
                    required
                >

                @error('current_password')
                    <div class="error-text">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Password Baru</label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Minimal 8 karakter"
                    required
                >

                @error('password')
                    <div class="error-text">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Konfirmasi Password Baru</label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    placeholder="Ulangi password baru"
                    required
                >
            </div>

            <button type="submit" class="btn-save">
                🔒 Ubah Password
            </button>

        </form>

    </div>

</div>

@endsection