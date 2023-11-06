@extends('adminlte::page')

@section('title', 'Данные сайтов')

@section('content_header')
    <h1>Данные сайтов</h1>
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

    <form method="POST" action="{{ url('/admin/default-settings/robots/' . $domainId . '/update') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('data') ? 'has-error' : ''}}">
            <label for="data" class="control-label">{{ 'Данные robots' }}</label>
            <textarea class="form-control destroy-editor" name="data" id="data" cols="30" rows="10">{{ isset($robots) ? $robots->data : ''}}</textarea>
            {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
        </div>
        
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Обновить">
        </div>        

    </form>
@stop