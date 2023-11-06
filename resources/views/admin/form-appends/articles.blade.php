<div class="form-group" data-block-index="{{ $index }}" data-block-name="{{ 'articles' }}">
    <label for="=" class="control-label">Статьи <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
    <br>
    <input type="text" name="add_content[{{ $index }}][articles][subtitle]"  class="form-control" placeholder="Подзаголовок">
    <br>
    <input type="text" name="add_content[{{ $index }}][articles][title]"  class="form-control" placeholder="Заголовок" required>
    <br>
    <input type="text" name="add_content[{{ $index }}][articles][short_description]"  class="form-control" placeholder="Краткое описание">
    <br>
</div>