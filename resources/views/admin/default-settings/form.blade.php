<div class="form-group {{ $errors->has('site_name') ? 'has-error' : ''}}">
    <label for="site_name" class="control-label">{{ 'Наввание сайта' }}</label>
    <input class="form-control" name="site_name" type="text" id="site_name" value="{{ isset($defaultsetting->site_name) ? $defaultsetting->site_name : ''}}" >
    {!! $errors->first('site_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Адрес офиса' }}</label>
    <input class="form-control" name="address" type="text" id="address" value="{{ isset($defaultsetting->address) ? $defaultsetting->address : ''}}" >
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
    <label for="logo" class="control-label">{{ 'Логотип' }}</label>
    <input id="insertImage" type="text" class="form-control" name="logo" value="{{ isset($defaultsetting->getLogo->url) ? $defaultsetting->getLogo->url : ''}}" hidden>
    <p><span class="btn btn-warning" onclick="load_file_manager()"><i class="fas fa-cloud-upload-alt"></i> Загрузить</span></p>
    <div id="imageContainer" class="col-md-6">
        @if (isset($defaultsetting->getLogo))
            <img class="img-fluid" src="/storage/uploads/{{ $defaultsetting->getLogo->url }}">
            {{-- <p class="form-control">/storage/{{ $page->getBanner->url }}</p> --}}
        @endif
    </div>
    {!! $errors->first('banner', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Контактный телефон' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($defaultsetting->phone) ? $defaultsetting->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Электронный адрес' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($defaultsetting->email) ? $defaultsetting->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<br>
<br>
<div class="form-group {{ $errors->has('meta_title') ? 'has-error' : ''}}">
    <label for="meta_title" class="control-label">{{ 'Meta title' }}</label>
    <input class="form-control" name="meta_title" type="text" id="meta_title" value="{{ isset($defaultsetting->meta_title) ? $defaultsetting->meta_title : ''}}" >
    {!! $errors->first('meta_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('meta_description') ? 'has-error' : ''}}">
    <label for="meta_description" class="control-label">{{ 'Meta description' }}</label>
    <input class="form-control" name="meta_description" type="text" id="meta_description" value="{{ isset($defaultsetting->meta_description) ? $defaultsetting->meta_description : ''}}" >
    {!! $errors->first('meta_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('meta_keywords') ? 'has-error' : ''}}">
    <label for="meta_keywords" class="control-label">{{ 'Meta keywords' }}</label>
    <input class="form-control" name="meta_keywords" type="text" id="meta_keywords" value="{{ isset($defaultsetting->meta_keywords) ? $defaultsetting->meta_keywords : ''}}" >
    {!! $errors->first('meta_keywords', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
