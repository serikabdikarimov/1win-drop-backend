@extends('adminlte::page')

@section('title', __('labels.locale_list', ['locale_list' => $siteSettings->site_type == 'multi_domain' ? 'сайтов' : 'языков']))

@section('content_header')
    <h1>{{ __('labels.locale_list', ['locale_list' => $siteSettings->site_type == 'multi_domain' ? 'сайтов' : 'языков']) }}</h1>
@stop

@section('content')
    @include('flash-message')
    <a href="{{ url('/admin/localizations/create') }}" class="btn btn-success btn-sm" title="Add New Domain">
        <i class="fa fa-plus" aria-hidden="true"></i> Добавить
    </a>

    <form method="GET" action="{{ url('/admin/localizations') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Поиск..." value="{{ request('search') }}">
            <span class="input-group-append">
                <button class="btn btn-secondary" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form>

    <br/>
    <br/>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th><th>Наименовение</th><th>{{ __('labels.locale_name', ['locale_name' => $siteSettings->site_type == 'multi_domain' ? 'Доменное имя' : 'Slug']) }}</th><th>Статус</th><th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach($localizationList  as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td><td>{{ $item->locale_name }}</td><td>{{ $item->status() }}</td>
                    <td>
                        <a href="{{ url('/admin/localizations/' . $item->id . '/edit') }}" title="Редактировать домен"><button class="btn btn-primary btn-sm"><i class="far fa-edit"></i></button></a>

                        <form method="POST" action="{{ url('/admin/localizations' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Удалить домен" onclick="return confirm('Вы уверены?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $domains->appends(['search' => Request::get('search')])->render() !!} </div>
    </div>

@stop
