<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminSettingsController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('admin.pengaturan', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        return back()->with(
            'success',
            'Informasi akun berhasil diperbarui.'
        );
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],
            'password' => [
                'required',
                'confirmed',
                'min:8',
            ],
        ], [
            'current_password.required'
                => 'Password lama wajib diisi.',

            'current_password.current_password'
                => 'Password lama tidak sesuai.',

            'password.confirmed'
                => 'Konfirmasi password tidak cocok.',

            'password.min'
                => 'Password baru minimal 8 karakter.',
        ]);

        $user = auth()->user();

        $user->update([
            'password' => Hash::make(
                $request->password
            ),
        ]);

        return back()->with(
            'success',
            'Password berhasil diperbarui.'
        );
    }
}