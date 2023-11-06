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
            <div class="form-group {{ $errors->has('twitter.' . $item->code) ? 'has-error' : ''}}">
                <label for="twitter_{{ $item->id }}" class="control-label">{{ 'twitter' }}</label>
                <input class="form-control" name="twitter[{{ $item->id }}]" type="text" id="twitter_{{ $item->id }}" value="{{ isset($item->getSocials($item->id)->twitter) ? $item->getSocials($item->id)->twitter : ''}}" >
                {!! $errors->first('twitter .' . $item->code , '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('facebook.' . $item->code) ? 'has-error' : ''}}">
                <label for="facebook_{{ $item->id }}" class="control-label">{{ 'facebook' }}</label>
                <input class="form-control" name="facebook[{{ $item->id }}]" type="text" id="facebook_{{ $item->id }}" value="{{ isset($item->getSocials($item->id)->facebook) ? $item->getSocials($item->id)->facebook : ''}}" >
                {!! $errors->first('facebook .' . $item->code , '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('telegram.' . $item->code) ? 'has-error' : ''}}">
                <label for="telegram_{{ $item->id }}" class="control-label">{{ 'telegram' }}</label>
                <input class="form-control" name="telegram[{{ $item->id }}]" type="text" id="telegram_{{ $item->id }}" value="{{ isset($item->getSocials($item->id)->telegram) ? $item->getSocials($item->id)->telegram : ''}}" >
                {!! $errors->first('telegram .' . $item->code , '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('youtube.' . $item->code) ? 'has-error' : ''}}">
                <label for="youtube_{{ $item->id }}" class="control-label">{{ 'youtube' }}</label>
                <input class="form-control" name="youtube[{{ $item->id }}]" type="text" id="youtube_{{ $item->id }}" value="{{ isset($item->getSocials($item->id)->youtube) ? $item->getSocials($item->id)->youtube : ''}}" >
                {!! $errors->first('youtube .' . $item->code , '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('instagram.' . $item->code) ? 'has-error' : ''}}">
                <label for="instagram_{{ $item->id }}" class="control-label">{{ 'instagram' }}</label>
                <input class="form-control" name="instagram[{{ $item->id }}]" type="text" id="instagram_{{ $item->id }}" value="{{ isset($item->getSocials($item->id)->instagram) ? $item->getSocials($item->id)->instagram : ''}}" >
                {!! $errors->first('instagram .' . $item->code , '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    @endforeach
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Добавить' }}">
</div>
