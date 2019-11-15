<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function getIndex()
    {
    	$posts = DB::table('posts')->orderBy('id','desc')->take(5)->get();
        return view('pages.welcome')->with('posts',$posts);
    }
    public function getAbout()
    {
    	$full = "mohammed"." "."adnan";
    	return view('pages.about')->with("fullname",$full);
    }
    public function getContact()
    {
    	return view('pages.contact');
    }
    
}
