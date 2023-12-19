@extends('backend.authenticate.layouts.app')
@section('content')
<h3 class="fs-4 mb-3">Product</h3>


<form class="form-horizontal" action='{{ url("/admin/product/{$products->id}") }}' method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
        <input type="text" name="name"  value="{{ $products->name }}"  class="form-control" placeholder="Ten" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Name list</label>
        <select name="category_id" class="form-select" id="inputGroupSelect01">
        {{-- <option selected>Choose...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option> --}}
        @foreach ($categories as $category )
        <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected' : '' }}>{{ $category->name_category }}</option>
        @endforeach
        </select>
    </div>
    {{-- desc --}}
    <div class="form-floating mb-3">
        <label for="floatingTextarea" aria-placeholder="desc"></label>
        <textarea class="form-control" value="{{ $products->desc }}" name="desc"  placeholder="Leave a comment here" id="floatingTextarea">{{ $products->desc }}</textarea>
    </div>
    {{-- quanity --}}
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Quantity</span>
        <input type="text" name ="quantity" value="{{ $products->inventory->quantity }}" class="form-control" placeholder="quantity" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    {{-- price --}}
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
        <input type="text" name="price" value="{{ $products->price }}" class="form-control" placeholder="price" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    {{-- Image --}}
    <div class="form-group mb-3">
        <div class="col-sm-10">
            @foreach($products->img as $image)
                <img src="{{ asset('storage/backend/product/'.$image) }}" style="width:220px; height:200px" />
            @endforeach

            <div class="fallback">
            <input type="file" name="img[]" multiple>
            @foreach($products->img as $image)
                <input type="hidden" name="img[]" value="{{ $image }}" />
            @endforeach

            @error('img')
                <div class="text-danger">
                <span>{{ $message }}</span>
                </div>
            @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-9">
            <button class="btn btn-primary outline-btn">{{ __('Submit') }}</button>
            <a href="{{ url('admin/product/create') }}">
            <button type="button" class="btn btn-danger outline-btn">{{ __('Cancel') }}</button>
            </a>
        </div>
    </div>
</form>
@endsection

@push('js')
    <script>
        CKEDITOR.replace( 'desc' );
    </script>
@endpush