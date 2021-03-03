<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
{{-- использование именного роута--}}
<form action="{{route('contact')}}" method="post">
    {{-- указание подмены метода передачи даных
    {{method_field('PUT')}} --}}
    @method('PUT')
    {{--    csrf защита формы от подделки
    {{ csrf_field() }}    --}}
    @csrf
    <input type="text" name="name">
    <input type="email" name="email">
    <button type="submit">Submit</button>
</form>

<?php
if(!empty($_POST)) {
    dump($_POST);
}
?>
</body>
</html>
