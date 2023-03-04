<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('login');
    }
    public function handle(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (!Auth::attempt($data)) {
            return 'Dang nhap that bai';
        }
        return redirect()->route('getAllUser');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
