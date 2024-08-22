<?php

namespace App\Http\Controllers;

use App\Models\Post; 
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request){

        $search = $request->search;

        $posts = Post::where('title', 'LIKE', "%{$search}%")->with('user')->latest()->paginate();

        return view('home', ['posts' => $posts]); 
    }

    public function blog(){
        // $posts = [
        //     ['id' => 1, 'title' => 'PHP', 'slug' => 'php' ],
        //     ['id' => 2, 'title' => 'laravel', 'slug' => 'laravel' ],
        // ];
        // $post = Post::get();
        // $post = Post::first();
        // $post = Post::find(2);

        $posts = Post::latest()->paginate();
        // dd($post);

        return view('blog', ['posts' => $posts]);
    }

    public function post(Post $post){
        //consulta a base de datos
    
        return view('post', ['post' => $post]);
    }

}
