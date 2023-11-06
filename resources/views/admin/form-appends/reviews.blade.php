<div class="form-group" data-block-index="{{ $index }}" data-block-name="{{ 'reviews' }}">
    <label for="=" class="control-label">Отзывы <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
    <br>
    <input type="text" name="add_content[{{ $index }}][reviews][subtitle]"  class="form-control" placeholder="Подзаголовок">
    <br>
    <input type="text" name="add_content[{{ $index }}][reviews][title]"  class="form-control" placeholder="Заголовок" required>
    <br>
    <input type="text" name="add_content[{{ $index }}][reviews][short_description]"  class="form-control" placeholder="Краткое описание">
    <br>
</div>