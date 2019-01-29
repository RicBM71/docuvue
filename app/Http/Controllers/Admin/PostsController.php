<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Etiqueta;
use App\Categoria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
    public function index()
    {
    	
       // dd(auth()->user()->posts());
        
        // if (auth()->user()->hasRole('Admin')){
        //     $posts = Post::all();
        // }else{
        //     $posts = auth()->user()->posts;  
        // }
        //allowed en ejemplo
        $posts = Post::permitidos()->get();

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
        //dd(auth()->user());
        $this->authorize('create', new Post);

         $this->validate($request, [
             'titulo'    => 'required|min:3',
         ]);

         $post = Post::create([
            'titulo' =>  $request->get('titulo'),
            'user_id' => auth()->user()->id
        ]);

         return redirect()->route('admin.posts.edit', compact('post'));
    
    }

    //public function edit($post) cambiando a public function edit(Post $post)
    // busca el post automáticamente con model biding

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('admin.posts.edit',[
            'post' => $post,
            'etiquetas'  => Etiqueta::all(),            
            'categorias' => Categoria::all(),
        ]);
        
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $this->authorize('update', $post);
        
        // $post->titulo = $request->get('titulo');
        // $post->cuerpo = $request->get('cuerpo');
        // $post->extracto = $request->get('extracto');

        // $post->categoria_id = $request->get('categoria_id');

        //dd(Carbon::createFromFormat('d/m/Y', '30/06/1990'));

       // $fecha Carbon::createFromFormat('d/m/Y', $request->get('fecha_publi'));

        //$post->fecha_publi = $request->has('fecha_publi')  ? Carbon::parse($request->get('fecha_publi')) : null;
        // ahora podemos hacer esto después de crear set en StorePostRequest
        //$post->fecha_publi = $request->get('fecha_publi');       
        //$post->save();

                // al renombar y coincidir los campos name con los de la tabla podemos llamar directamente a update
        //$post->update($request->all()); si existiesen todos los campos, como etiquetas no existe->
        // otro cambio:
        //$post->update($request->except('etiquetas'));
        // des esta última forma para prevernir inyecciones de codigo, modificar en el modelo 
        // la propiedad fillable y quitamos guarded que estaba definida como un array vacio, al
        // hacer este nuevo cambio podemos volver a dejarlo como esto:
        $post->update($request->all());

        // todo esto lo hemos llevado a StorePostRequest
        $post->syncEtiquetas($request->get('etiquetas'));

        // $etiquetas = collect($request->get('etiquetas'))->map(function($etiqueta){
        //     return Etiqueta::find($etiqueta) ? $etiqueta : Etiqueta::create(['nombre' => $etiqueta])->id;
        // });

            //esto es lo mismo que lo de arriba, lo de arriba con colecciones. Ver php docu
        // $etiquetas = [];
        // foreach ($request->get('etiquetas') as $etiqueta) {

        //     $etiquetas[] = Etiqueta::find($etiqueta)
        //                         ? $etiqueta
        //                         : Etiqueta::create(['nombre' => $etiqueta])->id;
        // }

        //$post->etiquetas()->attach($request->get('etiquetas'));
        // con esto no duplica al editar
        //$post->etiquetas()->sync($etiquetas);

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

    public function destroy(Post $post)
    {

        $this->authorize('delete', $post);

        //$post->etiquetas()->detach();   también lo llemavamos a boot()

        //$post->fotos->delete(); de esta forma no dispara el evento deleting del modelo foto
        // foreach ($post->fotos as $foto) {
        //     $foto->delete(); // de esta forma sí.
        // }
        //esto de abajo es lo mismo que el foreach pero con colecciones
        // $post->fotos->each(function($foto){
        //     $foto->delete();
        // });
        // y esto es los mismo, que finalmente los llevamos al modelo post:
        // en function boot()
        // $post->fotos->each->delete();

        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('flash', 'Publicación borrada!');
    }
}
