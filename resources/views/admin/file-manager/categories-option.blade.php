<ul class="nested">
@foreach ($category as $item)
    @if ($item->children->count() > 0)
    <li ><span class="caret"></span><span class="category-filter" data-category-id="{{ $item->id }}">{{ $item->name }}</span>
    {{-- @include('admin.file-manager.categories-option', ['category' => $category->children]); --}}
    @else
        <li><span class="category-filter" data-category-id="{{ $item->id }}">{{ $item->name }}</span></li>
    @endif
@endforeach
</ul>