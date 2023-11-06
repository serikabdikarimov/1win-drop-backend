@extends('adminlte::page')

@section('title', 'Бренды')

@section('content_header')
    <h1>Бренды</h1>
@stop

@section('content')
    @include('flash-message')
    <a href="{{ url('/admin/brands/create') }}" class="btn btn-success btn-sm" title="Добавить бренд">
        <i class="fa fa-plus" aria-hidden="true"></i> Добавить
    </a>

    <form method="GET" action="{{ url('/admin/brands') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                    <th>#</th><th>Наименование</th><th>Сопутствующие бренды</th><th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach($brands as $brand)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $brand->name }}</td>
                    <td><a href="{{ url('/admin/brands/' . $brand->id . '/recomended-brands') }}" title="Редактирование страницы бренда"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Редактировать</button></a></td>
                    <td>
                        <a href="/admin/brands/{{ $brand->slug }}/edit" data-page-id="{{ $brand->slug }}" class="btn btn-success btn-sm edit-page" style="max-height: 100%; padding-left: 12px; padding-top: 6px; padding-right: 12px; padding-bottom: 6px; font-size: 16px;">
                            <i class="fa fa-edit"></i>
                        </a>

                        <form method="POST" action="{{ url('/admin/brands' . '/' . $brand->slug) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Удалить бренд" onclick="return confirm(&quot;Confirm delete?&quot;)" style="max-height: 100%; padding-left: 12px; padding-top: 6px; padding-right: 12px; padding-bottom: 6px; font-size: 16px;"><i class="fa fa-trash" aria-hidden="true"></i> Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $brands->appends(['search' => Request::get('search')])->render() !!} </div>
    </div>

@stop
@section('js')
    <script>
        $('.select-language-for-edit').change(function () 
        {   
            let lang = $(this).val();
            let button = $(this).parent().children('span').children('a');
            let id = $(this).parent().children('span').children('a').data('page-id');
            console.log(lang, $(this).parent());
            button.attr("href", '/admin/'+ lang + '/brands/' +id +'/edit');
        });

        $('#select-language').change(function () 
        {   
            let lang = $('#select-language').val();
            $("#create-page").attr("href", '/admin/'+ lang + '/brands/create');
        });
    </script>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin.css">
@stop
