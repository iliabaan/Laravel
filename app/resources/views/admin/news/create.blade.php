@extends('layouts.admin')
@section('title') Добавление новости @parent @stop
@section('content')

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Создать новость</h1>
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
    <form method="post" action="{{ route('news.store') }}">
        @csrf
        @method('post')
        <div class="form-group">
            <label for="category_id">Категория *</label>
            <select class="form-control" name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            @if($errors->has('category_id'))
                <div class="alert alert-danger">
                    @foreach($errors->get('category_id') as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="title">Заголовок *</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            @if($errors->has('title'))
                <div class="alert alert-danger mt-2">
                    @foreach($errors->get('title') as $error)
                        <p class="mb-0">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="image">Логотип</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="form-group">
            <label for="content">Описание *</label>
            <textarea class="form-control" name="content" id="content"> {!! old('content') !!}</textarea>
            @if($errors->has('content'))
                <div class="alert alert-danger mt-2">
                    @foreach($errors->get('content') as $error)
                        <p class="mb-0">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
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
        <button class="btn btn-success" type="submit">Добавить новость</button>
    </form>
@endsection
