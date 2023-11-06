function load_file_manager() {
    $('#file-manager-modal').modal('show');
    $('.lazy').lazy();
}
function destroySelect2() {
    $('select.select2-hidden-accessible').select2('destroy');
}
//Индексация блоков
function reIndexBlocks() {
    $('.can-sort .form-group').each(function(index, element) {
        $(element).attr("data-block-index", index);

        //console.log($(element).attr("data-block-name"), findChild.length);
        if ($(element).attr("data-block-name") == "dynamic_attributes") {

            let findChildRow = element.querySelectorAll('.row');

            $(findChildRow).each(function(elKey, childRow) {

                let findChild = childRow.querySelectorAll('.form-control');

                $(findChild).each(function(key, child) {
                    if ($(child).attr("data-item-name") == 'attribute_item') {
                        var modifiedAttributeName = 'add_content['+ index +'][dynamic_attributes][items]['+ elKey +']['+ $(child).attr("data-item-name") +'][]';
                    } else {
                        var modifiedAttributeName = 'add_content['+ index +'][dynamic_attributes][items]['+ elKey +']['+ $(child).attr("data-item-name") +']';
                    }
                    if ($(child).attr("data-item-name") == 'title' || $(child).attr("data-item-name") == 'short_description') {
                        var attributeName = $(child).attr('name');
                        var modifiedAttributeName = attributeName.replace(/\[\d+\]/, '[' + index + ']');
                    }

                    $(child).attr('name', modifiedAttributeName);
                })
            })
            
        } 
        let findChild = element.querySelectorAll('.form-control');
        $(findChild).each(function(key, child) {
            var attributeName = $(child).attr('name');
            var modifiedAttributeName = attributeName.replace(/\[\d+\]/, '[' + index + ']');
            $(child).attr('name', modifiedAttributeName);
        })
    });

    //countBlocks();
}

function countBlocks() {
    console.log($('.can-sort .form-group .form-control').length);
}
function changeSelect() {
    $('select').on('change', function () {
        var el = $(this);
        if ($(el).hasClass("attribute")) {
            $.ajax({
                type: "GET",
                url: '/admin/attribute-items',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'attribute_id' : $(this).val(),
                },
                success: function(options)
                {
                    if (typeof(options) != "undefined" && options !== null) {
                        el.closest('.row').find('.attribute-item').children('option').remove();
                        el.closest('.row').find('.attribute-item').append(options);
                        console.log(options);
                    }
                    selectJs();
                }
            });
        }
       
    });
}
function moveBlocks() {
    $('.go-up').click(function () {
        $("textarea").each(function() { 
            tinymce.execCommand('mceRemoveEditor', 
            false, $(this).attr('id')); 
        });
        destroySelect2();
        console.log($(this).closest('.form-group').attr('data-block-name'));
        console.log($(this).closest('.form-group').attr('data-block-index'));
        let thisEl = $(this).closest('.form-group');
        let prevIndex = parseInt(thisEl.attr('data-block-index')) - 1;
        let prevEl = $("div").find("[data-block-index='" + prevIndex + "']");
        
        $(thisEl).after(prevEl);
        
        selectJs();
        reIndexBlocks();
        //changeSelect();
        makeTinyMceEditor();
        tinymce.remove("textarea.destroy-editor");
    });

    $('.go-down').click(function () {
        $("textarea").each(function() { 
            tinymce.execCommand('mceRemoveEditor', 
            false, $(this).attr('id')); 
        });
        destroySelect2();
        console.log($(this).closest('.form-group').attr('data-block-index'));

        let thisEl = $(this).closest('.form-group');
        let nextIndex = parseInt(thisEl.attr('data-block-index')) + 1;
        let nextEl = $("div").find("[data-block-index='" + nextIndex + "']");
        $(thisEl).before(nextEl);
        selectJs();
        reIndexBlocks();
        //changeSelect();
        makeTinyMceEditor();
        tinymce.remove("textarea.destroy-editor");
    })
}

function selectJs() {
    $('select').select2({
        width: '100%',
        dropdownCssClass: "select-index",
    });
}

