<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="file-manager-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Галерея </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <br>
        <div class="for-container">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group" style="padding-left: 7.5px;">
                <button type="button" class="btn btn-primary close-modal" data-toggle="modal" data-target="#uploadNewFile" data-id="#file-manager-modal">
                  <i class="fas fa-cloud-upload-alt"></i> Загрузить изображение
                </button>
              </div>
          </div>
          <div class="col-md-6">
            <form id="find_image" class="container" action="/find-image" method="POST" accept-charset="UTF-8"
              enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="col-md-12" style="justify-content: end;">
                <div class="input-group">
                  <input type="text" class="form-control" name="image_search" value="" placeholder="Введите название">
                  <span class="input-group-append">
                    <button class="btn btn-secondary" type="submit">
                      <i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <br>
      <div class="modal-body">
        <div id="file-manager">
          <div class="row">
            <div class="col-md-2">
              <ul id="galleryCategoriesList">
                <li class="active"><span class="category-filter" data-category-id="{{ 'all' }}">{{ 'Все категории' }}</span></li>
                @foreach ($categoriesNull as $category)
                    @if ($category->children->count() > 0)
                      <li><span class="caret"></span><span class="category-filter" data-category-id="{{ $category->id }}">{{ $category->name }}</span>
                      @include('admin.file-manager.categories-option', ['category' => $category->children])
                    @else
                      <li><span class="category-filter" data-category-id="{{ $category->id }}">{{ $category->name }}</span></li>
                    @endif
                @endforeach
              </ul>
            </div>

            <div class="col-md-10">
              <section>
                <ul id="gallery">
                  @foreach($files as $key => $file)
                  <li class="image-container">
                    <input id="data-{{ $file->id }}" type="text" value="/storage/uploads/{{ $file->url }}" hidden>
                    <img class="lazy" src="/storage/uploads/{{ $file->url }}" alt="{{ $file->title }}" />
                    <div id="img-{{ $file->id }}" class="projectInfo">
                      <button class="btn btn-primary" onclick="copyToClipboard('data-{{ $file->id }}')">Выбрать</button>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </section>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-sm" id="uploadNewFile" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="upload_image" method="POST" action="{{ url('/admin/upload-image') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="mySmallModalLabel">Загрузка изображения</h5>
        <button type="button" class="close close-modal" data-id="#uploadNewFile" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            {{ csrf_field() }}
            <x-adminlte-input label="{{ 'Наименование' }}" placeholder="{{ 'Наименование изображения для админа' }}" name="title" type="text" id="title" required enable-old-support></x-adminlte-input>
            <x-adminlte-select2 id="gallery_categories" name="gallery_categories[]" label="Категория" multiple>
              @foreach($galleryCategories as $key=>$item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
              @endforeach
            </x-adminlte-select2>
            <x-adminlte-input label="{{ 'Title' }}" name="attr_title" type="text" id="attr_title" value="" required enable-old-support></x-adminlte-input>
            <x-adminlte-input label="{{ 'Alt' }}" name="alt" type="text" id="alt" value="" required enable-old-support></x-adminlte-input>
            <x-adminlte-input label="{{ 'Width' }}" name="width" type="text" id="width" value="" enable-old-support></x-adminlte-input>
            <x-adminlte-input label="{{ 'Height' }}" name="height" type="text" id="height" value="" enable-old-support></x-adminlte-input>

            <input type="file" class="form-control" name="upload" value="" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-modal" data-id="#uploadNewFile">Отменить</button>
        <button type="submit" class="btn btn-primary">Загрузить</button>
      </div>
    </form>
    </div>
  </div>
</div>
