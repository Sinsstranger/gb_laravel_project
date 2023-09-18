@extends('layouts.admin')
@section('content')
    <h1 class="h2">Создать новость</h1>
    <form method="POST" action="{{ route('admin.news.store') }}">
        @csrf
        <div class="form-group">
            <label for="add-news-form-title">Заголовок</label>
            <input type="text" name="title" class="form-control" id="add-news-form-title" placeholder="Заголовок"
                   value="{{ old('title') }}">
            <label for="add-news-form-url">Слаг Url</label>
            <input type="text" name="url" class="form-control" id="add-news-form-url" placeholder="Url"
                   value="@if(old('url')) {{ old('url') }}@else {{ fake()->slug() }} @endif">
            <label for="add-news-form-author">Автор</label>
            <input type="text" name="author" class="form-control" id="add-news-form-author" placeholder="Автор"
                   value="{{ old('author') }}">
        </div>
        <div class="form-group">
            <label for="add-news-form-state">Статус</label>
            <select class="form-control" id="add-news-form-state" name="status">
                <option @if(old('status') === 'draft') selected @endif>draft</option>
                <option @if(old('status') === 'active') selected @endif>active</option>
                <option @if(old('status') === 'blocked') selected @endif>blocked</option>
            </select>
        </div>
        <div class="form-group">
            <label for="add-news-form-category">Категория</label>
            <select class="form-control" id="add-news-form-category" name="category_id">
                @forelse($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @empty
                @endforelse

            </select>
        </div>
        <div class="form-group">
            <label for="add-news-form-description">Описание</label>
            <textarea name="description" class="form-control" id="add-news-form-description"
                      rows="3">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary mb-2 mt-2">Создать</button>
        </div>
    </form>
@endsection
