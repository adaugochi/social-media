@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="mx-auto col-4">
            @if(isset($post))
            {!! Form::model($post, ['url' => ['post/'.$post->id], 'enctype' => 'multipart/form-data', 'method' => 'patch']) !!}
            @else
                {!! Form::open(['url' => 'post', 'enctype' => 'multipart/form-data']) !!}
            @endif
                <div class="row">
                    <h3>{{$title}}</h3>
                </div>
                <div class="form-group row">

                    {!! Form::label('caption', 'Caption:', ['class' => 'col-form-label font-weight-bold']) !!}
                    {!! Form::text('caption', null, ['class' => 'form-control @error("caption") is-invalid @enderror"']) !!}

                    @include('partials.error', ['errText' => 'caption'])
                </div>

                <div class="form-group row">
                    {!! Form::label('image', 'Image:', ['class' => 'col-form-label font-weight-bold']) !!}

                    <input id="image" type="file" name="image"
                           class="form-control-file @error('image') is-invalid @enderror">

                    @include('partials.error', ['errText' => 'image'])
                </div>
                <div class="row">
                    <button class="btn btn-primary">{{$buttonText}}</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection