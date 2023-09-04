<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>News Detail </title>
  @vite(['resources/css/normalize.css', 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <h1>Here will be a News with url {{$url}}</h1>
</body>
</html>