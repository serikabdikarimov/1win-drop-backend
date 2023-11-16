<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'Пользователь' }}</label>
    <select name="user_id" id="user_id" class="form-control">
        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ isset($review->user_id) && $review->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('page_id') ? 'has-error' : ''}}">
    <label for="page_id" class="control-label">{{ 'Страница' }}</label>
    <select name="page_id" id="page_id" class="form-control">
        @foreach($pages as $page)
            <option value="{{ $page->id }}" {{ isset($review->page_id) && $review->page_id == $page->id ? 'selected' : '' }}>{{ $page->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('page_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
    <label for="message" class="control-label">{{ 'Комментарий' }}</label>
    <textarea class="form-control" rows="5" name="message" type="textarea" id="message" >{{ isset($review->message) ? $review->message : ''}}</textarea>
    {!! $errors->first('text', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('vote') ? 'has-error' : ''}}">
    <label for="vote" class="control-label">{{ 'Оценка' }}</label>
    <select class="form-control" name="vote" id="vote">
        @for($i = 1; $i < 6; $i++)
            <option value="{{ $i }}" {{ isset($review->vote) && $review->vote == $i ? 'selected' : ''}}>{{ $i }}</option>
        @endfor
    </select>
    {!! $errors->first('vote', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('created_at') ? 'has-error' : ''}}">
    <label for="created_at" class="control-label">{{ 'Дата' }}</label>
    <input class="form-control" name="created_at" type="datetime-local" id="created_at" value="{{ isset($review->created_at) ? $review->created_at : ''}}" >
    {!! $errors->first('created_at', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
    <label for="is_active" class="control-label">{{ 'Статус' }}</label>
    <select class="form-control" name="is_active" id="is_active">
        <option value="0" {{ isset($review->is_active) && $review->is_active == 0 ? 'selected' : ''}}>{{ 'На модерации' }}</option>
        <option value="1" {{ isset($review->is_active) && $review->is_active == 1 ? 'selected' : ''}}>{{ 'Отклонен' }}</option>
        <option value="2" {{ isset($review->is_active) && $review->is_active == 2 ? 'selected' : ''}}>{{ 'Активен' }}</option>
    </select>
    {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
