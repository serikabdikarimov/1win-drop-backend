@extends('adminlte::page')

@section('title', 'Редактирование категории галереи')

@section('content_header')
    <h1>Редактирование категории галереи</h1>
@stop

@section('content')
    <a href="{{ url('/gallery-categories') }}{{ request('parent_id') != null ? '?parent_id=' . request('parent_id') : '' }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <br />
    <br />

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/gallery-categories/' . $gallerycategory->id) }}{{ request('parent_id') != null ? '?parent_id=' . request('parent_id') : '' }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        @include ('admin.gallery-categories.form', ['formMode' => 'edit'])

    </form>

@stop
