@extends('layouts.admin')
@section('title') Ресурсы для парсинга новостей @parent @stop
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ресурсы для парсинга новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('source.create') }}" class="btn btn-sm btn-outline-secondary">Добавить ресурс</a>
        </div>
    </div>
    <table class="table">
        <tr>
            <th>Название</th>
            <th>URL</th>
            <th>Описание</th>
            <th>Категория</th>
            <th>Действия</th>
        </tr>
        @foreach($sources as $source)
            <tr class="align-middle">
                <form action="{{ route('source.update', ['source' => $source]) }}" id="change_form_id_{{ $source->id }}"
                      method="POST">
                    @csrf
                    @method('put')
                    <td style="width: 200px;"><input type="text" name="title" value="{{ $source->title }}"
                                                     class="form-control"></td>
                    <td><input type="text" name="url" value="{{ $source->url }}" class="form-control"></td>
                    <td><input type="text" name="description" value="{{ $source->description }}"
                               class="form-control mb-0"></td>
                    <td>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @if($category->id === $source->category_id) selected @endif>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </td>
                </form>
                <td>
                    <form action="{{ route('source.parse', ['source' => $source]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $source->id }}">
                        <button type="submit" class="btn-primary m-1">Парсинг</button>
                    </form>
                    <div class="d-flex flex-row">
                        <button type="submit" form="change_form_id_{{ $source->id }}" class="btn-light m-1"><span
                                data-feather="check"></span></button>
                        <form action="{{ route('source.destroy', ['source' => $source]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id" value="{{ $source->id }}">
                            <button type="submit" class="btn-danger m-1"><span data-feather="trash"></span></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach

    </table>
@endsection
