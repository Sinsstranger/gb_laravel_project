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
@foreach ($news as $news_card)
    <section class="news-card">
        <h3>{{$news_card['title']}}</h3>
        <p>{{$news_card['description']}}</p>
        <p>{{$news_card['author']}}</p>
        <p>{{$news_card['created_at']}}</p>
        <a href="{{ route('news-detail', ['uri' => $news_card['url']]) }}">Читать</a>
    </section>
@endforeach
</body>
</html>
