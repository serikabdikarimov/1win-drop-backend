<div class="form-group  {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name">{{ 'Наименование' }}</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ isset($partner->name) ? $partner->name : old('name')}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
    <label for="link" class="control-label">{{ 'Ссылка на парнера' }}</label>
    <input class="form-control" name="link" type="text" id="link" value="{{ isset($partner->link) ? $partner->link : old('link')}}" >
    {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
    <label for="logo" class="control-label">{{ 'Иконка' }}</label>
    <input id="insertImage" type="text" class="form-control" name="logo" value="{{ isset($partner->getLogo->url) ? $partner->getLogo->url : ''}}" hidden>
    <p><span class="btn btn-warning" onclick="load_file_manager()"><i class="fas fa-cloud-upload-alt"></i> Загрузить</span><span class="btn btn-danger" onclick="deleteImage()"><i class="far fa-trash-alt"></i></span></p>
    <div id="imageContainer" class="col-md-6">
        @if (isset($partner->getLogo))
            <img class="img-fluid" src="/storage/uploads/{{ $partner->getLogo->url }}">
            {{-- <p class="form-control">/storage/{{ $page->getBanner->url }}</p> --}}
        @endif
    </div>
    {!! $errors->first('banner', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
