<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    <label for="code" class="control-label">{{ 'Наименование по умолчанию' }}</label>
    @if ($formMode === 'edit')
    <p class="form-control">{{ $dictionary->code }}</p>
    @else
    <input class="form-control" name="code" type="text" id="code" value="{{ isset($dictionary->code) ? $dictionary->code : ''}}" >
    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
    @endif
</div>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach($localizationList as $item)
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $item->code }}-tab" data-toggle="tab" data-target="#{{ $item->code }}" type="button" role="tab" aria-controls="{{ $item->code }}" aria-selected="true">{{ $item->locale_name }}</button>
        </li>
    @endforeach
</ul>
<br>
<div class="tab-content" id="myTabContent">
    @foreach($localizationList as $item)
        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $item->code }}" role="tabpanel" aria-labelledby="{{ $item->code }}-tab">  
            <div class="form-group {{ $errors->has('translate.' . $item->code) ? 'has-error' : ''}}">
                <label for="translate_{{ $item->id }}" class="control-label">{{ 'Значение' }}</label>
                <input class="form-control" name="translate[{{ $item->code }}]" type="text" id="translate_{{ $item->id }}" value="{{ isset($dictionary) && $dictionary->getTranslate($dictionary->uid, $item->id) != null ? $dictionary->getTranslate($dictionary->uid, $item->id)->translate : old('translate.' . $item->code)}}" >
                {!! $errors->first('translate.' . $item->code, '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    @endforeach
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
