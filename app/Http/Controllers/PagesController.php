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
		$posts = Post::publicados()->paginate(15);

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
