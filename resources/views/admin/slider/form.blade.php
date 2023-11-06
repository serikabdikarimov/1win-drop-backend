<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Заголовок' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($slider->title) ? $slider->title : old('title')}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('subtitle') ? 'has-error' : ''}}">
    <label for="subtitle" class="control-label">{{ 'Подзаголовок' }}</label>
    <input class="form-control" name="subtitle" type="text" id="subtitle" value="{{ isset($slider->subtitle) ? $slider->subtitle : old('subtitle')}}" >
    {!! $errors->first('subtitle', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Активность' }}</label>
    <select class="form-control" name="status" id="status">
        <option value="1" {{ isset($slider->status) && $slider->status == 1 ? 'selected' : ''}}>{{ 'Активен' }}</option>
        <option value="0" {{ isset($slider->status) && $slider->status == 0 ? 'selected' : ''}}>{{ 'Не активен' }}</option>
    </select>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Изображение' }}</label>
    <input id="insertImage" type="text" class="form-control" name="image" value="{{ isset($slider->getImage->url) ? $slider->getImage->url : ''}}" hidden>
    <p><span class="btn btn-warning" onclick="load_file_manager()"><i class="fas fa-cloud-upload-alt"></i> Загрузить</span><span class="btn btn-danger" onclick="deleteImage()"><i class="far fa-trash-alt"></i></span></p>
    <div id="imageContainer" class="col-md-6">
        @if (isset($slider->getImage))
            <img class="img-fluid" src="/storage/uploads/{{ $slider->getImage->url }}">
            {{-- <p class="form-control">/storage/{{ $slider->getImage->url }}</p> --}}
        @endif
    </div>
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ 'Обновить' }}">
</div>
