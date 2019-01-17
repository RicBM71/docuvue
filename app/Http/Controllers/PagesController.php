<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function home()
    {
    	
    	$posts = Post::publicados()->get();
        //dd($posts);
        return view('welcome',compact('posts'));
    }
}
