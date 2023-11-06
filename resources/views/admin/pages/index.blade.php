@extends('adminlte::page')

@section('title', 'Страницы')

@section('content_header')
    <h1>Страницы</h1>
@stop

@section('content')
    @include('flash-message')
    <a href="{{ url('/admin/pages/create') }}" class="btn btn-success btn-sm" title="Добавить страницу">
        <i class="fa fa-plus" aria-hidden="true"></i> Добавить
    </a>
    

    <form method="GET" action="{{ url('/admin/pages') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
        <select name="status" id="status" class="form-control">
            <option value="">Статус страницы</option>
            @foreach ($pageStatuses as $key => $status)
                <option value="{{ $key }}">{{ $status }}</option>
            @endforeach
        </select>
        <select name="page_type" id="page_type" class="form-control">
            <option value="">Тип страницы</option>
            @foreach ($pageTypes as $key => $type)
                <option value="{{ $key }}">{{ $type }}</option>
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
                    <th>#</th>
                    <th>Наименование</th>
                    <th>Тип</th>
                    <th>Баннер</th>
                    <th>SEO</th>
                    <th>Дата</th>
                    <th>Статус</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $page->name }}</td>
                    <td>{{ $page->pageType() }}</td>
                    <td><a href="{{ url('/admin/pages/' . $page->id . '/slider') }}" title="Редактирование баннера"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a></td>
                    <td><a href="{{ url('/admin/pages/' . $page->id . '/edit-seo') }}" title="Настройка SEO"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a></td>
                    <td>{{ $page->updated_at }}</td>
                    <td>
                        <label class="checkbox-google">
                            <input type="checkbox" class="status_toggle status_update" data-id="{{$page->id}}" data-type="page" {{ $page->status == 2 ? 'checked' : ''}}>
                            <span class="checkbox-google-switch"></span>
                        </label>
                    </td>

                    <td>
                        <a href="{{ url('/admin/pages/' . $page->id . '/edit') }}" title="Редактировать страницу"><button class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Редактировать</button></a>
                        <form method="POST" action="{{ url('/admin/pages/' . $page->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Удалить страницу" onclick="return confirm(&quot;Confirm delete?&quot;)" ><i class="fa fa-trash" aria-hidden="true"></i> Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $pages->appends(['search' => Request::get('search')])->render() !!} </div>
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
            button.attr("href", '/'+ lang + '/admin/pages/' +id +'/edit');
        });

        $('#select-language').change(function () 
        {   
            let lang = $('#select-language').val();
            $("#create-page").attr("href", '/'+ lang + '/admin/pages/create');
        });

        $('.status_update').click(function(e) {
            let dataId = $(this).attr('data-id')
            let dataType = $(this).attr('data-type')
            if ($(this).prop('checked')) {
                $.ajax({
                    method: "POST",
                    url: "/api-update-status",
                    data: { _token: $('meta[name="csrf-token"]').attr('content'), id: dataId, type: dataType, status: 2 },
                    success: () => {}
                })
            } else {
                $.ajax({
                    method: "POST",
                    url: "/api-update-status",
                    data: { _token: $('meta[name="csrf-token"]').attr('content'), id: dataId, type: dataType, status: 0 },
                    success: () => {}
                })
            }
        });

    </script>
@stop
@section('css')
    <link rel="stylesheet" href="/css.css">
@stop
