@extends('layouts.app') @section('content')
    <div class="container">
        <a class="btn btn-primary text-right" href="{{ route('post.index') }}" role="button">Back</a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-capitalize">{{ $post->title }}</h2>
                <div class="card mb-3 p-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png"
                                class="img-fluid rounded-start" width="150" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text">{{ $post->description }}</p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        Last updated {{ $post->updated_at->diffForHumans() }}
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
