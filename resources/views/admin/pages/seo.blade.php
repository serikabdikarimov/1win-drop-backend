@extends('adminlte::page')

@section('title', 'SEO страницы')

@section('content_header')
    <h1>SEO страницы {{ $page->name }}</h1>
@stop

@section('content')
    <a href="{{ url('/admin/pages') }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <br />
    <br />
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/admin/pages/' . $page->id . '/update-seo') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('meta_title') ? 'has-error' : ''}}">
            <label for="meta_title" class="control-label">{{ 'Meta title' }}</label>
            <input class="form-control" name="meta_title" type="text" id="meta_title" value="{{ isset($page->meta_title) ? $page->meta_title : old('meta_title')}}" >
            {!! $errors->first('meta_title', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group {{ $errors->has('meta_description') ? 'has-error' : ''}}">
            <label for="meta_description" class="control-label">{{ 'Meta description' }}</label>
            <input class="form-control" name="meta_description" type="text" id="meta_description" value="{{ isset($page->meta_description) ? $page->meta_description : old('meta_description')}}" >
            {!! $errors->first('meta_description', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group {{ $errors->has('meta_keywords') ? 'has-error' : ''}}">
            <label for="meta_keywords" class="control-label">{{ 'Meta keywords' }}</label>
            <input class="form-control" name="meta_keywords" type="text" id="meta_keywords" value="{{ isset($page->meta_keywords) ? $page->meta_keywords : old('meta_keyword')}}" >
            {!! $errors->first('meta_keyword', '<p class="help-block">:message</p>') !!}
        </div>


        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="{{ 'Обновить' }}">
        </div>
    </form>
@stop
