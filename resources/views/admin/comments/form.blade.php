<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'Пользователь' }}</label>
    <select name="user_id" id="user_id" class="form-control">
        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ isset($comment->user_id) && $comment->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('post_id') ? 'has-error' : ''}}">
    <label for="post_id" class="control-label">{{ 'Статья' }}</label>
    <select name="post_id" id="post_id" class="form-control">
        @foreach($posts as $post)
            <option value="{{ $post->id }}" {{ isset($comment->post_id) && $comment->post_id == $post->id ? 'selected' : '' }}>{{ $post->title }}</option>
        @endforeach
    </select>
    {!! $errors->first('post_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
    <label for="comment" class="control-label">{{ 'Комментарий' }}</label>
    <input class="form-control" name="comment" type="text" id="comment" value="{{ isset($comment->comment) ? $comment->comment : ''}}" >
    {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('rating') ? 'has-error' : ''}}">
    <label for="rating" class="control-label">{{ 'Оценка' }}</label>
    <select class="form-control" name="rating" id="rating">
        @for($i = 1; $i < 6; $i++)
            <option value="{{ $i }}" {{ isset($comment->rating) && $comment->rating == $i ? 'selected' : ''}}>{{ $i }}</option>
        @endfor
    </select>
    {!! $errors->first('rating', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('lang') ? 'has-error' : ''}}">
    <label for="lang" class="control-label">{{ 'Язык' }}</label>
    <select class="form-control" name="lang" id="lang">
        @foreach($languages as $lang)
            <option value="{{ $lang->code }}" {{ isset($comment->lang) && $comment->lang == $lang->code ? 'selected' : ''}}>{{ $lang->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('lang', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Статус' }}</label>
    <select class="form-control" name="status" id="status">
        @foreach ($commentStatuses as $key => $status)
            <option value="{{ $key }}" {{ isset($comment->status) && $comment->status == $key ? 'selected' : ''}}>{{ $status }}</option>
        @endforeach
    </select>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
