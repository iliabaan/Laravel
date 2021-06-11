@extends('layouts.main')
@section('title') Новость {{ $news->title }} @parent @stop
@section('content')
    <div class="news__block">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
             xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
             preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="#55595c"/>
            <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $news->title }}</text>
        </svg>
        <div class="mt-5">
            <h3>{{ $news->title }}</h3>
            <p class="text-muted">Категория: {{ $news->category_title }}</p>
            <p class="fs-5">{{ $news->content }}</p>
        </div>
    </div>
    <div class="comments__block m-auto mt-5 w-75">
        <h3 class="px-2">Комментарии</h3>
        <div class="comments">
            @forelse($comments as $comment)
                <div class="bg-light p-1 m-2">
                    <p>Имя: <span class="fw-bold">{{ $comment->user_name }}</span></p>
                <p>Комментарий: {{ $comment->content }}</p>
                <p>Дата: {{ $comment->created_at }}</p>
                </div>
            @empty
                <p>Нет комментариев</p>
            @endforelse
        </div>
        <form action="/addComment" method="post" class="input-group m-auto mt-5 flex-column">
            @csrf
            <input type="hidden" name="id" value="{{ $news->id }}">
            <label for="name">Ваше имя *</label>
            <input type="text" class="form-control-sm" name="name" placeholder="Ваше имя" aria-label="Username" value="{{ @old('name') }}">
            <label for="comment"> Ваш комментарий *</label>
            <textarea name="comment" id="comment" class="row-cols-5 border-2" placeholder="Комментарий" value="{{ @old('comment') }}"></textarea>
            <button type="input" class="form-control-sm bg-white mt-2">Отправить комментарий</button>
        </form>
    </div>
@endsection

