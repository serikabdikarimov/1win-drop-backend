<div class="form-group" data-block-index="{{ $index }}" data-block-name="{{ 'dynamic_attributes' }}">
    <label for="=" class="control-label">Динамические атрибуты <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
    <br>
    <input type="text" name="add_content[{{ $index }}][dynamic_attributes][title]" data-item-name="title" class="form-control" placeholder="Заголовок">
    <br>
    <div class="dinamyc-blocks-add">
        <div class="row">
            <div class="col-md-4">
                <select name="add_content[{{ $index }}][dynamic_attributes][items][0][attribute]" data-item-name="attribute" class="form-control attribute" required>
                    @if ($attributes)
                        <option value="">Выберите атрибут</option>
                    @foreach ($attributes as $key=>$attribute)
                        <option value="{{ $key}}">{{ $attribute }}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-4">
                <select name="add_content[{{ $index }}][dynamic_attributes][items][0][attribute_item][]" data-item-name="attribute_item" class="form-control attribute-item" multiple="multiple" required>
                </select>
            </div>
            <div class="col-md-2">
                <input type="text" name="add_content[{{ $index }}][dynamic_attributes][items][0][static_text]" data-item-name="static_text" class="form-control">
            </div>
            <div class="col-md-2">
                <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span>
            </div>
        </div>
    </div>
    <br>
    <input type="text" name="add_content[{{ $index }}][dynamic_attributes][short_description]" data-item-name="short_description"  class="form-control" placeholder="Краткое описание">
    <br>
    <span class="btn btn-primary btn-sm duplicate-dinamyc-block">
        <i class="fa fa-plus" aria-hidden="true"></i> Добавить атрибут
    </span>
</div>