<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //LA PAGINA DE INICIO PARA UN CRUD
    public function index()
    {
        $posts = Post::paginate(2);
        return view('Dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //FUNCION PARA LA VISTA DE CREAR UN BLOG
    public function create()
    {
        //aqui le decimos del modelo category queremos todos sus valores
        // $categories = Category::get();

        //aqui especificamos que valores queres del modelo category
        $categories = Category::pluck('id','title');
       //creando una instancia limpia de post
       $post = new Post();

        return view('Dashboard.post.create', compact('categories','post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //FUNCION QUE INSETAR LA INFORMACION DE LA VISTA CREATE EN LA BASE DE DATOS
    public function store(StoreRequest $request)
    {
        Post::create($request->validated());

        //return redirect()->route("post");
        return to_route("post.index")->with('status',"Registro ingresado");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('Dashboard.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    //FUNCION PARA LA VISTA DE EDITAR UN BLOG
    public function edit(Post $post)
    {
        //aqui especificamos que valores queres del modelo category
        $categories = Category::pluck('id','title');
       
        return view('Dashboard.post.edit', compact('categories', 'post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    //FUNCION PARA MODIFICAR LA INFORMACION DE LA VISTA EDIT EN LA BASE DE DATOS
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        
        if(isset($data["image"])){
            $data["image"] = $filename = time().".".$data["image"]->extension();
            $request->image->move(public_path("image"), $filename);
        }

        $post->update($data);
        return to_route("post.index")->with('status',"Registro actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route("post.index")->with('status',"Registro eliminado");
    }
}
