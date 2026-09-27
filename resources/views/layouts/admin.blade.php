<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Admin') - CBT Sederhana</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f4f7fb;
            color: #1f2937;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: linear-gradient(180deg, #173b6c, #0f2748);
            color: white;
            padding: 25px 18px;
            z-index: 1000;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px 30px;
            border-bottom: 1px solid rgba(255,255,255,.15);
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: linear-gradient(135deg, #ffffff, #dbeafe);
            color: #173b6c;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
        }

        .brand h2 {
            font-size: 18px;
        }

        .brand small {
            color: #cbd5e1;
            font-size: 11px;
        }

        .menu-title {
            margin: 28px 10px 10px;
            color: #94a3b8;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .menu a {
            text-decoration: none;
            color: #dbeafe;
            padding: 13px 14px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: .2s;
        }

        .menu a:hover {
            background: rgba(255,255,255,.12);
            color: white;
        }

        .menu a.active {
            background: white;
            color: #173b6c;
            font-weight: bold;
            box-shadow: 0 6px 18px rgba(0,0,0,.12);
        }

        .logout {
            position: absolute;
            bottom: 25px;
            left: 18px;
            right: 18px;
        }

        .logout button {
            width: 100%;
            border: none;
            background: rgba(255,255,255,.10);
            color: white;
            padding: 13px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
        }

        .logout button:hover {
            background: rgba(255,255,255,.18);
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            height: 75px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .topbar-left h3 {
            font-size: 18px;
            color: #172033;
        }

        .topbar-left p {
            font-size: 12px;
            color: #94a3b8;
            margin-top: 4px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #173b6c, #3b82f6);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .profile-info strong {
            font-size: 13px;
            display: block;
        }

        .profile-info span {
            font-size: 11px;
            color: #94a3b8;
        }

        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 30px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media(max-width: 800px) {

            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
            }

            .content {
                padding: 20px;
            }
        }

        @media(max-width: 600px) {

            .sidebar {
                width: 70px;
                padding: 20px 10px;
            }

            .brand {
                justify-content: center;
                padding: 0 0 25px;
            }

            .brand-text,
            .menu-title,
            .menu a span,
            .logout button span {
                display: none;
            }

            .menu a {
                justify-content: center;
            }

            .logout {
                left: 10px;
                right: 10px;
            }

            .main {
                margin-left: 70px;
            }

            .topbar {
                padding: 0 15px;
            }

            .profile-info {
                display: none;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">

            <div class="brand-icon">
                C
            </div>

            <div class="brand-text">
                <h2>CBT Online</h2>
                <small>Panel Administrator</small>
            </div>

        </div>

        <div class="menu-title">
            Menu Utama
        </div>

        <nav class="menu">

            <a href="{{ route('admin.dashboard') }}"
               class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                📊
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.ujian.index') }}"
               class="{{ request()->routeIs('admin.ujian.*') ? 'active' : '' }}">
                📝
                <span>Data Ujian</span>
            </a>

<a href="{{ route('admin.soal.ujian') }}"
   class="{{ request()->routeIs('admin.soal.*') ? 'active' : '' }}">
    📚
    <span>Data Soal</span>
</a>

<a href="{{ route('admin.hasil.index') }}"
   class="{{ request()->routeIs('admin.hasil.*') ? 'active' : '' }}">
    📈
    <span>Hasil Ujian</span>
</a>

        </nav>

        <div class="menu-title">
            Sistem
        </div>

        <nav class="menu">

<a href="{{ route('admin.pengaturan') }}"
   class="{{ request()->routeIs('admin.pengaturan*') ? 'active' : '' }}">
    ⚙️
    <span>Pengaturan</span>
</a>

        </nav>

        <div class="logout">

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit">
                    🚪
                    <span>Keluar</span>
                </button>
            </form>

        </div>

    </aside>


    <!-- MAIN -->
    <main class="main">

        <!-- TOPBAR -->
        <header class="topbar">

            <div class="topbar-left">

                <h3>
                    @yield('page-title', 'Dashboard')
                </h3>

                <p>
                    Sistem Computer Based Test
                </p>

            </div>

            <div class="profile">

                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div class="profile-info">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <span>
                        Administrator
                    </span>

                </div>

            </div>

        </header>


        <!-- CONTENT -->
        <section class="content">

            @if(session('success'))

                <div style="
                    background:#dcfce7;
                    color:#166534;
                    padding:13px 16px;
                    border-radius:10px;
                    margin-bottom:20px;
                    border:1px solid #bbf7d0;
                ">
                    {{ session('success') }}
                </div>

            @endif

            @yield('content')

        </section>

    </main>

    @stack('scripts')

</body>
</html>