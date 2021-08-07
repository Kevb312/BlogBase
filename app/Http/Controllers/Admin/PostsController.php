<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Comment;
class PostsController extends Controller
{

    public function __construct(){

    	$this->middleware('auth');
    }

    public function index(){
        $posts = Post::all(); //Consulta todo lo que tenga en la tabla category
        $categories = Category::all();
    	return view('admin.posts.index', 
    		['posts' => $posts],
    		['categories' => $categories]
    	);
    }

    //Redirige a la vista donde esta el formulario de crear
    public function newPost(){

        $categories = Category::all();
        return view('admin.posts.newPost',
            ['categories' => $categories]
        );
    }

    //Redirige a la vista donde esta el formulario de editar
    public function editarPost(Request $request, $postId){
        $post = Post::find($postId);
        $categories = Category::all();
        return view('admin.posts.editarPost',
            ['categories' => $categories],
            ['post' => $post]
        );
    }

    //Crea un post desde la vista del formulario crear
    public function store(Request $request){

        $newPost = new Post(); //Traemos lo que tiene el formulairo

        if($request->hasFile('featured')){ //Si viene una imagen
        	//Entonces guardaremos la ruta de la imagen

        	$file = $request->file('featured'); //Obtiene la imagen que se sube al formulario y lo guarda en la variable file

        	$destinationPath = 'images/featureds/'; //Variable que contiene la ruta donde se va aguardar las imagenes

        	$filename = time() . '-' . $file->getClientOriginalName(); //Obtenemos el nombre del archvio concatenandolo con la funcion tiempo para que no se repitan

        	$uploadSuccess = $request->file('featured')->move($destinationPath, $filename); //movemos la imagen a la carpeta destino

        	$newPost->featured = $destinationPath . $filename; //La guardamos en la base de datos concatenando el destino con el nombre
        }

        $newPost->title = $request->title;
        $newPost->category_id = $request->category_id;
        $newPost->descripcion = $request->descripcion;
		$newPost->content = $request->content;
        $newPost->author = $request->author;
        $newPost->save();
        //Campo tabla - request formulario


        return redirect('/admin/posts');
    }

    //Editar post desde la vista del formulario de editar
    public function update(Request $request, $postId){

        //Buscamos el registro que coincida por medio del id

        $post = Post::find($postId);


        if($request->hasFile('featured')){

        	$file = $request->file('featured'); 

        	$destinationPath = 'images/featureds/'; 

        	$filename = time() . '-' . $file->getClientOriginalName(); 

        	$uploadSuccess = $request->file('featured')->move($destinationPath, $filename);

        	$post->featured = $destinationPath . $filename;
        }
	    
        $post->title = $request->title; //Asignamos el campo name del formulario con la columna name de la tabla category
        $post->category_id = $request->category_id;
        $post->descripcion = $request->descripcion;
        $post->content = $request->content;
        $post->author = $request->author;

        $post->save();
        return redirect('/admin/posts');
    }


    //Eliminar post
    public function delete(Request $request, $postId){

        //Buscamos el registro que coincida por medio del id

        $post = Post::find($postId);

        $post->delete();
        return redirect()->back();
    }

    //Comentarios
    //Redirige a la vista donde se gestionan los comentarios
    public function comments(){

        $comments = Comment::all();
        return view('admin.posts.comments',
            ['comments' => $comments]
        );
    }

        //Eliminar comentario
    public function commentDelete(Request $request, $commentId){

        //Buscamos el registro que coincida por medio del id

        $comment = Comment::find($commentId);

        $comment->delete();
        return redirect()->back();
    }

    //Aprobar comentario
    public function commentAprobar(Request $request, $commentId){

        //Buscamos el registro que coincida por medio del id

        $comment = Comment::find($commentId);

        $comment->enabled = 1;
        $comment->save();
        return redirect()->back();
    }

        //Aprobar comentario
    public function commentnoAprobar(Request $request, $commentId){

        //Buscamos el registro que coincida por medio del id

        $comment = Comment::find($commentId);

        $comment->enabled = 0;
        $comment->save();
        return redirect()->back();
    }


}
