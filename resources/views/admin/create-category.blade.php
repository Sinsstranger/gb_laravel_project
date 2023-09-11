@extends('layouts.admin')
@section('content')
    <h1 class="h2">Создать категорию</h1>
    <form method="POST" action="{{ route('admin.topics.store') }}">
        @csrf
        <div class="form-group">
            <label for="add-category-form-title">Заголовок</label>
            <input type="text" name="title" class="form-control" id="add-category-form-title" placeholder="Заголовок" value="{{ old('title') }}">
            <label for="add-category-form-url">Слаг Url</label>
            <input type="text" name="url" class="form-control" id="add-category-form-url" placeholder="Url" value="{{ old('url') }}">
        </div>
        <div class="form-group">
            <label for="add-category-form-state">Статус</label>
            <select class="form-control"  id="add-category-form-state" name="status">
                <option @if(old('status') === 'active') selected @endif>active</option>
                <option @if(old('status') === 'blocked') selected @endif>blocked</option>
            </select>
        </div>
        <div class="form-group">
            <label for="add-category-form-description">Описание</label>
            <textarea name="description" class="form-control" id="add-category-form-description" rows="3">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary mb-2 mt-2">Создать</button>
        </div>
    </form>
@endsection
