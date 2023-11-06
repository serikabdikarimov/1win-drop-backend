<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Наименование' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($menucategory->name) ? $menucategory->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Краткое описание' }}</label>
    <input class="form-control" name="description" type="text" id="description" value="{{ isset($menucategory->description) ? $menucategory->description : ''}}" >
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('icon') ? 'has-error' : ''}}">
    <label for="icon" class="control-label">{{ 'Иконка (код svg)' }}</label>
    <textarea name="icon destroy-editor" id="icon" rows="5" class="form-control">{{ isset($menucategory->icon) ? $menucategory->icon : ''}}</textarea>
    {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
    <label for="is_active" class="control-label">{{ 'Активность' }}</label>
    <select class="form-control" name="is_active" id="is_active">
        <option value="1" {{ isset($menucategory->is_active) && $menucategory->is_active == 1 ? 'selected' : ''}}>{{ 'Активен' }}</option>
        <option value="0" {{ isset($menucategory->is_active) && $menucategory->is_active == 0 ? 'selected' : ''}}>{{ 'Не активен' }}</option>
    </select>
    {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
