<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = auth()->user()->follows->pluck('user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(2);

        return view('home', compact('posts'));
    }
}
