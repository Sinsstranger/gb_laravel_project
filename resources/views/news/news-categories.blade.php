@extends('layouts.main')
@section('content')
    <h1>News Categories</h1>
    @foreach ($categories as $category)
        <section class="news-card">
            <h3>{{$category['title']}}</h3>
        </section>
    @endforeach
@endsection
