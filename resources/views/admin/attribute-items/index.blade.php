@extends('adminlte::page')

@section('title', 'Значения атрибута')

@section('content_header')
    <h1>Значения атрибута</h1>
@stop

@section('content')
    @include('flash-message')
    <a href="{{ url('/admin/attributes') }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <br/>
    <br/>
    <div>
        <form method="POST" action="{{ url('/admin/attributes/' . strtolower($attributeUid) . '/attribute-items') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Значение для админки" value="{{ old('name') }}">
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('icon') ? 'has-error' : ''}}">
                <label for="icon" class="control-label">{{ 'Иконка' }}</label>
                <input id="insertImage" type="text" class="form-control" name="icon" value="" hidden>
                <p><span class="btn btn-warning" onclick="load_file_manager()"><i class="fas fa-cloud-upload-alt"></i> Загрузить</span><span class="btn btn-danger" onclick="deleteImage()"><i class="far fa-trash-alt"></i></span></p>
                <div id="imageContainer" class="col-md-6">
                </div>
                {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach($localizationList as $item)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $item->code }}-tab" data-toggle="tab" data-target="#{{ $item->code }}" type="button" role="tab" aria-controls="{{ $item->code }}" aria-selected="true">{{ $item->site_name }}</button>
                    </li>
                @endforeach
            </ul>
            <br>
            <div class="tab-content" id="myTabContent">
                @foreach($localizationList as $item)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $item->code }}" role="tabpanel" aria-labelledby="{{ $item->code }}-tab">  
                        <div class="form-group {{ $errors->has('title.' . $item->code) ? 'has-error' : ''}}">
                            <label for="title_{{ $item->id }}" class="control-label">{{ 'Название атрибута' }}</label>
                            <input class="form-control" name="title[{{ $item->code }}]" type="text" id="title_{{ $item->id }}" value="{{ old('title.' . $item->code)}}" >
                            {!! $errors->first('title.' . $item->code, '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    <i class="fa fa-plus" aria-hidden="true"></i> Добавить
                </button>
            </div>
        </form>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th><th>Название значения</th><th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach($attributeitems as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ url('/admin/attributes/' . strtolower($attributeUid) . '/attribute-items/' . strtolower($item->slug) . '/edit') }}" title="Редактировать значение"><button class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Редактировать</button></a>

                        <form method="POST" action="{{ url('/admin/attributes/' . strtolower($attributeUid) . '/attribute-items/' . strtolower($item->slug)) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Удалить аттрибут" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $attributeitems->appends(['search' => Request::get('search')])->render() !!} </div>
    </div>
@stop

@section('js')
    @include ('admin.file-manager.index')
@stop