<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::all();
        $posts = Post::orderBy('id', 'DESC')->take(4)->get(); //los ordena de manera asendente

        return view('index', 
        ['categories' => $categories],
        ['posts' => $posts]
        ); //Pasamos las categorias al index
    }

    public function post($postId)
    {
        //Obtenemos el post y lo enviamos a la vista post
        $post = Post::find($postId);
        
        $latestPosts = Post::orderBy('id', 'DESC')->take(3)->get(); //Consulta los post y los ordena de manera descendente
        
        $comments = Comment::where('post_id', '=', $postId)->get();
        return view('post', 
            ['post' => $post,
            'latestPosts'=> $latestPosts,
            'comments'=>$comments
        ]);
    }

    public function postByCategory($category){

        $categories = Category::all();
        $category = Category::where('name', '=' ,$category)->first();
        $posts = Post::where('category_id', '=', $category->id)->get();

        return view('index', 
        ['categories' => $categories],
        ['posts' => $posts]
        ); //Pasamos las categorias al index
    }

        //Crea un comentario 
    public function store(Request $request){

        $newComment = new Comment(); //Traemos lo que tiene el formulairo

        $newComment->name = $request->name;
        $newComment->email = $request->email;
        $newComment->comment = $request->comment;
        $newComment->post_id = $request->id_post;
        $newComment->save();
        //Campo tabla - request formulario


        return redirect('/');
    }
}
