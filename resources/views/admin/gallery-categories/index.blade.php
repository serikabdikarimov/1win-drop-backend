@extends('adminlte::page')

@section('title', 'Категории галереи')

@section('content_header')
    <h1>Категории галереи</h1>
@stop

@section('content')
    @include('flash-message')
    @if (request('parent_id') != null)
    <a href="{{ url('/gallery-categories') }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    @endif
    <a href="{{ '/gallery-categories/create' }}{{ request('parent_id') != null ? '?parent_id=' . request('parent_id') : '' }}" class="btn btn-success btn-sm" title="Add New GalleryCategory">
        <i class="fa fa-plus" aria-hidden="true"></i> Добавить
    </a>

    <form method="GET" action="{{ url('/gallery-categories') }}{{ request('parent_id') != null ? '?parent_id=' . request('parent_id') : '' }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                    <th>#</th><th>Наименование</th><th>Подкатегории</th><th>Статус</th><th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach($gallerycategories as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ url('/gallery-categories?parent_id=' . $item->id) }}" title="Edit GalleryCategory Children"><button class="btn btn-primary btn-sm"><i class="far fa-eye"></i></button></a>
                    </td>
                    <td>{{ $item->status() }}</td>
                    <td>
                        <a href="{{ url('/gallery-categories/' . $item->id . '/edit') }}{{ request('parent_id') != null ? '?parent_id=' . request('parent_id') : '' }}" title="Edit GalleryCategory"><button class="btn btn-primary btn-sm"><i class="far fa-edit"></i></button></a>

                        <form method="POST" action="{{ url('/gallery-categories' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete GalleryCategory" onclick="return confirm('Вы уверены?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
@stop
