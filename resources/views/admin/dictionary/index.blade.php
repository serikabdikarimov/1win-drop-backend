@extends('adminlte::page')

@section('title', 'Словарь')

@section('content_header')
    <h1>Словарь</h1>
@stop

@section('content')
    @include('flash-message')
    <a href="{{ url('/admin/dictionary/create') }}" class="btn btn-success btn-sm" title="Add New dictionary">
        <i class="fa fa-plus" aria-hidden="true"></i> Добавить
    </a>

    <form method="GET" action="{{ url('/admin/dictionary') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                    <th>#</th><th>Наименование</th><th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach($dictionary as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->code }}</td>
                    <td>
                        <a href="{{ url('/admin/dictionary/' . strtolower($item->uid) . '/edit') }}" title="Edit dictionary"><button class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Редактировать</button></a>

                        <form method="POST" action="{{ url('/admin/dictionary' . '/' . strtolower($item->uid)) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete dictionary" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $dictionary->appends(['search' => Request::get('search')])->render() !!} </div>
    </div>

@stop