//Для добавления новых блоков на страницу  
function addBlock($type) {
    $.ajax({
        type: "POST",
        url: '/admin/add-block',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'type' : $type,
            'index' : $('.can-sort .form-group').length
        },
        success: function(data)
        {
            $('.can-sort').append(data);
            if ($type != 'dinamyc-block' && $type != 'static-block') {
                makeTinyMceEditor();
            }
            //canSort();
            $('select.select2-hidden-accessible').select2('destroy');
            selectJs();
            tinymce.remove("textarea.destroy-editor");
            moveBlocks();
            changeSelect();
        }
    });
}

//Удаление динамических блоков
$('.showcase-brands').on('click', 'span[data-target="delete-item"]', function() {

    if ($(this).parent().parent().parent().children('div.row').length == 1 && $(this).data('trigger') == 'last') {
        return ;
    }
    
    if (confirm("Вы уверены?")) {
        $(this).parent().parent().remove();
        //canSort();
    }

    return ;
});

//Удаление динамических блоков
$('.can-sort').on('click', 'span[data-target="delete-item"]', function() {

    if ($(this).parent().parent().parent().children('div.row').length == 1 && $(this).data('trigger') == 'last') {
        return ;
    }
    
    if (confirm("Вы уверены?")) {
        $(this).parent().parent().remove();
        //canSort();
    }

    return ;
});

function copyToClipboard(element) {
    var copyText = document.getElementById(element);

    copyText.select();
    copyText.setSelectionRange(0, 99999);
    if (localStorage.getItem('buttonCustomImage')) {
        // Ключ существует
        console.log('Ключ существует в localStorage');
        localStorage.removeItem('buttonCustomImage');
        $("#insertCustomImage").val(copyText.value);
        $('#imageCustomContainer > img').remove();
        $("#imageCustomContainer").prepend('<img class="img-fluid" src="'+ copyText.value +'" />');

    } else {
        if ($('input[type=url]').length == 0) {
            $("#insertImage").val(copyText.value);
            $('#imageContainer > img').remove();
            $("#imageContainer").prepend('<img class="img-fluid" src="'+ copyText.value +'" />');
        }
        else {
            console.log($('input[type=url]'));
            $('input[type=url]').val(copyText.value);
    
            var currentDomain = window.location.hostname;
            var imageUrl = 'http://' + currentDomain + copyText.value; // Используйте текущий домен в URL изображения
    
            var tempImage = new Image();
            $(tempImage).on('load', function() {
                var width = tempImage.width;
                var height = tempImage.height;
    
                var labelWidth = $('label:contains("Ширина")');
                var labelTitle = $('label:contains("Высота")');
    
                labelWidth.closest('.tox-form__group').children('input').val(width);
                labelTitle.closest('.tox-form__group').children('input').val(height);
    
                console.log('Ширина изображения:', width);
                console.log('Высота изображения:', height);
            });
    
            tempImage.src = imageUrl;
    
            $.ajax({
                type: "POST",
                url: '/image-attributes',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'url' : copyText.value,
                },
                success: function(options)
                {
                    var alt = $('label:contains("Альтернативное описание")');
                    var title = $('label:contains("Название изображения")');
                    
                    console.log(title.closest('.tox-form__group'));
    
                    title.closest('.tox-form__group').children('input').val(options.attr_title);
                    alt.closest('.tox-form__group').children('input').val(options.alt);
    
                    console.log('Alt:', options.alt);
                    console.log('Title:', options.title);
                }
            });
        }  
    }
    
    $('#file-manager-modal').modal('toggle');
    //копирование ссылки на изображение
    try {
        navigator.clipboard.writeText(copyText.value);
        //alert("Ссылка на изображение скопирована");
    } catch {
        console.log(copyText.value);
        //alert("Ошибка https"); //если локально не будет работать копирование без https
    }
}

function deleteImage() {
    if (confirm("Вы уверены?")) {
        $("#imageContainer img").remove();
        $("#insertImage").attr('value', '');
    }
    return ;
}

function deleteCustomImage() {
    if (confirm("Вы уверены?")) {
        $("#imageCustomContainer img").remove();
        $("#insertCustomImage").attr('value', '');
    }
    return ;
}

