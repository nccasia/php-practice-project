<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Backend\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterCotroller extends Controller
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function index()
    {
//        dd('hello');
        return view('backend.admin_register');
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $data['isAdmin'] = 1;
        $user = $this->user->store($data);
        if (empty($user)) {
            return response()->json([
                'status' => false,
                'message' => 'Đăng kí thất bại'
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => 'Đăng kí thành công'
        ]);
    }
}
