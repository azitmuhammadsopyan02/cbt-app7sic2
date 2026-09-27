<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | CBT Online</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            min-height: 100vh;
            background:
                linear-gradient(
                    120deg,
                    rgba(8, 35, 72, .95),
                    rgba(20, 83, 145, .72)
                ),
                url("https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=2000&q=85")
                center / cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .login-container {
            width: 100%;
            max-width: 1050px;
            min-height: 620px;
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            background: rgba(255, 255, 255, .12);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, .2);
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 30px 80px rgba(0, 0, 0, .3);
        }

        /* =========================
           LEFT
        ========================= */

        .left-side {
            position: relative;
            padding: 55px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: white;
            background:
                linear-gradient(
                    145deg,
                    rgba(15, 59, 108, .94),
                    rgba(15, 39, 72, .78)
                );
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .brand-icon {
            width: 50px;
            height: 50px;
            border-radius: 15px;
            background: rgba(255, 255, 255, .95);
            color: #173b6c;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 800;
        }

        .brand-text h3 {
            font-size: 21px;
            margin-bottom: 3px;
        }

        .brand-text span {
            font-size: 13px;
            opacity: .8;
        }

        .welcome {
            margin-top: 50px;
        }

        .welcome small {
            font-size: 17px;
            opacity: .85;
        }

        .welcome h1 {
            font-size: 56px;
            line-height: 1.05;
            margin: 10px 0 15px;
            letter-spacing: -2px;
        }

        .welcome h1 span {
            color: #4fd1ff;
        }

        .school {
            font-size: 21px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .description {
            max-width: 500px;
            line-height: 1.7;
            color: rgba(255, 255, 255, .8);
            font-size: 15px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 40px;
        }

        .feature {
            padding: 17px;
            border-radius: 15px;
            background: rgba(255, 255, 255, .09);
            border: 1px solid rgba(255, 255, 255, .1);
        }

        .feature-icon {
            font-size: 23px;
            margin-bottom: 9px;
        }

        .feature strong {
            display: block;
            font-size: 14px;
            margin-bottom: 4px;
        }

        .feature span {
            font-size: 11px;
            color: rgba(255, 255, 255, .65);
            line-height: 1.4;
        }

        .quote {
            margin-top: 35px;
            padding-left: 18px;
            border-left: 3px solid #4fd1ff;
            font-size: 13px;
            font-style: italic;
            color: rgba(255, 255, 255, .75);
        }

        /* =========================
           RIGHT
        ========================= */

        .right-side {
            background: rgba(255, 255, 255, .97);
            padding: 55px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-logo {
            width: 65px;
            height: 65px;
            margin: 0 auto 15px;
            border-radius: 20px;
            background: linear-gradient(
                135deg,
                #173b6c,
                #2875c7
            );
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 29px;
            font-weight: 800;
            box-shadow: 0 10px 25px rgba(23, 59, 108, .25);
        }

        .login-header h2 {
            color: #173b6c;
            font-size: 31px;
            margin-bottom: 7px;
        }

        .login-header p {
            color: #64748b;
            font-size: 14px;
        }

        .error {
            background: #fff1f2;
            color: #be123c;
            border: 1px solid #fecdd3;
            padding: 12px 14px;
            border-radius: 11px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            color: #334155;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 17px;
            color: #64748b;
        }

        .input-wrapper input {
            width: 100%;
            height: 50px;
            padding: 0 45px;
            border: 1px solid #dbe2ea;
            border-radius: 12px;
            outline: none;
            font-size: 14px;
            color: #1e293b;
            transition: .25s;
            background: #fff;
        }

        .input-wrapper input::placeholder {
            color: #94a3b8;
        }

        .input-wrapper input:focus {
            border-color: #2875c7;
            box-shadow: 0 0 0 4px rgba(40, 117, 199, .1);
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: none;
            cursor: pointer;
            color: #64748b;
            font-size: 16px;
            width: auto;
            padding: 0;
        }

        .login-button {
            width: 100%;
            height: 52px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(
                135deg,
                #173b6c,
                #2875c7
            );
            color: white;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: .25s;
            box-shadow: 0 8px 20px rgba(23, 59, 108, .2);
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(23, 59, 108, .3);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 25px 0 18px;
            color: #94a3b8;
            font-size: 12px;
        }

        .divider::before,
        .divider::after {
            content: "";
            height: 1px;
            background: #e2e8f0;
            flex: 1;
        }

        .demo {
            background: #f1f7ff;
            border: 1px solid #dbeafe;
            border-radius: 14px;
            padding: 15px;
        }

        .demo-title {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #173b6c;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .demo-account {
            display: flex;
            justify-content: space-between;
            padding: 7px 0;
            font-size: 12px;
            color: #64748b;
        }

        .demo-account strong {
            color: #334155;
        }

        .footer {
            text-align: center;
            color: #94a3b8;
            font-size: 11px;
            margin-top: 25px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 850px) {

            body {
                padding: 15px;
            }

            .login-container {
                grid-template-columns: 1fr;
                max-width: 500px;
            }

            .left-side {
                display: none;
            }

            .right-side {
                padding: 40px 30px;
            }
        }

        @media (max-width: 450px) {

            .right-side {
                padding: 30px 22px;
            }

            .login-header h2 {
                font-size: 27px;
            }

            .demo-account {
                display: block;
                line-height: 1.7;
            }
        }
    </style>
</head>

<body>

<div class="login-container">

    {{-- =========================
         BAGIAN KIRI
    ========================== --}}

    <div class="left-side">

        <div>

            <div class="brand">

                <div class="brand-icon">
                    C
                </div>

                <div class="brand-text">
                    <h3>CBT Online</h3>
                    <span>Computer Based Test</span>
                </div>

            </div>


            <div class="welcome">

                <small>Selamat datang di</small>

                <h1>
                    CBT <span>Online</span>
                </h1>

                <div class="school">
                    Sistem Ujian Berbasis Komputer
                </div>

                <p class="description">
                    Platform ujian digital yang dirancang untuk
                    membantu proses evaluasi pembelajaran menjadi
                    lebih mudah, cepat, dan terorganisir.
                </p>


                <div class="features">

                    <div class="feature">
                        <div class="feature-icon">🛡️</div>
                        <strong>Aman</strong>
                        <span>
                            Data ujian tersimpan dengan baik.
                        </span>
                    </div>

                    <div class="feature">
                        <div class="feature-icon">⚡</div>
                        <strong>Mudah</strong>
                        <span>
                            Antarmuka sederhana digunakan.
                        </span>
                    </div>

                    <div class="feature">
                        <div class="feature-icon">📊</div>
                        <strong>Efisien</strong>
                        <span>
                            Hasil ujian dihitung otomatis.
                        </span>
                    </div>

                </div>

            </div>

        </div>


        <div class="quote">
            "Belajar hari ini adalah investasi untuk masa depan."
        </div>

    </div>


    {{-- =========================
         BAGIAN KANAN
    ========================== --}}

    <div class="right-side">

        <div class="login-header">

            <div class="login-logo">
                C
            </div>

            <h2>Login</h2>

            <p>
                Masuk untuk mengakses CBT Online
            </p>

        </div>


        @if ($errors->any())

            <div class="error">
                {{ $errors->first() }}
            </div>

        @endif


        <form
            action="{{ route('login.process') }}"
            method="POST"
        >

            @csrf


            {{-- EMAIL --}}

            <div class="form-group">

                <label>Email</label>

                <div class="input-wrapper">

                    <span class="input-icon">
                        ✉
                    </span>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        required
                        autofocus
                    >

                </div>

            </div>


            {{-- PASSWORD --}}

            <div class="form-group">

                <label>Password</label>

                <div class="input-wrapper">

                    <span class="input-icon">
                        🔒
                    </span>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Masukkan password"
                        required
                    >

                    <button
                        type="button"
                        class="toggle-password"
                        onclick="togglePassword()"
                    >
                        👁
                    </button>

                </div>

            </div>


            <button
                type="submit"
                class="login-button"
            >
                Masuk ke Sistem →
            </button>

        </form>


        <div class="divider">
            Akun Demo
        </div>


        <div class="demo">

            <div class="demo-title">
                💡 Gunakan akun berikut untuk mencoba
            </div>

            <div class="demo-account">
                <strong>👨‍💼 Admin</strong>
                <span>admin@cbt.test / password</span>
            </div>

            <div class="demo-account">
                <strong>👨‍🎓 Siswa</strong>
                <span>siswa@cbt.test / password</span>
            </div>

        </div>


        <div class="footer">
            CBT Online • Sistem Ujian Berbasis Komputer
            <br>
            © {{ date('Y') }} Semua hak dilindungi.
        </div>

    </div>

</div>


<script>

function togglePassword()
{
    const password = document.getElementById('password');

    if (password.type === 'password') {
        password.type = 'text';
    } else {
        password.type = 'password';
    }
}

</script>

</body>
</html>