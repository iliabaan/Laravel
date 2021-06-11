@extends('layouts.admin')
@section('title') Изменение новости @parent @stop
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Изменить новость "{{ \Dotenv\Util\Str::substr($news->title, 0, 30) }}.."</h1>
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
    <div style="display: flex; flex-direction: column; width: 60%;">
        <textarea cols="40" rows="3">{{ $news->title }}</textarea>
        <button type="button" class="btn btn-sm btn-outline-secondary" style="width: 10em; align-self: flex-end; margin-top: 10px;">Изменить</button>
    </div>
@endsection