function galleryCategoryList() {
    var toggler = document.getElementsByClassName("caret");
    var i;

    for (i = 0; i < toggler.length; i++) {
    toggler[i].addEventListener("click", function() {
        this.parentElement.querySelector(".nested").classList.toggle("active");
        this.classList.toggle("caret-down");
    });
    }
}


$(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    tinymce.remove("textarea.destroy-editor");

    $('#site_type').change(function () {
        
        if ($(this).val() == 'multi_language') {
            $('#site_settings #name').attr('placeholder', 'Наименование языка').focus().blur();
            $('#site_settings #locale_name').val('');
            $('#site_settings #locale_name').attr('placeholder', 'Код языка').focus().blur();
        } else {
            $('#site_settings #name').attr('placeholder', 'Наименование сайта').focus().blur();
            $('#site_settings #locale_name').val($(location).attr('hostname'));
            $('#site_settings #locale_name').attr('placeholder', 'Доменное имя').focus().blur();
            
        }

        console.log($('#site_settings #name').attr('placeholder'))
    })

    $('.insert_image').click(function () {
        // Удаление данных из localStorage
        localStorage.removeItem('buttonCustomImage');
    })

    $('.insert_custom_image').click(function () {
        localStorage.setItem('buttonCustomImage', 'insert_custom_image');

        // Получение данных из localStorage
        var test = localStorage.getItem('buttonCustomImage');
        console.log(test);

    })

    $('.close-modal').click(function () {
        var target = $(this).data('id');
        $(target).modal('toggle');
        $('#file-manager-modal').modal('toggle');
    })

    $("#upload_image").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $('#upload_image')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        var url = $(this).attr("action"); // the script where you handle the form input.
        $.ajax({
                type: "POST",
                url: url,
                data: formData,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                success: function(data)
                {
                    form.reset();
                    $('#uploadNewFile').modal('toggle');
                    $("#gallery").prepend('<li class="image-container"><input id="data-'+ data[0].id +'" type="text" value="/storage/uploads/'+ data[0].url +'" hidden><img class="lazy" data-src="/storage/uploads/'+ data[0].url +'" alt="'+ data[0].url +'" /><div id="img-'+ data[0].id +'" class="projectInfo"><button class="btn btn-primary" onclick="copyToClipboard(`data-'+ data[0].id +'`)">Выбрать</button></div></li>');
                    $('.lazy').lazy();
                    $('#file-manager-modal').modal('toggle');
                },
                error: function(data)
                {
                    console.log(data);
                    alert(data.responseText);
                }
        });
    });

    $("#find_image").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $('#find_image')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        var url = $(this).attr("action"); // the script where you handle the form input.
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData: false, // NEEDED, DON'T OMIT THIS
            success: function(data)
            {
                $('#gallery > li').remove();
                $.each(data, function( index, value ) {
                    $("#gallery").prepend('<li class="image-container"><input id="data-'+ index +'" type="text" value="'+ value +'" hidden><img class="lazy" data-src="/storage/uploads/'+ value +'" alt="'+ value +'" /><div id="img-'+ index +'" class="projectInfo"><p>/storage/uploads/'+ value +'</p><button onclick="copyToClipboard(`data-'+ index +'`)"><i class="far fa-clone"></i></button></div></li>');
                });

                $('.lazy').lazy();
                form.reset();
            },
            error: function(data)
            {
                console.log(data);
                alert(data.responseText);
            }
        });
    });

    $('.category-filter').click(function () {
        let imageCategoryId = $(this).data('category-id');
        $.ajax({
            type: "POST",
            url: '/admin/find-image',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {'image_category_id[]' : imageCategoryId},
            success: function(data)
            {
                if ($("#gallery-page".length)) {
                    $('#gallery-page > div').remove();
                    $.each(data, function( index, value ) {
                        $('#gallery-page').prepend('<div class="col-2 gallery-img"><div class="img-wrapper" style="display: flex; align-items:center; height:100%"><img src="/storage/uploads/'+ value +'" alt="" style="max-width: 300px; width: 100%;"></div><div class="descrpition"><div><p>'+ value +'</p><div style="display: flex; justify-content: center;"><a href="/gallery/' + index + '/edit" title="Редактировать изображение"><button class="btn btn-primary btn-sm"><i class="far fa-edit"></i></button></a><p>&nbsp;&nbsp;</p><form method="POST" action="/gallery/'+ value +'" accept-charset="UTF-8" style="display:inline"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="'+ csrfToken +'"><button type="submit" class="btn btn-danger btn-sm" title="Удалить изображение" onclick="return confirm(`вы уверены?`)"><i class="fa fa-trash" aria-hidden="true"></i></button></form></div></div></div></div>')
                    });
                } 
                if ($("ul#gallery".length)) {
                    $('#gallery > li').remove();
                    $.each(data, function( index, value ) {
                        $("#gallery").prepend('<li class="image-container"><input id="data-'+ index +'" type="text" value="/storage/uploads/'+ value +'" hidden><img class="lazy" data-src="/storage/uploads/'+ value +'" alt="'+ value +'" /><div id="img-'+ index +'" class="projectInfo"><button class="btn btn-primary" onclick="copyToClipboard(`data-'+ index +'`)">Выбрать</button></div></li>');
                    });
                }
                
                $('.lazy').lazy();
            },
            error: function(data)
            {
                console.log(data);
                alert(data.responseText);
            }
        });

        $( "#galleryCategoriesList li" ).each(function( index ) {
            $( this ).removeClass('active');
        });

        $( this ).closest('li').addClass('active');
    })

    moveBlocks();

    $(document).on('click','.duplicate-block', function() {
        destroySelect2();
        $(this).parent().children( ".brands-add" ).children("div.row:first-child").clone().appendTo($(this).parent().children( ".brands-add" ));
        selectJs();
    });

    $(document).on('click','.add-brand-showcase', function() {
        destroySelect2();
        $(this).parent().children( ".showcase-brands" ).children("div.row:first-child").clone().appendTo($(this).parent().children( ".showcase-brands" ));
        selectJs();
    });

    $(document).on('click','.duplicate-faqs-block', function() {
        console.log('click duplicate-faqs-block');
        $(this).parent().children( ".faq-add" ).children("div.row:nth-child(3)").clone().appendTo($(this).parent().children( ".faq-add" ));
    });

    $(document).on('click','.duplicate-plus-minus-block', function() {
        $(this).parent().children( ".plus-minus-add" ).children("div.row:first-child").clone().appendTo($(this).parent().children( ".plus-minus-add" ));
    });

    function destroySelect2() {
        $('select.select2-hidden-accessible').select2('destroy');
    }

    // $('select').select2({
    //     width: '100%',
    //     dropdownCssClass: "select-index",
    // });

    //Индексация блоков
    function reIndexBlocks() {
        $('.can-sort .form-group').each(function(index, element) {
            $(element).attr("data-block-index", index);
    
            //console.log($(element).attr("data-block-name"), findChild.length);
            if ($(element).attr("data-block-name") == "dynamic_attributes") {
    
                let findChildRow = element.querySelectorAll('.row');
    
                $(findChildRow).each(function(elKey, childRow) {
    
                    let findChild = childRow.querySelectorAll('.form-control');
    
                    $(findChild).each(function(key, child) {
                        if ($(child).attr("data-item-name") == 'attribute_item') {
                            var modifiedAttributeName = 'add_content['+ index +'][dynamic_attributes][items]['+ elKey +']['+ $(child).attr("data-item-name") +'][]';
                        } else {
                            var modifiedAttributeName = 'add_content['+ index +'][dynamic_attributes][items]['+ elKey +']['+ $(child).attr("data-item-name") +']';
                        }
                        if ($(child).attr("data-item-name") == 'title' || $(child).attr("data-item-name") == 'short_description') {
                            var attributeName = $(child).attr('name');
                            var modifiedAttributeName = attributeName.replace(/\[\d+\]/, '[' + index + ']');
                        }
    
                        $(child).attr('name', modifiedAttributeName);
                    })
                })
                
            } 
            let findChild = element.querySelectorAll('.form-control');
            $(findChild).each(function(key, child) {
                var attributeName = $(child).attr('name');
                var modifiedAttributeName = attributeName.replace(/\[\d+\]/, '[' + index + ']');
                $(child).attr('name', modifiedAttributeName);
            })
        });

        countBlocks();
    }

    $(document).on('click','.duplicate-dinamyc-block', function() {
        destroySelect2();
        $(this).parent().children( ".dinamyc-blocks-add" ).children("div.row:first-child").clone().appendTo($(this).parent().children( ".dinamyc-blocks-add" ));
        selectJs();
        reIndexBlocks();
        changeSelect();
    });

    $('#type').on('select2:select', function () {
        $.ajax({
            type: "GET",
            url: '/pages/get-type-content',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'page_type' : $('#type').val(),
            },
            success: function(options)
            {
                if (typeof(options) != "undefined" && options !== null) {
                    $('#type_content_id > option').remove();
                    $('#type_content_id').append(options);
                }
            }
        });
    });

    $('#copy-page').on('click', function () {
        if ($(this).data('copy-type') == 'page') {
            var urlAddress = '/pages/copy-page'
        } else {
            var urlAddress = '/posts/copy-post'
        }

        $.ajax({
            type: "POST",
            url: urlAddress,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'page_lang' : $(this).data('page-lang'),
                'page_id' : $(this).data('page-id'),
                'select_languages' : $('#select-languages').val(),
            },
            success: function(options)
            {
                alert('Копия успшно создана!')
            }
        });
    });


    if (document.getElementById('custom_schema')) {
       // tinymce.execCommand('mceRemoveEditor', true, 'textarea.destroy-editor');
        tinymce.remove("textarea.destroy-editor");
        console.log('removed');
    }

    selectJs();
    //canSort(); //Фукнция перемещения элементов (меняем понядок) 


    // Set up the Select2 control
    $('#gallery_categories').select2({
        tags: true,
        createTag: function (params) {
            return {
                id: params.term,
                text: params.term,
                newOption: true
            };
        }
    }).on('select2:selecting', function (e) {
        if (e.params.args.data.newOption) {
            e.preventDefault(); // Отменить добавление нового элемента в список select2
            
            var newValue = e.params.args.data.text;
            console.log(newValue);
            saveNewValueToDatabase(newValue);
            $(this).val('').trigger('change').select2('close');
        }
        
    });

    function saveNewValueToDatabase(value) {
        $.ajax({
            url: '/admin/save-category', // Замените на свой маршрут на сервере для сохранения значения
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                name: value
            },
            success: function (response) {
                    var id = response.id;
                
                // Создайте новый объект с использованием id и значения
                var newOption = new Option(value, id, true, true);
                
                // Добавьте новый элемент в select2 и выберите его
                $('select').append(newOption).trigger('change');
            },
            error: function (xhr, status, error) {
                // Обработка ошибок при сохранении значения
            }
        });
    }


    $('#select-lang-block-wrapper').on('click', function(){
        $('#select-lang-block').toggle();
    });

    $('#select-lang-block li').on('click', function () {
        console.log($(this).data('value'));  
        //window.location.href = "/" + $( "#go_lang option:selected" ).val(); 
        $.ajax({
            type: "POST",
            url: '/admin/set-locale',
            data: { 'locale' : $(this).data('value'), '_token' : $('meta[name="csrf-token"]').attr('content')},

            success: function(data)
            {
                alert('Вы находитесь на ' + data + ' версии сайта') ? "" : location.reload();
            },
            error: function(data)
            {
                console.log(data);
                alert('Ошибка переключения');
            }
        });
    });

    $('.add-item').on('click', function () {
        let canSortBlock = $(this).parent().parent().children('.can-sort');
        let type = $(this).data('block-type');
        $.ajax({
            type: "POST",
            url: '/admin/add-block',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'type' : type,
                'index' : canSortBlock.children('.form-group').length
            },
            success: function(data)
            {
                canSortBlock.append(data);
    
                if (type != 'dinamyc-block' && type != 'static-block') {
                    makeTinyMceEditor();
                }
                //canSort();
                $('select.select2-hidden-accessible').select2('destroy');
                selectJs();
                changeSelect();
            }
        });
    });
});
