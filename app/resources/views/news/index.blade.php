@extends('layouts.main')
@section('title') Все новости @parent @stop
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Новости</h1>
                <p class="lead text-muted">Все новости сайта</p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($newsList as $news)

                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false">
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ \Dotenv\Util\Str::substr($news->title, 0, 40) }}..</text>
                            </svg>

                            <div class="card-body">
                                <p class="card-text text-muted">Категория: {{ $news->category_title }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('news.showNews', ['id' => $news->id]) }}" class="btn btn-sm btn-outline-secondary">Смотреть</a>
                                    </div>
                                    <small class="text-muted">Дата добавления: {{ $news->created_at }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
