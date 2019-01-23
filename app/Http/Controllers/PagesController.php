<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function home()
    {
    	
    	//$posts = Post::publicados()->get();
		//return $posts = Post::publicados()->paginate(1);

		//$posts = Post::publicados()->paginate(15);
            // de esta forma pasamos el nombre de la categoría y ahorramos querys
            // debe coincidir con el nombre de la relación en el modelo Post en este caso
            //Post::with(['categoria','etiquetas','owner', 'fotos'])->publicados()->paginate(15);
            // lo vamos a llevar al modelo
        $posts = Post::publicados()->paginate(15);
        
        //return $posts;
    	//$posts = Post::all();
        //dd($posts);
        return view('pages.home',compact('posts'));
    }

    public function about()
    {
        return view('pages.about');
    }
    public function archive()
    {
        return view('pages.archive');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
