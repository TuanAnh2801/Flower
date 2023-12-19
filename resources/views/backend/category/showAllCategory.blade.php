@extends('backend.authenticate.layouts.app')
@section('content')
<div class="col">
    <table class="table bg-white rounded shadow-sm  table-hover table-striped table-success ">
        <thead>
            <tr>
                <th scope="col" width="50">#</th>
                <th scope="col">Nam Category</th>
                <th scope="col">Desc</th>
                <th scope="col">edit/delete</th>

            </tr>
        </thead>
        @foreach ($categories as $categorie)
            {{-- @dd($subcribe) --}}
            {{-- @dd($order['user']) --}}
            <tbody class="">
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $categorie['name_category'] }}</td>
                    <td>{{ $categorie['desc'] }}</td>
                    <td>
                  
                        <a href="{{ url("admin/showUpdateCategory/{$categorie->id}/edit") }}"><i class="fas fa-edit"></i></a>
                        <a href="#"
                            onclick="if (confirm('Bạn có chắc chắn muốn xóa?')) { document.getElementById('delete-form-{{ $categorie['id'] }}').submit(); }">
                            <i class="fas fa-trash"></i>
                        </a>

                        <form id="delete-form-{{ $categorie['id'] }}" method="POST"
                            action="{{ route('category.delete', $categorie['id']) }}">
                            @csrf
                            @method('DELETE')
                        </form>
                </tr>

            </tbody>
        @endforeach
    </table>
    {{ $categories->links() }}
</div>

@endsection