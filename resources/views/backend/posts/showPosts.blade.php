@extends('backend.authenticate.layouts.app')
@section('content')
    <div class="row mt-3">

        <h3 class="fs-4 mb-3">Feedback</h3>

        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover table-striped table-success ">
                <thead>
                    <tr>
                        <th scope="col" width="50">STT</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">img</th>
                        <th scope="col">Times</th>
                        <th scope="col">Delete</th>

                    </tr>
                </thead>

                @foreach ($posts as $post)
                    <tbody class="">
                        <tr>

                            <td scope="row">{{ ++$i }}</td>
                            {{-- @dd($post) --}}
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            {{-- <td>{{ $product->desc }}</td> --}}
                            <td>
                                <img src="{{ asset('storage/backend/posts/' . json_decode($post->images)[0]) }}"
                                    width="30px" height="30px">
                            </td>



                            <td>{{ $post->published_at }}</td>
                            <td>
                                <a style="margin-left: 15px;" href="{{ url("admin/posts/{$post->id}/edit") }}"><i
                                        class="fas fa-edit"></i></a>


                                {{-- <a href="javascript:void(0)"
                                onclick=" confirm('bạn có muốn xóa') && document.getElementById('delete-'+{{ $post->id }}).submit()"><i
                                    style="color: black" class="fas fa-trash"></i> </a>
                            <form id="delete-{{ $post->id }}" method="POST"
                                action="{{ url("admin/post/{$post->id}") }}">
                                @csrf
                                @method('DELETE')

                            </form> --}}
                                <a href="#"
                                    onclick="if (confirm('Bạn có chắc chắn muốn xóa?')) { document.getElementById('delete-form-{{ $post->id }}').submit(); }">
                                    <i class="fas fa-trash"></i>
                                </a>

                                <form id="delete-form-{{ $post->id }}" method="POST"
                                    action="{{ url("admin/post/{$post->id}") }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>

                    </tbody>
                @endforeach
            </table>
            {{ $posts->links() }}
        </div>
        @if (session('delete'))
            <div class="alert alert-danger alert-dismissible fade show position-fixed bottom-0 end-0" role="alert">
                {{ session('delete') }}
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
