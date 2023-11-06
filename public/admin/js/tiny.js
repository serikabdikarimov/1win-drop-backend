makeTinyMceEditor();

function makeTinyMceEditor() {
    tinymce.init({
        selector: '.form-group > textarea',
        plugins: 'autolink lists image link hr fullscreen lists code fullscreen table',
        language: 'ru',
        toolbar1: 'insertfile undo redo | blockquote | success_blockquote info_blockquote warning_blockquote | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
        toolbar2: 'custom_table table tabledelete | custom_picture image link hr  | code fullscreen',
        file_browser_callback_types: 'file image media',
        image_title: true,
        file_picker_types: 'file image',
        relative_urls : false,
        deprecation_warnings: false,
        image_caption: true,
        table_header_type: 'sectionCells',
        extended_valid_elements: 'source[media|width|height|srcset],div[class],',
        file_picker_callback: function (callback, value, meta) {
            $('#file-manager-modal').modal('show');
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        setup: function(editor){
            //Регистрация кнопки настройки SEO изображения
            editor.ui.registry.addButton('custom_picture', {
                text: 'IMG SEO',
                onAction: function (api) {
                    var $ = tinymce.dom.DomQuery;
                    var elem = tinymce.activeEditor.selection.getNode();
          
                    var isImg = $(elem).is('img');
                    if(isImg){
                        //$(elem).addClass('has-wrapper');
                        let arraUrl = $(elem).attr('src').split('/');
                        $(elem).wrap('<picture></picture>');
                        $(elem).attr('loading', 'lazy');
                        console.log();
                        
                    }
                }
              });

            //Регистрация кнопки настройки адаптивности таблицы
            editor.ui.registry.addButton('custom_table', {
                text: 'table responsive',
                onAction: function (api) {
                    var $ = tinymce.dom.DomQuery;
                    var elem = tinymce.activeEditor.selection.getNode();
                    console.log(elem);
                    var isTable = $(elem).closest('table');
                    if(isTable){
                        let elTable = $(elem).closest('table');
                        $(elTable).wrap('<div class="card__table"></div>');
                    }
                }
            });

            //регистрируем свои иконки
            editor.ui.registry.addIcon('custom_success', "<svg width='26' height='26' viewBox='0 0 26 26' fill='none'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.6155 0.0918569C9.15204 0.323065 6.83477 1.24594 4.89161 2.76978C4.37597 3.17413 3.12629 4.45394 2.7286 4.9849C1.734 6.31285 1.01489 7.78029 0.603792 9.32076C-0.325835 12.8041 0.27694 16.479 2.26946 19.4758C6.96618 26.5397 17.1288 26.9878 22.4556 20.3659C23.6398 18.8936 24.5709 16.9074 24.9421 15.0613C25.1838 13.8597 25.2456 12.2357 25.0957 11.0252C24.4051 5.44736 20.0733 1.01057 14.5171 0.190191C13.7378 0.0751253 12.3096 0.0267409 11.6155 0.0918569ZM20.1559 7.06078C20.8866 7.27785 21.3558 7.90538 21.3602 8.67146C21.3625 9.06915 21.254 9.39581 21.0207 9.69365C20.8635 9.89423 17.8148 12.7553 11.5732 18.5593C10.7341 19.3396 10.0276 19.9781 10.0031 19.9781C9.93964 19.9781 4.06663 13.6848 3.94222 13.4836C3.78244 13.225 3.6754 12.7404 3.71248 12.4433C3.78298 11.8793 4.19926 11.3123 4.70884 11.0863C5.20623 10.8658 5.94296 10.9338 6.36457 11.2392C6.47323 11.318 7.36162 12.2377 8.33865 13.283C9.31573 14.3284 10.1293 15.1896 10.1465 15.1968C10.1638 15.204 11.4232 14.0482 12.9452 12.6284C18.6366 7.31904 18.645 7.31141 18.9132 7.17467C19.2983 6.9784 19.7417 6.93774 20.1559 7.06078Z' fill='#34BC58'/></svg>");
            editor.ui.registry.addIcon('custom_info', "<svg width='26' height='26' viewBox='0 0 26 26' fill='none'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.8523 0.205156C9.0444 0.545637 6.46571 1.79667 4.47383 3.78462C2.4168 5.83764 1.15566 8.49987 0.86057 11.4122C0.786773 12.1405 0.827066 13.8164 0.934513 14.4877C1.50179 18.0311 3.45753 21.0783 6.43104 23.0517C7.8386 23.9859 9.48811 24.6437 11.1929 24.9509C11.7683 25.0545 11.9675 25.0652 13.3174 25.0652C14.6646 25.0652 14.8673 25.0544 15.4368 24.9516C18.8667 24.3331 21.8135 22.4102 23.7411 19.5327C24.4675 18.4484 25.155 16.8922 25.4753 15.6073C25.7749 14.4052 25.8997 12.6577 25.775 11.4122C25.1864 5.5342 20.6138 0.890066 14.7398 0.204279C14 0.117903 12.568 0.118342 11.8523 0.205156ZM14.6605 5.97992C15.4415 6.19138 16.4584 6.77124 17.0436 7.33882C17.3339 7.62042 17.7269 8.18181 17.8876 8.54442C18.1371 9.10742 18.2226 9.52097 18.2195 10.1494C18.216 10.8709 18.081 11.3391 17.7189 11.8862C17.3649 12.4209 17.0446 12.7003 16.1608 13.2452C15.2848 13.7853 15.0693 14.0286 14.8597 14.7144C14.6651 15.3513 14.7685 15.3138 13.1592 15.3307C11.8156 15.3448 11.7879 15.3431 11.6782 15.2403C11.5207 15.0926 11.4438 14.7195 11.474 14.2495C11.5195 13.5416 11.7882 12.9855 12.3648 12.4057C12.7478 12.0206 12.9957 11.8452 13.7997 11.3905C14.4612 11.0164 14.7487 10.7325 14.8248 10.3783C14.8882 10.0834 14.8224 9.77264 14.6475 9.54105C14.4713 9.30767 14.4163 9.26579 14.05 9.08632C13.7488 8.93877 13.7037 8.93077 13.1699 8.93077C12.635 8.93077 12.5914 8.93852 12.2882 9.08749C11.9654 9.24615 11.693 9.49982 11.0556 10.2357C10.7464 10.5927 10.6106 10.6585 10.4016 10.5528C10.0983 10.3995 8.50433 9.1374 8.43469 8.99546C8.36617 8.85585 8.371 8.83299 8.53237 8.53146C9.2129 7.25981 10.5893 6.28131 12.1941 5.9283C12.7826 5.79884 14.0931 5.82628 14.6605 5.97992ZM14.6728 16.1202C14.865 16.2472 14.8856 16.4273 14.8704 17.845C14.8561 19.1692 14.8543 19.1904 14.7446 19.2998C14.6338 19.4104 14.6277 19.4109 13.1709 19.4109C11.7144 19.4109 11.708 19.4104 11.5972 19.2999C11.4874 19.1904 11.4858 19.1712 11.4716 17.8027C11.4558 16.2705 11.4746 16.1517 11.7432 16.0927C11.8166 16.0765 11.8986 16.0552 11.9255 16.0452C11.9524 16.0353 12.5568 16.0317 13.2686 16.0373C14.3217 16.0456 14.5834 16.061 14.6728 16.1202Z' fill='#3DA2E0'/></svg>");
            editor.ui.registry.addIcon('custom_warning', "<svg width='26' height='26' viewBox='0 0 26 26' fill='none'><path fill-rule='evenodd' clip-rule='evenodd' d='M11.1116 0.149398C6.84338 0.703867 3.24768 3.24882 1.38882 7.03096C0.949 7.92583 0.691911 8.61701 0.46949 9.50298C-0.480521 13.2865 0.37586 17.2703 2.80093 20.3487C3.19194 20.8451 4.313 21.9661 4.80937 22.3572C7.14813 24.1995 10.0997 25.1665 13.0498 25.0568C14.8466 24.99 16.3878 24.6102 17.9906 23.8394C18.8856 23.4089 19.3555 23.1238 20.1648 22.5204C22.8289 20.5343 24.628 17.3829 25.0312 13.9965C25.1089 13.3442 25.1103 11.8021 25.0337 11.172C24.8468 9.6321 24.4835 8.40769 23.8052 7.03096C22.8017 4.99418 21.3981 3.40065 19.4935 2.1359C18.038 1.16929 16.4234 0.535332 14.633 0.227415C13.783 0.0812631 11.9492 0.0406442 11.1116 0.149398ZM13.527 3.82251C14.2133 4.14369 14.6463 4.68304 14.7974 5.40512C14.8701 5.75278 14.8529 6.07396 14.5143 10.6888C14.2531 14.2488 14.133 15.6363 14.0783 15.7253C14.003 15.8475 13.9962 15.8481 12.5911 15.8481C11.479 15.8481 11.1667 15.8326 11.1189 15.775C11.0821 15.7307 10.9141 13.7516 10.6906 10.7296C10.2877 5.282 10.2907 5.4602 10.5931 4.84197C10.8469 4.32331 11.4798 3.81541 12.0551 3.66866C12.1518 3.64398 12.4401 3.62995 12.6958 3.63749C13.0855 3.64895 13.2202 3.67893 13.527 3.82251ZM13.3555 17.9876C13.767 18.176 14.0094 18.4037 14.2286 18.808C14.4031 19.1299 14.4146 19.1832 14.4146 19.6698C14.4146 20.2967 14.2988 20.5822 13.8697 21.0126C13.4818 21.4017 13.0919 21.5447 12.5038 21.5133C11.7789 21.4747 11.2058 21.0916 10.9013 20.4422C10.7107 20.0355 10.7016 19.3487 10.8815 18.948C11.0144 18.6519 11.3664 18.2496 11.6409 18.0799C12.1299 17.7777 12.8164 17.7407 13.3555 17.9876Z' fill='#F58128'/></svg>");
            // Кнопка для первого типа success
            editor.ui.registry.addButton('success_blockquote', {
                icon: 'custom_success',
                text: 'цитата',
                onAction: function() {
                    var selectedText = editor.selection.getContent({ format: 'text' });

                    if (selectedText) {
                        quote = '<blockquote class="article__blockquote article__blockquote--success"><p>' + selectedText + '</p></blockquote>';
                    } else {
                        quote = '<blockquote class="article__blockquote article__blockquote--success"><p>&nbsp;</p></blockquote>';
                    }
            
                    editor.execCommand('mceInsertContent', false, quote);
                    editor.selection.setCursorLocation(editor.dom.select('blockquote')[0], 0);
                }
            });
        
            // Кнопка для второго типа info
            editor.ui.registry.addButton('info_blockquote', {
                icon: 'custom_info',
                text: 'цитата',
                onAction: function() {
                    var selectedText = editor.selection.getContent({ format: 'text' });

                    if (selectedText) {
                        quote = '<blockquote class="article__blockquote article__blockquote--info"><p>' + selectedText + '</p></blockquote>';
                    } else {
                        quote = '<blockquote class="article__blockquote article__blockquote--info"><p>&nbsp;</p></blockquote>';
                    }
            
                    editor.execCommand('mceInsertContent', false, quote);
                    editor.selection.setCursorLocation(editor.dom.select('blockquote')[0], 0);
                }
            });
        
            // Кнопка для третьего типа warning
            editor.ui.registry.addButton('warning_blockquote', {
                icon: 'custom_warning',
                text: 'цитата',
                onAction: function() {
                    var selectedText = editor.selection.getContent({ format: 'text' });

                    if (selectedText) {
                        quote = '<blockquote class="article__blockquote article__blockquote--warning"><p>' + selectedText + '</p></blockquote>';
                    } else {
                        quote = '<blockquote class="article__blockquote article__blockquote--warning"><p>&nbsp;</p></blockquote>';
                    }
            
                    editor.execCommand('mceInsertContent', false, quote);
                    editor.selection.setCursorLocation(editor.dom.select('blockquote')[0], 0);
                }
            });
        },

        init_instance_callback: function (editor) {
            editor.on('NodeChange', function (e) {
              var dom = editor.dom;
              var table = dom.getParent(editor.selection.getNode(), 'table');
              if (table) {
                var thead = dom.select('thead', table)[0];
                var rows = dom.select('tr', table);
                if (!thead && rows.length > 1) {
                  thead = dom.create('thead');
                  var firstRow = dom.select('tr', table)[0];
                  if (firstRow) {
                    dom.remove(firstRow);  // Remove first row from tbody
                    dom.add(thead, firstRow);  // Add it to thead instead
                    table.insertBefore(thead, table.firstChild);  // Insert thead at the top of the table
        
                    // Convert first row cells to th
                    for (var i = 0; i < firstRow.cells.length; i++) {
                      var cell = firstRow.cells[i];
                      var newCell = dom.create('th');
                      newCell.innerHTML = cell.innerHTML;
                      dom.replace(newCell, cell);
                    }
                  }
                }
              }
            });
        },
          
          image_advtab: true,
          templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
          ],
          content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
          ]
    });
}