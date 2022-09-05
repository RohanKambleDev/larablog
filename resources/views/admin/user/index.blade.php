@extends('layouts.app') @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="row mt-4">
                    <div class="col-md-6">
                        <h1>Users</h1>
                    </div>
                    <div class="col-md-6" style="text-align: right;">
                        <a class="btn btn-primary text-right" href="{{ route('user.create') }}" role="button">Add new
                            user</a>
                    </div>
                </div>
                <ol class="list-group list-group-numbered">
                    @foreach ($users as $user)
                        <li class="list-group-item">
                            <a href="{{ route('user.show', $user['id']) }}" class="text-capitalize">
                                {{ $user['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endsection
