@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col-8 mx-auto" >
        @foreach($posts as $post)
        <div class="card mb-5">
            <div class="card-header">
                <div class="">
                    <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle" style="width: 6%;">
                </div>
            </div>
            <div class="card-body">
                <img src="/storage/{{ $post->image }}" class="w-100">

                <div class="d-flex pt-3">
                    <div class="font-weight-bold pr-2">
                        <a href="/profile/{{$post->user->id}}" class="text-dark text-decoration-none">{{$post->user->username}}</a>
                    </div>
                    <div class="">
                        {{$post->caption}}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{$posts->links()}}
    </div>
</div>
@endsection
