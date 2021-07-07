<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class UploadController extends Controller
{
    public function index(){
        $posts = Post::all();

        return view('index',compact('posts'));
    }

    public function editPost(Post $post){
        return view('edit', compact('post'));
    }

    public function updatePost(Request $request, $id){

        $data = $request->except('_token', '_method');

        Post::where('id', $id)->update($data);

        return redirect('/');
    }

    public function showUpload(){
        return view('upload');
    }

    public function upload(Request $request){

        // $fileName=$request->file('file')->getClientOriginalName();
        // $path=$request->file('file')->storeAs('uploads', $fileName, 'public');

        // return response()->json(['location'=>"/storage/$path"]); 
        $imgpath = $request->file('file')->store('upload', 'public');

        return response()->json(['location' => "/storage/$imgpath"]);
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);

        $data = $request->except('_token');

        $post = Post::create($data);

        return redirect('/');
    }
}
