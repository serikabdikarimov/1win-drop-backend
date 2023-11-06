<div class="form-group first_showcase">
    <label for="" class="control-label">Блок витрина в начале страницы</label>
    <input style="margin-left: 5px; height:10px; width:10px;" type="checkbox" name="add_showcase_block" {{ isset($page) && $page->showcase ? 'checked' : '' }}>
    @if (isset($page) && $page->showcase)
        <div class="showcase-brands">
            @foreach(json_decode($page->showcase) as $item)
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-control js-example-basic-single" name="first_showcase[]">
                            @include('admin.form-appends.brands', ['item' => $item])
                        </select>
                    </div>
                    <div class="col-md-1">
                        <span class="error" data-trigger="last" data-target="delete-item"><i class="far fa-trash-alt"></i></span>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="showcase-brands">
            @include('admin.form-appends.first_showcase')
        </div>
    @endif
    
    <br>
    <span class="btn btn-primary btn-sm add-brand-showcase">
        <i class="fa fa-plus" aria-hidden="true"></i> Добавить бренд
    </span>
</div>
<div class="form-group  {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name">{{ 'Наименование страницы' }}</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ isset($page->name) ? $page->name : old('name')}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group  {{ $errors->has('slug') ? 'has-error' : ''}}">
    <label for="slug">{{ 'Ссылка страницы' }}</label>
    <input type="text" class="form-control" id="slug" name="slug" value="{{ isset($page->slug) ? $page->slug : old('slug')}}" required>
    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Заголовок' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($page->title) ? $page->title : old('title')}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

{{--<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'Контент' }}</label>
    <textarea class="form-control" rows="10" name="content" type="textarea" id="content" >{{ isset($page->content) ? $page->content : old('content')}}</textarea>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div> --}}
