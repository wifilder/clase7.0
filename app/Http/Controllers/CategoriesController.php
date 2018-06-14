<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //la vista que va ser jalada desde la carpeta categories de create.blade.php
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        /* Esto lo borramos lo hemos pasado a rules (reglas) de StoreCategory creadas con php artisan make:request

        $this->validate($request, [
            //Para indicarle que el campo no pase o que no genere duplicados
            'name' => 'required|min:3|unique:categories',
            //Aca la validamos que solo sea una imagen mas no un video
            //'image' => 'required|image|mimes:jpeg,png,gif'
            'image' => 'required|image|mimes:jpeg,png,gif|max:900'

        ]);
        */

        //Aqui obtengo la imagen 
        $image = $request->file('image');
        //Almaceno la imagen en el disco duro en la carpeta images dentro de mi carpeta public
        $file = $image->store('images');

        //Cuando se cree la categoria y se guarde se va a redireccionar en esa vista show
        $category = new Category;
        //Esta categoria vamos asignarle de su campo name el valor que viene de la peticion request y usamos su funcion get para indicarle el campo que llega name
        $category->name = $request->get('name');
        //Le asigno la ruta del archivo al campo imagen
        $category->image = $file;
        $category->save();

        //Ver que estamos recibiendo solicitando
        //return $request->all();

        //return 'Funcion store';
        //Aca lo redireccionamos pero necesitamos pasarle un parametro a cual categoria
        //Entonces le decimos que para ese category el valor va a hacer el id de la categoria que se acaba de crear $category = new Category;

        //Y lo redirijo a la lista show de categorias
        return redirect()->route('categories.show', ['category'=> $category->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   //El metodo compact necesita que exista esa variable para obtener y luego pasar
        $category = Category::find($id);
        //para poder mostrar la informacion se la pasamos con compact('category')
        return view('categories.show', compact('category'));
        //return view('categories.show')->with('category', $category);
        //return view('categories.show',['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
