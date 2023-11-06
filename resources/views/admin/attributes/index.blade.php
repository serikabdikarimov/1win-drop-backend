@extends('adminlte::page')

@section('title', 'Атрибуты')

@section('content_header')
    <h1>Аттрибуты</h1>
@stop

@section('content')
    @include('flash-message')
    <a href="{{ url('/admin/attributes/create') }}" class="btn btn-success btn-sm" title="Добавить аттрибут">
        <i class="fa fa-plus" aria-hidden="true"></i> Добавить
    </a>

    <form method="GET" action="{{ url('/admin/attributes') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                    <th>#</th><th>Название атрибута</th><th>Значения атрибута</th><th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach($attributes as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                    <a href="{{ url('/admin/attributes/' . strtolower($item->slug) . '/attribute-items') }}" title="Просмотр значений"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Значения</button></a>
                    </td>
                    <td>
                        <a href="{{ url('/admin/attributes/' . strtolower($item->slug) . '/edit') }}" title="Редактировать аттрибут"><button class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Редактировать</button></a>

                        <form method="POST" action="{{ url('/attributes' . '/' . strtolower($item->slug)) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Удалить аттрибут" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $attributes->appends(['search' => Request::get('search')])->render() !!} </div>
    </div>

@stop
