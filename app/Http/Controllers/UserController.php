<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('user.editprofil');
    }

    public function update(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:8|confirmed',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ], [
            'email.required'=>'Email tidak boleh kosong',
            'password.confirmed' => 'Password tidak cocok.',
            'password.min' => 'Password minimal harus 8 karakter.',
        ]);

        $user = Auth::user();

        $user->fullname = $request->fullname;
        $user->email = $request->email;

        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('profile')) {
            // Hapus gambar lama jika ada
            if ($user->profile && Storage::disk('public')->exists($user->profile)) {
                Storage::disk('public')->delete($user->profile);
            }

            $imagePath = $request->file('profile')->store('profiluser', 'public');
            $user->profile = $imagePath;
        }

        $user->save();

        return redirect()->route('editprofil.update')->with('success', 'Profil berhasil diperbarui');
    }
}
