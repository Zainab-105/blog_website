<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts', compact('posts')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('home.create_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data=$request->validate([
'title'=>'required',
'description'=>'required',
'image'=>'requird|image|mimes:jpg,png,gif,jpeg',

       ]);
       if($request->hasFile('image')){
        $image=$request->file('image');
        $imagename=time().'_'.$image->getClientOriginalName();
        $path=$image->storeAs('uploads',$imagename,'public');
        $data['image']=$path;
       }
       $data['user_id']=auth()->user()->id;
       $data['user_name']=auth()->user()->name;
       $data['user_type']=auth()->user()->usertype;
       $data['status']="active"; 
       Post::create();
       return redirect()->back();
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
        $post=Post::find($id);
        return view('admin.edit_post',compact('post'));
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
        // Validate the incoming request data
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:2048|mimes:jpg,png,gif,jpeg', // Make image optional if needed
        ]);
    
        // Find the specific post by its ID
        $post = Post::findOrFail($id);
    
        // If an image is uploaded, handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('uploads', $imagename, 'public');
            $data['image'] = $path;
        }
    
        // Update the post using the instance method
        $post->update($data);
    
        // Redirect or return response as needed
        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        $post->delete();
        $imagepath=public_path('storage/'.$post->image);
        if(file_exists($imagepath)){
          @unlink($imagepath);
        }
        return redirect()->route('posts.index')->with('message',"post deleted successfully");
    }
}
