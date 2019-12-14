<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Category = Category::all();
        return view('category.index')->with('category',$Category);
    }

     public function __construct()
    {
        $this->middleware('auth');

        //if this user have permission of admin or super admin then only he can access this resourse
        $this->middleware('roles:user');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('category.create');
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
              'title' => 'required|unique:categories|max:255'
        ]);

        $category = new Category;
        $category->title = $request->title;
       
        $category->save();

        Session::flash('success','New category has been created!!');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $this->authorize('update',$category);
        return view('category.edit')->with('category',$category);
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
        $category = Category::find($id);
         $this->authorize('update',$category);
             $validatedData = $request->validate([
                'title' => 'required|max:255'
            ]);
        
        $category->title = $request->title;
       
        $category->save();

        Session::flash('success','updated successfully!!');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $this->authorize('update',$category);
        $category->delete();
        Session::flash('success','deleted successfully!!');
        return redirect()->route('category.index');
    }
}
