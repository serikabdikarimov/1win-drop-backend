<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Наименование' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($menuitem->name) ? $menuitem->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('icon') ? 'has-error' : ''}}">
    <label for="icon" class="control-label">{{ 'icon' }}</label>
    <textarea class="form-control destroy-editor" name="icon" type="text" id="icon">{{ isset($menuitem->icon) ? $menuitem->icon : old('icon')}}</textarea>
    {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
    <label for="is_active" class="control-label">{{ 'Активность' }}</label>
    <select class="form-control" name="is_active" id="is_active">
        <option value="1" {{ isset($menuitem->is_active) && $menuitem->is_active == 1 ? 'selected' : ''}}>{{ 'Активен' }}</option>
        <option value="0" {{ isset($menuitem->is_active) && $menuitem->is_active == 0 ? 'selected' : ''}}>{{ 'Не активен' }}</option>
    </select>
    {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('url') ? 'has-error' : ''}}">
    <label for="url" class="control-label">{{ 'Ссылка (url)' }}</label>
    <input class="form-control" name="url" type="text" id="url" value="{{ isset($menuitem->url) ? $menuitem->url : ''}}" >
    {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group" style="position:relative">
            <label for="page_id" class="control-label">{{ 'Страница' }}</label>
            <select class="form-control js-example-basic-multiple" name="page_id" id="categories" style="position: relative;">
                <option value="">{{ 'Выберите страницу' }}</option>
                @foreach($pages as $key => $page)
                    <option value="{{ $key }}" {{ isset($menuitem) && $key == $menuitem->page_id ? 'selected' : '' }}>{{ $page }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group" style="position:relative">
            <label for="categories" class="control-label">{{ 'Категории меню' }}</label>
            <select class="form-control js-example-basic-multiple" name="categories[]" id="categories" style="position: relative;" multiple>
                @foreach($menuCategories as $key => $category)
                    <option value="{{ $key }}" {{ isset($menuitem) && in_array($key, $menuitem->categories->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $category }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
<br>
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Информация</h3>
    </div>
    <div class="card-body">
        <p><b>{{ 'Наименование' }}</b> - название меню</p>
        <p><b>{{ 'Ссылка' }}</b> - url если это меню ведет на внешний адрес</p>
        <p><b>{{ 'Страница' }}</b> - выбираем страницу на которую должен вести пункт меню</p>
        <p><b>{{ 'Категоряи' }}</b> - выбираем категории меню в которых будет отображаться пункт меню</p>
        <p><b>{{ 'Активность' }}</b> - активность настраивается отдельно для каждого языка</p>
        <p><b>{{ 'Иконка' }}</b> - загружаем или выбираем из списка икнку меню</p>
    </div>
</div>
