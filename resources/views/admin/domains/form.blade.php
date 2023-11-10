<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ __('labels.name', ['name' => $siteSettings->site_type == 'multi_domain' ? 'сайта' : 'языка']) }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($domain->name) ? $domain->name : old('name')}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('region_name') ? 'has-error' : ''}}">
    <label for="region_name" class="control-label">{{ 'Название региона' }}</label>
    <input class="form-control" name="region_name" type="text" id="region_name" value="{{ isset($domain->region_name) ? $domain->region_name : old('region_name')}}" required>
    {!! $errors->first('region_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('locale_name') ? 'has-error' : ''}}">
    <label for="locale_name" class="control-label">{{ __('labels.locale_name', ['locale_name' => $siteSettings->site_type == 'multi_domain' ? 'Доменное имя' : 'Slug']) }}</label>
    <input class="form-control" name="locale_name" type="text" id="locale_name" value="{{ isset($domain->locale_name) ? $domain->locale_name : old('locale_name')}}" required>
    {!! $errors->first('locale_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-gro">
    <select name="group_id" id="group_id" class="form-control">
        <option value="">Без сетки</option>
        @foreach ($localizarionGroups as $group)
            <option value="{{ $group->id }}" {{ isset($domain->group_id) && $domain->group_id == $group->id ? 'selected' : '' }}>{{ $group->title }}</option>
        @endforeach
    </select>
</div>

<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    <label for="code" class="control-label">{{ 'Машинное имя' }}</label>
    <input class="form-control" name="code" type="text" id="code" value="{{ isset($domain->code) ? $domain->code : old('code')}}" >
    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
    <label for="is_active" class="control-label">{{ 'Статус' }}</label>
    <select name="is_active" id="is_active"  class="form-control">
        @foreach ($status as $key => $item)
            <option value="{{ $key }}" {{ isset($domain->is_active) && $domain->is_active == $key ? 'selected' : ''}}>{{ $item }}</option>
        @endforeach
    </select>
    {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('icon') ? 'has-error' : ''}}">
    <label for="icon" class="control-label">{{ 'Иконка' }}</label>
    <input id="insertImage" type="text" class="form-control" name="icon" value="{{ isset($domain->getIcon->url) ? $domain->getIcon->url : ''}}" hidden>
    <p><span class="btn btn-warning" onclick="load_file_manager()"><i class="fas fa-cloud-upload-alt"></i> Загрузить</span><span class="btn btn-danger" onclick="deleteImage()"><i class="far fa-trash-alt"></i></span></p>
    <div id="imageContainer" class="col-md-6">
        @if (isset($domain->getIcon))
            <img class="img-fluid" src="/storage/uploads/{{ $domain->getIcon->url }}">
            {{-- <p class="form-control">/storage/{{ $page->getBanner->url }}</p> --}}
        @endif
    </div>
    {!! $errors->first('banner', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
