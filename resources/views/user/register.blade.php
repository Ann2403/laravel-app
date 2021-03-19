@extends('layouts.layout')

@section('title')
    @parent:: {{ $title }}
@endsection

@section('content')
    <div class="container">
        <form method="post" action="{{ route('registration.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                       value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Return password</label>
                <input type="password" class="form-control" id="password_confirmation"
                       name="password_confirmation">
            </div>

            <button type="submit" class="btn btn-dark">Send</button>
        </form>

    </div>
@endsection
