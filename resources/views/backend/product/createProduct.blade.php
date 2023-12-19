@extends('backend.authenticate.layouts.app')
@section('content')
    <h3 class="fs-4 mb-3">Product</h3>

    <form class="form-horizontal" action="{{ url('admin/product/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required
                placeholder="Ten" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Name list</label>
            <select name="category_id" class="form-select" id="inputGroupSelect01">
                {{-- <option selected>Choose...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option> --}}
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name_category }}</option>
                @endforeach
            </select>
        </div>
        {{-- desc --}}
        <label for="desc" aria-placeholder="desc">DESC</label>
        <div class="form-floating mb-3">
            <textarea class="form-control @error('desc') is-invalid @enderror" required name="desc"
                placeholder="Leave a comment here" id="desc"></textarea>
            @error('desc')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- quanity --}}
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Quantity</span>
            <input type="text" name="quantity" class="form-control" placeholder="quantity"
                aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default"class="form-control @error('quantity') is-invalid @enderror"
                required>
            @error('quantity')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- price --}}
        <div class="input-group mb-3">
            <span class="input-group-text" id="price">Price</span>
            <input type="text" name="price" class="form-control  @error('price') is-invalid @enderror" required
                placeholder="price" aria-label="Sizing example input" id="price" aria-describedby="price">
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- Image --}}
        <div class="form-group mb-3">
            <div class="custom-file">
                <label class="col-sm-2 control-label">Img</label>
                <div class="col-sm-10">
                    <div class="fallback">
                        <input type="file" id="img" class="form-control  @error('price') is-invalid @enderror" required multiple class="custom-file-input"  name="img[]">
                        @error('img')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>

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
        CKEDITOR.replace('desc');
    </script>
@endpush
