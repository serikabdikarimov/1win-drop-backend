<div class="form-group">
    <label for="=" class="control-label">Динамический блок <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
    <div class="dinamyc-blocks-add">
        <div class="row">
            <div class="col-md-5">
                <select name="showcase[{{ $index }}][attribute_id]" id="" class="attribute form-control">
                    <option value="">{{ 'Выберите значение' }}</option>
                    @foreach ($attributes as $item)
                        <option value="{{ $item->slug }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5">
                <select name="showcase[{{ $index }}][attribute_item_id][]" id="" class="attribute-item form-control" multiple="multiple">
                </select>
            </div>
            {{-- <div class="col-md-2">
                <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span>
            </div> --}}
        </div>
    </div>
</div>