<div class="can-sort">
    @if (isset($page->add_content) && $page->add_content != "null") 
        @foreach (json_decode($page->add_content) as $index=>$blocks)
            @if (key($blocks) == 'block')
                <div class="form-group" data-block-index="{{ $index }}" data-block-name="{{ 'block' }}">
                    <label for="" class="control-label">{{ 'Текстовый блок' }} <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
                    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
                    <input type="text" name="add_content[{{ $index }}][block][title]" class="form-control" placeholder="Заголовок блока" value="{{ $blocks->block->title }}">
                    <br>
                    <input type="text" name="add_content[{{ $index }}][block][subtitle]" class="form-control" placeholder="Подзаголовок блока" value="{{ $blocks->block->subtitle }}">
                    <br>
                    <textarea name="add_content[{{ $index }}][block][content]" class="form-control">{{ $blocks->block->content }}</textarea>
                </div>
            @elseif (key($blocks) == 'showcase')
                <div class="form-group" data-block-index="{{ $index }}" data-block-name="{{ 'showcase' }}">
                    <label for="" class="control-label">Блок витрины <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
                    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
                    <div class="brands-add can-sort-items">
                        @foreach($blocks->showcase as $item)
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-control js-example-basic-single" name="add_content[{{ $index }}][showcase][]">
                                    @include('admin.form-appends.brands', ['item' => $item])
                                </select>
                            </div>
                            <div class="col-md-1">
                                <span class="error" data-trigger="last" data-target="delete-item"><i class="far fa-trash-alt"></i></span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <br>
                    <span class="btn btn-primary btn-sm duplicate-block">
                        <i class="fa fa-plus" aria-hidden="true"></i> Добавить бренд
                    </span>
                </div>
            @elseif (key($blocks) == 'faqs')
                <div class="form-group" data-block-index="{{ $index }}" data-block-name="{{ 'faqs' }}">
                    <label for="" class="control-label">Блок FAQs <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
                    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
                    <div class="faq-add can-sort-items">
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" name="add_content[{{ $index }}][faqs][faqs_title]" class="form-control" placeholder="Заголовок блока" value="{{ isset($blocks->faqs->faqs_title) ? $blocks->faqs->faqs_title : ''}}" required>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" name="add_content[{{ $index }}][faqs][faqs_description]" class="form-control" placeholder="Описание блока" value="{{ isset($blocks->faqs->faqs_description) ? $blocks->faqs->faqs_description : ''}}" >
                                <br>
                            </div>
                        </div>
                        @foreach($blocks as $key=>$question)
                            @foreach($question->question as $key=>$item)
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" name="add_content[{{ $index }}][faqs][question][]" class="form-control" placeholder="Введите вопрос" value="{{ $item }}">
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="add_content[{{ $index }}][faqs][answer][]"  class="form-control" placeholder="Введите ответ" value="{{ $question->answer[$key] }}">
                                </div>
                                <div class="col-md-2">
                                    <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span>
                                </div>
                            </div>
                            @endforeach
                        @endforeach
                    </div>
                    <br>
                    <span class="btn btn-primary btn-sm duplicate-faqs-block">
                        <i class="fa fa-plus" aria-hidden="true"></i> Добавить вопрос
                    </span>
                </div>
            @elseif (key((array)$blocks) == 'plus_minus')
                <div class="form-group" data-block-index="{{ $index }}" data-block-name="{{ 'plus_minus' }}">
                    <label for="" class="control-label">Плюсы и минусы <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
                    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
                    <br>
                    <input type="text" name="add_content[{{ $index }}][plus_minus][title]"  class="form-control" placeholder="Заголовок" value="{{$blocks->plus_minus->title}}">
                    <br>
                    <div class="plus-minus-add can-sort-items">
                        @foreach($blocks->plus_minus->plus as $key=>$plus_minus)
                        <div class="row">
                            <div class="col-md-5">
                                <input type="text" name="add_content[{{ $index }}][plus_minus][plus][]" class="form-control" placeholder="Введите плюс" value="{{ $plus_minus }}">
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="add_content[{{ $index }}][plus_minus][minus][]"  class="form-control" placeholder="Введите минус" value="{{ $blocks->plus_minus->minus[$key] }}">
                            </div>
                            <div class="col-md-2">
                                <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <br>
                    <input type="text" name="add_content[{{ $index }}][plus_minus][short_description]"  class="form-control" placeholder="Краткое описание" value="{{$blocks->plus_minus->short_description}}">
                    <br>
                    <span class="btn btn-primary btn-sm duplicate-plus-minus-block">
                        <i class="fa fa-plus" aria-hidden="true"></i> Добавить плюс и минус
                    </span>
                </div>
            @elseif (key((array)$blocks) == 'recomended_brands')
                <div class="form-group" data-block-index="{{ $index }}" data-block-name="{{ 'recomended_brands' }}">
                    <label for="=" class="control-label">Рекомендуемые казино <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
                    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
                    <br>
                    <input type="text" name="add_content[{{ $index }}][recomended_brands][subtitle]"  class="form-control" placeholder="Подзаголовок" value="{{ $blocks->recomended_brands->subtitle }}">
                    <br>
                    <input type="text" name="add_content[{{ $index }}][recomended_brands][title]"  class="form-control" placeholder="Заголовок" value="{{ $blocks->recomended_brands->title }}">
                    <br>
                    <input type="text" name="add_content[{{ $index }}][recomended_brands][short_description]"  class="form-control" placeholder="Краткое описание" value="{{ $blocks->recomended_brands->short_description }}">
                    <br>
                </div>
            @elseif (key((array)$blocks) == 'articles')
                <div class="form-group" data-block-index="{{ $index }}" data-block-name="{{ 'articles' }}">
                    <label for="=" class="control-label">Статьи <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
                    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
                    <br>
                    <input type="text" name="add_content[{{ $index }}][articles][subtitle]"  class="form-control" placeholder="Подзаголовок" value="{{ $blocks->articles->subtitle }}">
                    <br>
                    <input type="text" name="add_content[{{ $index }}][articles][title]"  class="form-control" placeholder="Заголовок" value="{{ $blocks->articles->title }}">
                    <br>
                    <input type="text" name="add_content[{{ $index }}][articles][short_description]"  class="form-control" placeholder="Краткое описание" value="{{ $blocks->articles->short_description }}">
                    <br>
                </div>
            @elseif (key((array)$blocks) == 'reviews')
                <div class="form-group" data-block-index="{{ $index }}" data-block-name="{{ 'reviews' }}">
                    <label for="=" class="control-label">Отзывы <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
                    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
                    <br>
                    <input type="text" name="add_content[{{ $index }}][reviews][subtitle]"  class="form-control" placeholder="Подзаголовок" value="{{ $blocks->reviews->subtitle }}">
                    <br>
                    <input type="text" name="add_content[{{ $index }}][reviews][title]"  class="form-control" placeholder="Заголовок" value="{{ $blocks->reviews->title }}">
                    <br>
                    <input type="text" name="add_content[{{ $index }}][reviews][short_description]"  class="form-control" placeholder="Краткое описание" value="{{ $blocks->reviews->short_description }}">
                    <br>
                </div>
            @elseif(key((array)$blocks) == 'login')
                @include('admin.form-appends.login')
            @elseif(key((array)$blocks) == 'author')
                @include('admin.form-appends.author')
            @elseif (key((array)$blocks) == 'static_attributes')
             
                <div class="form-group" data-block-index="{{ $index }}" data-block-name="{{ 'static_attributes' }}">
                    <label for="" class="control-label">{{ 'Статические атрибуты страницы' }}<span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
                    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
                    <br>
                        <input type="text" name="add_content[{{ $index }}][static_attributes][title]"  class="form-control" placeholder="Заголовок" value="{{ $blocks->static_attributes->title }}">
                    <br>
                    
                    <div class="plus-minus-add can-sort-items">
                        @foreach($blocks->static_attributes->attribute as $key=>$attribute)
                        <div class="row">
                            <div class="col-md-5">
                                <input type="text" name="add_content[{{ $index }}][static_attributes][attribute][]" class="form-control" placeholder="Введите плюс" value="{{ $attribute }}">
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="add_content[{{ $index }}][static_attributes][attribute_item][]"  class="form-control" placeholder="Введите минус" value="{{ $blocks->static_attributes->attribute_item[$key] }}">
                            </div>
                            <div class="col-md-2">
                                <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <br>
                        <input type="text" name="add_content[{{ $index }}][static_attributes][short_description]"  class="form-control" placeholder="Краткое описание" value="{{ $blocks->static_attributes->short_description }}">
                    <br>
                    <span class="btn btn-primary btn-sm duplicate-plus-minus-block">
                        <i class="fa fa-plus" aria-hidden="true"></i> Добавить атрибут
                    </span>
                </div>
            @elseif(key((array)$blocks) == 'dynamic_attributes')
                <div class="form-group" data-block-index="{{ $index }}" data-block-name="{{ 'dynamic_attributes' }}">
                    <label for="=" class="control-label">Динамические атрибуты <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span></label>
                    <div style="float: right; cursor:pointer"><i class="fas fa-arrow-up go-up"></i><i class="fas fa-arrow-down go-down"></i></div>
                    <br>
                    <input type="text" name="add_content[{{ $index }}][dynamic_attributes][title]"  class="form-control" placeholder="Заголовок" value="{{ $blocks->dynamic_attributes->title }}">
                    <br>
                    <div class="dinamyc-blocks-add">
                        @php
                            $i= 0;
                        @endphp
                        @foreach($blocks->dynamic_attributes->items as $key=>$attributes)
                        @php
                            $i++;
                        @endphp
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="add_content[{{ $index }}][dynamic_attributes][items][{{$i}}][attribute]" data-item-name="attribute" class="form-control attribute" required>
                                        @if ($allAttributes)
                                            <option value="">Выберите атрибут</option>
                                            @foreach ($allAttributes as $attributeKey=>$soloAttribute)
                                                <option value="{{ $attributeKey }}" {{ isset($attributes) && $attributes->attribute == $attributeKey ? 'selected' : ''}}>{{ $soloAttribute }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="add_content[{{ $index }}][dynamic_attributes][items][{{$i}}][attribute_item][]" data-item-name="attribute_item" class="form-control attribute-item" multiple required>
                                        @foreach ($page->getAttributItemsByAttr($attributes->attribute) as $attributeItemKey=>$soloAttributeItem)
                                            <option value="{{ $attributeItemKey }}" {{ in_array($attributeItemKey, $attributes->attribute_item) ? 'selected' : ''}}>{{ $soloAttributeItem }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="add_content[{{ $index }}][dynamic_attributes][items][{{$i}}][static_text]" data-item-name="static_text" class="form-control" value="{{ $attributes->static_text }}">
                                </div>
                                <div class="col-md-2">
                                    <span class="error" data-target="delete-item"><i class="far fa-trash-alt"></i></span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    <input type="text" name="add_content[{{ $index }}][dynamic_attributes][short_description]"  class="form-control" placeholder="Краткое описание" value="{{ $blocks->dynamic_attributes->short_description }}">
                    <br>
                    <span class="btn btn-primary btn-sm duplicate-dinamyc-block">
                        <i class="fa fa-plus" aria-hidden="true"></i> Добавить атрибут
                    </span>
                </div>
            @endif
        @endforeach
    @endif
</div>

<div class="add_additional_blocks">
    <span onclick="addBlock('text-block')" class="btn btn-primary btn-sm">
        <i class="fa fa-plus" aria-hidden="true"></i> Тектовый блок
    </span>
    <span onclick="addBlock('showcase')" class="btn btn-primary btn-sm">
        <i class="fa fa-plus" aria-hidden="true"></i> Витрина
    </span>
    <span onclick="addBlock('faqs')" class="btn btn-primary btn-sm">
        <i class="fa fa-plus" aria-hidden="true"></i> Вопрос ответ
    </span>
    <span onclick="addBlock('plus-minus')" class="btn btn-primary btn-sm">
        <i class="fa fa-plus" aria-hidden="true"></i> Плюсы и минусы
    </span>
    <span onclick="addBlock('recomended-brands')" class="btn btn-primary btn-sm">
        <i class="fa fa-plus" aria-hidden="true"></i> Рекомендуемые казино
    </span>
    <span onclick="addBlock('login')" class="btn btn-primary btn-sm">
        <i class="fa fa-plus" aria-hidden="true"></i> Call to action
    </span>
    <span onclick="addBlock('dynamic-attributes')" class="btn btn-primary btn-sm">
        <i class="fa fa-plus" aria-hidden="true"></i> Динамические атрибуты
    </span>
    <span onclick="addBlock('static-attributes')" class="btn btn-primary btn-sm">
        <i class="fa fa-plus" aria-hidden="true"></i> Статические атрибуты
    </span>
    <span onclick="addBlock('reviews')" class="btn btn-primary btn-sm">
        <i class="fa fa-plus" aria-hidden="true"></i> Отзывы
    </span>
    <span onclick="addBlock('author')" class="btn btn-primary btn-sm">
        <i class="fa fa-plus" aria-hidden="true"></i> Автор
    </span>
</div>
<br>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Тип страницы' }}</label>
    <select class="form-control" name="type" id="type">
        @foreach($pageTypes as $key=>$type)
            <option value="{{ $key }}" {{ isset($page->type) && $key == $page->type ? 'selected' : '' }}>{{ $type }}</option>
        @endforeach
    </select>
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('type_content_id') ? 'has-error' : ''}}">
    <label for="type_content_id" class="control-label">{{ 'Выберите сопутсвующий контент' }}</label>
    <select class="form-control" name="type_content_id" id="type_content_id">
        @if (isset($page) && $pageTypeContents != null)
            @foreach($pageTypeContents as $key=>$typeContent)
                <option value="{{ $key }}" {{ $key == $page->type_content_id ? 'selected' : '' }}>{{ $typeContent }}</option>
            @endforeach
        @endif
    </select>
    {!! $errors->first('type_content_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('banner') ? 'has-error' : ''}}">
    <label for="banner" class="control-label">{{ 'Баннер' }}</label>
    <input id="insertImage" type="text" class="form-control" name="banner" value="{{ isset($page->getBanner->url) ? $page->getBanner->url : ''}}" hidden>
    <p><span class="btn btn-warning" onclick="load_file_manager()"><i class="fas fa-cloud-upload-alt"></i> Загрузить</span><span class="btn btn-danger" onclick="deleteImage()"><i class="far fa-trash-alt"></i></span></p>
    <div id="imageContainer" class="col-md-6">
        @if (isset($page->getBanner))
            <img class="img-fluid" src="/storage/uploads/{{ $page->getBanner->url }}">
            {{-- <p class="form-control">/storage/{{ $page->getBanner->url }}</p> --}}
        @endif
    </div>
    {!! $errors->first('banner', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('custom_schema') ? 'has-error' : ''}}">
    <label for="custom_schema" class="control-label">{{ 'Schema' }}</label>
    <textarea class="form-control destroy-editor" name="custom_schema" id="custom_schema" cols="30" rows="10">{{ isset($page->custom_schema) ? $page->custom_schema : old('custom_schema') }}</textarea>
    {!! $errors->first('custom_schema', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('autor_id') ? 'has-error' : ''}}">
    <label for="autor_id" class="control-label">{{ 'Автор' }}</label>
    <select class="form-control" name="autor_id" id="autor_id">
        <option value="">Выберите автора</option>
        @foreach($autors as $autor)
            <option value="{{ $autor->id }}" {{ isset($page->autor_id) && $page->autor_id == $autor->id ? 'selected' : ''}}>{{ $autor->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('autor_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Активность' }}</label>
    <select class="form-control" name="status" id="status">
        <option value="2" {{ isset($page->status) && $page->status == 2 ? 'selected' : ''}}>{{ 'Опубликовано' }}</option>
        <option value="1" {{ isset($page->status) && $page->status == 1 ? 'selected' : ''}}>{{ 'Скоро' }}</option>
        <option value="0" {{ isset($page->status) && $page->status == 0 ? 'selected' : ''}}>{{ 'Нет' }}</option>
    </select>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>

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
        <span id="copy-page" class="btn btn-success" data-copy-type="page" data-page-id="{{ $page->id }}" data-page-lang="{{ $currentLocalization->code }}">
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
        <p><b>{{ 'Наименование страницы' }}</b> - название страницы для админ панели</p>
        <p><b>{{ 'Ссылка страницы' }}</b> - url страницы</p>
        <p><b>{{ 'Заголовок' }}</b> - заголовок страницы H1</p>
        <p><b>{{ 'Контент' }}</b> - контент сайта, текстовый блок с редактором</p>
        <br>
        <p><b>{{ 'Динамический контент:' }}</b></p>
        <p><b>{{ '+Текстовый блок' }}</b> - позволяет добавить на страницу текстовый блок с редактором</p>
        <p><b>{{ '+Витрина' }}</b> - позволяет добавить на страницу витрину, далее при помощи кнопки <b>'+Добавить бренд'</b> можно добавить бренды в витрину</p>
        <p><b>{{ '+Вопрос ответ' }}</b> - позволяет добавить на страницу FAQ блок, далее при помощи кнопки <b>'+Добавить вопрос'</b> можно добавить вопросы и ответы в блок</p>
        <p><b>{{ '+Плюсы и минусы' }}</b> - позволяет добавить на страницу блок 'Плюсы и минусы', далее при помощи кнопки <b>'+Добавить плюс и минус'</b> можно добавить еще строчку в блок</p>
        <br>
        <p><b>{{ 'Тип страницы' }}</b> - При выборе не обычной страницы необходимо выбрать сопутствующий контент (пример если это бренд, то обязательно необходимо выбрать бренд к которому относится страница) </p>
        <p><b>{{ 'Баннер' }}</b> - Баннер страницы</p>

        <p><b>{{ 'Копирование' }}</b> - эта форма для того чтобы добавить текущие данные на другой язык, для этого выбираем необходимые языки и нажимаем кнопку скопировать</p>
    </div>

</div>

