@extends('layouts.layout')

@section('title')
    @parent:: {{ $title }}
@endsection

{{--переопределяем секцию--}}
@section('header')
{{--  добавляем к секции в шаблоне что-то еще  --}}
    @parent
    <h5>Header about page</h5>
@endsection


@section('contant')
    <section class="jumbotron text-center">
        <div class="container">
            <h1>About page</h1>
        </div>
    </section>

@endsection
