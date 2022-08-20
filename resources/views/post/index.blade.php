@extends('layouts.app') @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Posts</h1>
                    </div>
                    <div class="col-md-6" style="text-align: right;">
                        <a class="btn btn-primary text-right" href="{{ route('post.create') }}" role="button">Add new post</a>
                    </div>
                </div>
                <ol class="list-group list-group-numbered">
                    @foreach ($posts as $post)
                        <li class="list-group-item">
                            <a href="{{ route('post.show', $post['slug']) }}" class="text-capitalize">
                                {{ $post['title'] }}
                            </a>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endsection
