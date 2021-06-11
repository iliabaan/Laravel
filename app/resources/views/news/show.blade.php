@extends('layouts.main')
@section('title') Новость {{ $news['id'] }} @parent @stop
@section('content')
    <div class="news__block">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
             xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
             preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="#55595c"/>
            <text x="50%" y="50%" fill="#eceeef" dy=".3em">Новость {{ $news['id'] }}</text>
        </svg>
        <div class="mt-5">
            <h3>Новость {{ $news['id'] }}</h3>
            <p>Категория: {{ $news['category'] }}</p>
            <p>{{ $news['content'] }}</p>
        </div>
    </div>
    <div class="comments__block m-auto mt-5 w-75">
        <h3>Комментарии</h3>
        <div class="comments">
            @forelse($comments as $comment)
                <p>Имя: {{ $comment['name'] }}</p>
                <p>Комментарий: {{ $comment['content'] }}</p>
                <p>Дата: {{ $comment['date'] }}</p>
            @empty
                <p>Нет комментариев</p>
            @endforelse
        </div>
        <form action="/addComment" method="post" class="input-group m-auto mt-5 flex-column">
            @csrf
            <input type="hidden" name="id" value="{{ $news['id'] }}">
            <label for="name">Ваше имя *</label>
            <input type="text" class="form-control-sm" name="name" placeholder="Ваше имя" aria-label="Username" value="{{ @old('name') }}">
            <label for="comment"> Ваш комментарий *</label>
            <textarea name="comment" id="comment" class="row-cols-5 border-2" placeholder="Комментарий" value="{{ @old('comment') }}"></textarea>
            <button type="input" class="form-control-sm bg-white mt-2">Отправить комментарий</button>
        </form>
    </div>
@endsection

