@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col-8 mx-auto pb-5" style="border-bottom: 1px solid #D3D3D3;">
        <div class="col-3 pr-5 pt-3">
            <img class="rounded-circle mw-100" src="{{$user->profile->profileImage()}}">
        </div>
        <div class="col-9 pt-3">
            <div class="d-flex">
                <div class="pr-4">
                    <h3>{{$user->username}}</h3>
                </div>

                @if(auth()->user()->id !== $user->id)
                    <div class="pr-4">
                        <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                    </div>
                @endif

                <div>
                    <span style="font-size: 20px "><i class="fas fa-cog"></i></span>
                </div>
            </div>

            @can('update', $user->profile)
            <div class="d-flex py-3">
                <div class="pr-4">
                    <a href="/profile/{{$user->id}}/edit" class="btn btn-sm btn-outline-secondary font-weight-bold px-5">Edit Profile</a>
                </div>
                <div class="pr-4">
                    <a href="/post/create" class="btn btn-sm btn-outline-secondary font-weight-bold px-5">Add Post</a>
                </div>
            </div>
            @endcan

            <div class="d-flex">
                <div class="pr-5"><strong>{{$user->posts->count()}}</strong> posts</div>
                <div class="pr-5"><strong>{{$user->profile->followers->count()}}</strong> followers</div>
                <div class="pr-5"><strong>{{$user->follows->count()}}</strong> following</div>
            </div>
            <div class="pt-3">
                <h4 class="font-weight-bold">{{$user->profile->name}}</h4>
            </div>
            <div>{{$user->profile->bio}}</div>
            <div>
                <a href="{{$user->profile->url}}">{{$user->profile->url}}</a>
            </div>
        </div>
    </div>

    <div class="row col-8 mx-auto">
        @foreach($user->posts as $post)
            <div class="col-4 pt-3">
                <a href="/post/{{$post->id}}">
                    <img src="/storage/{{$post->image}}" class="w-100">
                </a>
            </div>
        @endforeach
    </div>

</div>
@endsection
