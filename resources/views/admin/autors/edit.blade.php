@extends('adminlte::page')

@section('title', 'Редактирование автора')

@section('content_header')
    <h1>Редактирование автора</h1>
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

    <form method="POST" action="{{ url('/admin/autors/' . $autor->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        @include ('admin.autors.form', ['formMode' => 'edit'])

    </form>

@stop
@section('js')
    @include ('admin.file-manager.index')
@stop
