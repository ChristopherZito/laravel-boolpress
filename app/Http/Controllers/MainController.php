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

    public function create()
    {
        return view('pages.create');
    }
    public function store(Request $request) {

        $data = $request -> validate([
            'owner' => 'required|string',
            'post_name' => 'string',
            'time_of_pubblication' => 'date',
            'description' => 'string',
            'views' => 'numeric',
            'like' => 'numeric',
            'immagine' => 'string',
        ]);

        $post = Post::create($data);

        // return redirect() -> route('home');
        return redirect() -> route('post');
    }
}
