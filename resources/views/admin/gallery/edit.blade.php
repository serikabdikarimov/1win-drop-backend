@extends('adminlte::page')

@section('title', 'Редактирование изображения')

@section('content_header')
    <h1>Редактирование изображения</h1>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('content')
    @include('flash-message')
    <a href="{{ url('/gallery') }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <br />
    <br />

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/gallery/' . $gallery->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        @include ('admin.gallery.form', ['formMode' => 'edit'])

    </form>

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
    <script type="text/javascript" src="/js/gallery/gallery.js?v=0.{{mt_rand(1, 100)}}"></script>
@stop
