<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Наименование' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($gallerycategory->name) ? $gallerycategory->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
    <label for="is_active" class="control-label">{{ 'Статус' }}</label>
    <select name="is_active" id="is_active"  class="form-control">
        @foreach ($status as $key => $item)
            <option value="{{ $key }}" {{ isset($gallerycategory->is_active) && $gallerycategory->is_active == $key ? 'selected' : ''}}>{{ $item }}</option>
        @endforeach
    </select>
    {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
