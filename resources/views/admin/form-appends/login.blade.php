<div class="form-group" data-block-index="{{ $index }}" data-block-name="{{ 'login' }}">
    <label class="control-label">Форма авторизации/регистрации <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
    <div class="login-form">
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="add_content[{{ $index }}][login][play][name]" class="form-control" placeholder="Введите наименование кнопки войти" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="add_content[{{ $index }}][login][play][url]"  class="form-control" placeholder="Введите ссылку входа" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="add_content[{{ $index }}][login][register][name]" class="form-control" placeholder="Введите наименование кнопки регистрации" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="add_content[{{ $index }}][login][register][url]"  class="form-control" placeholder="Введите ссылку регистрации" required>
            </div>
        </div>
    </div>
</div>
