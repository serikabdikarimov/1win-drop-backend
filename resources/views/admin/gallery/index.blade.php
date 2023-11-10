@extends('adminlte::page')

@section('title', 'Галерея')

@section('content_header')
    <h1>Галерея</h1>
@stop

@section('content')
    @include('flash-message')
    <a href="{{ url('/admin/gallery/create') }}" class="btn btn-success btn-sm" title="Добавить изображение">
        <i class="fa fa-plus" aria-hidden="true"></i> Добавить
    </a>
    <form method="GET" action="{{ url('/admin/gallery') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
        {{--<div class="form-group">
            <select name="category_id" id="category_id" class="form-control" style="width: 150px;">
                <option value="">Категория</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') && request('category_id') == $category->id  ? 'selected' : ''}}>{{ $category->name }}</option>
                    @endforeach
            </select>
        </div> --}}
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Поиск..." value="{{ request('search') }}">
            <span class="input-group-append">
                <button class="btn btn-secondary" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form>

    <br/>
    <br/>
    <style>
        .gallery-img {
            position: relative;
            color: #fff;
            border: 1px solid #dedede;
            padding: 10px;
        }
        .gallery-img  .descrpition {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .gallery-img  .descrpition:hover {
            opacity: 1;
            transition: 0.3s;
        }
        .select2-container {
            width: 150px!important;

        }
        .select2-container .select2-selection--single {
            height: 37px;

        }
        .select2-selection__rendered {
            line-height: 29px!important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 7px;
        }

        #galleryCategoriesList li {
            padding: 5px 16px;
            border-radius: 10px;
        }

        #galleryCategoriesList li.active {
            color: #000;
            background-color: rgb(220 231 242);
        }
    </style>
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
            <div id="gallery-page" class="row">
                @foreach($gallery as $item)
                    <div class="col-2 gallery-img">
                        <div class="img-wrapper" style="display: flex; align-items:center; height:100%">
                            <img src="/storage/uploads/{{ $item->url }}" alt="" style="max-width: 300px; width: 100%;">
                        </div>
                        <div class="descrpition">
                            <div>
                                <p>{{ $item->url }}</p>
                                <div style="display: flex; justify-content: center;">
                                    <a href="{{ url('/admin/gallery/' . $item->id . '/edit') }}" title="Редактировать изображение"><button class="btn btn-primary btn-sm"><i class="far fa-edit"></i></button></a>
                                    <p>&nbsp;&nbsp;</p>
                                    <form method="POST" action="{{ url('/admin/gallery' . '/' . $item->url) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Удалить изображение" onclick="return confirm('вы уверены?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>

    </div>
    <div class="pagination-wrapper"> {!! $gallery->appends(['search' => Request::get('search')])->render() !!} </div>

@stop
@section('css')
    <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/themes/sunny/jquery-ui.css">
@stop
