@extends('adminlte::page')

@section('title', 'Данные сайта')

@section('content_header')
    <h1>Данные сайта</h1>
@stop

@section('content')
    <a href="{{ url('/admin/default-settings') }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <br />
    <br />

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/admin/default-settings') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}

        @include ('admin.default-settings.form', ['formMode' => 'create'])

    </form>

@stop

@section('js')
    @include ('admin.file-manager.index')
@stop