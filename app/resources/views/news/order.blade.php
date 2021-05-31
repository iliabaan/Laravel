@extends('layouts.main')
@section('title') Заказ @parent @stop
@section('content')
    <div class="m-auto w-75 display-1">
        <h2 class="text-center">Сделать заказ</h2>
        <form action="/addOrder" method="POST" class="d-flex flex-column w-50">
            @csrf
            <label for="name" class="form-control-sm">Ваше имя</label>
            <input type="text" name="name" class="form-control-sm" value="{{ old('name') }}">
            <label for="tel" class="form-control-sm">Телефон</label>
            <input type="tel" name="tel" class="form-control-sm" value="{{ old('tel') }}">
            <label for="email" class="form-control-sm">Email</label>
            <input type="email" name="email" class="form-control-sm" value="{{ old('email') || 'e1@example.com' }}">
            <label for="order" class="form-control-sm">Заказ</label>
            <textarea class="form-control-sm" name="order" id="order">{{ old('order') }}</textarea>
            <button type="input" class="form-control-sm mt-5">Сделать заказ</button>
        </form>
    </div>
@endsection
