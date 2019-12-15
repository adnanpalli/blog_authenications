<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use Auth;
use Session;
class SuperadminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myid = Auth::user()->id;
        $myposts = DB::table('posts')->where('user_id',$myid)->get();
        $othersposts = DB::table('posts')->where('user_id','<>',$myid)->get();
        return view('superadmin.dash')->with('myposts',$myposts)->with('othersposts',$othersposts);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function publish($id)
    {
        $post = Post::find($id);
        $post->status = 1;
        $post->save();
        Session::flash('success','published successfully!!');
        return redirect()->route('post.show',$id);
    }
    public function unpublish($id)
    {
        $post = Post::find($id);
        $post->status = 0;
        $post->save();
        Session::flash('success','unpublished successfully!!');
        return redirect()->route('post.show',$id);
    }
}
