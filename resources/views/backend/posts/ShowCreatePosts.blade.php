@extends('backend.authenticate.layouts.app')
@section('content')
    <h3 class="fs-4 mb-3">Product</h3>
    <form class="form-horizontal" action="{{ url('admin/post/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" required
                placeholder="Title" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Category</label>
            <select name="category_id" class="form-select" id="inputGroupSelect01">

                @foreach ($categories as $category)
                    {{-- @dd($categories) --}}
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        {{-- content --}}
        <label for="content" aria-placeholder="Content">Content</label>
        <div class="form-floating mb-3">
            <textarea class="form-control @error('content') is-invalid @enderror" required name="content"
                placeholder="Leave a comment here" id="desc"></textarea>
            @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- Image --}}
        <div class="form-group mb-3">
            <div class="custom-file">
                <label class="col-sm-2 control-label">Images</label>
                <div class="col-sm-10">
                    <div class="fallback">
                        <input type="file" id="images" class="form-control  @error('images') is-invalid @enderror"
                            required multiple class="custom-file-input" name="images[]">
                        @error('images')
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
                <a href="{{ url('admin/showDashboard') }}">
                    <button type="button" class="btn btn-danger outline-btn">{{ __('Cancel') }}</button>
                </a>
            </div>
        </div>
    </form>
    @if (session('success'))
    <div class="alert alert-primary alert-dismissible fade show position-fixed bottom-0 end-0" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@endsection
<script>
    // Tự động ẩn đoạn thông báo sau 5 giây
    setTimeout(function() {
        document.querySelector('.alert').classList.remove('show');
    }, 5000);
</script>
@push('js')
    <script>
        CKEDITOR.replace('desc');
    </script>
@endpush
