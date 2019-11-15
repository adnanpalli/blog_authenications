<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use Session;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')->orderBy('id','desc')->paginate(5);

        $postss = Post::all();
        return view('posts.index')->with('posts',$posts)->with('postss',$postss);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('posts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
             'title' => ['required', 'unique:posts', 'max:255'],
            'body' => ['required'],
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        Session::flash('success','New post has been created!!');
        return redirect()->route('post.show',$post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post',$post);
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
         
        $validatedData = $request->validate([
             'title' => ['required', 'max:255'],
            'body' => ['required'],
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        Session::flash('success','updated successfully!!');
        return redirect()->route('post.show',$post->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::find($id);
        $post->delete();
        Session::flash('success','deleted successfully!!');
        return redirect()->route('post.index');
    }
}
