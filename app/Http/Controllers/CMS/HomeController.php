<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{

    public function index()
    {
        return view('layouts.master');
    }

    public function Dashboard()
    {
        $post = Post::all();
        $user = User::all();
        return view('Dashboard.index', compact('user','post'));
    }

}
