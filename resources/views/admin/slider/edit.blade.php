@extends('adminlte::page')

@section('title', 'Главный баннер')

@section('content_header')
    <h1>Редактирование главного баннера</h1>
@stop

@section('content')
    <a href="{{ url('/pages') }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <br />
    <br />

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/pages/' . $pageId . '/slider/') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        @include ('admin.slider.form', ['formMode' => 'edit'])

    </form>

@stop
@section('css')
    <link rel="stylesheet" href="/css/gallery/main.css">
@stop

@section('js')
    @include ('admin.file-manager.index')
    <script type="text/javascript" src="/js/gallery/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="/js/gallery/gallery.js?v=0.{{mt_rand(1, 100)}}"></script>
@stop
