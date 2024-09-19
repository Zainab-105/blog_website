<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                return view('home.homepage');
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
}
