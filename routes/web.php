<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\HasilUjianController;
use App\Http\Controllers\UjianSiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminSettingsController;


/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return redirect()
        ->route('login');

});


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [
    AuthController::class,
    'showLogin'
])->name('login');


Route::post('/login', [
    AuthController::class,
    'login'
])->name('login.process');


Route::post('/logout', [
    AuthController::class,
    'logout'
])->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'role:admin'
])
->prefix('admin')
->name('admin.')
->group(function () {


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [
        AdminController::class,
        'dashboard'
    ])->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | UJIAN
    |--------------------------------------------------------------------------
    */

    Route::get('/ujian', [
        UjianController::class,
        'index'
    ])->name('ujian.index');


    Route::get('/ujian/create', [
        UjianController::class,
        'create'
    ])->name('ujian.create');


    Route::post('/ujian', [
        UjianController::class,
        'store'
    ])->name('ujian.store');


    Route::delete('/ujian/{ujian}', [
        UjianController::class,
        'destroy'
    ])->name('ujian.destroy');


    /*
    |--------------------------------------------------------------------------
    | SOAL
    |--------------------------------------------------------------------------
    */

    Route::get('/soal', [
    SoalController::class,
    'ujian'
])->name('soal.ujian');

Route::get('/ujian/{ujian}/soal', [
    SoalController::class,
    'index'
])->name('soal.index');

Route::get('/ujian/{ujian}/soal/create', [
    SoalController::class,
    'create'
])->name('soal.create');

Route::post('/ujian/{ujian}/soal', [
    SoalController::class,
    'store'
])->name('soal.store');

Route::get('/soal/{soal}/edit', [
    SoalController::class,
    'edit'
])->name('soal.edit');

Route::put('/soal/{soal}', [
    SoalController::class,
    'update'
])->name('soal.update');

Route::delete('/soal/{soal}', [
    SoalController::class,
    'destroy'
])->name('soal.destroy');


    /*
    |--------------------------------------------------------------------------
    | HASIL UJIAN
    |--------------------------------------------------------------------------
    */

    Route::get('/hasil-ujian', [
        HasilUjianController::class,
        'index'
    ])->name('hasil.index');

    
Route::get('/hasil-ujian/{hasil}', [
    HasilUjianController::class,
    'show'
])->name('hasil.show');

Route::get('/pengaturan', [
    AdminSettingsController::class,
    'index'
])->name('pengaturan');

Route::put('/pengaturan/profile', [
    AdminSettingsController::class,
    'updateProfile'
])->name('pengaturan.profile');

Route::put('/pengaturan/password', [
    AdminSettingsController::class,
    'updatePassword'
])->name('pengaturan.password');

});



/*
|--------------------------------------------------------------------------
| SISWA
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'role:siswa'
])
->prefix('siswa')
->name('siswa.')
->group(function () {


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [
        SiswaController::class,
        'dashboard'
    ])->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | MULAI UJIAN
    |--------------------------------------------------------------------------
    */

    Route::get('/ujian/{ujian}', [
        UjianSiswaController::class,
        'show'
    ])->name('ujian.show');


    /*
    |--------------------------------------------------------------------------
    | SUBMIT UJIAN
    |--------------------------------------------------------------------------
    */

    Route::post('/ujian/{ujian}/submit', [
        UjianSiswaController::class,
        'submit'
    ])->name('ujian.submit');


    /*
    |--------------------------------------------------------------------------
    | HASIL UJIAN
    |--------------------------------------------------------------------------
    */

    Route::get('/hasil/{hasil}', [
        UjianSiswaController::class,
        'hasil'
    ])->name('hasil');

    Route::get('/ujian', [
    SiswaController::class,
    'ujian'
])->name('ujian.index');

Route::get('/riwayat', [
    SiswaController::class,
    'riwayat'
])->name('riwayat');

Route::get('/profil', [
    ProfileController::class,
    'index'
])->name('profile');

Route::put('/profil', [
    ProfileController::class,
    'update'
])->name('profile.update');

Route::put('/profil/password', [
    ProfileController::class,
    'updatePassword'
])->name('profile.password');

});