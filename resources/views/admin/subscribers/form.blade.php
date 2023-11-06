<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($subscriber->email) ? $subscriber->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('locale_id') ? 'has-error' : ''}}">
    <label for="locale_id" class="control-label">{{ 'Язык' }}</label>
    <select class="form-control" name="locale_id" id="locale_id">
        @foreach($localizationList as $domain)
            <option value="{{ $domain->id }}">{{ $domain->domain_name }}</option>
        @endforeach
    </select>
    {!! $errors->first('locale_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
