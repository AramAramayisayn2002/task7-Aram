<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login(Request $request)
    {
        $array = [
            'login' => $request->login,
            'password' => $request->password
        ];
        if (Auth::attempt(($array))) {
            return redirect()->route('books.index');
        }
        return back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }
}
