<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$title}}</title>
  @vite(['resources/css/normalize.css', 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <h1>It's a newsfeed page</h1>
</body>
</html>