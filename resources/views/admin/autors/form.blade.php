<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Имя' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($autor->name) ? $autor->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('post') ? 'has-error' : ''}}">
    <label for="post" class="control-label">{{ 'Должность' }}</label>
    <input class="form-control" name="post" type="text" id="post" value="{{ isset($autor->post) ? $autor->post : old('post')}}" >
    {!! $errors->first('post', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bio') ? 'has-error' : ''}}">
    <label for="bio" class="control-label">{{ 'Краткое описание' }}</label>
    <input class="form-control" name="bio" type="text" id="bio" value="{{ isset($autor->bio) ? $autor->bio : old('bio')}}" >
    {!! $errors->first('bio', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Аватарка' }}</label>
    <input id="insertImage" type="text" class="form-control" name="image" value="{{ isset($autor->getImage->url) ? $autor->getImage->url : ''}}" hidden>
    <p><span class="btn btn-warning" onclick="load_file_manager()"><i class="fas fa-cloud-upload-alt"></i> Загрузить</span></p>
    <div id="imageContainer" class="col-md-6">
        @if (isset($autor->getImage))
            <img class="img-fluid" src="/storage/uploads/{{ $autor->getImage->url }}">
        @endif
    </div>
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('fb') ? 'has-error' : ''}}">
    <label for="fb" class="control-label">{{ 'Fb' }}</label>
    <input class="form-control" name="fb" type="text" id="fb" value="{{ isset($autor->fb) ? $autor->fb : ''}}" >
    {!! $errors->first('fb', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('twitter') ? 'has-error' : ''}}">
    <label for="twitter" class="control-label">{{ 'Twitter' }}</label>
    <input class="form-control" name="twitter" type="text" id="twitter" value="{{ isset($autor->twitter) ? $autor->twitter : ''}}" >
    {!! $errors->first('twitter', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('linkedin') ? 'has-error' : ''}}">
    <label for="linkedin" class="control-label">{{ 'Linkedin' }}</label>
    <input class="form-control" name="linkedin" type="text" id="linkedin" value="{{ isset($autor->linkedin) ? $autor->linkedin : ''}}" >
    {!! $errors->first('linkedin', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
