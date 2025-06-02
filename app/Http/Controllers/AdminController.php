<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('email', '!=', 'admin@ith.ac.id')->orderBy('fullname', 'asc')->get();
        return view('admin.kelolapengguna', compact('users'));
    }

}
