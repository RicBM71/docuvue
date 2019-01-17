<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Etiqueta;
use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = Post::all();
    	return view('admin.posts.index',compact('posts'));
    }

    public function create()
    {

    	$categorias = Categoria::all();
        $etiquetas = Etiqueta::all();

    	return view('admin.posts.create',compact('categorias','etiquetas'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo'    => 'required',
            'cuerpo'    => 'required',
            'categoria'    => 'required',
            'extracto'    => 'required',
            'etiquetas'    => 'required'
        ]);

        //return Post::create($request->all());

        $post = new Post;

        $post->titulo = $request->get('titulo');
        $post->cuerpo = $request->get('cuerpo');
        $post->extracto = $request->get('extracto');
        $post->categoria_id = $request->get('categoria');
        $post->fecha_publi = $request->has('fecha_publi')  ? Carbon::parse($request->get('fecha_publi')) : null;

        $post->save();

        $post->etiquetas()->attach($request->get('etiquetas'));

        return back()->with('flash','Post guardado');
    }
}
