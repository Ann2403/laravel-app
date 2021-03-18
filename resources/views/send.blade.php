@extends('layouts.layout')

@section('title')
    @parent:: {{ $title }}
@endsection

@section('content')
    <div class="container">
        <form method="post" action="{{ route('send') }}">
            @csrf
            <div class="form-group">
                <label for="name">Your name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="text">Your text</label>
                <textarea class="form-control" id="text" name='text' rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-dark">Send</button>
        </form>

    </div>
@endsection
