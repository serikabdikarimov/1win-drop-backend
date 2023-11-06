<div class="form-group" data-block-index="{{ $index }}" data-block-name="{{ 'block' }}">
    <label class="control-label">Текстовый блок <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
    <input type="text" name="add_content[{{ $index }}][block][title]" class="form-control" placeholder="Заголовок блока" value="">
    <br>
    <input type="text" name="add_content[{{ $index }}][block][subtitle]" class="form-control" placeholder="Подзаголовок блока" value="">
    <br>
    <textarea name="add_content[{{ $index }}][block][content]" class="form-control">{{ isset($blocks->block) ? $blocks->block : '' }}</textarea>
</div>