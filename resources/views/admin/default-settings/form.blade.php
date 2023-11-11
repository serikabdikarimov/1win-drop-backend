<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('site_name') ? 'has-error' : ''}}">
            <label for="site_name" class="control-label">{{ 'Наввание сайта' }}</label>
            <input class="form-control" name="site_name" type="text" id="site_name" value="{{ isset($defaultsetting->site_name) ? $defaultsetting->site_name : ''}}" >
            {!! $errors->first('site_name', '<p class="help-block">:message</p>') !!}
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

        <div class="form-group {{ $errors->has('lang_icon') ? 'has-error' : ''}}">
            <label for="lang_icon" class="control-label">{{ 'Иконка переключателя языка' }}</label>
            <input type="text" class="form-control lang_icon" data-icon="lang_icon" name="lang_icon" value="{{ isset($defaultsetting->getLangIcon->url) ? $defaultsetting->getLangIcon->url : ''}}" hidden>
            <p><span class="btn btn-warning upload-icon" data-icon="lang_icon" onclick="load_file_manager()"><i class="fas fa-cloud-upload-alt"></i> Загрузить</span></p>
            <div id="lang_icon" class="col-md-6">
                @if (isset($defaultsetting->getLangIcon))
                    <img class="img-fluid" src="/storage/uploads/{{ $defaultsetting->getLangIcon->url }}">
                    {{-- <p class="form-control">/storage/{{ $page->getBanner->url }}</p> --}}
                @endif
            </div>
            {!! $errors->first('lang_icon', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
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
    </div>
</div>
<br>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('favicon_32') ? 'has-error' : ''}}">
            <label for="favicon_32" class="control-label">{{ 'Favicon (32x32)' }}</label>
            <input type="text" class="form-control favicon-32" data-icon="favicon-32" name="favicon_32" value="{{ isset($defaultsetting->getFavicon32->url) ? $defaultsetting->getFavicon32->url : ''}}" hidden>
            <p><span class="btn btn-warning upload-icon" data-icon="favicon-32" onclick="load_file_manager()"><i class="fas fa-cloud-upload-alt"></i> Загрузить</span></p>
            <div id="favicon-32" class="col-md-6">
                @if (isset($defaultsetting->getFavicon32))
                    <img class="img-fluid" src="/storage/uploads/{{ $defaultsetting->getFavicon32->url }}">
                    {{-- <p class="form-control">/storage/{{ $page->getBanner->url }}</p> --}}
                @endif
            </div>
            {!! $errors->first('favicon_32', '<p class="help-block">:message</p>') !!}
        </div>
        <br>
        <div class="form-group {{ $errors->has('favicon_64') ? 'has-error' : ''}}">
            <label for="favicon_64" class="control-label">{{ 'Favicon (64x64)' }}</label>
            <input type="text" class="form-control favicon-64" data-icon="favicon-64" name="favicon_64" value="{{ isset($defaultsetting->getFavicon64->url) ? $defaultsetting->getFavicon64->url : ''}}" hidden>
            <p><span class="btn btn-warning upload-icon" data-icon="favicon-64" onclick="load_file_manager()"><i class="fas fa-cloud-upload-alt"></i> Загрузить</span></p>
            <div id="favicon-64" class="col-md-6">
                @if (isset($defaultsetting->getFavicon64))
                    <img class="img-fluid" src="/storage/uploads/{{ $defaultsetting->getFavicon64->url }}">
                    {{-- <p class="form-control">/storage/{{ $page->getBanner->url }}</p> --}}
                @endif
            </div>
            {!! $errors->first('favicon_64', '<p class="help-block">:message</p>') !!}
        </div>
        <br>
        <div class="form-group {{ $errors->has('favicon_180') ? 'has-error' : ''}}">
            <label for="favicon_180" class="control-label">{{ 'Favicon (180x180)' }}</label>
            <input type="text" class="form-control favicon-180" data-icon="favicon-180" name="favicon_180" value="{{ isset($defaultsetting->getFavicon180->url) ? $defaultsetting->getFavicon180->url : ''}}" hidden>
            <p><span class="btn btn-warning upload-icon" data-icon="favicon-180" onclick="load_file_manager()"><i class="fas fa-cloud-upload-alt"></i> Загрузить</span></p>
            <div id="favicon-180" class="col-md-6">
                @if (isset($defaultsetting->getFavicon180))
                    <img class="img-fluid" src="/storage/uploads/{{ $defaultsetting->getFavicon180->url }}">
                    {{-- <p class="form-control">/storage/{{ $page->getBanner->url }}</p> --}}
                @endif
            </div>
            {!! $errors->first('favicon_180', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('manifest_name') ? 'has-error' : ''}}">
            <label for="manifest_name" class="control-label">{{ 'Manifest name' }}</label>
            <input class="form-control" name="manifest_name" type="text" id="manifest_name" value="{{ isset($defaultsetting->manifest_name) ? $defaultsetting->manifest_name : ''}}" >
            {!! $errors->first('manifest_name', '<p class="help-block">:message</p>') !!}
        </div>
        <br>
        <div class="form-group {{ $errors->has('manifest_short_description') ? 'has-error' : ''}}">
            <label for="manifest_short_description" class="control-label">{{ 'Manifest short description' }}</label>
            <input class="form-control" name="manifest_short_description" type="text" id="manifest_short_description" value="{{ isset($defaultsetting->manifest_short_description) ? $defaultsetting->manifest_short_description : ''}}" >
            {!! $errors->first('manifest_short_description', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('manifest_description') ? 'has-error' : ''}}">
            <label for="manifest_description" class="control-label">{{ 'Manifest description' }}</label>
            <input class="form-control" name="manifest_description" type="text" id="manifest_description" value="{{ isset($defaultsetting->manifest_description) ? $defaultsetting->manifest_description : ''}}" >
            {!! $errors->first('manifest_description', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('manifest_theme_color') ? 'has-error' : ''}}">
            <label for="manifest_theme_color" class="control-label">{{ 'Manifest theme color' }}</label>
            <input class="form-control" name="manifest_theme_color" type="text" id="manifest_theme_color" value="{{ isset($defaultsetting->manifest_theme_color) ? $defaultsetting->manifest_theme_color : ''}}" >
            {!! $errors->first('manifest_theme_color', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('manifest_background_color') ? 'has-error' : ''}}">
            <label for="manifest_background_color" class="control-label">{{ 'Manifest theme color' }}</label>
            <input class="form-control" name="manifest_background_color" type="text" id="manifest_background_color" value="{{ isset($defaultsetting->manifest_background_color) ? $defaultsetting->manifest_background_color : ''}}" >
            {!! $errors->first('manifest_background_color', '<p class="help-block">:message</p>') !!}
        </div>
        <br>
        <div class="form-group {{ $errors->has('manifest_icon_192') ? 'has-error' : ''}}">
            <label for="manifest_icon_192" class="control-label">{{ 'Manifest icon (192x192)' }}</label>
            <input type="text" class="form-control manifest-icon-192" data-icon="manifest-icon-192" name="manifest_192" value="{{ isset($defaultsetting->getManifestIcon192->url) ? $defaultsetting->getManifestIcon192->url : ''}}" hidden>
            <p><span class="btn btn-warning upload-icon" data-icon="manifest-icon-192" onclick="load_file_manager()"><i class="fas fa-cloud-upload-alt"></i> Загрузить</span></p>
            <div id="manifest-icon-192" class="col-md-6">
                @if (isset($defaultsetting->getManifestIcon192))
                    <img class="img-fluid" src="/storage/uploads/{{ $defaultsetting->getManifestIcon192->url }}">
                    {{-- <p class="form-control">/storage/{{ $page->getBanner->url }}</p> --}}
                @endif
            </div>
            {!! $errors->first('manifest_icon_192', '<p class="help-block">:message</p>') !!}
        </div>
        <br>
        <div class="form-group {{ $errors->has('manifest_icon_512') ? 'has-error' : ''}}">
            <label for="manifest_icon_512" class="control-label">{{ 'Manifest icon (512x512)' }}</label>
            <input type="text" class="form-control manifest-icon-512" data-icon="manifest-icon-512" name="manifest_512" value="{{ isset($defaultsetting->getManifestIcon512->url) ? $defaultsetting->getManifestIcon512->url : ''}}" hidden>
            <p><span class="btn btn-warning upload-icon" data-icon="manifest-icon-512" onclick="load_file_manager()"><i class="fas fa-cloud-upload-alt"></i> Загрузить</span></p>
            <div id="manifest-icon-512" class="col-md-6">
                @if (isset($defaultsetting->getManifestIcon512))
                    <img class="img-fluid" src="/storage/uploads/{{ $defaultsetting->getManifestIcon512->url }}">
                    {{-- <p class="form-control">/storage/{{ $page->getBanner->url }}</p> --}}
                @endif
            </div>
            {!! $errors->first('manifest_icon_512', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
