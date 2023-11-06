@foreach($brands as $brand)
    <option value="{{ $brand->slug }}" {{ isset($item) && $item == $brand->slug ? 'selected' : ''}}>{{ $brand->name }}</option>
@endforeach