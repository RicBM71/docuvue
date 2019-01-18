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

    // public function create()
    // {

    // 	$categorias = Categoria::all();
    //     $etiquetas = Etiqueta::all();

    // 	return view('admin.posts.create',compact('categorias','etiquetas'));
    // }

     public function store(Request $request)
     {
         $this->validate($request, [
             'titulo'    => 'required',
         ]);

         $post = Post::create(['titulo' =>  $request->get('titulo')]);

         return redirect()->route('admin.posts.edit', compact('post'));
    
    }

    //public function edit($post) cambiando a public function edit(Post $post)
    // busca el post automáticamente con model biding

    public function edit(Post $post)
    {
        $categorias = Categoria::all();
        $etiquetas = Etiqueta::all();

        return view('admin.posts.edit',compact('categorias','etiquetas','post'));
        
    }

    public function update(Post $post, Request $request)
    {
        $this->validate($request, [
            'titulo'    => 'required',
            'cuerpo'    => 'required',
            'categoria'    => 'required',
            'extracto'    => 'required',
            'etiquetas'    => 'required'
        ]);

        $post->titulo = $request->get('titulo');
        $post->cuerpo = $request->get('cuerpo');
        $post->extracto = $request->get('extracto');

        // asigna la categoría si existe, si no existe, la crea!
        $post->categoria_id = Categoria::find($cat = $request->get('categoria'))
                                ? $cat 
                                : Categoria::create(['nombre' => $cat])->id;

        //dd(Carbon::createFromFormat('d/m/Y', '30/06/1990'));

       // $fecha Carbon::createFromFormat('d/m/Y', $request->get('fecha_publi'));

        //$post->fecha_publi = $request->has('fecha_publi')  ? Carbon::parse($request->get('fecha_publi')) : null;
        $post->fecha_publi = $request->has('fecha_publi')  ?Carbon::createFromFormat('d/m/Y', $request->get('fecha_publi')) : null;

        
        $post->save();

        $etiquetas = [];
        foreach ($request->get('etiquetas') as $etiqueta) {

            $etiquetas[] = Etiqueta::find($etiqueta)
                                ? $etiqueta
                                : Etiqueta::create(['nombre' => $etiqueta])->id;
        }

        //$post->etiquetas()->attach($request->get('etiquetas'));
        // con esto no duplica al editar
        $post->etiquetas()->sync($etiquetas);

        return back()->with('flash','Post guardado');
    }

    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'titulo'    => 'required',
    //         'cuerpo'    => 'required',
    //         'categoria'    => 'required',
    //         'extracto'    => 'required',
    //         'etiquetas'    => 'required'
    //     ]);

    //     //return Post::create($request->all());

    //     $post = new Post;

    //     $post->titulo = $request->get('titulo');
    //     $post->cuerpo = $request->get('cuerpo');
    //     $post->extracto = $request->get('extracto');
    //     $post->categoria_id = $request->get('categoria');
    //     $post->fecha_publi = $request->has('fecha_publi')  ? Carbon::parse($request->get('fecha_publi')) : null;

    //     $post->save();

    //     $post->etiquetas()->attach($request->get('etiquetas'));

    //     return back()->with('flash','Post guardado');
    // }
}
