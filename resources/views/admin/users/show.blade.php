@extends('adminlte::page')

@section('title', 'Просмотр пользователи')

@section('content_header')
    <h1>Просмотр пользователи #{{ $user->id }}</h1>
@stop

@section('content')

    <a href="{{ url('/users') }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <a href="{{ url('/users/' . $user->id . '/edit') }}" title="Редактировать пользователя"><button class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Редактировать</button></a>

    <form method="POST" action="{{ url('admin/users' . '/' . $user->id) }}" accept-charset="UTF-8" style="display:inline">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger btn-sm" title="Удалить пользователя" onclick="return confirm(&quot;Вы уверены?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Удалить</button>
    </form>
    <br/>
    <br/>

    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th> Имя </th><td> {{ $user->name }} </td>
                </tr>
                <tr>
                    <th> Email </th><td> {{ $user->email }} </td>
                </tr>
                <tr>
                    <th> Фотография </th><td>@if (isset($user->avatar) && $user->avatar != NULL) <img src="/storage/{{ $user->getAvatar->url }}" alt="" class="img-show"> @endif</td>
                </tr>
            </tbody>
        </table>
    </div>
@stop
