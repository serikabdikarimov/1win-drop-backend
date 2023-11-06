@extends('adminlte::page')

@section('title', 'Добавление в словарь')

@section('content_header')
    <h1>Добавление в словарь</h1>
@stop

@section('content')
    @include('flash-message')
    <a href="{{ url('/admin/dictionary') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <br />
    <br />

    <form method="POST" action="{{ url('/admin/dictionary') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}

        @include ('admin.dictionary.form', ['formMode' => 'create'])

    </form>

@stop
