@extends('layouts.main')
@section('content')
    <h1>News Categories</h1>
    @foreach ($categories as $category)
        <section class="news-card">
            <h3>
                <a href="{{ route('topics.topics-detail', ['url' => $category['url']]) }}">{{$category['title']}}</a>
            </h3>
        </section>
    @endforeach
@endsection
