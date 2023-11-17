@extends('adminlte::page')

@section('title', 'Редатирование файла .htaccess')

@section('content_header')
    <h1>Редатирование файла .htaccess</h1>
@stop

@section('content')

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/admin/htaccess') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('htaccess') ? 'has-error' : ''}}">
            <label for="htaccess" class="control-label">{{ 'Данные файла .htaccess' }}</label>
            <textarea class="form-control destroy-editor"  name="htaccess" id="htaccess" cols="30" rows="10">{{ $content }}</textarea>
            {!! $errors->first('htaccess', '<p class="help-block">:message</p>') !!}
        </div>
        
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="{{ 'Обновить' }}">
        </div>
    </form>

@stop
