@extends('adminlte::page')

@section('title', 'Редактирование соц сетей')

@section('content_header')
    <h1>Редактирование соц сетей</h1>
@stop

@section('content')
    @include('flash-message')
    <a href="{{ url('/admin/social') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <br />
    <br />

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/admin/social') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        @include ('admin.social.form', ['formMode' => 'edit'])

    </form>

@stop
@section('js')
    @include ('admin.file-manager.index')
@stop
