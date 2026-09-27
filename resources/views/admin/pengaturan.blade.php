@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div>
        <h1>Pengaturan</h1>
        <p>Kelola pengaturan sistem CBT Online.</p>
    </div>
</div>

<div class="settings-grid">

    <div class="settings-card">
        <div class="settings-icon">⚙️</div>

        <div>
            <h3>Pengaturan Sistem</h3>
            <p>
                Pengaturan dasar aplikasi CBT Online.
            </p>
        </div>
    </div>

    <div class="settings-card">
        <div class="settings-icon">👤</div>

        <div>
            <h3>Akun Administrator</h3>
            <p>
                Sistem menggunakan akun administrator
                untuk mengelola ujian, soal, dan hasil ujian.
            </p>
        </div>
    </div>

</div>

<style>
    .page-header {
        margin-bottom: 25px;
    }

    .page-header h1 {
        margin: 0;
        color: #173b6c;
        font-size: 28px;
    }

    .page-header p {
        margin-top: 7px;
        color: #64748b;
    }

    .settings-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .settings-card {
        background: white;
        border-radius: 18px;
        padding: 25px;
        display: flex;
        align-items: flex-start;
        gap: 18px;
        box-shadow: 0 8px 25px rgba(15, 23, 42, .07);
    }

    .settings-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: #eef4ff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
    }

    .settings-card h3 {
        margin: 0 0 8px;
        color: #173b6c;
    }

    .settings-card p {
        margin: 0;
        color: #64748b;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .settings-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

@endsection