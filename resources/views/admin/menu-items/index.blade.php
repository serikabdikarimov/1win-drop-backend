@extends('adminlte::page')

@section('title', 'Меню')

@section('content_header')
    <h1>Меню</h1>
@stop

@section('content')
    @include('flash-message')
    @if(!empty(request('parent_id')))
        <a href="{{ url('/admin/menu-items') }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    @endif
    <a href="{{ url('/admin/menu-items/create') }}{{ !empty(request('parent_id')) ? '?parent_id='. request('parent_id') : ''}}" class="btn btn-success btn-sm" title="Добавить новое меню">
        <i class="fa fa-plus" aria-hidden="true"></i> Добавить
    </a>
    
    <form method="GET" action="{{ url('/admin/menu-items') }}" accept-charset="UTF-8" class="form-horizontal" role="search">
        <br>     
        <div class="row">
            <div class="form-group col-md-4">
                <select class="form-control js-example-basic-multiple" name="categories[]" id="categories" style="position: relative;" multiple>
                    @foreach($menuCategories as $key => $category)
                        <option value="{{ $key }}" {{ !empty(request("categories")) && in_array($key, request("categories")) ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
            </div>    
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="search" placeholder="Поиск..." value="{{ request('search') }}">
                @if(!empty(request('parent_id')))
                    <input name='parent_id' type="text" value="{{ request('parent_id') }}" hidden>
                @endif
            </div>
            <div class="form-group col-md-3">
                <button class="btn btn-secondary" type="submit">
                    <i class="fa fa-search"></i> Найти
                </button>
            </div>
        </div>    
    </form>
    <br/>
    <div id="for_sort" class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th><th>Наименование</th><th>Подменю</th><th>Категории</th><th>Страница</th><th>Деиствия</th>
                </tr>
            </thead>
            <tbody>
            @foreach($menuitems as $item)
                <tr>
                    <td data-id="{{$item->id}}">{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td><a href="{{ url('/admin/menu-items?parent_id=' . $item->id) }}" title="Редактировать подменю"><button class="btn btn-info btn-sm"><i class="far fa-edit"></i> Просмотр</button></a></td>
                    <td>
                        @foreach($item->categories->pluck('name') as $category)
                            {{ $category }}{{ $loop->last ? '' : ', ' }}
                        @endforeach
                    </td>
                    <td>{{ $item->page ? $item->page->name : '' }}</td>
                    <td>
                        <a href="{{ url('/admin/menu-items/' . $item->id . '/edit') }}{{ !empty(request('parent_id')) ? '?parent_id='. request('parent_id') : ''}}" title="Редактировать меню"><button class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Редактировать</button></a>

                        <form method="POST" action="{{ url('/menu-items/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Удалить меню" onclick="return confirm(&quot;Вы уверены?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $menuitems->appends(['search' => Request::get('search')])->render() !!} </div>
    </div>

@stop
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            width: '100%',
            placeholder: "Выбор категории"
        });
    });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script>
        $(function() {
            $("#for_sort tbody").sortable({
            cursor: "move",
            placeholder: "sortable-placeholder",
            update: function( event, ui ) {
                $(".table tbody tr").each((item,i) =>{
                    $(i).find('td:eq(0)').html(item +1)
                    let position = $(i).find('td:eq(0)').data('id')
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'POST',
                        url: `/menu-items/position/${position}/update`,
                        data: { position: item +1 }
                    })
                    .done(function( msg ) {
                    });
                });
            },
            helper: function(e, tr)
            {
                var $originals = tr.children();
                var $helper = tr.clone();
                $helper.children().each(function(index)
                {
                   
                // Set helper cell sizes to match the original sizes
                $(this).width($originals.eq(index).width());
                });
                return $helper;
            }
            }).disableSelection();
        });
    </script>
@stop