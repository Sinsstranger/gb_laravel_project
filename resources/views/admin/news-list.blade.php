@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $h1 }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
            </div>
        </div>
    </div>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Категория</th>
                <th scope="col">Url Адрес</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($news as $news_item)
                <tr>
                    <td>{{ $news_item->id }}</td>
                    <td>{{ $news_item->title }}</td>
                    <td>{{ $news_item->category_title }}</td>
                    <td>
                        <a href="{{ route('news.news-detail', ['url_slug' => $news_item->url_slug]) }}">{{ route('news.news-detail', ['url_slug' => $news_item->url_slug]) }}</a>
                    </td>
                    <td>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <a type="button" class="btn btn-sm btn-outline-secondary">Редактировать</a>
                                <a type="button" class="btn btn-sm btn-outline-secondary">Удалить</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <h2>Новостей нет</h2>
            @endforelse

            </tbody>
        </table>
    </div>
@endsection
