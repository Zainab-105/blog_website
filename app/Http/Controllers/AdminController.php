<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
class AdminController extends Controller
{
    public function login()
    {
        // Validate credentials
        // $credentials = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        // Attempt to authenticate the user
        if (Auth::id()) {
            // Get user type after authentication
            $usertype = auth()->user()->usertype;

            // Remove dd after debugging
            // dd($usertype);

            // Redirect based on user type
            if ($usertype == 'user') {
                $blogs=Post::take(6)->get();
                return view('home.homepage',compact('blogs'));
            } elseif ($usertype == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back()->with('error', 'Unauthorized access');
            }
        } else {
            // If authentication fails, return with error message
            return redirect()->back()->with('error', 'Invalid login credentials');
        }
    }
    public function homepage(){
        $blogs=Post::all();
        return view('home.homepage',compact('blogs'));
    }
    public function blog_detail($id){
$blog=Post::find($id);
return view('home.blog_detail',compact('blog'));
    }
}
