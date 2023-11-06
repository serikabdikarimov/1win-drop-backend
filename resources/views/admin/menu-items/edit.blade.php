@extends('adminlte::page')

@section('title', 'Редактирование меню')

@section('content_header')
    <h1>Редактирование меню</h1>
@stop

@section('content')
    <a href="{{ url('/admin/menu-items') }}{{ !empty(request('parent_id')) ? '?parent_id='. request('parent_id') : ''}}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <br />
    <br />

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/admin/menu-items/' . $menuitem->id) }}{{ !empty(request('parent_id')) ? '?parent_id='. request('parent_id') : ''}}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        @include ('admin.menu-items.form', ['formMode' => 'edit'])

    </form>

@stop

@section('js')
    @include ('admin.file-manager.index')
@stop
