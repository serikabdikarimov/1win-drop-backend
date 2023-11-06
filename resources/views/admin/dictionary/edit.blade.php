@extends('adminlte::page')

@section('title', 'Редактрование словаря')

@section('content_header')
    <h1>Редактрование {{ $dictionary->code }}</h1>
@stop

@section('content')
    @include('flash-message')
    <a href="{{ url('/admin/dictionary') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <br />
    <br />

    <form method="POST" action="{{ url('/admin/dictionary/' . strtolower($dictionary->uid)) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        @include ('admin.dictionary.form', ['formMode' => 'edit'])

    </form>

@stop
