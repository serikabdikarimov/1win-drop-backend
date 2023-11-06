@extends('adminlte::page')

@section('title', 'Комментарии')

@section('content_header')
    <h1>Комментарии</h1>
@stop

@section('content')
    @include('flash-message')
    <a href="{{ url('/comments/create') }}" class="btn btn-success btn-sm" title="Добавить комментарий">
        <i class="fa fa-plus" aria-hidden="true"></i> Добавить
    </a>

    <form method="GET" action="{{ url('/comments') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
        <select name="status" id="status" class="form-control">
            <option value="">Статус комментарий</option>
            @foreach ($commentStatuses as $key => $status)
                <option value="{{ $key }}">{{ $status }}</option>
            @endforeach
        </select>
        <select name="post_id" id="post_id" class="form-control">
            <option value="">Выбрать статью</option>
            @foreach ($posts as $key => $post)
                <option value="{{ $post->id }}">{{ $post->getTitle->$language }}</option>
            @endforeach
        </select>
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
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
                    <th>#</th><th>Статья</th><th>Комментарий</th><th>Язык</th><th>Оценка</th><th>Статус</th><th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach($comments as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->getPost->getTitle->$language }}</td>
                    <td>{{ $item->comment }}</td>
                    <td>{{ $item->lang }}</td>
                    <td>{{ $item->rating }}</td>
                    <td>{{ $item->commentStatus() }}</td>
                    <td>
                        <a href="{{ url('/comments/' . $item->id . '/edit') }}" title="Редактрировать комментарий"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button></a>

                        <form method="POST" action="{{ url('/comments' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Удалить коментарий" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $comments->appends(['search' => Request::get('search')])->render() !!} </div>
    </div>

@stop
