<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'caption' => 'required',
            'image' => 'required|image'
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1200);
        $image->save();

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
        return view('post.edit', compact('post'));
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'caption' => 'required'
        ]);

        auth()->user()->posts()->update($validateData);

        return redirect('/profile/'.auth()->user()->id);
    }

    public function delete(Post $post)
    {

        $post->delete();

        return redirect('/profile/'.auth()->user()->id);
    }
}
