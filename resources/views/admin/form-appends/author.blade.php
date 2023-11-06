<div class="form-group" data-block-index="{{ $index }}" data-block-name="{{ 'author' }}">
    <label class="control-label">Блок автора <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
    <input type="text" class="form-control" name="add_content[{{ $index }}][author][activate]" value="1" hidden>
    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
</div>