@extends('adminlte::page')

@section('title', 'Добавление категории меню')

@section('content_header')
    <h1>Добавление категории меню</h1>
@stop

@section('content')
    <a href="{{ url('/admin/menu-categories') }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <br />
    <br />

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/admin/menu-categories') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}

        @include ('admin.menu-categories.form', ['formMode' => 'create'])

    </form>

@stop

@section('js')
    @include ('admin.file-manager.index')
@stop
