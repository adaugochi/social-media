@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row col-7 mx-auto pt-5">
            <div class="col-6">
                <img src="/storage/{{$post->image}}" class="w-100">
            </div>
            <div class="col-6">
                <div class="d-flex align-items-center">
                    <div class="pr-2">
                        <img src="{{$post->user->profile->profileImage()}}" class="w-75 rounded-circle">
                    </div>
                    <div class="pr-3">
                        <h4 class="font-weight-bold justify-content-between">{{$post->user->username}}</h4>
                    </div>

                    <div class="dropdown">
                        <span style="font-size: 20px" data-toggle="dropdown">
                            <i class="fas fa-ellipsis-v"></i>
                        </span>

                        <div class="dropdown-menu">
                         @can('update', $post->user->profile)
                            <a class="dropdown-item" href="/post/{{$post->id}}/edit">Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalDelete_{{ $post->id }}">Delete</a>
                         @endcan
                            <a class="dropdown-item" href="#">Share Link</a>
                        </div>
                    </div>
                </div>

                <hr>

                <div>
                    <span class="font-weight-bold">{{$post->user->username}}</span>
                    <span>{{$post->caption}}</span>
                </div>

                <!--Delete Modal -->
                <div class="modal fade" id="modalDelete_{{ $post->id }}" role="dialog" tabindex="-1" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-md">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <span><h4>Delete Post</h4></span>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="/post/{{$post->id}}" enctype="multipart/form-data" id="delDepartment">
                                    @csrf
                                    @method('DELETE')
                                    <div class="form-group">
                                        <input type="hidden" id="id" value="{{ $post->id }}" name="id">
                                    </div>
                                    <p>Are you sure you want to delete this post ? </p>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-danger">
                                            Yes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection