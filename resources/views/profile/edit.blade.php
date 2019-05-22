@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="mx-auto col-4">
            <form action="/profile/{{$user->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <h3>Edit Profile</h3>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-form-label font-weight-bold">{{ __('Name:') }}</label>

                    <input id="name" type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="name" value="{{$user->profile->name}}" autocomplete="name" autofocus>

                    @include('partials.error', ['errText' => 'name'])
                </div>

                <div class="form-group row">
                    <label for="bio" class="col-form-label font-weight-bold">{{ __('Bio:') }}</label>

                    <textarea id="bio" rows="3"
                              class="form-control @error('bio') is-invalid @enderror"
                              name="bio" autocomplete="bio"
                              autofocus>{{ (old('bio')) ?? $user->profile->bio }}
                    </textarea>

                    @include('partials.error', ['errText' => 'bio'])
                </div>

                <div class="form-group row">
                    <label for="url" class="col-form-label font-weight-bold">{{ __('URL:') }}</label>

                    <input id="url" type="url"
                           class="form-control @error('url') is-invalid @enderror"
                           name="url" value="{{ (old('url')) ?? $user->profile->url}}"
                           autocomplete="url" autofocus>

                    @include('partials.error', ['errText' => 'url'])
                </div>

                <div class="form-group row">
                    <label for="image" class="col-form-label font-weight-bold">{{ __('Image:') }}</label>

                    <input id="image" type="file"
                           class="form-control-file @error('image') is-invalid @enderror"
                           name="image" value="{{$user->profile->image}}">

                    @include('partials.error', ['errText' => 'image'])
                </div>

                <div class="row">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection