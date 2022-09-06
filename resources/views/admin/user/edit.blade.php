@extends('layouts.app') @section('content')
    <div class="container">
        <a class="btn btn-info text-right" href="{{ route('user.show', $user->id) }}" role="button">Back</a>
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

                    <form name="EditUser" method="POST" action="{{ route('user.update', $user->id) }}" class="row"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" type="text" value="{{ $user->name ?? old('name') }}"
                                class="form-control" id="text" placeholder="Name of the user" required />
                        </div>
                        {{-- <div class="mb-2">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="3" required>
                                {{ $user->description ?? old('description') }}
                            </textarea>
                        </div> --}}
                        <div class="mb-2">
                            <label for="username" class="form-label">User Id / Username</label>
                            <input name="username" type="text" value="{{ $user->id ?? old('slug') }}"
                                class="form-control" id="username" placeholder="username" required disabled />
                        </div>
                        <div class="mb-2">
                            <label for="slug" class="form-label">Role</label>
                            <select class="form-select" aria-label="Role">
                                <option selected>Select a Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ Str::ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="postImage" class="form-label">Post Image</label>
                            <input class="form-control" name="postImage" type="file" id="postImage">
                        </div> --}}
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                Submit
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
