<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('username', '!=', 'admin')->orderBy('fullname', 'asc')->get();
        return view('admin.kelolapengguna', compact('users'));
    }

    public function tambahpengguna()
    {
        return view('admin.tambahpengguna');
    }
}
