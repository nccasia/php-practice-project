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
        $post = $this->post->index();
        $user = $this->user->index();
        return view('Dashboard.index')->with('post', $post)->with('user', $user);
    }

}
