@extends('layouts.admin')
@section('title') Список новостей @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{route('news.create')}}" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
            </div>
        </div>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($newsList as $news)

                    <div class="col">
                        <div class="card shadow-sm card-height">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false">
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ \Dotenv\Util\Str::substr($news->title, 0, 30) }}</text>
                            </svg>

                            <div class="card-body">
                                <p class="card-text">{{ \Dotenv\Util\Str::substr($news->title, 0, 42) }}..</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('news.show', $news->id) }}" class="btn btn-sm btn-outline-secondary">См.</a>
                                        <a href="{{ route('news.edit', $news->id) }}" class="btn btn-sm btn-outline-secondary">Изм.</a>
                                        <a href="{{ route('news.destroy', $news->id) }}" class="btn btn-sm btn-danger btn-outline-secondary">Уд.</a>
                                    </div>
                                    <small class="text-muted">Дата добавления: <br> {{ now()->format('d.m.y H:m') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
    @endforeach
@endsection

