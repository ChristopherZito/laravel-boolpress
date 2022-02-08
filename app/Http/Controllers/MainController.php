<?php

namespace App\Http\Controllers;

use App\Post;
use App\Categorie;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function home(){
        return view('pages.home');
    }
    public function post(){
        return view('pages.post');
    }

    public function get_post(){
        $posts = Post::orderBy('time_of_pubblication', 'desc') -> get();
        return json_encode($posts);
    }

    public function get_category(){
        $category = Categorie::all();
        return json_encode($category);
    }

}
