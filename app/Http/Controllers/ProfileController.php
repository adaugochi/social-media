<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

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
            'name' => 'required',
            'bio' => 'required',
            'url' => 'url',
            'image' => ''
        ]);
        if ($request->image) {
            $imagePath = request('image')->store('profiles', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->resize(1400, 1400);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $validateData,
            $imageArray ?? []
        ));

        return redirect('/profile/'.$profile->user->id);
    }

}
