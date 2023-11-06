@extends('adminlte::page')

@section('title', 'Подписчики')

@section('content_header')
    <h1>Подписчики</h1>
@stop

@section('content')
    @include('flash-message')   
    <a href="{{ url('/subscribers/create') }}" class="btn btn-success btn-sm" title="Добавить подписчика">
        <i class="fa fa-plus" aria-hidden="true"></i> Добавить
    </a>

    <form method="GET" action="{{ url('/subscribers') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                    <th>#</th><th>Email</th><th>Домен</th><th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach($subscribers as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->email }}</td><td>{{ $item->domain->domain_name }}</td>
                    <td>
                        <form method="POST" action="{{ url('/subscribers' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Удалить подписчика" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $subscribers->appends(['search' => Request::get('search')])->render() !!} </div>
    </div>

@stop
