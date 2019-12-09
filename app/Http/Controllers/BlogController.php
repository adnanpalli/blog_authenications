<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class BlogController extends Controller
{
    //
     public function getindex()
    {
    	$posts = Post::paginate(5);
    	return view('blog.index')->with('posts',$posts);

    }
    public function getsingle($slug)
    {
    	$post = Post::where('slug', $slug)->first();
    	return view('blog.single')->with('post',$post);

    }

    

}
