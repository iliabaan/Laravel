@extends('layouts.main')
@section('title') {{ $news['name'] }} @parent @stop
@section('content')
    <div class="news__block">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                 preserveAspectRatio="xMidYMid slice" focusable="false">
                <rect width="100%" height="100%" fill="#55595c"/>
                <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $news['name'] }}</text>
            </svg>
        <h3>{{ $news['name'] }}</h3>
        <p>Категория: {{ $news['category'] }}</p>
        <p>{{ $news['content'] }}</p>
    </div>
@endsection

