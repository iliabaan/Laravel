@extends('layouts.admin')
@section('title') Создать категорию @parent @stop
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Создать категорию</h1>
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
    <form method="post" action="{{ route('category.store')}}">
        @csrf
        @method('post')
        <div class="form-group">
            <label for="title">Наименование категории *</label><br>
            <input type="text" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="description">Описание *</label>
            <input type="text" class="form-control" name="description" id="description">
        </div>
        <br>
        <button class="btn btn-success" type="submit">Создать категорию</button>
    </form>
@endsection
