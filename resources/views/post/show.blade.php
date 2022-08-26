@extends('layouts.app') @section('content')
    <div class="container">
        <a class="btn btn-info text-right" href="{{ route('post.index') }}" role="button">Back</a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="text-capitalize">{{ $post->title }}</h1>
                    </div>
                    <div class="col-md-6" style="text-align: right">
                        @can(['delete articles', 'edit articles'])
                            <form method="POST" name="deletePost" action="{{ route('post.destroy', $post->slug) }}"
                                style="text-align: right">
                                <a class="btn btn-primary" href="{{ route('post.edit', $post->slug) }}" role="button">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @elsecan(['edit articles'])
                            <a class="btn btn-primary" href="{{ route('post.edit', $post->slug) }}" role="button">Edit</a>
                            </form>
                        @endcan
                    </div>
                </div>
                <div class="card mb-3 p-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded-start" width="250"
                                alt="">
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
