<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 - Not found</title>
</head>
<body>
        {{--
        передаваемое сообщение ошибки 404 хранится в объекте $exception
        и доступно через метод getMessage()
        --}}
    <h1>{{ $exception -> getMessage() }}</h1>
</body>
</html>
