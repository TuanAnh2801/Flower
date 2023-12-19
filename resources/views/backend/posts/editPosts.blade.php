@extends('backend.authenticate.layouts.app')
@section('content')
    <h3 class="fs-4 mb-3">Update Posts</h3>
    <form class="form-horizontal" action='{{ url("/admin/posts/{$posts->id}") }}' method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            {{-- @dd($posts) --}}
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" value="{{ $posts['title'] }}" class="form-control" id="title">
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Danh mục sản phẩm</label>
            <select name="category_id" class="form-select" id="category_id">
                @foreach ($categories as $category )
                {{-- @dd($categories) --}}
                    <option value="{{ $category->id }}" {{ $category->id == $posts->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-floating mb-3">
            <label for="floatingTextarea" aria-placeholder="desc"></label>
            <textarea class="form-control" value="{{ $posts->content }}" name="content"  placeholder="Leave a comment here" id="desc">{{ $posts->content }}</textarea>
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Hình ảnh sản phẩm</label>
            <div class="input-group">
                <input type="file" class="form-control" name="images[]" multiple>
            </div>
            {{-- @dd(json_decode($posts['images'])) --}}
            @foreach(json_decode($posts['images']) as $image)
            {{-- @dd($image) --}}
                <div class="mt-3">
                    <img src="{{ asset('storage/backend/posts/' .$image) }}" style="width:220px; height:200px" />
                    <input type="hidden" name="img[]" value="{{ $image }}" />
                </div>
            @endforeach
            @error('images')
                <div class="text-danger">
                    <span>{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
            <a href="{{ url('admin/post/allPosts') }}" class="btn btn-danger">Hủy</a>
        </div>
    </form>
    @if (session('success'))
    <div class="alert alert-primary alert-dismissible fade show position-fixed bottom-0 end-0" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@endsection

@push('js')
    <script>
        CKEDITOR.replace( 'desc' );
    </script>
@endpush
<script>
    // Tự động ẩn đoạn thông báo sau 5 giây
    setTimeout(function() {
        document.querySelector('.alert').classList.remove('show');
    }, 5000);
</script>
