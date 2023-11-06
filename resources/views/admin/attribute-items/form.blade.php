<div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Значение для админки" value="{{ isset($attributeitem->name) ? $attributeitem->name : old('name') }}">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('icon') ? 'has-error' : ''}}">
    <label for="icon" class="control-label">{{ 'Иконка' }}</label>

    <input id="insertImage" type="text" class="form-control" name="icon" value="{{ isset($attributeitem->icon) ? $attributeitem->getIcon($attributeitem->slug, $attributeitem->locale_id)->url : '' }}" hidden>
    <p><span class="btn btn-warning" onclick="load_file_manager()"><i class="fas fa-cloud-upload-alt"></i> Загрузить</span><span class="btn btn-danger" onclick="deleteImage()"><i class="far fa-trash-alt"></i></span></p>
    <div id="imageContainer" class="col-md-6">
        @if (isset($attributeitem->icon))
            <img class="img-fluid" src="/storage/uploads/{{ $attributeitem->getIcon($attributeitem->slug, $attributeitem->locale_id)->url }}" style="max-width: 50px">
            {{-- <p class="form-control">/storage/{{ $page->getBanner->url }}</p> --}}
        @endif
    </div>
    {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
</div>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach($localizationList as $item)
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $item->code }}-tab" data-toggle="tab" data-target="#{{ $item->code }}" type="button" role="tab" aria-controls="{{ $item->code }}" aria-selected="true">{{ $item->name }}</button>
        </li>
    @endforeach
</ul>
<br>
<div class="tab-content" id="myTabContent">
    @foreach($localizationList as $item)
        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $item->code }}" role="tabpanel" aria-labelledby="{{ $item->code }}-tab">  
            <div class="form-group {{ $errors->has('title.' . $item->code) ? 'has-error' : ''}}">
                <label for="title_{{ $item->id }}" class="control-label">{{ 'Название атрибута' }}</label>
                <input class="form-control" name="title[{{ $item->code }}]" type="text" id="title_{{ $item->id }}" value="{{ $attributeitem->getTitle($attributeitem->slug, $item->id) != null ? $attributeitem->getTitle($attributeitem->slug, $item->id)->title : old('title.' . $item->code)}}" >
                {!! $errors->first('title.' . $item->code, '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    @endforeach
</div>
<div class="form-group">
    <button class="btn btn-success" type="submit">
        Обновить
    </button>
</div>