@extends('adminlte::page')

@section('title', 'Список партнеров')

@section('content_header')
    <h1>Список партнеров</h1>
@stop

@section('content')
    @include('flash-message')
    <a href="{{ url('/partners/create') }}" class="btn btn-success btn-sm" title="Add New Partner">
        <i class="fa fa-plus" aria-hidden="true"></i> Добавить
    </a>

    <form method="GET" action="{{ url('/partners') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Поиск..." value="{{ request('search') }}">
            <span class="input-group-append">
                <button class="btn btn-secondary" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form>

    <br/>
    <br/>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th><th>Название сайта</th><th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach($partners  as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ url('/partners/' . $item->id . '/edit') }}" title="Редактировать партнера"><button class="btn btn-primary btn-sm"><i class="far fa-edit"></i></button></a>

                        <form method="POST" action="{{ url('/partners' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Удалить партнера" onclick="return confirm('Вы уверены?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop
