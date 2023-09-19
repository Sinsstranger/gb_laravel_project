@extends('layouts.main')
@section('content')
    <h1>News Categories</h1>
    @foreach ($categories as $category)
        <section class="news-card">
            <h3>
                <a href="{{ route('categories.topics-detail', ['url_slug' => $category->url_slug]) }}">{{$category->title}}</a>
            </h3>
        </section>
        {{ $categories->links() }}
    @endforeach
@endsection
