@extends('layouts.app') @section('content')
    <div class="container">
        <a class="btn btn-info text-right" href="{{ route('post.index') }}" role="button">Back</a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ $label }} Post</h2>
                <div class="card p-4">

                    <form name="createPost" method="POST" action="{{ $route }}" class="row g-3 needs-validation"
                        novalidate>
                        @csrf
                        @if (strtolower($method) === 'put')
                            @method('PUT')
                        @endif
                        <div class="mb-2">
                            <label for="title" class="form-label">Post Title</label>
                            <input name="title" type="text" value="{{ $post->title ?? '' }}" class="form-control"
                                id="text" placeholder="Post Title" required />
                            <div class="invalid-feedback">
                                Please provide a post title.
                            </div>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-2">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="3" required>
                                {{ $post->description ?? '' }}
                            </textarea>
                            <div class="invalid-feedback">
                                Please provide a post description.
                            </div>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-2">
                            <label for="slug" class="form-label">Post Slug</label>
                            <input name="slug" type="text" value="{{ $post->slug ?? '' }}" class="form-control"
                                id="slug" placeholder="Post Slug" required />
                            <div class="invalid-feedback">
                                Please provide a post slug.
                            </div>
                            <div class="valid-feedback">Looks good!</div>
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
