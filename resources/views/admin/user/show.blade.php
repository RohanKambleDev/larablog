@extends('layouts.app') @section('content')
    <div class="container">
        <a class="btn btn-info text-right" href="{{ route('user.index') }}" role="button">Back</a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="text-capitalize">{{ $user->name }}</h1>
                    </div>
                    <div class="col-md-6" style="text-align: right">
                        <form method="POST" name="deletePost" action="{{ route('user.destroy', $user->id) }}"
                            style="text-align: right">
                            <a class="btn btn-primary" href="{{ route('user.edit', $user->id) }}" role="button">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-3 p-4">
                    <div class="row g-0">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text"></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
