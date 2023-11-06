<ul class="nav nav-tabs" id="contentTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="main-tab" data-toggle="tab" data-target="#main" type="button" role="tab" aria-controls="main" aria-selected="true">{{ 'Основная информация' }}</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="showcase-tab" data-toggle="tab" data-target="#showcase" type="button" role="tab" aria-controls="showcase" aria-selected="true">{{ 'Витрина' }}</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="sidebar-tab" data-toggle="tab" data-target="#sidebar" type="button" role="tab" aria-controls="sidebar" aria-selected="true">{{ 'Общие сведения' }}</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="rating-tab" data-toggle="tab" data-target="#rating" type="button" role="tab" aria-controls="rating" aria-selected="true">{{ 'Рейтинг' }}</button>
    </li>
</ul>
<br>
<div class="tab-content">
    <div class="tab-pane fade show active" id="main" role="tabpanel" aria-labelledby="main-tab">  
        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            <label for="name" class="control-label">Наименование бренда</label>
            <input id="name" name="name"  class="form-control" placeholder="Введите название бренда" value="{{ isset($brand->name) ? $brand->name : old('name')}}">
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
            <label for="logo" class="control-label">{{ 'Логотип' }}</label>
            <input id="insertImage" type="text" class="form-control load_file_manager" name="logo" value="{{ isset($brand->getLogo->url) ? $brand->getLogo->url : 'asdasdasd'}}" hidden>
            <p><span class="btn btn-warning insert_image" onclick="load_file_manager()"><i class="fas fa-cloud-upload-alt"></i> Загрузить</span><span class="btn btn-danger" onclick="deleteImage()"><i class="far fa-trash-alt"></i></span></p>
            <div id="imageContainer" class="col-md-6">
                @if (isset($brand->getLogo))
                    <img class="img-fluid" src="/storage/uploads/{{ $brand->getLogo->url }}">
                    {{-- <p class="form-control">/storage/{{ $page->getBanner->url }}</p> --}}
                @endif
            </div>
            {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
        </div>
        {{--<div class="form-group {{ $errors->has('custom_logo') ? 'has-error' : ''}}">
            <label for="custom_logo" class="control-label">{{ 'Логотип внутренней страницы' }}</label>
            <input id="insertCustomImage" type="text" class="form-control load_file_manager" name="custom_logo" value="{{ isset($brand->getCustomLogo->url) ? $brand->getCustomLogo->url : 'asdasdasd'}}" hidden>
            <p><span class="btn btn-warning insert_custom_image" onclick="load_file_manager()"><i class="fas fa-cloud-upload-alt"></i> Загрузить</span><span class="btn btn-danger" onclick="deleteCustomImage()"><i class="far fa-trash-alt"></i></span></p>
            <div id="imageCustomContainer" class="col-md-6">
                @if (isset($brand->getCustomLogo))
                    <img class="img-fluid" src="/storage/uploads/{{ $brand->getCustomLogo->url }}">
                    {{-- <p class="form-control">/storage/{{ $page->getBanner->url }}</p> 
                @endif
            </div>
            {!! $errors->first('custom_logo', '<p class="help-block">:message</p>') !!}
        </div> --}}
        <div class="form-group {{ $errors->has('short_description') ? 'has-error' : ''}}">
            <label for="short_description" class="control-label">Краткое описание</label>
            <input id="short_description" name="short_description"  class="form-control" placeholder="Введите краткое описание" value="{{ isset($brand->short_description) ? $brand->short_description : old('short_description')}}">
            {!! $errors->first('short_description', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
            <label for="description" class="control-label">Описание</label>
            <input id="description" name="description"  class="form-control" placeholder="Введите описание" value="{{ isset($brand->description) ? $brand->description : old('description')}}">
            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('promocode') ? 'has-error' : ''}}">
                    <label for="promocode" class="control-label">Промокод</label>
                    <input id="promocode" name="promocode"  class="form-control" placeholder="Введите промокод" value="{{ isset($brand->promocode) ? $brand->promocode : old('promocode')}}">
                    {!! $errors->first('promocode', '<p class="help-block">:message</p>') !!}
                </div> 
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('promocode_text') ? 'has-error' : ''}}">
                    <label for="promocode_text" class="control-label">Текст под промокодом</label>
                    <input id="promocode_text" name="promocode_text"  class="form-control" placeholder="Введите под промокодом" value="{{ isset($brand->promocode_text) ? $brand->promocode_text : old('promocode_text')}}">
                    {!! $errors->first('promocode_text', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('url') ? 'has-error' : ''}}">
                    <label for="url" class="control-label">Ссылка на партнера</label>
                    <input id="url" name="url"  class="form-control" placeholder="Введите ссылку" value="{{ isset($brand->url) ? $brand->url : old('url')}}">
                    {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
            <label for="is_active" class="control-label">{{ 'Статус' }}</label>
            <select class="form-control" name="is_active" id="is_active">
                <option value="1" {{ isset($brand->is_active) && $brand->is_active == 1 ? 'selected' : ''}}>{{ 'Активен' }}</option>
                <option value="0" {{ isset($brand->is_active) && $brand->is_active == 0 ? 'selected' : ''}}>{{ 'Не активен' }}</option>
            </select>
            {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
        </div>

    </div>
    <div class="tab-pane fade" id="showcase" role="tabpanel" aria-labelledby="showcase-tab">  
        
        <div class="form-group {{ $errors->has('subtitle') ? 'has-error' : ''}}">
            <label for="subtitle" class="control-label">Подзаголовок</label>
            <input id="subtitle" name="subtitle"  class="form-control" placeholder="Введите краткое описание" value="{{ isset($brand->subtitle) ? $brand->subtitle : old('subtitle')}}">
            {!! $errors->first('subtitle', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('text_after_button') ? 'has-error' : ''}}">
            <label for="text_after_button" class="control-label">Текст под кнопкой обзор</label>
            <input id="text_after_button" name="text_after_button"  class="form-control" placeholder="Введите краткое описание" value="{{ isset($brand->text_after_button) ? $brand->text_after_button : old('subtitle')}}">
            {!! $errors->first('text_after_button', '<p class="help-block">:message</p>') !!}
        </div>
        
        <div class="can-sort">
            @if(isset($brand->showcase)) 
                @foreach (json_decode($brand->showcase) as $index=>$showcase)
                    @if($brand->checkAttr($showcase->attribute_id, $currentLocalization->id))

                        <div class="form-group">
                            <label for="=" class="control-label">Динамический блок <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
                            <div class="dinamyc-blocks-add">
                                <div class="row">
                                    <div class="col-md-5">
                                        <select name="showcase[{{ $index }}][attribute_id]" id="" class="attribute form-control">
                                            <option value="">{{ 'Выберите значение' }}</option>
                                            @foreach ($attributes as $item)
                                                <option value="{{ $item->slug }}" {{ $showcase->attribute_id ==  $item->slug ? 'selected' : ''}}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="showcase[{{ $index }}][attribute_item_id][]" id="" class="attribute-item form-control" multiple="multiple">
                                            @foreach ($brand->attributeItems($showcase->attribute_id) as $attributeItem)
                                            <option value="{{ $attributeItem->slug }}" {{ in_array($attributeItem->slug, $showcase->attribute_item_id) ? 'selected' : '' }}>{{ $attributeItem->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="col-md-2">
                                        <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            <label class="control-label">Текстовый блок <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
                            <div class="dinamyc-blocks-add">
                                <div class="row">
                                    <div class="col-md-5">
                                        <input name="showcase[{{ $index }}][attribute_id]" id="" class="attribute form-control" placeholder="Введите название атрибута" value="{{ $showcase->attribute_id }}">
                                    </div>
                                    <div class="col-md-5">
                                        <input name="showcase[{{ $index }}][attribute_item_id]" id="" class="attribute-item form-control" placeholder="Введите значение атрибута" value="{{ $showcase->attribute_item_id }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
        
        <div class="add_additional_blocks">
            <span class="btn btn-primary btn-sm add-item" data-block-type="showcase-static-block">
                <i class="fa fa-plus" aria-hidden="true"></i> Статичный блок
            </span>
            <span class="btn btn-primary btn-sm add-item" data-block-type="showcase-dinamyc-block">
                <i class="fa fa-plus" aria-hidden="true"></i> Динамический блок
            </span>
        </div>
    </div>
    <div class="tab-pane fade" id="sidebar" role="tabpanel" aria-labelledby="sidebar-tab">  
        <div class="can-sort">
            @if(isset($brand->sidebar))
                @foreach (json_decode($brand->sidebar) as $index=>$sidebar)
                    @if($brand->checkAttr($sidebar->attribute_id, $currentLocalization->id))
                        <div class="form-group">
                            <label for="=" class="control-label">Динамический блок <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
                            <div class="dinamyc-blocks-add">
                                <div class="row">
                                    <div class="col-md-3">
                                        <select name="sidebar[{{ $index }}][attribute_id]" id="" class="attribute form-control">
                                            <option value="">{{ 'Выберите значение' }}</option>
                                            @foreach ($attributes as $item)
                                                <option value="{{ $item->slug }}" {{ $sidebar->attribute_id ==  $item->slug ? 'selected' : ''}}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="sidebar[{{ $index }}][attribute_item_id][]" id="" class="attribute-item form-control" multiple="multiple">
                                            @foreach ($brand->attributeItems($sidebar->attribute_id) as $attributeItem)
                                                <option value="{{ $attributeItem->slug }}" {{ in_array($attributeItem->slug, $sidebar->attribute_item_id) ? 'selected' : '' }}>{{ $attributeItem->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input name="sidebar[{{ $index }}][comment]" id="" class="form-control" placeholder="Количество" value="{{ isset($sidebar->comment) ? $sidebar->comment : '' }}">
                                        </select>
                                    </div>
                                    {{-- <div class="col-md-2">
                                        <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            <label class="control-label">Текстовый блок <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
                            <div class="dinamyc-blocks-add">
                                <div class="row">
                                    <div class="col-md-5">
                                        <input name="sidebar[{{ $index }}][attribute_id]" id="" class="attribute form-control" placeholder="Введите название атрибута" value="{{ $sidebar->attribute_id }}">
                                    </div>
                                    <div class="col-md-5">
                                        <input name="sidebar[{{ $index }}][attribute_item_id]" id="" class="attribute-item form-control" placeholder="Введите значение атрибута" value="{{ $sidebar->attribute_item_id }}">
                                    </div>
                                    {{-- <div class="col-md-2">
                                        <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
        
        <div class="add_additional_blocks">
            <span class="btn btn-primary btn-sm add-item" data-block-type="sidebar-static-block">
                <i class="fa fa-plus" aria-hidden="true"></i> Статичный блок
            </span>
            <span class="btn btn-primary btn-sm add-item" data-block-type="sidebar-dinamyc-block">
                <i class="fa fa-plus" aria-hidden="true"></i> Динамический блок
            </span>
        </div>
    </div>
    <div class="tab-pane fade" id="rating" role="tabpanel" aria-labelledby="rating-tab">  
        <div class="can-sort">
            @if(isset($brand->rating)) 
                @foreach (json_decode($brand->rating) as $index=>$rating)
                    @if($brand->checkAttr($rating->attribute_id, $currentLocalization->id))
                        <div class="form-group">
                            <label for="=" class="control-label">Динамический блок <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
                            <div class="dinamyc-blocks-add">
                                <div class="row">
                                    <div class="col-md-5">
                                        <select name="rating[{{ $index }}][attribute_id]" id="" class="attribute form-control">
                                            <option value="">{{ 'Выберите значение' }}</option>
                                            @foreach ($attributes as $item)
                                                <option value="{{ $item->slug }}" {{ $rating->attribute_id ==  $item->slug ? 'selected' : ''}}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="rating[{{ $index }}][attribute_item_id][]" id="" class="attribute-item form-control" multiple="multiple">
                                            @foreach ($brand->attributeItems($rating->attribute_id) as $attributeItem)
                                            <option value="{{ $attributeItem->slug }}" {{ in_array($attributeItem->slug, $rating->attribute_item_id) ? 'selected' : '' }}>{{ $attributeItem->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="col-md-2">
                                        <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            <label class="control-label">Текстовый блок <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
                            <div class="dinamyc-blocks-add">
                                <div class="row">
                                    <div class="col-md-5">
                                        <input name="rating[{{ $index }}][attribute_id]" id="" class="attribute form-control" placeholder="Введите название атрибута" value="{{ $rating->attribute_id }}">
                                    </div>
                                    <div class="col-md-5">
                                        <input name="rating[{{ $index }}][attribute_item_id]" id="" class="attribute-item form-control" placeholder="Введите значение атрибута" value="{{ $rating->attribute_item_id }}">
                                    </div>
                                    {{-- <div class="col-md-2">
                                        <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
        <div class="add_additional_blocks">
            <span class="btn btn-primary btn-sm add-item" data-block-type="rating-static-block">
                <i class="fa fa-plus" aria-hidden="true"></i> Статичный блок
            </span>
            <span class="btn btn-primary btn-sm add-item" data-block-type="rating-dinamyc-block">
                <i class="fa fa-plus" aria-hidden="true"></i> Динамический блок
            </span>
        </div>
    </div>
</div>
<br>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
<br>
@if ($formMode === 'edit')
    <div class="form-group">
        <select class="form-control js-example-basic-multiple-lang" name="select_language" id="select-languages" multiple>
            @foreach($localizationList as $item)
                <option value="{{ $item->code }}" {{ $item->code == $currentLocalization->code ? 'disabled' : '' }}>{{ $item->domain_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <span id="copy-page" class="btn btn-success" data-copy-type="page" data-page-id="{{ $brand->id }}" data-page-lang="{{$currentLocalization->code}}">
            <i class="far fa-copy"></i> Создать копию
        </span>
    </div>
@endif
<br>
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Информация</h3>
    </div>
    <div class="card-body">
        <p><b>{{ 'Динамический контент:' }}</b></p>
        <p><b>{{ '+Статичный блок' }}</b> - позволяет добавить текстовый блок c 2-мя полями - <i>название атрибута и его значение</i></p>
        <p><b>{{ '+Динамический блок' }}</b> - позволяет добавить блок со списком атрибутов, после выбора атрибутов выводятся его значение (можно выбрать несколько значений)</p>

        <p><b>{{ 'Копирование' }}</b> - эта форма для того чтобы добавить текущие данные на другой язык, для этого выбираем необходимые языки и нажимаем кнопку скопировать</p>
    </div>
</div>

