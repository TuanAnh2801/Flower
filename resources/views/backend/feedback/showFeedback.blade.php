@extends('backend.authenticate.layouts.app')
@section('content')
    <div class="row mt-3">
   
        <h3 class="fs-4 mb-3">Feedback</h3>

        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover table-striped table-success ">
                <thead>
                    <tr>
                        <th scope="col" width="50">STT</th>
                        <th scope="col">Img Product</th>
                        <th scope="col">User Comment</th>
                        <th scope="col">Content</th>
                        <th scope="col">Times</th>
                        <th scope="col">Delete</th>

                    </tr>
                </thead>
                {{-- @foreach ($feedbacks as $feedback)
                 
                    <tbody class="">
                        <tr>
                            <td scope="row">{{ $feedback['id'] }}</td>
                         
                            <td>{{ $feedback['user']['user_name'] }}</td>
                            <td>
                                <a href="{{ route('comment.update', $feedback->id) }}"
                                    class="{{ $feedback->is_new == 1 ? 'font-weight-bold' : '' }}">
                             
                                    <a href="{{ route('product.detail', $feedback['product']['id']) }}">
                                        @foreach ($feedback['product']['img'] as $item)
                                            <img src="{{ asset('storage/backend/product/' . $item) }}"
                                                style="width: 30px; height: 30px;">
                                        @endforeach
                                    </a>
                                </a>
                            </td>
                            <td>{{ $feedback['content'] }}</td>
                            <td>{{ $feedback['created_at'] }}</td>


                            <td>


                                <a href="javascript:void(0)"
                                    onclick=" confirm('bạn có muốn xóa') && document.getElementById('delete-'+{{ $feedback->id }}).submit()"><i
                                        style="color: black" class="fas fa-trash"></i> </a>
                                <form id="delete-{{ $feedback->id }}" method="POST"
                                    action="{{ url("admin/delete/{$feedback->id}") }}">
                                    @csrf
                                    @method('DELETE')

                                </form>
                            </td>
                        </tr>

                    </tbody>
                @endforeach --}}


                {{-- @foreach ($feedbacks as $feedback)
                    <tbody class="">
                        <tr>
                            <td scope="row">{{ $feedback['id'] }}</td>
                            
                            <td>{{ $feedback['user']['user_name'] }}</td>
                            <td>
                            <a href="{{ route('comment.update', $feedback->id) }}">
                                <a href="{{ route('comment.update', $feedback->id) }}"
                                    class="{{ $feedback->is_new == 1 ? 'font-weight-bold' : '' }}"
                                    onclick="event.preventDefault(); document.getElementById('update-feedback-{{ $feedback->id }}').submit();">
                                    @foreach ($feedback['product']['img'] as $item)
                                        <img src="{{ asset('storage/backend/product/' . $item) }}"
                                            style="width: 30px; height: 30px;">
                                    @endforeach
                                </a>
                            </a>
                                <form id="update-feedback-{{ $feedback->id }}"
                                    action="{{ route('comment.update', $feedback->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('PUT')
                                </form>
                            </td>
                            <td>{{ $feedback['content'] }}</td>
                            <td>{{ $feedback['created_at'] }}</td>
                            <td>
                                <a href="javascript:void(0)"
                                    onclick=" confirm('bạn có muốn xóa') && document.getElementById('delete-feedback-{{ $feedback->id }}').submit()">
                                    <i style="color: black" class="fas fa-trash"></i>
                                </a>
                                <form id="delete-feedback-{{ $feedback->id }}" method="POST"
                                    action="{{ url("admin/delete/{$feedback->id}") }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach --}}
                @foreach ($feedbacks as $feedback)
                    <tbody class="">
                        <tr class="{{ $feedback['is_new'] == 1 ? 'table-warning' : '' }}">
                            <td scope="row">{{ $feedback['id'] }}</td>
                            <td>{{ $feedback['user']['user_name'] }}</td>
                            <td>
                                <a href="{{ route('product.detail', $feedback['product']['id']) }}">
                                    <img src="{{ asset('storage/backend/product/' . $feedback['product']['img'][0]) }}"
                                        style="width: 30px; height: 30px;"
                                        onclick="event.preventDefault(); document.getElementById('update-feedback-{{ $feedback->id }}').submit();">
                                </a>
                                <form id="update-feedback-{{ $feedback->id }}"
                                    action="{{ route('comment.update', $feedback->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="is_new" value="2">
                                </form>
                            </td>
                            <td>{{ $feedback['content'] }}</td>
                            <td>{{ $feedback['created_at'] }}</td>
                            <td>
                                <a href="javascript:void(0)"
                                    onclick=" confirm('bạn có muốn xóa') && document.getElementById('delete-feedback-{{ $feedback->id }}').submit()">
                                    <i style="color: black" class="fas fa-trash"></i>
                                </a>
                                <form id="delete-feedback-{{ $feedback->id }}" method="POST"
                                    action="{{ url("admin/feedback/{$feedback->id}") }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach

            </table>
            {{ $feedbacks->links() }}
        </div>
    @endsection
    <script>
        $(document).ready(function() {
            $('img.product-img').click(function() {
                var comment_id = $(this).data('comment-id');
                var product_id = $(this).data('product-id');

                // Gửi request AJAX để cập nhật trạng thái `is_new` của bản ghi comment tương ứng
                $.ajax({
                    url: '/admin/update-feedback/' + comment_id,
                    type: 'PUT',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        product_id: product_id
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });

                // Chuyển hướng đến trang chi tiết sản phẩm
                window.location.href = '/product/' + product_id;
            });
        });
    </script>
