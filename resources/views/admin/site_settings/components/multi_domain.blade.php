<div class="input-group mb-3">
    <input name="name" id="name" type="text" value="url('')" class="form-control @error('name') is-invalid @enderror" required>
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
        </div>
    </div>
</div>