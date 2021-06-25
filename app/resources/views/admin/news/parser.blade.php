@extends('layouts.admin')
@section('title') Парсинг новостей @parent @stop
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Парсинг новостей</h1>
    </div>
    <table class="table">
        <tr>
            <th>Название</th>
            <th>URL</th>
            <th>Описание</th>
            <th>Действия</th>
        </tr>
        @foreach($sources as $source)
                <tr>
                    <td>{{ $source->title }}</td>
                    <td><a href="{{ $source->url }}" target="_blank">{{ $source->url }}</a></td>
                    <td>{{ $source->description }}</td>
                    <form action="/parser/get_news" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $source->id }}">
                    <td><button type="submit" class="btn-primary btn-parse">Парсинг</button></td>
                    </form>
                </tr>
        @endforeach
    </table>
@endsection

