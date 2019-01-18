<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function show(Categoria $categoria)
    {
    	//llama al método posts del modelo categoría y lo devuelve como un objeto con la categoría
    	// y los posts asociados.
    			//return $categoria->load('posts');
    	//de esta otra forma, lo devuelve como una colección independiente de posts.
    			//return $categoria->posts;
    	
    	$posts = $categoria->posts()->paginate();
    	//return $categor

    	$titulo = $categoria->nombre;
    	
    	return view('welcome', compact('posts','titulo'));
    }}
