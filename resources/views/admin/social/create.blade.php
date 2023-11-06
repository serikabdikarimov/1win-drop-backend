@extends('adminlte::page')

@section('title', 'Добавление соц сети')

@section('content_header')
    <h1>Добавление соц сети</h1>
@stop

@section('content')
    @include('flash-message')
    <a href="{{ url('/admin/social') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
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
        {{ csrf_field() }}

        @include ('admin.social.form', ['formMode' => 'create'])

    </form>

@stop
@section('js')
    @include ('admin.file-manager.index')
@stop
