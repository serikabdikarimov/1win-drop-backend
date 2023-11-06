@extends('adminlte::page')

@section('title', 'Редактирование комментария')

@section('content_header')
    <h1>Редактирование комментария</h1>
@stop

@section('content')
    @include('flash-message')
    <a href="{{ url('/comments') }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <br />
    <br />

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/comments/' . $comment->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        @include ('admin.comments.form', ['formMode' => 'edit'])

    </form>

@stop
