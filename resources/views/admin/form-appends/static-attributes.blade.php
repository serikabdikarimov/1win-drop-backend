<div class="form-group" data-block-index="{{ $index }}" data-block-name="{{ 'plus_minus' }}">
    <label for="=" class="control-label">Статические атрибуты страницы <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
    <br>
    <input type="text" name="add_content[{{ $index }}][static_attributes][title]"  class="form-control" placeholder="Заголовок">
    <br>
    <div class="plus-minus-add">
        <div class="row">
            <div class="col-md-5">
                <input type="text" name="add_content[{{ $index }}][static_attributes][attribute][]" class="form-control" placeholder="Введите атрибут" required>
            </div>
            <div class="col-md-5">
                <input type="text" name="add_content[{{ $index }}][static_attributes][attribute_item][]"  class="form-control" placeholder="Введите значение" required>
            </div>
            <div class="col-md-2">
                <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span>
            </div>
        </div>
    </div>
    <br>
    <input type="text" name="add_content[{{ $index }}][static_attributes][short_description]"  class="form-control" placeholder="Краткое описание">
    <br>
    <span class="btn btn-primary btn-sm duplicate-plus-minus-block">
        <i class="fa fa-plus" aria-hidden="true"></i> Добавить атрибут
    </span>
</div>