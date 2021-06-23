@extends('layouts.admin')
@section('title') Список пользователей @parent @stop
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список пользователей</h1>
    </div>
    @if(!empty($errors->any()))
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif
    <table class="table">
        <tr>
            <th>Имя</th>
            <th>Email</th>
            <th>Администратор</th>
            <th>Действия</th>
        </tr>
        @foreach($users as $user)
            <form action="{{ route('user.update', ['user' => $user]) }}" method="post">
                @csrf
                @method('put')
                <tr>
                    <td><input type="text" name="name" value="{{$user->name}}"></td>
                    <td><input type="text" name="email" value="{{$user->email}}"></td>
                    <td>
                        <select name="is_admin">
                            <option @if($user->is_admin) selected @endif value=1>Да</option>
                            <option @if(!$user->is_admin) selected @endif value=0>Нет</option>
                        </select>
                    </td>
                    <td>
                        <input type="submit" value="Изменить"></td>
                </tr>
            </form>
            </div>
        @endforeach
    </table>

@endsection
