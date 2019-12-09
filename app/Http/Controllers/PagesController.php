<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;
use Mail;
use Session;
class PagesController extends Controller
{
    //
    public function getIndex()
    {
    	$posts = DB::table('posts')->orderBy('id','desc')->take(5)->get();
        $cats = Category::all();
        return view('pages.welcome')->with('posts',$posts)->with('catgories',$cats);
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

    public function getblogbycatgory($id)
    {
        $cat = Category::find($id);
        return view('blog.show')->with('cat',$cat);

    }

    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

    public function sendEmail(Request $request)
    {
       //dd($request);
       $this->validate($request,array(
        'name' =>'required',
        'email' => 'required|email',
        'message' =>'required|max:50',
        ));
        
        $data = array(
            'email'=> $request->email,
            'name' => $request->name,
            'body_message'=>$request->message
        );

        Mail::send('email.contact',$data,function($message) use ($data)
        {
            $message->from($data['email']);
            $message->to('adnanpalli@gmail.com');
            $message->subject($data['body_message']);
        });
         Session::flash('success','Mail sent');

         return redirect('/');
    }
    
}
