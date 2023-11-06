@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    @include('flash-message')
    Панель администратора сайта {{ $currentLocalization != null ? $currentLocalization->locale_name : 'Вам необходимо добавить домен'}}
@stop
