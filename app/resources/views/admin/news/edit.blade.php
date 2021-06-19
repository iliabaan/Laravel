@extends('layouts.admin')
@section('title') Изменение новости @parent @stop
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Изменить новость "{{ \Dotenv\Util\Str::substr($news->title, 0, 30) }}.."</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>
    <form method="post" action="{{ route('news.update', ['news' => $news]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="category_id">Категория *</label>
            <select class="form-control" name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                            @if($category->id === $news->category_id) selected @endif>{{ $category->title }}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group">
            <label for="title">Заголовок *</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $news->title }}">
        </div>

        <div class="form-group">
            <label for="image">Логотип</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="form-group">
            <label for="description">Описание *</label>
            <textarea class="form-control" name="content" id="content">{!! $news->content !!}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select class="form-control" name="status" id="status">
                <option>draft</option>
                <option>published</option>
                <option>blocked</option>
            </select>
        </div>
        <br>
        <button class="btn btn-success" type="submit">Редактировать новость</button>
    </form>
@endsection
