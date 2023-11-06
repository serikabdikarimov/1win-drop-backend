@extends('adminlte::page')

@section('title', 'Редактирование дизайна')

@section('content_header')
    <h1>Редактирование дизайна</h1>
@stop

@section('content')
    @include('flash-message')
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/admin/design-settings') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        @include ('admin.design-settings.form', ['formMode' => 'edit'])

    </form>
@stop
