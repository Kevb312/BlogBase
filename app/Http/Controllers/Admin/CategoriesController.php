<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    //
    public function __construct(){

    	$this->middleware('auth');
    }

    public function index(){
        $categories = Category::all(); //Consulta todo lo que tenga en la tabla category
    	return view('admin.categories.index', ['categories' => $categories]);
    }

    //Crear categoria
    public function store(Request $request){

        //dd($request->all()); //Obtenemos los datos del formulario
        //dd($request->category); //Obtenemos los datos del formulario
    
        //Guardar en la base de datos

        if($request->hasFile('featured')){

            $file = $request->file('featured'); 

            $destinationPath = 'images/featureds/'; 

            $filename = time() . '-' . $file->getClientOriginalName(); 

            $uploadSuccess = $request->file('featured')->move($destinationPath, $filename);

            $newCategory->featured = $destinationPath . $filename;
        }

        $newCategory = new Category(); //Traemos lo que tiene el formulairo

        $newCategory->name = $request->name; //Asignamos el campo name del formulario con la columna name de la tabla category
        $newCategory->save();
        //Campo tabla - request formulario


        return redirect()->back();
    }

    //Editar categoria
    public function update(Request $request, $categoryId){

        //Buscamos el registro que coincida por medio del id

        $Category = Category::find($categoryId);

        if($request->hasFile('featured')){

            $file = $request->file('featured'); 

            $destinationPath = 'images/featureds/'; 

            $filename = time() . '-' . $file->getClientOriginalName(); 

            $uploadSuccess = $request->file('featured')->move($destinationPath, $filename);

            $Category->featured = $destinationPath . $filename;
        }

        $Category->name = $request->name; //Asignamos el campo name del formulario con la columna name de la tabla category

        $Category->save();
        return redirect()->back();
    }


    //Eliminar categoria
    public function delete(Request $request, $categoryId){

        //Buscamos el registro que coincida por medio del id

        $Category = Category::find($categoryId);

        $Category->delete();
        return redirect()->back();
    }
}
