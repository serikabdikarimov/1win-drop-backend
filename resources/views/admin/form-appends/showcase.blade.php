<div class="form-group" data-block-index="{{ $index }}" data-block-name="{{ 'showcase' }}">
    <label for="=" class="control-label">Блок витрины <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
    <div class="brands-add">
        <div class="row">
            <div class="col-md-4">
                <select class="form-control js-example-basic-single" name="add_content[{{ $index }}][showcase][]">
                    @include('admin.form-appends.brands')
                </select>
            </div>
            <div class="col-md-1">
                <span class="error" data-trigger="last" data-target="delete-item"><i class="far fa-trash-alt"></i></span>
            </div>
        </div>
    </div>
    <br>
    <span  class="btn btn-primary btn-sm duplicate-block">
        <i class="fa fa-plus" aria-hidden="true"></i> Добавить бренд
    </span>
</div>