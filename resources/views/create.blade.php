@extends('layouts.layout')

@section('title')
    @parent:: {{ $title }}
@endsection

@section('contant')

    <div class="container mt-4">
        <form method="post" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title"
                        value="{{ old('title') }}">
                {{--old('title') доступ к данніх сесии--}}
            </div>
            <div class="form-group">
                <label for="rubric_id">Rubric</label>
                <select class="form-control" id="rubric_id" name="rubric_id">
                    <option>Select rubric</option>
                   @foreach($rubrics as $key => $value)
                    <option value="{{$key}}"
                            @if(old('rubric_id') == $key) selected @endif>
                        {{$value}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" rows="3" name="content">
                    {{ old('content') }}
                </textarea>
            </div>

            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>

@endsection
