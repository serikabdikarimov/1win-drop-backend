<div class="form-group {{ $errors->has('site_name') ? 'has-error' : ''}}">
    <label for="site_name" class="control-label">{{ 'Наввание сайта' }}</label>
    <input class="form-control" name="site_name" type="text" id="site_name" value="{{ isset($defaultsetting->locale_name) ? $defaultsetting->site_name : ''}}" >
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
<hr>
<br>
<br>
<p>Настройки авторизации через соц сети</p>
<div class="form-group {{ $errors->has('google_client_id') ? 'has-error' : ''}}">
    <label for="google_client_id" class="control-label">{{ 'Google CLIENT_ID' }}</label>
    <input class="form-control" name="google_client_id" type="text" id="google_client_id" value="{{ isset($defaultsetting->google_client_id) ? $defaultsetting->google_client_id : ''}}" >
    {!! $errors->first('google_client_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('google_client_secret') ? 'has-error' : ''}}">
    <label for="google_client_secret" class="control-label">{{ 'Google CLIENT_SECRET' }}</label>
    <input class="form-control" name="google_client_secret" type="text" id="google_client_secret" value="{{ isset($defaultsetting->google_client_secret) ? $defaultsetting->google_client_secret : ''}}" >
    {!! $errors->first('google_client_secret', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('twitter_client_id') ? 'has-error' : ''}}">
    <label for="twitter_client_id" class="control-label">{{ 'Twitter CLIENT_ID' }}</label>
    <input class="form-control" name="twitter_client_id" type="text" id="twitter_client_id" value="{{ isset($defaultsetting->twitter_client_id) ? $defaultsetting->twitter_client_id : ''}}" >
    {!! $errors->first('twitter_client_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('twitter_api_key') ? 'has-error' : ''}}">
    <label for="twitter_api_key" class="control-label">{{ 'Twitter API_KEY' }}</label>
    <input class="form-control" name="twitter_api_key" type="text" id="twitter_api_key" value="{{ isset($defaultsetting->twitter_api_key) ? $defaultsetting->twitter_api_key : ''}}" >
    {!! $errors->first('twitter_api_key', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('twitter_client_secret') ? 'has-error' : ''}}">
    <label for="twitter_client_secret" class="control-label">{{ 'Twitter CLIENT_SECRET' }}</label>
    <input class="form-control" name="twitter_client_secret" type="text" id="twitter_client_secret" value="{{ isset($defaultsetting->twitter_client_secret) ? $defaultsetting->twitter_client_secret : ''}}" >
    {!! $errors->first('twitter_client_secret', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('facebook_client_id') ? 'has-error' : ''}}">
    <label for="facebook_client_id" class="control-label">{{ 'Facebook CLIENT_ID' }}</label>
    <input class="form-control" name="facebook_client_id" type="text" id="facebook_client_id" value="{{ isset($defaultsetting->facebook_client_id) ? $defaultsetting->facebook_client_id : ''}}" >
    {!! $errors->first('facebook_client_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('facebook_client_secret') ? 'has-error' : ''}}">
    <label for="facebook_client_secret" class="control-label">{{ 'Facebook CLIENT_SECRET' }}</label>
    <input class="form-control" name="facebook_client_secret" type="text" id="facebook_client_secret" value="{{ isset($defaultsetting->facebook_client_secret) ? $defaultsetting->facebook_client_secret : ''}}" >
    {!! $errors->first('facebook_client_secret', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('apple_client_id') ? 'has-error' : ''}}">
    <label for="apple_client_id" class="control-label">{{ 'Apple CLIENT_ID' }}</label>
    <input class="form-control" name="apple_client_id" type="text" id="apple_client_id" value="{{ isset($defaultsetting->apple_client_id) ? $defaultsetting->apple_client_id : ''}}" >
    {!! $errors->first('apple_client_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('apple_client_secret') ? 'has-error' : ''}}">
    <label for="apple_client_secret" class="control-label">{{ 'Apple CLIENT_SECRET' }}</label>
    <input class="form-control" name="apple_client_secret" type="text" id="apple_client_secret" value="{{ isset($defaultsetting->apple_client_secret) ? $defaultsetting->apple_client_secret : ''}}" >
    {!! $errors->first('apple_client_secret', '<p class="help-block">:message</p>') !!}
</div>
{{--
<div class="form-group {{ $errors->has('apple_key_id') ? 'has-error' : ''}}">
    <label for="apple_key_id" class="control-label">{{ 'Apple KEY_ID' }}</label>
    <input class="form-control" name="apple_key_id" type="text" id="apple_key_id" value="{{ isset($defaultsetting->apple_key_id) ? $defaultsetting->apple_key_id : ''}}" >
    {!! $errors->first('apple_key_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('apple_team_id') ? 'has-error' : ''}}">
    <label for="apple_team_id" class="control-label">{{ 'Apple TEAM_ID' }}</label>
    <input class="form-control" name="apple_team_id" type="text" id="apple_team_id" value="{{ isset($defaultsetting->apple_team_id) ? $defaultsetting->apple_team_id : ''}}" >
    {!! $errors->first('apple_team_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('apple_auth_key') ? 'has-error' : ''}}">
    <label for="apple_auth_key" class="control-label">{{ 'Apple AUTH_KEY' }}</label>
    <input class="form-control" name="apple_auth_key" type="text" id="apple_auth_key" value="{{ isset($defaultsetting->apple_auth_key) ? $defaultsetting->apple_auth_key : ''}}" >
    {!! $errors->first('apple_auth_key', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('apple_refresh_token_interval_days') ? 'has-error' : ''}}">
    <label for="apple_refresh_token_interval_days" class="control-label">{{ 'Apple REFRESH_TOKEN_INTERVAL_DAYS' }}</label>
    <input class="form-control" name="apple_refresh_token_interval_days" type="text" id="apple_refresh_token_interval_days" value="{{ isset($defaultsetting->apple_refresh_token_interval_days) ? $defaultsetting->apple_refresh_token_interval_days : ''}}" >
    {!! $errors->first('apple_refresh_token_interval_days', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('apple_client_secret_updated_at') ? 'has-error' : ''}}">
    <label for="apple_client_secret_updated_at" class="control-label">{{ 'Apple CLIENT_SECRET_UPDATED_AT' }}</label>
    <input class="form-control" name="apple_client_secret_updated_at" type="text" id="apple_client_secret_updated_at" value="{{ isset($defaultsetting->apple_client_secret_updated_at) ? $defaultsetting->apple_client_secret_updated_at : ''}}" >
    {!! $errors->first('apple_client_secret_updated_at', '<p class="help-block">:message</p>') !!}
</div> --}}

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
