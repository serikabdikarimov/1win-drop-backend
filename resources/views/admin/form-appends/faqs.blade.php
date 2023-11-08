<div class="form-group" data-block-index="{{ $index }}" data-block-name="{{ 'faqs' }}">
    <label for="=" class="control-label">Блок FAQs <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
    <div class="faq-add">
        <div class="row">
            <div class="col">
                <input type="text" name="add_content[{{ $index }}][faqs][faqs_title]" class="form-control" placeholder="Заголовок блока" value="" required>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="text" name="add_content[{{ $index }}][faqs][faqs_description]" class="form-control" placeholder="Описание блока" value="">
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <input type="text" name="add_content[{{ $index }}][faqs][question][]" class="form-control" placeholder="Введите вопрос" >
            </div>
            <div class="col-md-5">
                <input type="text" name="add_content[{{ $index }}][faqs][answer][]"  class="form-control" placeholder="Введите ответ">
            </div>
            <div class="col-md-2">
                <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span>
            </div>
        </div>
    </div>
    <br>
    <span class="btn btn-primary btn-sm duplicate-faqs-block">
        <i class="fa fa-plus" aria-hidden="true"></i> Добавить вопрос
    </span>
</div>
