@extends('layouts.app') @section('content')
    <div class="container">
        <a class="btn btn-info text-right" href="{{ route('user.index') }}" role="button">Back</a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Edit User</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card p-4">

                    <form name="createUser" method="POST" action="{{ route('user.store') }}" class="row"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" type="text" value="{{ $user->name ?? old('name') }}"
                                class="form-control" id="text" placeholder="Name of the user" required />
                        </div>
                        <div class="mb-2">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="3" required>
                                {{ $post->description ?? old('description') }}
                            </textarea>
                        </div>
                        <div class="mb-2">
                            <label for="slug" class="form-label">Post Slug</label>
                            <input name="slug" type="text" value="{{ $post->slug ?? old('slug') }}"
                                class="form-control" id="slug" placeholder="Post Slug" required />
                        </div>
                        <div class="mb-3">
                            <label for="postImage" class="form-label">Post Image</label>
                            <input class="form-control" name="postImage" type="file" id="postImage">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                Submit form
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
