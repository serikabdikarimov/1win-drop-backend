<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Наименование' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($gallery->title) ? $gallery->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach($localizationList as $item)
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $item->code }}-tab" data-toggle="tab" data-target="#{{ $item->code }}" type="button" role="tab" aria-controls="{{ $item->code }}" aria-selected="true">{{ $item->code }}</button>
        </li>
    @endforeach
</ul>
<br>
<div class="tab-content" id="myTabContent">
    @foreach($localizationList as $item)
        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $item->code }}" role="tabpanel" aria-labelledby="{{ $item->code }}-tab">
            <div class="form-group {{ $errors->has('attr_title.' . $item->site_name) ? 'has-error' : ''}}">
                <label for="attr_title_{{ $item->id }}" class="control-label">{{ 'Title (' . $item->code . ')' }}</label>
                <input class="form-control" name="attr_title[{{ $item->code }}]" type="text" id="attr_title_{{ $item->id }}" value="{{ isset($gallery) && $gallery->getTitle($gallery->url, $item->id) != null ? $gallery->getTitle($gallery->url, $item->id) : old('alt.' . $item->code)}}" >
                {!! $errors->first('attr_title.' . $item->code, '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('alt.' . $item->site_name) ? 'has-error' : ''}}">
                <label for="alt_{{ $item->id }}" class="control-label">{{ 'Alt (' . $item->code . ')' }}</label>
                <input class="form-control" name="alt[{{ $item->code }}]" type="text" id="alt_{{ $item->id }}" value="{{ isset($gallery) && $gallery->getAlt($gallery->url, $item->id) != null ? $gallery->getAlt($gallery->url, $item->id) : old('alt.' . $item->code)}}" >
                {!! $errors->first('alt.' . $item->code, '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    @endforeach
</div>
<div class="form-group">
    <label for="width" class="form-label">Width</label>
    <input type="text" class="form-control" name="width" placeholder="Ширина картинки" value="{{ isset($gallery) ? $gallery->width : old('with')}}" >
</div>
<div class="form-group">
    <label id="width" for="height" class="form-label">Height</label>
    <input id="height" type="text" class="form-control" name="height" placeholder="Ширина картинки" value="{{ isset($gallery) ? $gallery->height : old('height')}}" >
</div>
<div class="form-group">
    <label for="gallery_categories" class="label-control">Категория</label>
    <select name="gallery_categories[]" id="gallery_categories" class="form-control js-example-basic-multiple" multiple>
        @foreach($galleryCategories as $item)
            <option value="{{ $item->id }}" {{ isset($gallery) && in_array($item->id, $gallery->categories->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $item->name }}</option>
        @endforeach
    </select>
</div>
@if (isset($gallery->url))
<br>
<div class="form-group">
    <img src="/storage/uploads/{{ $gallery->url }}" alt="" class="img-fluid">
    <p class="form-control">/storage/uploads/{{ $gallery->url }}</p>
</div>
@endif
<div class="form-group">
    <label for="file">{{ $formMode === 'edit' ? 'Заменить изображение' : 'Загрузить изображение' }}</label>
    <input class="form-control" type="file" name="file" id="file">
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
