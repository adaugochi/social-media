<?php

namespace App\Http\Controllers;

use App\Helpers\FileUpload;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = 'Add New Post';
        $buttonText = 'Add';
        return view('post.create-edit', compact('title', 'buttonText'));
    }

    public function create(Request $request)
    {
        $validateData = $request->validate([
            'caption' => 'required',
            'image' => 'required|image'
        ]);

        $imagePath = FileUpload::saveImage('image', 'uploads');

        auth()->user()->posts()->create([
            'caption' => $validateData['caption'],
            'image' => $imagePath
        ]);

        return redirect('/profile/'.auth()->user()->id);
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $title = 'Edit Post';
        $buttonText = 'Update';
        return view('post.create-edit', compact('post', 'title', 'buttonText'));
    }

    public function update(Request $request, Post $post)
    {
        $validateData = $request->validate([
            'caption' => 'required'
        ]);

        $post->update($validateData);

        return redirect('/profile/'.auth()->user()->id);
    }

    public function delete(Post $post)
    {
        $image_path = public_path().'/storage/'.$post->image;
        unlink($image_path);
        $post->delete();

        return redirect('/profile/'.auth()->user()->id);
    }
}
