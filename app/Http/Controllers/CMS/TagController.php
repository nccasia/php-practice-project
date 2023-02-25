<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\TagRepository;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tag;
    public function __construct(TagRepository $tag)
    {
        $this->tag = $tag;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $tag = $this->tag->store($data);
        return redirect()->route('Dashboard');
    }

    public function update(Request $request,$id)
    {
        $data = $request->all();
    }
}
