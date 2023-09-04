<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Categories</title>
    @vite(['resources/css/normalize.css', 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<h1>News Categories</h1>
@foreach ($categories as $category)
    <section class="news-card">
        <h3>{{$category['title']}}</h3>
    </section>
@endforeach
</body>
</html>
