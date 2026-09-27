@extends('layouts.siswa')

@section('title', 'Profil Siswa')

@section('page-title', 'Profil Siswa')

@section('content')

<div class="profile-page">

    <!-- HEADER -->

    <div class="profile-header">

        <div class="profile-avatar">

            {{ strtoupper(
                substr($user->name, 0, 1)
            ) }}

        </div>

        <div>

            <h1>
                {{ $user->name }}
            </h1>

            <p>
                {{ $user->email }}
            </p>

            <span class="role-badge">
                Siswa
            </span>

        </div>

    </div>


    <!-- INFORMASI PROFIL -->

    <div class="profile-card">

        <div class="card-header">

            <div>
                <h2>
                    Informasi Profil
                </h2>

                <p>
                    Perbarui nama dan email akun kamu.
                </p>
            </div>

        </div>


        <form
            action="{{ route('siswa.profile.update') }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <!-- NAMA -->

            <div class="form-group">

                <label for="name">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    placeholder="Masukkan nama lengkap"
                    required
                >

                @error('name')

                    <small class="error">
                        {{ $message }}
                    </small>

                @enderror

            </div>


            <!-- EMAIL -->

            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    placeholder="Masukkan email"
                    required
                >

                @error('email')

                    <small class="error">
                        {{ $message }}
                    </small>

                @enderror

            </div>


            <!-- ROLE -->

            <div class="form-group">

                <label>
                    Role
                </label>

                <input
                    type="text"
                    value="Siswa"
                    disabled
                >

                <small class="helper">
                    Role akun tidak dapat diubah.
                </small>

            </div>


            <button
                type="submit"
                class="btn-save"
            >
                💾 Simpan Perubahan
            </button>

        </form>

    </div>


    <!-- PASSWORD -->

    <div class="profile-card password-card">

        <div class="card-header">

            <div>

                <h2>
                    Keamanan Akun
                </h2>

                <p>
                    Ubah password akun kamu secara berkala.
                </p>

            </div>

        </div>


        <form
            action="{{ route('siswa.profile.password') }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <!-- PASSWORD LAMA -->

            <div class="form-group">

                <label for="current_password">
                    Password Saat Ini
                </label>

                <input
                    type="password"
                    id="current_password"
                    name="current_password"
                    placeholder="Masukkan password saat ini"
                    required
                >

                @error('current_password')

                    <small class="error">
                        {{ $message }}
                    </small>

                @enderror

            </div>


            <!-- PASSWORD BARU -->

            <div class="form-group">

                <label for="password">
                    Password Baru
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Minimal 8 karakter"
                    required
                >

                @error('password')

                    <small class="error">
                        {{ $message }}
                    </small>

                @enderror

            </div>


            <!-- KONFIRMASI -->

            <div class="form-group">

                <label for="password_confirmation">
                    Konfirmasi Password Baru
                </label>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Ulangi password baru"
                    required
                >

            </div>


            <button
                type="submit"
                class="btn-password"
            >
                🔒 Ubah Password
            </button>

        </form>

    </div>

</div>


<style>

/* =========================
   PAGE
========================= */

.profile-page {
    max-width: 1000px;
    margin: auto;
}


/* =========================
   HEADER
========================= */

.profile-header {

    background:
        linear-gradient(
            135deg,
            #173b6c,
            #2563eb
        );

    color: white;

    border-radius: 20px;

    padding: 30px;

    display: flex;

    align-items: center;

    gap: 20px;

    margin-bottom: 25px;

    box-shadow:
        0 10px 30px rgba(23,59,108,.20);
}


.profile-avatar {

    width: 80px;
    height: 80px;

    border-radius: 22px;

    background: white;

    color: #173b6c;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 32px;

    font-weight: 800;

    flex-shrink: 0;
}


.profile-header h1 {

    font-size: 24px;

    margin-bottom: 5px;
}


.profile-header p {

    color: #dbeafe;

    font-size: 14px;

    margin-bottom: 10px;
}


.role-badge {

    display: inline-block;

    background:
        rgba(255,255,255,.15);

    border:
        1px solid rgba(255,255,255,.25);

    padding:
        5px 12px;

    border-radius: 20px;

    font-size: 12px;
}


/* =========================
   CARD
========================= */

.profile-card {

    background: white;

    border-radius: 18px;

    padding: 28px;

    margin-bottom: 25px;

    border:
        1px solid #eef2f7;

    box-shadow:
        0 8px 25px rgba(0,0,0,.05);
}


.card-header {

    padding-bottom: 20px;

    margin-bottom: 22px;

    border-bottom:
        1px solid #eef2f7;
}


.card-header h2 {

    color: #173b6c;

    font-size: 19px;

    margin-bottom: 5px;
}


.card-header p {

    color: #64748b;

    font-size: 13px;
}


/* =========================
   FORM
========================= */

.form-group {

    margin-bottom: 20px;
}


.form-group label {

    display: block;

    margin-bottom: 8px;

    color: #334155;

    font-size: 14px;

    font-weight: 600;
}


.form-group input {

    width: 100%;

    padding: 13px 14px;

    border:
        1px solid #dbe3ec;

    border-radius: 10px;

    outline: none;

    font-size: 14px;

    color: #1e293b;

    transition: .2s;

    background: white;
}


.form-group input:focus {

    border-color: #2563eb;

    box-shadow:
        0 0 0 3px rgba(37,99,235,.10);
}


.form-group input:disabled {

    background: #f1f5f9;

    color: #64748b;

    cursor: not-allowed;
}


.helper {

    display: block;

    margin-top: 6px;

    color: #94a3b8;

    font-size: 12px;
}


.error {

    display: block;

    margin-top: 6px;

    color: #dc2626;

    font-size: 12px;
}


/* =========================
   BUTTON
========================= */

.btn-save {

    border: none;

    background: #173b6c;

    color: white;

    padding: 12px 20px;

    border-radius: 10px;

    font-size: 14px;

    font-weight: 600;

    cursor: pointer;

    transition: .2s;
}


.btn-save:hover {

    background: #0f2d54;

    transform: translateY(-1px);
}


.btn-password {

    border: none;

    background: #2563eb;

    color: white;

    padding: 12px 20px;

    border-radius: 10px;

    font-size: 14px;

    font-weight: 600;

    cursor: pointer;

    transition: .2s;
}


.btn-password:hover {

    background: #1d4ed8;

    transform: translateY(-1px);
}


/* =========================
   RESPONSIVE
========================= */

@media(max-width: 600px) {

    .profile-header {

        padding: 22px;

        flex-direction: column;

        align-items: flex-start;
    }


    .profile-avatar {

        width: 65px;
        height: 65px;

        border-radius: 18px;

        font-size: 25px;
    }


    .profile-header h1 {

        font-size: 20px;
    }


    .profile-card {

        padding: 20px;
    }

}

</style>

@endsection