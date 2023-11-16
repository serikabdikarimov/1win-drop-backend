@extends('adminlte::page')

@section('title', 'Отзывы')

@section('content_header')
    <h1>Отзывы</h1>
@stop

@section('content')
    @include('flash-message')
    <a href="{{ url('/admin/reviews/create') }}" class="btn btn-success btn-sm" title="Добавить отзыв">
        <i class="fa fa-plus" aria-hidden="true"></i> Добавить
    </a>

    <form method="GET" action="{{ url('/admin/reviews') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
        <select name="status" id="status" class="form-control">
            <option value="">Статус отзыва</option>
            @foreach ($reviewStatuses as $key => $status)
                <option value="{{ $key }}">{{ $status }}</option>
            @endforeach
        </select>
        <select name="page_id" id="page_id" class="form-control">
            <option value="">Выбрать страницу</option>
            @foreach ($pages as $key => $page)
                <option value="{{ $page->id }}">{{ isset($page->name) ? $page->name : 'Нет на pt' }}</option>
            @endforeach
        </select>
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
                    <th>#</th><th>Пользователь</th><th>Бренд</th><th>Оценка</th><th>Статус</th><th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach($reviews as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->getUser->name }}</td>
                    <td>{{ $item->getPage->name }}</td>
                    <td>{{ $item->rating }}</td>
                    <td>{{ $item->reviewStatus() }}</td>
                    <td>
                        <a href="{{ url('/admin/reviews/' . $item->id . '/edit') }}" title="Редактировать отзыв"><button class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Редактировать</button></a>

                        <form method="POST" action="{{ url('/admin/reviews' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Удалить отзыв" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $reviews->appends(['search' => Request::get('search')])->render() !!} </div>
    </div>

@stop
