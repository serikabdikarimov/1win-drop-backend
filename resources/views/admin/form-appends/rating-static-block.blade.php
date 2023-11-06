<div class="form-group">
    <label class="control-label">Текстовый блок <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
    <div class="dinamyc-blocks-add">
        <div class="row">
            <div class="col-md-5">
                <input name="rating[{{ $index }}][attribute_id]" id="" class="attribute form-control" placeholder="Введите название атрибута">
            </div>
            <div class="col-md-5">
                <input name="rating[{{ $index }}][attribute_item_id]" id="" class="attribute-item form-control" placeholder="Введите значение атрибута">
            </div>
            {{-- <div class="col-md-2">
                <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span>
            </div> --}}
        </div>
    </div>
</div>