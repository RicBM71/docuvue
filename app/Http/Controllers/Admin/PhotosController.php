<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function store(Post $post)    
    {
    	$this->validate(request(),[
    		'foto' => 'required|image|max:2048'	//jpeg png, gif, svg
    	]);


    	//$foto = request()->file('foto');

    	//foto laravel lo convierte en un instancia de la clase uploadedfiles
    	// por lo que tenemos varios métodos, store
    	// guarda la imagen en storage/public
    			//TODO: probar con subcarpeta
    	//$fotoUrl = $foto->store('public');
    	//return Storage::url($fotoUrl);

    	//dejar así:
    	$foto = request()->file('foto')->store('posts','public');

    	$fotoUrl = Storage::url($foto);

    	// 	//insert en la tabla photos
    	Photo::create([
    	 	'url'	=> $fotoUrl,
    	 	'post_id' => $post->id
    	]);

        // esto puede sustitur al create de arriba, quizás de momento lo veo más claro 
        // cmomo está
        // $post->fotos()->create[
        //     'url' = > $fotoUrl
        // ]
    }
    public function destroy(Photo $foto)
    {

       // dd($fotoo);
       $foto->delete();

       // $fotoPath = str_replace('storage', 'public', $foto->url);

       // Storage::delete($fotoPath);

       return back()->with('flash', 'Se ha borrado la foto');
    }
}
