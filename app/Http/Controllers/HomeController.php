<?php

namespace App\Http\Controllers;
use App\Categorie;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function create()
        {
            $category = Categorie::all();
            return view('pages.create', compact('category'));
        }
        public function store(Request $request) {
    
            $data = $request -> validate([
                'post_name' => 'nullable|string',
                'time_of_pubblication' => 'date',
                'description' => 'nullable|string',
            ]);
            $data['owner'] = Auth::user() -> name;

            $post = Post::make($data);
            $category = Categorie::findOrFail($request -> get('category'));
            $post -> categorie() -> associate($category);
            $post -> save();

            return redirect() -> route('post');
        }
}
