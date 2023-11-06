@extends('adminlte::page')

@section('title', 'Категории меню')

@section('content_header')
    <h1>Категории меню</h1>
@stop

@section('content')
    @include('flash-message')
    <a href="{{ url('/admin/menu-categories/create') }}" class="btn btn-success btn-sm" title="Добавить новую категорию меню">
        <i class="fa fa-plus" aria-hidden="true"></i> Добавить
    </a>

    <form method="GET" action="{{ url('/admin/menu-categories') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                    <th>#</th><th>Наименование</th><th>Деиствия</th>
                </tr>
            </thead>
            <tbody>
            @foreach($menucategories as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ url('/admin/menu-categories/' . $item->id . '/edit') }}" title="Редактирование категории меню"><button class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Редактировать</button></a>

                        <form method="POST" action="{{ url('/menu-categories' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Удаление категории меню" onclick="return confirm(&quot;Вы уверены?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $menucategories->appends(['search' => Request::get('search')])->render() !!} </div>
    </div>

@stop
