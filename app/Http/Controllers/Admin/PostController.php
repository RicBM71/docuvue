<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Etiqueta;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
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
}
