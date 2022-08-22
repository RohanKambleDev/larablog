@extends('layouts.app') @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                {{-- <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div> --}}

                <div class="row mt-4">
                    <div class="col-md-6">
                        <h1>Posts</h1>
                    </div>
                    @can('edit articles')
                        <div class="col-md-6" style="text-align: right;">
                            <a class="btn btn-primary text-right" href="{{ route('post.create') }}" role="button">Add new
                                post</a>
                        </div>
                    @endcan
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
