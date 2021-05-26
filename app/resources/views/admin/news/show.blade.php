<a href="<?=route('news')?>">На главную</a><br>
<h3><?=$news['name']; ?></h3>
<p>Категория: <?=$news['category']?></p>
<p><?=$news['content']?></p>
// TODO fix
@extends('layouts.admin')
@section('title') Изменение новости @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Измененить новость с id {{ $id }}</h1>
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
@endsection
