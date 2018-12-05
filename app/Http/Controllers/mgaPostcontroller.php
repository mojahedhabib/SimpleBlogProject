<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Purifier;
use Image;

class mgaPostcontroller extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(8);
        return view('pages.sample')->with('posts', $posts);
    }
}
