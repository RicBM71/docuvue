<?php

namespace App\Http\Controllers;

use App\Etiqueta;
use Illuminate\Http\Request;

class EtiquetasController extends Controller
{
    public function show(Etiqueta $etiqueta)
    {

    	$posts = $etiqueta->posts()->publicados()->paginate();
    	$titulo = $etiqueta->nombre;

    	return view('pages.home', compact('posts','titulo'));
    }
}
