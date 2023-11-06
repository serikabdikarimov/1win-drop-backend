@extends('adminlte::page')

@section('title', 'Витрина')

@section('content_header')
    <h1>Витрина страницы {{ $page->getTitle->$language }}</h1>
@stop

@section('content')
    @include('flash-message')
    <a href="{{ url('/admin/pages') }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>

    <form method="POST" action="{{ url('/admin/pages/' . $pageId . '/update-showcase') }}" accept-charset="UTF-8" class="form-horizontal">
        <br>    
        {{ csrf_field() }}
        <div class="row">
            <div class="form-group col-md-4">
                <select class="js-example-basic-single" name="brand_id" id="brand_id" style="position: relative;">
                    @foreach($brands as $key => $brand)
                        <option value="{{ $brand->id }}">{{ $brand->getName->$language }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <button class="btn btn-secondary" type="submit">
                    <i class="fas fa-plus"></i> Добавить
                </button>
            </div>
        </div>    
    </form>
    <br>
    <br>

    <div id="for_sort" class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th><th>Наименование</th><th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach($showcases as $item)
                <tr>
                    <td data-brand-id="{{ $item->id }}" data-page-id="{{ $pageId }}">{{ $loop->iteration }}</td>
                    <td>{{ $item->getName->$language }}</td>
                    <td>
                        <form method="POST" action="{{ url('/admin/pages/' . $pageId . '/delete-showcase' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Удалить страницу" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                width: '100%',
                placeholder: "Бренда"
            });
        });

        $("#for_sort tbody").sortable({
            cursor: "move",
            placeholder: "sortable-placeholder",
            update: function( event, ui ) {
                $(".table tbody tr").each((item,i) =>{
                    $(i).find('td:eq(0)').html(item +1)

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'POST',
                        url: `/admin/pages/shocase/position-update`,
                        data: { 
                            position: item +1,  
                            brand: $(i).find('td:eq(0)').data('brand-id'), 
                            page: $(i).find('td:eq(0)').data('page-id')
                        }
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
                    $(this).width($originals.eq(index).width());
                });
                return $helper;
            }
            }).disableSelection();
    </script>
@stop