@extends('layouts.admin')
@section('title') Список категорий @parent @stop
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список категорий</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('category.create') }}" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>
        </div>
    </div>
    <div class="list-group">
        @foreach($newsCategories as $category)
            <div class="list-group-item">
                <p class="lead">Категория "{{ $category->title }}"</p>
                <p class="text-muted">{{ $category->description }}.</p>
                <div class="d-flex flex-row">
                <a href="{{ route('category.edit', ['category' => $category]) }}" class="btn btn-secondary">Ред.</a>
                <form action="{{ route('category.destroy', ['category' => $category]) }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger">Удал.</button>
                </form>
                </div>
            </div>
        @endforeach
    </div>

@endsection


