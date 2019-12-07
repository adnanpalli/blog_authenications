<?php
namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
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
   
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $tags = Tag::all();
        return view('posts.create')->with('categories',$category)->with('tags',$tags);
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
              'title' => 'required|unique:posts|max:255',
              'category_id' => 'required|integer',
        'body' => 'required',
        'slug' => 'required|alpha_dash|min:5|max:255'
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->body = $request->body;
        $post->slug = $request->slug;
        $post->save();

        $post->tags()->sync($request->tags,false);

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
        $categorys = Category::all();
        $tags = Tag::all();

        $cats = array();
        foreach($categorys as $category){
            $cats[$category->id] = $category->title;
        }
        
        $tags2 = array();
        foreach($tags as $tag)
        {
            $tags2[$tag->id] = $tag->name;
        }
        return view('posts.edit')->with('post',$post)
        ->with('categories',$cats)->with('tags',$tags2);
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
        $post = Post::find($id);
        if($post->slug != $request->slug)
        {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body' => 'required',
                'category_id' => 'required|integer'
            ]);
        }
        else
        {
             $validatedData = $request->validate([
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255',
                'body' => 'required',
                'category_id' => 'required|integer'
            ]);
        }
        
        $post->title = $request->title;
        $post->slug = $request->slug;    
        $post->body = $request->body;
        $post->category_id = $request->category_id;
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
