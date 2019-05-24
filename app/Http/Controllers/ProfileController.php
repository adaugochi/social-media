<?php

namespace App\Http\Controllers;

use App\Helpers\FileUpload;
use App\Profile;
use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->follows->contains($user->id) : false;

        return view('profile.index', compact('user', 'follows'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, Profile $profile)
    {
        $validateData = $request->validate([
            'name' => '',
            'bio' => '',
            'url' => '',
            'image' => 'image'
        ]);

        if ($request->image) {
            $imagePath = FileUpload::saveImage('image', 'profiles');
            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $validateData,
            $imageArray ?? []
        ));

        return redirect('/profile/'.$profile->user->id);
    }

}
