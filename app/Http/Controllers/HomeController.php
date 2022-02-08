<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Post;
use App\Reaction;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    
    public function create(){
        $category = Categorie::all();
        $reactions = Reaction::all();
        return view('pages.create', compact('category', 'reactions'));
    }

    public function store(Request $request) {

        $data = $request -> validate([
            'post_name' => 'nullable|string',
            'time_of_pubblication' => 'date',
            'description' => 'nullable|string',
        ]);
        $data['owner'] = Auth::user() -> name;

        //categoria
        $post = Post::make($data);
        $category = Categorie::findOrFail($request -> get('category'));
        $post -> categorie() -> associate($category);
        $post -> save();

        //reaction
        $reactions = Reaction::findOrFail($request -> get('reactions'));
        $post -> reactions() -> attach($reactions);
        $post -> save();

        return redirect() -> route('post');
    }
}
