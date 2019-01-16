<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function home()
    {
    	$posts = Post::latest('fecha_publi')->get(); // orden descendente
        //dd($posts);
        return view('welcome',compact('posts'));
    }
}
