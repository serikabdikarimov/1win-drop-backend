<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Имя' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($user->name) ? $user->name : old('name')}}" autocomplete="off">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($user->email) ? $user->email : old('email')}}" autocomplete="off">
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('avatar') ? 'has-error' : ''}}">
    <label for="avatar" class="control-label">{{ 'Аватар' }}</label>
    <input id="insertImage" type="text" class="form-control" name="avatar" value="{{ isset($user->getAvatar->url) ? $user->getAvatar->url : ''}}" hidden>
    <p><span class="btn btn-warning" onclick="load_file_manager()"><i class="fas fa-cloud-upload-alt"></i> Загрузить</span><span class="btn btn-danger" onclick="deleteImage()"><i class="far fa-trash-alt"></i></span></p>
    <div id="imageContainer" class="col-md-6">
        @if (isset($user->getAvatar))
            <img class="img-fluid" src="/storage/uploads/{{ $user->getAvatar->url }}">
            {{-- <p class="form-control">/storage/{{ $page->getBanner->url }}</p> --}}
        @endif
    </div>
    {!! $errors->first('banner', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">{{ 'Пароль' }}</label>
    <input class="form-control" name="password" type="password" id="password" value="" {{ $formMode === 'edit' ? 'disabled' : '' }}>
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
    <label for="password_confirmation" class="control-label">{{ 'Повторите пароль' }}</label>
    <input class="form-control" name="password_confirmation" type="password" id="password_confirmation" value="" {{ $formMode === 'edit' ? 'disabled' : '' }}>
    {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
</div>
@if ($formMode === 'edit')
    <div class="form-group">
        <span id="edit_password" class="btn btn-info" @if($formMode === 'edit') onclick = "editPassword()" @endif>{{ 'Изменить пароль' }}</span>
    </div>
@endif

<div class="form-group {{ $errors->has('role_id') ? 'has-error' : ''}}">
    <label for="role_id" class="control-label">{{ 'Роль пользователя' }}</label>
    <select name="role_id" id="role_id" class="form-control">
        <option value="1" {{ isset($user->role_id) && $user->role_id == 1 ? 'selected' : '' }}>{{ 'Администратор' }}</option>
        <option value="2" {{ isset($user->role_id) && $user->role_id == 2 ? 'selected' : '' }}>{{ 'Контент менеджер' }}</option>
        <option value="3" {{ isset($user->role_id) && $user->role_id == 3 ? 'selected' : '' }}>{{ 'Пользователь' }}</option>
    </select>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
