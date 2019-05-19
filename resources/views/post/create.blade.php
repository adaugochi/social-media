@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="mx-auto col-4">
            <form action="/post" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <h3>Add New Post</h3>
                </div>
                <div class="form-group row">
                    <label for="caption" class="col-form-label font-weight-bold">{{ __('Caption:') }}</label>

                    <input id="caption" type="text"
                           class="form-control @error('caption') is-invalid @enderror"
                           name="caption" value="{{ old('caption') }}"
                           autocomplete="caption" autofocus>

                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="image" class="col-form-label font-weight-bold">{{ __('Image:') }}</label>

                    <input id="image" type="file" name="image"
                           class="form-control-file @error('image') is-invalid @enderror">

                    @error('image')
                    <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection