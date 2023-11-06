@extends('adminlte::page')

@section('title', __('labels.default_settings', ['locale_type' => $siteSettings->site_type == 'multi_domain' ? 'доменов' : 'языков']))

@section('content_header')
    <h1>{{__('labels.default_settings', ['locale_type' => $siteSettings->site_type == 'multi_domain' ? 'доменов' : 'языков'])}}</h1>
@stop

@section('content')
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th><th>Наименование</th><th>Robots</th><th>Действия</th>
            </tr>
        </thead>
        <tbody>
        @foreach($localizations  as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td><a href="{{ url('/admin/default-settings/robots/' . $item->id . '/edit') }}" title="Редактировать robots"><button class="btn btn-primary btn-sm"><i class="far fa-edit"></i></button></a></td>
                <td>
                    <a href="{{ url('/admin/default-settings/' . $item->id . '/edit') }}" title="Редактировать домен"><button class="btn btn-primary btn-sm"><i class="far fa-edit"></i></button></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@stop

