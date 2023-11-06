@extends('adminlte::page')

@section('title', 'Добавление автора')

@section('content_header')
    <h1>Добавление автора</h1>
@stop

@section('content')
    <a href="{{ url('/admin/autors') }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <br />
    <br />

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/admin/autors') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}

        @include ('admin.autors.form', ['formMode' => 'create'])

    </form>

@stop
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/themes/sunny/jquery-ui.css">
    <link rel="stylesheet" href="/css/gallery/main.css">
    <link rel="stylesheet" href="/css/admin.css">
@stop

@section('js')
    @include ('admin.file-manager.index')
    <script src="//ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/slq0amhiinquycpwx5yxw091s7a5fpqzzngbim0roe01w73x/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript" src="/js/gallery/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="/js/gallery/gallery.js?v=0.{{mt_rand(1, 100)}}"></script>
    <script type="text/javascript" src="/js/tiny.js"></script>
    <script type="text/javascript" src="/js/add_content.js"></script>
    <script type="text/javascript" src="/js/admin.js"></script>
@stop
