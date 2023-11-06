@extends('adminlte::page')

@section('title', 'Сопутствующие бренды')

@section('content_header')
    <h1>Сопутствующие бренды {{ $brand->name }}</h1>
@stop

@section('content')
    @include('flash-message')
    <a href="{{ url('/brands') }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>

    <form method="POST" action="{{ url('/brands/' . $brandId . '/update-recomended-brands') }}" accept-charset="UTF-8" class="form-horizontal">
        <br>    
        {{ csrf_field() }}
        <div class="row">
            <div class="form-group col-md-4">
                <select class="js-example-basic-single" name="recomended_brand_id" id="recomended_brand_id" style="position: relative;">
                    @foreach($brands as $key => $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
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
            @foreach($recomendedBrands as $item)
                <tr>
                    <td data-brand-id="{{ $item->id }}" data-recomended-brand-id="{{ $brandId }}">{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <form method="POST" action="{{ url('/brands/' . $brandId . '/delete-recomended-brands' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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
                placeholder: "Бренды"
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
                        url: `/brands/recomended-brands/position-update`,
                        data: { 
                            position: item +1,  
                            brand_id: $(i).find('td:eq(0)').data('brand-id'), 
                            recomended_brand_id: $(i).find('td:eq(0)').data('recomended-brand-id')
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