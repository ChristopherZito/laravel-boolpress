<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }
    public function post()
    {
        return view('pages.post');
    }

    public function get_post()
    {
        $posts = Post::all();
        return json_encode($posts);
    }
}
