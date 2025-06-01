<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Berita;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {   
        $beritas = Berita::orderBy('tanggal', 'desc')->get();
        return view('user.home', compact('beritas'));
    }

}
