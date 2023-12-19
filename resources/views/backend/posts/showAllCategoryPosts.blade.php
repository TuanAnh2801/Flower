@extends('backend.authenticate.layouts.app')
@section('content')
<div class="col">
    <table class="table bg-white rounded shadow-sm  table-hover table-striped table-success ">
        <thead>
            <tr>
                <th scope="col" width="50">#</th>
                <th scope="col">Nam Category</th>
                <th scope="col">edit/delete</th>

            </tr>
        </thead>
        @foreach ($categoriesPost as $categorie)
            {{-- @dd($categoriesPost) --}}
            {{-- @dd($order['user']) --}}
            <tbody class="">
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $categorie['name'] }}</td>
                    <td>
                  
                        <a href="{{ url("admin/posts/showEditCategoryPosts/{$categorie->id}") }}"><i class="fas fa-edit"></i></a>
                        <a href="#"
                            onclick="if (confirm('Bạn có chắc chắn muốn xóa?')) { document.getElementById('delete-form-{{ $categorie['id'] }}').submit(); }">
                            <i class="fas fa-trash"></i>
                        </a>

                        <form id="delete-form-{{ $categorie['id'] }}" method="POST"
                            action="{{ route('post.deleleCategory', $categorie['id']) }}">
                            @csrf
                            @method('DELETE')
                        </form>
                </tr>

            </tbody>
        @endforeach
    </table>
    {{ $categoriesPost->links() }}
</div>
@if (session('delete'))
<div class="alert alert-dark alert-dismissible fade show position-fixed bottom-0 end-0" role="alert">
    {{ session('delete') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@endsection